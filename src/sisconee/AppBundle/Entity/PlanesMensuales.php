<?php
/**
 * Created by PhpStorm.
 * User: celma
 * Date: 27/01/2015
 * Time: 9:36
 */

namespace sisconee\AppBundle\Entity;


class PlanesMensuales {

    private $plans;
    private $months;

    public function getPlans()
    {
        return $this->plans;
    }

    public function setPlans($plans)
    {
        $this->plans = $plans;
        return $this;
    }

    public function getMonths()
    {
        return $this->months;
    }

    public function setMonths($months)
    {
        $this->months = $months;
        return $this;
    }
} 