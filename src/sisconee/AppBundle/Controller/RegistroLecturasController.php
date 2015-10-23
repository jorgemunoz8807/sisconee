<?php


namespace  sisconee\AppBundle\Controller;

use sisconee\AdministracionBundle\Controller\BaseUserController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use sisconee\AppBundle\Entity\Entidad;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class RegistroLecturasController extends BaseUserController
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $currentEntity = $this->getEntityOfCurrentUser();
        $currentOrganismId = $this->getOrganismOfCurrentUser()->getId();
        //$currentOrganismName = $this->getOrganismOfCurrentUser()->getNombre();
        $currentConfig = $this->getCurrentConfiguration();
        $valid = $this->validateConfiguration($currentConfig, 'Consumo');
        if(!$valid)
            return $this->render('sisconeeAppBundle:Default:errorConfiguration.html.twig');

        $currentConfigYear = $currentConfig->getPeriodoTrabajo();
        //$currentConfigPlan = $currentConfig->getPlan();

        if($this->isLogged_PlanificadorSuperior())
        {
            $entities = $em->getRepository('sisconeeAppBundle:Entidad')->findAllBelongingTo($currentOrganismId)->getQuery()->getResult();
        }
        elseif ($this->isLogged_PlanificadorSuperior()) {
            $entities = $em->getRepository('sisconeeAppBundle:Entidad')->findAllSubordinatedTo($currentEntity);
        }
        else {
            $entities = array($em->getRepository('sisconeeAppBundle:Entidad')->find($currentEntity));
        }


        $servicios = $this->getServicios($entities[0]);

        return $this->render('sisconeeAppBundle:Registro:index.html.twig',array(
                'entities' => $entities,
                 'servicios' => $servicios));
    }

    private function getPlanAnual (Servicio $servicio, $year){

    }

    private function getPlanMensual (Servicio $servicio, $year, $month){

    }

    public function getServicios(Entidad $entity)
    {
        $servicios = $entity->getServicios();

        return $servicios;
    }


    public function getServiciosAction(Request $request)
    {
        $id_entity = $request->query->get('id_entity');

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('sisconeeAppBundle:Entidad')->find($id_entity);

        $servicios = $entity->getServicios();


       return $this->render('sisconeeAppBundle:Registro:lista_servicios.html.twig',array('servicios' => $servicios));

    }

    public function getPlanAnualServicioAction(Request $request)
    {
        $id_servicio = $request->query->get('id_servicio');

        $em = $this->getDoctrine()->getManager();

        $currentConfig = $this->getCurrentConfiguration();
        $currentConfigYear = $currentConfig->getPeriodoTrabajo();

        $hasPlanHorarioPico = $em->getRepository('sisconeeAppBundle:Servicio')->find($id_servicio)->getHorarioPico();


        /* $registro_plan = $em->getRepository('sisconeeAppBundle:PlanMensualServicio')->findOneBy(array(
            'servicio' => $id_servicio,
            'mes' => $month,
            'anno' => $currentConfigYear
        ));

        $planHorarioPico = ($registro_plan)? $registro_plan->getPlan():0; */

        $registro_plan = $em->getRepository('sisconeeAppBundle:PlanAnualServicio')->findOneBy(array(
            'servicio' => $id_servicio,
            'anno' => $currentConfigYear
        ));

        $plan_anual_servicio = ($registro_plan)? $registro_plan->getPlan():0;


        $response = new Response(json_encode(array('plan_anual_servicio' => $plan_anual_servicio,'hasPlanHorarioPico' => $hasPlanHorarioPico)));
        $response->headers->set('Content-Type', 'application/json');
        //$response =  new Response($plan_anual_servicio);
        return $response;

    }

    public function getMonthPlanServicioAction(Request $request)
    {
        $id_servicio = $request->query->get('id_servicio');
        $month = $request->query->get('month');

        $em = $this->getDoctrine()->getManager();

        $currentConfig = $this->getCurrentConfiguration();
        $currentConfigYear = $currentConfig->getPeriodoTrabajo();

        $hasPlanHorarioPico = $em->getRepository('sisconeeAppBundle:Servicio')->find($id_servicio)->getHorarioPico();

        $registro_plan = $em->getRepository('sisconeeAppBundle:PlanMensualServicio')->findOneBy(array(
                'servicio' => $id_servicio,
                'mes' => $month,
                'anno' => $currentConfigYear
            ));

        $planHorarioPico = ($registro_plan)? $registro_plan->getPlanHorarioPico():0;

        $plan_mensual_servicio = ($registro_plan)? $registro_plan->getPlan():0;


        $response = ($planHorarioPico!=0)? new Response(json_encode(array('plan_mensual_servicio' => $plan_mensual_servicio,'planHorarioPico' => $planHorarioPico)))
                                         :new Response(json_encode(array('plan_mensual_servicio' => $plan_mensual_servicio)));
        $response->headers->set('Content-Type', 'application/json');
        //$response =  new Response($plan_mensual_servicio);
        return $response;

    }

    public function getMonthInformationServicioAction(Request $request)
    {
        $id_servicio = $request->query->get('id_servicio');
        $month = $request->query->get('month');
        $hasHorarioPico = $request->query->get('hasHorarioPico');

        $em = $this->getDoctrine()->getManager();

        $currentConfig = $this->getCurrentConfiguration();
        $currentConfigYear = $currentConfig->getPeriodoTrabajo();

        //se obtienen los dias permitidos de la configuracion actual (esto falta por implmentar propuesta de nombre de campo : dias_permitidos
        $configPlazoPermitido = 3;

        $lista_registros = ($em->getRepository('sisconeeAppBundle:LecturaDiariaServicio')->getLecturas($month, $currentConfigYear, $id_servicio))? $em->getRepository('sisconeeAppBundle:LecturaDiariaServicio')->getLecturas($month, $currentConfigYear, $id_servicio) : array();
        $consumoAcumulado = ($em->getRepository('sisconeeAppBundle:LecturaDiariaServicio')->getConsumoAcumuladoGeneral($month, $currentConfigYear, $id_servicio))? $em->getRepository('sisconeeAppBundle:LecturaDiariaServicio')->getConsumoAcumuladoGeneral($month, $currentConfigYear, $id_servicio) :0;


        $hasPlanHorarioPico = $em->getRepository('sisconeeAppBundle:Servicio')->find($id_servicio)->getHorarioPico();

        $registro_plan = $em->getRepository('sisconeeAppBundle:PlanMensualServicio')->findOneBy(array(
                'servicio' => $id_servicio,
                'mes' => $month,
                'anno' => $currentConfigYear
            ));

        $planHorarioPico = ($registro_plan)? $registro_plan->getPlanHorarioPico():0;

        $plan_mensual_servicio = ($registro_plan)? $registro_plan->getPlan():0;
            //$response =  new Response($lista_registros);
        //return $this->renderText('<pre>'.var_dump($lista_registros).'</pre>');
        //$response->headers->set('Content-Type', 'application/json');
        //return $response;

        if ($plan_mensual_servicio < $consumoAcumulado[0]['cantidad']) {
            $this->get('session')->getFlashBag()->add(
            'warning',
            'El Consumo acumulado general excede al Plan Mensual del servicio.');

        }

        if (($hasPlanHorarioPico) && ($planHorarioPico < $consumoAcumulado[0]['cantidadHP'])) {
            $this->get('session')->getFlashBag()->add(
                'warning',
                'El Consumo acumulado del Horario Pico excede al Plan Mensual del Horario Pico del servicio.');

        }
        $diasPermitidos= date('Y-m-d', strtotime('-'.$configPlazoPermitido.' day')) ; // resta los dias establecidos en la configuracion

        return $this->render('sisconeeAppBundle:Registro:listado_registros_diarios.html.twig',array(
                'fechaActual'=>date('Y-m-d'),
                'diasPermitidos'=>$diasPermitidos,
                'hasPlanHorarioPico'=>$hasPlanHorarioPico,
                'planMensualGeneral'=>$plan_mensual_servicio,
                'planHorariopico'=>$planHorarioPico,
                'consumoAcumulado'=>$consumoAcumulado,
                'listado_registros' => $lista_registros));

    }

    public function updateLecturaServicioAction(Request $request)
    {
        //$id_registro = $request->query->get('id_registro');
        $id_registro = $request->query->get('id_registro');;
        $consumo = $request->query->get('txt_consumo_dia');

        $id_servicio = $request->query->get('id_servicio');
        $month = $request->query->get('month');

        $em = $this->getDoctrine()->getManager();
        $hasPlanHorarioPico = $em->getRepository('sisconeeAppBundle:Servicio')->find($id_servicio)->getHorarioPico();
        $consumoHorarioPico = ($hasPlanHorarioPico) ? $request->query->get('txt_consumo_dia_hp'): 0 ;
        $registro = $this->getDoctrine()->getRepository('sisconeeAppBundle:LecturaDiariaServicio')->find($id_registro);

        //var_dump($consumo);
        if($registro->getConsumo()== 0 && $registro->getConsumoHorarioPico()== 0)
            $action = 'Añadir';
        else
            $action = 'Actualizar';

        $registro->setConsumo($consumo);
        $registro->setConsumoHorariopico($consumoHorarioPico);

        $em->persist($registro);
        try {
            $em->flush();

            //Register Log
            $current_user = $this->getCurrentUser();
            $service = $registro->getIdServicio();
            $date = $registro->getFecha()->format('Y-m-d ');
            $data = $consumo . ',' . $consumoHorarioPico . ',' . $service . ',' . $date;
            $em->getRepository('sisconeeAppBundle:Trazas')->persistLog($action, 'lectura_diaria_servicio', $registro->getId(), $data, $current_user);

            //echo 'paso';
            /*$this->get('session')->getFlashBag()->add(
                'notice',
                'Los cambios fueron actualizados.');*/
        }

        catch(\Exception $e) {
            /*$this->get('session')->getFlashBag()->add(
                'error',
                'El servicio no pudo ser insertado. Ya existe un registro con ese nombre.'
            );*/
        }

        $currentConfig = $this->getCurrentConfiguration();
        $currentConfigYear = $currentConfig->getPeriodoTrabajo();
        //se obtienen los dias permitidos de la configuracion actual (esto falta por implmentar propuesta de nombre de campo : dias_permitidos
        $configPlazoPermitido = 3;

        //$lista_registros = $em->getRepository('sisconeeAppBundle:LecturaDiariaServicio')->getLecturas($month, $currentConfigYear, $id_servicio);
        //$consumoAcumulado =$em->getRepository('sisconeeAppBundle:LecturaDiariaServicio')->getConsumoAcumuladoGeneral($month, $currentConfigYear, $id_servicio);
        $lista_registros = ($em->getRepository('sisconeeAppBundle:LecturaDiariaServicio')->getLecturas($month, $currentConfigYear, $id_servicio))? $em->getRepository('sisconeeAppBundle:LecturaDiariaServicio')->getLecturas($month, $currentConfigYear, $id_servicio) : array();
        $consumoAcumulado = ($em->getRepository('sisconeeAppBundle:LecturaDiariaServicio')->getConsumoAcumuladoGeneral($month, $currentConfigYear, $id_servicio))? $em->getRepository('sisconeeAppBundle:LecturaDiariaServicio')->getConsumoAcumuladoGeneral($month, $currentConfigYear, $id_servicio) :0;


        $registro_plan = $em->getRepository('sisconeeAppBundle:PlanMensualServicio')->findOneBy(array(
                'servicio' => $id_servicio,
                'mes' => $month,
                'anno' => $currentConfigYear
            ));

        $planHorarioPico = ($registro_plan)? $registro_plan->getPlanHorarioPico():0;

        $plan_mensual_servicio = ($registro_plan)? $registro_plan->getPlan():0;



        if ($plan_mensual_servicio < $consumoAcumulado[0]['cantidad']) {
            $this->get('session')->getFlashBag()->add(
                'warning',
                'El Consumo acumulado general excede al Plan Mensual del servicio.');

        }

        if (($hasPlanHorarioPico) && ($planHorarioPico < $consumoAcumulado[0]['cantidadHP'])) {
            $this->get('session')->getFlashBag()->add(
                'warning',
                'El Consumo acumulado del Horario Pico excede al Plan Mensual del Horario Pico del servicio.');

        }

        $diasPermitidos= date('Y-m-d', strtotime('-'.$configPlazoPermitido.' day')) ; // resta los dias establecidos en la configuracion
        return $this->render('sisconeeAppBundle:Registro:listado_registros_diarios.html.twig',array(
                'fechaActual'=>date('Y-m-d'),
                'diasPermitidos'=>$diasPermitidos,
                'hasPlanHorarioPico'=>$hasPlanHorarioPico,
                'planMensualGeneral'=>$plan_mensual_servicio,
                'planHorariopico'=>$planHorarioPico,
                'consumoAcumulado'=>$consumoAcumulado,
                'listado_registros' => $lista_registros));

    }
} 