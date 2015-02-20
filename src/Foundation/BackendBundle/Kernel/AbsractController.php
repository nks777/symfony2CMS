<?php
namespace Foundation\BackendBundle\Kernel;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Foundation\BackendBundle\Kernel\Annotation\SessionScope;
/**
 * Description of AbsractController
 *
 * @author nks
 */
abstract class AbsractController extends Controller implements \Serializable{
    
    protected function getAnnotationReader(){
        return $this->get("annotation_reader");
    }
    
    public function unserialize($serialized){
        $stored = unserialize($serialized);
        foreach ($stored AS $name => $value){
            if(property_exists($this, $name)){
                $prop = new \ReflectionProperty($this, $name);
                foreach($this->getAnnotationReader()->getPropertyAnnotations($prop) AS $annotatin){
                    if($annotatin instanceof SessionScope){
                        $this->$name = unserialize($value);
                    }
                }
            }
        }
    }
    
    public function serialize() {
        $stored = array();
        foreach (get_object_vars($this) AS $name => $value){
            $prop = new \ReflectionProperty($this, $name);
            foreach($this->getAnnotationReader()->getPropertyAnnotations($prop) AS $annotatin){
                if($annotatin instanceof SessionScope){
                    $stored[$name] = serialize($value);
                }
            }
        }
        if(! $this->has('session') && count($stored)){
            throw new \LogicException('You can not use @SessionScope annotation if sessions are disabled');
        }
        return serialize($stored);
    }


    public function __destruct() {
        $data = $this->serialize();
        if(strlen($data)){
            $this->get("session")->set(get_class($this), $data);
        }
    }
    
}
