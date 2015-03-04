<?php

namespace Marvel;

class Helicarrier {

    public function __construct() {
        $this->conn = array();
    }

    public function query($sql) {
        return array();
    }

    public static function getConnection() {
        echo 'getConnection';
        return new Helicarrier();
    }
}