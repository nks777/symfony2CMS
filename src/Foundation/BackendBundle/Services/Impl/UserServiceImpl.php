<?php
namespace Foundation\BackendBundle\Services\Impl;

use JMS\DiExtraBundle\Annotation as DI;
use Foundation\BackendBundle\Services\UserService;
use Foundation\BackendBundle\Repository\UserRepository;
use \Foundation\BackendBundle\Entity\Security\User;
use Foundation\BackendBundle\Exceptions\ServiceErrorException;

/**
 * Description of UserService
 *
 * @DI\Service("foundation.service.userservice")
 * @author nks
 */
class UserServiceImpl implements UserService{
    
    private $userRepository;
    
    /**
     * @DI\InjectParams({
     *     "em" = @DI\Inject("doctrine.orm.entity_manager"),
     *     "userRepository" = @DI\Inject("foundation.repository.user")
     * })
     * 
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }
    
    public function addOrUpdateAdmin() {
        
    }

    public function deleteAdmin($removedUserId, User $currentUser = null) {
        $removedUser = $this->userRepository->getAdminById($removedUserId);
        if($currentUser != null && $currentUser->getId() === $removedUser->getId()){
            throw new ServiceErrorException("We won't allow you done self righteous suicide @ SOAD");
        }
        $this->userRepository->deleteAdmin($removedUser);
    }

    public function getAdminsList() {
        return $this->userRepository->getListOfAdmin();
    }

    public function getAdminById($id) {
        return $this->userRepository->getAdminById($id);
    }

}
