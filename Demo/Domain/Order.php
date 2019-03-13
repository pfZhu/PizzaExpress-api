<?php

class Domain_Order {

    public function getBaseInfo($orderId) {
        $orderId = intval($orderId);
        $model = new Model_Order();
        $rs = $model->getOrderById($orderId);
        $model = new Model_FoodOrder();
        $rs['foodOrder'] = $model->getFoodOrderByOrderId($orderId);
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
        return $model->getOrderList();
    }

    public function insertOrder($orderData) {
        $model = new Model_Order();
        $rs = $model->insertOrder($orderData);
        return $rs;
    }

    public function insertFoodOrder($foodOrderData) {
        $model = new _FoodOrder();
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
}

