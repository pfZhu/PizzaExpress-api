<?php
/**
 * Created by PhpStorm.
 * User: Ciel
 * Date: 2019/3/13
 * Time: 13:34
 */
class Model_Warning extends PhalApi_Model_NotORM {

    public function getWarningById($warningId) {
        return $this->getORM()
            ->select('*')
            ->where('id = ?', $warningId)
            ->fetch();
    }

    public function getAllWarnings() {
        return $this->getORM()
            ->select('*')
            ->fetchAll();
    }

    public function getUncheckedWarnings() {
        return $this->getORM()
            ->select('*')
            ->where('status = ?', 0)
            ->fetchAll();
    }

    public function isDuplicate($materialName, $factoryId) {
        $rs = $this->getORM()
            ->select('*')
            ->where('materialName = ?', $materialName)
            ->where('factoryId = ?', $factoryId)
            ->where('status = ?', 0)
            ->count();
        return $rs > 0;
    }

    public function insertWarning($materialName, $factoryId) {
        $data = array(
            'factoryId' => $factoryId,
            'materialName' => $materialName,
            'status' => 0
        );
        return $this->getORM()
            ->insert($data);
    }

}