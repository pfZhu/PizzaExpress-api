<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/4
 * Time: 19:45
 */

use PHPUnit\Framework\TestCase;
require_once dirname(__FILE__) . '/../test_env.php';

class Model_MaterialTest extends TestCase
{
    private $modelMaterial;

    protected function setUp():void
    {
        parent::setUp();

        $this->modelMaterial = new Model_Material();
    }

    protected function tearDown():void
    {
        unset($this->modelMaterial);
    }

    /**
     * @group testGetListByFactoryId
     */
    public function testGetListByFactoryId()
    {
        $factoryId = '2';

        $rs = $this->modelMaterial->getListByFactoryId($factoryId);

        $this->assertIsInt(intval( $rs));
    }

    /**
     * @group testCheckMaterial
     */
    public function testCheckMaterialWithNoChange()
    {
        $materialId = '2';
        $status = '1';

        $this->modelMaterial->checkMaterial($materialId, $status);

        $rs = $this->modelMaterial->checkMaterial($materialId, $status);

        $this->assertEquals('0', intval($rs));
    }

    /**
     * @group testCheckMaterial
     */
    public function testCheckMaterialWithChange()
    {
        $materialId = '2';
        $status = '1';

        $this->modelMaterial->checkMaterial($materialId, $status);

        $status = '0';

        $rs = $this->modelMaterial->checkMaterial($materialId, $status);

        $this->assertEquals('0', intval($rs));
    }

    /**
     * @group testReduceAmountById
     */
    public function testReduceAmountByIdWithNoReduce()
    {
        $materialId = '2';
        $amount = '0';

        $rs = $this->modelMaterial->reduceAmountById($materialId, $amount);

        $this->assertEquals('0', $rs);
    }

    /**
     * @group testReduceAmountById
     */
    public function testReduceAmountByIdWithReduce()
    {
        $materialId = '2';
        $amount = '1';

        $rs = $this->modelMaterial->reduceAmountById($materialId, $amount);

        $this->assertEquals('1', $rs);
    }

    /**
     * @group testAddMaterial
     */
    public function testAddMaterial()
    {
        $param = array();
        $param['id'] = '18';
        $param['name'] = 'adsfas';

        $rs = $this->modelMaterial->addMaterial($param);

        $this->assertEquals('18', $rs['id']);
    }

    /**
     * @group testUpdateMaterial
     */
    public function testUpdateMaterial()
    {
        $materialId = '18';
        $param = array();
        $param['name'] = 'adfdfd';

        $rs = $this->modelMaterial->updateMaterial($materialId, $param);

        $this->assertEquals('1', $rs);
    }

    /**
     * @group testDeleteMaterial
     */
    public function testDeleteMaterial()
    {
        $materialId = '18';

        $rs = $this->modelMaterial->DeleteMaterial($materialId);

        $this->assertEquals('1', $rs);
    }

    /**
     * @group testGetMaterialId
     */
    public function testGetMaterialId()
    {
        $materialName = '鸡肉';
        $factoryId = '2';

        $rs = $this->modelMaterial->getMaterialId($materialName, $factoryId);

        $this->assertEquals('2', $rs['id']);
    }

    /**
     * @group testInsertMaterial
     */
    public function testInsertMaterial()
    {
        $materialData = array();
        $materialData['id'] = '18';
        $materialData['factoryId'] = '2';
        $materialData['name'] = 'dafasf';

        $rs = $this->modelMaterial->insertMaterial($materialData);

        $this->assertEquals('18', $rs['id']);
        $model = new Model_Material();
        $model->deleteMaterial('18');
    }

    /**
     * @group testCheckForWarning
     */
    public function testCheckForWarning()
    {
        $materialName = '榴莲';
        $factoryId = '2';

        $rs = $this->modelMaterial->checkForWarning($materialName, $factoryId);

        $this->assertNull( $rs['id']);
    }
}
