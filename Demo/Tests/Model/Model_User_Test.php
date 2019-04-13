<?php
/**
 * PhpUnderControl_ModelUser_Test
 *
 * 针对 ./Demo/Model/User.php Model_User 类的PHPUnit单元测试
 *
 * @author: dogstar 20150208
 */


use PHPUnit\Framework\TestCase;
require_once dirname(__FILE__) . '/../test_env.php';

class PhpUnderControl_ModelUser_Test extends TestCase
{
    private $modelUser;

    protected function setUp():void
    {
        parent::setUp();

        $this->modelUser = new Model_User();
    }

    protected function tearDown():void
    {
        unset($this->modelUser);
    }


    /**
     * @group testGetByUserId
     */ 
    public function testGetByUserId()
    {
        $userId = '1';

        $rs = $this->modelUser->getByUserId($userId);

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
     * @group testCheckUser
     */
    public function testCheckUserWithAllRight()
    {
        $phone = '15201709132';
        $password = 'deepdark';

        $rs = $this->modelUser->checkUser($phone, $password);
        $this->assertNotEmpty($rs);
        $this->assertEquals('孟鑫', $rs['username']);
    }

    /**
     * @group testCheckUser
     */
    public function testCheckUserWithWrongPassword()
    {
        $phone = '15201709132';
        $password = 'deepdadrk';

        $rs = $this->modelUser->checkUser($phone, $password);
        $this->assertEmpty($rs);
    }

    /**
     * @group testCheckUser
     */
    public function testCheckUserWithWrongPhone()
    {
        $phone = '152017091231332';
        $password = 'deepdadrk';

        $rs = $this->modelUser->checkUser($phone, $password);
        $this->assertEmpty($rs);
    }

    /**
     * @group testGetUserByUserName
     */
    public function testGetUserByUserNameWithExistedName()
    {
        $username = '孟鑫';

        $rs = $this->modelUser->getUserByUsername($username);
        $this->assertNotEmpty($rs);
    }

    /**
     * @group testGetUserByUserName
     */
    public function testGetUserByUserNameWithNoExistedName()
    {
        $username = '孟45646鑫';

        $rs = $this->modelUser->getUserByUsername($username);
        $this->assertEmpty($rs);
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

        $rs = $this->modelUser->updateInfo($userId, $nickname, $avatar, $city);

        $this->assertEquals('1', $rs);

        $rst = $this->modelUser->getByUserId($userId);

        $this->assertEquals($nickname, $rst['nickname']);
        $this->assertEquals($avatar, $rst['avatar']);
        $this->assertEquals($city, $rst['city']);
    }

    /**
     * @group testChangePassword
     */
    public function testChangePassword()
    {
        $userId = '1';
        $new = 'deepdark';

        $rs = $this->modelUser->changePassword($userId, $new);

        $this->assertEquals('0', $rs);
    }

    /**
     * @group testGetByPhone
     */
    public function testGetByPhoneWithRightPhone()
    {
        $phone = '15201709132';

        $rs = $this->modelUser->getByPhone($phone);

        $this->assertNotEmpty($rs);
    }

    /**
     * @group testGetByPhone
     */
    public function testGetByPhoneWithWrongPhone()
    {
        $phone = '15565464';

        $rs = $this->modelUser->getByPhone($phone);

        $this->assertEmpty($rs);
    }


}
