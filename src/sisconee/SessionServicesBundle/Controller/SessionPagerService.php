<?php
/**
 * Created by PhpStorm.
 * User: NOTEBOOK
 * Date: 11/11/14
 * Time: 20:48
 */

namespace sisconee\SessionServicesBundle\Controller;


use sisconee\SessionServicesBundle\Controller\PrefixedSessionService;

class SessionPagerService implements IPagerService {
    private $page = 0;
    private $page_count = 0;
    private $records_per_page;
    private $first_result = 0;
    private $max_result = 0;
    private $session = null;

    public function __construct(PrefixedSessionService $session, $records_per_page) {
        $this->session = $session;
        $this->records_per_page = $records_per_page;
    }

    /**
     * @param $page
     * @param $record_count
     * @return bool
     */
    public function Paging($page, $record_count)
    {
        //Preconditions...
        if (!is_null($page) != "" && !is_numeric($page)) {
            return false;
        }

        $this->page = $page;

        if (is_null($this->page)) {
            $this->page = $this->session->get('page');
            if (isset($this->page)) $this->page = 1; //Default value...
        }

        $this->page_count = ceil($record_count/$this->records_per_page);
        if ($this->page < 0 || $this->page_count == 0) $this->page = 1;
        else if ($this->page > $this->page_count) $this->page = $this->page_count;
        $this->first_result = ($this->page-1) * $this->records_per_page;
        $this->max_result = $this->records_per_page;

        $this->session->set('page', $this->page);

        return true;
    }

    /**
     * @return int
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @return int
     */
    public function getPageCount()
    {
        return $this->page_count;
    }

    /**
     * @return int
     */
    public function getRecordsPerPage()
    {
        return $this->records_per_page;
    }

    /**
     * @param mixed $records_per_page
     */
    public function setRecordsPerPage($records_per_page)
    {
        $this->records_per_page = $records_per_page;
    }

    /**
     * @return int
     */
    public function getFirstResult()
    {
        return $this->first_result;
    }

    /**
     * @return int
     */
    public function getMaxResult()
    {
        return $this->max_result;
    }
}