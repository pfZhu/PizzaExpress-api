<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/4
 * Time: 18:32
 */

use PHPUnit\Framework\TestCase;
require_once dirname(__FILE__) . '/../test_env.php';

class Model_WarningTest extends TestCase
{
    private $modelWarning;

    protected function setUp():void
    {
        parent::setUp();

        $this->modelWarning = new Model_Warning();
    }

    protected function tearDown():void
    {
        unset($this->modelWarning);
    }

    /**
     * @group testGetWarningById
     */
    public function testGetWarningById()
    {
        $warningId = '2';

        $rs = $this->modelWarning->getWarningById($warningId);

        $this->assertArrayHasKey('id', $rs);
        $this->assertArrayHasKey('factoryId', $rs);
        $this->assertArrayHasKey('materialName', $rs);
        $this->assertArrayHasKey('status', $rs);
        $this->assertArrayHasKey('createTime', $rs);
        $this->assertArrayHasKey('updateTime', $rs);

        $this->assertEquals($warningId, $rs['id']);

    }

    /**
     * @group testGetAllWarnings
     */
    public function testGetAllWarnings()
    {
        $rs = $this->modelWarning->getAllWarnings();

        $this->assertIsInt(intval($rs));
    }

    /**
     * @group testGetUncheckedWarnings
     */
    public function testGetUncheckedWarnings()
    {
        $rs = $this->modelWarning->getUncheckedWarnings();

        $this->assertIsInt(intval($rs));
    }

    /**
     * @group testIsDuplicate
     */
    public function testIsDuplicateWithExisted()
    {
        $materialName = '牛肉';
        $factoryId = '3';
        $rs = $this->modelWarning->isDuplicate($materialName, $factoryId);

        $this->assertTrue($rs);
    }

    /**
     * @group testIsDuplicate
     */
    public function testIsDuplicateWithNotExisted()
    {
        $strs="QWERTYUIOPASDFGHJKLZXCVBNM1234567890qwertyuiopasdfghjklzxcvbnm";
        $materialName = substr(str_shuffle($strs),mt_rand(0,strlen($strs)-11),10);
        $factoryId = '3';
        $rs = $this->modelWarning->isDuplicate($materialName, $factoryId);

        $this->assertFalse($rs);
    }

    /**
     * @group testInsertWarning
     */
    public function testInsertWarning()
    {
        $materialName = '牛546肉';
        $factoryId = '3';
        $rs = $this->modelWarning->insertWarning($materialName, $factoryId);

        $this->assertEquals($materialName, $rs['materialName']);
    }
}
