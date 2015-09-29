<?php

namespace Calculator;
use Calculator\Operation\OperationInterface;
/**
 * @author Kazi Tanvir Ahsan
 * 
 */
class Calculator {
  
  protected  $operation;
  private $operand = array(); 

  public function __construct() {
  }

  /**
   * @param array $operands
   */ 
  public function setOperand(array $operands = array()){
      $this->operand = $operands;
  }

  /**
   * @param OperationInterface $operation
   */
  public function setOperation(OperationInterface $operation) {
      $this->operation = $operation;
  }

  public function process() {
      return $this->operation->evaluate( $this->operand);
  }

} 

