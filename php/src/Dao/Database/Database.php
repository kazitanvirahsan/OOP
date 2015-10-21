<?php
namespace Dao\Database;
Interface Database {
    public static function getInstance();
    public function getConnection();
}
