<?php

/* sisconeeAppBundle:Reports:listado_plan_mensual_entidad.html.twig */
class __TwigTemplate_745e22f8ccf3ee3a39582c34f4270670f862773bc58b388c4367d3d8c842ea60 extends Twig_Template
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
            $context["NombreEntidad"] = "";
            // line 4
            echo "        ";
            $context["TotalPlanEnero"] = 0;
            // line 5
            echo "        ";
            $context["TotalPlanFebrero"] = 0;
            // line 6
            echo "        ";
            $context["TotalPlanMarzo"] = 0;
            // line 7
            echo "        ";
            $context["TotalPlanAbril"] = 0;
            // line 8
            echo "        ";
            $context["TotalPlanMayo"] = 0;
            // line 9
            echo "        ";
            $context["TotalPlanJunio"] = 0;
            // line 10
            echo "        ";
            $context["TotalPlanJulio"] = 0;
            // line 11
            echo "        ";
            $context["TotalPlanAgosto"] = 0;
            // line 12
            echo "        ";
            $context["TotalPlanSeptiembre"] = 0;
            // line 13
            echo "        ";
            $context["TotalPlanOctubre"] = 0;
            // line 14
            echo "        ";
            $context["TotalPlanNoviembre"] = 0;
            // line 15
            echo "        ";
            $context["TotalPlanDiciembre"] = 0;
            // line 16
            echo "
        <h1>Organismo:";
            // line 17
            echo twig_escape_filter($this->env, (isset($context["organismo"]) ? $context["organismo"] : $this->getContext($context, "organismo")), "html", null, true);
            echo "</h1>
        <br>
        <h1>Plan de Energ&iacute;a El&eacute;ctrica  ";
            // line 19
            echo twig_escape_filter($this->env, (isset($context["periodo"]) ? $context["periodo"] : $this->getContext($context, "periodo")), "html", null, true);
            echo " (KWh)</h1>
        <br>
        <br>
        <table class=\"table table-bordered table-hover table-striped\">

            ";
            // line 24
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["Listado"]) ? $context["Listado"] : $this->getContext($context, "Listado")));
            foreach ($context['_seq'] as $context["_key"] => $context["e"]) {
                // line 25
                echo "
                ";
                // line 26
                if (((isset($context["NombreProvincia"]) ? $context["NombreProvincia"] : $this->getContext($context, "NombreProvincia")) != $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "descripcion", array(), "array"))) {
                    // line 27
                    echo "                    ";
                    if (((isset($context["NombreProvincia"]) ? $context["NombreProvincia"] : $this->getContext($context, "NombreProvincia")) != "")) {
                        // line 28
                        echo "                        <tr>
                            <th colspan=\"2\" align=\"right\">Total Mensual por Provincia </th>
                            <td>";
                        // line 30
                        echo twig_escape_filter($this->env, (isset($context["TotalPlanEnero"]) ? $context["TotalPlanEnero"] : $this->getContext($context, "TotalPlanEnero")), "html", null, true);
                        echo "</td>
                            <td>";
                        // line 31
                        echo twig_escape_filter($this->env, (isset($context["TotalPlanFebrero"]) ? $context["TotalPlanFebrero"] : $this->getContext($context, "TotalPlanFebrero")), "html", null, true);
                        echo "</td>
                            <td>";
                        // line 32
                        echo twig_escape_filter($this->env, (isset($context["TotalPlanMarzo"]) ? $context["TotalPlanMarzo"] : $this->getContext($context, "TotalPlanMarzo")), "html", null, true);
                        echo "</td>
                            <td>";
                        // line 33
                        echo twig_escape_filter($this->env, (isset($context["TotalPlanAbril"]) ? $context["TotalPlanAbril"] : $this->getContext($context, "TotalPlanAbril")), "html", null, true);
                        echo "</td>
                            <td>";
                        // line 34
                        echo twig_escape_filter($this->env, (isset($context["TotalPlanMayo"]) ? $context["TotalPlanMayo"] : $this->getContext($context, "TotalPlanMayo")), "html", null, true);
                        echo "</td>
                            <td>";
                        // line 35
                        echo twig_escape_filter($this->env, (isset($context["TotalPlanJunio"]) ? $context["TotalPlanJunio"] : $this->getContext($context, "TotalPlanJunio")), "html", null, true);
                        echo "</td>
                            <td>";
                        // line 36
                        echo twig_escape_filter($this->env, (isset($context["TotalPlanJulio"]) ? $context["TotalPlanJulio"] : $this->getContext($context, "TotalPlanJulio")), "html", null, true);
                        echo "</td>
                            <td>";
                        // line 37
                        echo twig_escape_filter($this->env, (isset($context["TotalPlanAgosto"]) ? $context["TotalPlanAgosto"] : $this->getContext($context, "TotalPlanAgosto")), "html", null, true);
                        echo "</td>
                            <td>";
                        // line 38
                        echo twig_escape_filter($this->env, (isset($context["TotalPlanSeptiembre"]) ? $context["TotalPlanSeptiembre"] : $this->getContext($context, "TotalPlanSeptiembre")), "html", null, true);
                        echo "</td>
                            <td>";
                        // line 39
                        echo twig_escape_filter($this->env, (isset($context["TotalPlanOctubre"]) ? $context["TotalPlanOctubre"] : $this->getContext($context, "TotalPlanOctubre")), "html", null, true);
                        echo "</td>
                            <td>";
                        // line 40
                        echo twig_escape_filter($this->env, (isset($context["TotalPlanNoviembre"]) ? $context["TotalPlanNoviembre"] : $this->getContext($context, "TotalPlanNoviembre")), "html", null, true);
                        echo "</td>
                            <td>";
                        // line 41
                        echo twig_escape_filter($this->env, (isset($context["TotalPlanDiciembre"]) ? $context["TotalPlanDiciembre"] : $this->getContext($context, "TotalPlanDiciembre")), "html", null, true);
                        echo "</td>
                            <td>";
                        // line 42
                        echo twig_escape_filter($this->env, ((((((((((((isset($context["TotalPlanEnero"]) ? $context["TotalPlanEnero"] : $this->getContext($context, "TotalPlanEnero")) + (isset($context["TotalPlanFebrero"]) ? $context["TotalPlanFebrero"] : $this->getContext($context, "TotalPlanFebrero"))) + (isset($context["TotalPlanMarzo"]) ? $context["TotalPlanMarzo"] : $this->getContext($context, "TotalPlanMarzo"))) + (isset($context["TotalPlanAbril"]) ? $context["TotalPlanAbril"] : $this->getContext($context, "TotalPlanAbril"))) + (isset($context["TotalPlanMayo"]) ? $context["TotalPlanMayo"] : $this->getContext($context, "TotalPlanMayo"))) + (isset($context["TotalPlanJunio"]) ? $context["TotalPlanJunio"] : $this->getContext($context, "TotalPlanJunio"))) + (isset($context["TotalPlanJulio"]) ? $context["TotalPlanJulio"] : $this->getContext($context, "TotalPlanJulio"))) + (isset($context["TotalPlanAgosto"]) ? $context["TotalPlanAgosto"] : $this->getContext($context, "TotalPlanAgosto"))) + (isset($context["TotalPlanSeptiembre"]) ? $context["TotalPlanSeptiembre"] : $this->getContext($context, "TotalPlanSeptiembre"))) + (isset($context["TotalPlanOctubre"]) ? $context["TotalPlanOctubre"] : $this->getContext($context, "TotalPlanOctubre"))) + (isset($context["TotalPlanNoviembre"]) ? $context["TotalPlanNoviembre"] : $this->getContext($context, "TotalPlanNoviembre"))) + (isset($context["TotalPlanDiciembre"]) ? $context["TotalPlanDiciembre"] : $this->getContext($context, "TotalPlanDiciembre"))), "html", null, true);
                        echo "</td>
                        </tr>
                    ";
                    }
                    // line 45
                    echo "                    <tr>
                        <th colspan=\"16\">
                           ";
                    // line 47
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "descripcion", array(), "array"), "html", null, true);
                    echo " </th>
                        </tr>
                    <tr>
                        <th>Reuup</th>
                        <th>Entidad</th>
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
                    // line 66
                    $context["TotalPlanEnero"] = 0;
                    // line 67
                    echo "                    ";
                    $context["TotalPlanFebrero"] = 0;
                    // line 68
                    echo "                    ";
                    $context["TotalPlanMarzo"] = 0;
                    // line 69
                    echo "                    ";
                    $context["TotalPlanAbril"] = 0;
                    // line 70
                    echo "                    ";
                    $context["TotalPlanMayo"] = 0;
                    // line 71
                    echo "                    ";
                    $context["TotalPlanJunio"] = 0;
                    // line 72
                    echo "                    ";
                    $context["TotalPlanJulio"] = 0;
                    // line 73
                    echo "                    ";
                    $context["TotalPlanAgosto"] = 0;
                    // line 74
                    echo "                    ";
                    $context["TotalPlanSeptiembre"] = 0;
                    // line 75
                    echo "                    ";
                    $context["TotalPlanOctubre"] = 0;
                    // line 76
                    echo "                    ";
                    $context["TotalPlanNoviembre"] = 0;
                    // line 77
                    echo "                    ";
                    $context["TotalPlanDiciembre"] = 0;
                    // line 78
                    echo "                ";
                }
                // line 79
                echo "
                <tr>
                    <td>";
                // line 81
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "codreeup", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 82
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "nombreEntidad", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 83
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planEnero", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 84
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planFebrero", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 85
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planMarzo", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 86
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planAbril", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 87
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planMayo", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 88
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planJunio", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 89
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planJulio", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 90
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planAgosto", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 91
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planSeptiembre", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 92
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planOctubre", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 93
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planNoviembre", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 94
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planDiciembre", array(), "array"), "html", null, true);
                echo "</td>
                    <td> ";
                // line 95
                echo twig_escape_filter($this->env, ((((((((((($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planEnero", array(), "array") + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planFebrero", array(), "array")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planMarzo", array(), "array")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planAbril", array(), "array")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planMayo", array(), "array")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planJunio", array(), "array")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planJulio", array(), "array")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planAgosto", array(), "array")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planSeptiembre", array(), "array")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planOctubre", array(), "array")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planNoviembre", array(), "array")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planDiciembre", array(), "array")), "html", null, true);
                echo "</td>
                    ";
                // line 96
                $context["TotalPlanEnero"] = ((isset($context["TotalPlanEnero"]) ? $context["TotalPlanEnero"] : $this->getContext($context, "TotalPlanEnero")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planEnero", array(), "array"));
                // line 97
                echo "                    ";
                $context["TotalPlanFebrero"] = ((isset($context["TotalPlanFebrero"]) ? $context["TotalPlanFebrero"] : $this->getContext($context, "TotalPlanFebrero")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planFebrero", array(), "array"));
                // line 98
                echo "                    ";
                $context["TotalPlanMarzo"] = ((isset($context["TotalPlanMarzo"]) ? $context["TotalPlanMarzo"] : $this->getContext($context, "TotalPlanMarzo")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planMarzo", array(), "array"));
                // line 99
                echo "                    ";
                $context["TotalPlanAbril"] = ((isset($context["TotalPlanAbril"]) ? $context["TotalPlanAbril"] : $this->getContext($context, "TotalPlanAbril")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planAbril", array(), "array"));
                // line 100
                echo "                    ";
                $context["TotalPlanMayo"] = ((isset($context["TotalPlanMayo"]) ? $context["TotalPlanMayo"] : $this->getContext($context, "TotalPlanMayo")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planMayo", array(), "array"));
                // line 101
                echo "                    ";
                $context["TotalPlanJunio"] = ((isset($context["TotalPlanJunio"]) ? $context["TotalPlanJunio"] : $this->getContext($context, "TotalPlanJunio")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planJunio", array(), "array"));
                // line 102
                echo "                    ";
                $context["TotalPlanJulio"] = ((isset($context["TotalPlanJulio"]) ? $context["TotalPlanJulio"] : $this->getContext($context, "TotalPlanJulio")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planJulio", array(), "array"));
                // line 103
                echo "                    ";
                $context["TotalPlanAgosto"] = ((isset($context["TotalPlanAgosto"]) ? $context["TotalPlanAgosto"] : $this->getContext($context, "TotalPlanAgosto")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planAgosto", array(), "array"));
                // line 104
                echo "                    ";
                $context["TotalPlanSeptiembre"] = ((isset($context["TotalPlanSeptiembre"]) ? $context["TotalPlanSeptiembre"] : $this->getContext($context, "TotalPlanSeptiembre")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planSeptiembre", array(), "array"));
                // line 105
                echo "                    ";
                $context["TotalPlanOctubre"] = ((isset($context["TotalPlanOctubre"]) ? $context["TotalPlanOctubre"] : $this->getContext($context, "TotalPlanOctubre")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planOctubre", array(), "array"));
                // line 106
                echo "                    ";
                $context["TotalPlanNoviembre"] = ((isset($context["TotalPlanNoviembre"]) ? $context["TotalPlanNoviembre"] : $this->getContext($context, "TotalPlanNoviembre")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planNoviembre", array(), "array"));
                // line 107
                echo "                    ";
                $context["TotalPlanDiciembre"] = ((isset($context["TotalPlanDiciembre"]) ? $context["TotalPlanDiciembre"] : $this->getContext($context, "TotalPlanDiciembre")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planDiciembre", array(), "array"));
                // line 108
                echo "                    ";
                $context["NombreEntidad"] = $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "nombreEntidad", array(), "array");
                // line 109
                echo "                    ";
                $context["NombreProvincia"] = $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "descripcion", array(), "array");
                // line 110
                echo "
                </tr>


            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['e'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 115
            echo "
            ";
            // line 116
            if ((twig_length_filter($this->env, (isset($context["Listado"]) ? $context["Listado"] : $this->getContext($context, "Listado"))) > 0)) {
                // line 117
                echo "                <tr>
                    <th colspan=\"2\" align=\"right\">Total Mensual por Provincia </th>
                    <td>";
                // line 119
                echo twig_escape_filter($this->env, (isset($context["TotalPlanEnero"]) ? $context["TotalPlanEnero"] : $this->getContext($context, "TotalPlanEnero")), "html", null, true);
                echo "</td>
                    <td>";
                // line 120
                echo twig_escape_filter($this->env, (isset($context["TotalPlanFebrero"]) ? $context["TotalPlanFebrero"] : $this->getContext($context, "TotalPlanFebrero")), "html", null, true);
                echo "</td>
                    <td>";
                // line 121
                echo twig_escape_filter($this->env, (isset($context["TotalPlanMarzo"]) ? $context["TotalPlanMarzo"] : $this->getContext($context, "TotalPlanMarzo")), "html", null, true);
                echo "</td>
                    <td>";
                // line 122
                echo twig_escape_filter($this->env, (isset($context["TotalPlanAbril"]) ? $context["TotalPlanAbril"] : $this->getContext($context, "TotalPlanAbril")), "html", null, true);
                echo "</td>
                    <td>";
                // line 123
                echo twig_escape_filter($this->env, (isset($context["TotalPlanMayo"]) ? $context["TotalPlanMayo"] : $this->getContext($context, "TotalPlanMayo")), "html", null, true);
                echo "</td>
                    <td>";
                // line 124
                echo twig_escape_filter($this->env, (isset($context["TotalPlanJunio"]) ? $context["TotalPlanJunio"] : $this->getContext($context, "TotalPlanJunio")), "html", null, true);
                echo "</td>
                    <td>";
                // line 125
                echo twig_escape_filter($this->env, (isset($context["TotalPlanJulio"]) ? $context["TotalPlanJulio"] : $this->getContext($context, "TotalPlanJulio")), "html", null, true);
                echo "</td>
                    <td>";
                // line 126
                echo twig_escape_filter($this->env, (isset($context["TotalPlanAgosto"]) ? $context["TotalPlanAgosto"] : $this->getContext($context, "TotalPlanAgosto")), "html", null, true);
                echo "</td>
                    <td>";
                // line 127
                echo twig_escape_filter($this->env, (isset($context["TotalPlanSeptiembre"]) ? $context["TotalPlanSeptiembre"] : $this->getContext($context, "TotalPlanSeptiembre")), "html", null, true);
                echo "</td>
                    <td>";
                // line 128
                echo twig_escape_filter($this->env, (isset($context["TotalPlanOctubre"]) ? $context["TotalPlanOctubre"] : $this->getContext($context, "TotalPlanOctubre")), "html", null, true);
                echo "</td>
                    <td>";
                // line 129
                echo twig_escape_filter($this->env, (isset($context["TotalPlanNoviembre"]) ? $context["TotalPlanNoviembre"] : $this->getContext($context, "TotalPlanNoviembre")), "html", null, true);
                echo "</td>
                    <td>";
                // line 130
                echo twig_escape_filter($this->env, (isset($context["TotalPlanDiciembre"]) ? $context["TotalPlanDiciembre"] : $this->getContext($context, "TotalPlanDiciembre")), "html", null, true);
                echo "</td>
                    <td>";
                // line 131
                echo twig_escape_filter($this->env, ((((((((((((isset($context["TotalPlanEnero"]) ? $context["TotalPlanEnero"] : $this->getContext($context, "TotalPlanEnero")) + (isset($context["TotalPlanFebrero"]) ? $context["TotalPlanFebrero"] : $this->getContext($context, "TotalPlanFebrero"))) + (isset($context["TotalPlanMarzo"]) ? $context["TotalPlanMarzo"] : $this->getContext($context, "TotalPlanMarzo"))) + (isset($context["TotalPlanAbril"]) ? $context["TotalPlanAbril"] : $this->getContext($context, "TotalPlanAbril"))) + (isset($context["TotalPlanMayo"]) ? $context["TotalPlanMayo"] : $this->getContext($context, "TotalPlanMayo"))) + (isset($context["TotalPlanJunio"]) ? $context["TotalPlanJunio"] : $this->getContext($context, "TotalPlanJunio"))) + (isset($context["TotalPlanJulio"]) ? $context["TotalPlanJulio"] : $this->getContext($context, "TotalPlanJulio"))) + (isset($context["TotalPlanAgosto"]) ? $context["TotalPlanAgosto"] : $this->getContext($context, "TotalPlanAgosto"))) + (isset($context["TotalPlanSeptiembre"]) ? $context["TotalPlanSeptiembre"] : $this->getContext($context, "TotalPlanSeptiembre"))) + (isset($context["TotalPlanOctubre"]) ? $context["TotalPlanOctubre"] : $this->getContext($context, "TotalPlanOctubre"))) + (isset($context["TotalPlanNoviembre"]) ? $context["TotalPlanNoviembre"] : $this->getContext($context, "TotalPlanNoviembre"))) + (isset($context["TotalPlanDiciembre"]) ? $context["TotalPlanDiciembre"] : $this->getContext($context, "TotalPlanDiciembre"))), "html", null, true);
                echo "</td>
                </tr>
            ";
            }
            // line 134
            echo "        </table>
";
        } else {
            // line 136
            echo "
    <h1>No hay datos a mostrar</h1>


";
        }
    }

    public function getTemplateName()
    {
        return "sisconeeAppBundle:Reports:listado_plan_mensual_entidad.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  395 => 136,  391 => 134,  385 => 131,  381 => 130,  377 => 129,  373 => 128,  369 => 127,  365 => 126,  361 => 125,  357 => 124,  353 => 123,  349 => 122,  345 => 121,  341 => 120,  337 => 119,  333 => 117,  331 => 116,  328 => 115,  318 => 110,  315 => 109,  312 => 108,  309 => 107,  306 => 106,  303 => 105,  300 => 104,  297 => 103,  294 => 102,  291 => 101,  288 => 100,  285 => 99,  282 => 98,  279 => 97,  277 => 96,  273 => 95,  269 => 94,  265 => 93,  261 => 92,  257 => 91,  253 => 90,  249 => 89,  245 => 88,  241 => 87,  237 => 86,  233 => 85,  229 => 84,  225 => 83,  221 => 82,  217 => 81,  213 => 79,  210 => 78,  207 => 77,  204 => 76,  201 => 75,  198 => 74,  195 => 73,  192 => 72,  189 => 71,  186 => 70,  183 => 69,  180 => 68,  177 => 67,  175 => 66,  153 => 47,  149 => 45,  143 => 42,  139 => 41,  135 => 40,  131 => 39,  127 => 38,  123 => 37,  119 => 36,  115 => 35,  111 => 34,  107 => 33,  103 => 32,  99 => 31,  95 => 30,  91 => 28,  88 => 27,  86 => 26,  83 => 25,  79 => 24,  71 => 19,  66 => 17,  63 => 16,  60 => 15,  57 => 14,  54 => 13,  51 => 12,  48 => 11,  45 => 10,  42 => 9,  39 => 8,  36 => 7,  33 => 6,  30 => 5,  27 => 4,  24 => 3,  21 => 2,  19 => 1,);
    }
}
