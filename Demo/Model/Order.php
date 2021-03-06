<?php

class Model_Order extends PhalApi_Model_NotORM {

    protected function getTableName($id) {
        return '`order`';
    }

//    public function getByOrderId($orderId) {
//        $sql = 'SELECT * FROM `order` JOIN `foodorder` ON (`order`.id = orderId) WHERE `order`.id = :orderId';
//        $params = array(':orderId' => $orderId);
//        return DI()->notorm->order->queryAll($sql, $params);
//    }

    public function getOrderById($orderId) {
        return $this->getORM()
            ->select('*')
            ->where('id = ?', $orderId)
            ->fetch();
    }

    public function updateOrderStatus($orderId, $status) {
        $data = array('status' => $status);
        return $this->getORM()
            ->where('id = ?', $orderId)
            ->update($data);
    }

    public function getUncheckedOrder() {
        return $this->getORM()
            ->select('*')
            ->where('status', -1)
            ->fetch();
    }

    public function getOrderList(){
        $sql = 'SELECT * FROM `order`';
        return DI()->notorm->order->queryAll($sql);
    }

    public function updateOrderMaterialId($materialId, $orderId) {
        $data = array('materialId' => $materialId);
        return $this->getORM()
            ->where('id = ?', $orderId)
            ->update($data);
    }

    public function insertOrder($data) {
        return $this->getORM()
            ->insert($data);
    }

    public function getOrderByUserId($userId) {
        return $this->getORM()
            ->select('id')
            ->where('userId = ?', $userId)
            ->order('id DESC')
            ->fetchAll();
    }

    public function getAddressId($orderId) {
        return $this->getORM()
            ->select('addressId')
            ->where('id = ?', $orderId)
            ->fetch();
    }

}
