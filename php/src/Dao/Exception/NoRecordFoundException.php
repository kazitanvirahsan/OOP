<?php
namespace Dao\Exception;
class NoRecordFoundException extends \Exception
{
    
    // Redefine the exception so message isn't optional
    public function __construct($message, $code = 0, Exception $previous = null) {
        
        // some code
        if ($message == '') {
            $message = "No Such Record Found Exception";
        }
        
        // make sure everything is assigned properly
        parent::__construct($message, $code, $previous);
    }
    
    // custom string representation of object
    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}
