<?php

class Domain_Order {

    public function getBaseInfo($orderId) {
        $orderId = intval($orderId);
        $model = new Model_Order();
        $rs = $model->getOrderById($orderId);
        $addressId = $model->getAddressId($orderId);
        $model = new Model_Factory();
        $rs['factoryName'] = $model->getNameByFactoryId($rs['factoryId'])['name'];
        $model = new Model_FoodOrder();
        $rs['foodOrder'] = $model->getFoodOrderByOrderId($orderId);
        $model = new Model_Food();
        for($i = 0; $i < count($rs['foodOrder']); $i++) {
            $rs['foodOrder'][$i]['foodName'] = $model->getFoodNameById($rs['foodOrder'][$i]['foodId'])['name'];
        }
        $model = new Model_Address();
        $rs['address'] = $model->getAddressById($addressId);
        return $rs;
    }
//
//    public function update($orderId, $data) {
//        $orderId = intval($orderId);
//        $model = new Model_FoodOrder();
//        $rs = $model->updateFoodOrder($orderId, $data);
//        return $rs;
//    }

    public function updateOrderStatus($orderId, $status) {
        $orderId = intval($orderId);
        $status = intval($status);
        $model = new Model_Order();
        $rs = $model->updateOrderStatus($orderId, $status);
        return $rs;
    }

    public function getUncheckedOrder() {
        $model = new Model_Order();
        $rs = $model->getUncheckedOrder();
        return $rs;
    }

    public function getOrderList(){
        $model=new Model_Order();
        $rs = $model->getOrderList();
        for($i = 0; $i < count($rs); $i++) {
            $orderId = $rs[$i]['id'];
            $rs[$i]['foodOrder'] = $this->getBaseInfo($orderId)['foodOrder'];
            $rs[$i]['factoryName'] = $this->getBaseInfo($orderId)['factoryName'];
        }
        return $rs;
    }

    public function insertOrder($orderData) {
        $model = new Model_Order();
        $rs = $model->insertOrder($orderData);
        return $rs;
    }

    public function insertFoodOrder($foodOrderData) {
        $model = new Model_FoodOrder();
        $rs = $model->insertFoodOrder($foodOrderData);
        return $rs;
    }

    public function reduceMaterialAmount($materialId, $amount) {
        $model = new Model_Material();
        $rs = $model->reduceAmountById($materialId, $amount);
        return $rs;
    }

    public function getMaterialNameAndAmount($foodId) {
        $model = new Model_FoodMaterial();
        $rs = $model->getMaterialNameAndAmountByFood($foodId);
        return $rs;
    }

    public function getMaterialId($materialName, $factoryId) {
        $model = new Model_Material();
        $rs = $model->getMaterialId($materialName, $factoryId);
        return $rs;
    }

    public function insertMaterial($data) {
        $model = new Model_Material();
        $rs = $model->insertMaterial($data);
        return $rs;
    }

    public function checkForWarning($materialName, $factoryId) {
        $model = new Model_Threshold();
        $threshold = $model->getThreshold($materialName);
        if (!$threshold >= 0) {
            $threshold = 0;
        }
        $model = new Model_Material();
        $materialId = $model->getMaterialId($materialName, $factoryId);
        $rs = $model->checkForWarning($materialId, $threshold);
        return $rs;
    }

    public function updateOrderMaterialId($materialIdArr, $orderId) {
        $model = new Model_Order();
        $materialId = "";
        $mIdArr = array();
        foreach ($materialIdArr as $mId) {
            array_push($mIdArr, $mId['id']);
        }
        $mIdArr = array_unique($mIdArr);
        foreach ($mIdArr as $mId) {
            $materialId = $materialId . $mId . ',';
        }
        $materialId = rtrim($materialId, ",");
        $rs = $model->updateOrderMaterialId($materialId, $orderId);
        return $rs;
    }

    public function insertWarning($materialName, $factoryId) {
        $model = new Model_Warning();
        $isDuplicate = $model->isDuplicate($materialName, $factoryId);
        if (!$isDuplicate) {
            $rs = $model->insertWarning($materialName, $factoryId);
        } else {
            $rs = 0;
        }
        return $rs;
    }

    public function getOrderByUserId($userId) {
        $model = new Model_Order();
        $ids = $model->getOrderByUserId($userId);
        $rs = array();
        foreach($ids as $id) {
            array_push($rs, $this->getBaseInfo($id['id']));
        }
        return $rs;
    }
}

