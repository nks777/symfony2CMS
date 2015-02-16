<?php

namespace Foundation\BackendBundle\Filter;

/**
 * Description of FilterDecorator
 *
 * @author nks
 */
abstract class FilterDecorator implements Filter{
    
    private $nextFilter;
    
    public function __construct(Filter $nextFilter){
        $this->nextFilter = $nextFilter;
    }
    
    protected function getNextFilter(){
        return $this->nextFilter;
    }
    
    //chain of responsibility
    public function __call($name, $arguments) {
        call_user_func_array(array($this->getNextFilter(), $name), $arguments);
    }
}
