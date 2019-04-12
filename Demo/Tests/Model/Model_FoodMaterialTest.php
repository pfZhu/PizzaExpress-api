<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/4
 * Time: 20:18
 */

use PHPUnit\Framework\TestCase;
require_once dirname(__FILE__) . '/../test_env.php';

class Model_FoodMaterialTest extends TestCase
{
    private $modelFoodMaterial;

    protected function setUp():void
    {
        parent::setUp();

        $this->modelFoodMaterial = new Model_FoodMaterial();
    }

    protected function tearDown():void
    {
        unset($this->modelFoodMaterial);
    }

    /**
     * @group testGetMaterialNameByFood
     */
    public function testGetMaterialNameByFood()
    {
        $foodId = '1';

        $rs = $this->modelFoodMaterial->getMaterialNameByFood($foodId);

        $this->assertCount('3', $rs);
        $this->assertEquals('牛肉', $rs[0]['materialName']);
        $this->assertEquals('鸡肉', $rs[1]['materialName']);
        $this->assertEquals('面饼', $rs[2]['materialName']);
    }

    /**
     * @group testGetMaterialNameAndAmountByFood
     */
    public function testGetMaterialNameAndAmountByFood()
    {
        $foodId = '1';

        $rs = $this->modelFoodMaterial->getMaterialNameAndAmountByFood($foodId);

        $this->assertCount('3', $rs);
        $this->assertEquals('牛肉', $rs[0]['materialName']);
        $this->assertEquals('0.50', $rs[0]['amount']);
        $this->assertEquals('鸡肉', $rs[1]['materialName']);
        $this->assertEquals('0.25', $rs[1]['amount']);
        $this->assertEquals('面饼', $rs[2]['materialName']);
        $this->assertEquals('1.00', $rs[2]['amount']);
    }
}
