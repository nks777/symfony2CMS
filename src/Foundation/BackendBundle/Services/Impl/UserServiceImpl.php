<?php
namespace Foundation\BackendBundle\Services\Impl;

use JMS\DiExtraBundle\Annotation as DI;
use Foundation\BackendBundle\Services\UserService;

/**
 * Description of UserService
 *
 * @DI\Service("foundation.service.userservice")
 * @author nks
 */
class UserServiceImpl implements UserService{
    
    public function getSomething() {
        return "something";
    }
}
