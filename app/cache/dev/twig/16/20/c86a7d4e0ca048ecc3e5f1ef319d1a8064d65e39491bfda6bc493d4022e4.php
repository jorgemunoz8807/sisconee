<?php

/* ::layout_modules_menu.html.twig */
class __TwigTemplate_1620c86a7d4e0ca048ecc3e5f1ef319d1a8064d65e39491bfda6bc493d4022e4 extends Twig_Template
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
        echo "<nav class=\"navbar navbar-inverse navbar-fixed-top\" role=\"navigation\">

    ";
        // line 4
        echo "    <ul class=\"nav navbar-nav\">
        <li class=\"dropdown\">
            <a style=\"color: #fff\" href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\"><span
                        class=\"glyphicon glyphicon-home\"></span> <b class=\"caret\"></b></a>

            <ul class=\"dropdown-menu\">
                <li><a href=\"";
        // line 10
        echo $this->env->getExtension('routing')->getPath("inicio");
        echo "\"> Inicio </a></li>
                <li class=\"divider\"></li>
                ";
        // line 12
        if (($this->env->getExtension('security')->isGranted("ROLE_PLANIFICADOR_SUP") || $this->env->getExtension('security')->isGranted("ROLE_PLANIFICADOR_ENT"))) {
            // line 13
            echo "                    <li><a href=\"";
            echo $this->env->getExtension('routing')->getPath("administracion");
            echo " \">Administración</a></li>
                    <li><a href=\"";
            // line 14
            echo $this->env->getExtension('routing')->getPath("sisconee_app_planificacion");
            echo "\">Planificación</a></li>
                    <li><a href=\"";
            // line 15
            echo $this->env->getExtension('routing')->getPath("registro_lecturas");
            echo "\">Consumo </a></li>
                    <li><a href=\"";
            // line 16
            echo $this->env->getExtension('routing')->getPath("index_reportes");
            echo "\">Reportes</a></li>
                ";
        }
        // line 18
        echo "                ";
        if ($this->env->getExtension('security')->isGranted("ROLE_PLANIFICADOR_SER")) {
            // line 19
            echo "                    <li><a href=\"";
            echo $this->env->getExtension('routing')->getPath("sisconee_app_planificacion");
            echo "\">Planificación</a></li>
                    <li><a href=\"";
            // line 20
            echo $this->env->getExtension('routing')->getPath("registro_lecturas");
            echo "\">Consumo </a></li>
                ";
        }
        // line 22
        echo "                ";
        if ($this->env->getExtension('security')->isGranted("ROLE_REGISTRADOR_SER")) {
            // line 23
            echo "                    <li><a href=\"";
            echo $this->env->getExtension('routing')->getPath("registro_lecturas");
            echo "\">Consumo </a></li>
                ";
        }
        // line 25
        echo "                ";
        if (($this->env->getExtension('security')->isGranted("ROLE_SUPERVISOR_SUP") || $this->env->getExtension('security')->isGranted("ROLE_SUPERVISOR_ENT"))) {
            // line 26
            echo "                    <li><a href=\"";
            echo $this->env->getExtension('routing')->getPath("index_reportes");
            echo "\">Reportes </a></li>
                ";
        }
        // line 28
        echo "            </ul>
        </li>
    </ul>

    ";
        // line 33
        echo "    <div class=\"navbar-header\">
        <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\"
                data-target=\"#bs-example-navbar-collapse-1\">
            <span class=\"sr-only\">Toggle navigation</span>
            <span class=\"icon-bar\"></span>
            <span class=\"icon-bar\"></span>
            <span class=\"icon-bar\"></span>
        </button>
        ";
        // line 42
        echo "        <a class=\"navbar-brand\" href=\"";
        echo twig_escape_filter($this->env, (isset($context["submenuHref"]) ? $context["submenuHref"] : $this->getContext($context, "submenuHref")), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, (isset($context["submenuTitle"]) ? $context["submenuTitle"] : $this->getContext($context, "submenuTitle")), "html", null, true);
        echo "</a>

    </div>

    ";
        // line 47
        echo "    ";
        // line 48
        echo "    ";
        // line 49
        echo "    ";
        // line 50
        echo "    ";
        // line 51
        echo "    ";
        // line 52
        echo "    ";
        // line 53
        echo "
    ";
        // line 55
        echo "    <div class=\"nav navbar-nav\">
        <ul class=\"nav navbar-nav\">
            ";
        // line 57
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_array_keys_filter((isset($context["submenuOptions"]) ? $context["submenuOptions"] : $this->getContext($context, "submenuOptions"))));
        foreach ($context['_seq'] as $context["_key"] => $context["opt"]) {
            // line 58
            echo "                ";
            // line 59
            echo "                ";
            if (((isset($context["opt"]) ? $context["opt"] : $this->getContext($context, "opt")) == "Consumo Acumulado")) {
                // line 60
                echo "                    ";
                $context["consumoGralHref"] = $this->env->getExtension('routing')->getPath("sisconee_app_reportes", array("Nomb_Report" => "consumo_acumulado"));
                // line 61
                echo "                    ";
                $context["consumoHpHref"] = $this->env->getExtension('routing')->getPath("sisconee_app_reportes", array("Nomb_Report" => "consumo_acumulado_hp"));
                // line 62
                echo "                    <li class=\"divider-vertical\"></li>
                    <li>
                        <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Consumo Acumulado <b class=\"caret\"></b></a>
                        <ul class=\"dropdown-menu\">
                            <li>
                                <a class=\"menu_option ";
                // line 67
                echo "\"
                                   id=";
                // line 68
                echo twig_escape_filter($this->env, (isset($context["idValue"]) ? $context["idValue"] : $this->getContext($context, "idValue")), "html", null, true);
                echo " href=\"";
                echo twig_escape_filter($this->env, (isset($context["consumoGralHref"]) ? $context["consumoGralHref"] : $this->getContext($context, "consumoGralHref")), "html", null, true);
                echo " \"> Acumulado General </a>
                            </li>
                            <li>
                                <a class=\"menu_option ";
                // line 71
                echo "\"
                                   id=";
                // line 72
                echo twig_escape_filter($this->env, (isset($context["idValue"]) ? $context["idValue"] : $this->getContext($context, "idValue")), "html", null, true);
                echo " href=\"";
                echo twig_escape_filter($this->env, (isset($context["consumoHpHref"]) ? $context["consumoHpHref"] : $this->getContext($context, "consumoHpHref")), "html", null, true);
                echo " \"> Acumuado Horario Pico </a>
                            </li>
                        </ul>
                    </li>
                ";
            } else {
                // line 77
                echo "                    <li class=\"divider-vertical\"></li>
                    ";
                // line 79
                echo "                    ";
                $context["optValue"] = strtr((isset($context["opt"]) ? $context["opt"] : $this->getContext($context, "opt")), " ", "_");
                // line 80
                echo "                    ";
                $context["idValue"] = ("option_" . (isset($context["optValue"]) ? $context["optValue"] : $this->getContext($context, "optValue")));
                // line 81
                echo "                    <li><a class=\"menu_option ";
                echo "\"
                           id=";
                // line 82
                echo twig_escape_filter($this->env, (isset($context["idValue"]) ? $context["idValue"] : $this->getContext($context, "idValue")), "html", null, true);
                echo " href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["submenuOptions"]) ? $context["submenuOptions"] : $this->getContext($context, "submenuOptions")), (isset($context["opt"]) ? $context["opt"] : $this->getContext($context, "opt")), array(), "array"), "html", null, true);
                echo " \">";
                echo twig_escape_filter($this->env, (isset($context["opt"]) ? $context["opt"] : $this->getContext($context, "opt")), "html", null, true);
                echo "</a></li>
                    ";
                // line 84
                echo "                ";
            }
            // line 85
            echo "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['opt'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 86
        echo "        </ul>
    </div>

    ";
        // line 90
        echo "    <div class=\"container-fluid\">
        <ul class=\"nav navbar-nav navbar-right\">
            <li>
                <a ";
        // line 93
        echo " href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\"><span
                            class=\"glyphicon glyphicon-user\"></span> ";
        // line 94
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "nombre"), "html", null, true);
        echo " <b class=\"caret\"></b></a>

                <ul class=\"dropdown-menu\">
                    ";
        // line 98
        echo "
                    <li><a href=\"";
        // line 99
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("usuario_edit", array("id" => $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "id"))), "html", null, true);
        echo "\">Editar cuenta</a>
                    </li>
                    ";
        // line 102
        echo "                    ";
        // line 103
        echo "                    <li><a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("usuario_edit_password", array("id" => $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "id"))), "html", null, true);
        echo "\">Cambiar contraseña</a>
                        ";
        // line 105
        echo "
                    </li>
                </ul>

            </li>
            <li><a class=\"vinculo-white\" href=\"";
        // line 110
        echo $this->env->getExtension('routing')->getPath("inicio");
        echo "\"><span
                            class=\"glyphicon glyphicon-remove\"></span>Salir</a></li>
        </ul>
    </div>
</nav>";
    }

    public function getTemplateName()
    {
        return "::layout_modules_menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  249 => 110,  242 => 105,  237 => 103,  235 => 102,  230 => 99,  227 => 98,  221 => 94,  218 => 93,  213 => 90,  208 => 86,  202 => 85,  199 => 84,  191 => 82,  187 => 81,  184 => 80,  181 => 79,  178 => 77,  168 => 72,  165 => 71,  157 => 68,  154 => 67,  147 => 62,  144 => 61,  141 => 60,  138 => 59,  136 => 58,  132 => 57,  128 => 55,  125 => 53,  123 => 52,  121 => 51,  119 => 50,  117 => 49,  115 => 48,  113 => 47,  103 => 42,  93 => 33,  87 => 28,  81 => 26,  78 => 25,  72 => 23,  69 => 22,  64 => 20,  59 => 19,  56 => 18,  51 => 16,  47 => 15,  43 => 14,  38 => 13,  36 => 12,  31 => 10,  23 => 4,  19 => 1,);
    }
}
