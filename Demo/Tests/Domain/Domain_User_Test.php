<?php
/**
 * Created by PhpStorm.
 * User: fenghuihuang
 * Date: 2019/3/27
 * Time: 15:07
 */

use PHPUnit\Framework\TestCase;
require_once dirname(__FILE__) . '/../test_env.php';

if (!class_exists('Domain_User')) {
    require dirname(__FILE__) . '/./Demo/Domain/User.php';
}

class DomainUser_Test extends TestCase
{
    public $domainUser;

    function setUp():void
    {
        parent::setUp();

        $this->domainUser = new Domain_User();
    }

    protected function tearDown():void
    {
        unset($this->domainUser);
    }

    /**
     * @group testGetBaseInfo
     */ 
    public function testGetBaseInfo()
    {
        $userId = '1';

        $rs = $this->domainUser->getBaseInfo($userId);

        $this->assertArrayHasKey('id', $rs);
        $this->assertArrayHasKey('username', $rs);
        $this->assertArrayHasKey('password', $rs);
        $this->assertArrayHasKey('phone', $rs);
        $this->assertArrayHasKey('nickname', $rs);
        $this->assertArrayHasKey('avatar', $rs);
        $this->assertArrayHasKey('city', $rs);
        $this->assertArrayHasKey('birthday', $rs);
        $this->assertArrayHasKey('qqId', $rs);
        $this->assertArrayHasKey('wxId', $rs);
        $this->assertArrayHasKey('loginTime', $rs);
        $this->assertArrayHasKey('createTime', $rs);
        $this->assertArrayHasKey('updateTime', $rs);
        $this->assertEquals('孟鑫', $rs['username']);
    }

    /**
     * @group testLogin
     */
    public function testLoginWithRightPhoneRightPassword()
    {
        $phone = '15201709132';
        $password = 'deepdark';

        $rs = $this->domainUser->login($phone, $password);

        $this->assertNotNull($rs);
        $this->assertEquals('1', $rs['id']);

        $address = $rs['address'][0];

        $this->assertNotNull($address);
        $this->assertArrayHasKey('id', $address);
        $this->assertArrayHasKey('userId', $address);
        $this->assertArrayHasKey('phone', $address);
        $this->assertArrayHasKey('name', $address);
        $this->assertArrayHasKey('tag', $address);
        $this->assertArrayHasKey('lng', $address);
        $this->assertArrayHasKey('lat', $address);
        $this->assertArrayHasKey('addressDetail', $address);
        $this->assertArrayHasKey('address', $address);
        $this->assertArrayHasKey('gender', $address);
        $this->assertArrayHasKey('createTime', $address);
        $this->assertArrayHasKey('updateTime', $address);
        $this->assertEquals("上海市普陀区3663号", $address['address']);
    }

    /**
     * @group testLogin
     */
    public function testLoginWithRightPhoneWrongPassword()
    {
        $phone = '15201709132';
        $password = 'deepduck';

        $rs = $this->domainUser->login($phone, $password);

        $this->assertNotNull($rs);
        $this->assertEquals('1', $rs);
    }

    /**
     * @group testLogin
     */
    public function testLoginWithWrongPhone()
    {
        $phone = '1111111';
        $password = '2555';

        $rs = $this->domainUser->login($phone, $password);

        $this->assertNotNull($rs);
        $this->assertEquals('2', $rs);
    }

    /**
     * @group testLogout
     */
    public function testLogout()
    {
        $userId = '1';

        $rs = $this->domainUser->logout($userId);
        $this->assertArrayHasKey('id', $rs);
        $this->assertArrayHasKey('username', $rs);
        $this->assertArrayHasKey('password', $rs);
        $this->assertArrayHasKey('phone', $rs);
        $this->assertArrayHasKey('nickname', $rs);
        $this->assertArrayHasKey('avatar', $rs);
        $this->assertArrayHasKey('city', $rs);
        $this->assertArrayHasKey('birthday', $rs);
        $this->assertArrayHasKey('qqId', $rs);
        $this->assertArrayHasKey('wxId', $rs);
        $this->assertArrayHasKey('loginTime', $rs);
        $this->assertArrayHasKey('createTime', $rs);
        $this->assertArrayHasKey('updateTime', $rs);
        $this->assertEquals('孟鑫', $rs['username']);
    }

    /**
     * @group updateInfo
     */
    public function  testUpdateInfo()
    {
        $userId = '1';
        $nickname = 'SeniaCiel';
        $avatar = 'avatar.jpg';
        $city = '上海';

        $rs = $this->domainUser->updateInfo($userId, $nickname, $avatar, $city);

        $this->assertEquals('1', $rs);

        $rst = $this->domainUser->getBaseInfo($userId);

        $this->assertEquals($nickname, $rst['nickname']);
        $this->assertEquals($avatar, $rst['avatar']);
        $this->assertEquals($city, $rst['city']);
    }

    /**
     * @group testRegister
     */
    public function testRegisterWithExistedUserName()
    {
        $username = '孟鑫';
        $password = '111111111';
        $nickname = 'dfsaf';
        $avatar = 'avatar.jpg';
        $address = "safdas";
        $city = "dfasfdasg";

        $this->expectExceptionMessage("非法请求：用户名已存在");
        $this->domainUser->register($username, $password, $nickname, $avatar, $address, $city);
    }

    /**
     * @group testRegister
     */
    public function testRegisterWithNoExistedUserName()
    {
        $strs="QWERTYUIOPASDFGHJKLZXCVBNM1234567890qwertyuiopasdfghjklzxcvbnm";
        $username = substr(str_shuffle($strs),mt_rand(0,strlen($strs)-11),10);
        $password = '111111111';
        $nickname = 'dfsaf';
        $avatar = 'avatar.jpg';
        $address = null;
        $city = "dfasfdasg";

        $rs = $this->domainUser->register($username, $password, $nickname, $avatar, $address, $city);

        $this->assertIsInt(intval($rs));
    }

    /**
     * @group testCheckPhone
     */
    public function testCheckPhoneWithExistedPhone()
    {
        $phone = '15201709132';

        $rs = $this->domainUser->checkPhone($phone);

        $this->assertEquals('1', $rs);
    }

    /**
     * @group testCheckPhone
     */
    public function testCheckPhoneWithNoExistedPhone()
    {
        $phone = '1520154646546462';

        $rs = $this->domainUser->checkPhone($phone);

        $this->assertEquals('0', $rs);
    }

    /**
     * @group testChangePassword
     */
    public function testChangePasswordWithRightUserIdRightOld()
    {
        $userId = '1';
        $old = 'deepdark';
        $new = 'deepdark';

        $rs = $this->domainUser->changePassword($userId, $old, $new);

        $this->assertEquals('0', $rs);
    }

    /**
     * @group testChangePassword
     */
    public function testChangePasswordWithRightUserIdWrongOld()
    {
        $userId = '1';
        $old = 'deepduck';
        $new = 'deepdark';

        $rs = $this->domainUser->changePassword($userId, $old, $new);

        $this->assertEquals('1', $rs);
    }

    /**
     * @group testChangePassword
     */
    public function testChangePasswordWithWrongUserId()
    {
        $userId = '8999';
        $old = 'deepdark';
        $new = 'deepdark';


        $this->expectExceptionMessage("非法请求：错误的userId");
        $rs = $this->domainUser->changePassword($userId, $old, $new);
    }

    /**
     * @group testCheckPhoneNum
     */
    public function testCheckPhoneNumWithRightPhone()
    {
        $phone = '15201709132';

        $rs = $this->domainUser->checkPhoneNum($phone);

        $this->assertEquals('0', $rs);
    }

    /**
     * @group testCheckPhoneNum
     */
    public function testCheckPhoneNumWithWrongPhone()
    {
        $phone = '15565464';

        $rs = $this->domainUser->checkPhoneNum($phone);

        $this->assertEquals('1', $rs);
    }
}
