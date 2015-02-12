<?php

namespace Foundation\BackendBundle\Repository\Impl;

use JMS\DiExtraBundle\Annotation\Service;
use \Foundation\BackendBundle\Repository\Abstr\Repository;
use \Foundation\BackendBundle\Repository\UserRepository;
use \Foundation\BackendBundle\Entity\Security\User;
use \Doctrine\Common\Collections\Criteria;
/**
 * Description of UserRepository
 * @Service("foundation.repository.user", parent="foundation.repository.abstr")
 * @author nks
 */
class UserRepositoryImpl extends Repository implements UserRepository{
    
    function __construct() {
        parent::__construct(User::ENTITY_NAME, "u");
    }
    
    public function update($user) {
        $this->assertRightEnity($user);
        
        $qb = $this->em->createQueryBuilder();
        $q = $qb->update(User::ENTITY_NAME, "u");
        if(!empty($user->getPassword())){
            $q->set("u.password", "?6");
            $q->setParameter(6, $user->getPassword());
        }
        
        if(!is_null($user->getLastLogin())){
            $q->set("u.lastLogin", "?4");
            $q->setParameter(4, $user->getLastLogin()->format("Y-m-d H:i:s"));
            
        }
        
        $q->set("u.username", "?0")
                ->set("u.email", "?1")
                ->set("u.lastUpdateDate", "?2")
                ->set("u.updater", "?3")
                ->where("u.id = ?5")
                ->setParameter(0, $user->getUsername())
                ->setParameter(1, $user->getEmail())
                ->setParameter(2, $user->getLastUpdateDate()->format("Y-m-d H:i:s"))
                ->setParameter(3, (int) $user->getUpdater()->getId())
                ->setParameter(5, (int) $user->getId());
        $q->getQuery()->execute();
    }

    public function getListOfAdmin() {
        $criteria = Criteria::create();
        $criteria->where(Criteria::expr()->eq("roles", User::ROLE_ADMIN));
        return $this->getByCriteria($criteria);
    }
    
    public function getAdminById($id){
        $criteria = Criteria::create();
        $criteria->where(
                Criteria::expr()->andX(
                        Criteria::expr()->eq("roles", User::ROLE_ADMIN), 
                        Criteria::expr()->eq("id", $id)
                )
        );
        return $this->getOneByCriteria($criteria);
    }
    
    public function save(User $user){
        if($user->getId()){
            $this->update($user);
        }
        else {
            $this->insert($user);
        }
    }
    

}
