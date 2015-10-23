<?php
/**
 * Created by PhpStorm.
 * User: NOTEBOOK
 * Date: 11/11/14
 * Time: 20:24
 */

namespace sisconee\SessionServicesBundle\Controller;


interface IFilterService {
    /**
     * @param $filterText
     * @return bool
     */
    function Filter($filterText);

    /**
     * @return string
     */
    function getFilterText();
} 