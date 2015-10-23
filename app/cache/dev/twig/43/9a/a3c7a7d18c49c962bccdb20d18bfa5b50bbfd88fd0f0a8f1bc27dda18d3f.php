<?php

/* sisconeeAppBundle:Reports:listado_comportamiento_diarioPDF.html.twig */
class __TwigTemplate_439aa3c7a7d18c49c962bccdb20d18bfa5b50bbfd88fd0f0a8f1bc27dda18d3f extends Twig_Template
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
        echo "
";
        // line 2
        if ((twig_length_filter($this->env, (isset($context["Listado"]) ? $context["Listado"] : $this->getContext($context, "Listado"))) > 0)) {
            // line 3
            echo "
        ";
            // line 4
            $context["NombreProvincia"] = "";
            // line 5
            echo "
        ";
            // line 6
            $context["TotalPlanMes"] = 0;
            // line 7
            echo "        ";
            $context["ConsumoAcumulado"] = 0;
            // line 8
            echo "        ";
            $context["PromedioDiarioConsumo"] = 0;
            // line 9
            echo "        ";
            $context["TotalPorConsumir"] = 0;
            // line 10
            echo "        ";
            $context["TotalPorConsumirPorciento"] = 0;
            // line 11
            echo "        ";
            $context["CantidadDias"] = 0;
            // line 12
            echo "
        <h1>Organismo:";
            // line 13
            echo twig_escape_filter($this->env, (isset($context["organismo"]) ? $context["organismo"] : $this->getContext($context, "organismo")), "html", null, true);
            echo "</h1>
        <br>
        <br>
        <table class=\"table table-bordered table-hover table-striped\" style=\"width: 30% ; border: 1px solid #000000\">

            ";
            // line 18
            if (((isset($context["provinciaSeleccionada"]) ? $context["provinciaSeleccionada"] : $this->getContext($context, "provinciaSeleccionada")) != "")) {
                // line 19
                echo "                    ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["Listado"]) ? $context["Listado"] : $this->getContext($context, "Listado")));
                foreach ($context['_seq'] as $context["_key"] => $context["e"]) {
                    // line 20
                    echo "                        ";
                    if (((isset($context["NombreProvincia"]) ? $context["NombreProvincia"] : $this->getContext($context, "NombreProvincia")) != $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "descripcion", array(), "array"))) {
                        // line 21
                        echo "                            <th colspan=\"3\" style=\"border: 1px solid #000000\">
                                ";
                        // line 22
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "descripcion", array(), "array"), "html", null, true);
                        echo " </th>
                            <tr style=\"border: 1px solid #000000\">
                                <th style=\"border: 1px solid #000000\">Fecha</th>
                                <th style=\"border: 1px solid #000000\">Dia de la semana</th>
                                <th style=\"border: 1px solid #000000\">Consumo</th>

                            </tr>
                        ";
                    }
                    // line 30
                    echo "                        <tr style=\"border: 1px solid #000000\">
                            <td style=\"border: 1px solid #000000\">";
                    // line 31
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "fecha", array(), "array"), "html", null, true);
                    echo "</td>
                            <td style=\"border: 1px solid #000000\">";
                    // line 32
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "DiaSemana", array(), "array"), "html", null, true);
                    echo "</td>
                            <td style=\"border: 1px solid #000000\">";
                    // line 33
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "Consumo", array(), "array"), "html", null, true);
                    echo "</td>

                            ";
                    // line 35
                    $context["ConsumoAcumulado"] = ((isset($context["ConsumoAcumulado"]) ? $context["ConsumoAcumulado"] : $this->getContext($context, "ConsumoAcumulado")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "Consumo", array(), "array"));
                    // line 36
                    echo "                            ";
                    $context["TotalPlanMes"] = ((isset($context["TotalPlanMes"]) ? $context["TotalPlanMes"] : $this->getContext($context, "TotalPlanMes")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "Plan", array(), "array"));
                    // line 37
                    echo "                            ";
                    $context["CantidadDias"] = ((isset($context["CantidadDias"]) ? $context["CantidadDias"] : $this->getContext($context, "CantidadDias")) + 1);
                    // line 38
                    echo "
                        </tr>
                        ";
                    // line 40
                    $context["NombreProvincia"] = $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "descripcion", array(), "array");
                    // line 41
                    echo "                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['e'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 42
                echo "            ";
            } else {
                // line 43
                echo "
                             <th colspan=\"3\" style=\"border: 1px solid #000000\">
                             Todas las provincias </th>
                            <tr style=\"border: 1px solid #000000\">
                                <th style=\"border: 1px solid #000000\">Fecha</th>
                                <th style=\"border: 1px solid #000000\">Dia de la semana</th>
                                <th style=\"border: 1px solid #000000\">Consumo</th>

                            </tr>
                    ";
                // line 52
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["Listado"]) ? $context["Listado"] : $this->getContext($context, "Listado")));
                foreach ($context['_seq'] as $context["_key"] => $context["e"]) {
                    // line 53
                    echo "                         <tr style=\"border: 1px solid #000000\">
                             <td style=\"border: 1px solid #000000\">";
                    // line 54
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "fecha", array(), "array"), "html", null, true);
                    echo "</td>
                             <td style=\"border: 1px solid #000000\">";
                    // line 55
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "DiaSemana", array(), "array"), "html", null, true);
                    echo "</td>
                             <td style=\"border: 1px solid #000000\">";
                    // line 56
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "Consumo", array(), "array"), "html", null, true);
                    echo "</td>

                             ";
                    // line 58
                    $context["ConsumoAcumulado"] = ((isset($context["ConsumoAcumulado"]) ? $context["ConsumoAcumulado"] : $this->getContext($context, "ConsumoAcumulado")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "Consumo", array(), "array"));
                    // line 59
                    echo "                             ";
                    $context["TotalPlanMes"] = ((isset($context["TotalPlanMes"]) ? $context["TotalPlanMes"] : $this->getContext($context, "TotalPlanMes")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "Plan", array(), "array"));
                    // line 60
                    echo "                             ";
                    $context["CantidadDias"] = ((isset($context["CantidadDias"]) ? $context["CantidadDias"] : $this->getContext($context, "CantidadDias")) + 1);
                    // line 61
                    echo "
                          </tr>

                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['e'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 65
                echo "            ";
            }
            // line 66
            echo "        </table>
        <table class=\"table table-bordered table-hover table-striped\" style=\"width: 20%\">
            <tr>
                <th>Plan para el Mes:</th>
                <td>";
            // line 70
            echo twig_escape_filter($this->env, (isset($context["TotalPlanMes"]) ? $context["TotalPlanMes"] : $this->getContext($context, "TotalPlanMes")), "html", null, true);
            echo "</td>
            </tr>
            <tr>
                <th>Consumo Acumulado:</th>
                <td>";
            // line 74
            echo twig_escape_filter($this->env, (isset($context["ConsumoAcumulado"]) ? $context["ConsumoAcumulado"] : $this->getContext($context, "ConsumoAcumulado")), "html", null, true);
            echo "</td>
            </tr>
            <tr>
                <th>Porciento de consumo:</th>
                <td>";
            // line 78
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (((isset($context["ConsumoAcumulado"]) ? $context["ConsumoAcumulado"] : $this->getContext($context, "ConsumoAcumulado")) * 100) / (isset($context["TotalPlanMes"]) ? $context["TotalPlanMes"] : $this->getContext($context, "TotalPlanMes"))), 1), "html", null, true);
            echo "</td>
            </tr>
            <tr>
                <th>Resta por consumir:</th>
                <td>";
            // line 82
            echo twig_escape_filter($this->env, ((isset($context["TotalPlanMes"]) ? $context["TotalPlanMes"] : $this->getContext($context, "TotalPlanMes")) - (isset($context["ConsumoAcumulado"]) ? $context["ConsumoAcumulado"] : $this->getContext($context, "ConsumoAcumulado"))), "html", null, true);
            echo "</td>
            </tr>
            <tr>
                <th>Promedio diario de consumo:</th>
                <td>";
            // line 86
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, ((isset($context["ConsumoAcumulado"]) ? $context["ConsumoAcumulado"] : $this->getContext($context, "ConsumoAcumulado")) / (isset($context["CantidadDias"]) ? $context["CantidadDias"] : $this->getContext($context, "CantidadDias"))), 2), "html", null, true);
            echo "</td>
            </tr>
        </table>
";
        } else {
            // line 90
            echo "
    <h1>No hay datos a mostrar</h1>


";
        }
    }

    public function getTemplateName()
    {
        return "sisconeeAppBundle:Reports:listado_comportamiento_diarioPDF.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  215 => 90,  208 => 86,  201 => 82,  194 => 78,  187 => 74,  180 => 70,  174 => 66,  171 => 65,  162 => 61,  159 => 60,  156 => 59,  154 => 58,  149 => 56,  145 => 55,  141 => 54,  138 => 53,  134 => 52,  123 => 43,  120 => 42,  114 => 41,  112 => 40,  108 => 38,  105 => 37,  102 => 36,  100 => 35,  95 => 33,  91 => 32,  87 => 31,  84 => 30,  73 => 22,  70 => 21,  67 => 20,  62 => 19,  60 => 18,  52 => 13,  49 => 12,  46 => 11,  43 => 10,  40 => 9,  37 => 8,  34 => 7,  32 => 6,  29 => 5,  27 => 4,  24 => 3,  22 => 2,  19 => 1,);
    }
}
