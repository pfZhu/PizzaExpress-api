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
}
