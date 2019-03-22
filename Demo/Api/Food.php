<?php
/**
 * 菜单操作类
 */

class Api_Food extends PhalApi_Api {

    public function getRules() {
        return array(
            'getFoodList' => array(),
            'getCategoryList' => array(),

        );
    }

    /**
     * 获取视频种类列表
     * @desc
     */
    public function getCategoryList() {
        $model = new Model_FoodCategory();
        return $model->getAll();
    }

    /**
     * 获取菜单列表
     * @desc 用于获取菜单列表
     */
    public function getFoodList() {
        $domain = new Domain_Food();
        $rs = $domain->getFoodList();
        if(!$rs)
            $rs=array();
        return $rs;
    }



}
