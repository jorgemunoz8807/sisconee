<?php
/**
 * Created by PhpStorm.
 * User: celma
 * Date: 28/01/2015
 * Time: 13:33
 */

namespace sisconee\AppBundle\Controller;

use sisconee\AdministracionBundle\Controller\BaseUserController;


class PlanificacionController extends BaseUserController
{
    public function indexPlanificationAction()
    {
        return $this->render('sisconeeAppBundle:Planificacion:index_planificacion.html.twig');
    }



    /**
     * Get the reference plan of an entity in determinate year
     * @param $entity The specific entity
     * @param $year The specific year
     * @return mixed The value of the reference plan
     */
    public function getEntityReferencePlan($entity, $year)
    {
        $em = $this->getDoctrine()->getManager();
        return $em->getRepository('sisconeeAppBundle:PlanAnualEntidad')->getAnnualPlanInAYear($entity, $year);
    }

    /**
     * Get the reference plan of a service in determinate year
     * @param $service The specific service
     * @param $year The specific year
     * @return mixed The value of the reference plan
     */
    public function getServiceReferencePlan($service, $year)
    {
        $em = $this->getDoctrine()->getManager();
        return $em->getRepository('sisconeeAppBundle:PlanAnualServicio')->getServiceAnnualPlanInAYear($service, $year);
    }

    /**
     * Get the reference plan of a service in determinate month and year
     * @param $service The specific service
     * @param $month The specific month
     * @param $year The specific year
     * @return mixed The value of the reference plan
     */
    public function getServiceReferenceMonthlyPlan($service, $month, $year)
    {
        $em = $this->getDoctrine()->getManager();
        $monthlyPlan = $em->getRepository('sisconeeAppBundle:PlanMensualServicio')->getPlanOfAServiceInAMonthYear($service, $month, $year);
        return is_null($monthlyPlan) ? null : $monthlyPlan->getPlan();
    }

    /** Get the plan that remains to distribute of an specific entity and year
     * @param $entity The specific entity
     * @param $year The specific year
     * @return mixed The value of the remaining plan
     */
    public function getEntityRemainingPlan($entity, $year)
    {
        $em = $this->getDoctrine()->getManager();
        $subEntitiesAnnualPlans = $em->getRepository('sisconeeAppBundle:PlanAnualEntidad')->getAnnualPlansOfSubEntitiesInAYear($entity, $year);
        $subentitiesPlan = $this->getTotalOfAnnualPlans($subEntitiesAnnualPlans);
        $servicesAnnualPlans = $em->getRepository('sisconeeAppBundle:PlanAnualServicio')->getAnnualPlansOfServicesBelongingTo($entity, $year);
        $servicesPlan = $this->getTotalOfAnnualPlans($servicesAnnualPlans);
        return $this->getEntityReferencePlan($entity, $year) - ($subentitiesPlan + $servicesPlan);
    }

    /** Get the plan that remains to distribute of an specific service and year
     * @param $service The specific service
     * @param $year The specific year
     * @return mixed The value of the remaining plan
     */
    public function getServiceRemainingPlan($service, $year)
    {
        $em = $this->getDoctrine()->getManager();
        $monthlyPlans = $em->getRepository('sisconeeAppBundle:PlanMensualServicio')->getMonthlyPlansOfAServiceInAYear(
            $service,
            $year
        );
        $accumulate = 0;
        foreach ($monthlyPlans as $mp) {
            $accumulate += $mp->getPlan();
        }
        return $this->getServiceReferencePlan($service, $year) - $accumulate;
    }

    /** Get the plan that remains to distribute of an specific service in a month and year
     * @param $service The specific service
     * @param $month The specific month
     * @param $year The specific year
     * @return mixed The value of the remaining plan
     */
    public function getServiceRemainingMonthlyPlan($service, $month, $year)
    {
        $em = $this->getDoctrine()->getManager();
        $dailyPlans = $em->getRepository('sisconeeAppBundle:PlanMensualServicio')->getDailyPlansOfAServiceInAMonth(
            $service,
            $month
        );
        $accumulate = 0;
        foreach ($dailyPlans as $dp) {
            $accumulate += $dp['plan'];
        }
        return $this->getServiceReferenceMonthlyPlan($service, $month, $year) - $accumulate;
    }




    //calculate the total value of all annual plans given
    private function getTotalOfAnnualPlans($annualPlans)
    {
        $total = 0;
        foreach ($annualPlans as $ap) {
            $total += $ap->getPlan();
        }

        return $total;
    }

    //set in first place the base entity
    protected function setInFirstPlaceBaseEntity($parentEntities)
    {
        $length = sizeof($parentEntities);
        if ($length <= 1)
            return $parentEntities;

        $first = $parentEntities[0];

        for ($i = 0; $i < $length; $i++) {
            $pe = $parentEntities[$i];
            if (is_null($pe->getEntidadPadre())) {
                $parentEntities[0] = $pe;
                $parentEntities[$i] = $first;
                break;
            }
        }
        /*if(($index = array_search($organismEntity, $parentEntities, true)) !== false) {
            unset($parentEntities[$index]);
        }*/

        return $parentEntities;
    }

    protected function setInFirstPlaceSpecificEntity($parentEntities, $entity)
    {
        if (sizeof($parentEntities) > 1) {
            if (($index = array_search($entity, $parentEntities, true)) !== false) {
                unset($parentEntities[$index]);
                $first = $parentEntities[0];
                $parentEntities[0] = $entity;
                $parentEntities[$index] = $first;
            }
        }

        return $parentEntities;
    }

    protected function addInFirstPlace($entity, $entities)
    {
        if (sizeOf($entities) > 0) {
            $first = $entities[0];
            $entities[0] = $entity;
            array_push($entities, $first);
        }
        return $entities;
    }

    protected function organizePlansByMonth($mensualPlans)
    {
        $organizedMensualPlans = [];
        $organizedMensualPlansHP = [];
        for ($i = 1; $i <= 12; $i++) {
            $organizedMensualPlans[$i] = null;
            $organizedMensualPlansHP[$i] = null;
        }
        foreach ($mensualPlans as $mp) {
            $month = $mp->getMes();
            $plan = $mp->getPlan();
            $hpPlan = $mp->getPlanHorarioPico();
            $organizedMensualPlans[$month] = $plan;
            $organizedMensualPlansHP[$month] = $hpPlan;
        }
        return array('generalPlans' => $organizedMensualPlans, 'hpPlans' => $organizedMensualPlansHP);
    }

    protected function organizePlansByDay($dailyPlans)
    {
        $plans = [];
        $plansHP = [];

        for ($i = 1; $i <= 31; $i++) {
            $plans[$i] = null;
            $plansHP[$i] = null;
        }
        foreach ($dailyPlans as $dp) {
            $plan = $dp['plan'];
            $hpPlan = $dp['plan_horariopico'];
            $date = $dp['fecha'];
            $day = explode("-", $date)[2];
            $day = $day[0] == 0 ? $day[1] : $day;
            $plans[$day] = $plan;
            $plansHP[$day] = $hpPlan;
        }

        return array('generalPlans' => $plans, 'hpPlans' => $plansHP);
    }
}