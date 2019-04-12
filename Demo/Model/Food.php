<?php

class Model_Food extends PhalApi_Model_NotORM
{

    public function getCategoryList()
    {
        $sql = 'select * from foodcategory';
        $rs = DI()->notorm->user->queryAll($sql);
        return $rs;
    }

    public function getFoodsByCategory($cg)
    {
        $sql = 'select * from food where food.categoryId=\'%s\' and food.expired = 0';
        $sql=sprintf($sql,$cg);
        $rs = DI()->notorm->user->queryRows($sql);
        return $rs;
    }

    public function getFoodsByCategoryAll($cg)
    {
        $sql = 'select * from food where food.categoryId=\'%s\'';
        $sql=sprintf($sql,$cg);
        $rs = DI()->notorm->user->queryRows($sql);
        return $rs;
    }

    public function getFoodNameById($id) {
        return $this->getORM()
            ->select('name')
            ->where('id = ?', $id)
            ->fetch();
    }

    public function insertFood($data) {
        return $this->getORM()
            ->insert($data);
    }

    public function expireFood($id) {
        $data = array('expired' => 1);
        return $this->getORM()
            ->where('id = ?', $id)
            ->update($data);
    }

    public function availFood($id) {
        $data = array('expired' => 0);
        return $this->getORM()
            ->where('id = ?', $id)
            ->update($data);
    }
}