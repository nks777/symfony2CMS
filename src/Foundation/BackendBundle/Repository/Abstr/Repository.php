<?php

namespace Foundation\BackendBundle\Repository\Abstr;

/**
 * Description of Repository
 *
 * @author nks
 */
use \JMS\DiExtraBundle\Annotation as DI;
use \Doctrine\Common\Collections\Criteria;

/**
 * We use empty adapter for using Dependency Injection via annotation
 * @DI\Service("foundation.repository.abstr", abstract=true)
 */
abstract class Repository {

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em;
    
    private $entityName;
    private $defaultAlias;
    
    public function __construct($entityName, $defaultAlias) {
        $this->entityName = $entityName;
        $this->defaultAlias = $defaultAlias;
    }
    
    /**
     * 
     * @DI\InjectParams({
     *     "em" = @DI\Inject("doctrine.orm.entity_manager"),
     * })
     * @param \Doctrine\ORM\EntityManager $em
     */
    public function setEm(\Doctrine\ORM\EntityManager $em) {
        $this->em = $em;
    }

    
        /** @return \Doctrine\ORM\EntityRepository */
    protected function getDoctrineRepository() {
        return $this->em->getRepository($this->entityName);
    }

    public function __call($method, $arguments){
        if(method_exists($this->getDoctrineRepository(), $method)){
            return call_user_func_array(array($this->getDoctrineRepository(), $method), $arguments);
        }
    }
    
    /**
     * 
     * @param string $alias
     * @param \Doctrine\Common\Collections\Criteria $criteria
     */
    protected function getByCriteria(Criteria $criteria, $alias = null){
        if(is_null($alias)){
            $alias = $this->defaultAlias;
        }
        return $this->createQueryBuilder($alias)
                ->addCriteria($criteria)
                ->getQuery()
                ->execute();
    }
    
    protected function getOneByCriteria(Criteria $criteria, $alias = null){
        $criteria->setMaxResults(1);
        return $this->getByCriteria($criteria, $alias)[0];
    }
    
}
