<?php
/**
 * 订单信息类
 */

class Api_Order extends PhalApi_Api {

    public function getRules() {
        return array(
            'getBaseInfo' => array(
                'orderId' => array('name' => 'order_id', 'type' => 'int', 'min' => 0, 'require' => true, 'desc' => '订单ID'),
            ),
            'updateOrderStatus' => array(
                'orderId' => array('name' => 'order_id', 'type' => 'int', 'min' => 0, 'require' => true, 'desc' => '订单ID'),
                'status' => array('name' => 'status', 'type' => 'int', 'min' => -2, 'max' => 4, 'require' => true, 'desc' => '订单状态码'),
            ),
            'cancelOrder' => array(
                'orderId' => array('name' => 'order_id', 'type' => 'int', 'min' => 0, 'require' => true, 'desc' => '订单ID'),
            ),
            'createOrder' => array(
                'x' => array('name' => 'x', 'type' => 'float', 'require' => true, 'desc' => '用户x坐标'),
                'y' => array('name' => 'y', 'type' => 'float', 'require' => true, 'desc' => '用户y坐标'),
                'userId' => array('name' => 'userId', 'type' => 'int', 'min' => 0, 'require' => true, 'desc' => '用户ID'),
                'price' => array('name' => 'price', 'type' => 'float', 'min' => 0, 'require' => true, 'desc' => '订单总价'),
                'phone' => array('name' => 'phone', 'require' => true, 'desc' => '配送电话'),
                'food' => array('name' => 'food', 'require' => true, 'desc' => '订单内食品')
            ),
            'getOrderByUserId' => array(
                'userId' => array('name' => 'userId', 'type' => 'int', 'min' => 0, 'require' => true, 'desc' => '用户ID')
            )
        );
    }

    /**
     * 获取订单基本信息
     * @desc 用于获取单个订单基本信息
     */
    public function getBaseInfo() {
        $domain = new Domain_Order();
        $rs = $domain->getBaseInfo($this->orderId);
        if(!$rs)
            throw new PhalApi_Exception_BadRequest('获取信息失败。', 12);

        return $rs;
    }

    /**
     * 更新订单状态码
     * @desc -2 取消，已退款  -1 取消，审核中  0 未支付  1 已支付，未接单  2 已接单  3 配送中  4 已送达
     */
    public function updateOrderStatus() {
        $domain = new Domain_Order();
        $rs = $domain->updateOrderStatus($this->orderId, $this->status);
        if ($rs === false) {          //更新失败
            throw new PhalApi_Exception_BadRequest('更新失败。', 11);
        }
        return $rs;
    }

    /**
     * 取消订单
     * @desc 取消的订单如果已支付，管理员审核后退款
     */
    public function cancelOrder() {
        $domain = new Domain_Order();
        $orderId = $this->orderId;
        $status = $domain->getBaseInfo($orderId)['status'];
        if ($status == 0) {    //未支付
            $rs = $domain->updateOrderStatus($orderId, -2);
            if ($rs === false) {
                throw new PhalApi_Exception_BadRequest('更新失败。', 11);
            }
        } else if ($status == 1) {    //已支付
            $rs = $domain->updateOrderStatus($orderId, -1);
            //todo 管理员审核并退款
            if ($rs === false) {
                throw new PhalApi_Exception_BadRequest('更新失败。', 11);
            }
        } else {
            throw new PhalApi_Exception_BadRequest('订单已取消或已接单，无法取消。', 10);
        }
        return $rs;
    }

    /**
     * 获取已退款、待审核的订单列表
     * @desc 用于管理员查看并审核
     */
    public function getUnchecked() {
        $domain = new Domain_Order();
        $rs = $domain->getUncheckedOrder();
        return $rs;
    }


    //我校地址: 121.411329,31.233563
    /**
     * 根据下单的坐标分配工厂
     * @param $x double 下单的x坐标
     * @param $y double 下单的y坐标
     * @return int 工厂id
     */
    public function assignFactory($x, $y) {
        $X = 121.411329;
        $Y = 31.233563;
        if ($x < $X) {
            if ($y > $Y) {
                return 1;
            } else {
                return 3;
            }
        } else {
            if ($y > $Y) {
                return 2;
            } else {
                return 4;
            }
        }
    }

    /**
     * 新建一个订单
     * @desc 填写用户的x、y坐标、用户id、订单价格、配送电话、订单内食品信息，创建新订单  food字段格式：[{"foodId": foodId, "num": num, "price": price}, {...}, {...} , ...]
     */
    public function createOrder() {
        $domain = new Domain_Order();
        $factoryId = $this->assignFactory($this->x, $this->y);
        $orderData = array(
            'userId' => $this->userId,
            'factoryId' => $factoryId,
            'price' => $this->price,
            'phone' => $this->phone,
            'status' => 0,
        );
        $orderId = $domain->insertOrder($orderData);
        if (!$orderId > 0) {
            throw new PhalApi_Exception_BadRequest('订单信息插入失败。', 13);
        }
        $foodArr = json_decode($this->food);
        $foodIdArr = array();
        foreach ($foodArr as $food) {
            array_push($foodIdArr, $food->foodId);
            $foodOrderData = array(
                'orderId' => $orderId,
                'foodId' => $food->foodId,
                'num' => $food->num,
                'price' => $food->price
            );
            $rs = $domain->insertFoodOrder($foodOrderData);
            if ($rs === false) {
                throw new PhalApi_Exception_BadRequest('订单内食品信息插入失败。', 13);
            }
        }
        $materialIdArr = $this->reduceMaterial($foodIdArr, $factoryId);
        $this->updateOrderMaterialId($materialIdArr, $orderId);
        $this->checkForWarning($foodIdArr, $factoryId);
        return 1;
    }

    /**
     * 新建订单后，减少相应工厂内的原料
     * @desc 新建订单后，减少相应工厂内的原料
     */
    public function reduceMaterial($foodIdArr, $factoryId) {
        $domain = new Domain_Order();
        $materialIdArr = array();
        foreach ($foodIdArr as $foodId) {
            $rs = $domain->getMaterialNameAndAmount($foodId);
            foreach ($rs as $r) {
                $materialName = $r['materialName'];
                $amount = $r['amount'];
                $materialId = $domain->getMaterialId($materialName, $factoryId);
                if (!$materialId > 0) {  //未查询到material表中对应工厂该材料的库存信息，则插入
                    $rs2 = $this->insertMaterial($factoryId, $materialName, -$amount, 1, null, 1, null);
                    array_push($materialIdArr, $rs2);
                } else {
                    array_push($materialIdArr, $materialId);
                    $rs2 = $domain->reduceMaterialAmount($materialId, $amount);
                    if ($rs2 === false) {
                        throw new PhalApi_Exception_BadRequest('更新库存信息失败。', 11);
                    }
                }
            }
        }
        return $materialIdArr;
    }

    public function updateOrderMaterialId($materialIdArr, $orderId) {
        $domain = new Domain_Order();
        $rs = $domain->updateOrderMaterialId($materialIdArr, $orderId);
        if ($rs === false) {
            throw new PhalApi_Exception_BadRequest('更新订单原料信息失败。', 11);
        }
        return $rs;
    }

    public function insertMaterial($factoryId, $name, $amount, $supplierId, $trackId, $status, $checkTime) {
        $domain = new Domain_Order();
        $data = array(
            'factoryId' => $factoryId,
            'name' => $name,
            'amount' => $amount,
            'supplierId' => $supplierId,
            'trackId' => $trackId,
            'status' => $status,
            'checkTime' => $checkTime
        );
        $rs = $domain->insertMaterial($data);
        if ($rs === false) {
            throw new PhalApi_Exception_BadRequest('创建工厂库存信息失败。', 13);
        }
        return $rs;
    }

    /**
     * 新建订单后，检查使用了原料的工厂原料是否充足
     * @desc 新建订单后，检查使用了原料的工厂原料是否充足
     */
    public function checkForWarning($foodIdArr, $factoryId) {
        $domain = new Domain_Order();
        foreach ($foodIdArr as $foodId) {
            $rs = $domain->getMaterialNameAndAmount($foodId);
            foreach ($rs as $r) {
                $materialName = $r['materialName'];
                $rs2 = $domain->checkForWarning($materialName, $factoryId);
                if ($rs2 > 0) {
                    $rs3 = $domain->insertWarning($materialName, $factoryId);
                    if ($rs3 === false) {
                        throw new PhalApi_Exception_BadRequest('创建库存预警信息失败。', 13);
                    }
                }
            }
        }
    }

    /**
     * 根据userId查询订单信息
     * @desc 输入userId，返回该用户创建的所有订单信息
     */
    public function getOrderByUserId() {
        $domain = new Domain_Order();
        $rs = $domain->getOrderByUserId($this->userId);
        return $rs;
    }

}
