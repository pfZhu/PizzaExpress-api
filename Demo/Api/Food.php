<?php
/**
 * 菜单操作类
 */

class Api_Food extends PhalApi_Api {

    public function getRules() {
        return array(
            'getFoodList' => array()
        );
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
