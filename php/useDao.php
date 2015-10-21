<?php
require ('vendor\autoload.php');
use Dao\Database\DatabaseConFactory;
use Dao\Table\TableDao;

$dbFactory = new DatabaseConFactory();
$mysqli = $dbFactory->getConnection('mysqli');

$table = new TableDao('polls_person');
$table->setDb($mysqli);

// Do an insert operation and get the newly inserted id
$id = $table->save(array('first_name' => 'add me modified'));

// Do a update operation
$table->save(array('first_name' => 'I am changed'), $id);

// Return the record based on id and print it
$record = $table->findById('4050');
print_r($record);

// Finally Delete it
$table->delete(2);
