<?php

namespace Foundation\WebAdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * Description of SecurityContrller
 *
 * @author nks
 */
class SecurityController extends Controller{
    
     /**
     * @Route("/login", name="login_route")
     * @Method({"GET"})
     * @Template("FoundationWebAdminBundle:Login:login.html.twig")
     */
    public function loginAction(Request $request) {
        $authenticationUtils = $this->get('security.authentication_utils');
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();
        return  array(
            'last_username' => $lastUsername,
            'error'         => $error,
        );
    }
    
    /**
     * @Route("/login/authenticate", name="login_authenticate")
     * @Method({"POST"})
     */
    public function loginCheckAction(Request $request) {
    }
}
