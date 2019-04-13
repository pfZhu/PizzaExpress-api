<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/4
 * Time: 20:40
 */

use PHPUnit\Framework\TestCase;
require_once dirname(__FILE__) . '/../test_env.php';

class Model_FactoryTest extends TestCase
{
    private $modelFactory;

    protected function setUp():void
    {
        parent::setUp();

        $this->modelFactory = new Model_Factory();
    }

    protected function tearDown():void
    {
        unset($this->modelFactory);
    }

    /**
     * @group testGetByFactoryId
     */
    public function testGetByFactoryId()
    {
        $id = '1';

        $rs = $this->modelFactory->getByFactoryId($id);

        $this->assertNotEmpty($rs);
        $this->assertArrayHasKey('id', $rs);
        $this->assertArrayHasKey('name', $rs);
        $this->assertArrayHasKey('address', $rs);
        $this->assertArrayHasKey('avatar', $rs);
        $this->assertArrayHasKey('phone', $rs);
        $this->assertArrayHasKey('maxOrder', $rs);
        $this->assertArrayHasKey('openTime', $rs);
        $this->assertArrayHasKey('createTime', $rs);
        $this->assertArrayHasKey('updateTime', $rs);

        $this->assertEquals('1', $rs['id']);
    }

    /**
     * @group testGetNameByFactoryId
     */
    public function testGetNameByFactoryId()
    {
        $id = '1';

        $rs = $this->modelFactory->getNameByFactoryId($id);

        $this->assertEquals('1号工厂', $rs['name']);
    }

    /**
     * @group testGetAllFactories
     */
    public function testGetAllFactories()
    {
        $rs = $this->modelFactory->getAllFactories();

        $this->assertCount('4', $rs);
    }

    /**
     * @group testInsertFactory
     */
    public function testInsertFactory()
    {
        $param = array();
        $param['id'] = '5';
        $param['name'] = 'adsfas';

        $rs = $this->modelFactory->insertFactory($param);

        $this->assertEquals('5', $rs['id']);
    }

    /**
     * @group testUpdateFactory
     */
    public function testUpdateFactory()
    {
        $id = '5';
        $param = array();
        $param['name'] = 'adfdfd';

        $rs = $this->modelFactory->updateFactory($id, $param);

        $this->assertEquals('1', $rs);
    }

    /**
     * @group testDeleteFactoryById
     */
    public function testDeleteFactoryById()
    {
        $id = '5';

        $rs = $this->modelFactory->deleteFactoryById($id);

        $this->assertEquals('1', $rs);
    }
}
