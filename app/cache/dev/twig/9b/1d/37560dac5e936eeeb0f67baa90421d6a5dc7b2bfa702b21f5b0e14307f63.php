<?php

/* sisconeeAppBundle:Registro:listado_registros_diarios.html.twig */
class __TwigTemplate_9b1d37560dac5e936eeeb0f67baa90421d6a5dc7b2bfa702b21f5b0e14307f63 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<br>
<br>
";
        // line 3
        if ((isset($context["listado_registros"]) ? $context["listado_registros"] : $this->getContext($context, "listado_registros"))) {
            // line 4
            echo "
    ";
            // line 5
            $this->env->loadTemplate("sisconeeAdministracionBundle::flashmessages.html.twig")->display($context);
            // line 6
            echo "
    <div><span>Consumo Acumulado General del Servicio: </span><span id=\"acumulado_servicio\" class=\"label label-info\">";
            // line 7
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["consumoAcumulado"]) ? $context["consumoAcumulado"] : $this->getContext($context, "consumoAcumulado")), 0, array(), "array"), "cantidad", array(), "array"), "html", null, true);
            echo "</span></div>

    ";
            // line 9
            if ((isset($context["hasPlanHorarioPico"]) ? $context["hasPlanHorarioPico"] : $this->getContext($context, "hasPlanHorarioPico"))) {
                // line 10
                echo "    <div><span>Consumo Acumulado para el Horario Pico del Servicio: </span><span id=\"acumulado_hp_servicio\" class=\"label label-info\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["consumoAcumulado"]) ? $context["consumoAcumulado"] : $this->getContext($context, "consumoAcumulado")), 0, array(), "array"), "cantidadHP", array(), "array"), "html", null, true);
                echo "</span></div>
   ";
            }
            // line 12
            echo "
<h1>Listado de los registros de plan y consumo diario</h1>
<TABLE class=\"table table-striped table-bordered table-hover\">
    <TR>
        <TH>Fecha</TH>
        <TH>Plan Diario</TH>
        <TH>Consumo</TH>
        ";
            // line 19
            if ((isset($context["hasPlanHorarioPico"]) ? $context["hasPlanHorarioPico"] : $this->getContext($context, "hasPlanHorarioPico"))) {
                // line 20
                echo "        <TH>Plan de Horario Pico</TH>
        <TH>Consumo de Horario Pico</TH>
        ";
            }
            // line 23
            echo "        <TH>Acciones</TH>
    </TR>
            ";
            // line 25
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["listado_registros"]) ? $context["listado_registros"] : $this->getContext($context, "listado_registros")));
            foreach ($context['_seq'] as $context["_key"] => $context["r"]) {
                // line 26
                echo "                <TR>
                <TD>";
                // line 27
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["r"]) ? $context["r"] : $this->getContext($context, "r")), "getFecha"), "d/m/Y"), "html", null, true);
                echo "</TD>
                <TD>";
                // line 28
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["r"]) ? $context["r"] : $this->getContext($context, "r")), "getPlan"), "html", null, true);
                echo "</TD>
                <TD ";
                // line 29
                if (($this->getAttribute((isset($context["r"]) ? $context["r"] : $this->getContext($context, "r")), "getConsumo") > $this->getAttribute((isset($context["r"]) ? $context["r"] : $this->getContext($context, "r")), "getPlan"))) {
                    echo " class=\"texto_alerta\" ";
                }
                echo " > ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["r"]) ? $context["r"] : $this->getContext($context, "r")), "getConsumo"), "html", null, true);
                echo " </TD>
                ";
                // line 30
                if ((isset($context["hasPlanHorarioPico"]) ? $context["hasPlanHorarioPico"] : $this->getContext($context, "hasPlanHorarioPico"))) {
                    // line 31
                    echo "                <TD>";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["r"]) ? $context["r"] : $this->getContext($context, "r")), "getPlanHorariopico"), "html", null, true);
                    echo "</TD>
                <TD ";
                    // line 32
                    if (($this->getAttribute((isset($context["r"]) ? $context["r"] : $this->getContext($context, "r")), "getConsumoHorariopico") > $this->getAttribute((isset($context["r"]) ? $context["r"] : $this->getContext($context, "r")), "getPlanHorariopico"))) {
                        echo " class=\"texto_alerta\" ";
                    }
                    echo " > ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["r"]) ? $context["r"] : $this->getContext($context, "r")), "getConsumoHorariopico"), "html", null, true);
                    echo " </TD>
                ";
                }
                // line 34
                echo "                <TD>";
                if (((twig_date_converter($this->env, $this->getAttribute((isset($context["r"]) ? $context["r"] : $this->getContext($context, "r")), "getFecha")) >= twig_date_converter($this->env, (isset($context["diasPermitidos"]) ? $context["diasPermitidos"] : $this->getContext($context, "diasPermitidos")))) && (twig_date_converter($this->env, $this->getAttribute((isset($context["r"]) ? $context["r"] : $this->getContext($context, "r")), "getFecha")) <= twig_date_converter($this->env)))) {
                    echo "<a id=\"editar\" onclick=\" \$('#dialog').data('planDia',";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["r"]) ? $context["r"] : $this->getContext($context, "r")), "getPlan"), "html", null, true);
                    echo ");
                    \$('#dialog').data('planDiaHorarioPico',";
                    // line 35
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["r"]) ? $context["r"] : $this->getContext($context, "r")), "getPlanHorariopico"), "html", null, true);
                    echo ");
                    \$('#dialog').data('consumoDia',";
                    // line 36
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["r"]) ? $context["r"] : $this->getContext($context, "r")), "getConsumo"), "html", null, true);
                    echo ");
                    \$('#dialog').data('consumoDiaHorarioPico',";
                    // line 37
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["r"]) ? $context["r"] : $this->getContext($context, "r")), "getConsumoHorariopico"), "html", null, true);
                    echo ");
                    \$('#dialog').data('idRegistro',";
                    // line 38
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["r"]) ? $context["r"] : $this->getContext($context, "r")), "getId"), "html", null, true);
                    echo ");

                    \$('#dialog').dialog('open'); \" ";
                    // line 40
                    echo "><span class=\"glyphicon glyphicon-pencil\"></span>Editar</a>";
                }
                // line 41
                echo "                </TD>
                </TR>

            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['r'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 45
            echo "
</TABLE>
";
        } else {
            // line 48
            echo "    <p>No existe planificaci&oacute;n para los datos seleccionados</p>
";
        }
        // line 50
        echo "









";
    }

    public function getTemplateName()
    {
        return "sisconeeAppBundle:Registro:listado_registros_diarios.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  150 => 50,  146 => 48,  141 => 45,  132 => 41,  129 => 40,  124 => 38,  120 => 37,  116 => 36,  112 => 35,  105 => 34,  96 => 32,  91 => 31,  89 => 30,  81 => 29,  77 => 28,  73 => 27,  70 => 26,  66 => 25,  62 => 23,  57 => 20,  55 => 19,  46 => 12,  40 => 10,  38 => 9,  33 => 7,  30 => 6,  28 => 5,  25 => 4,  23 => 3,  19 => 1,);
    }
}
