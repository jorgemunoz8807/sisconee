<?php

/* layout_general-header.html.twig */
class __TwigTemplate_829eb5e27b67ea788208dd54810a394fdbd585871051ee8c55db9b1eef787714 extends Twig_Template
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
        echo "<div class=\"container\">

";
        // line 4
        echo "
    <div class=\"row\">  ";
        // line 6
        echo "        <div class=\"col-sm-12  col-sm-12 col-lg-12\">
            ";
        // line 7
        if ($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user")) {
            // line 8
            echo "            ";
            if (($this->env->getExtension('security')->isGranted("ROLE_PLANIFICADOR_SUP") || $this->env->getExtension('security')->isGranted("ROLE_PLANIFICADOR_ENT"))) {
                // line 9
                echo "

               ";
                // line 13
                echo "
                <ul class=\"nav nav-pills navbar-right account_desc\">
                    <li><a  href=\"";
                // line 15
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("administracion_usuario_edit", array("id" => $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "id"))), "html", null, true);
                echo "\" >";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "nombre"), "html", null, true);
                echo "</a></li>
                    <li><a href=\"";
                // line 16
                echo $this->env->getExtension('routing')->getPath("administracion");
                echo "\">Administrar</a></li>
                    <li><a  href=\"";
                // line 17
                echo $this->env->getExtension('routing')->getPath("usuario_logout");
                echo "\"> Cerrar sesión</a></li>
                </ul>
            ";
            }
            // line 20
            echo "
            ";
        }
        // line 22
        echo "        </div>
        <div class=\"col-md-12\">

            <a class=\"logo\" href=\"#\"><img src=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("layout_general/images/logoSisconee.png"), "html", null, true);
        echo "\" alt=\"\" /></a>
        </div>
    </div>

    ";
        // line 29
        if ($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user")) {
            // line 30
            echo "    <div class=\"row \">
        <div class=\"row ";
            // line 31
            echo "\" >
            ";
            // line 33
            echo "            ";
            $this->env->loadTemplate("layout_general_menu.html.twig")->display($context);
            // line 34
            echo "            ";
            // line 35
            echo "
        </div>
    </div>
    ";
        }
        // line 39
        echo "



</div>




";
        // line 49
        echo " ";
        // line 50
        echo " ";
        // line 51
        echo "  ";
        // line 52
        echo "
";
        // line 54
        echo "    ";
        // line 55
        echo "        ";
        // line 56
        echo "            ";
        // line 57
        echo "                ";
        // line 58
        echo "            ";
        // line 59
        echo "            ";
        // line 60
        echo "                ";
        // line 61
        echo "                    ";
        // line 62
        echo "                        ";
        // line 63
        echo "
                        ";
        // line 65
        echo "                           ";
        // line 66
        echo "                                ";
        // line 67
        echo "                                ";
        // line 68
        echo "                                ";
        // line 69
        echo "                            ";
        // line 70
        echo "
                            ";
        // line 72
        echo "                        ";
        // line 73
        echo "                        ";
        // line 74
        echo "
                        ";
        // line 76
        echo "                    ";
        // line 77
        echo "                        ";
        // line 78
        echo "                        ";
        // line 79
        echo "                    ";
        // line 80
        echo "                ";
        // line 81
        echo "            ";
        // line 82
        echo "             ";
        // line 83
        echo "        ";
        // line 84
        echo "        ";
        // line 85
        echo "            ";
        // line 86
        echo "                ";
        // line 87
        echo "            ";
        // line 88
        echo "            ";
        // line 89
        echo "
                ";
        // line 91
        echo "                    ";
        // line 92
        echo "                ";
        // line 93
        echo "
            ";
        // line 95
        echo "            ";
        // line 96
        echo "        ";
        // line 97
        echo "        ";
        // line 98
        echo "            ";
        // line 99
        echo "                ";
        // line 100
        echo "                ";
        // line 101
        echo "            ";
        // line 102
        echo "            ";
        // line 103
        echo "                ";
        // line 104
        echo "                    ";
        // line 105
        echo "                ";
        // line 106
        echo "            ";
        // line 107
        echo "            ";
        // line 108
        echo "        ";
        // line 109
        echo "    ";
        // line 111
        echo "
";
    }

    public function getTemplateName()
    {
        return "layout_general-header.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  220 => 111,  218 => 109,  216 => 108,  214 => 107,  212 => 106,  210 => 105,  208 => 104,  206 => 103,  204 => 102,  202 => 101,  200 => 100,  198 => 99,  196 => 98,  194 => 97,  192 => 96,  190 => 95,  187 => 93,  185 => 92,  183 => 91,  180 => 89,  178 => 88,  176 => 87,  174 => 86,  172 => 85,  170 => 84,  168 => 83,  166 => 82,  164 => 81,  162 => 80,  160 => 79,  158 => 78,  156 => 77,  154 => 76,  151 => 74,  149 => 73,  147 => 72,  144 => 70,  142 => 69,  140 => 68,  138 => 67,  136 => 66,  134 => 65,  131 => 63,  129 => 62,  127 => 61,  125 => 60,  123 => 59,  121 => 58,  119 => 57,  117 => 56,  115 => 55,  110 => 52,  108 => 51,  106 => 50,  87 => 35,  85 => 34,  79 => 31,  76 => 30,  74 => 29,  62 => 22,  52 => 17,  48 => 16,  38 => 13,  34 => 9,  26 => 6,  19 => 1,  68 => 11,  58 => 20,  47 => 12,  42 => 15,  33 => 6,  29 => 7,  23 => 4,  113 => 54,  109 => 36,  104 => 49,  96 => 26,  93 => 39,  82 => 33,  78 => 23,  75 => 22,  72 => 21,  65 => 17,  60 => 16,  57 => 14,  55 => 13,  53 => 5,  49 => 10,  44 => 11,  41 => 8,  35 => 7,  32 => 3,  101 => 34,  97 => 50,  92 => 49,  89 => 31,  84 => 28,  77 => 43,  67 => 25,  63 => 10,  59 => 15,  51 => 9,  45 => 7,  43 => 6,  40 => 5,  37 => 4,  31 => 8,);
    }
}
