<?php

namespace sisconee\SessionServicesBundle\Controller;

use sisconee\SessionServicesBundle\Controller\PrefixedSessionService;

class SessionOrderByService implements IOrderByService {
    private $column = "";
    private $order = "";
    private $session = null;

    private function ValueExistsInArray($value, $array) {
        foreach($array as $item) {
            if ($item == $value) return true;
        }

        return false;
    }

    public function __construct(PrefixedSessionService $session) {
        $this->session = $session;
    }

    /**
     * @param $column
     * @param $original_columns
     * @param $order
     * @return bool
     */
    public function resolveOrderBy($column, $original_columns, $order)
    {
        //Preconditions...
        if (!is_null($column) && !$this->ValueExistsInArray($column, $original_columns)) {
            return false;
        }

        $this->order = $order;
        $this->column = $column;

        if (is_null($this->column)) {

            $this->column = $this->session->get('column');

            if (!isset($this->column) || $this->column == '') { //Default values...
                $this->column = $original_columns[0];
            }
        }

        if (is_null($this->order)) {
            $this->order = $this->session->get('order');

            if (!isset($this->order) || $this->order == '')
            { //Default values...
                $this->order = 'ASC';
            }
        }

        //Saving the processing result...
        $this->session->set('column', $this->column);
        $this->session->set('order', $this->order);

        return true;
    }

    /**
     * @return string
     */
    public function getColumn()
    {
        return $this->column;
    }

    /**
     * @return string
     */
    function getOrder()
    {
        return $this->order;
    }
}