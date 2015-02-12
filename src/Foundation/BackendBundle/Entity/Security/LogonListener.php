<?php

namespace Foundation\BackendBundle\Entity\Security;

use \Foundation\BackendBundle\Repository\UserRepository;
use \Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use \Symfony\Component\HttpFoundation\Request;
use \Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use \Symfony\Component\HttpFoundation\RedirectResponse;
use \Symfony\Component\Security\Http\HttpUtils;

use JMS\DiExtraBundle\Annotation\Service;
use JMS\DiExtraBundle\Annotation\InjectParams;
use JMS\DiExtraBundle\Annotation\Inject;

/**
 * Description of LogonListener
 * 
 * @Service("fundation.backend.entity.security.logonlistener")
 * @author nks
 */
class LogonListener extends \Symfony\Component\Security\Http\Authentication\DefaultAuthenticationSuccessHandler{
    
    private $userRepository;

    /**
     * @InjectParams({
     *  "repository" = @Inject("foundation.repository.user")
     * })
     */
    public function setUserRepository(UserRepository $repository) {
        $this->userRepository = $repository;
    }
    
    /**
     * @InjectParams({
     *  "httpUtils" = @Inject("security.http_utils")
     * })
     */
    public function __construct(HttpUtils $httpUtils) {
        parent::__construct($httpUtils, array());
    }

    
    private $router;

    /**
     * @InjectParams({
     *  "router" = @Inject("router")
     * })
     */
    public function setRouter(\Symfony\Component\Routing\Router $router) {
        $this->router = $router;
    }
    
    public function onAuthenticationSuccess(Request $request, TokenInterface $token) {
        $user = $token->getUser();
        $user->setLastLogin(new \DateTime());
        $this->userRepository->updateUser($user);
        return $this->httpUtils->createRedirectResponse($request, $this->determineTargetUrl($request));
    }

}
