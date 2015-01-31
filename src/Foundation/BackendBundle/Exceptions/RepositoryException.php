<?php

namespace Foundation\BackendBundle\Exceptions;

/**
 * Description of RepositoryException
 *
 * @author nks
 */
class RepositoryException extends \Exception{
    
    public function __construct($message, $code=null, $previous=null) {
        parent::__construct($message, $code, $previous);
    }
}
