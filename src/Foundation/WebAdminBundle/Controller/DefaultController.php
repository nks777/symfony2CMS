<?php

namespace Foundation\WebAdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template("FoundationWebAdminBundle:Default:index.html.twig")
     */
    public function indexAction()
    {
        return array();
    }
}
