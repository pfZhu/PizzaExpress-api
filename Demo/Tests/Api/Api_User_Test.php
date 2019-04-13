<?php
/**
 * Created by PhpStorm.
 * User: fenghuihuang
 * Date: 2019/3/29
 * Time: 19:44
 */

use PHPUnit\Framework\TestCase;
require_once dirname(__FILE__) . '/../test_env.php';

if (!class_exists('Api_User')) {
    require dirname(__FILE__) . '/../../Demo/Api/User.php';
}

class PhpUnderControl_ApiUser_Test extends TestCase
{
    public $apiUser;

    protected function setUp():void
    {
        parent::setUp();

        $this->apiUser = new Api_User();
    }

    protected function tearDown():void
    {
        unset($this->apiUser);
    }

    /**
     * @group testGetRules
     */ 
    public function testGetRules()
    {
        $rs = $this->apiUser->getRules();

        $this->assertCount('14', $rs);
    }

    /**
     * @group testLoginByVerifyCode
     */
    public function testLoginByVerifyCodeWithRightPhone()
    {
        $url = 'service=User.loginByVerifyCode&phone=15201709132&code=1';

        $rs = PhalApi_Helper_TestRunner::go($url);

        $this->assertEquals('1', $rs);
    }

    /**
     * @group testLoginByVerifyCode
     */
    public function testLoginByVerifyCodeWithWrongPhone()
    {
        $url = 'service=User.loginByVerifyCode&phone=8949444&code=1';

        $rs = PhalApi_Helper_TestRunner::go($url);

        $this->assertEquals('21', $rs);
    }

    /**
     * @group testLoginByVerifyPhone
     */
    public function testLoginByVerifyPhoneWithRightPhone()
    {
        $url = 'service=User.loginByVerifyPhone&phone=15201709132&code=1';

        $rs = PhalApi_Helper_TestRunner::go($url);

        $this->assertEquals('0', $rs);
    }

    /**
     * @group testLoginByVerifyPhone
     */
    public function testLoginByVerifyPhoneWithWrongPhone()
    {
        $url = 'service=User.loginByVerifyPhone&phone=1520174546652&code=1';

        $rs = PhalApi_Helper_TestRunner::go($url);

        $this->assertEquals('0', $rs);
    }

    /**
     * @group testCheckPhoneNum
     */
    public function testCheckPhoneNumWithRightPhone()
    {
        $url = 'service=User.checkPhoneNum&phone=15201709132&code=1';

        $rs = PhalApi_Helper_TestRunner::go($url);

        $this->assertEquals('0', $rs);
    }

    /**
     * @group testCheckPhoneNum
     */
    public function testCheckPhoneNumWithWrongPhone()
    {
        $url = 'service=User.checkPhoneNum&phone=152017091313132&code=1';

        $rs = PhalApi_Helper_TestRunner::go($url);

        $this->assertEquals('1', $rs);
    }

    /**
     * @group testChangeAddress
     */
    public function testChangeAddressWithNoChange()
    {
        $url = 'service=User.changeAddress&addrId=4&name=test&gender=男&address=林绿家园&addressDetail=1号楼101室%=&lng=12.51&lat=31.29&phone=18621681997&tag=home';

        PhalApi_Helper_TestRunner::go($url);

        $rs = PhalApi_Helper_TestRunner::go($url);

        $this->assertEquals('0', $rs);
    }

    /**
     * @group testChangeAddress
     */
    public function testChangeAddressWithChange()
    {
        $url = 'service=User.changeAddress&addrId=4&name=test&gender=男&address=林绿家园&addressDetail=1号楼101室%=&lng=12.51&lat=31.29&phone=18621681997&tag=home';

        PhalApi_Helper_TestRunner::go($url);

        $url = 'service=User.changeAddress&addrId=4&name=test00&gender=男&address=林绿家园&addressDetail=1号楼101室%=&lng=12.51&lat=31.29&phone=18621681997&tag=home';

        $rs = PhalApi_Helper_TestRunner::go($url);

        $this->assertEquals('1', $rs);
    }

    /**
     * @group testGetBaseInfo
     */ 
    public function testGetBaseInfoWithRightId()
    {
        //Step 1. 构建请求URL
        $url = 'service=User.getBaseInfo&userId=1';

        //Step 2. 执行请求	
        $rs = PhalApi_Helper_TestRunner::go($url);

        //Step 3. 验证
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
     * @group testGetBaseInfo
     */
    public function testGetBaseInfoWithWrongId()
    {
        //Step 1. 构建请求URL
        $url = 'service=User.getBaseInfo&userId=99';

        //Step 2. 执行请求
        $rs = PhalApi_Helper_TestRunner::go($url);

        //Step 3. 验证
        $this->assertIsNotArray($rs);
    }

    /**
     * @group testGetMultiBaseInfo
     */
    public function testGetMultiBaseInfo()
    {
        //Step 1. 构建请求URL
        $url = 'service=User.GetMultiBaseInfo&userIds=1,2,3';

        //Step 2. 执行请求	
        $rs = PhalApi_Helper_TestRunner::go($url);

        //Step 3. 验证
        $this->assertNotEmpty($rs);

        $this->assertEquals('孟鑫', $rs[0]['username']);
        $this->assertEquals('朱鹏飞', $rs[1]['username']);
        $this->assertIsNotArray( $rs[2]);
    }

    /**
     * @group testLogin
     */
    public function testLoginWithRightPhoneRightPassword()
    {
        $url = 'service=User.login&phone=15201709132&password=deepdark';

        $rs = PhalApi_Helper_TestRunner::go($url);

        $this->assertEquals('1', $rs['id']);
    }

    /**
     * @group testLogin
     */
    public function testLoginWithRightPhoneWrongPassword()
    {
        $url = 'service=User.login&phone=15201709132&password=eeee';

        $this->expectExceptionMessage("非法请求：密码错误");
        $rs = PhalApi_Helper_TestRunner::go($url);
    }

    /**
     * @group testLogin
     */
    public function testLoginWithWrongPhone()
    {
        $url = 'service=User.login&phone=152048979866132&password=eeee';

        $this->expectExceptionMessage("非法请求：用户名错误");
        $rs = PhalApi_Helper_TestRunner::go($url);
    }

    /**
     * @group testLogout
     */
    public function testLogoutWithRightId()
    {
        $url = 'service=User.logout&userId=1';

        $rs = PhalApi_Helper_TestRunner::go($url);

        $this->assertIsArray($rs);
    }

    /**
     * @group testLogout
     */
    public function testLogoutwithWrongId()
    {
        $url = 'service=User.logout&userId=5646546';

        $this->expectExceptionMessage("非法请求：错误的user_id");
        $rs = PhalApi_Helper_TestRunner::go($url);
    }

    /**
     * @group testUpdateInfo
     */
    public function testUpdateInfo()
    {
        $url = 'service=User.updateInfo&userId=1&nickname=SeniaCiel&avatar=avatar.jpg&city=上海';

        $rs = PhalApi_Helper_TestRunner::go($url);

        $this->assertEquals('0', $rs);
    }

    /**
     * @group testCheckPhone
     */
    public function testCheckPhoneWithExistedPhone()
    {
        $url = 'service=User.checkPhone&phone=15201709132';

        $rs = PhalApi_Helper_TestRunner::go($url);

        $this->assertEquals('1', $rs);
    }

    /**
     * @group testCheckPhone
     */
    public function testCheckPhoneWithNotExistedPhone()
    {
        $url = 'service=User.checkPhone&phone=15201709154532';

        $rs = PhalApi_Helper_TestRunner::go($url);

        $this->assertEquals('0', $rs);
    }

    /**
     * @group testChangePassword
     */
    public function testChangePasswordWithRightUserIdRightOld()
    {
        $url = 'service=User.changePassword&userId=1&old=deepdark&new=deepdark';

        $rs = PhalApi_Helper_TestRunner::go($url);

        $this->assertEquals('0', $rs);
    }

    /**
     * @group testChangePassword
     */
    public function testChangePasswordWithRightUserIdWrongOld()
    {
        $url = 'service=User.changePassword&userId=1&old=deepdurk&new=deepdark';

        $rs = PhalApi_Helper_TestRunner::go($url);

        $this->assertEquals('1', $rs);
    }

    /**
     * @group testChangePassword
     */
    public function testChangePasswordWithWrongUserId()
    {
        $url = 'service=User.changePassword&userId=455646&old=deepdark&new=deepdark';

        $this->expectExceptionMessage("非法请求：错误的userId");

        $rs = PhalApi_Helper_TestRunner::go($url);
    }

    /**
     * @group testAddAddress
     */
    public function testAddAddress()
    {
        $url = 'service=User.addAddress&userId=4&name=test&gender=男&address=林绿11家园&addressDetail=1号楼101室%=&lng=12.51&lat=31.29&phone=18621681997&tag=home';

        $rs = PhalApi_Helper_TestRunner::go($url);

        $this->assertEquals('home', $rs['tag']);
    }

    /**
     * @group testGetAddress
     */
    public function testGetAddress()
    {
        $url = 'service=User.getAddress&userId=1';

        $rs = PhalApi_Helper_TestRunner::go($url);

        $this->assertEquals('上海市普陀区3663号', $rs[0]['address']);
    }

    /**
     * @group testDeleteAddress
     */
    /*public function testDeleteAddress()
    {
        $url = 'service=User.deleteAddress&addrId=12';

        $rs = PhalApi_Helper_TestRunner::go($url);

        $this->assertEquals('1', $rs);
    }*/

    /**
     * @group testDeleteAddress
     */
    public function testDeleteAddressWithWrongId()
    {
        $url = 'service=User.deleteAddress&addrId=46544464';

        $rs = PhalApi_Helper_TestRunner::go($url);

        $this->assertEquals('0', $rs);
    }
}
