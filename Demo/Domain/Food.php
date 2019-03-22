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

    public function insertFood($data) {
        $model = new Model_Food();
        $rs = $model->insertFood($data);
        return $rs;
    }
}
