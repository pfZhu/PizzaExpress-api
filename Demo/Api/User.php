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
            'logout' => array(
                'userId' => array('name' => 'userId', 'type' => 'int', 'require' => true, 'desc' => '用户id'),
            ),
            'updateInfo' => array(
                'userId' => array('name' => 'userId', 'type' => 'int', 'require' => true, 'desc' => '用户id'),
                'nickname' => array('name' => 'nickname', 'type' => 'string', 'require' => true, 'desc' => '昵称'),
                'avatar' => array('name' => 'avatar', 'type' => 'string', 'require' => true, 'desc' => '头像'),
                'address' => array('name' => 'address', 'type' => 'string', 'require' => true, 'desc' => '地址'),
                'city' => array('name' => 'city', 'type' => 'string', 'require' => true, 'desc' => '城市')
            ),
            'register' => array(
                'username' => array('name' => 'username', 'type' => 'string', 'require' => true, 'desc' => '用户名'),
                'password'=> array('name' => 'password', 'type' => 'string', 'require' => true, 'desc' => '密码'),
                'nickname' => array('name' => 'nickname', 'type' => 'string', 'require' => false, 'desc' => '昵称'),
                'avatar' => array('name' => 'avatar', 'type' => 'string', 'require' => false, 'desc' => '头像'),
                'address' => array('name' => 'address', 'type' => 'string', 'require' => false, 'desc' => '地址'),
                'city' => array('name' => 'city', 'type' => 'string', 'require' => false, 'desc' => '城市')
            ),
            'checkUsername' => array(
                'username' => array('name' => 'username', 'type' => 'string', 'require' => true, 'desc' => '用户名'),
            ),
            'changePassword' => array(
                'userId' => array('name' => 'userId', 'type' => 'int', 'require' => true, 'desc' => '用户ID'),
                'old' => array('name' => 'old', 'type' => 'string', 'require' => true, 'desc' => '老密码'),
                'new' => array('name' => 'new', 'type' => 'string', 'require' => true, 'desc' => '新密码'),

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
     * @desc 登录，ret 200 验证成功，401 密码错，402 用户名错，返回的字段userId唯一标示该用户
     */
    public function login() {
        $domain = new Domain_User();
        $rst = $domain->login($this->username,$this->password);
        if($rst==1){
            throw new PhalApi_Exception_BadRequest("密码错误",1);
        }
        elseif($rst==2){
            throw new PhalApi_Exception_BadRequest("用户名错误",2);

        }
        else{
            $rst["userId"]=$rst["id"];
            return $rst;
        }

    }

    /**
     * 注销
     * @desc 注销，ret 200 注销成功， ret 401 错误的userId
     */
    public function logout() {
        $domain=new Domain_User();
        $rst=$domain->logout($this->userId);
        if($rst)
            return array();
        else
            throw new PhalApi_Exception_BadRequest("错误的user_id",1);
    }

    /**
     * 更新用户信息
     * @desc data=0成功
     */
    public function updateInfo() {
        $domain=new Domain_User();
        $rst=$domain->updateInfo($this->userId,$this->nickname,$this->avatar,$this->address,$this->city);
        return intval(!$rst);
    }

    /**
     * 检验用户名是否已存在
     * @desc 返回值 data=0 不存在 1 已存在
     */
    public function checkUsername() {
        $domain=new Domain_User();
        $rst=$domain->checkUsername($this->username);
        return $rst;
    }

    /**
     * 注册
     * @desc ret 401 用户名已存在
     */
    public function register() {
        $domain=new Domain_User();
        $rst=$domain->register($this->username,$this->password,$this->nickname,$this->avatar,$this->address,$this->city);
        return $rst;
    }

    /**
     * 修改密码
     * @desc 返回data=0 修改成功，data=1 旧密码错误，ret 401 userId错误
     */
    public function changePassword() {
        $domain=new Domain_User();
        $rst=$domain->changePassword($this->userId,$this->old,$this->new);
        return $rst;
    }

}
