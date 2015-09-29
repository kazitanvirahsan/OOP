<?php
include('bootstrap.php');
use Calculator\Calculator;
use Calculator\Operation\Addition;

$calculator_obj  = new Calculator();
$calculator_obj->setOperand(array(4,2));
$calculator_obj->setOperation(new Addition);
echo $calculator_obj->process();
