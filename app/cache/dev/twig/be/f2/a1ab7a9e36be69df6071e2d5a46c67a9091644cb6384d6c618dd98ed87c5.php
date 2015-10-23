<?php

/* sisconeeAppBundle:Reports:listado_plan_mensualPDF.html.twig */
class __TwigTemplate_bef2a1ab7a9e36be69df6071e2d5a46c67a9091644cb6384d6c618dd98ed87c5 extends Twig_Template
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
        <table class=\"table table-bordered table-hover table-striped\" style=\"border: 1px solid #000000\">

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
                        echo "                        <tr style=\"border: 1px solid #000000\">
                            <th colspan=\"3\" align=\"right\" style=\"border: 1px solid #000000\">Total Mensual por Provincia </th>
                            <td style=\"border: 1px solid #000000\">";
                        // line 30
                        echo twig_escape_filter($this->env, (isset($context["TotalPlanEnero"]) ? $context["TotalPlanEnero"] : $this->getContext($context, "TotalPlanEnero")), "html", null, true);
                        echo "</td>
                            <td style=\"border: 1px solid #000000\">";
                        // line 31
                        echo twig_escape_filter($this->env, (isset($context["TotalPlanFebrero"]) ? $context["TotalPlanFebrero"] : $this->getContext($context, "TotalPlanFebrero")), "html", null, true);
                        echo "</td>
                            <td style=\"border: 1px solid #000000\">";
                        // line 32
                        echo twig_escape_filter($this->env, (isset($context["TotalPlanMarzo"]) ? $context["TotalPlanMarzo"] : $this->getContext($context, "TotalPlanMarzo")), "html", null, true);
                        echo "</td>
                            <td style=\"border: 1px solid #000000\">";
                        // line 33
                        echo twig_escape_filter($this->env, (isset($context["TotalPlanAbril"]) ? $context["TotalPlanAbril"] : $this->getContext($context, "TotalPlanAbril")), "html", null, true);
                        echo "</td>
                            <td style=\"border: 1px solid #000000\">";
                        // line 34
                        echo twig_escape_filter($this->env, (isset($context["TotalPlanMayo"]) ? $context["TotalPlanMayo"] : $this->getContext($context, "TotalPlanMayo")), "html", null, true);
                        echo "</td>
                            <td style=\"border: 1px solid #000000\">";
                        // line 35
                        echo twig_escape_filter($this->env, (isset($context["TotalPlanJunio"]) ? $context["TotalPlanJunio"] : $this->getContext($context, "TotalPlanJunio")), "html", null, true);
                        echo "</td>
                            <td style=\"border: 1px solid #000000\">";
                        // line 36
                        echo twig_escape_filter($this->env, (isset($context["TotalPlanJulio"]) ? $context["TotalPlanJulio"] : $this->getContext($context, "TotalPlanJulio")), "html", null, true);
                        echo "</td>
                            <td style=\"border: 1px solid #000000\">";
                        // line 37
                        echo twig_escape_filter($this->env, (isset($context["TotalPlanAgosto"]) ? $context["TotalPlanAgosto"] : $this->getContext($context, "TotalPlanAgosto")), "html", null, true);
                        echo "</td>
                            <td style=\"border: 1px solid #000000\">";
                        // line 38
                        echo twig_escape_filter($this->env, (isset($context["TotalPlanSeptiembre"]) ? $context["TotalPlanSeptiembre"] : $this->getContext($context, "TotalPlanSeptiembre")), "html", null, true);
                        echo "</td>
                            <td style=\"border: 1px solid #000000\">";
                        // line 39
                        echo twig_escape_filter($this->env, (isset($context["TotalPlanOctubre"]) ? $context["TotalPlanOctubre"] : $this->getContext($context, "TotalPlanOctubre")), "html", null, true);
                        echo "</td>
                            <td style=\"border: 1px solid #000000\">";
                        // line 40
                        echo twig_escape_filter($this->env, (isset($context["TotalPlanNoviembre"]) ? $context["TotalPlanNoviembre"] : $this->getContext($context, "TotalPlanNoviembre")), "html", null, true);
                        echo "</td>
                            <td style=\"border: 1px solid #000000\">";
                        // line 41
                        echo twig_escape_filter($this->env, (isset($context["TotalPlanDiciembre"]) ? $context["TotalPlanDiciembre"] : $this->getContext($context, "TotalPlanDiciembre")), "html", null, true);
                        echo "</td>
                            <td style=\"border: 1px solid #000000\">";
                        // line 42
                        echo twig_escape_filter($this->env, ((((((((((((isset($context["TotalPlanEnero"]) ? $context["TotalPlanEnero"] : $this->getContext($context, "TotalPlanEnero")) + (isset($context["TotalPlanFebrero"]) ? $context["TotalPlanFebrero"] : $this->getContext($context, "TotalPlanFebrero"))) + (isset($context["TotalPlanMarzo"]) ? $context["TotalPlanMarzo"] : $this->getContext($context, "TotalPlanMarzo"))) + (isset($context["TotalPlanAbril"]) ? $context["TotalPlanAbril"] : $this->getContext($context, "TotalPlanAbril"))) + (isset($context["TotalPlanMayo"]) ? $context["TotalPlanMayo"] : $this->getContext($context, "TotalPlanMayo"))) + (isset($context["TotalPlanJunio"]) ? $context["TotalPlanJunio"] : $this->getContext($context, "TotalPlanJunio"))) + (isset($context["TotalPlanJulio"]) ? $context["TotalPlanJulio"] : $this->getContext($context, "TotalPlanJulio"))) + (isset($context["TotalPlanAgosto"]) ? $context["TotalPlanAgosto"] : $this->getContext($context, "TotalPlanAgosto"))) + (isset($context["TotalPlanSeptiembre"]) ? $context["TotalPlanSeptiembre"] : $this->getContext($context, "TotalPlanSeptiembre"))) + (isset($context["TotalPlanOctubre"]) ? $context["TotalPlanOctubre"] : $this->getContext($context, "TotalPlanOctubre"))) + (isset($context["TotalPlanNoviembre"]) ? $context["TotalPlanNoviembre"] : $this->getContext($context, "TotalPlanNoviembre"))) + (isset($context["TotalPlanDiciembre"]) ? $context["TotalPlanDiciembre"] : $this->getContext($context, "TotalPlanDiciembre"))), "html", null, true);
                        echo "</td>
                        </tr>
                    ";
                    }
                    // line 45
                    echo "                    <tr style=\"border: 1px solid #000000\">
                        <th colspan=\"16\" style=\"border: 1px solid #000000\">";
                    // line 46
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "descripcion", array(), "array"), "html", null, true);
                    echo "</th>
                    </tr>
                    ";
                    // line 48
                    $context["TotalPlanEnero"] = 0;
                    // line 49
                    echo "                    ";
                    $context["TotalPlanFebrero"] = 0;
                    // line 50
                    echo "                    ";
                    $context["TotalPlanMarzo"] = 0;
                    // line 51
                    echo "                    ";
                    $context["TotalPlanAbril"] = 0;
                    // line 52
                    echo "                    ";
                    $context["TotalPlanMayo"] = 0;
                    // line 53
                    echo "                    ";
                    $context["TotalPlanJunio"] = 0;
                    // line 54
                    echo "                    ";
                    $context["TotalPlanJulio"] = 0;
                    // line 55
                    echo "                    ";
                    $context["TotalPlanAgosto"] = 0;
                    // line 56
                    echo "                    ";
                    $context["TotalPlanSeptiembre"] = 0;
                    // line 57
                    echo "                    ";
                    $context["TotalPlanOctubre"] = 0;
                    // line 58
                    echo "                    ";
                    $context["TotalPlanNoviembre"] = 0;
                    // line 59
                    echo "                    ";
                    $context["TotalPlanDiciembre"] = 0;
                    // line 60
                    echo "                ";
                }
                // line 61
                echo "                ";
                if (((isset($context["NombreEntidad"]) ? $context["NombreEntidad"] : $this->getContext($context, "NombreEntidad")) != $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "nombreEntidad", array(), "array"))) {
                    // line 62
                    echo "                    <tr style=\"border: 1px solid #000000\">
                        <th colspan=\"16\" style=\"border: 1px solid #000000\">";
                    // line 63
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "codreeup", array(), "array"), "html", null, true);
                    echo ":";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "nombreEntidad", array(), "array"), "html", null, true);
                    echo "</th>
                    </tr>
                    <tr style=\"border: 1 px solid #ddd\">
                        <th style=\"border: 1px solid #000000\">Código CEE</th>
                        <th style=\"border: 1px solid #000000\">CRF</th>
                        <th style=\"border: 1px solid #000000\">Nombre del Servicio</th>
                        <th style=\"border: 1px solid #000000\">Ene</th>
                        <th style=\"border: 1px solid #000000\">Feb</th>
                        <th style=\"border: 1px solid #000000\">Mar</th>
                        <th style=\"border: 1px solid #000000\">Abr</th>
                        <th style=\"border: 1px solid #000000\">May</th>
                        <th style=\"border: 1px solid #000000\">Jun</th>
                        <th style=\"border: 1px solid #000000\">Jul</th>
                        <th style=\"border: 1px solid #000000\">Ago</th>
                        <th style=\"border: 1px solid #000000\">Sep</th>
                        <th style=\"border: 1px solid #000000\">Oct</th>
                        <th style=\"border: 1px solid #000000\">Nov</th>
                        <th style=\"border: 1px solid #000000\">Dic</th>
                        <th style=\"border: 1px solid #000000\">Total</th>
                    </tr>
                ";
                }
                // line 84
                echo "
                <tr style=\"border: 1px solid #000000\">
                    <td style=\"border: 1px solid #000000\">";
                // line 86
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "codcliente_EE", array(), "array"), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 87
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "codRF", array(), "array"), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 88
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "nombreServicio", array(), "array"), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 89
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planEnero", array(), "array"), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 90
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planFebrero", array(), "array"), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 91
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planMarzo", array(), "array"), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 92
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planAbril", array(), "array"), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 93
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planMayo", array(), "array"), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 94
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planJunio", array(), "array"), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 95
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planJulio", array(), "array"), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 96
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planAgosto", array(), "array"), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 97
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planSeptiembre", array(), "array"), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 98
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planOctubre", array(), "array"), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 99
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planNoviembre", array(), "array"), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 100
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planDiciembre", array(), "array"), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\"> ";
                // line 101
                echo twig_escape_filter($this->env, ((((((((((($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planEnero", array(), "array") + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planFebrero", array(), "array")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planMarzo", array(), "array")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planAbril", array(), "array")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planMayo", array(), "array")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planJunio", array(), "array")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planJulio", array(), "array")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planAgosto", array(), "array")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planSeptiembre", array(), "array")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planOctubre", array(), "array")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planNoviembre", array(), "array")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planDiciembre", array(), "array")), "html", null, true);
                echo "</td>
                    ";
                // line 102
                $context["TotalPlanEnero"] = ((isset($context["TotalPlanEnero"]) ? $context["TotalPlanEnero"] : $this->getContext($context, "TotalPlanEnero")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planEnero", array(), "array"));
                // line 103
                echo "                    ";
                $context["TotalPlanFebrero"] = ((isset($context["TotalPlanFebrero"]) ? $context["TotalPlanFebrero"] : $this->getContext($context, "TotalPlanFebrero")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planFebrero", array(), "array"));
                // line 104
                echo "                    ";
                $context["TotalPlanMarzo"] = ((isset($context["TotalPlanMarzo"]) ? $context["TotalPlanMarzo"] : $this->getContext($context, "TotalPlanMarzo")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planMarzo", array(), "array"));
                // line 105
                echo "                    ";
                $context["TotalPlanAbril"] = ((isset($context["TotalPlanAbril"]) ? $context["TotalPlanAbril"] : $this->getContext($context, "TotalPlanAbril")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planAbril", array(), "array"));
                // line 106
                echo "                    ";
                $context["TotalPlanMayo"] = ((isset($context["TotalPlanMayo"]) ? $context["TotalPlanMayo"] : $this->getContext($context, "TotalPlanMayo")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planMayo", array(), "array"));
                // line 107
                echo "                    ";
                $context["TotalPlanJunio"] = ((isset($context["TotalPlanJunio"]) ? $context["TotalPlanJunio"] : $this->getContext($context, "TotalPlanJunio")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planJunio", array(), "array"));
                // line 108
                echo "                    ";
                $context["TotalPlanJulio"] = ((isset($context["TotalPlanJulio"]) ? $context["TotalPlanJulio"] : $this->getContext($context, "TotalPlanJulio")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planJulio", array(), "array"));
                // line 109
                echo "                    ";
                $context["TotalPlanAgosto"] = ((isset($context["TotalPlanAgosto"]) ? $context["TotalPlanAgosto"] : $this->getContext($context, "TotalPlanAgosto")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planAgosto", array(), "array"));
                // line 110
                echo "                    ";
                $context["TotalPlanSeptiembre"] = ((isset($context["TotalPlanSeptiembre"]) ? $context["TotalPlanSeptiembre"] : $this->getContext($context, "TotalPlanSeptiembre")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planSeptiembre", array(), "array"));
                // line 111
                echo "                    ";
                $context["TotalPlanOctubre"] = ((isset($context["TotalPlanOctubre"]) ? $context["TotalPlanOctubre"] : $this->getContext($context, "TotalPlanOctubre")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planOctubre", array(), "array"));
                // line 112
                echo "                    ";
                $context["TotalPlanNoviembre"] = ((isset($context["TotalPlanNoviembre"]) ? $context["TotalPlanNoviembre"] : $this->getContext($context, "TotalPlanNoviembre")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planNoviembre", array(), "array"));
                // line 113
                echo "                    ";
                $context["TotalPlanDiciembre"] = ((isset($context["TotalPlanDiciembre"]) ? $context["TotalPlanDiciembre"] : $this->getContext($context, "TotalPlanDiciembre")) + $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "planDiciembre", array(), "array"));
                // line 114
                echo "                    ";
                $context["NombreEntidad"] = $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "nombreEntidad", array(), "array");
                // line 115
                echo "                    ";
                $context["NombreProvincia"] = $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "descripcion", array(), "array");
                // line 116
                echo "
                </tr>


            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['e'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 121
            echo "
            ";
            // line 122
            if ((twig_length_filter($this->env, (isset($context["Listado"]) ? $context["Listado"] : $this->getContext($context, "Listado"))) > 0)) {
                // line 123
                echo "                <tr style=\"border: 1px solid #000000\">
                    <th colspan=\"3\" align=\"right\" style=\"border: 1px solid #000000\">Total Mensual por Provincia </th>
                    <td style=\"border: 1px solid #000000\">";
                // line 125
                echo twig_escape_filter($this->env, (isset($context["TotalPlanEnero"]) ? $context["TotalPlanEnero"] : $this->getContext($context, "TotalPlanEnero")), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 126
                echo twig_escape_filter($this->env, (isset($context["TotalPlanFebrero"]) ? $context["TotalPlanFebrero"] : $this->getContext($context, "TotalPlanFebrero")), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 127
                echo twig_escape_filter($this->env, (isset($context["TotalPlanMarzo"]) ? $context["TotalPlanMarzo"] : $this->getContext($context, "TotalPlanMarzo")), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 128
                echo twig_escape_filter($this->env, (isset($context["TotalPlanAbril"]) ? $context["TotalPlanAbril"] : $this->getContext($context, "TotalPlanAbril")), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 129
                echo twig_escape_filter($this->env, (isset($context["TotalPlanMayo"]) ? $context["TotalPlanMayo"] : $this->getContext($context, "TotalPlanMayo")), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 130
                echo twig_escape_filter($this->env, (isset($context["TotalPlanJunio"]) ? $context["TotalPlanJunio"] : $this->getContext($context, "TotalPlanJunio")), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 131
                echo twig_escape_filter($this->env, (isset($context["TotalPlanJulio"]) ? $context["TotalPlanJulio"] : $this->getContext($context, "TotalPlanJulio")), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 132
                echo twig_escape_filter($this->env, (isset($context["TotalPlanAgosto"]) ? $context["TotalPlanAgosto"] : $this->getContext($context, "TotalPlanAgosto")), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 133
                echo twig_escape_filter($this->env, (isset($context["TotalPlanSeptiembre"]) ? $context["TotalPlanSeptiembre"] : $this->getContext($context, "TotalPlanSeptiembre")), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 134
                echo twig_escape_filter($this->env, (isset($context["TotalPlanOctubre"]) ? $context["TotalPlanOctubre"] : $this->getContext($context, "TotalPlanOctubre")), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 135
                echo twig_escape_filter($this->env, (isset($context["TotalPlanNoviembre"]) ? $context["TotalPlanNoviembre"] : $this->getContext($context, "TotalPlanNoviembre")), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 136
                echo twig_escape_filter($this->env, (isset($context["TotalPlanDiciembre"]) ? $context["TotalPlanDiciembre"] : $this->getContext($context, "TotalPlanDiciembre")), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 137
                echo twig_escape_filter($this->env, ((((((((((((isset($context["TotalPlanEnero"]) ? $context["TotalPlanEnero"] : $this->getContext($context, "TotalPlanEnero")) + (isset($context["TotalPlanFebrero"]) ? $context["TotalPlanFebrero"] : $this->getContext($context, "TotalPlanFebrero"))) + (isset($context["TotalPlanMarzo"]) ? $context["TotalPlanMarzo"] : $this->getContext($context, "TotalPlanMarzo"))) + (isset($context["TotalPlanAbril"]) ? $context["TotalPlanAbril"] : $this->getContext($context, "TotalPlanAbril"))) + (isset($context["TotalPlanMayo"]) ? $context["TotalPlanMayo"] : $this->getContext($context, "TotalPlanMayo"))) + (isset($context["TotalPlanJunio"]) ? $context["TotalPlanJunio"] : $this->getContext($context, "TotalPlanJunio"))) + (isset($context["TotalPlanJulio"]) ? $context["TotalPlanJulio"] : $this->getContext($context, "TotalPlanJulio"))) + (isset($context["TotalPlanAgosto"]) ? $context["TotalPlanAgosto"] : $this->getContext($context, "TotalPlanAgosto"))) + (isset($context["TotalPlanSeptiembre"]) ? $context["TotalPlanSeptiembre"] : $this->getContext($context, "TotalPlanSeptiembre"))) + (isset($context["TotalPlanOctubre"]) ? $context["TotalPlanOctubre"] : $this->getContext($context, "TotalPlanOctubre"))) + (isset($context["TotalPlanNoviembre"]) ? $context["TotalPlanNoviembre"] : $this->getContext($context, "TotalPlanNoviembre"))) + (isset($context["TotalPlanDiciembre"]) ? $context["TotalPlanDiciembre"] : $this->getContext($context, "TotalPlanDiciembre"))), "html", null, true);
                echo "</td>
                </tr>
            ";
            }
            // line 140
            echo "        </table>


";
        } else {
            // line 144
            echo "
    <h1>No hay datos a mostrar</h1>


";
        }
        // line 149
        echo "

";
    }

    public function getTemplateName()
    {
        return "sisconeeAppBundle:Reports:listado_plan_mensualPDF.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  422 => 149,  415 => 144,  409 => 140,  403 => 137,  399 => 136,  395 => 135,  391 => 134,  387 => 133,  383 => 132,  379 => 131,  375 => 130,  371 => 129,  367 => 128,  363 => 127,  359 => 126,  355 => 125,  351 => 123,  349 => 122,  346 => 121,  336 => 116,  333 => 115,  330 => 114,  327 => 113,  324 => 112,  321 => 111,  318 => 110,  315 => 109,  312 => 108,  309 => 107,  306 => 106,  303 => 105,  300 => 104,  297 => 103,  295 => 102,  291 => 101,  287 => 100,  283 => 99,  279 => 98,  275 => 97,  271 => 96,  267 => 95,  263 => 94,  259 => 93,  255 => 92,  251 => 91,  247 => 90,  243 => 89,  239 => 88,  235 => 87,  231 => 86,  227 => 84,  201 => 63,  198 => 62,  195 => 61,  192 => 60,  189 => 59,  186 => 58,  183 => 57,  180 => 56,  177 => 55,  174 => 54,  171 => 53,  168 => 52,  165 => 51,  162 => 50,  159 => 49,  157 => 48,  152 => 46,  149 => 45,  143 => 42,  139 => 41,  135 => 40,  131 => 39,  127 => 38,  123 => 37,  119 => 36,  115 => 35,  111 => 34,  107 => 33,  103 => 32,  99 => 31,  95 => 30,  91 => 28,  88 => 27,  86 => 26,  83 => 25,  79 => 24,  71 => 19,  66 => 17,  63 => 16,  60 => 15,  57 => 14,  54 => 13,  51 => 12,  48 => 11,  45 => 10,  42 => 9,  39 => 8,  36 => 7,  33 => 6,  30 => 5,  27 => 4,  24 => 3,  21 => 2,  19 => 1,);
    }
}
