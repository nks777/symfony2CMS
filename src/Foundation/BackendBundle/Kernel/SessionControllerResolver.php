<?php
namespace Foundation\BackendBundle\Kernel;

use JMS\DiExtraBundle\HttpKernel\ControllerResolver as JMSControllerResolver;

use JMS\DiExtraBundle\Annotation as DI;
use Foundation\BackendBundle\Kernel\AbsractController;
/**
 * Description of SessionControllerResolver
 *
 * @author nks
 */
class SessionControllerResolver extends JMSControllerResolver{
    
    protected function getSession(){
        return $this->container->get("session");
    }

    protected function hasSession(){
        return $this->container->has("session");
    }
    

    protected function createController($controller) {
        $callable = parent::createController($controller);
        // dont know when are used other notation but it are in parent
        $pos = strpos($controller, '::');
        if (false === $pos || ! $this->hasSession() ) {
            return $callable;
        }
        $obj = $callable[0];
        $class = substr($controller, 0, $pos);
        if($obj instanceof  AbsractController && $this->getSession()->has($class)){
            $obj->unserialize($this->getSession()->get($class));
        }
        return $callable;
    }

}
