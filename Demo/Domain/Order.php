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

    public function getMaterialIdAndAmount($foodId) {
        $model = new Model_FoodMaterial();
        $rs = $model->getMaterialIdAndAmountByFood($foodId);
        return $rs;
    }
}
