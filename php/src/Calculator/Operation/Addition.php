<?php
namespace Calculator\Operation;
class Addition implements OperationInterface{
  /**
   * @param array $operand
   */
    public function evaluate(array $operand = array()) {
        return array_sum($operand);
    }
}