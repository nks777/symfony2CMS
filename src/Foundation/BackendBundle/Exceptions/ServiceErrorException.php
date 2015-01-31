<?php

namespace Foundation\BackendBundle\Exceptions;

/**
 * Description of ServiceErrorException
 *
 * @author nks
 */
class ServiceErrorException extends \Exception{
    
    public function __construct($message, $code=null, $previous=null) {
        parent::__construct($message, $code, $previous);
    }

}
