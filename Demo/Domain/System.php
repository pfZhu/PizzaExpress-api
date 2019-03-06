<?php
/**
 * Created by PhpStorm.
 * User: Ciel
 * Date: 2019/3/6
 * Time: 13:28
 */
class Domain_System {

    public function getAllUsers() {
        $model = new Model_User();
        $rs = $model->getAllUsers();
        return $rs;
    }

    public function getAllFoods() {
        $model = new Model_Food();
        $rs = $model->getAllFoods();
        return $rs;
    }

    public function getMaterial($foodId) {
        $foodId = intval($foodId);
        $model = new Model_FoodMaterial();
        $idArr = $model->getMaterialIdByFood($foodId);
        $rs = array();
        $model = new Model_Material();
        foreach ($idArr as $id) {
            array_push($rs, $model->getMaterialById($id));
        }
        return $rs;
    }

    public function getAllFactories() {
        $model = new Model_Factory();
        $rs = $model->getAllFactories();
        return $rs;
    }

    public function getFactoryById($factoryId) {
        $factoryId = intval($factoryId);
        $model = new Model_Factory();
        $rs = $model->getByFactoryId($factoryId);
        return $rs;
    }

    public function addFactory($data) {
        $model = new Model_Factory();
        $rs = $model->insertFactory($data);
        return $rs;
    }

    public function deleteFactory($factoryId) {
        $factoryId = intval($factoryId);
        $model = new Model_Factory();
        $rs = $model->deleteFactoryById($factoryId);
        return $rs;
    }

    public function updateFactory($factoryId, $data) {
        $factoryId = intval($factoryId);
        $model = new Model_Factory();
        $rs = $model->updateFactory($factoryId, $data);
        return $rs;
    }

}