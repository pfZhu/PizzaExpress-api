<?php

class Model_Threshold extends PhalApi_Model_NotORM {

    public function getThresholdList() {
        return $this->getORM()
            ->select('*')
            ->fetchAll();
    }

}
