<?php

namespace Foundation\BackendBundle\Filter;


/**
 * Description of Filter
 *
 * @author nks
 */
interface Filter {
    function getCriteria();
    function getRenderData();
}
