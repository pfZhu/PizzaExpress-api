<?php

class Domain_Food {

    public function getFoodList() {
        $model = new Model_Food();
        $cgs=$model->getCategoryList();
//        DI()->logger->debug("",$cgs);
        $rst=array();
        foreach($cgs as $cg) {
            $cg=$cg['category'];
            $item = array();
            $foodList = $model->getFoodsByCategory($cg);
            $item["category"] = $cg;
            $item["foods"] = $foodList;
            $rst[] = $item;
        }
        return $rst;
    }
}
