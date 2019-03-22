<?php

class Model_FoodCategory extends PhalApi_Model_NotORM {

    public function getAll() {
        return $this->getORM()
            ->select('*')
            ->fetchAll();
    }

}
