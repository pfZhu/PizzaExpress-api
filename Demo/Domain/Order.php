32<?php

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
}
