<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/4
 * Time: 19:04
 */

use PHPUnit\Framework\TestCase;
require_once dirname(__FILE__) . '/../test_env.php';

class Model_ThresholdTest extends TestCase
{
    private $modelThreshold;

    protected function setUp():void
    {
        parent::setUp();

        $this->modelThreshold = new Model_Threshold();
    }

    protected function tearDown():void
    {
        unset($this->modelThreshold);
    }

    /**
     * @group testGetThresholdList
     */
    public function testGetThresholdList()
    {
        $rs = $this->modelThreshold->getThresholdList();

        $this->assertCount('8', $rs);
    }

    /**
     * @group testGetThreshold
     */
    public function testGetThreshold()
    {
        $materialName = '牛肉';

        $rs = $this->modelThreshold->getThreshold($materialName);

        $this->assertEquals('10.00', $rs['num']);
    }
}
