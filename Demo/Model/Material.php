<?php
/**
 * Created by PhpStorm.
 * User: Ciel
 * Date: 2019/3/6
 * Time: 13:55
 */
class Model_Material extends PhalApi_Model_NotORM {

    public function getMaterialById($id) {
        return $this->getORM()
            ->select('*')
            ->where('id = ?', $id)
            ->fetchAll();
    }

    public function reduceAmountById($id, $amount) {
        return $this->getORM()
            ->where('id = ?', $id)
            ->update(array('amount' => new NotORM_Literal("amount - ".$amount)));
    }

    public function getMaterialId($materialName, $factoryId) {
        return $this->getORM()
            ->select('id')
            ->where('name = ?', $materialName)
            ->where('factoryId', $factoryId)
            ->fetch();
    }

    public function insertMaterial($data) {
        return $this->getORM()
            ->insert($data);
    }

    public function checkForWarning($materialId, $threshold) {
        return $this->getORM()
            ->select('id')
            ->where('id = ?', $materialId)
            ->where('amount < ?', $threshold)
            ->fetch();
    }

}