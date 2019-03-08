<?php
/**
 * 后台管理-订单中心
 */

class Api_OrderCenter extends PhalApi_Api {

    public function getRules() {
        return array(
            'getOrderList' => array()
        );
    }

    /**
     * 获取所有订单
     * @desc 获取所有订单
     */
    public function getOrderList() {
        $domain = new Domain_Order();
        return $domain->getOrderList();
    }

}
