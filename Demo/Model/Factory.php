<?php
/**
 * Created by PhpStorm.
 * User: Ciel
 * Date: 2019/3/6
 * Time: 13:55
 */
class Model_Factory extends PhalApi_Model_NotORM {

    public function getByFactoryId($id) {
        return $this->getORM()
            ->select('*')
            ->where('id = ?', $id)
            ->fetch();
    }

    public function getNameByFactoryId($id) {
        return $this->getORM()
            ->select('name')
            ->where('id = ?', $id)
            ->fetch();
    }

    public function getAllFactories() {
        return $this->getORM()
            ->select('*')
            ->fetchAll();
    }

    public function insertFactory($data) {
        return $this->getORM()
            ->insert($data);
    }

    public function deleteFactoryById($id) {
        return $this->getORM()
            ->where('id = ?', $id)
            ->delete();
    }

    public function updateFactory($id, $data) {
        return $this->getORM()
            ->where('id = ?', $id)
            ->update($data);
    }

}