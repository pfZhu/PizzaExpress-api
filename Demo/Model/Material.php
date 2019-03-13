<?php

class Model_Material extends PhalApi_Model_NotORM {

    public function getListByFactoryId($factoryId){
        return $this->getORM()->select("*")->where("factoryId=?",$factoryId)->fetchAll();
    }
    public function checkMaterial($materialId,$status){
        $sql="update material set status=:status, updateTime=CURRENT_TIMESTAMP where id=:id";
        return $this->getORM()->queryAll($sql,array(':status'=>$status,':id'=>$materialId));
    }

    public function reduceAmountById($id, $amount) {
        return $this->getORM()
            ->where('id = ?', $id)
            ->update(array('amount' => new NotORM_Literal("amount - ".$amount)));
    }

    public function getMaterialId($materialName, $factoryId) {
        return $this->getORM()
            ->select('id')
            ->where('name = ?', $materialName)
            ->where('factoryId', $factoryId)
            ->fetch();
    }

    public function insertMaterial($data) {
        return $this->getORM()
            ->insert($data);
    }

    public function checkForWarning($materialId, $threshold) {
        return $this->getORM()
            ->select('id')
            ->where('id = ?', $materialId)
            ->where('amount < ?', $threshold)
            ->fetch();
    }

}
