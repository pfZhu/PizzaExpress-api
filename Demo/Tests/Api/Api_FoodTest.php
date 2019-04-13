<?php
/**
 * Created by PhpStorm.
 * User: fenghuihuang
 * Date: 2019/3/29
 * Time: 22:31
 */

use PHPUnit\Framework\TestCase;
require_once dirname(__FILE__) . '/../test_env.php';

if (!class_exists('Api_Food')) {
    require dirname(__FILE__) . '/../../Demo/Api/Food.php';
}

class Api_FoodTest extends TestCase
{
    public $apiFood;

    protected function setUp():void
    {
        parent::setUp();

        $this->apiFood = new Api_Food();
    }

    protected function tearDown():void
    {
        unset($this->apiFood);
    }

    /**
     * @group testGetRules
     */
    public function testGetRules()
    {
        $rs = $this->apiFood->getRules();

        $this->assertCount('3', $rs);
    }

    /**
     * @group testGetCategoryList
     */
    public function testGetCategoryList()
    {
        $url = 'service=Food.getCategoryList';

        $rs = PhalApi_Helper_TestRunner::go($url);

        $this->assertCount('14', $rs);
    }

    /**
     * @group testGetFoodList
     */
    public function testGetFoodList()
    {
        $url = 'service=Food.getFoodList';

        $rs = PhalApi_Helper_TestRunner::go($url);

        $this->assertCount('14', $rs);
        $this->assertCount('21', $rs[0]['foods']);
        $this->assertCount('7', $rs[1]['foods']);
        $this->assertCount('3', $rs[2]['foods']);
        $this->assertCount('5', $rs[3]['foods']);
        $this->assertCount('8', $rs[4]['foods']);
        $this->assertCount('4', $rs[5]['foods']);
        $this->assertCount('7', $rs[6]['foods']);
        $this->assertCount('8', $rs[7]['foods']);
        $this->assertCount('11', $rs[8]['foods']);
        $this->assertCount('10', $rs[9]['foods']);
        $this->assertCount('7', $rs[10]['foods']);
        $this->assertCount('9', $rs[11]['foods']);
        $this->assertCount('14', $rs[12]['foods']);
        $this->assertCount('2', $rs[13]['foods']);
    }

    /**
    * @group testCreateFood
    */
    public function testCreateFood()
    {
        $url = 'service=Food.createFood&data[id]=998&data[name]=duckduck1';

        $rs = PhalApi_Helper_TestRunner::go($url);

        $this->assertEquals('998', $rs['id']);
        $this->assertEquals('duckduck1', $rs['name']);

        $model = new Model_Food();
        $param = array();
        $param['id'] = '998';
        $model->delete($param);
    }
}
