<?php

class Domain_User {

    public function getBaseInfo($userId) {
        $userId = intval($userId);
        $model = new Model_User();
        $rs = $model->getByUserId($userId);
        return $rs;
    }
}
