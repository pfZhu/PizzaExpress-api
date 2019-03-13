<?php
/**
 * Created by PhpStorm.
 * User: Ciel
 * Date: 2019/3/13
 * Time: 13:53
 */
class Model_Threshold extends PhalApi_Model_NotORM {

    public function getThreshold($materialName) {
        return $this->getORM()
            ->select('num')
            ->where('materialName = ?', $materialName)
            ->fetch();
    }

}