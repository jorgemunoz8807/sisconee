<?php
/**
 * Created by PhpStorm.
 * User: yarima
 * Date: 23/01/2015
 * Time: 10:31
 */

namespace sisconee\AppBundle\Controller;

use sisconee\AdministracionBundle\Controller\BaseUserController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use sisconee\AppBundle\Entity\Entidad;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

require_once("bundles/sisconeeapp/MPDF57/mpdf.php");

class ReportController extends BaseUserController
{
    public function indexReportsAction()
    {
        return $this->render('sisconeeAppBundle:Reports:index_reportes.html.twig');
    }
    public function indexAction($Nomb_Report)
    {
        // Aqui se obtiene el rol del usuario autenticado
        //Se identifica el tipo de reporte a mostrar

        $Rol_Usuario = $this->getRoleOfCurrentUser();
        $idEntityUser = $this->getEntityOfCurrentUser()->getId();
        $idOrganismo = $this->getOrganismOfCurrentUser();
        $idProvincia =  $this->getEntityOfCurrentUser()->getProvincia();


        $em = $this->getDoctrine()->getManager();
        //Para mostrar las provincias
        if ($Rol_Usuario == 'ROLE_PLANIFICADOR_SUP' || ($Rol_Usuario == 'ROLE_SUPERVISOR_SUP'))
        {
            $Listado_Provincia = $em->getRepository('sisconeeAppBundle:Provincia')->findAll();

        }
        if ($Rol_Usuario == 'ROLE_PLANIFICADOR_ENT' || ($Rol_Usuario == 'ROLE_SUPERVISOR_ENT'))
        {
            $Listado_Provincia =$em->getRepository('sisconeeAppBundle:Provincia')->getProvinciasByRoleENT($idEntityUser);

        }
        if ($Rol_Usuario == 'ROLE_PLANIFICADOR_SER' || ($Rol_Usuario == 'ROLE_REGISTRADOR_SER'))
        {
            $Listado_Provincia =$em->getRepository('sisconeeAppBundle:Provincia')->getProvinciasByRoleSER($idEntityUser);

        }



        switch ($Rol_Usuario)
        {
            case 'ROLE_PLANIFICADOR_SUP' : {
                $idEntityUser = NULL;
                $idProvincia = NULL;
                break;
            }
            case  'ROLE_SUPERVISOR_SUP' : {
                $idEntityUser = NULL;
                $idProvincia = NULL;
                break;
            }
            case 'ROLE_PLANIFICADOR_ENT' : {
                $idProvincia = NULL;
                break;
            }
            case 'ROLE_SUPERVISOR_ENT' : {
                $idProvincia = NULL;
                break;
            }
        }


        $lista_Entidad = $em->getRepository('sisconeeAppBundle:Entidad')->getEntityByRoleAndProvincia($idOrganismo, $idProvincia, $Rol_Usuario, $idEntityUser);
        $lista_years =$em->getRepository('sisconeeAppBundle:Configuracion')->getAllConfigurations($idOrganismo);


        return $this->render('sisconeeAppBundle:Reports:index.html.twig',array(
            'id_provincia' => $idProvincia,
            'Listado_provincia' => $Listado_Provincia,
            'Nombre_Reporte' => $Nomb_Report,
            'Listado_Entidad' => $lista_Entidad,
            'Listado_Years' => $lista_years));
    }

    /**
     * @param Provincia $entity
     * @return mixed
     */
    public function GetEntidadByProvinciaAction(Request $request)
    {


        $Rol_Usuario = $this->getRoleOfCurrentUser();
        $idEntityUser = $this->getEntityOfCurrentUser()->getId();
        $idOrganismo = $this->getOrganismOfCurrentUser();

        switch ($Rol_Usuario)
        {
            case 'ROLE_PLANIFICADOR_SUP': {
                $idEntityUser = NULL;
                break;
            }
            case 'ROLE_SUPERVISOR_SUP': {
                $idEntityUser = NULL;
                break;
            }


        }

        $id_provincia = ($request->query->get('id_provincia') == -1) ? null : $request->query->get('id_provincia');


        $em = $this->getDoctrine()->getManager();
        $entidades = $em->getRepository('sisconeeAppBundle:Entidad')->getEntityByRoleAndProvincia($idOrganismo, $id_provincia, $Rol_Usuario, $idEntityUser);



        return $this->render('sisconeeAppBundle:Reports:report_filtro_entidad.html.twig',array('id_provincia' => $id_provincia, 'Listado_Entidad' => $entidades));
    }


    public function Get_PlanMensualAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();

        $id_provincia = $request->query->get('id_provincia');
        $id_entidad = $request->query->get('id_entidad');
        $mostrarEntidad = $request->query->get('mostrar_entidad');
        $mostrarServicio = $request->query->get('mostrar_servicio');
        $periodo = $request->query->get('periodo');

        $Rol_Usuario = $this->getRoleOfCurrentUser();
        $idOrganismo = $this->getOrganismOfCurrentUser()->getId();
        $nombreOrganismo =  $this->getOrganismOfCurrentUser()->getNombre();

        //$currentConfig = $this->getCurrentConfiguration();
        $currentConfigYear = $periodo;

        $mostrarHijas = (($Rol_Usuario=='ROLE_PLANIFICADOR_SUP') ||  ($Rol_Usuario=='ROLE_PLANIFICADOR_ENT'))? true: false;

        $session = $request->getSession();

        if ($mostrarServicio == 'true')  {
            $Listado = $em->getRepository('sisconeeAppBundle:PlanAnualServicio')->getPlanMensualXServicio($idOrganismo, $id_provincia,$id_entidad , $mostrarHijas,$currentConfigYear);



            // guarda un atributo para reutilizarlo durante la solicitud de exportar el reporte obtenido a pdf

            $session->set('pdf', $this->renderView('sisconeeAppBundle:Reports:listado_plan_mensualPDF.html.twig',  array('Listado' => $Listado,
                                     'organismo' => $nombreOrganismo,
                                     'periodo'=>$currentConfigYear)) );

            $session->set('graphData',$Listado);

            return $this->render('sisconeeAppBundle:Reports:listado_plan_mensual.html.twig',  array('Listado' => $Listado,
                                                                                                  'organismo' => $nombreOrganismo,
                                                                                                   'periodo'=>$currentConfigYear));
        }
        elseif ($mostrarEntidad == 'true') {
            $Listado = $em->getRepository('sisconeeAppBundle:PlanAnualServicio')->getPlanMensualXEntidad($idOrganismo, $id_provincia, $id_entidad, $mostrarHijas,$currentConfigYear);

            $session->set('pdf', $this->renderView('sisconeeAppBundle:Reports:listado_plan_mensual_entidadPDF.html.twig', array('Listado' => $Listado,
                        'organismo' => $nombreOrganismo,
                        'periodo'=>$currentConfigYear)));

            $session->set('graphData',$Listado);

            return $this->render('sisconeeAppBundle:Reports:listado_plan_mensual_entidad.html.twig', array('Listado' => $Listado,
                                                                                                         'organismo' => $nombreOrganismo,
                                                                                                         'periodo'=>$currentConfigYear));

        }
        if (($id_provincia== null) and ($id_entidad == null)) {
            $Listado = $em->getRepository('sisconeeAppBundle:PlanAnualServicio')->getPlanMensualXProvincia($idOrganismo, $id_provincia, $id_entidad, $mostrarHijas,$currentConfigYear);

            //var_dump($Listado); exit;
            //$response = new Response(json_encode($Listado));
            //$response->headers->set('Content-Type', 'application/json');

            //return $response;

            $session->set('pdf', $this->renderView('sisconeeAppBundle:Reports:listado_plan_mensual_provinciaPDF.html.twig',  array('Listado' => $Listado,
                        'organismo' => $nombreOrganismo,
                        'periodo'=>$currentConfigYear)));

            $session->set('graphData',$Listado);

            return $this->render('sisconeeAppBundle:Reports:listado_plan_mensual_provincia.html.twig',  array('Listado' => $Listado,
                                                                                                            'organismo' => $nombreOrganismo,
                                                                                                            'periodo'=>$currentConfigYear));
        }
        else{
            $Listado = $em->getRepository('sisconeeAppBundle:PlanAnualServicio')->getPlanMensualXProvincia($idOrganismo, $id_provincia, $id_entidad, $mostrarHijas,$currentConfigYear);

            $session->set('pdf', $this->renderView('sisconeeAppBundle:Reports:listado_plan_mensual_provinciaPDF.html.twig',  array('Listado' => $Listado,
                        'organismo' => $nombreOrganismo,
                        'periodo'=>$currentConfigYear)));

            $session->set('graphData',$Listado);

            return $this->render('sisconeeAppBundle:Reports:listado_plan_mensual_provincia.html.twig',  array('Listado' => $Listado,
                                                                                                            'organismo' => $nombreOrganismo,
                                                                                                             'periodo'=>$currentConfigYear));
        }

        //return $html;

        /*if (($request->query->get('pdf')==true)) {

            //$html = utf8_encode($html);

            $mpdf = new \mPDF('','A4',0,'',15,15,16,16,9,9,'l');
            $mpdf->WriteHTML($html);
            $mpdf->Output();
            exit;
        }
        else { return $html; }*/
    }

    public function Get_ComportamientoDiarioEnUnMesAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $id_provincia = $request->query->get('id_provincia');

        $id_entidad = $request->query->get('id_entidad');
        $mes = $request->query->get('mes');
        $periodo = $request->query->get('periodo');

        $Rol_Usuario = $this->getRoleOfCurrentUser();
        $idOrganismo = $this->getOrganismOfCurrentUser()->getId();
        $nombreOrganismo =  $this->getOrganismOfCurrentUser()->getNombre();

        $currentConfig = $this->getCurrentConfiguration();
        $currentConfigYear = $periodo;

        $mostrarHijas = (($Rol_Usuario=='ROLE_PLANIFICADOR_SUP') ||  ($Rol_Usuario=='ROLE_PLANIFICADOR_ENT'))? true: false;
        $Listado = $em->getRepository('sisconeeAppBundle:PlanAnualServicio')->getComportamientoDiario($idOrganismo,$id_provincia,$id_entidad,$mostrarHijas, $mes, $currentConfigYear);

        $session = $request->getSession();

        $session->set('pdf', $this->renderView('sisconeeAppBundle:Reports:listado_comportamiento_diarioPDF.html.twig',array('Listado' => $Listado,
                    'organismo' => $nombreOrganismo,
                    'provinciaSeleccionada'=>$id_provincia)));

        $session->set('graphData',$Listado);

        return $this->render('sisconeeAppBundle:Reports:listado_comportamiento_diario.html.twig',array('Listado' => $Listado,
                                                                                                      'organismo' => $nombreOrganismo,
                                                                                                       'provinciaSeleccionada'=>$id_provincia));
    }

    public function Get_ParteDiarioAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $id_provincia = $request->query->get('id_provincia');

        $id_entidad = $request->query->get('id_entidad');
        $fecha = date('Y-m-d', strtotime($request->query->get('fecha')));
        $periodo = $request->query->get('periodo');

        $Rol_Usuario = $this->getRoleOfCurrentUser();
        $idOrganismo = $this->getOrganismOfCurrentUser()->getId();
        $nombreOrganismo =  $this->getOrganismOfCurrentUser()->getNombre();

        $currentConfig = $this->getCurrentConfiguration();
         $currentConfigYear = $periodo;

        $mostrarHijas = (($Rol_Usuario=='ROLE_PLANIFICADOR_SUP') ||  ($Rol_Usuario=='ROLE_PLANIFICADOR_ENT'))? true: false;
        $Listado = $em->getRepository('sisconeeAppBundle:PlanAnualServicio')-> getParteoDiario($idOrganismo, $id_provincia,$id_entidad,$mostrarHijas, $fecha);

        $session = $request->getSession();

        $session->set('pdf', $this->renderView('sisconeeAppBundle:Reports:listado_parte_diarioPDF.html.twig',array('Listado' => $Listado,
                    'organismo' => $nombreOrganismo,
                    'provinciaSeleccionada'=>$id_provincia,
                    'fecha'=>$request->query->get('fecha'))));

        return $this->render('sisconeeAppBundle:Reports:listado_parte_diario.html.twig',array('Listado' => $Listado,
            'organismo' => $nombreOrganismo,
            'provinciaSeleccionada'=>$id_provincia,
            'fecha'=>$request->query->get('fecha')));
    }

    public function Get_ParteConsumoAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $id_provincia = $request->query->get('id_provincia');

        $id_entidad = $request->query->get('id_entidad');
        $fecha = date('Y-m-d', strtotime($request->query->get('fecha')));


        $Rol_Usuario = $this->getRoleOfCurrentUser();
        $idOrganismo = $this->getOrganismOfCurrentUser()->getId();
        $nombreOrganismo =  $this->getOrganismOfCurrentUser()->getNombre();


        $mostrarHijas = (($Rol_Usuario=='ROLE_PLANIFICADOR_SUP') ||  ($Rol_Usuario=='ROLE_PLANIFICADOR_ENT'))? true: false;
        $Listado = $em->getRepository('sisconeeAppBundle:PlanAnualServicio')-> getParteConsumo($idOrganismo, $id_provincia,$id_entidad,$mostrarHijas, $fecha);

        $session = $request->getSession();

        /*$session->set('pdf', $this->renderView('sisconeeAppBundle:Reports:listado_parte_consumoPDF.html.twig',array('Listado' => $Listado,
                    'organismo' => $nombreOrganismo,
                    'provinciaSeleccionada'=>$id_provincia,
                    'fecha'=>$request->query->get('fecha'))));*/

        return $this->render('sisconeeAppBundle:Reports:listado_parte_consumo.html.twig',array('Listado' => $Listado,
                'organismo' => $nombreOrganismo,
                'provinciaSeleccionada'=>$id_provincia,
                'fecha'=>$request->query->get('fecha')));
    }

    public function Get_ConsumoAcumuladoGeneralAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $id_provincia = $request->query->get('id_provincia');

        $id_entidad = $request->query->get('id_entidad');
        $mes = $request->query->get('mes');
        $periodo = $request->query->get('periodo');

        $Rol_Usuario = $this->getRoleOfCurrentUser();
        $idOrganismo = $this->getOrganismOfCurrentUser()->getId();
        $nombreOrganismo =  $this->getOrganismOfCurrentUser()->getNombre();

        $currentConfig = $this->getCurrentConfiguration();
         $currentConfigYear = $periodo;


        $mostrarHijas = (($Rol_Usuario=='ROLE_PLANIFICADOR_SUP') ||  ($Rol_Usuario=='ROLE_PLANIFICADOR_ENT'))? true: false;
        $Listado = $em->getRepository('sisconeeAppBundle:PlanAnualServicio')-> getConsumoAcumulado($idOrganismo, $id_provincia,$id_entidad,$mostrarHijas, $mes, $currentConfigYear, 0);

        $session = $request->getSession();

        $session->set('pdf', $this->renderView('sisconeeAppBundle:Reports:listado_consumo_acumuladoPDF.html.twig',array('Listado' => $Listado,
                    'organismo' => $nombreOrganismo,
                    'provinciaSeleccionada'=>$id_provincia)) );

        return $this->render('sisconeeAppBundle:Reports:listado_consumo_acumulado.html.twig',array('Listado' => $Listado,
                                                                                            'organismo' => $nombreOrganismo,
                                                                                 'provinciaSeleccionada'=>$id_provincia));
    }

    public function Get_ConsumoAcumuladoHPAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $id_provincia = $request->query->get('id_provincia');

        $id_entidad = $request->query->get('id_entidad');
        $mes = $request->query->get('mes');
        $periodo = $request->query->get('periodo');

        $Rol_Usuario = $this->getRoleOfCurrentUser();
        $idOrganismo = $this->getOrganismOfCurrentUser()->getId();
        $nombreOrganismo =  $this->getOrganismOfCurrentUser()->getNombre();

        $currentConfig = $this->getCurrentConfiguration();
          $currentConfigYear = $periodo;


        $mostrarHijas = (($Rol_Usuario=='ROLE_PLANIFICADOR_SUP') ||  ($Rol_Usuario=='ROLE_PLANIFICADOR_ENT'))? true: false;
        $Listado = $em->getRepository('sisconeeAppBundle:PlanAnualServicio')-> getConsumoAcumulado($idOrganismo, $id_provincia,$id_entidad,$mostrarHijas, $mes, $currentConfigYear, 1);

        $session = $request->getSession();

        $session->set('pdf', $this->renderView('sisconeeAppBundle:Reports:listado_consumo_acumuladohpPDF.html.twig',array('Listado' => $Listado,
                    'organismo' => $nombreOrganismo,
                    'provinciaSeleccionada'=>$id_provincia)) );

        return $this->render('sisconeeAppBundle:Reports:listado_consumo_acumuladohp.html.twig',array('Listado' => $Listado,
            'organismo' => $nombreOrganismo,
            'provinciaSeleccionada'=>$id_provincia));
    }

    /*
    * Metodo para mostrar en formato PDF la informacion de los reportes
    */
    public function pdfReportAction(Request $request)
    {
        $html = $request->getSession()->get('pdf');

        //$html = utf8_encode($html);

        $mpdf = new \mPDF();

        //$mpdf->WriteHTML('<pagebreak sheet-size="A5-L" />');
        //$L = "L";
        //$mpdf->_setPageSize("A4",$L);
        $mpdf->defaultheaderfontsize = 10; /* in pts */
        $mpdf->defaultheaderfontstyle = B; /* blank, B, I, or BI */
        $mpdf->defaultheaderline = 1; /* 1 to include line below header/above footer */
        $mpdf->defaultfooterfontsize = 12; /* in pts */
        $mpdf->defaultfooterfontstyle = B; /* blank, B, I, or BI */
        $mpdf->defaultfooterline = 1; /* 1 to include line below header/above footer */
        $mpdf->SetHeader('{DATE j-m-Y}|{PAGENO}|Reportes SISCONEE');
        $mpdf->SetFooter('{PAGENO}'); /* defines footer for Odd and Even Pages - placed at Outer margin */

        $mpdf->WriteHTML($html);
        $mpdf->Output();
        exit;
    }

    /*
    * Metodo para mostrar un grafico a partir de los datos en sesion
    */
    public function graphReportAction(Request $request)
    {
        $data = $request->getSession()->get('graphData');
        //var_dump($data);exit;
        $response = new Response(json_encode($data));
        $response->headers->set('Content-Type', 'application/json');

        return $response;

    }

} 