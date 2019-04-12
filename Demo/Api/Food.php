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
                'data' => array('name' => 'data', 'type' => 'array', 'require' => true, 'format' => 'json', 'desc' => '食品信息'),
                'material' => array('name' => 'material', 'type' => 'array', 'require' => true, 'format' => 'json', 'desc' => '原料信息')
            ),
            'expireFood' => array(
                'foodId' => array('name' => 'foodId', 'type' => 'int', 'require' => true, 'desc' => '食品id')
            ),
            'availFood' => array(
                'foodId' => array('name' => 'foodId', 'type' => 'int', 'require' => true, 'desc' => '食品id')
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
     * 获取菜单列表(只获取未下架的菜单)
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
     * 获取菜单列表(获取所有菜单)
     * @desc 用于获取菜单列表
     */
    public function getFoodListAll() {
        $domain = new Domain_Food();
        $rs = $domain->getFoodListAll();
        if(!$rs)
            $rs=array();
        return $rs;
    }

    /**
     * 新增食品和原料信息
     * @desc 新增食品和原料信息，原料格式为： [{"materialName":"xxx", "amount":n}, ...]
     */
    public function createFood() {
        $domain = new Domain_Food();
        $foodId = $domain->insertFood($this->data);
        if ($foodId === false) {
            throw new PhalApi_Exception_BadRequest('食品信息插入失败。', 13);
        }
        $materialArr = $this->material;
        foreach ($materialArr as $material) {
            $rs2 = $domain->insertFoodMaterial($foodId, $material);
            if ($rs2 === false) {
                throw new PhalApi_Exception_BadRequest('食品原料信息插入失败。', 13);
            }
        }
        return $foodId;
    }

    /**
     * 下架菜单
     * @desc 用于使特定的菜单下架
     */
    public function expireFood() {
        $domain = new Domain_Food();
        $rs = $domain->expireFood($this->foodId);
        if ($rs === false) {
            throw new PhalApi_Exception_BadRequest('菜单下架失败。', 11);
        }
        return $rs;
    }

    /**
     * 上架菜单
     * @desc 用于使特定的菜单上架
     */
    public function availFood() {
        $domain = new Domain_Food();
        $rs = $domain->availFood($this->foodId);
        if ($rs === false) {
            throw new PhalApi_Exception_BadRequest('菜单上架失败。', 11);
        }
        return $rs;
    }

}
