<?php

namespace Foundation\BackendBundle\Repository\Impl;

use Foundation\BackendBundle\Repository\Abstr\Repository;
use Foundation\BackendBundle\Repository\TagRepository;
use Foundation\BackendBundle\Entity\Tag;

use JMS\DiExtraBundle\Annotation\Service;
/**
 * Description of TagRepositoryImpl
 * @Service("foundation.repository.tag", parent="foundation.repository.abstr")
 * @author nks
 */
class TagRepositoryImpl  extends Repository implements TagRepository{
    
    function __construct() {
        parent::__construct(Tag::ENTITY_NAME, "t");
    }
    
    public function getCountOfTags() {
        $query = $this->getDoctrineRepository()->createQueryBuilder("t");
        $eb = $this->em->getExpressionBuilder();
        $query->select($eb->count("t.id"));
        return $query->getQuery()->getSingleScalarResult();
    }
}
