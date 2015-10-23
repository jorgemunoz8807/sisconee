<?php

/* layout_general_menu.html.twig */
class __TwigTemplate_eda7c9655ff6c270e41729551ac2cb85bbf3a876c2212261bc40afb4d3958a05 extends Twig_Template
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
        echo "<nav class=\"navbar navbar-inverse\" role=\"navigation\">
    ";
        // line 3
        echo "    <div class=\"collapse navbar-collapse navbar-ex1-collapse\">
        <ul class=\"nav navbar-nav\">

            ";
        // line 7
        echo "            ";
        if ((($this->env->getExtension('security')->isGranted("ROLE_PLANIFICADOR_SUP") || $this->env->getExtension('security')->isGranted("ROLE_PLANIFICADOR_ENT")) || $this->env->getExtension('security')->isGranted("ROLE_PLANIFICADOR_SER"))) {
            // line 8
            echo "                <li class=\"dropdown\">
                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Planificación <b class=\"caret\"></b></a>
                    <ul class=\"dropdown-menu\">
                        ";
            // line 11
            if (($this->env->getExtension('security')->isGranted("ROLE_PLANIFICADOR_SUP") || $this->env->getExtension('security')->isGranted("ROLE_PLANIFICADOR_ENT"))) {
                // line 12
                echo "                            <li><a href=\"";
                echo $this->env->getExtension('routing')->getPath("plananualentidad");
                echo "\">Plan Anual por Entidades</a></li>
                            <li><a href=\"";
                // line 13
                echo $this->env->getExtension('routing')->getPath("plananualservicio");
                echo "\">Plan Anual por Servicios</a></li>
                            <li><a href=\"";
                // line 14
                echo $this->env->getExtension('routing')->getPath("planmensualservicio");
                echo "\">Plan Mensual por Servicios</a></li>
                        ";
            }
            // line 16
            echo "                        <li><a href=\"";
            echo $this->env->getExtension('routing')->getPath("plandiarioservicio");
            echo "\">Plan Diario por Servicios</a></li>
                    </ul>
                </li>
            ";
        }
        // line 20
        echo "
            ";
        // line 22
        echo "            ";
        if (((($this->env->getExtension('security')->isGranted("ROLE_PLANIFICADOR_SUP") || $this->env->getExtension('security')->isGranted("ROLE_PLANIFICADOR_ENT")) || $this->env->getExtension('security')->isGranted("ROLE_PLANIFICADOR_SER")) || $this->env->getExtension('security')->isGranted("ROLE_REGISTRADOR_SER"))) {
            // line 23
            echo "                <li>
                    <a href=\"";
            // line 24
            echo $this->env->getExtension('routing')->getPath("registro_lecturas");
            echo "\"> Consumo </a>
                </li>
            ";
        }
        // line 27
        echo "
            ";
        // line 29
        echo "            ";
        if (((($this->env->getExtension('security')->isGranted("ROLE_PLANIFICADOR_SUP") || $this->env->getExtension('security')->isGranted("ROLE_PLANIFICADOR_ENT")) || $this->env->getExtension('security')->isGranted("ROLE_SUPERVISOR_SUP")) || $this->env->getExtension('security')->isGranted("ROLE_SUPERVISOR_ENT"))) {
            // line 30
            echo "                <li class=\"dropdown\">
                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Reportes <b class=\"caret\"></b></a>
                    <ul class=\"dropdown-menu\">
                        <li>
                            <a href=\"";
            // line 34
            echo $this->env->getExtension('routing')->getPath("sisconee_app_reportes", array("Nomb_Report" => "plan_mensual"));
            echo "\"><span></span>Plan
                                Mensual</a></li>
                        <li>
                            <a href=\"";
            // line 37
            echo $this->env->getExtension('routing')->getPath("sisconee_app_reportes", array("Nomb_Report" => "comportamiento_diario"));
            echo "\"><span></span>Comportamiento
                                Diario</a></li>
                        <li>
                            <a href=\"";
            // line 40
            echo $this->env->getExtension('routing')->getPath("sisconee_app_reportes", array("Nomb_Report" => "parte_diario"));
            echo "\"><span></span>Parte
                                Diario</a></li>
                        <li>
                            <a href=\"";
            // line 43
            echo $this->env->getExtension('routing')->getPath("sisconee_app_reportes", array("Nomb_Report" => "consumo_acumulado"));
            echo "\"><span></span>Consumo
                                Acumulado General</a></li>
                        <li>
                            <a href=\"";
            // line 46
            echo $this->env->getExtension('routing')->getPath("sisconee_app_reportes", array("Nomb_Report" => "consumo_acumulado_hp"));
            echo "\"><span></span>Consumo
                                Acumulado Horario Pico</a></li>
                    </ul>
                </li>
            ";
        }
        // line 51
        echo "

        </ul>
        ";
        // line 55
        echo "        ";
        // line 61
        echo "
        ";
        // line 63
        echo "        ";
        if (($this->env->getExtension('security')->isGranted("ROLE_PLANIFICADOR_SUP") || $this->env->getExtension('security')->isGranted("ROLE_PLANIFICADOR_ENT"))) {
            // line 64
            echo "            <ul class=\"nav navbar-nav navbar-right\">
                <li class=\"dropdown\">
                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Administración <b class=\"caret\"></b></a>
                    <ul class=\"dropdown-menu\">
                        ";
            // line 68
            if ($this->env->getExtension('security')->isGranted("ROLE_PLANIFICADOR_SUP")) {
                // line 69
                echo "                            <li><a href=\"";
                echo $this->env->getExtension('routing')->getPath("configuracion_edit");
                echo "\">Configuración General</a></li>
                        ";
            }
            // line 71
            echo "                        <li><a href=\"";
            echo $this->env->getExtension('routing')->getPath("administracion_usuario");
            echo "\">Gestionar Usuarios</a></li>
                        <li><a href=\"";
            // line 72
            echo $this->env->getExtension('routing')->getPath("administracion_entidad");
            echo "\">Gestionar Entidades</a></li>
                        ";
            // line 73
            if ($this->env->getExtension('security')->isGranted("ROLE_PLANIFICADOR_SUP")) {
                // line 74
                echo "                            <li><a href=";
                echo $this->env->getExtension('routing')->getPath("administracion_tiposervicio");
                echo ">Gestionar Tipos de Servicio</a></li>
                        ";
            }
            // line 76
            echo "                        <li><a href=\"";
            echo $this->env->getExtension('routing')->getPath("administracion_servicio");
            echo "\">Gestionar Servicios</a></li>
                        ";
            // line 77
            if ($this->env->getExtension('security')->isGranted("ROLE_PLANIFICADOR_SUP")) {
                // line 78
                echo "                            <li><a href=\"#\">Historial de Operaciones</a></li>
                        ";
            }
            // line 80
            echo "
                    </ul>
                </li>
            </ul>
        ";
        }
        // line 85
        echo "
    </div>
</nav>


";
    }

    public function getTemplateName()
    {
        return "layout_general_menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  173 => 80,  169 => 78,  167 => 77,  150 => 72,  145 => 71,  139 => 69,  137 => 68,  128 => 63,  118 => 51,  98 => 40,  86 => 34,  80 => 30,  46 => 14,  30 => 8,  27 => 7,  22 => 3,  220 => 111,  218 => 109,  216 => 108,  214 => 107,  212 => 106,  210 => 105,  208 => 104,  206 => 103,  204 => 102,  202 => 101,  200 => 100,  198 => 99,  196 => 98,  194 => 97,  192 => 96,  190 => 95,  187 => 93,  185 => 92,  183 => 91,  180 => 85,  178 => 88,  176 => 87,  174 => 86,  172 => 85,  170 => 84,  168 => 83,  166 => 82,  164 => 81,  162 => 76,  160 => 79,  158 => 78,  156 => 74,  154 => 73,  151 => 74,  149 => 73,  147 => 72,  144 => 70,  142 => 69,  140 => 68,  138 => 67,  136 => 66,  134 => 65,  131 => 64,  129 => 62,  127 => 61,  125 => 61,  123 => 55,  121 => 58,  119 => 57,  117 => 56,  115 => 55,  110 => 46,  108 => 51,  106 => 50,  87 => 35,  85 => 34,  79 => 31,  76 => 30,  74 => 27,  62 => 22,  52 => 17,  48 => 16,  38 => 13,  34 => 9,  26 => 6,  19 => 1,  68 => 24,  58 => 20,  47 => 12,  42 => 13,  33 => 6,  29 => 7,  23 => 4,  113 => 54,  109 => 36,  104 => 43,  96 => 26,  93 => 39,  82 => 33,  78 => 23,  75 => 22,  72 => 21,  65 => 23,  60 => 16,  57 => 14,  55 => 13,  53 => 5,  49 => 10,  44 => 11,  41 => 8,  35 => 11,  32 => 3,  101 => 34,  97 => 50,  92 => 37,  89 => 31,  84 => 28,  77 => 29,  67 => 25,  63 => 10,  59 => 20,  51 => 16,  45 => 7,  43 => 6,  40 => 5,  37 => 12,  31 => 8,);
    }
}
