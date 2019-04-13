<?php
/**
 * Created by PhpStorm.
 * User: fenghuihuang
 * Date: 2019/3/29
 * Time: 22:23
 */

use PHPUnit\Framework\TestCase;
require_once dirname(__FILE__) . '/../test_env.php';

if (!class_exists('Api_Storage')) {
    require dirname(__FILE__) . '/../../Demo/Api/Storage.php';
}

class Api_StorageTest extends TestCase
{
    public $apiStorage;

    protected function setUp():void
    {
        parent::setUp();

        $this->apiStorage = new Api_Storage();
    }

    protected function tearDown():void
    {
        unset($this->apiStorage);
    }

    /**
     * @group testGetRules
     */
    public function testGetRules()
    {
        $rs = $this->apiStorage->getRules();

        $this->assertCount('6', $rs);
    }

    /**
     * @group testAddMaterial
     */
    public function testAddMaterial()
    {
        $url = 'service=Storage.addMaterial&factoryId=2&name=eee&amount=1&supplierId=2';

        $rs = PhalApi_Helper_TestRunner::go($url);

        $this->assertEquals("eee", $rs['name']);
    }

    /**
     * @group testUpdateMaterial
     */
    public function testUpdateMaterial()
    {
        $url = 'service=Storage.updateMaterial&materialId=17&factoryId=3&name=桃子&amount=1&supplierId=1';

        $rs = PhalApi_Helper_TestRunner::go($url);

        $this->assertEquals("0", $rs);
    }

    /**
     * @group testDeleteMaterial
     */
    public function testDeleteMaterial()
    {
        $url = 'service=Storage.deleteMaterial&materialId=105';

        $rs = PhalApi_Helper_TestRunner::go($url);

        $this->assertEquals("0", $rs);
    }

    /**
     * @group testGetFactoryList
     */
    public function testGetFactoryList()
    {
        $url = 'service=Storage.getFactoryList';

        $rs = PhalApi_Helper_TestRunner::go($url);

        $this->assertCount("4", $rs);
    }

    /**
     * @group testGetMaterialListByFactory
     */
    public function testGetMaterialListByFactory()
    {
        $url = 'service=Storage.getMaterialListByFactory&factoryId=2';

        $rs = PhalApi_Helper_TestRunner::go($url);

        $this->assertEquals("50", $rs[0]['amount']);
    }

    /**
     * @group testCheckMaterial
     */
    public function testCheckMaterialWithNoChange()
    {
        $url = 'service=Storage.checkMaterial&materialId=2&status=1';

        PhalApi_Helper_TestRunner::go($url);

        $rs = PhalApi_Helper_TestRunner::go($url);

        $this->assertEquals('0', intval($rs));
    }

    /**
     * @group testCheckMaterial
     */
    public function testCheckMaterialWithChange()
    {
        $url = 'service=Storage.checkMaterial&materialId=2&status=1';

        PhalApi_Helper_TestRunner::go($url);

        $url = 'service=Storage.checkMaterial&materialId=2&status=0';

        $rs = PhalApi_Helper_TestRunner::go($url);

        $this->assertEquals('0', intval($rs));
    }

    /**
     * @group testCheckMaterial
     */
    public function testCheckMaterialWithWrongId()
    {
        $url = 'service=Storage.checkMaterial&materialId=498791&status=1';

        $rs = PhalApi_Helper_TestRunner::go($url);

        $this->assertEquals('0', intval($rs));
    }
}
