<?php

/* sisconeeAppBundle:Reports:listado_consumo_acumulado.html.twig */
class __TwigTemplate_3503443dbd22cb8d2843d2ea242a7b8903d1409ffd2a3b170e2f9ddb73560889 extends Twig_Template
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
        <table class=\"table table-bordered table-hover table-striped\">

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
                    <tr>
                        <th colspan=\"34\">";
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
                    echo "                    <tr>
                        <th colspan=\"34\">";
                    // line 22
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "NombEntidad", array(), "array"), "html", null, true);
                    echo "</th>
                    </tr>
                    <tr>
                        <th>Código CEE</th>
                        <th>CRF</th>
                        <th>Nombre del Servicio</th>
                        <th>Dia 1</th>
                        <th>Dia 2</th>
                        <th>Dia 3</th>
                        <th>Dia 4</th>
                        <th>Dia 5</th>
                        <th>Dia 6</th>
                        <th>Dia 7</th>
                        <th>Dia 8</th>
                        <th>Dia 9</th>
                        <th>Dia 10</th>
                        <th>Dia 11</th>
                        <th>Dia 12</th>
                        <th>Dia 13</th>
                        <th>Dia 14</th>
                        <th>Dia 15</th>
                        <th>Dia 16</th>
                        <th>Dia 17</th>
                        <th>Dia 18</th>
                        <th>Dia 19</th>
                        <th>Dia 20</th>
                        <th>Dia 21</th>
                        <th>Dia 22</th>
                        <th>Dia 23</th>
                        <th>Dia 24</th>
                        <th>Dia 25</th>
                        <th>Dia 26</th>
                        <th>Dia 27</th>
                        <th>Dia 28</th>
                        <th>Dia 29</th>
                        <th>Dia 30</th>
                        <th>Dia 31</th>
                    </tr>
                ";
                }
                // line 61
                echo "
                <tr>
                    <td>";
                // line 63
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "codcliente_EE", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 64
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "codRF", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 65
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "nombServicio", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 66
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "1", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 67
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "2", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 68
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "3", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 69
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "4", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 70
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "5", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 71
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "6", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 72
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "7", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 73
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "8", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 74
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "9", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 75
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "10", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 76
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "11", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 77
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "12", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 78
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "13", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 79
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "14", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 80
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "15", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 81
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "16", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 82
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "17", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 83
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "18", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 84
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "19", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 85
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "20", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 86
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "21", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 87
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "22", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 88
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "23", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 89
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "24", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 90
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "25", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 91
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "26", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 92
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "27", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 93
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "28", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 94
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "29", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 95
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "30", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 96
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "31", array(), "array"), "html", null, true);
                echo "</td>
                </tr>
                <tr class=\"text-success\">
                    <td colspan=\"3\">Resta por consumir</td>

                    <td>";
                // line 101
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array") - $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "1", array(), "array")), "html", null, true);
                echo "</td>
                    <td>";
                // line 102
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array") - $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "2", array(), "array")), "html", null, true);
                echo "</td>
                    <td>";
                // line 103
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array") - $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "3", array(), "array")), "html", null, true);
                echo "</td>
                    <td>";
                // line 104
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array") - $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "4", array(), "array")), "html", null, true);
                echo "</td>
                    <td>";
                // line 105
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array") - $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "5", array(), "array")), "html", null, true);
                echo "</td>
                    <td>";
                // line 106
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array") - $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "6", array(), "array")), "html", null, true);
                echo "</td>
                    <td>";
                // line 107
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array") - $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "7", array(), "array")), "html", null, true);
                echo "</td>
                    <td>";
                // line 108
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array") - $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "8", array(), "array")), "html", null, true);
                echo "</td>
                    <td>";
                // line 109
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array") - $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "9", array(), "array")), "html", null, true);
                echo "</td>
                    <td>";
                // line 110
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array") - $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "10", array(), "array")), "html", null, true);
                echo "</td>
                    <td>";
                // line 111
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array") - $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "11", array(), "array")), "html", null, true);
                echo "</td>
                    <td>";
                // line 112
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array") - $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "12", array(), "array")), "html", null, true);
                echo "</td>
                    <td>";
                // line 113
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array") - $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "13", array(), "array")), "html", null, true);
                echo "</td>
                    <td>";
                // line 114
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array") - $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "14", array(), "array")), "html", null, true);
                echo "</td>
                    <td>";
                // line 115
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array") - $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "15", array(), "array")), "html", null, true);
                echo "</td>
                    <td>";
                // line 116
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array") - $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "16", array(), "array")), "html", null, true);
                echo "</td>
                    <td>";
                // line 117
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array") - $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "17", array(), "array")), "html", null, true);
                echo "</td>
                    <td>";
                // line 118
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array") - $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "18", array(), "array")), "html", null, true);
                echo "</td>
                    <td>";
                // line 119
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array") - $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "19", array(), "array")), "html", null, true);
                echo "</td>
                    <td>";
                // line 120
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array") - $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "20", array(), "array")), "html", null, true);
                echo "</td>
                    <td>";
                // line 121
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array") - $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "21", array(), "array")), "html", null, true);
                echo "</td>
                    <td>";
                // line 122
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array") - $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "22", array(), "array")), "html", null, true);
                echo "</td>
                    <td>";
                // line 123
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array") - $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "23", array(), "array")), "html", null, true);
                echo "</td>
                    <td>";
                // line 124
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array") - $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "24", array(), "array")), "html", null, true);
                echo "</td>
                    <td>";
                // line 125
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array") - $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "25", array(), "array")), "html", null, true);
                echo "</td>
                    <td>";
                // line 126
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array") - $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "26", array(), "array")), "html", null, true);
                echo "</td>
                    <td>";
                // line 127
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array") - $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "27", array(), "array")), "html", null, true);
                echo "</td>
                    <td>";
                // line 128
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array") - $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "28", array(), "array")), "html", null, true);
                echo "</td>
                    <td>";
                // line 129
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array") - $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "29", array(), "array")), "html", null, true);
                echo "</td>
                    <td>";
                // line 130
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array") - $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "30", array(), "array")), "html", null, true);
                echo "</td>
                    <td>";
                // line 131
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array") - $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "31", array(), "array")), "html", null, true);
                echo "</td>
                </tr>
                <tr class=\"text-success\">
                    <td colspan=\"3\">Porciento consumido con respecto al plan</td>

                    <td>";
                // line 136
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "1", array(), "array") * 100) / $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array")), 1), "html", null, true);
                echo "</td>
                    <td>";
                // line 137
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "2", array(), "array") * 100) / $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array")), 1), "html", null, true);
                echo "</td>
                    <td>";
                // line 138
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "3", array(), "array") * 100) / $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array")), 1), "html", null, true);
                echo "</td>
                    <td>";
                // line 139
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "4", array(), "array") * 100) / $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array")), 1), "html", null, true);
                echo "</td>
                    <td>";
                // line 140
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "5", array(), "array") * 100) / $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array")), 1), "html", null, true);
                echo "</td>
                    <td>";
                // line 141
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "6", array(), "array") * 100) / $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array")), 1), "html", null, true);
                echo "</td>
                    <td>";
                // line 142
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "7", array(), "array") * 100) / $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array")), 1), "html", null, true);
                echo "</td>
                    <td>";
                // line 143
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "8", array(), "array") * 100) / $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array")), 1), "html", null, true);
                echo "</td>
                    <td>";
                // line 144
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "9", array(), "array") * 100) / $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array")), 1), "html", null, true);
                echo "</td>
                    <td>";
                // line 145
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "10", array(), "array") * 100) / $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array")), 1), "html", null, true);
                echo "</td>
                    <td>";
                // line 146
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "11", array(), "array") * 100) / $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array")), 1), "html", null, true);
                echo "</td>
                    <td>";
                // line 147
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "12", array(), "array") * 100) / $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array")), 1), "html", null, true);
                echo "</td>
                    <td>";
                // line 148
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "13", array(), "array") * 100) / $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array")), 1), "html", null, true);
                echo "</td>
                    <td>";
                // line 149
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "14", array(), "array") * 100) / $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array")), 1), "html", null, true);
                echo "</td>
                    <td>";
                // line 150
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "15", array(), "array") * 100) / $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array")), 1), "html", null, true);
                echo "</td>
                    <td>";
                // line 151
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "16", array(), "array") * 100) / $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array")), 1), "html", null, true);
                echo "</td>
                    <td>";
                // line 152
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "17", array(), "array") * 100) / $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array")), 1), "html", null, true);
                echo "</td>
                    <td>";
                // line 153
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "18", array(), "array") * 100) / $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array")), 1), "html", null, true);
                echo "</td>
                    <td>";
                // line 154
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "19", array(), "array") * 100) / $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array")), 1), "html", null, true);
                echo "</td>
                    <td>";
                // line 155
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "20", array(), "array") * 100) / $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array")), 1), "html", null, true);
                echo "</td>
                    <td>";
                // line 156
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "21", array(), "array") * 100) / $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array")), 1), "html", null, true);
                echo "</td>
                    <td>";
                // line 157
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "22", array(), "array") * 100) / $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array")), 1), "html", null, true);
                echo "</td>
                    <td>";
                // line 158
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "23", array(), "array") * 100) / $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array")), 1), "html", null, true);
                echo "</td>
                    <td>";
                // line 159
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "24", array(), "array") * 100) / $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array")), 1), "html", null, true);
                echo "</td>
                    <td>";
                // line 160
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "25", array(), "array") * 100) / $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array")), 1), "html", null, true);
                echo "</td>
                    <td>";
                // line 161
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "26", array(), "array") * 100) / $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array")), 1), "html", null, true);
                echo "</td>
                    <td>";
                // line 162
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "27", array(), "array") * 100) / $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array")), 1), "html", null, true);
                echo "</td>
                    <td>";
                // line 163
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "28", array(), "array") * 100) / $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array")), 1), "html", null, true);
                echo "</td>
                    <td>";
                // line 164
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "29", array(), "array") * 100) / $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array")), 1), "html", null, true);
                echo "</td>
                    <td>";
                // line 165
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "30", array(), "array") * 100) / $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array")), 1), "html", null, true);
                echo "</td>
                    <td>";
                // line 166
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "31", array(), "array") * 100) / $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "plan", array(), "array")), 1), "html", null, true);
                echo "</td>
                </tr>


            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['e'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 171
            echo "

        </table>
";
        } else {
            // line 175
            echo "
    <h1>No hay datos a mostrar</h1>


";
        }
    }

    public function getTemplateName()
    {
        return "sisconeeAppBundle:Reports:listado_consumo_acumulado.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  517 => 175,  511 => 171,  500 => 166,  496 => 165,  492 => 164,  488 => 163,  484 => 162,  480 => 161,  476 => 160,  472 => 159,  468 => 158,  464 => 157,  460 => 156,  456 => 155,  452 => 154,  448 => 153,  444 => 152,  440 => 151,  436 => 150,  432 => 149,  428 => 148,  424 => 147,  420 => 146,  416 => 145,  412 => 144,  408 => 143,  404 => 142,  400 => 141,  396 => 140,  392 => 139,  388 => 138,  384 => 137,  380 => 136,  372 => 131,  368 => 130,  364 => 129,  360 => 128,  356 => 127,  352 => 126,  348 => 125,  344 => 124,  340 => 123,  336 => 122,  332 => 121,  328 => 120,  324 => 119,  320 => 118,  316 => 117,  312 => 116,  308 => 115,  304 => 114,  300 => 113,  296 => 112,  292 => 111,  288 => 110,  284 => 109,  280 => 108,  276 => 107,  272 => 106,  268 => 105,  264 => 104,  260 => 103,  256 => 102,  252 => 101,  244 => 96,  240 => 95,  236 => 94,  232 => 93,  228 => 92,  224 => 91,  220 => 90,  216 => 89,  212 => 88,  208 => 87,  204 => 86,  200 => 85,  196 => 84,  192 => 83,  188 => 82,  184 => 81,  180 => 80,  176 => 79,  172 => 78,  168 => 77,  164 => 76,  160 => 75,  156 => 74,  152 => 73,  148 => 72,  144 => 71,  140 => 70,  136 => 69,  132 => 68,  128 => 67,  124 => 66,  120 => 65,  116 => 64,  112 => 63,  108 => 61,  66 => 22,  63 => 21,  60 => 20,  53 => 16,  49 => 14,  47 => 13,  44 => 12,  40 => 11,  30 => 5,  27 => 4,  24 => 3,  22 => 2,  19 => 1,);
    }
}
