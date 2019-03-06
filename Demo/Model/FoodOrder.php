<?php

class Model_FoodOrder extends PhalApi_Model_NotORM {

    public function getFoodOrderByOrderId($orderId) {
        return $this->getORM()
            ->select('*')
            ->where('orderId = ?', $orderId)
            ->fetchAll();
    }

//    public function updateFoodOrder($orderId, $data) {
//        return $this->getORM()
//            ->where('orderId = ?', $orderId)
//            ->update($data);
//    }
//
//    public function addFoodOrder($data) {
//        return $this->getORM()
//            ->insert($data);
//    }
//
//    public function deleteFoodOrder($id) {
//        return $this->getORM()
//            ->where('id = ?', $id)
//            ->delete();
//    }
//
//    //清空订单内食物
//    public function clear($orderId) {
//        return $this->getORM()
//            ->where('orderId = ?', $orderId)
//            ->delete();
//    }

}
