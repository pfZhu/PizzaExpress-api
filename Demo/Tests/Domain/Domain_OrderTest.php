<?php
/**
 * Created by PhpStorm.
 * User: fenghuihuang
 * Date: 2019/3/29
 * Time: 10:57
 */

use PHPUnit\Framework\TestCase;
require_once dirname(__FILE__) . '/../test_env.php';

if (!class_exists('Domain_Order')) {
    require dirname(__FILE__) . '/./Demo/Domain/Order.php';
}

class Domain_OrderTest extends TestCase
{
    private $domainOrder;

    function setUp():void
    {
        parent::setUp();

        $this->domainOrder = new Domain_Order();

    }

    protected function tearDown():void
    {
        unset($this->domainOrder);
    }

    /**
     * @group testGetBaseInfo
     */
    public function testGetBaseInfo()
    {
        $orderId = '47';

        $rs = $this->domainOrder->getBaseInfo($orderId);

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

        $this->assertArrayHasKey('factoryName', $rs);
        $this->assertEquals("3号工厂", $rs['factoryName']);

        $this->assertArrayHasKey('foodOrder', $rs);
        $foodOrder = $rs['foodOrder'];
        $this->assertCount('3', $foodOrder);

        $this->assertNotNull($foodOrder[0]);
        $food = $foodOrder[0];
        $this->assertArrayHasKey('id', $food);
        $this->assertArrayHasKey('orderId', $food);
        $this->assertArrayHasKey('foodId', $food);
        $this->assertArrayHasKey('num', $food);
        $this->assertArrayHasKey('price', $food);
        $this->assertArrayHasKey('createTime', $food);
        $this->assertArrayHasKey('updateTime', $food);
        $this->assertArrayHasKey('foodName', $food);
        $this->assertEquals('39', $food['id']);
    }

    /**
     * @group testUpdateOrderStatus
     */
    public function testUpdateOrderStatusWithChange()
    {
        $orderId = '47';
        $status = '1';

        $this->domainOrder->updateOrderStatus($orderId, $status);

        $rs = $this->domainOrder->updateOrderStatus($orderId, $status);

        $this->assertEquals('0', intval($rs));
    }

    /**
     * @group testUpdateOrderStatus
     */
    public function  testUpdateOrderStatusWithNoChange()
    {
        $orderId = '47';
        $status = '1';

        $this->domainOrder->updateOrderStatus($orderId, $status);

        $status = '0';

        $rs = $this->domainOrder->updateOrderStatus($orderId, $status);

        $this->assertEquals('1', intval($rs));
    }

    /**
     * @group testGetUncheckedOrder
     */
    public function testGetUncheckedOrder()
    {
        $rs = $this->domainOrder->getUncheckedOrder();

        $this->assertEmpty($rs);
    }

    /**
     * @group testGetOrderList
     */
    public function  testGetOrderList()
    {
        $rs = $this->domainOrder->getOrderList();

        $this->assertIsInt(intval($rs));
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

        $rs = $this->domainOrder->insertOrder($orderDate);

        $id = $rs['id'];
        $this->assertEquals('99', $id);

        $param = array();
        $param['id'] = '99';
        $model = new Model_Order();
        $model->delete($param);
    }

    /**
     * @group testInsertFoodOrder
     */
    public function  testInsertFoodOrder()
    {
        $foodOrderData = array();
        $foodOrderData['id'] = '99';
        $foodOrderData['orderId'] = '99';
        $foodOrderData['foodId'] = '17';
        $foodOrderData['num'] = '1';
        $foodOrderData['price'] = '15.00';
        $date=new DateTime();
        $foodOrderData['createTime'] = $datetime=$date->format("Y-m-d H:i:s");;

        $rs = $this->domainOrder->insertFoodOrder($foodOrderData);

        $id = $rs['id'];
        $this->assertEquals('99', $id);

        $param = array();
        $param['id'] = '99';
        $model = new Model_FoodOrder();
        $model->delete($param);
    }

    /**
     * @group testReduceMaterialAmount
     */
    public function testReduceMaterialAmountWithNoReduce()
    {
        $materialId = '2';
        $amount = '0';

        $rs = $this->domainOrder->reduceMaterialAmount($materialId, $amount);

        $this->assertEquals('0', $rs);
    }

    /**
     * @group testReduceMaterialAmount
     */
    public function testReduceMaterialAmountWithReduce()
    {
        $materialId = '2';
        $amount = '1';

        $rs = $this->domainOrder->reduceMaterialAmount($materialId, $amount);

        $this->assertEquals('1', $rs);
    }

    /**
     * @group testGetMaterialNameAndAmount
     */
    public function testGetMaterialNameAndAmount()
    {
        $foodId = '1';

        $rs = $this->domainOrder->getMaterialNameAndAmount($foodId);


        $this->assertEquals('牛肉', $rs[0]['materialName']);
        $this->assertEquals('0.50', $rs[0]['amount']);
    }

    /**
     * @group testGetMaterialId
     */
    public function testGetMaterialId()
    {
        $materialName = '鸡肉';
        $factoryId = '2';

        $rs = $this->domainOrder->getMaterialId($materialName, $factoryId);

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

        $rs = $this->domainOrder->insertMaterial($materialData);

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

        $rs = $this->domainOrder->checkForWarning($materialName, $factoryId);

        $this->assertNull( $rs['id']);
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

        $this->domainOrder->updateOrderMaterialId($materialIdArr, $orderId);

        $rs = $this->domainOrder->updateOrderMaterialId($materialIdArr, $orderId);

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

        $this->domainOrder->updateOrderMaterialId($materialIdArr, $orderId);

        $materialIdArr = array();
        for ($i = 0; $i< 6 ; $i++) {
            array_push($materialIdArr, array('id'=>$i));
        }

        $rs = $this->domainOrder->updateOrderMaterialId($materialIdArr, $orderId);

        $this->assertEquals('1', $rs);
    }

    /**
     * @group testInsertWarning
     */
    public function testInsertWarningWithDuplicate()
    {
        $materialName = '牛肉';
        $factoryId = '3';

        $rs = $this->domainOrder->insertWarning($materialName, $factoryId);

        $this->assertEquals('0', $rs);
    }

    /**
     * @group testInsertWarning
     */
    public function testInsertWarningWithoutDuplicate()
    {
        $strs="QWERTYUIOPASDFGHJKLZXCVBNM1234567890qwertyuiopasdfghjklzxcvbnm";
        $materialName = substr(str_shuffle($strs),mt_rand(0,strlen($strs)-11),10);
        $factoryId = '3';

        $rs = $this->domainOrder->insertWarning($materialName, $factoryId);

        $this->assertEquals($materialName, $rs['materialName']);
    }

    /**
     * @group testGetOrderByUserId
     */
    public function testGetOrderByUserId()
    {
        $userId = '4';

        $rs = $this->domainOrder->getOrderByUserId($userId);

        $this->assertIsInt(intval( $rs));
    }

    /**
     * @group testGetLng
     */
    public function testGetLng()
    {
        $id = '4';

        $rs = $this->domainOrder->getLng($id);

        $this->assertEquals('12.51', $rs['lng']);
    }

    /**
     * @group testGetLat
     */
    public function testGetLat()
    {
        $id = '4';

        $rs = $this->domainOrder->getLat($id);

        $this->assertEquals('31.29', $rs['lat']);
    }
}
