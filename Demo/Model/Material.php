<?php
/**
 * Created by PhpStorm.
 * User: Ciel
 * Date: 2019/3/6
 * Time: 13:55
 */
class Model_Material extends PhalApi_Model_NotORM {

    public function getMaterialById($id) {
        return $this->getORM()
            ->select('*')
            ->where('id = ?', $id)
            ->fetchAll();
    }

}