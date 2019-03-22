<?php
/**
 * 菜单操作类
 */

class Api_Food extends PhalApi_Api {

    public function getRules() {
        return array(
            'getFoodList' => array(),
            'getCategoryList' => array(),
            'createFood' => array(
                'data' => array('name' => 'data', 'type' => 'array', 'require' => true, 'format' => 'json', 'desc' => '食品信息')
            )
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

    /**
     * 新增食品信息
     * @desc 新增食品信息
     */
    public function createFood() {
        $domain = new Domain_Food();
        $rs = $domain->insertFood($this->data);
        if ($rs === false) {
            throw new PhalApi_Exception_BadRequest('食品信息插入失败。', 13);
        }
        return $rs;

    }



}
