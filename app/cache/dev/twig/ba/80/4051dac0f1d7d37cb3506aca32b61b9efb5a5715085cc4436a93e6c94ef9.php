<?php

/* sisconeeAppBundle:Registro:index.html.twig */
class __TwigTemplate_ba804051dac0f1d7d37cb3506aca32b61b9efb5a5715085cc4436a93e6c94ef9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("sisconeeAppBundle:GeneralLayout:layout_registro.html.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
            'data' => array($this, 'block_data'),
            'javascripts' => array($this, 'block_javascripts'),
            'stylesheets' => array($this, 'block_stylesheets'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "sisconeeAppBundle:GeneralLayout:layout_registro.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "    <style>
        @media (min-width: 768px) {
            .table {
                width: 50%;
            }

            .admin-list-actions.autosize {
                width: 50%;
            }

            .texto_alerta {
                color:red;
            }
        }
    </style>

    ";
        // line 20
        $this->displayBlock('data', $context, $blocks);
        // line 72
        echo "
   

";
    }

    // line 20
    public function block_data($context, array $blocks = array())
    {
        // line 21
        echo "
        Entidad(es):
        <select id=\"entities\">

        ";
        // line 25
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")));
        foreach ($context['_seq'] as $context["_key"] => $context["e"]) {
            // line 26
            echo "            <option value=\" ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "getId"), "html", null, true);
            echo " \">
                ";
            // line 27
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "getNombre"), "html", null, true);
            echo "
            </option>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['e'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 30
        echo "        </select>
        <br>
        <br>
        <div id=\"lista_servicios\">";
        // line 33
        $this->env->loadTemplate("sisconeeAppBundle:Registro:lista_servicios.html.twig")->display($context);
        echo "</div>
        <div><span>Plan Anual del Servicio: </span><span id=\"plan_anual_servicio\" class=\"label label-info\"></span></div>
        <label id=\"lbl_hasHorarioPico\" style=\"visibility: hidden\"></label>
        <br>
        <br>
        Mes:
        <select id=\"meses\" class=\"month\" disabled=\"disabled\">
            <option value=\"\"><--Seleccione un mes--></option>
            <option value=\"01\">Enero</option>
            <option value=\"02\">Febrero</option>
            <option value=\"03\">Marzo</option>
            <option value=\"04\">Abril</option>
            <option value=\"05\">Mayo</option>
            <option value=\"06\">Junio</option>
            <option value=\"07\">Julio</option>
            <option value=\"08\">Agosto</option>
            <option value=\"09\">Septiembre</option>
            <option value=\"10\">Octubre</option>
            <option value=\"11\">Noviembre</option>
            <option value=\"12\">Diciembre</option>
        </select>
        <div><span>Plan Mensual del Servicio: </span><span id=\"plan_mensual_servicio\" class=\"label label-info\"></span></div>
        <div id=\"infoHorarioPico\"><span>Plan Mensual para el Horario Pico del Servicio: </span><span id=\"plan_mensual_hp_servicio\" class=\"label label-info\"></span></div>

        <br>
        <br>
        <div id=\"plan_mensual_servicio_listado\"></div>
        <div id=\"dialog\" title=\"Registro de consumo\">
            <p><form id=\"form_registro\">
                <input id=\"txt_registro\" type=\"hidden\">
              <table>
                  <tr><td><label>Plan para la fecha:</label><label id=\"lbl_plan_dia\"></label></td><td><label id=\"lbl_texto_plan_hp\">Plan HP para la fecha:</label><label id=\"lbl_plan_dia_hp\"></label></td></tr>
                  <tr><td><label>Consumo Real:</label><input id=\"txt_consumo_dia\" name=\"txt_consumo_dia\" type=\"text\" ></td><td><label id=\"lbl_texto_consumo_hp\">Consumo HP:</label><input id=\"txt_consumo_dia_hp\" name=\"txt_consumo_dia_hp\" type=\"text\" ></td></tr>
                  <tr><td>&nbsp;</td><td><input type=\"submit\" id=\"btnUpdate\" value=\"Actualizar\"></td></tr>
              </table>
            </form>
            </p>
        </div>
    ";
    }

    // line 77
    public function block_javascripts($context, array $blocks = array())
    {
        // line 78
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
    <script type=\"text/javascript\" src=\"";
        // line 79
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("jquery/jquery-ui-1.11.2/jquery-ui.min.js"), "html", null, true);
        echo "\"></script>
    <script>

    function AttachEvent(){
        servicio = \$('#servicios');

                servicio.change(function () {
                    //alert(\$('#entities').val());
                    \$('#plan_anual_servicio').html('');
                    \$('#plan_mensual_servicio').html('');
                    \$('#plan_mensual_hp_servicio').html('');
                    \$('#plan_mensual_servicio_listado').html('');
                    \$('#meses').val('');

                    if (servicio.val()==-1){ \$('#meses').attr(\"disabled\", true);} else { \$('#meses').attr(\"disabled\", false);}
                    var data = {};
                    data['id_servicio'] = servicio.val();
                    //console.log(data);
                    // Submit data via AJAX
                    \$.ajax({
                        url: '";
        // line 99
        echo $this->env->getExtension('routing')->getPath("registro_lecturas_change_servicio");
        echo "',
                        type: 'GET',
                        data: data,
                        success: function (html) {

                            \$('#plan_anual_servicio').html(html.plan_anual_servicio);
                            if (html.hasPlanHorarioPico) {
                                \$('#lbl_hasHorarioPico').html('si');
                                \$('#infoHorarioPico').show();
                            }
                            else {
                                \$('#lbl_hasHorarioPico').html('no');
                                  \$('#infoHorarioPico').hide();
                            }

                        }
                    });
                });
            }
            \$(function() {
                //alert(\$('#entities').val());
                 entidad = \$('#entities');
                // When entidad gets selected ...
                entidad.change(function () {
                    //alert(\$('#entities').val());
                    //reseteando los valores iniciales
                    \$('#plan_anual_servicio').html('');
                    \$('#plan_mensual_servicio').html('');
                    \$('#plan_mensual_hp_servicio').html('');
                    \$('#plan_mensual_servicio_listado').html('');
                    \$('#meses').val('');
                    var data = {};
                    data['id_entity'] = entidad.val();
                    //console.log(data);
                    // Submit data via AJAX
                    \$.ajax({
                        url: '";
        // line 135
        echo $this->env->getExtension('routing')->getPath("registro_lecturas_change_entidad");
        echo "',
                        type: 'GET',
                        data: data,
                        success: function (html) {
                     // Replace current servicios field ...
                            \$('#lista_servicios').html(html);

                            AttachEvent();

                        }
                    });
                });

                meses = \$('#meses');
                meses.change(function () {
                    //alert(\$('#entities').val());
                    \$('#plan_mensual_servicio').html('');
                    \$('#plan_mensual_servicio_listado').html('');
                    var data = {};
                    data['id_servicio'] = servicio.val();
                    data['month'] = meses.val();
                    data['hasHorarioPico'] = \$('#lbl_hasHorarioPico').html();
                    //console.log(data);
                    // Submit data via AJAX
                    \$.ajax({
                        url: '";
        // line 160
        echo $this->env->getExtension('routing')->getPath("registro_lecturas_change_month_loadPlan");
        echo "',
                        type: 'GET',
                        data: data,
                        success: function (html) {

                            \$('#plan_mensual_servicio').html(html.plan_mensual_servicio);
                            \$('#plan_mensual_hp_servicio').html(html.planHorarioPico);

                        }
                    });
                    // Submit data via AJAX
                    \$.ajax({
                        url: '";
        // line 172
        echo $this->env->getExtension('routing')->getPath("registro_lecturas_change_month");
        echo "',
                        type: 'GET',
                        data: data,
                        success: function (html) {

                            \$('#plan_mensual_servicio_listado').html(html);

                        }
                    });
                });

                AttachEvent();
                \$(\"#dialog\").dialog({
                    autoOpen: false,
                    modal: true,
                    resizable: false,
                    //position: ['center',150],
                    width: 600,
                    height:250,
                    open: function(event, ui) {
                        var dialogo = \$(\"#dialog\");
                        \$('#lbl_plan_dia').html(dialogo.data('planDia'));
                        \$('#lbl_plan_dia_hp').html(dialogo.data('planDiaHorarioPico'));
                        \$('#txt_consumo_dia').val(dialogo.data('consumoDia'));
                        \$('#txt_registro').val(dialogo.data('idRegistro'));
                        v = \$('#lbl_hasHorarioPico').html();
                        if (v=='no') {
                            \$('#lbl_plan_dia_hp').hide();
                            \$('#txt_consumo_dia_hp').hide();
                            \$('#lbl_texto_plan_hp').hide();
                            \$('#lbl_texto_consumo_hp').hide();
                        }
                        else
                        {
                            \$('#txt_consumo_dia_hp').val(dialogo.data('consumoDiaHorarioPico'));
                            \$('#lbl_plan_dia_hp').show();
                            \$('#txt_consumo_dia_hp').show();
                            \$('#lbl_texto_plan_hp').show();
                            \$('#lbl_texto_consumo_hp').show();}

                    }
                });

                /*\$('#btnUpdate').click(function () {
                     alert('hjjhjh');
                    *//*if ((\$('#txt_consumo_dia').val()=='')||(isNaN(\$('#txt_consumo_dia').val())))
                    {   //\$('#txt_consumo_dia').val('0');
                        alert ('Debe introducir un valor numérico de consumo');
                        return (false);
                    }
                    else if ((\$('#lbl_hasHorarioPico').html()=='si') && ((\$('#txt_consumo_dia').val()=='')||(isNaN(\$('#txt_consumo_dia').val())))
                    {   //\$('#txt_consumo_dia').val('0');
                        alert ('Debe introducir un valor numérico de consumo en el horario pico');
                        return (false);
                    }
                    else {
                        //if ((\$('#txt_consumo_dia').val()=='')||(isNaN(\$('#txt_consumo_dia').val()))) {alert ('Debe introducir un valor numérico'); return (false);}
                        var data = {};
                        data['id_registro'] = \$('#txt_registro').val();
                        data['id_servicio'] = servicio.val();
                        data['month'] = meses.val();
                        data['txt_consumo_dia'] = \$('#txt_consumo_dia').val();
                        data['txt_consumo_dia_hp'] = \$('#txt_consumo_dia_hp').val();

                        //console.log(data);
                        // Submit data via AJAX
                        \$.ajax({
                            url: '";
        // line 239
        echo $this->env->getExtension('routing')->getPath("registro_lecturas_update");
        echo "',
                            type: 'GET',
                            data: data,
                            success: function (html) {

                                \$('#plan_mensual_servicio_listado').html(html);
                                \$('#dialog').dialog('close');
                            }

                        });
                    }
*//*
                });*/

                //
                \$.validator.methods.smallerTo = function(value, element,param){
                    //alert(options.data);
                    var target = \$( param );
                    //return (this.optional( element )||value <= target.val());
                    return (this.optional( element )||parseInt(value) <= parseInt(target.val()));
                    //return value <= \$(param).val();
                };

                \$(\"#form_registro\").validate({
                    rules: {
                        txt_consumo_dia: { required: true, number:true},
                        txt_consumo_dia_hp: { required: true, number:true, smallerTo:\"#txt_consumo_dia\"}

                    },
                    messages: {
                        txt_consumo_dia: \"Debe introducir el valor numérico de consumo general.\",
                        txt_consumo_dia_hp: { required: \"Debe introducir el valor numérico de consumo de horario pico.\",
                                              number: \"Debe introducir el valor numérico de consumo de horario pico.\",
                                              smallerTo:\"El valor de consumo del horario pico debe ser menor que el valor de consumo general\" }

                    },
                    submitHandler:function () {
                        var data = {};
                        data['id_registro'] = \$('#txt_registro').val();
                        data['id_servicio'] = servicio.val();
                        data['month'] = meses.val();
                        data['txt_consumo_dia'] = \$('#txt_consumo_dia').val();
                        data['txt_consumo_dia_hp'] = \$('#txt_consumo_dia_hp').val();

                        if (parseInt(\$('#txt_consumo_dia_hp').val()) <= parseInt(\$('#txt_consumo_dia').val())) {
                            //console.log(data);
                            // Submit data via AJAX
                            \$.ajax({
                                url: '";
        // line 287
        echo $this->env->getExtension('routing')->getPath("registro_lecturas_update");
        echo "',
                                type: 'GET',
                                data: data,
                                success: function (html) {

                                    \$('#plan_mensual_servicio_listado').html(html);
                                    \$('#dialog').dialog('close');
                                }

                            });
                        }
                        else {alert('El consumo del horario pico no puede ser mayor que el consumo general');}
                    }
                });

            });
        </script>

    ";
    }

    // line 307
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 308
        echo "    ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
    <link href=\"";
        // line 309
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("jquery/jquery-ui-1.11.2/jquery-ui.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\"/>


";
    }

    public function getTemplateName()
    {
        return "sisconeeAppBundle:Registro:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  401 => 309,  396 => 308,  393 => 307,  370 => 287,  319 => 239,  249 => 172,  234 => 160,  206 => 135,  167 => 99,  144 => 79,  139 => 78,  136 => 77,  93 => 33,  88 => 30,  79 => 27,  74 => 26,  70 => 25,  64 => 21,  61 => 20,  54 => 72,  52 => 20,  34 => 4,  31 => 3,);
    }
}
