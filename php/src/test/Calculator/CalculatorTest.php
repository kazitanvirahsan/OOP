<?php
 use Calculator\Calculator;
 use Calculator\Operation\Addition;
 class CalculatorTest extends PHPUnit_Framework_testCase{
   public function testifobjectequals(){
      $calculator_obj  = new Calculator();
      $calculator_obj->setOperand(array(4,2));
      $calculator_obj->setOperation(new Addition);
      $this->assertEquals(6 , (int)$calculator_obj->process());
   }
 }