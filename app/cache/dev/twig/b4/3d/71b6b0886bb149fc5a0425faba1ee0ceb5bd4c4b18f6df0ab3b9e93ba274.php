<?php

/* sisconeeAppBundle:Reports:listado_plan_mensual_provincia.html.twig */
class __TwigTemplate_b43d71b6b0886bb149fc5a0425faba1ee0ceb5bd4c4b18f6df0ab3b9e93ba274 extends Twig_Template
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
            $context["TotalPlanEnero"] = 0;
            // line 4
            echo "        ";
            $context["TotalPlanFebrero"] = 0;
            // line 5
            echo "        ";
            $context["TotalPlanMarzo"] = 0;
            // line 6
            echo "        ";
            $context["TotalPlanAbril"] = 0;
            // line 7
            echo "        ";
            $context["TotalPlanMayo"] = 0;
            // line 8
            echo "        ";
            $context["TotalPlanJunio"] = 0;
            // line 9
            echo "        ";
            $context["TotalPlanJulio"] = 0;
            // line 10
            echo "        ";
            $context["TotalPlanAgosto"] = 0;
            // line 11
            echo "        ";
            $context["TotalPlanSeptiembre"] = 0;
            // line 12
            echo "        ";
            $context["TotalPlanOctubre"] = 0;
            // line 13
            echo "        ";
            $context["TotalPlanNoviembre"] = 0;
            // line 14
            echo "        ";
            $context["TotalPlanDiciembre"] = 0;
            // line 15
            echo "
        <h1>Organismo:";
            // line 16
            echo twig_escape_filter($this->env, (isset($context["organismo"]) ? $context["organismo"] : $this->getContext($context, "organismo")), "html", null, true);
            echo "</h1>
        <br>
        <h1>Plan de Energ&iacute;a El&eacute;ctrica  ";
            // line 18
            echo twig_escape_filter($this->env, (isset($context["periodo"]) ? $context["periodo"] : $this->getContext($context, "periodo")), "html", null, true);
            echo " (KWh)</h1>
        <br>
        <br>
        <table class=\"table table-bordered table-hover table-striped\">
            ";
            // line 22
            if ((twig_length_filter($this->env, (isset($context["Listado"]) ? $context["Listado"] : $this->getContext($context, "Listado"))) > 0)) {
                // line 23
                echo "            <tr>
                <th>Provincia</th>
                <th>Ene</th>
                <th>Feb</th>
                <th>Mar</th>
                <th>Abr</th>
                <th>May</th>
                <th>Jun</th>
                <th>Jul</th>
                <th>Ago</th>
                <th>Sep</th>
                <th>Oct</th>
                <th>Nov</th>
                <th>Dic</th>
                <th>Total</th>
            </tr>
            ";
            }
            // line 40
            echo "
            ";
            // line 41
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["Listado"]) ? $context["Listado"] : $this->getContext($context, "Listado")));
            foreach ($context['_seq'] as $context["_key"] => $context["e"]) {
                // line 42
                echo "
                  <tr>
                    <td>";
                // line 44
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "descripcion", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 45
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planEnero", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 46
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planFebrero", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 47
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planMarzo", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 48
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planAbril", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 49
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planMayo", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 50
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planJunio", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 51
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planJulio", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 52
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planAgosto", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 53
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planSeptiembre", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 54
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planOctubre", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 55
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planNoviembre", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 56
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planDiciembre", array(), "array"), "html", null, true);
                echo "</td>
                    <td> ";
                // line 57
                echo twig_escape_filter($this->env, ((((((((((($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planEnero", array(), "array") + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planFebrero", array(), "array")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planMarzo", array(), "array")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planAbril", array(), "array")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planMayo", array(), "array")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planJunio", array(), "array")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planJulio", array(), "array")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planAgosto", array(), "array")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planSeptiembre", array(), "array")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planOctubre", array(), "array")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planNoviembre", array(), "array")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planDiciembre", array(), "array")), "html", null, true);
                echo "</td>
                    ";
                // line 58
                $context["TotalPlanEnero"] = ((isset($context["TotalPlanEnero"]) ? $context["TotalPlanEnero"] : $this->getContext($context, "TotalPlanEnero")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planEnero", array(), "array"));
                // line 59
                echo "                    ";
                $context["TotalPlanFebrero"] = ((isset($context["TotalPlanFebrero"]) ? $context["TotalPlanFebrero"] : $this->getContext($context, "TotalPlanFebrero")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planFebrero", array(), "array"));
                // line 60
                echo "                    ";
                $context["TotalPlanMarzo"] = ((isset($context["TotalPlanMarzo"]) ? $context["TotalPlanMarzo"] : $this->getContext($context, "TotalPlanMarzo")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planMarzo", array(), "array"));
                // line 61
                echo "                    ";
                $context["TotalPlanAbril"] = ((isset($context["TotalPlanAbril"]) ? $context["TotalPlanAbril"] : $this->getContext($context, "TotalPlanAbril")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planAbril", array(), "array"));
                // line 62
                echo "                    ";
                $context["TotalPlanMayo"] = ((isset($context["TotalPlanMayo"]) ? $context["TotalPlanMayo"] : $this->getContext($context, "TotalPlanMayo")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planMayo", array(), "array"));
                // line 63
                echo "                    ";
                $context["TotalPlanJunio"] = ((isset($context["TotalPlanJunio"]) ? $context["TotalPlanJunio"] : $this->getContext($context, "TotalPlanJunio")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planJunio", array(), "array"));
                // line 64
                echo "                    ";
                $context["TotalPlanJulio"] = ((isset($context["TotalPlanJulio"]) ? $context["TotalPlanJulio"] : $this->getContext($context, "TotalPlanJulio")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planJulio", array(), "array"));
                // line 65
                echo "                    ";
                $context["TotalPlanAgosto"] = ((isset($context["TotalPlanAgosto"]) ? $context["TotalPlanAgosto"] : $this->getContext($context, "TotalPlanAgosto")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planAgosto", array(), "array"));
                // line 66
                echo "                    ";
                $context["TotalPlanSeptiembre"] = ((isset($context["TotalPlanSeptiembre"]) ? $context["TotalPlanSeptiembre"] : $this->getContext($context, "TotalPlanSeptiembre")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planSeptiembre", array(), "array"));
                // line 67
                echo "                    ";
                $context["TotalPlanOctubre"] = ((isset($context["TotalPlanOctubre"]) ? $context["TotalPlanOctubre"] : $this->getContext($context, "TotalPlanOctubre")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planOctubre", array(), "array"));
                // line 68
                echo "                    ";
                $context["TotalPlanNoviembre"] = ((isset($context["TotalPlanNoviembre"]) ? $context["TotalPlanNoviembre"] : $this->getContext($context, "TotalPlanNoviembre")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planNoviembre", array(), "array"));
                // line 69
                echo "                    ";
                $context["TotalPlanDiciembre"] = ((isset($context["TotalPlanDiciembre"]) ? $context["TotalPlanDiciembre"] : $this->getContext($context, "TotalPlanDiciembre")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planDiciembre", array(), "array"));
                // line 70
                echo "                    ";
                $context["NombreProvincia"] = $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "descripcion", array(), "array");
                // line 71
                echo "
                </tr>


            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['e'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 76
            echo "
            ";
            // line 77
            if ((twig_length_filter($this->env, (isset($context["Listado"]) ? $context["Listado"] : $this->getContext($context, "Listado"))) > 0)) {
                // line 78
                echo "                <tr>
                    <th colspan=\"1\" align=\"right\">Total  </th>
                    <td>";
                // line 80
                echo twig_escape_filter($this->env, (isset($context["TotalPlanEnero"]) ? $context["TotalPlanEnero"] : $this->getContext($context, "TotalPlanEnero")), "html", null, true);
                echo "</td>
                    <td>";
                // line 81
                echo twig_escape_filter($this->env, (isset($context["TotalPlanFebrero"]) ? $context["TotalPlanFebrero"] : $this->getContext($context, "TotalPlanFebrero")), "html", null, true);
                echo "</td>
                    <td>";
                // line 82
                echo twig_escape_filter($this->env, (isset($context["TotalPlanMarzo"]) ? $context["TotalPlanMarzo"] : $this->getContext($context, "TotalPlanMarzo")), "html", null, true);
                echo "</td>
                    <td>";
                // line 83
                echo twig_escape_filter($this->env, (isset($context["TotalPlanAbril"]) ? $context["TotalPlanAbril"] : $this->getContext($context, "TotalPlanAbril")), "html", null, true);
                echo "</td>
                    <td>";
                // line 84
                echo twig_escape_filter($this->env, (isset($context["TotalPlanMayo"]) ? $context["TotalPlanMayo"] : $this->getContext($context, "TotalPlanMayo")), "html", null, true);
                echo "</td>
                    <td>";
                // line 85
                echo twig_escape_filter($this->env, (isset($context["TotalPlanJunio"]) ? $context["TotalPlanJunio"] : $this->getContext($context, "TotalPlanJunio")), "html", null, true);
                echo "</td>
                    <td>";
                // line 86
                echo twig_escape_filter($this->env, (isset($context["TotalPlanJulio"]) ? $context["TotalPlanJulio"] : $this->getContext($context, "TotalPlanJulio")), "html", null, true);
                echo "</td>
                    <td>";
                // line 87
                echo twig_escape_filter($this->env, (isset($context["TotalPlanAgosto"]) ? $context["TotalPlanAgosto"] : $this->getContext($context, "TotalPlanAgosto")), "html", null, true);
                echo "</td>
                    <td>";
                // line 88
                echo twig_escape_filter($this->env, (isset($context["TotalPlanSeptiembre"]) ? $context["TotalPlanSeptiembre"] : $this->getContext($context, "TotalPlanSeptiembre")), "html", null, true);
                echo "</td>
                    <td>";
                // line 89
                echo twig_escape_filter($this->env, (isset($context["TotalPlanOctubre"]) ? $context["TotalPlanOctubre"] : $this->getContext($context, "TotalPlanOctubre")), "html", null, true);
                echo "</td>
                    <td>";
                // line 90
                echo twig_escape_filter($this->env, (isset($context["TotalPlanNoviembre"]) ? $context["TotalPlanNoviembre"] : $this->getContext($context, "TotalPlanNoviembre")), "html", null, true);
                echo "</td>
                    <td>";
                // line 91
                echo twig_escape_filter($this->env, (isset($context["TotalPlanDiciembre"]) ? $context["TotalPlanDiciembre"] : $this->getContext($context, "TotalPlanDiciembre")), "html", null, true);
                echo "</td>
                    <td>";
                // line 92
                echo twig_escape_filter($this->env, ((((((((((((isset($context["TotalPlanEnero"]) ? $context["TotalPlanEnero"] : $this->getContext($context, "TotalPlanEnero")) + (isset($context["TotalPlanFebrero"]) ? $context["TotalPlanFebrero"] : $this->getContext($context, "TotalPlanFebrero"))) + (isset($context["TotalPlanMarzo"]) ? $context["TotalPlanMarzo"] : $this->getContext($context, "TotalPlanMarzo"))) + (isset($context["TotalPlanAbril"]) ? $context["TotalPlanAbril"] : $this->getContext($context, "TotalPlanAbril"))) + (isset($context["TotalPlanMayo"]) ? $context["TotalPlanMayo"] : $this->getContext($context, "TotalPlanMayo"))) + (isset($context["TotalPlanJunio"]) ? $context["TotalPlanJunio"] : $this->getContext($context, "TotalPlanJunio"))) + (isset($context["TotalPlanJulio"]) ? $context["TotalPlanJulio"] : $this->getContext($context, "TotalPlanJulio"))) + (isset($context["TotalPlanAgosto"]) ? $context["TotalPlanAgosto"] : $this->getContext($context, "TotalPlanAgosto"))) + (isset($context["TotalPlanSeptiembre"]) ? $context["TotalPlanSeptiembre"] : $this->getContext($context, "TotalPlanSeptiembre"))) + (isset($context["TotalPlanOctubre"]) ? $context["TotalPlanOctubre"] : $this->getContext($context, "TotalPlanOctubre"))) + (isset($context["TotalPlanNoviembre"]) ? $context["TotalPlanNoviembre"] : $this->getContext($context, "TotalPlanNoviembre"))) + (isset($context["TotalPlanDiciembre"]) ? $context["TotalPlanDiciembre"] : $this->getContext($context, "TotalPlanDiciembre"))), "html", null, true);
                echo "</td>
                </tr>
            ";
            }
            // line 95
            echo "        </table>
";
        } else {
            // line 97
            echo "
    <h1>No hay datos a mostrar</h1>


";
        }
    }

    public function getTemplateName()
    {
        return "sisconeeAppBundle:Reports:listado_plan_mensual_provincia.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  278 => 97,  274 => 95,  268 => 92,  264 => 91,  260 => 90,  256 => 89,  252 => 88,  248 => 87,  244 => 86,  240 => 85,  236 => 84,  232 => 83,  228 => 82,  224 => 81,  220 => 80,  216 => 78,  214 => 77,  211 => 76,  201 => 71,  198 => 70,  195 => 69,  192 => 68,  189 => 67,  186 => 66,  183 => 65,  180 => 64,  177 => 63,  174 => 62,  171 => 61,  168 => 60,  165 => 59,  163 => 58,  159 => 57,  155 => 56,  151 => 55,  147 => 54,  143 => 53,  139 => 52,  135 => 51,  131 => 50,  127 => 49,  123 => 48,  119 => 47,  115 => 46,  111 => 45,  107 => 44,  103 => 42,  99 => 41,  96 => 40,  77 => 23,  75 => 22,  68 => 18,  63 => 16,  60 => 15,  57 => 14,  54 => 13,  51 => 12,  48 => 11,  45 => 10,  42 => 9,  39 => 8,  36 => 7,  33 => 6,  30 => 5,  27 => 4,  24 => 3,  21 => 2,  19 => 1,);
    }
}
