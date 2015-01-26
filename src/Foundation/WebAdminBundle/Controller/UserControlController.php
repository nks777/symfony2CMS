<?php

namespace Foundation\WebAdminBundle\Controller;

use JMS\DiExtraBundle\Annotation as DI;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Foundation\BackendBundle\Services\UserService;

use JMS\DiExtraBundle\Annotation\Inject;
use JMS\DiExtraBundle\Annotation\InjectParams;
use JMS\DiExtraBundle\Annotation\Service;

/**
 * Description of UserControlController
 * @Route("/usercontrol")
 * @author nks
 */
class UserControlController extends Controller{
//     * @DI\Inject("foundation.service.userservice")
//     * @var UserService 
    
    private $userService;
    
    /**
     * 
     * @DI\InjectParams({
     *  "ser" = @Inject("foundation.service.userservice")
     * })
     * @param \Foundation\BackendBundle\Services\UserServiceInt $ser
     */
    public function setUserService(\Foundation\BackendBundle\Services\UserService $ser){
        $this->userService = $ser;
    }


    
    /**
     * @Route("/", name="_list_of_admin")
     * @Method({"GET"})
     * @Template("FoundationWebAdminBundle:UserControl:userlist.html.twig")
     * @param Symfony\Component\HttpFoundation\Request $request
     */
    public function listAction(Request $request) {
        return array('admins' => $this->userService->getAdminsList());
    }
    
}
