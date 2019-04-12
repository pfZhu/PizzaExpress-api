<?php
/**
 * Created by PhpStorm.
 * User: fenghuihuang
 * Date: 2019/3/29
 * Time: 22:43
 */

use PHPUnit\Framework\TestCase;
require_once dirname(__FILE__) . '/../test_env.php';

if (!class_exists('Api_Storage')) {
    require dirname(__FILE__) . '/../../Demo/Api/Storage.php';
}

class Api_OrderTest extends TestCase
{
    public $apiOrder;

    protected function setUp():void
    {
        parent::setUp();

        $this->apiOrder = new Api_Order();
    }

    protected function tearDown():void
    {
        unset($this->apiOrder);
    }

    /**
     * @group testGetRules
     */
    public function testGetRules()
    {
        $rs = $this->apiOrder->getRules();

        $this->assertCount('5', $rs);
    }

    /**
     * @group testGetBaseInfo
     */
    public function testGetBaseInfoWithRightId()
    {
        $url = 'service=Order.getBaseInfo&order_id=47';

        $rs = PhalApi_Helper_TestRunner::go($url);

        $this->assertEquals('1', $rs['userId']);
    }

    /**
     * @group testGetBaseInfo
     */
    public function testGetBaseInfoWithWrongId()
    {
        $url = 'service=Order.getBaseInfo&order_id=999';

        $rs = PhalApi_Helper_TestRunner::go($url);

        $this->assertIsInt(intval($rs));
    }

    /**
     * @group testUpdateOrderStatus
     */
    public function testUpdateOrderStatusWithNoChange()
    {
        $url = 'service=Order.updateOrderStatus&order_id=47&status=1';

        PhalApi_Helper_TestRunner::go($url);

        $rs = PhalApi_Helper_TestRunner::go($url);

        $this->assertEquals('0',$rs);
    }

    /**
     * @group testUpdateOrderStatus
     */
    public function testUpdateOrderStatusWithChange()
    {
        $url = 'service=Order.updateOrderStatus&order_id=47&status=1';

        PhalApi_Helper_TestRunner::go($url);


        $url = 'service=Order.updateOrderStatus&order_id=47&status=0';

        $rs = PhalApi_Helper_TestRunner::go($url);

        $this->assertEquals('1',$rs);
    }

    /**
     * @group testUpdateOrderStatus
     */
    public function testUpdateOrderStatusWithWrongId()
    {
        $url = 'service=Order.updateOrderStatus&order_id=4745646&status=1';

        $rs = PhalApi_Helper_TestRunner::go($url);

        $this->assertEquals('0',$rs);
    }

    /**
     * @group testCancelOrder
     */
    public function testCancelOrderWithNoPay()
    {
        $url = 'service=Order.updateOrderStatus&order_id=50&status=0';

        PhalApi_Helper_TestRunner::go($url);

        $url = 'service=Order.cancelOrder&order_id=50';

        $rs = PhalApi_Helper_TestRunner::go($url);

        $this->assertEquals('1',$rs);
    }

    /**
     * @group testCancelOrder
     */
    public function testCancelOrderWithPay()
    {
        $url = 'service=Order.updateOrderStatus&order_id=50&status=1';

        PhalApi_Helper_TestRunner::go($url);

        $url = 'service=Order.cancelOrder&order_id=50';

        $rs = PhalApi_Helper_TestRunner::go($url);

        $this->assertEquals('1',$rs);
    }

    /**
     * @group testCancelOrder
     */
    public function testCancelOrderWithOtherStatus1()
    {
        $url = 'service=Order.updateOrderStatus&order_id=50&status=-2';

        PhalApi_Helper_TestRunner::go($url);

        $url = 'service=Order.cancelOrder&order_id=50';

        $this->expectExceptionMessage("非法请求：订单已取消或已接单，无法取消。");
        $rs = PhalApi_Helper_TestRunner::go($url);
    }

    /**
     * @group testCancelOrder
     */
    public function testCancelOrderWithOtherStatus2()
    {
        $url = 'service=Order.updateOrderStatus&order_id=50&status=-1';

        PhalApi_Helper_TestRunner::go($url);

        $url = 'service=Order.cancelOrder&order_id=50';

        $this->expectExceptionMessage("非法请求：订单已取消或已接单，无法取消。");
        $rs = PhalApi_Helper_TestRunner::go($url);
    }

    /**
     * @group testCancelOrder
     */
    public function testCancelOrderWithOtherStatus3()
    {
        $url = 'service=Order.updateOrderStatus&order_id=50&status=2';

        PhalApi_Helper_TestRunner::go($url);

        $url = 'service=Order.cancelOrder&order_id=50';

        $this->expectExceptionMessage("非法请求：订单已取消或已接单，无法取消。");
        $rs = PhalApi_Helper_TestRunner::go($url);
    }

    /**
     * @group testCancelOrder
     */
    public function testCancelOrderWithOtherStatus4()
    {
        $url = 'service=Order.updateOrderStatus&order_id=50&status=3';

        PhalApi_Helper_TestRunner::go($url);

        $url = 'service=Order.cancelOrder&order_id=50';

        $this->expectExceptionMessage("非法请求：订单已取消或已接单，无法取消。");
        $rs = PhalApi_Helper_TestRunner::go($url);
    }

    /**
     * @group testCancelOrder
     */
    public function testCancelOrderWithOtherStatus5()
    {
        $url = 'service=Order.updateOrderStatus&order_id=50&status=4';

        PhalApi_Helper_TestRunner::go($url);

        $url = 'service=Order.cancelOrder&order_id=50';

        $this->expectExceptionMessage("非法请求：订单已取消或已接单，无法取消。");
        $rs = PhalApi_Helper_TestRunner::go($url);
    }

    /**
     * @group testGetUnchecked
     */
    public function testGetUnchecked()
    {
        $url = 'service=Order.getUnchecked';

        $rs = PhalApi_Helper_TestRunner::go($url);

        $this->assertEmpty($rs);
    }

    /**
     * @group testAssignFactory
     */
    public function testAssignFactory()
    {
        $x = '0';
        $y = '0';

        $rs = $this->apiOrder->assignFactory($x, $y);

        $this->assertEquals('3',$rs);

        $x = '0';
        $y = '50';

        $rs = $this->apiOrder->assignFactory($x, $y);

        $this->assertEquals('1',$rs);

        $x = '200';
        $y = '0';

        $rs = $this->apiOrder->assignFactory($x, $y);

        $this->assertEquals('4',$rs);

        $x = '200';
        $y = '50';

        $rs = $this->apiOrder->assignFactory($x, $y);

        $this->assertEquals('2',$rs);
    }


    /**
     * @group testGetInfoById
     */
    public function testGetInfoById()
    {
        $orderId = '47';

        $rs = $this->apiOrder->getInfoById($orderId);

        $this->assertEquals('12345678111', $rs['phone']);
    }

    /**
     * @group testReduceMaterial
     */
    public function testReduceMaterialWithNoReduce()
    {
        $foodIdArr = array(3);
        $factoryId = '4';

        $rs = $this->apiOrder->reduceMaterial($foodIdArr, $factoryId);

        $this->assertNotEmpty($rs);
    }


    /**
     * @group testUpdateOrderMaterialId
     */
    public function testUpdateOrderMaterialIdWithNoChange()
    {
        $materialIdArr = array();
        for ($i = 0; $i< 5 ; $i++) {
            array_push($materialIdArr, array('id'=>$i));
        }
        $orderId = '62';

        $this->apiOrder->updateOrderMaterialId($materialIdArr, $orderId);

        $rs = $this->apiOrder->updateOrderMaterialId($materialIdArr, $orderId);

        $this->assertEquals('0', $rs);
    }

    /**
     * @group testUpdateOrderMaterialId
     */
    public function testUpdateOrderMaterialIdWithChange()
    {
        $materialIdArr = array();
        for ($i = 0; $i< 5 ; $i++) {
            array_push($materialIdArr, array('id'=>$i));
        }
        $orderId = '62';

        $this->apiOrder->updateOrderMaterialId($materialIdArr, $orderId);

        $materialIdArr = array();
        for ($i = 0; $i< 6 ; $i++) {
            array_push($materialIdArr, array('id'=>$i));
        }

        $rs = $this->apiOrder->updateOrderMaterialId($materialIdArr, $orderId);

        $this->assertEquals('1', $rs);
    }

    /**
     * @group testInsertMaterial
     */
    public function testInsertMaterial()
    {
        $factoryId = '1';
        $name = 'fasdf';
        $amount = '1132';
        $supplierId = '1';
        $trackId = null;
        $status = '1';
        $checkTime = null;

        $rs = $this->apiOrder->insertMaterial($factoryId, $name, $amount, $supplierId, $trackId, $status, $checkTime);

        $this->assertEquals('fasdf', $rs['name']);
    }


    /**
     * @group testGetOrderByUserId
     */
    public function testGetOrderByUserId()
    {
        $url = 'service=Order.getOrderByUserId&userId=4';

        $rs = PhalApi_Helper_TestRunner::go($url);

        $this->assertIsInt(intval($rs));
    }

    /**
     * @group testCheckForWarning
     */
    public function testCheckForWarning()
    {
        $foodIdArr = array(3);
        $factoryId = '4';

        $rs = $this->apiOrder->checkForWarning($foodIdArr, $factoryId);

        $this->assertEmpty($rs);
    }

    /**
     * @group testCheckForWarning
     */
    public function testCreateOrder()
    {
        $url = 'service=Order.createOrder&addressId=4&userId=4&price=4&phone=111&food[0][foodId]=7&food[0][num]=1&food[0][price]=4';

        $rs = PhalApi_Helper_TestRunner::go($url);

        $this->assertIsInt(intval($rs));

        $this->assertNotEmpty($rs);
    }
}
