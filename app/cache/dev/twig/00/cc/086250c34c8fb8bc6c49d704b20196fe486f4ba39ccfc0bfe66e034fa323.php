<?php

/* sisconeeAppBundle:Reports:index.html.twig */
class __TwigTemplate_00cc086250c34c8fb8bc6c49d704b20196fe486f4ba39ccfc0bfe66e034fa323 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("sisconeeAppBundle:GeneralLayout:layout_reportes.html.twig");

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'content' => array($this, 'block_content'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "sisconeeAppBundle:GeneralLayout:layout_reportes.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 10
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 11
        echo "    ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
    <link href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("jquery/jquery-ui-1.11.2/jquery-ui.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\"/>

";
    }

    // line 16
    public function block_content($context, array $blocks = array())
    {
        // line 17
        echo "    <div class=\"row\">
        <div class=\"col-md-6 col-md-offset-3\">
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <div class=\"login-panel panel panel-default\">
                <div class=\"panel-heading\">
                    <h3 class=\"panel-title\">Seleccione los datos a mostrar </h3>
                </div>
                <div class=\"panel-body\">
                    <form>


                        <div class=\"row\">
                            <div class=\"col-xs-6\">
                                <div id=\"lista_prov\">";
        // line 35
        $this->env->loadTemplate("sisconeeAppBundle:Reports:report_filtro.html.twig")->display($context);
        echo "</div>
                            </div>
                            <div class=\"col-xs-6\">
                                <div id=\"lista_Entidad\">";
        // line 38
        $this->env->loadTemplate("sisconeeAppBundle:Reports:report_filtro_entidad.html.twig")->display($context);
        echo "</div>
                            </div>

                        </div>
                        <br>
                        <div class=\"row\">
                            <div class=\"col-xs-6\">
                                ";
        // line 45
        if (((((isset($context["Nombre_Reporte"]) ? $context["Nombre_Reporte"] : $this->getContext($context, "Nombre_Reporte")) != "parte_diario") && ((isset($context["Nombre_Reporte"]) ? $context["Nombre_Reporte"] : $this->getContext($context, "Nombre_Reporte")) != "plan_mensual")) && ((isset($context["Nombre_Reporte"]) ? $context["Nombre_Reporte"] : $this->getContext($context, "Nombre_Reporte")) != "parte_consumo"))) {
            // line 46
            echo "                                    Mes:
                                    <select id=\"meses\" class=\"month\"  style=\"width: 100%\" class=\"form-control\">
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

                                ";
        } elseif ((((isset($context["Nombre_Reporte"]) ? $context["Nombre_Reporte"] : $this->getContext($context, "Nombre_Reporte")) == "parte_diario") || ((isset($context["Nombre_Reporte"]) ? $context["Nombre_Reporte"] : $this->getContext($context, "Nombre_Reporte")) == "parte_consumo"))) {
            // line 64
            echo "
                                    Fecha: <input id=\"datepicker\" type=\"text\" readonly=\"true\"  style=\"width: 100%\" >

                                ";
        }
        // line 68
        echo "                                ";
        if (((isset($context["Nombre_Reporte"]) ? $context["Nombre_Reporte"] : $this->getContext($context, "Nombre_Reporte")) == "plan_mensual")) {
            // line 69
            echo "                                    <div class=\"checkbox\">
                                        <label>
                                            <input id=\"checkEntidad\" type=\"checkbox\" value=\"\" align=\"left\">
                                            Mostrar Entidad
                                        </label>
                                    </div>
                                    <div class=\"checkbox\">
                                        <label>
                                            <input id=\"checkServicio\" type=\"checkbox\" value=\"\">
                                            Mostrar Servicio
                                        </label>
                                    </div>

                                ";
        }
        // line 83
        echo "                            </div>
                            <div class=\"col-xs-6\" >
                                ";
        // line 85
        if ((((isset($context["Nombre_Reporte"]) ? $context["Nombre_Reporte"] : $this->getContext($context, "Nombre_Reporte")) != "parte_diario") && ((isset($context["Nombre_Reporte"]) ? $context["Nombre_Reporte"] : $this->getContext($context, "Nombre_Reporte")) != "parte_consumo"))) {
            // line 86
            echo "                                    <div id=\"LYears\">";
            $this->env->loadTemplate("sisconeeAppBundle:Reports:report_filtro_years.html.twig")->display($context);
            echo "</div>
                                ";
        }
        // line 88
        echo "
                            </div>

                        </div>


                        <br>
                        <div class=\"row\">
                            <div class=\"col-xs-7\">
                                <input id=\"btnlistar\" class=\"btn btn-lg btn-success btn-block\" type=\"button\" name=\"btnlistar\" value=\"Listar\" />

                                <input id=\"nombre_reporte\"  type=\"hidden\" name=\"nombre_reporte\" value=\"";
        // line 99
        echo twig_escape_filter($this->env, (isset($context["Nombre_Reporte"]) ? $context["Nombre_Reporte"] : $this->getContext($context, "Nombre_Reporte")), "html", null, true);
        echo "\" />
                            </div>
                            <div class=\"col-xs-2\">
                                <input id=\"btnPDF\" class=\"btn btn-lg btn-primary btn-block\" type=\"button\" name=\"btnPDF\" value=\"PDF\" disabled />


                            </div>
                            <div class=\"col-xs-3\">

                                <input id=\"btnGraph\" class=\"btn btn-lg btn-primary btn-block\" type=\"button\" name=\"btnGraph\" value=\"Gráfico\"  disabled/>

                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <div class=\"row\">
        <div class=\"col-md-12\">
            <div  id=\"resultado\"></div>
        </div>
    </div>
    <div class=\"row\">
        <div >
            <div id=\"chartdiv\" style=\"width: 50%\"></div>
        </div>
    </div>



";
    }

    // line 133
    public function block_javascripts($context, array $blocks = array())
    {
        // line 134
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
    <script type=\"text/javascript\" src=\"";
        // line 135
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("jquery/jquery-ui-1.11.2/jquery-ui.min.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 136
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("jquery/jquery-ui-1.11.2/datepicker-es.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 137
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("jquery/jquery-validate/jquery.validate.js"), "html", null, true);
        echo "\"></script>
    <script>

        \$(document).ready()
        {

            function deMayorAMenor(elem1, elem2) {return elem2-elem1;}

            \$('#lista_provincia').change(function()
            {


                \$('#meses').val('');
                \$( \"#datepicker\" ).datepicker( \"setDate\", new Date() );

                var data = {};
                data['id_provincia'] = \$(this).val();

                \$.ajax({
                    url: '";
        // line 156
        echo $this->env->getExtension('routing')->getPath("registro_entidades");
        echo "',
                    type: 'GET',
                    data: data,
                    success: function(html) {
                        \$('#lista_Entidad').html(html);
                        \$('#lista_TipoServicio').html(html);

                    }
                });



            });
            //Para Mostrar el calendario con formato de fecha 'dd-mm-yy' y en español
            \$( \"#datepicker\" ).datepicker({ dateFormat: 'dd-mm-yy',
                regional: 'es'
            });
            \$( \"#datepicker\" ).datepicker( \"setDate\", new Date() );

            //Implementacion del evento onclic del boton Listar del formulario
            \$('#btnlistar').click(function() {
                    var data = {};
                    data['id_provincia'] = (\$(\"#lista_provincia\").val()==-1)? null:\$(\"#lista_provincia\").val() ;
                    data['id_entidad'] = (\$(\"#lista_entidad\").val()==-1)? null:\$(\"#lista_entidad\").val() ;
                    data['periodo'] = \$(\"#Years\").val() ;
                    data['mostrar_entidad'] = \$(\"#checkEntidad\").prop('checked') ;
                    data['mostrar_servicio'] = \$(\"#checkServicio\").prop('checked') ;
                    data['pdf'] = false;
                     \$('#chartdiv').html('');

                      //alert( data['mostrar_entidad']);

                    if (\$('#nombre_reporte').val() == \"plan_mensual\") {
                        \$.ajax({

                            url: '";
        // line 191
        echo $this->env->getExtension('routing')->getPath("reporte_plan_mensual");
        echo "',
                            type: 'GET',
                            data: data,
                            success: function (html) {
                                \$('#resultado').html(html);
                                if (html.indexOf('No hay datos a mostrar')!=-1){
                                    \$('#btnPDF').attr('disabled',true);
                                    \$('#btnGraph').attr('disabled',true);

                                }
                                else {
                                    \$('#btnPDF').attr('disabled',false);
                                    \$('#btnGraph').attr('disabled',false);
                                }

                            }
                        });
                        }


                    if (\$('#nombre_reporte').val() == \"comportamiento_diario\") {

                        if (\$('#meses').val()!=''){

                            data['mes'] = \$(\"#meses\").val() ;
                             \$.ajax({

                                url: '";
        // line 218
        echo $this->env->getExtension('routing')->getPath("reporte_comportamiento_diario");
        echo "',
                                type: 'GET',
                                data: data,
                                success: function (html) {
                                    \$('#resultado').html(html);
                                    if (html.indexOf('No hay datos a mostrar')!=-1){
                                        \$('#btnPDF').attr('disabled',true);
                                        \$('#btnGraph').attr('disabled',true);

                                    }
                                    else {
                                        \$('#btnPDF').attr('disabled',false);
                                        \$('#btnGraph').attr('disabled',false);
                                    }

                                }
                            });
                        }
                        else {  alert ('Debe seleccionar un mes ');}
                    }

                    if (\$('#nombre_reporte').val() == \"parte_diario\") {

                        \$('#btnGraph').hide();
                        data['fecha'] = \$(\"#datepicker\").val() ;
                        \$.ajax({

                            url: '";
        // line 245
        echo $this->env->getExtension('routing')->getPath("reporte_parte_diario");
        echo "',
                            type: 'GET',
                            data: data,
                            success: function (html) {
                                \$('#resultado').html(html);
                                if (html.indexOf('No hay datos a mostrar')!=-1){
                                    \$('#btnPDF').attr('disabled',true);

                                }
                                else {
                                    \$('#btnPDF').attr('disabled',false);
                                }

                            }
                        });
                    }

                        if (\$('#nombre_reporte').val() == \"parte_consumo\") {

                            \$('#btnGraph').hide();
                            data['fecha'] = \$(\"#datepicker\").val() ;
                            \$.ajax({

                                url: '";
        // line 268
        echo $this->env->getExtension('routing')->getPath("reporte_parte_consumo");
        echo "',
                                type: 'GET',
                                data: data,
                                success: function (html) {
                                    \$('#resultado').html(html);
                                    if (html.indexOf('No hay datos a mostrar')!=-1){
                                        \$('#btnPDF').attr('disabled',true);

                                    }
                                    else {
                                        \$('#btnPDF').attr('disabled',false);
                                    }

                                }
                            });
                        }

                    if (\$('#nombre_reporte').val() == \"consumo_acumulado\") {

                        if (\$('#meses').val()!=''){

                            \$('#btnGraph').hide();
                            data['mes'] = \$(\"#meses\").val() ;
                            \$.ajax({

                                url: '";
        // line 293
        echo $this->env->getExtension('routing')->getPath("reporte_consumo_acumulado");
        echo "',
                                type: 'GET',
                                data: data,
                                success: function (html) {
                                    \$('#resultado').html(html);
                                    if (html.indexOf('No hay datos a mostrar')!=-1){
                                        \$('#btnPDF').attr('disabled',true);

                                    }
                                    else {
                                        \$('#btnPDF').attr('disabled',false);
                                    }

                                }
                            });
                        }
                        else {  alert ('Debe seleccionar un mes ');}

                    }
                    if (\$('#nombre_reporte').val() == \"consumo_acumulado_hp\") {
                        if (\$('#meses').val()!=''){

                            \$('#btnGraph').hide();
                            data['mes'] = \$(\"#meses\").val() ;
                            \$.ajax({

                                url: '";
        // line 319
        echo $this->env->getExtension('routing')->getPath("reporte_consumo_acumulado_hp");
        echo "',
                                type: 'GET',
                                data: data,
                                success: function (html) {
                                    \$('#resultado').html(html);
                                    if (html.indexOf('No hay datos a mostrar')!=-1){
                                    \$('#btnPDF').attr('disabled',true);

                                    }
                                    else {
                                        \$('#btnPDF').attr('disabled',false);
                                    }

                                }
                            });
                        }
                        else {  alert ('Debe seleccionar un mes ');}
                    }

        }

            );

            \$('#btnPDF').click(function() {

                window.open('";
        // line 344
        echo $this->env->getExtension('routing')->getPath("reporte_pdf");
        echo "', '_blank');


            });

           /* var ticks = ['a', 'b', 'c', 'd'];
            var line1 = [14, 32, 41, 44];
            var line2 = [15, 67, 22, 29];
            \$.jqplot('chartdiv', [line1,line2], {
                title: 'Chart with Point Labels',
                seriesDefaults: {
                    showMarker: true,
                    pointLabels: {show: true}
                },
                axes: {
                    xaxis: {
                        label: \"X Axis\",
                        renderer: \$.jqplot.CategoryAxisRenderer,
                        ticks: ticks
                    }
                },
                legend: {
                    show: true,
                    location: 'se'
                    //placement: 'outside'
                    //marginLeft: \"300px\"
                }

            });*/

            \$('#btnGraph').click(function() {

                \$('#chartdiv').html('');

                if (\$('#nombre_reporte').val() == \"plan_mensual\"){

                    //alert('gggggg');

                    \$.ajax({

                            url: '";
        // line 384
        echo $this->env->getExtension('routing')->getPath("reporte_grafico");
        echo "',
                            type: 'GET',
                            dataType: 'json',
                            success: function (data) {


                                var Series = [];
                                var labels = [];
                                var TempArray = [];
                                var HigherValues = [];

                                var ticks = ['Enero','Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

                                \$.each(data, function(index, element) {

                                    var line = [];
                                    if (\$(\"#checkServicio\").prop('checked')) {
                                        labels.push(element.nombreServicio);
                                    }
                                        else if (!\$(\"#checkServicio\").prop('checked') && (\$(\"#checkEntidad\").prop('checked'))){
                                            labels.push(element.nombreEntidad);
                                        }
                                            else {
                                                labels.push(element.descripcion);
                                            }
                                    line.push(element.planEnero);
                                    line.push(element.planFebrero);
                                    line.push(element.planMarzo);
                                    line.push(element.planAbril);
                                    line.push(element.planMayo);
                                    line.push(element.planJunio);
                                    line.push(element.planJulio);
                                    line.push(element.planAgosto);
                                    line.push(element.planSeptiembre);
                                    line.push(element.planOctubre);
                                    line.push(element.planNoviembre);
                                    line.push(element.planDiciembre);
                                    Series.push(line);
                                    //buscando el mayor valor del arreglo para configurar la escala
                                    TempArray = line;
                                    TempArray.sort(deMayorAMenor);
                                    HigherValues.push(TempArray[0]);


                                });

                                HigherValues.sort(deMayorAMenor);



                                \$.jqplot('chartdiv', Series, {
                                    title: 'Distribución de Planes',
                                    seriesDefaults: {
                                        //renderer:\$.jqplot.BarRenderer,
                                        showMarker: true,
                                        pointLabels: {show: true}
                                    },
                                    axes: {
                                        xaxis: {
                                            label: \"Meses\",
                                            renderer: \$.jqplot.CategoryAxisRenderer,
                                            ticks: ticks
                                        },
                                        yaxis: {
                                            min: 0,
                                            max: HigherValues[0]

                                        }
                                    },
                                    legend: {
                                        //renderer: jQuery.jqplot.EnhancedLegendRenderer,
                                        show: true,
                                        labels: labels,
                                        showLabels: true,
                                        showSwatch: true,
                                        //border:2,
                                        location: 's',
                                        //background:'#FF9900',
                                        placement: 'outsideGrid',
                                        marginTop: \"20px\"
                                    }

                                });

                            }
                        });
                }

                 if (\$('#nombre_reporte').val() == \"comportamiento_diario\"){
                    \$.ajax({

                        url: '";
        // line 475
        echo $this->env->getExtension('routing')->getPath("reporte_grafico");
        echo "',
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {


                            var Series = [];
                            var labels = [];
                            var line = [];
                            var ticks = [];
                            var TempArray = [];

                            /*var ticks = ['1','2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12',
                                         '13','14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24',
                                         '25','26', '27', '28', '29', '30', '31'];*/

                            \$.each(data, function(index, element) {

                                line.push(element.Consumo);
                                ticks.push(element.fecha+'--'+element.DiaSemana)
                                //labels.push(element.Consumo);



                            });

                            Series.push(line);



                            //buscando el mayor valor del arreglo para configurar la escala
                            TempArray = line;
                            TempArray.sort(deMayorAMenor);
                            //alert(TempArray);
                            MaxValue = TempArray[0];

                            \$.jqplot('chartdiv', Series, {
                                title: 'Consumo por dias',
                                seriesDefaults: {
                                    renderer:\$.jqplot.BarRenderer,
                                    rendererOptions: {
                                        //barPadding: 4,
                                        //barMargin: 5,
                                        barWidth: 10
                                    },
                                    showMarker: true,
                                    pointLabels: {show: true}
                                },
                                axes: {
                                    xaxis: {
                                        label: \"Dias del Mes\",
                                        renderer: \$.jqplot.CategoryAxisRenderer,
                                        labelRenderer: \$.jqplot.CanvasAxisLabelRenderer,
                                        tickRenderer: \$.jqplot.CanvasAxisTickRenderer,
                                        tickOptions: {
                                            angle: -90
                                        },
                                        ticks: ticks
                                    },
                                    yaxis: {
                                        min: 0,
                                        max: MaxValue

                                    }
                                },
                                legend: {
                                    //renderer: jQuery.jqplot.EnhancedLegendRenderer,
                                    show: false
                                    //labels: labels,
                                    //showLabels: true,
                                    //showSwatch: true,
                                    //border:2,
                                    //location: 's',
                                    //background:'#FF9900',
                                    //placement: 'outsideGrid',
                                    //marginTop: \"20px\"
                                }

                            });

                        }
                    });
                }

            });

            //\$.jqplot('chartdiv',  [[[\"Enero\", 2],['Febrero',5.12],['Marzo',13.1],['Abril',33.6],['Mayo',85.9],['Junio',219.9]]]);
        }


    </script>
";
    }

    public function getTemplateName()
    {
        return "sisconeeAppBundle:Reports:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  577 => 475,  483 => 384,  440 => 344,  412 => 319,  383 => 293,  355 => 268,  329 => 245,  299 => 218,  269 => 191,  231 => 156,  209 => 137,  205 => 136,  201 => 135,  196 => 134,  193 => 133,  156 => 99,  143 => 88,  137 => 86,  135 => 85,  131 => 83,  115 => 69,  112 => 68,  106 => 64,  86 => 46,  84 => 45,  74 => 38,  68 => 35,  48 => 17,  45 => 16,  38 => 12,  33 => 11,  30 => 10,);
    }
}
