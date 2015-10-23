<?php
/**
 * Created by PhpStorm.
 * User: NOTEBOOK
 * Date: 11/11/14
 * Time: 20:25
 */

namespace sisconee\SessionServicesBundle\Controller;


interface IPagerService {
    /**
     * @param $page
     * @param $record_count
     * @return bool
     */
    function Paging($page, $record_count);

    /**
     * @return int
     */
    function getPage();

    /**
     * @return int
     */
    function getPageCount();

    /**
     * @return int
     */
    function getFirstResult();

    /**
     * @return int
     */
    function getMaxResult();
} 