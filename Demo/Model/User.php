<?php

class Model_User extends PhalApi_Model_NotORM {

    public function getByUserId($userId) {
        return $this->getORM()
            ->select('*')
            ->where('id = ?', $userId)
            ->fetch();
    }
    public function checkUser($username,$password){
        $rst= $this->getORM()
            ->select('*')
            ->where('username=?',$username)
            ->where('password=?',$password)
            ->fetch();
        return $rst;
    }
    public function getUserByUsername($username){
        $rst=$this->getORM()
            ->select('*')
            ->where('username=?',$username)
            ->fetch();
        return $rst;
    }
    public function updateInfo($userId,$nickname,$avatar,$address,$city){
        $date=new DateTime();
        $datetime=$date->format("Y-m-d H:i:s");
        return $this->getORM()->where("id=?",$userId)
            ->update(array('nickname'=>$nickname,'avatar'=>$avatar,"address"=>$address,'city'=>$city,"updateTime"=>$datetime));
    }
    public function changePassword($userId,$new){
        $date=new DateTime();
        return $this->getORM()->where("id=?",$userId)->update(array('password'=>$new,"updateTime"=>$date->format("Y-m-d H:i:s")));
    }


}
