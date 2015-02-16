<?php

namespace Foundation\BackendBundle\Filter;

use Foundation\BackendBundle\Filter\Filter;
use Doctrine\Common\Collections\Criteria;
use Foundation\BackendBundle\Exceptions\ServiceErrorException;
/**
 * Description of EmptyFilter
 *
 * @author nks
 */
class EmptyFilter implements Filter{

    public function getCriteria() {
        return Criteria::create();
    }

    public function getRenderData() {
        return array();
    }
    
    //endpoint of the chain of responsibility
    public function __call($name, $arguments) {
        throw new ServiceErrorException("Can't found method $name in chain!");
    }

}
