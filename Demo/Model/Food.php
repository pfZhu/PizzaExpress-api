<?php

class Model_Food extends PhalApi_Model_NotORM
{

    public function getCategoryList()
    {
        $sql = 'select * from foodCategory';
        $rs = DI()->notorm->user->queryAll($sql);
        return $rs;
    }

    public function getFoodsByCategory($cg)
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
}