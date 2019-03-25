<?php

class Domain_User {

    public function getBaseInfo($userId) {
        $userId = intval($userId);
        $model = new Model_User();
        $rs = $model->getByUserId($userId);
        return $rs;
    }
    public function login($phone,$password){
        $model=new Model_User();
        $rst=$model->checkUser($phone,$password);
        if($rst) {
            $userId=$rst['id'];
            $addrModel=new Model_Address();
            $addr=$addrModel->getAddress($userId);
            $rst['address']=$addr;
            return $rst;//登陆验证成功
        }
        else{
            $rst=$model->getByPhone($phone);
            if($rst)return 1;//密码错误
            else
                return 2;//用户名错误
        }
    }
    public function logout($userId){
        $model=new Model_User();
        $rst=$model->getByUserId($userId);
        return $rst;
    }
    public function updateInfo($userId,$nickname,$avatar,$city){
        $model=new Model_User();
        return $model->updateInfo($userId,$nickname,$avatar,$city);
    }
    public function register($username,$password,$nickname,$avatar,$address,$city){
        $param=array();
        if(!empty($username))
            $param['username']=$username;
        if(!empty($password))
            $param['password']=$password;
        if(!empty($nickname))
            $param['nickname']=$nickname;
        if(!empty($avatar))
            $param['avatar']=$avatar;
        if(!empty($address))
            $param['address']=$address;
        if(!empty($city))
            $param['city']=$city;
        $model=new Model_User();
        if($model->getUserByUsername($username))
            throw new PhalApi_Exception_BadRequest("用户名已存在",1);
        return $model->insert($param);
    }
    public function checkPhone($phone){
        $model=new Model_User();
        $rst=$model->getByPhone($phone);
        if($rst)return 1;
        return 0;
    }
    public function changePassword($userId,$old,$new){
        $model=new Model_User();
        $rst=$model->getByUserId($userId);
        if(!$rst)
            throw new PhalApi_Exception_BadRequest("错误的userId",1);
        if($rst['password']!=$old)
            return 1;
        $model->changePassword($userId,$new);
        return 0;
    }
    public function checkPhoneNum($phone){
        $model=new Model_User();
        $line=$model->getByPhone($phone);
        if($line && !empty($line['password']))
            return 0;
        return 1;
    }

}
