<?php

class Model_User extends PhalApi_Model_NotORM {

    public function getByUserId($userId) {
        return $this->getORM()
            ->select('*')
            ->where('id = ?', $userId)
            ->fetch();
    }

    public function getAllUsers() {
        return $this->getORM()
            ->select('*')
            ->fetchAll();
    }

}
