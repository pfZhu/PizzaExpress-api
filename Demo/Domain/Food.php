<?php

class Domain_Food {

    public function getFoodList() {
        $model = new Model_Food();
        $cgs=$model->getCategoryList();
//        DI()->logger->debug("",$cgs);
        $rst=array();
        foreach($cgs as $cg) {
//            $cg=$cg['id'];
            $item = array();
            $foodList = $model->getFoodsByCategory($cg['id']);
            $item["category"] = $cg['name'];
            $item["foods"] = $foodList;
            $rst[] = $item;
        }
        return $rst;
    }

    public function getFoodListAll() {
        $model = new Model_Food();
        $cgs=$model->getCategoryList();
        $rst=array();
        foreach($cgs as $cg) {
            $item = array();
            $foodList = $model->getFoodsByCategoryAll($cg['id']);
            $item["category"] = $cg['name'];
            $item["foods"] = $foodList;
            $rst[] = $item;
        }
        return $rst;
    }

    public function insertFood($data) {
        $model = new Model_Food();
        $rs = $model->insertFood($data);
        return $rs;
    }

    public function insertFoodMaterial($foodId, $data) {
        $model = new Model_FoodMaterial();
        $rs = $model->insertFoodMaterial($foodId, $data);
        return $rs;
    }

    public function expireFood($foodId) {
        $model = new Model_Food();
        $rs = $model->expireFood($foodId);
        return $rs;
    }

    public function availFood($foodId) {
        $model = new Model_Food();
        $rs = $model->availFood($foodId);
        return $rs;
    }
}
