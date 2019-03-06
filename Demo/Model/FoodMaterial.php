<?php
/**
 * Created by PhpStorm.
 * User: Ciel
 * Date: 2019/3/6
 * Time: 13:55
 */
class Model_FoodMaterial extends PhalApi_Model_NotORM {

    public function getMaterialIdByFood($foodId) {
        return $this->getORM()
            ->select('materialId')
            ->where('foodId = ?', $foodId)
            ->fetchAll();
    }

}