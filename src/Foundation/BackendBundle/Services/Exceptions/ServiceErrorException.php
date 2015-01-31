<?php

namespace Foundation\BackendBundle\Services\Exceptions;

/**
 * Description of ServiceErrorException
 *
 * @author nks
 */
class ServiceErrorException extends \Exception{
    
    public static $PARAMETER_NAME = 'serviceError';
    
    public function __construct($message, $code=null, $previous=null) {
        parent::__construct($message, $code, $previous);
    }

}
