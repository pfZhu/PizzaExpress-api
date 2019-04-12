<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/4
 * Time: 20:26
 */

use PHPUnit\Framework\TestCase;
require_once dirname(__FILE__) . '/../test_env.php';

class Model_FoodCategoryTest extends TestCase
{
    private $modelFoodCategory;

    protected function setUp():void
    {
        parent::setUp();

        $this->modelFoodCategory = new Model_FoodCategory();
    }

    protected function tearDown():void
    {
        unset($this->modelFoodCategory);
    }

    /**
     * @group testGetAll
     */
    public function testGetAll()
    {
        $rs = $this->modelFoodCategory->getAll();

        $this->assertCount('14', $rs);
    }
}
