<?php

namespace sisconee\SessionServicesBundle\Controller;


interface IOrderByService {
    /**
     * @param $column
     * @param $original_columns
     * @return bool
     */
    function resolveOrderBy($column, $original_columns, $order);

    /**
     * @return string
     */
    function getColumn();

    /**
     * @return string
     */
    function getOrder();
} 