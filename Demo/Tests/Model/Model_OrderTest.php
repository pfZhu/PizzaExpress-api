<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/4
 * Time: 19:11
 */

use PHPUnit\Framework\TestCase;
require_once dirname(__FILE__) . '/../test_env.php';

class Model_OrderTest extends TestCase
{
    private $modelOrder;

    protected function setUp():void
    {
        parent::setUp();

        $this->modelOrder = new Model_Order();
    }

    protected function tearDown():void
    {
        unset($this->modelOrder);
    }

    /**
     * @group testGetOrderById
     */
    public function testGetOrderById()
    {
        $orderId = '47';

        $rs = $this->modelOrder->getOrderById($orderId);

        $this->assertNotNull($rs);
        $this->assertArrayHasKey('id', $rs);
        $this->assertArrayHasKey('userId', $rs);
        $this->assertArrayHasKey('factoryId', $rs);
        $this->assertArrayHasKey('price', $rs);
        $this->assertArrayHasKey('phone', $rs);
        $this->assertArrayHasKey('status', $rs);
        $this->assertArrayHasKey('materialId', $rs);
        $this->assertArrayHasKey('payTime', $rs);
        $this->assertArrayHasKey('arriveTime', $rs);
        $this->assertArrayHasKey('createTime', $rs);
        $this->assertArrayHasKey('updateTime', $rs);
        $this->assertArrayHasKey('outTradeId', $rs);
        $this->assertArrayHasKey('refundReason', $rs);
        $this->assertArrayHasKey('addressId', $rs);
        $this->assertEquals('12345678111', $rs['phone']);
    }

    /**
     * @group testUpdateOrderStatus
     */
    public function testUpdateOrderStatusWithChange()
    {
        $orderId = '47';
        $status = '1';

        $this->modelOrder->updateOrderStatus($orderId, $status);

        $rs = $this->modelOrder->updateOrderStatus($orderId, $status);

        $this->assertEquals('0', intval($rs));
    }

    /**
     * @group testUpdateOrderStatus
     */
    public function  testUpdateOrderStatusWithNoChange()
    {
        $orderId = '47';
        $status = '1';

        $this->modelOrder->updateOrderStatus($orderId, $status);

        $status = '0';

        $rs = $this->modelOrder->updateOrderStatus($orderId, $status);

        $this->assertEquals('1', intval($rs));
    }

    /**
     * @group testGetUncheckedOrder
     */
    public function testGetUncheckedOrder()
    {
        $rs = $this->modelOrder->getUncheckedOrder();

        $this->assertEmpty($rs);
    }

    /**
     * @group testGetOrderList
     */
    public function  testGetOrderList()
    {
        $rs = $this->modelOrder->getOrderList();

        $this->assertIsInt(intval( $rs));
    }

    /**
     * @group testUpdateOrderMaterialId
     */
    public function testUpdateOrderMaterialIdWithNoChange()
    {
        $materialId = '12,6,13';
        $orderId = '62';

        $this->modelOrder->updateOrderMaterialId($materialId, $orderId);

        $rs = $this->modelOrder->updateOrderMaterialId($materialId, $orderId);

        $this->assertEquals('0', $rs);
    }

    /**
     * @group testUpdateOrderMaterialId
     */
    public function testUpdateOrderMaterialIdWithChange()
    {
        $materialId = '12,6,13';
        $orderId = '62';

        $this->modelOrder->updateOrderMaterialId($materialId, $orderId);

        $materialId = '12,6,13,14';

        $rs = $this->modelOrder->updateOrderMaterialId($materialId, $orderId);

        $this->assertEquals('1', $rs);
    }

    /**
     * @group testInsertOrder
     */
    public function testInsertOrder()
    {
        $orderDate = array();
        $orderDate['id'] = '99';
        $orderDate['userId'] = '1';
        $orderDate['factoryId'] = '3';
        $orderDate['price'] = '99';
        $orderDate['phone'] = '92159';
        $orderDate['status'] = '1';
        $orderDate['materialId'] = '12';

        $rs = $this->modelOrder->insertOrder($orderDate);

        $id = $rs['id'];
        $this->assertEquals('99', $id);

        $param = array();
        $param['id'] = '99';
        $this->modelOrder->delete($param);
    }

    /**
     * @group testGetOrderByUserId
     */
    public function testGetOrderByUserId()
    {
        $userId = '4';

        $rs = $this->modelOrder->getOrderByUserId($userId);

        $this->assertIsInt( intval($rs));
    }

    /**
     * @group testGetAddressId
     */
    public function testGetAddressId()
    {
        $orderId = '47';

        $rs = $this->modelOrder->getAddressId($orderId);

        $this->assertEquals('1', $rs['addressId']);
    }
}
