<?php

class Model_Address extends PhalApi_Model_NotORM {

    public function getAddressById($id){
        return $this->getORM()->select('*')->where("id = ?", $id)->fetch();
    }

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

    public function getLng($id) {
        return $this->getORM()->select('lng')->where("id = ?", $id)->fetch();
    }

    public function getLat($id) {
        return $this->getORM()->select('lat')->where("id = ?", $id)->fetch();
    }

}
