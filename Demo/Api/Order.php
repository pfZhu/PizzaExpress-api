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

}
