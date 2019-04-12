<?php
/**
 * Created by PhpStorm.
 * User: Ciel
 * Date: 2019/3/6
 * Time: 13:55
 */
class Model_FoodMaterial extends PhalApi_Model_NotORM {

    public function getMaterialNameByFood($foodId) {
        return $this->getORM()
            ->select('materialName')
            ->where('foodId = ?', $foodId)
            ->fetchAll();
    }

    public function getMaterialNameAndAmountByFood($foodId) {
        return $this->getORM()
            ->select('materialName, amount')
            ->where('foodId = ?', $foodId)
            ->fetchAll();
    }

    public function insertFoodMaterial($foodId, $data) {
        $data['foodId'] = $foodId;
        return $this->getORM()
            ->insert($data);
    }

}