<?php
/**
 * 用户信息类
 */

class Api_User extends PhalApi_Api {

    public function getRules() {
        return array(
            'getBaseInfo' => array(
                'userId' => array('name' => 'userId', 'type' => 'int', 'min' => 0, 'require' => true, 'desc' => '用户ID'),
            ),
            'getMultiBaseInfo' => array(
                'userIds' => array('name' => 'userIds', 'type' => 'array', 'format' => 'explode', 'require' => true, 'desc' => '用户ID，多个以逗号分割'),
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
            'checkPhone' => array(
                'phone' => array('name' => 'phone', 'type' => 'string', 'require' => true, 'desc' => '电话号码'),
            ),
            'changePassword' => array(
                'userId' => array('name' => 'userId', 'type' => 'int', 'require' => true, 'desc' => '用户ID'),
                'old' => array('name' => 'old', 'type' => 'string', 'require' => true, 'desc' => '老密码'),
                'new' => array('name' => 'new', 'type' => 'string', 'require' => true, 'desc' => '新密码'),

            ),
            'addAddress' => array(
                'userId' => array('name' => 'userId', 'type' => 'int', 'require' => true, 'desc' => '用户ID'),
                'name' => array('name' => 'name', 'type' => 'string', 'require' => true, 'desc' => '名字'),
                'gender' => array('name' => 'gender', 'type' => 'string', 'require' => true, 'desc' => '性别'),
                'text' => array('name' => 'text', 'type' => 'string', 'require' => true, 'desc' => '地址描述'),
                'phone' => array('name' => 'phone', 'type' => 'string', 'require' => true, 'desc' => '电话'),
                'tag' => array('name' => 'tag', 'type' => 'string', 'require' => true, 'desc' => '标签'),
            ),
            'getAddress' => array(
                'userId' => array('name' => 'userId', 'type' => 'int', 'require' => true, 'desc' => '用户ID'),
            ),
            'deleteAddress' => array(
                'addrId' => array('name' => 'addrId', 'type' => 'int', 'require' => true, 'desc' => '地址ID'),
            ),
            'changeAddress' => array(
                'addrId' => array('name' => 'addrId', 'type' => 'int', 'require' => true, 'desc' => '地址ID'),
                'name' => array('name' => 'name', 'type' => 'string', 'require' => true, 'desc' => '名字'),
                'gender' => array('name' => 'gender', 'type' => 'string', 'require' => true, 'desc' => '性别'),
                'text' => array('name' => 'text', 'type' => 'string', 'require' => true, 'desc' => '地址描述'),
                'phone' => array('name' => 'phone', 'type' => 'string', 'require' => true, 'desc' => '电话'),
                'tag' => array('name' => 'tag', 'type' => 'string', 'require' => true, 'desc' => '标签')
            ),
            'checkPhoneNum' => array(
                'phone' => array('name' => 'phone', 'type' => 'string', 'require' => true, 'desc' => '电话号码'),

            ),
            'loginByVerifyPhone' => array(
                'phone' => array('name' => 'phone', 'type' => 'string', 'require' => true, 'desc' => '电话号码'),
            ),
            'loginByVerifyCode' => array(
                'phone' => array('name' => 'phone', 'type' => 'string', 'require' => true, 'desc' => '电话号码'),
                'code'=>array('name' => 'code', 'type' => 'string', 'require' => true, 'desc' => '验证码'),
            ),
        );
    }

    /**
     * 通过验证验证码方式登录，返回userId
     * @desc
     */
    public function loginByVerifyCode() {
        $model=new Model_User();
        $line=$model->getByPhone($this->phone);
        if(!$line) {
            $model->insert(array("phone" => $this->phone));
            $line = $model->getByPhone($this->phone);
        }
        return intval($line["id"]);
    }

    /**
     * 通过验证手机号的方式登录
     * @desc
     */
    public function loginByVerifyPhone() {
        $model=new Model_User();
        if(!$model->getByPhone($this->phone))
            $model->insert(array("phone"=>$this->phone));
        return 0;
    }

    /**
     * 验证手机号码
     * @desc 验证是否[注册过该手机号&&设置了密码]，是则返回0，否则返回1
     */
    public function checkPhoneNum() {
        $domain=new Domain_User();
        return $domain->checkPhoneNum($this->phone);
    }

    /**
     * 修改用户地址
     * @desc
     */
    public function changeAddress() {
        $model=new Model_Address();
        $date=new DateTime();
        $datetime=$date->format("Y-m-d H:i:s");
        $param=array("name"=>$this->name,"gender"=>$this->gender,"text"=>$this->text,"phone"=>$this->phone,"tag"=>$this->tag,"updateTime"=>$datetime);
        return $model->changeAddress($this->addrId,$param);
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
     * 检验电话号码是否已存在
     * @desc 返回值 data=0 不存在 1 已存在
     */
    public function checkPhone() {
        $domain=new Domain_User();
        $rst=$domain->checkPhone($this->phone);
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

    /**
     * 添加地址
     * @desc
     */
    public function addAddress() {
        $model=new Model_Address();
        $param=array("gender"=>$this->gender,"phone"=>$this->phone,"tag"=>$this->tag,"name"=>$this->name,"text"=>$this->text,"userId"=>$this->userId);
        return $model->addAddress($param);
    }
    /**
     * 获取用户地址
     * @desc
     */
    public function getAddress() {
        $model=new Model_Address();
        return $model->getAddress($this->userId);
    }

    /**
     * 删除用户地址
     * @desc
     */
    public function deleteAddress() {
        $model=new Model_Address();
        return $model->deleteAddress($this->addrId);
    }



}
