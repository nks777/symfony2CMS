<?php

namespace Foundation\BackendBundle\Repository\Impl;

use JMS\DiExtraBundle\Annotation as DI;
use \Foundation\BackendBundle\Repository\Abstr\Repository;
use \Foundation\BackendBundle\Repository\UserRepository;
use \Foundation\BackendBundle\Entity\Security\User;
use \Doctrine\Common\Collections\Criteria;
/**
 * Description of UserRepository
 * @DI\Service("foundation.repository.user", parent="foundation.repository.abstr")
 * @author nks
 */
class UserRepositoryImpl extends Repository implements UserRepository{
    
    protected $entityName = "FoundationBackendBundle:Security\User";


    public function DeleteAdmin(User $user) {
        
    }

    public function getListOfAdmin() {
        $criteria = Criteria::create();
        $criteria->where(Criteria::expr()->eq("roles", "ROLE_ADMIN"));
        return $this->createQueryBuilder("u")->addCriteria($criteria)->getQuery()->execute();
    }

}
