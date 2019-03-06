<?php
/**
 * 后台管理-系统管理类
 */

class Api_System extends PhalApi_Api
{

    public function getRules()
    {
        return array(
            'getMaterialOfFood' => array(
                'foodId' => array('name' => 'food_id', 'type' => 'int', 'min' => 0, 'require' => true, 'desc' => '食品ID'),
            ),
            'getFactoryInfo' => array(
                'factoryId' => array('name' => 'factory_id', 'type' => 'int', 'min' => 0, 'require' => true, 'desc' => '工厂ID'),
            ),
            'addFactory' => array(
                'name' => array('name' => 'name', 'require' => true, 'desc' => '工厂名称'),
                'address' => array('name' => 'address', 'require' => true, 'desc' => '工厂地址'),
                'avatar' => array('name' => 'avatar', 'desc' => '工厂头像'),
                'phone' => array('name' => 'phone', 'require' => true, 'desc' => '工厂电话号码'),
                'maxOrder' => array('name' => 'maxOrder', 'type' => 'int', 'min' => 1, 'require' => true, 'desc' => '最大接单量'),
                'openTime' => array('name' => 'openTime', 'require' => true, 'desc' => '营业时间'),
            ),
            'deleteFactory' => array(
                'factoryId' => array('name' => 'factory_id', 'type' => 'int', 'min' => 0, 'require' => true, 'desc' => '工厂ID'),
            ),
            'updateFactory' => array(
                'factoryId' => array('name' => 'factory_id', 'type' => 'int', 'min' => 0, 'require' => true, 'desc' => '工厂ID'),
                'name' => array('name' => 'name', 'require' => true, 'desc' => '工厂名称'),
                'address' => array('name' => 'address', 'require' => true, 'desc' => '工厂地址'),
                'avatar' => array('name' => 'avatar', 'desc' => '工厂头像'),
                'phone' => array('name' => 'phone', 'require' => true, 'desc' => '工厂电话号码'),
                'maxOrder' => array('name' => 'maxOrder', 'type' => 'int', 'min' => 1, 'require' => true, 'desc' => '最大接单量'),
                'openTime' => array('name' => 'openTime', 'require' => true, 'desc' => '营业时间'),
            ),
        );
    }

    /**
     * 获取所有用户信息
     * @desc 查看所有普通用户信息
     */
    public function getAllUsers() {
        $domain = new Domain_System();
        $rs = $domain->getAllUsers();
        return $rs;
    }

    /**
     * 获取所有菜单信息
     * @desc 查看所有菜单信息
     */
    public function getAllFoods() {
        $domain = new Domain_System();
        $rs = $domain->getAllFoods();
        return $rs;
    }

    /**
     * 获取一道菜的原料信息
     * @desc 根据food的id查看其原料信息
     */
    public function getMaterialOfFood() {
        $domain = new Domain_System();
        $rs = $domain->getMaterial($this->foodId);
        return $rs;
    }

    /**
     * 获取所有工厂信息
     * @desc 查看所有工厂信息
     */
    public function getAllFactories() {
        $domain = new Domain_System();
        $rs = $domain->getAllFactories();
        return $rs;
    }

    /**
     * 获取一家工厂信息
     * @desc 根据工厂id查看其信息
     */
    public function getFactoryInfo() {
        $domain = new Domain_System();
        $rs = $domain->getFactoryById($this->factoryId);
        return $rs;
    }

    /**
     * 添加一家工厂
     * @desc 填写工厂名称、地址、头像、电话号码、最大接单量、营业时间，新增一家工厂
     */
    public function addFactory() {
        $domain = new Domain_System();
        $data = array(
            'name' => $this->name,
            'address' => $this->address,
            'avatar' => $this->avatar,
            'phone' => $this->phone,
            'maxOrder' => $this->maxOrder,
            'openTime' => $this->openTime
        );
        $rs = $domain->addFactory($data);
        if ($rs === false) {
            throw new PhalApi_Exception_BadRequest('插入失败。', 13);
        }
        return $rs;
    }

    /**
     * 删除一家工厂
     * @desc 根据工厂id删除已有的工厂
     */
    public function deleteFactory() {
        $domain = new Domain_System();
        $rs = $domain->deleteFactory($this->factoryId);
        if ($rs === false) {
            throw new PhalApi_Exception_BadRequest('删除失败。', 14);
        }
        return $rs;
    }

    /**
     * 更新工厂信息
     * @desc 填写工厂名称、地址、头像、电话号码、最大接单量、营业时间，根据id更新工厂信息
     */
    public function updateFactory() {
        $domain = new Domain_System();
        $data = array(
            'name' => $this->name,
            'address' => $this->address,
            'avatar' => $this->avatar,
            'phone' => $this->phone,
            'maxOrder' => $this->maxOrder,
            'openTime' => $this->openTime
        );
        $rs = $domain->updateFactory($this->factoryId, $data);
        if ($rs === false) {
            throw new PhalApi_Exception_BadRequest('更新失败。', 11);
        }
        return $rs;
    }
}