<?php
/**
 * 后台管理-库存管理
 */

class Api_Storage extends PhalApi_Api {

    public function getRules() {
        return array(
            'getFactoryList' => array(),
            'getMaterialListByFactory' => array(
                'factoryId' => array('name' => 'factoryId', 'type' => 'int', 'min' => 0, 'require' => true, 'desc' => '工厂ID'),
            ),
            'checkMaterial' => array(
                'materialId' => array('name' => 'materialId', 'type' => 'int', 'min' => 0, 'require' => true, 'desc' => '原料ID'),
                'status' => array('name' => 'status', 'type' => 'int', 'min' => 0, 'max'=>1, 'require' => true, 'desc' => '更新后的状态'),
            ),
        );

    }

    /**
     * 获取工厂列表
     * @desc 用于获取工厂列表
     */
    public function getFactoryList() {
        $domain = new Domain_Storage();
        $rs = $domain->getFactoryList();
        return $rs;
    }
    /**
     * 获取工厂的原料列表
     * @desc 用于获取工厂的原料列表
     */
    public function getMaterialListByFactory() {
        $domain = new Domain_Storage();
        $rs = $domain->getMaterialList($this->factoryId);
        return $rs;
    }

    /**
     * 检查原料
     * @desc 设置原料新的状态，data=0 成功 1 失败
     */
    public function checkMaterial() {
        $domain = new Domain_Storage();
        $rs = $domain->checkMaterial($this->materialId,$this->status);
        if($rs)
            return 0;
        return 1;
    }
}
