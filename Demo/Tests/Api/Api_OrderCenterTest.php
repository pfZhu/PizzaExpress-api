<?php
/**
 * Created by PhpStorm.
 * User: fenghuihuang
 * Date: 2019/3/29
 * Time: 22:26
 */

use PHPUnit\Framework\TestCase;
require_once dirname(__FILE__) . '/../test_env.php';

if (!class_exists('Api_OrderCenter')) {
    require dirname(__FILE__) . '/../../Demo/Api/OrderCenter.php';
}

class Api_OrderCenterTest extends TestCase
{
    public $apiOrderCenter;

    protected function setUp():void
    {
        parent::setUp();

        $this->apiOrderCenter = new Api_OrderCenter();
    }

    protected function tearDown():void
    {
        unset($this->apiOrderCenter);
    }

    /**
     * @group testGetRules
     */
    public function testGetRules()
    {
        $rs = $this->apiOrderCenter->getRules();

        $this->assertCount('1', $rs);
    }

    /**
     * @group testGetOrderList
     */
    public function testGetOrderList()
    {
        $url = 'service=OrderCenter.getOrderList';

        $rs = PhalApi_Helper_TestRunner::go($url);

        $this->assertIsInt(intval($rs));
    }
}
