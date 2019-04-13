<?php

class Model_Threshold extends PhalApi_Model_NotORM {

    public function getThresholdList() {
        return $this->getORM()
            ->select('*')
            ->fetchAll();
    }

    public function getThreshold($materialName) {
        return $this->getORM()
            ->select('num')
            ->where('materialName = ?', $materialName)
            ->fetch();
    }
    public function addThreshold($param) {
        return $this->getORM()->insert($param);
    }
    public function deleteThreshold($name) {
        return $this->getORM()->where("materialName=?",$name)->delete();
    }
    public function changeThreshold($name,$param) {
        return $this->getORM()->where("materialName=?",$name)->update($param);
    }
}
