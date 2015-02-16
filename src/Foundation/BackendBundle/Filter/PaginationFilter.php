<?php

namespace Foundation\BackendBundle\Filter;

use Foundation\BackendBundle\Exceptions\ServiceErrorException;

/**
 * Description of PaginationFilter
 *
 * @author nks
 */
class PaginationFilter extends FilterDecorator implements Pagination{
    
    const DEFAULT_ITEMS_ON_PAGE = 20;

    private $currentPage;
    private $itemsCount;
    private $itemsOnPage;
    
    function __construct($itemsCount, $itemsOnPage, Filter $nextFilter) {
        parent::__construct($nextFilter);
        $this->itemsCount = $itemsCount;
        $this->itemsOnPage = !is_null($itemsOnPage) ? $itemsOnPage : self::DEFAULT_ITEMS_ON_PAGE;
        $this->currentPage = 1;
    }

    public function getCriteria() {
        $criteria = $this->getNextFilter()->getCriteria();
        $offset = ($this->currentPage - 1)  * $this->itemsOnPage;
        $criteria->setFirstResult($offset);
        $criteria->setMaxResults($this->itemsOnPage);
        return $criteria;
    }

    public function getCurrentPage() {
        return $this->currentPage;
    }
    
    function setCurrentPage($currentPage) {
        if($currentPage < $this->getPageCount()){
            $this->currentPage = $currentPage;
        }
        else{
            throw new ServiceErrorException("No such the page number!");
        }
    }

    
    public function getPageCount() {
        return ceil($this->itemsCount/$this->itemsOnPage);
    }

    public function getRenderData() {
        $data = $this->getNextFilter()->getRenderData();
        $data[] = $this;
        return $data;
    }

}
