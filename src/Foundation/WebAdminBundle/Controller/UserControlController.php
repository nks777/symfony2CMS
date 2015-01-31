<?php

namespace Foundation\WebAdminBundle\Controller;

use JMS\DiExtraBundle\Annotation as DI;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Foundation\BackendBundle\Exceptions\ServiceErrorException;

use JMS\DiExtraBundle\Annotation\Inject;
use JMS\DiExtraBundle\Annotation\InjectParams;
use JMS\DiExtraBundle\Annotation\Service;

/**
 * Description of UserControlController
 * @Route("/usercontrol")
 * @author nks
 */
class UserControlController extends Controller{
    
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
     */
    public function listAction(Request $request) {
        return array('admins' => $this->userService->getAdminsList());
    }
    
    
    /**
     * @Route("/remove", name="_delete_admin")
     * @Method({"GET"})
     */
    public function deleteAdmin(Request $request) {
        $id = $request->query->get("id");
        $user = $this->get('security.context')->getToken()->getUser();
        try{
            $this->userService->deleteAdmin($id, $user);
        }
        catch (ServiceErrorException $e){
            $request->getSession()->getFlashBag()->add('error', $e->getMessage());
            
            return $this->redirect($request->headers->get("referer"));
        }
        return $this->redirect($this->generateUrl("_list_of_admin"));
    }
    
    /**
     * @Route("/edit/{id}", requirements={"id" = "\d*"}, name="_edit_admin")
     * @Method({"GET"})
     * @Template("FoundationWebAdminBundle:UserControl:useredit.html.twig")
     */
    public function editAction(Request $request, $id) {
        $user = null;
        if(strlen($id)){
            $id = (int) $id;
            $user = $this->userService->getAdminById($id);
        }
        else{
            $user = new User();
        }
        $form = $this->createFormBuilder($user)
                ->add("id", "hidden")
                ->add("username", "text")
                ->add("password", "password")
                ->add("email", "email")
                ->add('save', 'submit', array('label' => 'Save'))
                ->getForm();
        $form->handleRequest($request);
        if ($form->isValid()) {
            echo "valid form";
            die();
        }
        return array("form" => $form->createView());
    }
    
}
