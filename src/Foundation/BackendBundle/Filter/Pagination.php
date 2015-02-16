<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Foundation\BackendBundle\Filter;

/**
 *
 * @author nks
 */
interface Pagination {
    function getPageCount();
    function getCurrentPage();
}
