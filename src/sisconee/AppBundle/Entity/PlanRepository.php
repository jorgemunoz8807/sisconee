<?php
/**
 * Created by PhpStorm.
 * User: celma
 * Date: 24/11/2014
 * Time: 9:50
 */

namespace sisconee\AppBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Config\Definition\Exception\Exception;


class PlanRepository extends EntityRepository
{

    /**
     * Get the annual plan in a determinate year of all entities subordinated to a parent entity
     * @param $parent the parent entity
     * @param $year year for filter the annual plans
     * @return array with annual plans
     */
    public function getAnnualPlansOfSubEntitiesInAYear($parent, $year)
    {
        $em = $this->getEntityManager();
        $queryBuilder = $em->createQueryBuilder();
        $queryBuilder
            ->select('ap')
            ->from('sisconeeAppBundle:PlanAnualEntidad', 'ap')
            ->innerJoin('ap.entidad', 'e', 'WITH', 'e.entidadPadre=:parent')->setParameter('parent', $parent)
            //->innerJoin('ap','sisconeeAppBundle:Entidad', 'e', 'ap.entidad=e.entidadPadre')
            /* ->where('e.siglas = ?1')*/
            ->andWhere('ap.anno = :year')->setParameter('year', $year)
            ->orderBy('ap.plan', 'DESC');
        //->setParameters(array('idParent'=> $idParent, 'year'=>$year));
        //->setParameter('idParent', $idParent);

        return $queryBuilder->getQuery()->getResult();
    }

    /**
     * Get the annual plan of an entity in a determinate year
     * @param $entity the entity
     * @param $year year for filter the annual plan
     * @return the annual plan
     */
    public function getAnnualPlanOfEntityInAYear($entity, $year)
    {
        $em = $this->getEntityManager();
        $queryBuilder = $em->createQueryBuilder();
        $queryBuilder
            ->select('ap')
            ->from('sisconeeAppBundle:PlanAnualEntidad', 'ap')
            ->where('ap.entidad = :entity')->setParameter('entity', $entity)
            ->andWhere('ap.anno = :year')->setParameter('year', $year);

        return $queryBuilder->getQuery()->getOneOrNullResult();
    }

    /**
     * Get the value of the annual plan in a determinate year for a specific entity
     * @param $entity the entity to find the plan
     * @param $year year for filter the annual plan
     * @return the plan or null if the entity has not assigned plan
     */
    public function getAnnualPlanInAYear($entity, $year)
    {
        $em = $this->getEntityManager();
        $queryBuilder = $em->createQueryBuilder();
        $queryBuilder
            ->select('ap.plan')
            ->from('sisconeeAppBundle:PlanAnualEntidad', 'ap')
            ->innerJoin('ap.entidad', 'e', 'WITH', 'e=?1')->setParameter(1, $entity)
            ->andWhere('ap.anno = :year')->setParameter('year', $year);

        $result = $queryBuilder->getQuery()->getResult();
        if (sizeof($result) >= 1) {
            return $result[0]['plan'];
        }
        return null;
    }

    /**
     * Get the value of the annual plan in a determinate year for a specific service
     * @param $service the service to find the plan
     * @param $year year for filter the annual plan
     * @return the plan or null if the service has not assigned plan
     */
    public function getServiceAnnualPlanInAYear($service, $year)
    {
        $em = $this->getEntityManager();
        $queryBuilder = $em->createQueryBuilder();
        $queryBuilder
            ->select('ap.plan')
            ->from('sisconeeAppBundle:PlanAnualServicio', 'ap')
            ->innerJoin('ap.servicio', 's', 'WITH', 's=?1')->setParameter(1, $service)
            ->andWhere('ap.anno = :year')->setParameter('year', $year);

        $result = $queryBuilder->getQuery()->getResult();
        if ($result!=null && sizeof($result) >= 1) {
            return $result[0]['plan'];
        }
        return null;
    }

    /**
     * Get the annual plan in a determinate year for a specific service
     * @param $service the service for filter the annual plan
     * @param $year year for filter the annual plan
     * @return the plan or null if no exists the annual plan
     */
    public function getServiceAnnualPlanObjectInAYear($service, $year)
    {
        $em = $this->getEntityManager();
        $queryBuilder = $em->createQueryBuilder();
        $queryBuilder
            ->select('ap')
            ->from('sisconeeAppBundle:PlanAnualServicio', 'ap')
            ->innerJoin('ap.servicio', 's', 'WITH', 's=?1')->setParameter(1, $service)
            ->andWhere('ap.anno = :year')->setParameter('year', $year);

        return $queryBuilder->getQuery()->getOneOrNullResult();
    }


    /**
     * Get the monthly plans of a service in a determinate year
     * @param $service the service for filter the plans
     * @param $year the year for filter the plans
     * @return array with monthly plans
     */
    public function getMonthlyPlansOfAServiceInAYear($service, $year)
    {
        $em = $this->getEntityManager();
        $queryBuilder = $em->createQueryBuilder();
        $queryBuilder
            ->select('p')
            ->from('sisconeeAppBundle:PlanMensualServicio', 'p')
            ->where('p.servicio =:service')->setParameter('service', $service)
            ->andWhere('p.anno =:year')->setParameter('year', $year);

        return $queryBuilder->getQuery()->getResult();
    }

    /**
     * Get the plan of a service in a determinate month and year
     * @param $service the service for filter the plan
     * @param $month the month for filter the plan
     * @param $year the year for filter the plan
     * @return array with monthly plan
     */
    public function getPlanOfAServiceInAMonthYear($service, $month, $year)
    {
        $em = $this->getEntityManager();
        $queryBuilder = $em->createQueryBuilder();
        $queryBuilder
            ->select('p')
            ->from('sisconeeAppBundle:PlanMensualServicio', 'p')
            ->where('p.servicio =:service')->setParameter('service', $service)
            ->andWhere('p.mes=:month')->setParameter('month', $month)
            ->andWhere('p.anno =:year')->setParameter('year', $year);

        return $queryBuilder->getQuery()->getOneOrNullResult();
    }

    /**
     * Get the plan of a service in a determinate date
     * @param $service the service for filter the plan
     * @param $date the date for filter the plan
     * @return the daily plan value for the date
     */
    public function getPlanOfAServiceInADate($service, $date)
    {
        $em = $this->getEntityManager();
        $queryBuilder = $em->createQueryBuilder();
        $queryBuilder
            ->select('p')
            ->from('sisconeeAppBundle:LecturaDiariaServicio', 'p')
            ->where('p.idServicio=:service')->setParameter('service', $service)
            ->andWhere('p.fecha=:date')->setParameter('date', $date);

        $res = $queryBuilder->getQuery()->getResult();

        return $queryBuilder->getQuery()->getOneOrNullResult();
    }

    /**
     * Get the daily plans of a service in a determinate month
     * @param $service the service for filter the plans
     * @param $mont the month for filter the plans
     * @return array with daily plans
     */
    public function getDailyPlansOfAServiceInAMonth($service, $month)
    {
        $em = $this->getEntityManager();
        $serviceId = $service->getId();
        $consulta = "
SELECT
plan, plan_horariopico, fecha
FROM
lectura_diaria_servicio
WHERE
id_servicio = $serviceId
AND MONTH(fecha) = $month";

        $rsm = new \Doctrine\ORM\Query\ResultSetMapping();
        $rsm->addScalarResult('plan', 'plan');
        $rsm->addScalarResult('plan_horariopico', 'plan_horariopico');
        $rsm->addScalarResult('fecha', 'fecha');

        $query = $em->createNativeQuery($consulta, $rsm);
        return $query->getResult();

        /* $em = $this->getEntityManager();
         $queryBuilder = $em->createQueryBuilder();
         $queryBuilder
             ->select('p')
             ->from('sisconeeAppBundle:LecturaDiariaServicio', 'p')
             ->where('p.idServicio =:service')->setParameter('service', $service);
             //->andWhere('MONTH(p.fecha)=:month')->setParameter('month', $month);

         return $queryBuilder->getQuery()->getResult();*/
    }

    /**
     * Get the months without plans for a service in a determinate year
     * @param $service the service for filter the plans
     * @param $year the year for filter the plans
     * @return the months without plans
     */
    public function getMonthsWithoutPlans($service, $year)
    {
        $em = $this->getEntityManager();
        $queryBuilder = $em->createQueryBuilder();
        $queryBuilder
            ->select('p.mes')
            ->from('sisconeeAppBundle:PlanMensualServicio', 'p')
            ->where('p.servicio =:service')->setParameter('service', $service)
            ->andWhere('p.anno =:year')->setParameter('year', $year);

        return $queryBuilder->getQuery()->getResult();
    }

    public function getAnnualPlansOfServicesBelongingTo($parent, $year)
    {
//        $parent=2;
//            $year=2014;

        $em = $this->getEntityManager();
        $queryBuilder = $em->createQueryBuilder();
        $queryBuilder
            ->select('annualPlanServices')
            ->from('sisconeeAppBundle:PlanAnualServicio', 'annualPlanServices')
            ->innerJoin('sisconeeAppBundle:Servicio', 'ser', 'With', 'annualPlanServices.servicio=ser.id')
            ->innerJoin('sisconeeAppBundle:Entidad', 'ent', 'With', 'ser.entidad=ent.id')
            ->where('ent.id=?1 and annualPlanServices.anno=?2')
            ->setParameter(1, $parent)
            ->setParameter(2, $year);

        return $queryBuilder->getQuery()->getResult();

    }
//    public function getServicesBelongingTo($parent)
//    {
//        $em=$this->getEntityManager();
//        $querybuilder=$em->createQueryBuilder();
//        $querybuilder
//            ->select('ser')
//            ->from('sisconeeAppBundle:Servicio','ser')
//
//
//
//    }

  /******************************************************************************************/

    public function  getPlanMensualXServicio($organismo,$provincia,$entidad,$mostrarHijas, $anno)
    {
        $em = $this->getEntityManager();

        $rsm = new \Doctrine\ORM\Query\ResultSetMapping();
        $rsm->addScalarResult('idServicio', 'id_servicio');
        $rsm->addScalarResult('planEnero', 'planEnero');
        $rsm->addScalarResult('planFebrero', 'planFebrero');
        $rsm->addScalarResult('planMarzo', 'planMarzo');
        $rsm->addScalarResult('planAbril', 'planAbril');
        $rsm->addScalarResult('planMayo', 'planMayo');
        $rsm->addScalarResult('planJunio', 'planJunio');
        $rsm->addScalarResult('planJulio', 'planJulio');
        $rsm->addScalarResult('planAgosto', 'planAgosto');
        $rsm->addScalarResult('planSeptiembre', 'planSeptiembre');
        $rsm->addScalarResult('planOctubre', 'planOctubre');
        $rsm->addScalarResult('planNoviembre', 'planNoviembre');
        $rsm->addScalarResult('planDiciembre', 'planDiciembre');
        $rsm->addScalarResult('nombreEntidad', 'nombreEntidad');
        $rsm->addScalarResult('id_organismo', 'id_organismo');
        $rsm->addScalarResult('activo', 'activo');
        $rsm->addScalarResult('idProvincia', 'idProvincia');
        $rsm->addScalarResult('descripcion', 'descripcion');
        $rsm->addScalarResult('nombreServicio', 'nombreServicio');
        $rsm->addScalarResult('codcliente_EE', 'codcliente_EE');
        $rsm->addScalarResult('codRF', 'codRF');
        $rsm->addScalarResult('id_entidad', 'id_entidad');
        $rsm->addScalarResult('codreeup', 'codreeup');



        if ($provincia!=null) {
            $HavingProvincia = ' and (provincia.id = '.$provincia.')' ; }
        else {
            $HavingProvincia = '' ;
        }
        if ($entidad!=null) {
            $HavingEntidad = ' and ';
            $HavingEntidad .= $mostrarHijas?" (":"";
            $HavingEntidad .= ' (entidad.id = '.$entidad.')' ;
        }
        else {
            $HavingEntidad = '' ;
        }

        if (($mostrarHijas== true) and  ($entidad!=null)) {
            $HavingEntidadHijas = ' or (entidad.id_entidad = '.$entidad.')) ' ; }
        else {
            $HavingEntidadHijas = '' ;
        }

        $consulta = 'SELECT    plamMensualServicio.id_servicio, SUM(plamMensualServicio.planEnero) AS planEnero, SUM(plamMensualServicio.planFebrero) AS planFebrero,
                                                  SUM(plamMensualServicio.planMarzo) AS planMarzo, SUM(plamMensualServicio.planAbril) AS planAbril, SUM(plamMensualServicio.planMayo)
                                                  AS planMayo, SUM(plamMensualServicio.planJunio) AS planJunio, SUM(plamMensualServicio.planJulio) AS planJulio,
                                                  SUM(plamMensualServicio.planAgosto) AS planAgosto, SUM(plamMensualServicio.planSeptiembre) AS planSeptiembre,
                                                  SUM(plamMensualServicio.planOctubre) AS planOctubre, SUM(plamMensualServicio.planNoviembre) AS planNoviembre,
                                                  SUM(plamMensualServicio.planDiciembre) AS planDiciembre, entidad.id as idEntidad, entidad.nombre as nombreEntidad, entidad.id_organismo, entidad.activo, provincia.id AS idProvincia,
                                                  provincia.descripcion,  servicio.nombre AS nombreServicio, servicio.codcliente_EE, servicio.codRF, entidad.id_entidad, entidad.codreeup
                                           FROM    entidad INNER JOIN
                                                  servicio ON entidad.id = servicio.id_entidad INNER JOIN
                                                  (SELECT     id_servicio, plan AS planEnero, 0 AS planFebrero, 0 AS planMarzo, 0 AS planAbril, 0 AS planMayo, 0 AS planJunio, 0 AS planJulio,
                                                                           0 AS planAgosto, 0 AS planSeptiembre, 0 AS planOctubre, 0 AS planNoviembre, 0 AS planDiciembre
                                                    FROM          plan_mensual_servicio
                                                    WHERE      (mes = 1) and (anno ='.$anno.')
                                                    UNION
                                                    SELECT     id_servicio, 0 AS planEnero, plan AS planFebrero, 0 AS planMarzo, 0 AS planAbril, 0 AS planMayo, 0 AS planJunio, 0 AS planJulio,
                                                                          0 AS planAgosto, 0 AS planSeptiembre, 0 AS planOctubre, 0 AS planNoviembre, 0 AS planDiciembre
                                                    FROM         plan_mensual_servicio AS plan_mensual_servicio_11
                                                    WHERE     (mes = 2) and (anno ='.$anno.')
                                                    UNION
                                                    SELECT     id_servicio, 0 AS planEnero, 0 AS planFebrero, plan AS planMarzo, 0 AS planAbril, 0 AS planMayo, 0 AS planJunio, 0 AS planJulio,
                                                                          0 AS planAgosto, 0 AS planSeptiembre, 0 AS planOctubre, 0 AS planNoviembre, 0 AS planDiciembre
                                                    FROM         plan_mensual_servicio AS plan_mensual_servicio_10
                                                    WHERE     (mes = 3) and (anno ='.$anno.')
                                                    UNION
                                                    SELECT     id_servicio, 0 AS planEnero, 0 AS planFebrero, 0 AS planMarzo, plan AS planAbril, 0 AS planMayo, 0 AS planJunio, 0 AS planJulio,
                                                                          0 AS planAgosto, 0 AS planSeptiembre, 0 AS planOctubre, 0 AS planNoviembre, 0 AS planDiciembre
                                                    FROM         plan_mensual_servicio AS plan_mensual_servicio_9
                                                    WHERE     (mes = 4) and (anno ='.$anno.')
                                                    UNION
                                                    SELECT     id_servicio, 0 AS planEnero, 0 AS planFebrero, 0 AS planMarzo, 0 AS planAbril, plan AS planMayo, 0 AS planJunio, 0 AS planJulio,
                                                                          0 AS planAgosto, 0 AS planSeptiembre, 0 AS planOctubre, 0 AS planNoviembre, 0 AS planDiciembre
                                                    FROM         plan_mensual_servicio AS plan_mensual_servicio_8
                                                    WHERE     (mes = 5) and (anno ='.$anno.')
                                                    UNION
                                                    SELECT     id_servicio, 0 AS planEnero, 0 AS planFebrero, 0 AS planMarzo, 0 AS planAbril, 0 AS planMayo, plan AS planJunio, 0 AS planJulio,
                                                                          0 AS planAgosto, 0 AS planSeptiembre, 0 AS planOctubre, 0 AS planNoviembre, 0 AS planDiciembre
                                                    FROM         plan_mensual_servicio AS plan_mensual_servicio_7
                                                    WHERE     (mes = 6) and (anno ='.$anno.')
                                                    UNION
                                                    SELECT     id_servicio, 0 AS planEnero, 0 AS planFebrero, 0 AS planMarzo, 0 AS planAbril, 0 AS planMayo, 0 AS planJunio, plan AS planJulio,
                                                                          0 AS planAgosto, 0 AS planSeptiembre, 0 AS planOctubre, 0 AS planNoviembre, 0 AS planDiciembre
                                                    FROM         plan_mensual_servicio AS plan_mensual_servicio_6
                                                    WHERE     (mes = 7) and (anno ='.$anno.')
                                                    UNION
                                                    SELECT     id_servicio, 0 AS planEnero, 0 AS planFebrero, 0 AS planMarzo, 0 AS planAbril, 0 AS planMayo, 0 AS planJunio, 0 AS planJulio,
                                                                          plan AS planAgosto, 0 AS planSeptiembre, 0 AS planOctubre, 0 AS planNoviembre, 0 AS planDiciembre
                                                    FROM         plan_mensual_servicio AS plan_mensual_servicio_5
                                                    WHERE     (mes = 8) and (anno ='.$anno.')
                                                    UNION
                                                    SELECT     id_servicio, 0 AS planEnero, 0 AS planFebrero, 0 AS planMarzo, 0 AS planAbril, 0 AS planMayo, 0 AS planJunio, 0 AS planJulio,
                                                                          0 AS planAgosto, plan AS planSeptiembre, 0 AS planOctubre, 0 AS planNoviembre, 0 AS planDiciembre
                                                    FROM         plan_mensual_servicio AS plan_mensual_servicio_4
                                                    WHERE     (mes = 9) and (anno ='.$anno.')
                                                    UNION
                                                    SELECT     id_servicio, 0 AS planEnero, 0 AS planFebrero, 0 AS planMarzo, 0 AS planAbril, 0 AS planMayo, 0 AS planJunio, 0 AS planJulio,
                                                                          0 AS planAgosto, 0 AS planSeptiembre, plan AS planOctubre, 0 AS planNoviembre, 0 AS planDiciembre
                                                    FROM         plan_mensual_servicio AS plan_mensual_servicio_3
                                                    WHERE     (mes = 10) and (anno ='.$anno.')
                                                    UNION
                                                    SELECT     id_servicio, 0 AS planEnero, 0 AS planFebrero, 0 AS planMarzo, 0 AS planAbril, 0 AS planMayo, 0 AS planJunio, 0 AS planJulio,
                                                                          0 AS planAgosto, 0 AS planSeptiembre, 0 AS planOctubre, plan AS planNoviembre, 0 AS planDiciembre
                                                    FROM         plan_mensual_servicio AS plan_mensual_servicio_2
                                                    WHERE     (mes = 11) and (anno ='.$anno.')
                                                    UNION
                                                    SELECT     id_servicio, 0 AS planEnero, 0 AS planFebrero, 0 AS planMarzo, 0 AS planAbril, 0 AS planMayo, 0 AS planJunio, 0 AS planJulio,
                                                                              0 AS planAgosto, 0 AS planSeptiembre, 0 AS planOctubre, 0 AS planNoviembre, plan AS planDiciembre
                                                    FROM         plan_mensual_servicio AS plan_mensual_servicio_1
                                                    WHERE     (mes = 12) and (anno ='.$anno.')) AS plamMensualServicio ON servicio.id = plamMensualServicio.id_servicio INNER JOIN
                                                  provincia ON entidad.id_provincia = provincia.id
                                            GROUP BY plamMensualServicio.id_servicio
                                            HAVING   (entidad.id_organismo ='.$organismo.')'.$HavingProvincia.$HavingEntidad.$HavingEntidadHijas.
            ' ORDER BY idProvincia, nombreEntidad, nombreServicio ';


        $query = $em->createNativeQuery($consulta, $rsm);


        $result =  $query->getResult();
        return $result ;

    }

    public function  getPlanMensualXEntidad($organismo,$provincia,$entidad,$mostrarHijas, $anno)
    {
        $em = $this->getEntityManager();

        $rsm = new \Doctrine\ORM\Query\ResultSetMapping();
        $rsm->addScalarResult('planEnero', 'planEnero');
        $rsm->addScalarResult('planFebrero', 'planFebrero');
        $rsm->addScalarResult('planMarzo', 'planMarzo');
        $rsm->addScalarResult('planAbril', 'planAbril');
        $rsm->addScalarResult('planMayo', 'planMayo');
        $rsm->addScalarResult('planJunio', 'planJunio');
        $rsm->addScalarResult('planJulio', 'planJulio');
        $rsm->addScalarResult('planAgosto', 'planAgosto');
        $rsm->addScalarResult('planSeptiembre', 'planSeptiembre');
        $rsm->addScalarResult('planOctubre', 'planOctubre');
        $rsm->addScalarResult('planNoviembre', 'planNoviembre');
        $rsm->addScalarResult('planDiciembre', 'planDiciembre');
        $rsm->addScalarResult('nombreEntidad', 'nombreEntidad');
        $rsm->addScalarResult('id_organismo', 'id_organismo');
        $rsm->addScalarResult('activo', 'activo');
        $rsm->addScalarResult('idProvincia', 'idProvincia');
        $rsm->addScalarResult('descripcion', 'descripcion');
        $rsm->addScalarResult('id_entidad', 'id_entidad');
        $rsm->addScalarResult('codreeup', 'codreeup');

        if ($provincia!=null) {
            $HavingProvincia = ' and (provincia.id = '.$provincia.')' ; }
        else {
            $HavingProvincia = '' ;
        }
        if ($entidad!=null) {
            $HavingEntidad = ' and ';
            $HavingEntidad .= $mostrarHijas?" (":"";
            $HavingEntidad .= ' (entidad.id = '.$entidad.')' ;
        }
        else {
            $HavingEntidad = '' ;
        }

        if (($mostrarHijas== true) and  ($entidad!=null)){
            $HavingEntidadHijas = ' or (entidad.id_entidad = '.$entidad.')) ' ; }
        else {
            $HavingEntidadHijas = '' ;
        }

        $consulta = 'SELECT   SUM(plamMensualServicio.planEnero) AS planEnero, SUM(plamMensualServicio.planFebrero) AS planFebrero,
                              SUM(plamMensualServicio.planMarzo) AS planMarzo, SUM(plamMensualServicio.planAbril) AS planAbril, SUM(plamMensualServicio.planMayo) AS planMayo,
                              SUM(plamMensualServicio.planJunio) AS planJunio, SUM(plamMensualServicio.planJulio) AS planJulio,
                              SUM(plamMensualServicio.planAgosto) AS planAgosto, SUM(plamMensualServicio.planSeptiembre) AS planSeptiembre,
                              SUM(plamMensualServicio.planOctubre) AS planOctubre, SUM(plamMensualServicio.planNoviembre) AS planNoviembre,
                              SUM(plamMensualServicio.planDiciembre) AS planDiciembre, entidad.id as idEntidad, entidad.nombre as nombreEntidad, entidad.id_organismo, entidad.activo, provincia.id AS idProvincia,
                              provincia.descripcion, entidad.id_entidad,  entidad.codreeup
                        FROM  entidad INNER JOIN
                              servicio ON entidad.id = servicio.id_entidad INNER JOIN
                              (SELECT   id_servicio, plan AS planEnero, 0 AS planFebrero, 0 AS planMarzo, 0 AS planAbril, 0 AS planMayo, 0 AS planJunio, 0 AS planJulio,
                                        0 AS planAgosto, 0 AS planSeptiembre, 0 AS planOctubre, 0 AS planNoviembre, 0 AS planDiciembre
                               FROM     plan_mensual_servicio
                               WHERE    (mes = 1) and (anno ='.$anno.')
                               UNION
                               SELECT   id_servicio, 0 AS planEnero, plan AS planFebrero, 0 AS planMarzo, 0 AS planAbril, 0 AS planMayo, 0 AS planJunio, 0 AS planJulio,
                                        0 AS planAgosto, 0 AS planSeptiembre, 0 AS planOctubre, 0 AS planNoviembre, 0 AS planDiciembre
                               FROM     plan_mensual_servicio AS plan_mensual_servicio_11
                               WHERE    (mes = 2) and (anno ='.$anno.')
                               UNION
                               SELECT   id_servicio, 0 AS planEnero, 0 AS planFebrero, plan AS planMarzo, 0 AS planAbril, 0 AS planMayo, 0 AS planJunio, 0 AS planJulio,
                                        0 AS planAgosto, 0 AS planSeptiembre, 0 AS planOctubre, 0 AS planNoviembre, 0 AS planDiciembre
                               FROM     plan_mensual_servicio AS plan_mensual_servicio_10
                               WHERE    (mes = 3) and (anno ='.$anno.')
                               UNION
                               SELECT   id_servicio, 0 AS planEnero, 0 AS planFebrero, 0 AS planMarzo, plan AS planAbril, 0 AS planMayo, 0 AS planJunio, 0 AS planJulio,
                                        0 AS planAgosto, 0 AS planSeptiembre, 0 AS planOctubre, 0 AS planNoviembre, 0 AS planDiciembre
                               FROM     plan_mensual_servicio AS plan_mensual_servicio_9
                               WHERE    (mes = 4) and (anno ='.$anno.')
                               UNION
                               SELECT   id_servicio, 0 AS planEnero, 0 AS planFebrero, 0 AS planMarzo, 0 AS planAbril, plan AS planMayo, 0 AS planJunio, 0 AS planJulio,
                                        0 AS planAgosto, 0 AS planSeptiembre, 0 AS planOctubre, 0 AS planNoviembre, 0 AS planDiciembre
                               FROM     plan_mensual_servicio AS plan_mensual_servicio_8
                               WHERE    (mes = 5) and (anno ='.$anno.')
                               UNION
                               SELECT   id_servicio, 0 AS planEnero, 0 AS planFebrero, 0 AS planMarzo, 0 AS planAbril, 0 AS planMayo, plan AS planJunio, 0 AS planJulio,
                                        0 AS planAgosto, 0 AS planSeptiembre, 0 AS planOctubre, 0 AS planNoviembre, 0 AS planDiciembre
                               FROM     plan_mensual_servicio AS plan_mensual_servicio_7
                               WHERE    (mes = 6) and (anno ='.$anno.')
                               UNION
                               SELECT   id_servicio, 0 AS planEnero, 0 AS planFebrero, 0 AS planMarzo, 0 AS planAbril, 0 AS planMayo, 0 AS planJunio, plan AS planJulio,
                                        0 AS planAgosto, 0 AS planSeptiembre, 0 AS planOctubre, 0 AS planNoviembre, 0 AS planDiciembre
                               FROM     plan_mensual_servicio AS plan_mensual_servicio_6
                               WHERE    (mes = 7) and (anno ='.$anno.')
                               UNION
                               SELECT   id_servicio, 0 AS planEnero, 0 AS planFebrero, 0 AS planMarzo, 0 AS planAbril, 0 AS planMayo, 0 AS planJunio, 0 AS planJulio,
                                        plan AS planAgosto, 0 AS planSeptiembre, 0 AS planOctubre, 0 AS planNoviembre, 0 AS planDiciembre
                               FROM     plan_mensual_servicio AS plan_mensual_servicio_5
                               WHERE    (mes = 8) and (anno ='.$anno.')
                               UNION
                               SELECT    id_servicio, 0 AS planEnero, 0 AS planFebrero, 0 AS planMarzo, 0 AS planAbril, 0 AS planMayo, 0 AS planJunio, 0 AS planJulio,
                                         0 AS planAgosto, plan AS planSeptiembre, 0 AS planOctubre, 0 AS planNoviembre, 0 AS planDiciembre
                               FROM      plan_mensual_servicio AS plan_mensual_servicio_4
                               WHERE     (mes = 9) and (anno ='.$anno.')
                               UNION
                               SELECT    id_servicio, 0 AS planEnero, 0 AS planFebrero, 0 AS planMarzo, 0 AS planAbril, 0 AS planMayo, 0 AS planJunio, 0 AS planJulio,
                                         0 AS planAgosto, 0 AS planSeptiembre, plan AS planOctubre, 0 AS planNoviembre, 0 AS planDiciembre
                               FROM      plan_mensual_servicio AS plan_mensual_servicio_3
                               WHERE     (mes = 10) and (anno ='.$anno.')
                               UNION
                               SELECT    id_servicio, 0 AS planEnero, 0 AS planFebrero, 0 AS planMarzo, 0 AS planAbril, 0 AS planMayo, 0 AS planJunio, 0 AS planJulio,
                                         0 AS planAgosto, 0 AS planSeptiembre, 0 AS planOctubre, plan AS planNoviembre, 0 AS planDiciembre
                               FROM      plan_mensual_servicio AS plan_mensual_servicio_2
                               WHERE     (mes = 11) and (anno ='.$anno.')
                               UNION
                               SELECT   id_servicio, 0 AS planEnero, 0 AS planFebrero, 0 AS planMarzo, 0 AS planAbril, 0 AS planMayo, 0 AS planJunio, 0 AS planJulio,
                                        0 AS planAgosto, 0 AS planSeptiembre, 0 AS planOctubre, 0 AS planNoviembre, plan AS planDiciembre
                               FROM     plan_mensual_servicio AS plan_mensual_servicio_1
                               WHERE    (mes = 12) and (anno ='.$anno.')) AS plamMensualServicio ON servicio.id = plamMensualServicio.id_servicio INNER JOIN
                              provincia ON entidad.id_provincia = provincia.id
                        GROUP BY idEntidad
                        HAVING   (entidad.id_organismo ='.$organismo.')'.$HavingProvincia.$HavingEntidad.$HavingEntidadHijas.
            ' ORDER BY idProvincia, nombreEntidad ';


        $query = $em->createNativeQuery($consulta, $rsm);


        $result =  $query->getResult();
        return $result ;

    }

    public function  getPlanMensualXProvincia($organismo, $provincia,$entidad,$mostrarHijas, $anno)
    {
        $em = $this->getEntityManager();

        $rsm = new \Doctrine\ORM\Query\ResultSetMapping();
        $rsm->addScalarResult('planEnero', 'planEnero');
        $rsm->addScalarResult('planFebrero', 'planFebrero');
        $rsm->addScalarResult('planMarzo', 'planMarzo');
        $rsm->addScalarResult('planAbril', 'planAbril');
        $rsm->addScalarResult('planMayo', 'planMayo');
        $rsm->addScalarResult('planJunio', 'planJunio');
        $rsm->addScalarResult('planJulio', 'planJulio');
        $rsm->addScalarResult('planAgosto', 'planAgosto');
        $rsm->addScalarResult('planSeptiembre', 'planSeptiembre');
        $rsm->addScalarResult('planOctubre', 'planOctubre');
        $rsm->addScalarResult('planNoviembre', 'planNoviembre');
        $rsm->addScalarResult('planDiciembre', 'planDiciembre');
        $rsm->addScalarResult('nombreEntidad', 'nombreEntidad');
        $rsm->addScalarResult('id_organismo', 'id_organismo');
        $rsm->addScalarResult('idProvincia', 'idProvincia');
        $rsm->addScalarResult('descripcion', 'descripcion');

        if ($provincia!=null) {
            $HavingProvincia = ' and (provincia.id = '.$provincia.')' ; }
        else {
            $HavingProvincia = '' ;
        }
        if ($entidad!=null) {
            $HavingEntidad = ' and ';
            $HavingEntidad .= $mostrarHijas?" (":"";
            $HavingEntidad .= ' (entidad.id = '.$entidad.')' ;
        }
        else {
            $HavingEntidad = '' ;
        }

        if (($mostrarHijas== true) and  ($entidad!=null)) {
            $HavingEntidadHijas = ' or (entidad.id_entidad = '.$entidad.')) ' ; }
        else {
            $HavingEntidadHijas = '' ;
        }

        $consulta = 'SELECT   SUM(plamMensualServicio.planEnero) AS planEnero, SUM(plamMensualServicio.planFebrero) AS planFebrero,
                              SUM(plamMensualServicio.planMarzo) AS planMarzo, SUM(plamMensualServicio.planAbril) AS planAbril, SUM(plamMensualServicio.planMayo) AS planMayo,
                              SUM(plamMensualServicio.planJunio) AS planJunio, SUM(plamMensualServicio.planJulio) AS planJulio,
                              SUM(plamMensualServicio.planAgosto) AS planAgosto, SUM(plamMensualServicio.planSeptiembre) AS planSeptiembre,
                              SUM(plamMensualServicio.planOctubre) AS planOctubre, SUM(plamMensualServicio.planNoviembre) AS planNoviembre,
                              SUM(plamMensualServicio.planDiciembre) AS planDiciembre, provincia.id AS idProvincia,
                              provincia.descripcion
                        FROM  entidad INNER JOIN
                              servicio ON entidad.id = servicio.id_entidad INNER JOIN
                              (SELECT   id_servicio, plan AS planEnero, 0 AS planFebrero, 0 AS planMarzo, 0 AS planAbril, 0 AS planMayo, 0 AS planJunio, 0 AS planJulio,
                                        0 AS planAgosto, 0 AS planSeptiembre, 0 AS planOctubre, 0 AS planNoviembre, 0 AS planDiciembre
                               FROM     plan_mensual_servicio
                               WHERE    (mes = 1) and (anno ='.$anno.')
                               UNION
                               SELECT   id_servicio, 0 AS planEnero, plan AS planFebrero, 0 AS planMarzo, 0 AS planAbril, 0 AS planMayo, 0 AS planJunio, 0 AS planJulio,
                                        0 AS planAgosto, 0 AS planSeptiembre, 0 AS planOctubre, 0 AS planNoviembre, 0 AS planDiciembre
                               FROM     plan_mensual_servicio AS plan_mensual_servicio_11
                               WHERE    (mes = 2) and (anno ='.$anno.')
                               UNION
                               SELECT   id_servicio, 0 AS planEnero, 0 AS planFebrero, plan AS planMarzo, 0 AS planAbril, 0 AS planMayo, 0 AS planJunio, 0 AS planJulio,
                                        0 AS planAgosto, 0 AS planSeptiembre, 0 AS planOctubre, 0 AS planNoviembre, 0 AS planDiciembre
                               FROM     plan_mensual_servicio AS plan_mensual_servicio_10
                               WHERE    (mes = 3) and (anno ='.$anno.')
                               UNION
                               SELECT   id_servicio, 0 AS planEnero, 0 AS planFebrero, 0 AS planMarzo, plan AS planAbril, 0 AS planMayo, 0 AS planJunio, 0 AS planJulio,
                                        0 AS planAgosto, 0 AS planSeptiembre, 0 AS planOctubre, 0 AS planNoviembre, 0 AS planDiciembre
                               FROM     plan_mensual_servicio AS plan_mensual_servicio_9
                               WHERE    (mes = 4) and (anno ='.$anno.')
                               UNION
                               SELECT   id_servicio, 0 AS planEnero, 0 AS planFebrero, 0 AS planMarzo, 0 AS planAbril, plan AS planMayo, 0 AS planJunio, 0 AS planJulio,
                                        0 AS planAgosto, 0 AS planSeptiembre, 0 AS planOctubre, 0 AS planNoviembre, 0 AS planDiciembre
                               FROM     plan_mensual_servicio AS plan_mensual_servicio_8
                               WHERE    (mes = 5) and (anno ='.$anno.')
                               UNION
                               SELECT   id_servicio, 0 AS planEnero, 0 AS planFebrero, 0 AS planMarzo, 0 AS planAbril, 0 AS planMayo, plan AS planJunio, 0 AS planJulio,
                                        0 AS planAgosto, 0 AS planSeptiembre, 0 AS planOctubre, 0 AS planNoviembre, 0 AS planDiciembre
                               FROM     plan_mensual_servicio AS plan_mensual_servicio_7
                               WHERE    (mes = 6) and (anno ='.$anno.')
                               UNION
                               SELECT   id_servicio, 0 AS planEnero, 0 AS planFebrero, 0 AS planMarzo, 0 AS planAbril, 0 AS planMayo, 0 AS planJunio, plan AS planJulio,
                                        0 AS planAgosto, 0 AS planSeptiembre, 0 AS planOctubre, 0 AS planNoviembre, 0 AS planDiciembre
                               FROM     plan_mensual_servicio AS plan_mensual_servicio_6
                               WHERE    (mes = 7) and (anno ='.$anno.')
                               UNION
                               SELECT   id_servicio, 0 AS planEnero, 0 AS planFebrero, 0 AS planMarzo, 0 AS planAbril, 0 AS planMayo, 0 AS planJunio, 0 AS planJulio,
                                        plan AS planAgosto, 0 AS planSeptiembre, 0 AS planOctubre, 0 AS planNoviembre, 0 AS planDiciembre
                               FROM     plan_mensual_servicio AS plan_mensual_servicio_5
                               WHERE    (mes = 8) and (anno ='.$anno.')
                               UNION
                               SELECT    id_servicio, 0 AS planEnero, 0 AS planFebrero, 0 AS planMarzo, 0 AS planAbril, 0 AS planMayo, 0 AS planJunio, 0 AS planJulio,
                                         0 AS planAgosto, plan AS planSeptiembre, 0 AS planOctubre, 0 AS planNoviembre, 0 AS planDiciembre
                               FROM      plan_mensual_servicio AS plan_mensual_servicio_4
                               WHERE     (mes = 9) and (anno ='.$anno.')
                               UNION
                               SELECT    id_servicio, 0 AS planEnero, 0 AS planFebrero, 0 AS planMarzo, 0 AS planAbril, 0 AS planMayo, 0 AS planJunio, 0 AS planJulio,
                                         0 AS planAgosto, 0 AS planSeptiembre, plan AS planOctubre, 0 AS planNoviembre, 0 AS planDiciembre
                               FROM      plan_mensual_servicio AS plan_mensual_servicio_3
                               WHERE     (mes = 10) and (anno ='.$anno.')
                               UNION
                               SELECT    id_servicio, 0 AS planEnero, 0 AS planFebrero, 0 AS planMarzo, 0 AS planAbril, 0 AS planMayo, 0 AS planJunio, 0 AS planJulio,
                                         0 AS planAgosto, 0 AS planSeptiembre, 0 AS planOctubre, plan AS planNoviembre, 0 AS planDiciembre
                               FROM      plan_mensual_servicio AS plan_mensual_servicio_2
                               WHERE     (mes = 11) and (anno ='.$anno.')
                               UNION
                               SELECT   id_servicio, 0 AS planEnero, 0 AS planFebrero, 0 AS planMarzo, 0 AS planAbril, 0 AS planMayo, 0 AS planJunio, 0 AS planJulio,
                                        0 AS planAgosto, 0 AS planSeptiembre, 0 AS planOctubre, 0 AS planNoviembre, plan AS planDiciembre
                               FROM     plan_mensual_servicio AS plan_mensual_servicio_1
                               WHERE    (mes = 12) and (anno ='.$anno.')) AS plamMensualServicio ON servicio.id = plamMensualServicio.id_servicio INNER JOIN
                              provincia ON entidad.id_provincia = provincia.id
                        WHERE (entidad.id_organismo ='.$organismo.')'.$HavingProvincia.$HavingEntidad.$HavingEntidadHijas.
            ' GROUP BY  provincia.id
                        ORDER BY idProvincia ';

        //echo($consulta);

        $query = $em->createNativeQuery($consulta, $rsm);


        $result =  $query->getResult();
        return $result ;

    }

    public function  getComportamientoDiario($organismo, $provincia,$entidad,$mostrarHijas, $mes, $anno)
    {
        $em = $this->getEntityManager();

        $rsm = new \Doctrine\ORM\Query\ResultSetMapping();
        $rsm->addScalarResult('Plan', 'Plan');
        $rsm->addScalarResult('Consumo', 'Consumo');
        $rsm->addScalarResult('fecha', 'fecha');
        $rsm->addScalarResult('DiaSemana', 'DiaSemana');
        $rsm->addScalarResult('id_provincia', 'id_provincia');
        $rsm->addScalarResult('descripcion', 'descripcion');

        if ($provincia!=null) {
            $HavingProvincia = ' and (provincia.id = '.$provincia.')' ; }
        else {
            $HavingProvincia = '' ;
        }
        if ($entidad!=null) {
            $HavingEntidad = ' and ';
            $HavingEntidad .= $mostrarHijas?" (":"";
            $HavingEntidad .= ' (entidad.id = '.$entidad.')' ;
        }
        else {
            $HavingEntidad = '' ;
        }

        if (($mostrarHijas== true) and  ($entidad!=null)) {
            $HavingEntidadHijas = ' or (entidad.id_entidad = '.$entidad.')) ' ; }
        else {
            $HavingEntidadHijas = '' ;
        }


        $consulta = 'SELECT   SUM(lectura_diaria_servicio.consumo) AS Consumo, SUM(lectura_diaria_servicio.plan) AS Plan, lectura_diaria_servicio.fecha,   CASE WHEN Dayofweek(fecha) = 1 THEN "DOMINGO" ELSE CASE WHEN Dayofweek(fecha) = 2 THEN
                     "LUNES" ELSE CASE WHEN Dayofweek(fecha) = 3 THEN "MARTES" ELSE CASE WHEN Dayofweek(fecha)
                      = 4 THEN "MIERCOLES" ELSE CASE WHEN Dayofweek(fecha) = 5 THEN "JUEVES" ELSE CASE WHEN Dayofweek(fecha)
                      = 6 THEN "VIERNES" ELSE CASE WHEN Dayofweek(fecha) = 7 THEN "SABADO" END END END END END END END AS DiaSemana, entidad.id_provincia, provincia.descripcion
                        FROM         lectura_diaria_servicio
                        INNER JOIN servicio ON servicio.id = lectura_diaria_servicio.id_servicio
                        INNER JOIN entidad ON servicio.id_entidad = entidad.id
                        INNER JOIN provincia ON entidad.id_provincia = provincia.id
                        Where (entidad.id_organismo = '.$organismo.') and (MONTH(lectura_diaria_servicio.fecha)='.$mes.') AND (YEAR(lectura_diaria_servicio.fecha)='.$anno.')'.$HavingProvincia.$HavingEntidad.$HavingEntidadHijas.'
                        group by   lectura_diaria_servicio.fecha
                        order by lectura_diaria_servicio.fecha';

        $query = $em->createNativeQuery($consulta, $rsm);


        $result =  $query->getResult();
        return $result ;

    }

    public function  getParteoDiario($organismo, $provincia,$entidad,$mostrarHijas, $fecha){

        $em = $this->getEntityManager();

        $rsm = new \Doctrine\ORM\Query\ResultSetMapping();
        $rsm->addScalarResult('plan', 'plan');
        $rsm->addScalarResult('consumo', 'consumo');
        $rsm->addScalarResult('id_servicio', 'id_servicio');
        $rsm->addScalarResult('PlanMensual', 'PlanMensual');
        $rsm->addScalarResult('PorcientoDiario', 'PorcientoDiario');
        $rsm->addScalarResult('NombreServicio', 'NombreServicio');
        $rsm->addScalarResult('codcliente_EE', 'codcliente_EE');
        $rsm->addScalarResult('codRF', 'codRF');
        $rsm->addScalarResult('ConsumoAcumulado', 'ConsumoAcumulado');
        $rsm->addScalarResult('PorcientoAcumulado', 'PorcientoAcumulado');
        $rsm->addScalarResult('NombMunicipio', 'NombMunicipio');
        $rsm->addScalarResult('NombProv', 'NombProv');


        if ($provincia!=null) {
            $HavingProvincia = ' and (provincia.id = '.$provincia.')' ; }
        else {
            $HavingProvincia = '' ;
        }
        if ($entidad!=null) {
            $HavingEntidad = ' and ';
            $HavingEntidad .= $mostrarHijas?" (":"";
            $HavingEntidad .= ' (entidad.id = '.$entidad.')' ;
        }
        else {
            $HavingEntidad = '' ;
        }

        if (($mostrarHijas== true) and  ($entidad!=null)) {
            $HavingEntidadHijas = ' or (entidad.id_entidad = '.$entidad.')) ' ; }
        else {
            $HavingEntidadHijas = '' ;
        }

        $consulta = 'SELECT  LecturaDiariaPlanMensualServ.plan, LecturaDiariaPlanMensualServ.consumo, LecturaDiariaPlanMensualServ.id_servicio,
                             LecturaDiariaPlanMensualServ.PlanMensual,  LecturaDiariaPlanMensualServ.PorcientoDiario, LecturaDiariaPlanMensualServ.nombre as NombreServicio,
                             LecturaDiariaPlanMensualServ.codcliente_EE,  LecturaDiariaPlanMensualServ.codRF, ConsumoAcumulado.ConsumoAcumulado,
                             ConsumoAcumulado.ConsumoAcumulado / LecturaDiariaPlanMensualServ.PlanMensual  AS PorcientoAcumulado,
                             municipio.descripcion AS NombMunicipio, provincia.descripcion as NombProv
                     FROM    (SELECT  lectura_diaria_servicio.plan, lectura_diaria_servicio.consumo, lectura_diaria_servicio.plan_horariopico,
                                      lectura_diaria_servicio.consumo_horariopico, lectura_diaria_servicio.fecha, lectura_diaria_servicio.id_servicio,
                                      plan_mensual_servicio.plan as PlanMensual, plan_mensual_servicio.mes, plan_mensual_servicio.anno,
                                      lectura_diaria_servicio.consumo / lectura_diaria_servicio.plan AS PorcientoDiario, servicio.nombre, servicio.codcliente_EE,
                                      servicio.codRF, servicio.id_entidad, servicio.id_municipio, servicio.id_provincia
                              FROM    lectura_diaria_servicio INNER JOIN
                                      plan_mensual_servicio ON lectura_diaria_servicio.id_servicio = plan_mensual_servicio.id_servicio INNER JOIN
                                      servicio ON lectura_diaria_servicio.id_servicio = servicio.id
                              WHERE   (lectura_diaria_servicio.fecha = "'.$fecha.'") AND
                                      (plan_mensual_servicio.mes = MONTH("'.$fecha.'")) AND
                                      (plan_mensual_servicio.anno = YEAR("'.$fecha.'"))) AS LecturaDiariaPlanMensualServ INNER JOIN
                              (SELECT     id_servicio, SUM(consumo) AS ConsumoAcumulado
                              FROM          lectura_diaria_servicio AS lectura_diaria_servicio_1
                              WHERE      (fecha <=  "'.$fecha.'") AND (MONTH(fecha) = MONTH("'.$fecha.'"))
                              GROUP BY id_servicio) AS ConsumoAcumulado ON LecturaDiariaPlanMensualServ.id_servicio = ConsumoAcumulado.id_servicio INNER JOIN
                              entidad ON LecturaDiariaPlanMensualServ.id_entidad = entidad.id INNER JOIN
                              municipio ON LecturaDiariaPlanMensualServ.id_municipio = municipio.id INNER JOIN
                              provincia ON LecturaDiariaPlanMensualServ.id_provincia = provincia.id
                     WHERE    (entidad.id_organismo = '.$organismo.')'.$HavingProvincia.$HavingEntidad.$HavingEntidadHijas.'
                     ORDER BY LecturaDiariaPlanMensualServ.id_provincia, LecturaDiariaPlanMensualServ.id_municipio, LecturaDiariaPlanMensualServ.id_entidad, LecturaDiariaPlanMensualServ.nombre';


        $query = $em->createNativeQuery($consulta, $rsm);


        $result =  $query->getResult();
        return $result ;
    }

    public function  getConsumoAcumulado($organismo, $provincia,$entidad,$mostrarHijas, $mes,$anno,$hashorariopico){

        $em = $this->getEntityManager();

        $rsm = new \Doctrine\ORM\Query\ResultSetMapping();
        $rsm->addScalarResult('plan', 'plan');
        $rsm->addScalarResult('id_servicio', 'id_servicio');
        $rsm->addScalarResult('nombServicio', 'nombServicio');
        $rsm->addScalarResult('codcliente_EE', 'codcliente_EE');
        $rsm->addScalarResult('codRF', 'codRF');
        $rsm->addScalarResult('plan_horariopico', 'plan_horariopico');
        $rsm->addScalarResult('NombEntidad', 'NombEntidad');
        $rsm->addScalarResult('nombProvincia', 'nombProvincia');
        $rsm->addScalarResult('1', '1');
        $rsm->addScalarResult('2', '2');
        $rsm->addScalarResult('3', '3');
        $rsm->addScalarResult('4', '4');
        $rsm->addScalarResult('5', '5');
        $rsm->addScalarResult('6', '6');
        $rsm->addScalarResult('7', '7');
        $rsm->addScalarResult('8', '8');
        $rsm->addScalarResult('9', '9');
        $rsm->addScalarResult('10', '10');
        $rsm->addScalarResult('11', '11');
        $rsm->addScalarResult('12', '12');
        $rsm->addScalarResult('13', '13');
        $rsm->addScalarResult('14', '14');
        $rsm->addScalarResult('15', '15');
        $rsm->addScalarResult('16', '16');
        $rsm->addScalarResult('17', '17');
        $rsm->addScalarResult('18', '18');
        $rsm->addScalarResult('19', '19');
        $rsm->addScalarResult('20', '20');
        $rsm->addScalarResult('21', '21');
        $rsm->addScalarResult('22', '22');
        $rsm->addScalarResult('23', '23');
        $rsm->addScalarResult('24', '24');
        $rsm->addScalarResult('25', '25');
        $rsm->addScalarResult('26', '26');
        $rsm->addScalarResult('27', '27');
        $rsm->addScalarResult('28', '28');
        $rsm->addScalarResult('29', '29');
        $rsm->addScalarResult('30', '30');
        $rsm->addScalarResult('31', '31');
        $rsm->addScalarResult('1hp', '1hp');
        $rsm->addScalarResult('2hp', '2hp');
        $rsm->addScalarResult('3hp', '3hp');
        $rsm->addScalarResult('4hp', '4hp');
        $rsm->addScalarResult('5hp', '5hp');
        $rsm->addScalarResult('6hp', '6hp');
        $rsm->addScalarResult('7hp', '7hp');
        $rsm->addScalarResult('8hp', '8hp');
        $rsm->addScalarResult('9hp', '9hp');
        $rsm->addScalarResult('10hp', '10hp');
        $rsm->addScalarResult('11hp', '11hp');
        $rsm->addScalarResult('12hp', '12hp');
        $rsm->addScalarResult('13hp', '13hp');
        $rsm->addScalarResult('14hp', '14hp');
        $rsm->addScalarResult('15hp', '15hp');
        $rsm->addScalarResult('16hp', '16hp');
        $rsm->addScalarResult('17hp', '17hp');
        $rsm->addScalarResult('18hp', '18hp');
        $rsm->addScalarResult('19hp', '19hp');
        $rsm->addScalarResult('20hp', '20hp');
        $rsm->addScalarResult('21hp', '21hp');
        $rsm->addScalarResult('22hp', '22hp');
        $rsm->addScalarResult('23hp', '23hp');
        $rsm->addScalarResult('24hp', '24hp');
        $rsm->addScalarResult('25hp', '25hp');
        $rsm->addScalarResult('26hp', '26hp');
        $rsm->addScalarResult('27hp', '27hp');
        $rsm->addScalarResult('28hp', '28hp');
        $rsm->addScalarResult('29hp', '29hp');
        $rsm->addScalarResult('30hp', '30hp');
        $rsm->addScalarResult('31hp', '31hp');


        if ($provincia!=null) {
            $HavingProvincia = ' and (provincia.id = '.$provincia.')' ; }
        else {
            $HavingProvincia = '' ;
        }
        if ($entidad!=null) {
            $HavingEntidad = ' and ';
            $HavingEntidad .= $mostrarHijas?" (":"";
            $HavingEntidad .= ' (entidad.id = '.$entidad.')' ;
        }
        else {
            $HavingEntidad = '' ;
        }

        if (($mostrarHijas== true) and  ($entidad!=null)) {
            $HavingEntidadHijas = ' or (entidad.id_entidad = '.$entidad.')) ' ; }
        else {
            $HavingEntidadHijas = '' ;
        }

        $consulta = 'SELECT     lectura_diaria_servicio.consumo_horariopico,
                       lectura_diaria_servicio.id_servicio, plan_mensual_servicio.plan, plan_mensual_servicio.plan_horariopico ,
                      servicio.nombre as nombServicio, servicio.codcliente_EE, servicio.codRF, provincia.descripcion as nombProvincia, entidad.codreeup, entidad.nombre AS NombEntidad,
                    sum(if(day(lectura_diaria_servicio.fecha) <= 1, lectura_diaria_servicio.consumo, null )) As "1",
                    sum(if(day(lectura_diaria_servicio.fecha) <= 2, lectura_diaria_servicio.consumo, null )) As "2",
                    sum(if(day(lectura_diaria_servicio.fecha) <= 3, lectura_diaria_servicio.consumo, null )) As "3",
                    sum(if(day(lectura_diaria_servicio.fecha) <= 4, lectura_diaria_servicio.consumo, null )) As "4",
                    sum(if(day(lectura_diaria_servicio.fecha) <= 5, lectura_diaria_servicio.consumo, null )) As "5",
                    sum(if(day(lectura_diaria_servicio.fecha) <= 6, lectura_diaria_servicio.consumo, null )) As "6",
                    sum(if(day(lectura_diaria_servicio.fecha) <= 7, lectura_diaria_servicio.consumo, null )) As "7",
                    sum(if(day(lectura_diaria_servicio.fecha) <= 8, lectura_diaria_servicio.consumo, null )) As "8",
                    sum(if(day(lectura_diaria_servicio.fecha) <= 9, lectura_diaria_servicio.consumo, null )) As "9",
                    sum(if(day(lectura_diaria_servicio.fecha) <= 10, lectura_diaria_servicio.consumo, null )) As "10",
                    sum(if(day(lectura_diaria_servicio.fecha) <= 11, lectura_diaria_servicio.consumo, null )) As "11",
                    sum(if(day(lectura_diaria_servicio.fecha) <= 12, lectura_diaria_servicio.consumo, null )) As "12",
                    sum(if(day(lectura_diaria_servicio.fecha) <= 13, lectura_diaria_servicio.consumo, null )) As "13",
                    sum(if(day(lectura_diaria_servicio.fecha) <= 14, lectura_diaria_servicio.consumo, null )) As "14",
                    sum(if(day(lectura_diaria_servicio.fecha) <= 15, lectura_diaria_servicio.consumo, null )) As "15",
                    sum(if(day(lectura_diaria_servicio.fecha) <= 16, lectura_diaria_servicio.consumo, null )) As "16",
                    sum(if(day(lectura_diaria_servicio.fecha) <= 17, lectura_diaria_servicio.consumo, null )) As "17",
                    sum(if(day(lectura_diaria_servicio.fecha) <= 18, lectura_diaria_servicio.consumo, null )) As "18",
                    sum(if(day(lectura_diaria_servicio.fecha) <= 19, lectura_diaria_servicio.consumo, null )) As "19",
                    sum(if(day(lectura_diaria_servicio.fecha) <= 20, lectura_diaria_servicio.consumo, null )) As "20",
                    sum(if(day(lectura_diaria_servicio.fecha) <= 21, lectura_diaria_servicio.consumo, null )) As "21",
                    sum(if(day(lectura_diaria_servicio.fecha) <= 22, lectura_diaria_servicio.consumo, null )) As "22",
                    sum(if(day(lectura_diaria_servicio.fecha) <= 23, lectura_diaria_servicio.consumo, null )) As "23",
                    sum(if(day(lectura_diaria_servicio.fecha) <= 24, lectura_diaria_servicio.consumo, null )) As "24",
                    sum(if(day(lectura_diaria_servicio.fecha) <= 25, lectura_diaria_servicio.consumo, null )) As "25",
                    sum(if(day(lectura_diaria_servicio.fecha) <= 26, lectura_diaria_servicio.consumo, null )) As "26",
                    sum(if(day(lectura_diaria_servicio.fecha) <= 27, lectura_diaria_servicio.consumo, null )) As "27",
                    sum(if(day(lectura_diaria_servicio.fecha) <= 28, lectura_diaria_servicio.consumo, null )) As "28",
                    sum(if(day(lectura_diaria_servicio.fecha) <= 29, lectura_diaria_servicio.consumo, null )) As "29",
                    sum(if(day(lectura_diaria_servicio.fecha) <= 30, lectura_diaria_servicio.consumo, null )) As "30",
                    sum(if(day(lectura_diaria_servicio.fecha) <= 31, lectura_diaria_servicio.consumo, null )) As "31",
                    sum(if(day(lectura_diaria_servicio.fecha) <= 1, lectura_diaria_servicio.consumo_horariopico, null )) As "1hp",
                    sum(if(day(lectura_diaria_servicio.fecha) <= 2, lectura_diaria_servicio.consumo_horariopico, null )) As "2hp",
                    sum(if(day(lectura_diaria_servicio.fecha) <= 3, lectura_diaria_servicio.consumo_horariopico, null )) As "3hp",
                    sum(if(day(lectura_diaria_servicio.fecha) <= 4, lectura_diaria_servicio.consumo_horariopico, null )) As "4hp",
                    sum(if(day(lectura_diaria_servicio.fecha) <= 5, lectura_diaria_servicio.consumo_horariopico, null )) As "5hp",
                    sum(if(day(lectura_diaria_servicio.fecha) <= 6, lectura_diaria_servicio.consumo_horariopico, null )) As "6hp",
                    sum(if(day(lectura_diaria_servicio.fecha) <= 7, lectura_diaria_servicio.consumo_horariopico, null )) As "7hp",
                    sum(if(day(lectura_diaria_servicio.fecha) <= 8, lectura_diaria_servicio.consumo_horariopico, null )) As "8hp",
                    sum(if(day(lectura_diaria_servicio.fecha) <= 9, lectura_diaria_servicio.consumo_horariopico, null )) As "9hp",
                    sum(if(day(lectura_diaria_servicio.fecha) <= 10, lectura_diaria_servicio.consumo_horariopico, null )) As "10hp",
                    sum(if(day(lectura_diaria_servicio.fecha) <= 11, lectura_diaria_servicio.consumo_horariopico, null )) As "11hp",
                    sum(if(day(lectura_diaria_servicio.fecha) <= 12, lectura_diaria_servicio.consumo_horariopico, null )) As "12hp",
                    sum(if(day(lectura_diaria_servicio.fecha) <= 13, lectura_diaria_servicio.consumo_horariopico, null )) As "13hp",
                    sum(if(day(lectura_diaria_servicio.fecha) <= 14, lectura_diaria_servicio.consumo_horariopico, null )) As "14hp",
                    sum(if(day(lectura_diaria_servicio.fecha) <= 15, lectura_diaria_servicio.consumo_horariopico, null )) As "15hp",
                    sum(if(day(lectura_diaria_servicio.fecha) <= 16, lectura_diaria_servicio.consumo_horariopico, null )) As "16hp",
                    sum(if(day(lectura_diaria_servicio.fecha) <= 17, lectura_diaria_servicio.consumo_horariopico, null )) As "17hp",
                    sum(if(day(lectura_diaria_servicio.fecha) <= 18, lectura_diaria_servicio.consumo_horariopico, null )) As "18hp",
                    sum(if(day(lectura_diaria_servicio.fecha) <= 19, lectura_diaria_servicio.consumo_horariopico, null )) As "19hp",
                    sum(if(day(lectura_diaria_servicio.fecha) <= 20, lectura_diaria_servicio.consumo_horariopico, null )) As "20hp",
                    sum(if(day(lectura_diaria_servicio.fecha) <= 21, lectura_diaria_servicio.consumo_horariopico, null )) As "21hp",
                    sum(if(day(lectura_diaria_servicio.fecha) <= 22, lectura_diaria_servicio.consumo_horariopico, null )) As "22hp",
                    sum(if(day(lectura_diaria_servicio.fecha) <= 23, lectura_diaria_servicio.consumo_horariopico, null )) As "23hp",
                    sum(if(day(lectura_diaria_servicio.fecha) <= 24, lectura_diaria_servicio.consumo_horariopico, null )) As "24hp",
                    sum(if(day(lectura_diaria_servicio.fecha) <= 25, lectura_diaria_servicio.consumo_horariopico, null )) As "25hp",
                    sum(if(day(lectura_diaria_servicio.fecha) <= 26, lectura_diaria_servicio.consumo_horariopico, null )) As "26hp",
                    sum(if(day(lectura_diaria_servicio.fecha) <= 27, lectura_diaria_servicio.consumo_horariopico, null )) As "27hp",
                    sum(if(day(lectura_diaria_servicio.fecha) <= 28, lectura_diaria_servicio.consumo_horariopico, null )) As "28hp",
                    sum(if(day(lectura_diaria_servicio.fecha) <= 29, lectura_diaria_servicio.consumo_horariopico, null )) As "29hp",
                    sum(if(day(lectura_diaria_servicio.fecha) <= 30, lectura_diaria_servicio.consumo_horariopico, null )) As "30hp",
                    sum(if(day(lectura_diaria_servicio.fecha) <= 31, lectura_diaria_servicio.consumo_horariopico, null )) As "31hp"
                    FROM         lectura_diaria_servicio INNER JOIN
                                          plan_mensual_servicio ON lectura_diaria_servicio.id_servicio = plan_mensual_servicio.id_servicio INNER JOIN
                                          servicio ON lectura_diaria_servicio.id_servicio = servicio.id INNER JOIN
                                          entidad ON servicio.id_entidad = entidad.id INNER JOIN
                                          provincia ON entidad.id_provincia = provincia.id
                    WHERE    (entidad.id_organismo = '.$organismo.')'.$HavingProvincia.$HavingEntidad.$HavingEntidadHijas.' AND (month(lectura_diaria_servicio.fecha) = '.$mes.') AND (year(lectura_diaria_servicio.fecha) = '.$anno.') and (plan_mensual_servicio.mes = '.$mes.') and (plan_mensual_servicio.anno ='.$anno.')
                              and (servicio.horariopico='.$hashorariopico.')
                    GROUP BY           lectura_diaria_servicio.id_servicio
                    order by provincia.id, Entidad.id, servicio.id';


        $query = $em->createNativeQuery($consulta, $rsm);


        $result =  $query->getResult();
        return $result ;
    }

    public function  getParteConsumo($organismo, $provincia,$entidad,$mostrarHijas, $fecha){

        $em = $this->getEntityManager();

        $rsm = new \Doctrine\ORM\Query\ResultSetMapping();
        $rsm->addScalarResult('NombreEntidad', 'NombreEntidad');
        $rsm->addScalarResult('NombreServicio', 'NombreServicio');
        $rsm->addScalarResult('ConsumoReportado', 'ConsumoReportado');
        $rsm->addScalarResult('ConsumoHPReportado', 'ConsumoHPReportado');


        if ($provincia!=null) {
            $HavingProvincia = ' and (provincia.id = '.$provincia.')' ; }
        else {
            $HavingProvincia = '' ;
        }
        if ($entidad!=null) {
            $HavingEntidad = ' and ';
            $HavingEntidad .= $mostrarHijas?" (":"";
            $HavingEntidad .= ' (entidad.id = '.$entidad.')' ;
        }
        else {
            $HavingEntidad = '' ;
        }

        if (($mostrarHijas== true) and  ($entidad!=null)) {
            $HavingEntidadHijas = ' or (entidad.id_entidad = '.$entidad.')) ' ; }
        else {
            $HavingEntidadHijas = '' ;
        }

        $consulta = 'SELECT entidad.nombre as NombreEntidad, servicio.nombre as NombreServicio, consumo as ConsumoReportado, consumo_horariopico as ConsumoHPReportado
                FROM
                lectura_diaria_servicio
                INNER JOIN servicio ON lectura_diaria_servicio.id_servicio = servicio.id
                INNER JOIN entidad ON servicio.id_entidad = entidad.id
                WHERE
                (lectura_diaria_servicio.fecha = "'.$fecha.'") AND
                (lectura_diaria_servicio.consumo > 0 OR
                lectura_diaria_servicio.consumo_horariopico > 0) AND (entidad.id_organismo = '.$organismo.')'.$HavingProvincia.$HavingEntidad.$HavingEntidadHijas;

        $query = $em->createNativeQuery($consulta, $rsm);


        $result =  $query->getResult();
        return $result ;
    }
}