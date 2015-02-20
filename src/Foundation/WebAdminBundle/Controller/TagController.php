<?php
namespace Foundation\WebAdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Foundation\BackendBundle\Services\TagService;
use Foundation\BackendBundle\Filter\PaginationFilter;
use Foundation\BackendBundle\Filter\EmptyFilter;
use Symfony\Component\HttpFoundation\Session\Session;
use Foundation\BackendBundle\Kernel\AbsractController;
use Foundation\BackendBundle\Kernel\Annotation\SessionScope;

//use Doctrine\Common\Annotations\AnnotationRegistry;

use JMS\DiExtraBundle\Annotation\Inject;
use JMS\DiExtraBundle\Annotation\InjectParams;

/**
 * Description of TagController
 * @Route("/tags")
 * @author nks
 */
class TagController extends AbsractController{
    
    const ITEMS_ON_PAGE = 20;


    private $tagService;
    
    /**
     * @SessionScope
     */
    protected $filter;
    
    /**
     *
     *  @SessionScope
     */
    protected $test =1;
    
    /**
     * @InjectParams({
     *  "tagService" = @Inject("foundation.service.tagservice")
     * })
     * @param TagService $tagService
     */
    public function __construct(TagService $tagService=null) {
        $this->tagService = $tagService;
//        $this->tagService = new \Foundation\BackendBundle\Services\Impl\TagServiceImpl();
        $this->createFilter();
    }
    
    
    public function createFilter(){
        $this->filter = new PaginationFilter($this->tagService->getTagCount(), self::ITEMS_ON_PAGE, 
                new EmptyFilter());
    }



    /**
     * @Route("/", name="_list_of_tags")
     * @Method({"GET"})
     * @Template("FoundationWebAdminBundle:Tags:tagsList.html.twig")
     */
    public function listAction(Request $request) {
        $this->filter->setCurrentPage(5);
        
        ++$this->test;
        return array(
            'filter' => $this->filter,
            'test' => $this->test,
        );
    }
    
    public function __sleep() {
        return array('test');
    }


//    public function __destruct() {
//        die();
//        if($this->has('session')){
//            $this->get("session")->set(get_class($this), serialize($this));
//        }
//        echo "serialize";
//        var_dump($this);
//    }
}
