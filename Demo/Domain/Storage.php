<?php

class Domain_Storage {

    public function getMaterialList($factoryId) {
        $mThreshold=new Model_Threshold();
        $rst=$mThreshold->getThresholdList();
        $materialList=array();
        foreach($rst as $item){
            $materialList[$item["materialName"]]=0;
        }
        $mMaterial=new Model_Material();
        $rst=$mMaterial->getListByFactoryId($factoryId);
        foreach($rst as $line){
            if($line["status"]==1){
                $materialList[$line["name"]]+=$line["amount"];
            }
        }
        $rtn=array();
        foreach($materialList as $key=>$val ){
            $item=array();
            $item["name"]=$key;
            $item["amount"]=$val;
            $rtn[]=$item;
        }
        return $rtn;
    }
    public function getFactoryList(){
        $model=new Model_Factory();
        return $model->getAllFactories();
    }
    public function checkMaterial($materialId,$status){
        $model = new Model_Material();
        return $model->checkMaterial($materialId,$status);

    }
}
