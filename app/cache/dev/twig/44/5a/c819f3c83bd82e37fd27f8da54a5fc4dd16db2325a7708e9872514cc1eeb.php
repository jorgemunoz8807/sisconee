<?php

/* sisconeeAppBundle:Reports:listado_consumo_acumuladoPDF.html.twig */
class __TwigTemplate_445ac819f3c83bd82e37fd27f8da54a5fc4dd16db2325a7708e9872514cc1eeb extends Twig_Template
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
            echo "            ";
            $context["NombreProvincia"] = "";
            // line 4
            echo "             ";
            $context["NombreEntidad"] = "";
            // line 5
            echo "        <h1>Organismo:";
            echo twig_escape_filter($this->env, (isset($context["organismo"]) ? $context["organismo"] : $this->getContext($context, "organismo")), "html", null, true);
            echo "</h1>
        <br>
        <h1>Consumo acumulado general</h1>
        <br>
        <table class=\"table table-bordered table-hover table-striped\" style=\"border: 1px solid #000000\">

            ";
            // line 11
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["Listado"]) ? $context["Listado"] : $this->getContext($context, "Listado")));
            foreach ($context['_seq'] as $context["_key"] => $context["e"]) {
                // line 12
                echo "
                ";
                // line 13
                if (((isset($context["NombreProvincia"]) ? $context["NombreProvincia"] : $this->getContext($context, "NombreProvincia")) != $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "nombProvincia", array(), "array"))) {
                    // line 14
                    echo "
                    <tr style=\"border: 1px solid #000000\">
                        <th colspan=\"34\" style=\"border: 1px solid #000000\">";
                    // line 16
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "nombProvincia", array(), "array"), "html", null, true);
                    echo "</th>
                    </tr>

                ";
                }
                // line 20
                echo "                ";
                if (((isset($context["NombreEntidad"]) ? $context["NombreEntidad"] : $this->getContext($context, "NombreEntidad")) != $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "NombEntidad", array(), "array"))) {
                    // line 21
                    echo "                    <tr style=\"border: 1px solid #000000\">
                        <th colspan=\"34\" style=\"border: 1px solid #000000\">";
                    // line 22
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "NombEntidad", array(), "array"), "html", null, true);
                    echo "</th>
                    </tr>
                    <tr style=\"border: 1px solid #000000\">
                        <th style=\"border: 1px solid #000000\">Código CEE</th>
                        <th style=\"border: 1px solid #000000\">CRF</th>
                        <th style=\"border: 1px solid #000000\">Nombre del Servicio</th>
                        <th style=\"border: 1px solid #000000\">Dia 1</th>
                        <th style=\"border: 1px solid #000000\">Dia 2</th>
                        <th style=\"border: 1px solid #000000\">Dia 3</th>
                        <th style=\"border: 1px solid #000000\">Dia 4</th>
                        <th style=\"border: 1px solid #000000\">Dia 5</th>
                        <th style=\"border: 1px solid #000000\">Dia 6</th>
                        <th style=\"border: 1px solid #000000\">Dia 7</th>
                        <th style=\"border: 1px solid #000000\">Dia 8</th>
                        <th style=\"border: 1px solid #000000\">Dia 9</th>
                        <th style=\"border: 1px solid #000000\">Dia 10</th>
                        <th style=\"border: 1px solid #000000\">Dia 11</th>
                        <th style=\"border: 1px solid #000000\">Dia 12</th>
                        <th style=\"border: 1px solid #000000\">Dia 13</th>
                        <th style=\"border: 1px solid #000000\">Dia 14</th>
                        <th style=\"border: 1px solid #000000\">Dia 15</th>
                        <th style=\"border: 1px solid #000000\">Dia 16</th>
                        <th style=\"border: 1px solid #000000\">Dia 17</th>
                        <th style=\"border: 1px solid #000000\">Dia 18</th>
                        <th style=\"border: 1px solid #000000\">Dia 19</th>
                        <th style=\"border: 1px solid #000000\">Dia 20</th>
                        <th style=\"border: 1px solid #000000\">Dia 21</th>
                        <th style=\"border: 1px solid #000000\">Dia 22</th>
                        <th style=\"border: 1px solid #000000\">Dia 23</th>
                        <th style=\"border: 1px solid #000000\">Dia 24</th>
                        <th style=\"border: 1px solid #000000\">Dia 25</th>
                        <th style=\"border: 1px solid #000000\">Dia 26</th>
                        <th style=\"border: 1px solid #000000\">Dia 27</th>
                        <th style=\"border: 1px solid #000000\">Dia 28</th>
                        <th style=\"border: 1px solid #000000\">Dia 29</th>
                        <th style=\"border: 1px solid #000000\">Dia 30</th>
                        <th style=\"border: 1px solid #000000\">Dia 31</th>
                    </tr>
                ";
                }
                // line 61
                echo "
                <tr style=\"border: 1px solid #000000\">
                    <td style=\"border: 1px solid #000000\">";
                // line 63
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "codcliente_EE", array(), "array"), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 64
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "codRF", array(), "array"), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 65
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "nombServicio", array(), "array"), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 66
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "1", array(), "array"), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 67
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "2", array(), "array"), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 68
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "3", array(), "array"), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 69
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "4", array(), "array"), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 70
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "5", array(), "array"), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 71
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "6", array(), "array"), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 72
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "7", array(), "array"), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 73
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "8", array(), "array"), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 74
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "9", array(), "array"), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 75
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "10", array(), "array"), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 76
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "11", array(), "array"), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 77
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "12", array(), "array"), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 78
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "13", array(), "array"), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 79
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "14", array(), "array"), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 80
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "15", array(), "array"), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 81
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "16", array(), "array"), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 82
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "17", array(), "array"), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 83
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "18", array(), "array"), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 84
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "19", array(), "array"), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 85
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "20", array(), "array"), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 86
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "21", array(), "array"), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 87
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "22", array(), "array"), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 88
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "23", array(), "array"), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 89
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "24", array(), "array"), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 90
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "25", array(), "array"), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 91
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "26", array(), "array"), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 92
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "27", array(), "array"), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 93
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "28", array(), "array"), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 94
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "29", array(), "array"), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 95
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "30", array(), "array"), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 96
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "31", array(), "array"), "html", null, true);
                echo "</td>
                </tr>
                <tr class=\"text-success\" style=\"border: 1px solid #000000\">
                    <td colspan=\"3\" style=\"border: 1px solid #000000\">Resta por consumir</td>

                    <td style=\"border: 1px solid #000000\">";
                // line 101
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array") - $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "1", array(), "array")), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 102
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array") - $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "2", array(), "array")), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 103
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array") - $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "3", array(), "array")), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 104
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array") - $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "4", array(), "array")), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 105
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array") - $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "5", array(), "array")), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 106
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array") - $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "6", array(), "array")), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 107
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array") - $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "7", array(), "array")), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 108
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array") - $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "8", array(), "array")), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 109
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array") - $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "9", array(), "array")), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 110
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array") - $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "10", array(), "array")), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 111
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array") - $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "11", array(), "array")), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 112
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array") - $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "12", array(), "array")), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 113
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array") - $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "13", array(), "array")), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 114
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array") - $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "14", array(), "array")), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 115
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array") - $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "15", array(), "array")), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 116
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array") - $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "16", array(), "array")), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 117
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array") - $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "17", array(), "array")), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 118
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array") - $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "18", array(), "array")), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 119
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array") - $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "19", array(), "array")), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 120
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array") - $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "20", array(), "array")), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 121
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array") - $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "21", array(), "array")), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 122
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array") - $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "22", array(), "array")), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 123
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array") - $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "23", array(), "array")), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 124
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array") - $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "24", array(), "array")), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 125
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array") - $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "25", array(), "array")), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 126
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array") - $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "26", array(), "array")), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 127
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array") - $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "27", array(), "array")), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 128
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array") - $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "28", array(), "array")), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 129
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array") - $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "29", array(), "array")), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 130
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array") - $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "30", array(), "array")), "html", null, true);
                echo "</td>
                    <td style=\"border: 1px solid #000000\">";
                // line 131
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array") - $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "31", array(), "array")), "html", null, true);
                echo "</td>
                </tr>


            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['e'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 136
            echo "

        </table>
";
        } else {
            // line 140
            echo "
    <h1>No hay datos a mostrar</h1>


";
        }
    }

    public function getTemplateName()
    {
        return "sisconeeAppBundle:Reports:listado_consumo_acumuladoPDF.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  389 => 140,  383 => 136,  372 => 131,  368 => 130,  364 => 129,  360 => 128,  356 => 127,  352 => 126,  348 => 125,  344 => 124,  340 => 123,  336 => 122,  332 => 121,  328 => 120,  324 => 119,  320 => 118,  316 => 117,  312 => 116,  308 => 115,  304 => 114,  300 => 113,  296 => 112,  292 => 111,  288 => 110,  284 => 109,  280 => 108,  276 => 107,  272 => 106,  268 => 105,  264 => 104,  260 => 103,  256 => 102,  252 => 101,  244 => 96,  240 => 95,  236 => 94,  232 => 93,  228 => 92,  224 => 91,  220 => 90,  216 => 89,  212 => 88,  208 => 87,  204 => 86,  200 => 85,  196 => 84,  192 => 83,  188 => 82,  184 => 81,  180 => 80,  176 => 79,  172 => 78,  168 => 77,  164 => 76,  160 => 75,  156 => 74,  152 => 73,  148 => 72,  144 => 71,  140 => 70,  136 => 69,  132 => 68,  128 => 67,  124 => 66,  120 => 65,  116 => 64,  112 => 63,  108 => 61,  66 => 22,  63 => 21,  60 => 20,  53 => 16,  49 => 14,  47 => 13,  44 => 12,  40 => 11,  30 => 5,  27 => 4,  24 => 3,  22 => 2,  19 => 1,);
    }
}
