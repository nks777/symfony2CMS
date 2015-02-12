<?php
namespace Foundation\BackendBundle\Services\Impl;

use Foundation\BackendBundle\Services\UserService;
use Foundation\BackendBundle\Repository\UserRepository;
use \Foundation\BackendBundle\Entity\Security\User;
use Foundation\BackendBundle\Exceptions\ServiceErrorException;

use JMS\DiExtraBundle\Annotation\Service;
use JMS\DiExtraBundle\Annotation\Inject;
use JMS\DiExtraBundle\Annotation\InjectParams;


/**
 * Description of UserService
 *
 * @Service("foundation.service.userservice")
 * @author nks
 */
class UserServiceImpl implements UserService{
    
    private $userRepository;
    
    private $passwordEncoder;
     
    /**
     * 
     * @InjectParams({
     *  "encoder" = @Inject("fundation.backend.entity.security.md5encoder")
     * })
     */
    public function setPasswordEncoder(\Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface $encoder){
        $this->passwordEncoder = $encoder;
    }
    
    /**
     * @InjectParams({
     *     "em" = @Inject("doctrine.orm.entity_manager"),
     *     "userRepository" = @Inject("foundation.repository.user")
     * })
     * 
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }
    
    public function saveAdmin(User $user, User $currentUser) {
        $now = new \DateTime();
        $id = $user->getId();
        $user->setLastUpdateDate($now);
        $user->setUpdater($currentUser);
        if(is_null($id)){
            // new admin
            $user->setCreateDate($now);
            $user->setSalt($this->generateSalt());
            $user->setRoles(User::ROLE_ADMIN);
        }
        $this->encodePassword($user);
        
        $this->userRepository->save($user);
        return $user->getId();
    }
    
    private function generateSalt(){
        $date = md5((new \DateTime())->format("dDjlNSWZFmMntLoYyaABgGhHisy"));
        return md5("salt_in_salt=)" + $date + "we_deed_to_go_deeper:)");
    }


    private function encodePassword(User $user){
        if(!empty($pass = $user->getPassword())){
            $encriptedPass = $this->passwordEncoder->encodePassword($pass, $user->getSalt());
            $user->setPassword($encriptedPass);
        }
    }

    public function deleteAdmin($removedUserId, User $currentUser = null) {
        $removedUser = $this->userRepository->getAdminById($removedUserId);
        if(!$removedUser->hasRole("ROLE_ADMIN")){
            throw new Exception("You're tring to remove not admin user");
        }
        if($currentUser != null && $currentUser->getId() === $removedUser->getId()){
            throw new ServiceErrorException("We won't allow you done self righteous suicide @ SOAD");
        }
        $this->userRepository->delete($removedUser);
    }

    public function getAdminsList() {
        return $this->userRepository->getListOfAdmin();
    }

    public function getAdminById($id) {
        return $this->userRepository->getAdminById($id);
    }

}
