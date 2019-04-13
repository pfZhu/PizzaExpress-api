<?php
/**
 * Created by PhpStorm.
 * User: fenghuihuang
 * Date: 2019/3/29
 * Time: 19:44
 */

use PHPUnit\Framework\TestCase;
require_once dirname(__FILE__) . '/../test_env.php';

if (!class_exists('Domain_Food')) {
    require dirname(__FILE__) . '/./Demo/Domain/Food.php';
}

class Domain_FoodTest extends TestCase
{
    private $domainFood;

    function setUp():void
    {
        parent::setUp();

        $this->domainFood = new Domain_Food();

    }

    protected function tearDown():void
    {
        unset($this->domainFood);
    }

    /**
     * @group testGetFoodList
     */
    public function testGetFoodList()
    {
        $rs = $this->domainFood->getFoodList();

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
     * @group testInsertFood
     */
    public function testInsertFood()
    {
        $foodData = array();
        $foodData['id'] = '128';
        $foodData['name'] = 'duckduck';

        $rs = $this->domainFood->insertFood($foodData);

        $this->assertEquals('128', $rs['id']);
        $this->assertEquals('duckduck', $rs['name']);

        $model = new Model_Food();
        $param = array();
        $param['id'] = '128';
        $model->delete($param);
    }
}
