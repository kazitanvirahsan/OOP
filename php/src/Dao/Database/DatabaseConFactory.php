<?php
namespace Dao\Database;
use Dao\Database\MySqliDatabase;
class DatabaseConFactory
{
    protected $dbname;

     /**
     * set Receipe Object
     * @param  $dbname
     * @return Database Object or null
     */

    public function getConnection($dbname = null) {
        $this->dbname = $dbname;
        if ($this->dbname == null) {
            return null;
        }
        
        if (strcasecmp($this->dbname, 'mysqli') == 0) {
            
            $db = MySqliDatabase::getInstance();
            return $db->getConnection();
        }
    }
}
