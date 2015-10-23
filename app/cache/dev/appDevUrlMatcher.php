<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                if (0 === strpos($pathinfo, '/_profiler/i')) {
                    // _profiler_info
                    if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                    }

                    // _profiler_import
                    if ($pathinfo === '/_profiler/import') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:importAction',  '_route' => '_profiler_import',);
                    }

                }

                // _profiler_export
                if (0 === strpos($pathinfo, '/_profiler/export') && preg_match('#^/_profiler/export/(?P<token>[^/\\.]++)\\.txt$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_export')), array (  '_controller' => 'web_profiler.controller.profiler:exportAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/planificacion')) {
            // sisconee_app_planificacion
            if ($pathinfo === '/planificacion') {
                return array (  '_controller' => 'sisconee\\AppBundle\\Controller\\PlanificacionController::indexPlanificationAction',  '_route' => 'sisconee_app_planificacion',);
            }

            if (0 === strpos($pathinfo, '/planificacion/plan')) {
                if (0 === strpos($pathinfo, '/planificacion/plananual')) {
                    if (0 === strpos($pathinfo, '/planificacion/plananualentidad')) {
                        // plananualentidad_show
                        if (preg_match('#^/planificacion/plananualentidad/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'plananualentidad_show')), array (  '_controller' => 'sisconee\\AppBundle\\Controller\\PlanAnualEntidadController::showAction',));
                        }

                        // plananualentidad_new
                        if ($pathinfo === '/planificacion/plananualentidad/new') {
                            return array (  '_controller' => 'sisconee\\AppBundle\\Controller\\PlanAnualEntidadController::newAction',  '_route' => 'plananualentidad_new',);
                        }

                        // plananualentidad_create
                        if ($pathinfo === '/planificacion/plananualentidad/create') {
                            if ($this->context->getMethod() != 'POST') {
                                $allow[] = 'POST';
                                goto not_plananualentidad_create;
                            }

                            return array (  '_controller' => 'sisconee\\AppBundle\\Controller\\PlanAnualEntidadController::createAction',  '_route' => 'plananualentidad_create',);
                        }
                        not_plananualentidad_create:

                        // plananualentidad_edit
                        if (preg_match('#^/planificacion/plananualentidad/(?P<id>[^/]++)/(?P<parentEntityId>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'plananualentidad_edit')), array (  '_controller' => 'sisconee\\AppBundle\\Controller\\PlanAnualEntidadController::editAction',));
                        }

                        // plananualentidad_update
                        if (preg_match('#^/planificacion/plananualentidad/(?P<id>[^/]++)/(?P<parentEntityId>[^/]++)/update$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                                $allow = array_merge($allow, array('POST', 'PUT'));
                                goto not_plananualentidad_update;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'plananualentidad_update')), array (  '_controller' => 'sisconee\\AppBundle\\Controller\\PlanAnualEntidadController::updateAction',));
                        }
                        not_plananualentidad_update:

                        // plananualentidad_delete
                        if (preg_match('#^/planificacion/plananualentidad/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'plananualentidad_delete')), array (  '_controller' => 'sisconee\\AppBundle\\Controller\\PlanAnualEntidadController::deleteAction',));
                        }

                        // plananualentidad_load_data
                        if ($pathinfo === '/planificacion/plananualentidad/load_newData') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_plananualentidad_load_data;
                            }

                            return array (  '_controller' => 'sisconee\\AppBundle\\Controller\\PlanAnualEntidadController::loadRelatedDataAction',  '_route' => 'plananualentidad_load_data',);
                        }
                        not_plananualentidad_load_data:

                        // plananualentidad
                        if (preg_match('#^/planificacion/plananualentidad(?:/(?P<id>[^/]++))?$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'plananualentidad')), array (  '_controller' => 'sisconee\\AppBundle\\Controller\\PlanAnualEntidadController::indexAction',  'id' => NULL,));
                        }

                    }

                    if (0 === strpos($pathinfo, '/planificacion/plananualservicio')) {
                        // plananualservicio_show
                        if (preg_match('#^/planificacion/plananualservicio/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'plananualservicio_show')), array (  '_controller' => 'sisconee\\AppBundle\\Controller\\PlanAnualServicioController::showAction',));
                        }

                        // plananualservicio_new
                        if ($pathinfo === '/planificacion/plananualservicio/new') {
                            return array (  '_controller' => 'sisconee\\AppBundle\\Controller\\PlanAnualServicioController::newAction',  '_route' => 'plananualservicio_new',);
                        }

                        // plananualservicio_create
                        if ($pathinfo === '/planificacion/plananualservicio/create') {
                            if ($this->context->getMethod() != 'POST') {
                                $allow[] = 'POST';
                                goto not_plananualservicio_create;
                            }

                            return array (  '_controller' => 'sisconee\\AppBundle\\Controller\\PlanAnualServicioController::createAction',  '_route' => 'plananualservicio_create',);
                        }
                        not_plananualservicio_create:

                        // plananualservicio_edit
                        if (preg_match('#^/planificacion/plananualservicio/(?P<id>[^/]++)/(?P<parentEntityId>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'plananualservicio_edit')), array (  '_controller' => 'sisconee\\AppBundle\\Controller\\PlanAnualServicioController::editAction',));
                        }

                        // plananualservicio_update
                        if (preg_match('#^/planificacion/plananualservicio/(?P<id>[^/]++)/(?P<parentEntityId>[^/]++)/update$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                                $allow = array_merge($allow, array('POST', 'PUT'));
                                goto not_plananualservicio_update;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'plananualservicio_update')), array (  '_controller' => 'sisconee\\AppBundle\\Controller\\PlanAnualServicioController::updateAction',));
                        }
                        not_plananualservicio_update:

                        // plananualservicio_delete
                        if (preg_match('#^/planificacion/plananualservicio/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'plananualservicio_delete')), array (  '_controller' => 'sisconee\\AppBundle\\Controller\\PlanAnualServicioController::deleteAction',));
                        }

                        // plananualservicio_load_data
                        if ($pathinfo === '/planificacion/plananualservicio/load_newData') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_plananualservicio_load_data;
                            }

                            return array (  '_controller' => 'sisconee\\AppBundle\\Controller\\PlanAnualServicioController::loadRelatedDataAction',  '_route' => 'plananualservicio_load_data',);
                        }
                        not_plananualservicio_load_data:

                        // plananualservicio
                        if (preg_match('#^/planificacion/plananualservicio(?:/(?P<id>[^/]++))?$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'plananualservicio')), array (  '_controller' => 'sisconee\\AppBundle\\Controller\\PlanAnualServicioController::indexAction',  'id' => NULL,));
                        }

                    }

                }

                if (0 === strpos($pathinfo, '/planificacion/planmensualservicio')) {
                    // planmensualservicio_create
                    if ($pathinfo === '/planificacion/planmensualservicio/create') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_planmensualservicio_create;
                        }

                        return array (  '_controller' => 'sisconee\\AppBundle\\Controller\\PlanMensualServicioController::createAction',  '_route' => 'planmensualservicio_create',);
                    }
                    not_planmensualservicio_create:

                    // planmensualservicio_edit
                    if (preg_match('#^/planificacion/planmensualservicio/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'planmensualservicio_edit')), array (  '_controller' => 'sisconee\\AppBundle\\Controller\\PlanMensualServicioController::editAction',));
                    }

                    // planmensualservicio_update
                    if (preg_match('#^/planificacion/planmensualservicio/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                            $allow = array_merge($allow, array('POST', 'PUT'));
                            goto not_planmensualservicio_update;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'planmensualservicio_update')), array (  '_controller' => 'sisconee\\AppBundle\\Controller\\PlanMensualServicioController::updateAction',));
                    }
                    not_planmensualservicio_update:

                    // planmensualservicio_delete
                    if (preg_match('#^/planificacion/planmensualservicio/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                            $allow = array_merge($allow, array('POST', 'DELETE'));
                            goto not_planmensualservicio_delete;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'planmensualservicio_delete')), array (  '_controller' => 'sisconee\\AppBundle\\Controller\\PlanMensualServicioController::deleteAction',));
                    }
                    not_planmensualservicio_delete:

                    // planmensualservicio
                    if (preg_match('#^/planificacion/planmensualservicio(?:/(?P<entityId>[^/]++)(?:/(?P<serviceId>[^/]++))?)?$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'planmensualservicio')), array (  '_controller' => 'sisconee\\AppBundle\\Controller\\PlanMensualServicioController::indexAction',  'entityId' => NULL,  'serviceId' => NULL,));
                    }

                    // planmensualservicio_load_data
                    if ($pathinfo === '/planificacion/planmensualservicio/load_newData') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_planmensualservicio_load_data;
                        }

                        return array (  '_controller' => 'sisconee\\AppBundle\\Controller\\PlanMensualServicioController::loadRelatedDataAction',  '_route' => 'planmensualservicio_load_data',);
                    }
                    not_planmensualservicio_load_data:

                }

            }

        }

        if (0 === strpos($pathinfo, '/registro_lecturas')) {
            // registro_lecturas
            if (rtrim($pathinfo, '/') === '/registro_lecturas') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'registro_lecturas');
                }

                return array (  '_controller' => 'sisconee\\AppBundle\\Controller\\RegistroLecturasController::indexAction',  '_route' => 'registro_lecturas',);
            }

            if (0 === strpos($pathinfo, '/registro_lecturas/get')) {
                // registro_lecturas_change_entidad
                if (rtrim($pathinfo, '/') === '/registro_lecturas/getServicios') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_registro_lecturas_change_entidad;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'registro_lecturas_change_entidad');
                    }

                    return array (  '_controller' => 'sisconee\\AppBundle\\Controller\\RegistroLecturasController::getServiciosAction',  '_route' => 'registro_lecturas_change_entidad',);
                }
                not_registro_lecturas_change_entidad:

                // registro_lecturas_change_servicio
                if (rtrim($pathinfo, '/') === '/registro_lecturas/getPlanAnualServicio') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_registro_lecturas_change_servicio;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'registro_lecturas_change_servicio');
                    }

                    return array (  '_controller' => 'sisconee\\AppBundle\\Controller\\RegistroLecturasController::getPlanAnualServicioAction',  '_route' => 'registro_lecturas_change_servicio',);
                }
                not_registro_lecturas_change_servicio:

                if (0 === strpos($pathinfo, '/registro_lecturas/getMonth')) {
                    // registro_lecturas_change_month_loadPlan
                    if (rtrim($pathinfo, '/') === '/registro_lecturas/getMonthPlanServicioAction') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_registro_lecturas_change_month_loadPlan;
                        }

                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'registro_lecturas_change_month_loadPlan');
                        }

                        return array (  '_controller' => 'sisconee\\AppBundle\\Controller\\RegistroLecturasController::getMonthPlanServicioAction',  '_route' => 'registro_lecturas_change_month_loadPlan',);
                    }
                    not_registro_lecturas_change_month_loadPlan:

                    // registro_lecturas_change_month
                    if (rtrim($pathinfo, '/') === '/registro_lecturas/getMonthInformationServicioAction') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_registro_lecturas_change_month;
                        }

                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'registro_lecturas_change_month');
                        }

                        return array (  '_controller' => 'sisconee\\AppBundle\\Controller\\RegistroLecturasController::getMonthInformationServicioAction',  '_route' => 'registro_lecturas_change_month',);
                    }
                    not_registro_lecturas_change_month:

                }

            }

            // registro_lecturas_update
            if (rtrim($pathinfo, '/') === '/registro_lecturas/updateLecturaServicioAction') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_registro_lecturas_update;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'registro_lecturas_update');
                }

                return array (  '_controller' => 'sisconee\\AppBundle\\Controller\\RegistroLecturasController::updateLecturaServicioAction',  '_route' => 'registro_lecturas_update',);
            }
            not_registro_lecturas_update:

        }

        if (0 === strpos($pathinfo, '/planificacion/plandiarioservicio')) {
            // plandiarioservicio_create
            if ($pathinfo === '/planificacion/plandiarioservicio/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_plandiarioservicio_create;
                }

                return array (  '_controller' => 'sisconee\\AppBundle\\Controller\\PlanDiarioServicioController::createAction',  '_route' => 'plandiarioservicio_create',);
            }
            not_plandiarioservicio_create:

            // plandiarioservicio
            if (preg_match('#^/planificacion/plandiarioservicio(?:/(?P<entityId>[^/]++)(?:/(?P<serviceId>[^/]++)(?:/(?P<month>[^/]++)(?:/(?P<week>[^/]++))?)?)?)?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'plandiarioservicio')), array (  '_controller' => 'sisconee\\AppBundle\\Controller\\PlanDiarioServicioController::indexAction',  'entityId' => NULL,  'serviceId' => NULL,  'month' => NULL,  'week' => NULL,));
            }

        }

        if (0 === strpos($pathinfo, '/reporte')) {
            // sisconee_app_reportes
            if (0 === strpos($pathinfo, '/reporte/inicio') && preg_match('#^/reporte/inicio/(?P<Nomb_Report>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'sisconee_app_reportes')), array (  '_controller' => 'sisconee\\AppBundle\\Controller\\ReportController::indexAction',));
            }

            // registro_entidades
            if (rtrim($pathinfo, '/') === '/reporte/entidades/por/provincia') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_registro_entidades;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'registro_entidades');
                }

                return array (  '_controller' => 'sisconee\\AppBundle\\Controller\\ReportController::GetEntidadByProvinciaAction',  '_route' => 'registro_entidades',);
            }
            not_registro_entidades:

            // registro_TipoServicio
            if (rtrim($pathinfo, '/') === '/reporte/TipoServicio') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_registro_TipoServicio;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'registro_TipoServicio');
                }

                return array (  '_controller' => 'sisconee\\AppBundle\\Controller\\ReportController::GetTipoServicioAction',  '_route' => 'registro_TipoServicio',);
            }
            not_registro_TipoServicio:

            if (0 === strpos($pathinfo, '/reporte/p')) {
                // registro_provincias
                if (rtrim($pathinfo, '/') === '/reporte/provincias') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_registro_provincias;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'registro_provincias');
                    }

                    return array (  '_controller' => 'sisconee\\AppBundle\\Controller\\ReportController::provinciasAction',  '_route' => 'registro_provincias',);
                }
                not_registro_provincias:

                // reporte_plan_mensual
                if ($pathinfo === '/reporte/plan_mensual') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_reporte_plan_mensual;
                    }

                    return array (  '_controller' => 'sisconee\\AppBundle\\Controller\\ReportController::Get_PlanMensualAction',  '_route' => 'reporte_plan_mensual',);
                }
                not_reporte_plan_mensual:

            }

            // reporte_comportamiento_diario
            if ($pathinfo === '/reporte/comportamiento_diario') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_reporte_comportamiento_diario;
                }

                return array (  '_controller' => 'sisconee\\AppBundle\\Controller\\ReportController::Get_ComportamientoDiarioEnUnMesAction',  '_route' => 'reporte_comportamiento_diario',);
            }
            not_reporte_comportamiento_diario:

            if (0 === strpos($pathinfo, '/reporte/parte_')) {
                // reporte_parte_diario
                if ($pathinfo === '/reporte/parte_diario') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_reporte_parte_diario;
                    }

                    return array (  '_controller' => 'sisconee\\AppBundle\\Controller\\ReportController::Get_ParteDiarioAction',  '_route' => 'reporte_parte_diario',);
                }
                not_reporte_parte_diario:

                // reporte_parte_consumo
                if ($pathinfo === '/reporte/parte_consumo') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_reporte_parte_consumo;
                    }

                    return array (  '_controller' => 'sisconee\\AppBundle\\Controller\\ReportController::Get_ParteConsumoAction',  '_route' => 'reporte_parte_consumo',);
                }
                not_reporte_parte_consumo:

            }

            if (0 === strpos($pathinfo, '/reporte/consumo_acumulado')) {
                // reporte_consumo_acumulado
                if ($pathinfo === '/reporte/consumo_acumulado') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_reporte_consumo_acumulado;
                    }

                    return array (  '_controller' => 'sisconee\\AppBundle\\Controller\\ReportController::Get_ConsumoAcumuladoGeneralAction',  '_route' => 'reporte_consumo_acumulado',);
                }
                not_reporte_consumo_acumulado:

                // reporte_consumo_acumulado_hp
                if ($pathinfo === '/reporte/consumo_acumulado_hp') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_reporte_consumo_acumulado_hp;
                    }

                    return array (  '_controller' => 'sisconee\\AppBundle\\Controller\\ReportController::Get_ConsumoAcumuladoHPAction',  '_route' => 'reporte_consumo_acumulado_hp',);
                }
                not_reporte_consumo_acumulado_hp:

            }

            // index_reportes
            if (rtrim($pathinfo, '/') === '/reporte') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'index_reportes');
                }

                return array (  '_controller' => 'sisconee\\AppBundle\\Controller\\ReportController::indexReportsAction',  '_route' => 'index_reportes',);
            }

            if (0 === strpos($pathinfo, '/reporte/reporte_to_')) {
                // reporte_pdf
                if ($pathinfo === '/reporte/reporte_to_pdf') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_reporte_pdf;
                    }

                    return array (  '_controller' => 'sisconee\\AppBundle\\Controller\\ReportController::pdfReportAction',  '_route' => 'reporte_pdf',);
                }
                not_reporte_pdf:

                // reporte_grafico
                if ($pathinfo === '/reporte/reporte_to_graph') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_reporte_grafico;
                    }

                    return array (  '_controller' => 'sisconee\\AppBundle\\Controller\\ReportController::graphReportAction',  '_route' => 'reporte_grafico',);
                }
                not_reporte_grafico:

            }

        }

        // trazas
        if (rtrim($pathinfo, '/') === '/trazas') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'trazas');
            }

            return array (  '_controller' => 'sisconee\\AppBundle\\Controller\\TrazasController::indexAction',  '_route' => 'trazas',);
        }

        if (0 === strpos($pathinfo, '/administracion')) {
            // administracion
            if (rtrim($pathinfo, '/') === '/administracion') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'administracion');
                }

                return array (  '_controller' => 'sisconee\\AdministracionBundle\\Controller\\DefaultController::indexAction',  '_route' => 'administracion',);
            }

            if (0 === strpos($pathinfo, '/administracion/configuracion')) {
                // configuracion_edit
                if (rtrim($pathinfo, '/') === '/administracion/configuracion') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'configuracion_edit');
                    }

                    return array (  '_controller' => 'sisconee\\AdministracionBundle\\Controller\\ConfiguracionController::editAction',  '_route' => 'configuracion_edit',);
                }

                // configuracion_update
                if ($pathinfo === '/administracion/configuracion/update') {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_configuracion_update;
                    }

                    return array (  '_controller' => 'sisconee\\AdministracionBundle\\Controller\\ConfiguracionController::updateAction',  '_route' => 'configuracion_update',);
                }
                not_configuracion_update:

                if (0 === strpos($pathinfo, '/administracion/configuracion/c')) {
                    // configuracion_create
                    if ($pathinfo === '/administracion/configuracion/create') {
                        if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                            goto not_configuracion_create;
                        }

                        return array (  '_controller' => 'sisconee\\AdministracionBundle\\Controller\\ConfiguracionController::createAction',  '_route' => 'configuracion_create',);
                    }
                    not_configuracion_create:

                    // configuracion_changeStatus
                    if ($pathinfo === '/administracion/configuracion/changeStatus') {
                        if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                            goto not_configuracion_changeStatus;
                        }

                        return array (  '_controller' => 'sisconee\\AdministracionBundle\\Controller\\ConfiguracionController::changeStatusAction',  '_route' => 'configuracion_changeStatus',);
                    }
                    not_configuracion_changeStatus:

                }

                // get_configuration
                if ($pathinfo === '/administracion/configuracion/getconfiguration') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_get_configuration;
                    }

                    return array (  '_controller' => 'sisconee\\AdministracionBundle\\Controller\\ConfiguracionController::getConfigurationAction',  '_route' => 'get_configuration',);
                }
                not_get_configuration:

            }

            if (0 === strpos($pathinfo, '/administracion/tiposervicio')) {
                // administracion_tiposervicio
                if (rtrim($pathinfo, '/') === '/administracion/tiposervicio') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'administracion_tiposervicio');
                    }

                    return array (  '_controller' => 'sisconee\\AdministracionBundle\\Controller\\TipoServicioController::indexAction',  '_route' => 'administracion_tiposervicio',);
                }

                // administracion_tiposervicio_show
                if (preg_match('#^/administracion/tiposervicio/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'administracion_tiposervicio_show')), array (  '_controller' => 'sisconee\\AdministracionBundle\\Controller\\TipoServicioController::showAction',));
                }

                // administracion_tiposervicio_new
                if ($pathinfo === '/administracion/tiposervicio/new') {
                    return array (  '_controller' => 'sisconee\\AdministracionBundle\\Controller\\TipoServicioController::newAction',  '_route' => 'administracion_tiposervicio_new',);
                }

                // administracion_tiposervicio_create
                if ($pathinfo === '/administracion/tiposervicio/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_administracion_tiposervicio_create;
                    }

                    return array (  '_controller' => 'sisconee\\AdministracionBundle\\Controller\\TipoServicioController::createAction',  '_route' => 'administracion_tiposervicio_create',);
                }
                not_administracion_tiposervicio_create:

                // administracion_tiposervicio_edit
                if (preg_match('#^/administracion/tiposervicio/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'administracion_tiposervicio_edit')), array (  '_controller' => 'sisconee\\AdministracionBundle\\Controller\\TipoServicioController::editAction',));
                }

                // administracion_tiposervicio_update
                if (preg_match('#^/administracion/tiposervicio/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_administracion_tiposervicio_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'administracion_tiposervicio_update')), array (  '_controller' => 'sisconee\\AdministracionBundle\\Controller\\TipoServicioController::updateAction',));
                }
                not_administracion_tiposervicio_update:

                // administracion_tiposervicio_delete
                if (preg_match('#^/administracion/tiposervicio/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'administracion_tiposervicio_delete')), array (  '_controller' => 'sisconee\\AdministracionBundle\\Controller\\TipoServicioController::deleteAction',));
                }

            }

            if (0 === strpos($pathinfo, '/administracion/entidad')) {
                // administracion_entidad
                if (rtrim($pathinfo, '/') === '/administracion/entidad') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'administracion_entidad');
                    }

                    return array (  '_controller' => 'sisconee\\AdministracionBundle\\Controller\\EntidadController::indexAction',  '_route' => 'administracion_entidad',);
                }

                // administracion_entidad_show
                if (preg_match('#^/administracion/entidad/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'administracion_entidad_show')), array (  '_controller' => 'sisconee\\AdministracionBundle\\Controller\\EntidadController::showAction',));
                }

                // administracion_entidad_new
                if ($pathinfo === '/administracion/entidad/new') {
                    return array (  '_controller' => 'sisconee\\AdministracionBundle\\Controller\\EntidadController::newAction',  '_route' => 'administracion_entidad_new',);
                }

                // administracion_entidad_create
                if ($pathinfo === '/administracion/entidad/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_administracion_entidad_create;
                    }

                    return array (  '_controller' => 'sisconee\\AdministracionBundle\\Controller\\EntidadController::createAction',  '_route' => 'administracion_entidad_create',);
                }
                not_administracion_entidad_create:

                // administracion_entidad_edit
                if (preg_match('#^/administracion/entidad/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'administracion_entidad_edit')), array (  '_controller' => 'sisconee\\AdministracionBundle\\Controller\\EntidadController::editAction',));
                }

                // administracion_entidad_update
                if (preg_match('#^/administracion/entidad/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_administracion_entidad_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'administracion_entidad_update')), array (  '_controller' => 'sisconee\\AdministracionBundle\\Controller\\EntidadController::updateAction',));
                }
                not_administracion_entidad_update:

                // administracion_entidad_delete
                if (preg_match('#^/administracion/entidad/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'administracion_entidad_delete')), array (  '_controller' => 'sisconee\\AdministracionBundle\\Controller\\EntidadController::deleteAction',));
                }

            }

            if (0 === strpos($pathinfo, '/administracion/servicio')) {
                // administracion_servicio
                if (rtrim($pathinfo, '/') === '/administracion/servicio') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'administracion_servicio');
                    }

                    return array (  '_controller' => 'sisconee\\AdministracionBundle\\Controller\\ServicioController::indexAction',  '_route' => 'administracion_servicio',);
                }

                // administracion_servicio_show
                if (preg_match('#^/administracion/servicio/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'administracion_servicio_show')), array (  '_controller' => 'sisconee\\AdministracionBundle\\Controller\\ServicioController::showAction',));
                }

                // administracion_servicio_new
                if ($pathinfo === '/administracion/servicio/new') {
                    return array (  '_controller' => 'sisconee\\AdministracionBundle\\Controller\\ServicioController::newAction',  '_route' => 'administracion_servicio_new',);
                }

                // administracion_servicio_create
                if ($pathinfo === '/administracion/servicio/create') {
                    return array (  '_controller' => 'sisconee\\AdministracionBundle\\Controller\\ServicioController::createAction',  '_route' => 'administracion_servicio_create',);
                }

                // administracion_servicio_edit
                if (preg_match('#^/administracion/servicio/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'administracion_servicio_edit')), array (  '_controller' => 'sisconee\\AdministracionBundle\\Controller\\ServicioController::editAction',));
                }

                // administracion_servicio_update
                if (preg_match('#^/administracion/servicio/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_administracion_servicio_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'administracion_servicio_update')), array (  '_controller' => 'sisconee\\AdministracionBundle\\Controller\\ServicioController::updateAction',));
                }
                not_administracion_servicio_update:

                // administracion_servicio_delete
                if (preg_match('#^/administracion/servicio/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'administracion_servicio_delete')), array (  '_controller' => 'sisconee\\AdministracionBundle\\Controller\\ServicioController::deleteAction',));
                }

                // administracion_servicio_municipios
                if ($pathinfo === '/administracion/servicio/getMunicipios') {
                    return array (  '_controller' => 'sisconee\\AdministracionBundle\\Controller\\ServicioController::getMunicipiosAction',  '_route' => 'administracion_servicio_municipios',);
                }

            }

            if (0 === strpos($pathinfo, '/administracion/usuario')) {
                // administracion_usuario
                if (rtrim($pathinfo, '/') === '/administracion/usuario') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'administracion_usuario');
                    }

                    return array (  '_controller' => 'sisconee\\AdministracionBundle\\Controller\\UsuarioController::indexAction',  '_route' => 'administracion_usuario',);
                }

                // administracion_usuario_show
                if (preg_match('#^/administracion/usuario/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'administracion_usuario_show')), array (  '_controller' => 'sisconee\\AdministracionBundle\\Controller\\UsuarioController::showAction',));
                }

                // administracion_usuario_new
                if ($pathinfo === '/administracion/usuario/new') {
                    return array (  '_controller' => 'sisconee\\AdministracionBundle\\Controller\\UsuarioController::newAction',  '_route' => 'administracion_usuario_new',);
                }

                // administracion_usuario_create
                if ($pathinfo === '/administracion/usuario/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_administracion_usuario_create;
                    }

                    return array (  '_controller' => 'sisconee\\AdministracionBundle\\Controller\\UsuarioController::createAction',  '_route' => 'administracion_usuario_create',);
                }
                not_administracion_usuario_create:

                // administracion_usuario_edit
                if (preg_match('#^/administracion/usuario/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'administracion_usuario_edit')), array (  '_controller' => 'sisconee\\AdministracionBundle\\Controller\\UsuarioController::editAction',));
                }

                // administracion_usuario_delete
                if (preg_match('#^/administracion/usuario/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'administracion_usuario_delete')), array (  '_controller' => 'sisconee\\AdministracionBundle\\Controller\\UsuarioController::deleteAction',));
                }

            }

        }

        // inicio
        if ($pathinfo === '/Inicio') {
            return array (  '_controller' => 'sisconee\\AppBundle\\Controller\\DefaultController::indexAction',  '_route' => 'inicio',);
        }

        if (0 === strpos($pathinfo, '/log')) {
            if (0 === strpos($pathinfo, '/login')) {
                // usuario_login
                if ($pathinfo === '/login') {
                    return array (  '_controller' => 'sisconee\\AppBundle\\Controller\\DefaultController::loginAction',  '_route' => 'usuario_login',);
                }

                // usuario_login_check
                if ($pathinfo === '/login_check') {
                    return array('_route' => 'usuario_login_check');
                }

            }

            // usuario_logout
            if ($pathinfo === '/logout') {
                return array('_route' => 'usuario_logout');
            }

        }

        // prueba
        if ($pathinfo === '/prueba') {
            return array (  '_controller' => 'sisconee\\AppBundle\\Controller\\DefaultController::pruebaAction',  '_route' => 'prueba',);
        }

        // usuario_edit_password
        if (preg_match('#^/(?P<id>[^/]++)/edit_password$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'usuario_edit_password')), array (  '_controller' => 'sisconee\\AdministracionBundle\\Controller\\UsuarioController::editPasswordAction',));
        }

        // usuario_edit
        if (preg_match('#^/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'usuario_edit')), array (  '_controller' => 'sisconee\\AdministracionBundle\\Controller\\UsuarioController::editCommonUserAction',));
        }

        // usuario_update
        if (preg_match('#^/(?P<id>[^/]++)/(?P<fromPage>[^/]++)/update$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                $allow = array_merge($allow, array('POST', 'PUT'));
                goto not_usuario_update;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'usuario_update')), array (  '_controller' => 'sisconee\\AdministracionBundle\\Controller\\UsuarioController::updateAction',));
        }
        not_usuario_update:

        // _welcome
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', '_welcome');
            }

            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\WelcomeController::indexAction',  '_route' => '_welcome',);
        }

        if (0 === strpos($pathinfo, '/demo')) {
            if (0 === strpos($pathinfo, '/demo/secured')) {
                if (0 === strpos($pathinfo, '/demo/secured/log')) {
                    if (0 === strpos($pathinfo, '/demo/secured/login')) {
                        // _demo_login
                        if ($pathinfo === '/demo/secured/login') {
                            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::loginAction',  '_route' => '_demo_login',);
                        }

                        // _demo_security_check
                        if ($pathinfo === '/demo/secured/login_check') {
                            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::securityCheckAction',  '_route' => '_demo_security_check',);
                        }

                    }

                    // _demo_logout
                    if ($pathinfo === '/demo/secured/logout') {
                        return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::logoutAction',  '_route' => '_demo_logout',);
                    }

                }

                if (0 === strpos($pathinfo, '/demo/secured/hello')) {
                    // acme_demo_secured_hello
                    if ($pathinfo === '/demo/secured/hello') {
                        return array (  'name' => 'World',  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',  '_route' => 'acme_demo_secured_hello',);
                    }

                    // _demo_secured_hello
                    if (preg_match('#^/demo/secured/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_secured_hello')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',));
                    }

                    // _demo_secured_hello_admin
                    if (0 === strpos($pathinfo, '/demo/secured/hello/admin') && preg_match('#^/demo/secured/hello/admin/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_secured_hello_admin')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloadminAction',));
                    }

                }

            }

            // _demo
            if (rtrim($pathinfo, '/') === '/demo') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', '_demo');
                }

                return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::indexAction',  '_route' => '_demo',);
            }

            // _demo_hello
            if (0 === strpos($pathinfo, '/demo/hello') && preg_match('#^/demo/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_hello')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::helloAction',));
            }

            // _demo_contact
            if ($pathinfo === '/demo/contact') {
                return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::contactAction',  '_route' => '_demo_contact',);
            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
