<?php

namespace Foundation\BackendBundle\Entity;

use Doctrine\ORM\Mapping\Entity;
//use 
/**
 * @Entity
 * @author nks
 */
class Tag {
    
    const ENTITY_NAME = "FoundationBackendBundle:Tag";
    
    private $id;
    private $value;
}
