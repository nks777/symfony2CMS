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

use JMS\DiExtraBundle\Annotation\Inject;
use JMS\DiExtraBundle\Annotation\InjectParams;

/**
 * Description of TagController
 * @Route("/tags")
 * @author nks
 */
class TagController extends Controller{
    
    const ITEMS_ON_PAGE = 20;


    private $tagService;
    private $filter;
    
    /**
     * @InjectParams({
     *  "tagService" = @Inject("foundation.service.tagservice")
     * })
     * @param TagService $tagService
     */
    public function __construct(TagService $tagService) {
        $this->tagService = $tagService;
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

        return array(
            'filter' => $this->filter,
        );
    }
}
