<?php

namespace Foundation\BackendBundle\Services\Impl;

use Foundation\BackendBundle\Services\TagService;
use Foundation\BackendBundle\Repository\TagRepository;

use JMS\DiExtraBundle\Annotation\Service;
use JMS\DiExtraBundle\Annotation\Inject;
use JMS\DiExtraBundle\Annotation\InjectParams;
/**
 * Description of TagServiceImpl
 * @Service("foundation.service.tagservice")
 * @author nks
 */
class TagServiceImpl implements TagService{
    
    private $tagRepository;
    
    /**
     * @InjectParams({
     *     "tagRepository" = @Inject("foundation.repository.tag")
     * })
     * @param TagRepository $tagRepository
     */
    function setTagRepository(TagRepository $tagRepository) {
        $this->tagRepository = $tagRepository;
    }
        
    public function getTagList() {
        
    }

    public function getTagCount() {
        return $this->tagRepository->getCountOfTags();
    }

}
