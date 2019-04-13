<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/4
 * Time: 20:29
 */

use PHPUnit\Framework\TestCase;
require_once dirname(__FILE__) . '/../test_env.php';

class Model_FoodTest extends TestCase
{
    private $modelFood;

    protected function setUp():void
    {
        parent::setUp();

        $this->modelFood = new Model_Food();
    }

    protected function tearDown():void
    {
        unset($this->modelFood);
    }

    /**
     * @group testGetCategoryList
     */
    public function testGetCategoryList()
    {
        $rs = $this->modelFood->getCategoryList();

        $this->assertCount('14', $rs);
    }

    /**
     * @group testGetFoodsByCategory
     */
    public function testGetFoodsByCategory()
    {
        $cg = '4556528';

        $rs = $this->modelFood->getFoodsByCategory($cg);

        $this->assertCount('21', $rs);
    }

    /**
     * @group testGetFoodNameById
     */
    public function testGetFoodNameById()
    {
        $id = '7';

        $rs = $this->modelFood->getFoodNameById($id);

        $this->assertEquals('美乐嫩汁鸡块', $rs['name']);
    }

    /**
     * @group testInsertFood
     */
    public function testInsertFood()
    {
        $foodData = array();
        $foodData['id'] = '128';
        $foodData['name'] = 'duckduck';

        $rs = $this->modelFood->insertFood($foodData);

        $this->assertEquals('128', $rs['id']);
        $this->assertEquals('duckduck', $rs['name']);

        $model = new Model_Food();
        $param = array();
        $param['id'] = '128';
        $model->delete($param);
    }
}
