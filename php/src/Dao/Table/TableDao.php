<?php
namespace Dao\Table;
use Dao\Exception\NoRecordFoundException;

/*
 * This class is responsible to doing the CRUD operation
 * The constructor takes table name as a parameter 
 * and also accepts the database connection objects on which it has to work on
 */
class TableDao
{
    private $table;
    private $pk;
    private $dbcon;
    
    /*
     * @param  String $table
     * @return
     */
    public function __construct($table) {
        $this->table = $table;
    }
    

     /**
     * @param  String $dbcon
     * @return 
     */
    public function setDb($dbcon) {
        $this->dbcon = $dbcon;
    }
    
     /**
     * @param  Array $args
     */
    public function get($args = array()) {
    }
    
     /**
     * @param  String $id
     * @return Array  $record
     */
    public function findById($id) {
        $sql = "SELECT * FROM $this->table WHERE id=:id";
        $stmt = $this->dbcon->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $record = $stmt->fetch(\PDO::FETCH_ASSOC);
        
        if (!$record) throw new NoRecordFoundException();
        
        return $record;
    }
    
     /**
     * set Receipe Object
     * @param  Receipe\Receipe
     * @return Receipe\Cook\Cook
     */
    public function delete($id) {
        $sql = "DELETE FROM $this->table WHERE id=:id";
        $stmt = $this->dbcon->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $stmt->rowCount() ? true : false;
    }
    
     /**
     * @param  Array $args
     * @return String $id
     */
    public function save($args = array(), $id = null) {
        
        /**
         * This funciton inserts the record in the table. HOwever
         * if $id is set; it will result in an update query
         * $id primay key value
         */
        if (isset($id)) {
            $sql = $this->update($args, $id);
            $stmt = $this->dbcon->prepare($sql);
            foreach ($args as $key => & $value) {
                $stmt->bindParam(":{$key}", $value);
            }
            $stmt->execute();
            
            if (!$stmt->rowCount()) {
                throw InvalidArgumentException();
            }
            
            return true;
        }
        
        // do Insert
        $sql = $this->insert($args);
        $stmt = $this->dbcon->prepare($sql);
        foreach ($args as $key => & $value) {
            $stmt->bindParam(":{$key}", $value);
        }
        $stmt->execute();
        
        if (!$stmt->rowCount()) {
            throw new InvalidArgumentException();
        }
        
        return $this->dbcon->lastInsertId();
    }
    
    /**
     * @param  Array $args
     * @return String $sql
     */
    public function insert($args = array()) {
        $keys = array_keys($args);
        $sql = "INSERT INTO $this->table ( " . implode(",", $keys) . ") VALUES ( :" . implode(",:", $keys) . " ) ";
        return $sql;
    }
    
    /**
     * @param  Array $args
     * @return String $sql
     */
    public function update($args = array(), $id = null) {
        $id = intval($id);
        $keys = array_keys($args);
        $update = " ";
        foreach ($keys as $key) {
            $update = $update . " $key = :$key ,";
        }
        $update = rtrim($update, ",");
        $sql = "UPDATE $this->table SET $update WHERE id=$id";
        
        return $sql;
    }
    
     /**
     * @param 
     * @return String primay id as column name
     */
    public function getPk() {
        return strtolower($this->table . "_id");
    }
}
