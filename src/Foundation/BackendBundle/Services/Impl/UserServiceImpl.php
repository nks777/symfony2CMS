<?php
namespace Foundation\BackendBundle\Services\Impl;

use JMS\DiExtraBundle\Annotation as DI;
use Foundation\BackendBundle\Services\UserService;
use Foundation\BackendBundle\Repository\UserRepository;

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

    public function deleteAdmin() {
        
    }

    public function getAdminsList() {
        return $this->userRepository->getListOfAdmin();
    }

}
