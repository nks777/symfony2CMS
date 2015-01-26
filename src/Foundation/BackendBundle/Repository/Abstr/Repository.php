<?php

namespace Foundation\BackendBundle\Repository\Abstr;

/**
 * Description of Repository
 *
 * @author nks
 */
use JMS\DiExtraBundle\Annotation as DI;

/**
 * @DI\Service("foundation.repository.abstr", abstract=true)
 */
abstract class Repository {

    /**
     * @DI\Inject("doctrine.orm.entity_manager")
     * @var \Doctrine\ORM\EntityManager
     */
    public $em;
    protected $entityName;

    /** @return \Doctrine\ORM\EntityRepository */
    protected function getDoctrineRepository() {
        return $this->em->getRepository($this->entityName);
    }

    public function find($id) {
        return $this->getDoctrineRepository()->find($id);
    }

    public function findOneBy(array $criteria) {
        return $this->getDoctrineRepository()->findOneBy($criteria);
    }

    public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null) {
        return $this->getDoctrineRepository()->findBy($criteria, $orderBy, $limit, $offset);
    }

    public function findAll() {
        return $this->getDoctrineRepository()->findAll();
    }

    /** @return \Doctrine\ORM\QueryBuilder */
    public function createQueryBuilder($alias) {
        return $this->getDoctrineRepository()->createQueryBuilder($alias);
    }

}
