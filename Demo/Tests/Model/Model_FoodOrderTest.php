<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/4
 * Time: 20:09
 */

use PHPUnit\Framework\TestCase;
require_once dirname(__FILE__) . '/../test_env.php';

class Model_FoodOrderTest extends TestCase
{
    private $modelFoodOrder;

    protected function setUp():void
    {
        parent::setUp();

        $this->modelFoodOrder = new Model_FoodOrder();
    }

    protected function tearDown():void
    {
        unset($this->modelFoodOrder);
    }

    /**
     * @group testGetFoodOrderByOrderId
     */
    public function testGetFoodOrderByOrderId()
    {
        $orderId = '47';

        $rs = $this->modelFoodOrder->getFoodOrderByOrderId($orderId);

        $this->assertCount('3', $rs);
        $food = $rs[0];
        $this->assertArrayHasKey('id', $food);
        $this->assertArrayHasKey('orderId', $food);
        $this->assertArrayHasKey('foodId', $food);
        $this->assertArrayHasKey('num', $food);
        $this->assertArrayHasKey('price', $food);
        $this->assertArrayHasKey('createTime', $food);
        $this->assertArrayHasKey('updateTime', $food);
        $this->assertEquals('39', $food['id']);
    }

    /**
     * @group testInsertFoodOrder
     */
    public function testInsertFoodOrder()
    {
        $param = array();
        $param['id'] = '66';

        $rs = $this->modelFoodOrder->insertFoodOrder($param);

        $this->assertEquals('66', $rs['id']);

        $this->modelFoodOrder->delete($param);
    }
}
