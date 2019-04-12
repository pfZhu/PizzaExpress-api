<?php
/**
 * 工厂管理类
 */

class Api_Factory extends PhalApi_Api {

    public function getRules() {
        return array(
            'getFactoryList' => array(),
            'addFactory' => array(
                'name' => array('name' => 'name', 'type' => 'string', 'require' => true, 'desc' => '名字'),
                'lat' => array('name' => 'lat', 'type' => 'float', 'require' => true, 'desc' => '纬度'),
                'lng' => array('name' => 'lng', 'type' => 'float', 'require' => true, 'desc' => '经度'),
                'phone' => array('name' => 'phone', 'type' => 'string', 'require' => true, 'desc' => '电话'),
                'address' => array('name' => 'address', 'type' => 'string', 'require' => true, 'desc' => '地址'),
            ),
            'deleteFactory' => array(
                'factoryId' => array('name' => 'factoryId', 'type' => 'int', 'require' => true, 'desc' => '工厂id'),

            ),
            'updateFactory' => array(
                'factoryId' => array('name' => 'factoryId', 'type' => 'int', 'require' => true, 'desc' => '工厂id'),
                'name' => array('name' => 'name', 'type' => 'string', 'require' => true, 'desc' => '名字'),
                'lat' => array('name' => 'lat', 'type' => 'float', 'require' => true, 'desc' => '纬度'),
                'lng' => array('name' => 'lng', 'type' => 'float', 'require' => true, 'desc' => '经度'),
                'phone' => array('name' => 'phone', 'type' => 'string', 'require' => true, 'desc' => '电话'),
                'address' => array('name' => 'address', 'type' => 'string', 'require' => true, 'desc' => '地址'),
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
     * 添加工场
     * @desc
     */
    public function addFactory() {
        $model=new Model_Factory();
        return $model->insertFactory(array("name"=>$this->name,"lat"=>$this->lat,"lng"=>$this->lng,"phone"=>$this->phone,"address"=>$this->address));
    }

    /**
     * 删除工厂
     * @desc 
     */
    public function deleteFactory() {
        $model=new Model_Factory();
        return $model->deleteFactoryById($this->factoryId);
    }

    /**
     * 修改工厂信息
     * @desc
     */
    public function updateFactory() {
        $model=new Model_Factory();
        $data=array("name"=>$this->name,"lat"=>$this->lat,"lng"=>$this->lng,"phone"=>$this->phone,"address"=>$this->address);
        return $model->updateFactory($this->factoryId,$data);
    }



}
