<?php
/**
 * Created by PhpStorm.
 * User: NOTEBOOK
 * Date: 11/11/14
 * Time: 20:45
 */

namespace sisconee\SessionServicesBundle\Controller;


use sisconee\SessionServicesBundle\Controller\PrefixedSessionService;

class SessionFilterService implements IFilterService {
    private $filterText = "";
    private $session = null;

    public function __construct(PrefixedSessionService $session) {
        $this->session = $session;
    }

    /**
     * @param $filterText
     * @return bool
     */
    public function Filter($filterText)
    {
        if (is_null($filterText)) {
            $this->filterText = $this->session->get('filter');
        }
        else {
            $this->filterText = $filterText;
            $this->session->set('filter', $this->filterText);
        }

        return true;
    }

    /**
     * @return string
     */
    public function getFilterText()
    {
        return $this->filterText;
    }
} 