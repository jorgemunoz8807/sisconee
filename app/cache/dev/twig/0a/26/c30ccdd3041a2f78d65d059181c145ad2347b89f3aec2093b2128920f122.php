<?php

/* sisconeeAppBundle:Reports:listado_parte_diario.html.twig */
class __TwigTemplate_0a26c30ccdd3041a2f78d65d059181c145ad2347b89f3aec2093b2128920f122 extends Twig_Template
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
        if ((twig_length_filter($this->env, (isset($context["Listado"]) ? $context["Listado"] : $this->getContext($context, "Listado"))) > 0)) {
            // line 2
            echo "        ";
            $context["NombreProvincia"] = "";
            // line 3
            echo "        ";
            $context["NombreMunicipio"] = "";
            // line 4
            echo "        ";
            $context["TotalPlanMes"] = 0;
            // line 5
            echo "        ";
            $context["TotalPlanDia"] = 0;
            // line 6
            echo "        ";
            $context["TotalConsumoDia"] = 0;
            // line 7
            echo "        ";
            $context["TotalConsumoAcumulado"] = 0;
            // line 8
            echo "
        <h1>Organismo:";
            // line 9
            echo twig_escape_filter($this->env, (isset($context["organismo"]) ? $context["organismo"] : $this->getContext($context, "organismo")), "html", null, true);
            echo "</h1>
        <br>
        <p>Parte Diario OLPP<p>
        <p>Consumo Energ&iacute;a El&eacute;ctrica (KWh)<p>
        <p>Acumulado hasta: <strong> ";
            // line 13
            echo twig_escape_filter($this->env, (isset($context["fecha"]) ? $context["fecha"] : $this->getContext($context, "fecha")), "html", null, true);
            echo "</strong><p>
        <br>
        <table class=\"table table-bordered table-hover table-striped\">

            ";
            // line 17
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["Listado"]) ? $context["Listado"] : $this->getContext($context, "Listado")));
            foreach ($context['_seq'] as $context["_key"] => $context["e"]) {
                // line 18
                echo "
                ";
                // line 19
                if (((isset($context["NombreProvincia"]) ? $context["NombreProvincia"] : $this->getContext($context, "NombreProvincia")) != $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "NombProv", array(), "array"))) {
                    // line 20
                    echo "                     <tr>
                        <th colspan=\"16\">";
                    // line 21
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "NombProv", array(), "array"), "html", null, true);
                    echo "</th>
                    </tr>
                ";
                }
                // line 24
                echo "                ";
                if (((isset($context["NombreMunicipio"]) ? $context["NombreMunicipio"] : $this->getContext($context, "NombreMunicipio")) != $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "NombMunicipio", array(), "array"))) {
                    // line 25
                    echo "                    <tr>
                        <th colspan=\"16\">Municipio: ";
                    // line 26
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "NombMunicipio", array(), "array"), "html", null, true);
                    echo "</th>
                    </tr>
                    <tr>
                        <th>C&oacute;digo CEE</th>
                        <th>CRF</th>
                        <th>Nombre del Servicio</th>
                        <th>Plan Mes</th>
                        <th>Plan D&iacute;a</th>
                        <th>Consumo D&iacute;a</th>
                        <th>Consumo Acumulado</th>
                        <th>Porciento Diario</th>
                        <th>Porciento Acumulado</th>
                    </tr>
                ";
                }
                // line 40
                echo "
                <tr>
                    <td>";
                // line 42
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "codcliente_EE", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 43
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "codRF", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 44
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "NombreServicio", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 45
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "PlanMensual", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 46
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 47
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "consumo", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 48
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "ConsumoAcumulado", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 49
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "PorcientoDiario", array(), "array"), 2), "html", null, true);
                echo "</td>
                    <td>";
                // line 50
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "PorcientoAcumulado", array(), "array"), 2), "html", null, true);
                echo "</td>
                    ";
                // line 51
                $context["TotalPlanMes"] = ((isset($context["TotalPlanMes"]) ? $context["TotalPlanMes"] : $this->getContext($context, "TotalPlanMes")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "PlanMensual", array(), "array"));
                // line 52
                echo "                    ";
                $context["TotalPlanDia"] = ((isset($context["TotalPlanDia"]) ? $context["TotalPlanDia"] : $this->getContext($context, "TotalPlanDia")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array"));
                // line 53
                echo "                    ";
                $context["TotalConsumoDia"] = ((isset($context["TotalConsumoDia"]) ? $context["TotalConsumoDia"] : $this->getContext($context, "TotalConsumoDia")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "consumo", array(), "array"));
                // line 54
                echo "                    ";
                $context["TotalConsumoAcumulado"] = ((isset($context["TotalConsumoAcumulado"]) ? $context["TotalConsumoAcumulado"] : $this->getContext($context, "TotalConsumoAcumulado")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "ConsumoAcumulado", array(), "array"));
                // line 55
                echo "                    ";
                $context["NombreMunicipio"] = $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "NombMunicipio", array(), "array");
                // line 56
                echo "                    ";
                $context["NombreProvincia"] = $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "NombProv", array(), "array");
                // line 57
                echo "
                </tr>


            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['e'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 62
            echo "
            ";
            // line 63
            if ((twig_length_filter($this->env, (isset($context["Listado"]) ? $context["Listado"] : $this->getContext($context, "Listado"))) > 0)) {
                // line 64
                echo "                <tr>
                    <th colspan=\"3\" align=\"right\">Totales </th>
                    <td>";
                // line 66
                echo twig_escape_filter($this->env, (isset($context["TotalPlanMes"]) ? $context["TotalPlanMes"] : $this->getContext($context, "TotalPlanMes")), "html", null, true);
                echo "</td>
                    <td>";
                // line 67
                echo twig_escape_filter($this->env, (isset($context["TotalPlanDia"]) ? $context["TotalPlanDia"] : $this->getContext($context, "TotalPlanDia")), "html", null, true);
                echo "</td>
                    <td>";
                // line 68
                echo twig_escape_filter($this->env, (isset($context["TotalConsumoDia"]) ? $context["TotalConsumoDia"] : $this->getContext($context, "TotalConsumoDia")), "html", null, true);
                echo "</td>
                    <td>";
                // line 69
                echo twig_escape_filter($this->env, (isset($context["TotalConsumoAcumulado"]) ? $context["TotalConsumoAcumulado"] : $this->getContext($context, "TotalConsumoAcumulado")), "html", null, true);
                echo "</td>
                    <td>";
                // line 70
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, ((isset($context["TotalConsumoDia"]) ? $context["TotalConsumoDia"] : $this->getContext($context, "TotalConsumoDia")) / (isset($context["TotalPlanDia"]) ? $context["TotalPlanDia"] : $this->getContext($context, "TotalPlanDia"))), 2), "html", null, true);
                echo "</td>
                    <td>";
                // line 71
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, ((isset($context["TotalConsumoAcumulado"]) ? $context["TotalConsumoAcumulado"] : $this->getContext($context, "TotalConsumoAcumulado")) / (isset($context["TotalPlanMes"]) ? $context["TotalPlanMes"] : $this->getContext($context, "TotalPlanMes"))), 2), "html", null, true);
                echo "</td>

                </tr>
            ";
            }
            // line 75
            echo "        </table>
";
        } else {
            // line 77
            echo "
    <h1>No hay datos a mostrar</h1>


";
        }
    }

    public function getTemplateName()
    {
        return "sisconeeAppBundle:Reports:listado_parte_diario.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  204 => 77,  200 => 75,  193 => 71,  189 => 70,  185 => 69,  181 => 68,  177 => 67,  173 => 66,  169 => 64,  167 => 63,  164 => 62,  154 => 57,  151 => 56,  148 => 55,  145 => 54,  142 => 53,  139 => 52,  137 => 51,  133 => 50,  129 => 49,  125 => 48,  121 => 47,  117 => 46,  113 => 45,  109 => 44,  105 => 43,  101 => 42,  97 => 40,  80 => 26,  77 => 25,  74 => 24,  68 => 21,  65 => 20,  63 => 19,  60 => 18,  56 => 17,  49 => 13,  42 => 9,  39 => 8,  36 => 7,  33 => 6,  30 => 5,  27 => 4,  24 => 3,  21 => 2,  19 => 1,);
    }
}
