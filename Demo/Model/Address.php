<?php

class Model_Address extends PhalApi_Model_NotORM {

    public function getAddress($userId){
        return $this->getORM()->select('*')->where("userId=?",$userId)->fetchAll();
    }
    public function addAddress($param){
        return $this->getORM()->insert($param);
    }
    public function deleteAddress($addrId){
        return $this->getORM()->where("id=?",$addrId)->delete();
    }
    public function changeAddress($addrId,$param){
        return $this->getORM()->where("id=?",$addrId)->update($param);
    }

}
