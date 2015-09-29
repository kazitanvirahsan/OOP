<?php
namespace Calculator\Calculator;
class Calculator
{
    protected $operands = array();

    public function setOperands(array $operands = array())
    {
        $this->operands = $operands;
    }

    public function addOperand($operand)
    {
        $this->operands[] = $operand;
    }

    /**
     * You need any operation that implement the given interface
     */
    public function setOperation(OperationInterface $operation)
    {
        $this->operation = $operation;
    }

    public function process()
    {
        return $this->operation->evaluate($this->operands);
    }
}
