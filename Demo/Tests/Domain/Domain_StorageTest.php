<?php
/**
 * Created by PhpStorm.
 * User: fenghuihuang
 * Date: 2019/3/27
 * Time: 15:07
 */

use PHPUnit\Framework\TestCase;
require_once dirname(__FILE__) . '/../test_env.php';

if (!class_exists('Domain_Storage')) {
    require dirname(__FILE__) . '/./Demo/Domain/Storage.php';
}

class Domain_StorageTest extends TestCase
{
    private $domainStorage;

    function setUp():void
    {
        parent::setUp();

        $this->domainStorage = new Domain_Storage();

    }

    protected function tearDown():void
    {
        unset($this->domainStorage);
    }

    /**
     * @group testGetMaterialList
     */
    public function testGetMaterialListWithRightId()
    {
        $factoryId = '2';

        $rs = $this->domainStorage->getMaterialList($factoryId);

        $amount = $rs[0]['amount'];

        $this->assertEquals('50', $amount);
    }

    /**
     * @group testGetMaterialList
     */
    public function testGetMaterialListWithWrongId()
    {
        $factoryId = '4651';

        $rs = $this->domainStorage->getMaterialList($factoryId);

        $amount = $rs[0]['amount'];

        $this->assertEquals('0', $amount);
    }

    /**
     * @group testGetFactoryList()
     */
    public function testGetFactoryList()
    {
        $rs = $this->domainStorage->getFactoryList();
        $name = $rs[0]['name'];

        $this->assertEquals("1号工厂", $name);
    }

    /**
     * @group testCheckMaterial
     */
    public function testCheckMaterialWithNoChange()
    {
        $materialId = '2';
        $status = '1';

        $this->domainStorage->checkMaterial($materialId, $status);

        $rs = $this->domainStorage->checkMaterial($materialId, $status);

        $this->assertEquals('0', intval($rs));
    }

    /**
     * @group testCheckMaterial
     */
    public function testCheckMaterialWithChange()
    {
        $materialId = '2';
        $status = '1';

        $this->domainStorage->checkMaterial($materialId, $status);

        $status = '0';

        $rs = $this->domainStorage->checkMaterial($materialId, $status);

        $this->assertEquals('0', intval($rs));
    }
}
