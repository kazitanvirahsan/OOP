<?php
namespace Dao\Database;
use Dao\Database\Database;
/*
 * This class mainly returns a PDO connection object for mysql database
 */
class MySqliDatabase implements Database
{
    private $connection;
    private static $instance = null;
    private $host = 'localhost';
    private $username = 'root';
    private $password = 'sa';
    private $database = 'test';
    
    /*
     * returns MySqliDatabase database object
     * @return Dao\Database\MySqliDatabase
     */
    public static function getInstance() {
        
        if (!self::$instance) {
            self::$instance = new self();
        }
        
        return self::$instance;
    }
    
    
    /*
     * constructor 
     */
    private function __construct() {
        try {
            $this->connection = new \PDO("mysql:dbname=$this->database;host=$this->host", $this->username, $this->password);
        }
        catch(PDOException $e) {
            echo 'Connection failed' . $e->getMessage();
        }
    }
    

     /**
     * Magic method clone is empty to prevent duplication of connection
     */
    private function __clone() {
    }
    
    
    /**
     * set Receipe Object
     * @return Dao\Database\MySqliDatabase
     */
    public function getConnection() {
        return $this->connection;
    }
}
