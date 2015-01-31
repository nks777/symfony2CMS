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
    
    function __construct() {
        parent::__construct("FoundationBackendBundle:Security\User","u");
    }

    public function deleteAdmin(User $user) {
        $this->em->remove($user);
        $this->em->flush();
    }

    public function getListOfAdmin() {
        $criteria = Criteria::create();
        $criteria->where(Criteria::expr()->eq("roles", "ROLE_ADMIN"));
        return $this->getByCriteria($criteria);
    }
    
    public function getAdminById($id){
        $criteria = Criteria::create();
        $criteria->where(
                Criteria::expr()->andX(
                        Criteria::expr()->eq("roles", "ROLE_ADMIN"), 
                        Criteria::expr()->eq("id", $id)
                )
        );
        return $this->getOneByCriteria($criteria);
    }

}
