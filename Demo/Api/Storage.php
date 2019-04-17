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
            'addMaterial' => array(
                'factoryId' => array('name' => 'factoryId', 'type' => 'int', 'min' => 0, 'require' => true, 'desc' => '工厂ID'),
                'name' => array('name' => 'name', 'type' => 'string',  'require' => true, 'desc' => '原料名'),
                'amount' => array('name' => 'amount', 'type' => 'float',  'require' => true, 'desc' => '数量'),
                'supplierId' => array('name' => 'supplierId', 'type' => 'int',  'require' => true, 'desc' => '供应商ID'),
            ),
//            'updateMaterial' => array(
//                "materialId"=>array('name' => 'materialId', 'type' => 'int', 'min' => 0, 'require' => true, 'desc' => '原料ID'),
//                'factoryId' => array('name' => 'factoryId', 'type' => 'int', 'min' => 0, 'require' => true, 'desc' => '工厂ID'),
//                'name' => array('name' => 'name', 'type' => 'string',  'require' => true, 'desc' => '原料名'),
//                'amount' => array('name' => 'amount', 'type' => 'float',  'require' => true, 'desc' => '数量'),
//                'supplierId' => array('name' => 'supplierId', 'type' => 'int',  'require' => true, 'desc' => '供应商ID')
//            ),
            'updateMaterial' => array(
                "factoryId" => array('name' => 'factoryId', 'type' => 'int', 'min' => 0, 'require' => true, 'desc' => '工厂ID'),
                "storage" => array('name' => 'storage', 'type' => 'array', 'require' => true, 'format' => 'json', 'desc' => '原料信息')
            ),
            'deleteMaterial' => array(
                "materialId"=>array('name' => 'materialId', 'type' => 'int', 'min' => 0, 'require' => true, 'desc' => '原料ID'),
            ),
            'addThreshold' => array(
                "materialName"=>array('name' => 'materialName', 'type' => 'string', 'require' => true, 'desc' => '原料名称（唯一）'),
                "num"=>array('name' => 'num', 'type' => 'float', 'min' => 0, 'require' => true, 'desc' => '预警阈值'),
            ),
            'deleteThreshold' => array(
                "materialName"=>array('name' => 'materialName', 'type' => 'string', 'require' => true, 'desc' => '原料名称（唯一）'),
            ),
            'changeThreshold' => array(
                "materialName"=>array('name' => 'materialName', 'type' => 'string', 'require' => true, 'desc' => '原料名称（唯一）'),
                "num"=>array('name' => 'num', 'type' => 'float', 'min' => 0, 'require' => true, 'desc' => '预警阈值'),
            ),
            'getThresholdList' => array(
            ),


        );

    }
    /**
     * 获取所有阈值
     * @desc
     */
    public function getThresholdList() {
        $model=new Model_Threshold();
        return $model->getThresholdList();
    }
    /**
     * 根据材料名更新阈值
     * @desc
     */
    public function changeThreshold() {
        $model=new Model_Threshold();
        return $model->changeThreshold($this->materialName,array("num"=>$this->num));
    }

    /**
     * 删除阈值
     * @desc
     */
    public function deleteThreshold() {
        $model=new Model_Threshold();
        return $model->deleteThreshold($this->materialName);
    }

    /**
     * 添加原料稀缺预警阈值
     * @desc
     */
    public function addThreshold() {
        $model=new Model_Threshold();
        return $model->addThreshold(array("materialName"=>$this->materialName,"num"=>$this->num));
    }

    /**
     * 删除原料
     * @desc
     */
    public function deleteMaterial() {
        $model=new Model_Material();
        return $model->deleteMaterial($this->materialId);
    }
//    /**
//     * 修改原料
//     * @desc
//     */
//    public function updateMaterial() {
//        $model=new Model_Material();
//        return $model->updateMaterial($this->materialId,array("factoryId"=>$this->factoryId,"name"=>$this->name,"amount"=>$this->amount,"supplierId"=>$this->supplierId));
//    }
    /**
     * 更新原料
     * @desc 根据factoryId和原料信息storage更新原料，storage格式为[{"name": "xxx", "amount": n}, …]
     */
    public function updateMaterial() {
        $domain = new Domain_Storage();
        $rs = $domain->updateMaterial($this->factoryId, $this->storage);
        return $rs;
    }
    /**
     * 添加原料
     * @desc
     */
    public function addMaterial() {
        $model=new Model_Material();
        return $model->addMaterial(array("factoryId"=>$this->factoryId,"name"=>$this->name,"amount"=>$this->amount,"supplierId"=>$this->supplierId));
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
        if ($rs === false) {
            throw new PhalApi_Exception_BadRequest('更新原料状态失败。', 11);
        }
        return $rs;
    }
}
