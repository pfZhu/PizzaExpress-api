<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/4
 * Time: 20:50
 */

use PHPUnit\Framework\TestCase;
require_once dirname(__FILE__) . '/../test_env.php';

class Model_AddressTest extends TestCase
{
    private $modelAddress;

    protected function setUp():void
    {
        parent::setUp();

        $this->modelAddress = new Model_Address();
    }

    protected function tearDown():void
    {
        unset($this->modelAddress);
    }

    /**
     * @group testGetAddressById
     */
    public function testGetAddressById()
    {
        $id = '1';

        $rs = $this->modelAddress->getAddressById($id);

        $this->assertNotNull($rs);
        $this->assertArrayHasKey('id', $rs);
        $this->assertArrayHasKey('userId', $rs);
        $this->assertArrayHasKey('phone', $rs);
        $this->assertArrayHasKey('name', $rs);
        $this->assertArrayHasKey('tag', $rs);
        $this->assertArrayHasKey('lng', $rs);
        $this->assertArrayHasKey('lat', $rs);
        $this->assertArrayHasKey('addressDetail', $rs);
        $this->assertArrayHasKey('address', $rs);
        $this->assertArrayHasKey('gender', $rs);
        $this->assertArrayHasKey('createTime', $rs);
        $this->assertArrayHasKey('updateTime', $rs);
        $this->assertEquals('1', $rs['id']);
    }

    /**
     * @group testGetAddress
     */
    public function testGetAddress()
    {
        $userId = '1';

        $rst = $this->modelAddress->getAddress($userId);

        $this->assertNotNull($rst);
        $rs = $rst[0];
        $this->assertArrayHasKey('id', $rs);
        $this->assertArrayHasKey('userId', $rs);
        $this->assertArrayHasKey('phone', $rs);
        $this->assertArrayHasKey('name', $rs);
        $this->assertArrayHasKey('tag', $rs);
        $this->assertArrayHasKey('lng', $rs);
        $this->assertArrayHasKey('lat', $rs);
        $this->assertArrayHasKey('addressDetail', $rs);
        $this->assertArrayHasKey('address', $rs);
        $this->assertArrayHasKey('gender', $rs);
        $this->assertArrayHasKey('createTime', $rs);
        $this->assertArrayHasKey('updateTime', $rs);
        $this->assertEquals('1', $rs['userId']);
    }

    /**
     * @group testAddAddress
     */
    public function testAddAddress()
    {
        $param = array();
        $param['id'] = '8';
        $param['name'] = 'adsfas';

        $rs = $this->modelAddress->addAddress($param);

        $this->assertEquals('8', $rs['id']);
    }

    /**
     * @group testChangeAddress
     */
    public function testChangeAddress()
    {
        $id = '8';
        $param = array();
        $param['name'] = 'adfdfd';

        $rs = $this->modelAddress->changeAddress($id, $param);

        $this->assertEquals('1', $rs);
    }

    /**
     * @group testDeleteAddress
     */
    public function testDeleteAddress()
    {
        $id = '8';

        $rs = $this->modelAddress->deleteAddress($id);

        $this->assertEquals('1', $rs);
    }

    /**
     * @group testGetLng
     */
    public function testGetLng()
    {
        $id = '4';

        $rs = $this->modelAddress->getLng($id);

        $this->assertEquals('12.51', $rs['lng']);
    }

    /**
     * @group testGetLat
     */
    public function testGetLat()
    {
        $id = '4';

        $rs = $this->modelAddress->getLat($id);

        $this->assertEquals('31.29', $rs['lat']);
    }
}
