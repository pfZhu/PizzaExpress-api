<?php
/**
 * 用户信息类
 */

class Api_User extends PhalApi_Api {

    public function getRules() {
        return array(
            'getBaseInfo' => array(
                'userId' => array('name' => 'user_id', 'type' => 'int', 'min' => 0, 'require' => true, 'desc' => '用户ID'),
            ),
            'getMultiBaseInfo' => array(
                'userIds' => array('name' => 'user_ids', 'type' => 'array', 'format' => 'explode', 'require' => true, 'desc' => '用户ID，多个以逗号分割'),
            ),
            'login' => array(
                'username' => array('name' => 'username', 'type' => 'string', 'require' => true, 'desc' => '用户名'),
                'password' => array('name' => 'password', 'type' => 'string',  'require' => true, 'desc' => '密码'),
            ),
        );
    }

    /**
     * 获取用户基本信息
     * @desc 用于获取单个用户基本信息
     */
    public function getBaseInfo() {
        $domain = new Domain_User();
        $rs = $domain->getBaseInfo($this->userId);
        if(!$rs)
            $rs=json_decode("{}");
        return $rs;
    }

    /**
     * 批量获取用户基本信息
     * @desc 用于获取多个用户基本信息
     */
    public function getMultiBaseInfo() {
        $rs = array();
        $domain = new Domain_User();
        foreach ($this->userIds as $userId) {
            $userInfo=$domain->getBaseInfo($userId);
            if(!$userInfo)
                $userInfo=json_decode("{}");
            $rs[] = $userInfo;
            DI()->tracer->mark('FINISH_GET_INFO');
        }
        return $rs;
    }

    /**
     * 登录
     * @desc 登录，success取0或1，ret 401 用户名错，402 密码错
     */
    public function login($username,$password) {
        $domain = new Domain_User();
        $rs = $domain->login($username,$password);
        $rtn=array("success"=>0);
        if($rs) {
            $rtn['success']=1;
            $rtn['user_id']=$rs;
        }
        return $rs;
    }
}
