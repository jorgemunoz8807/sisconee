<?php

/* sisconeeAppBundle:GeneralLayout:layout_planificacion.html.twig */
class __TwigTemplate_c60c336b86ab7bac03adb0cca021eb2683f7ce68ac1a8f5dc33c5885b4ea7508 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'content' => array($this, 'block_content'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        // line 4
        echo "    Planificación
";
    }

    // line 7
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 8
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bootstrap/css/bootstrap.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\"/>
    <link href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bootstrap/css/bootstrap-theme.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\"/>
    <link href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("layoutadmin/styles.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\"/>
    ";
        // line 12
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sisconeeapp/css/style-planification.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\"/>
    <link href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sisconeeapp/css/style-modules-menu.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\"/>

";
    }

    // line 17
    public function block_body($context, array $blocks = array())
    {
        // line 18
        echo "
    <style>
        @media (min-width: 768px) {
            .table {
                width: 50%;
            }

            .admin-list-actions.autosize {
                width: 50%;
            }
        }
    </style>

    ";
        // line 31
        $this->env->loadTemplate("::modal-delete.html.twig")->display($context);
        // line 32
        echo "
    <div>
        <div class=\"row\">
            ";
        // line 35
        $context["href"] = $this->env->getExtension('routing')->getPath("sisconee_app_planificacion");
        // line 36
        echo "            ";
        $context["planAnualEntHref"] = $this->env->getExtension('routing')->getPath("plananualentidad");
        // line 37
        echo "            ";
        $context["planAnualSerHref"] = $this->env->getExtension('routing')->getPath("plananualservicio");
        // line 38
        echo "            ";
        $context["planMensualHref"] = $this->env->getExtension('routing')->getPath("planmensualservicio");
        // line 39
        echo "            ";
        $context["planDiarioHref"] = $this->env->getExtension('routing')->getPath("plandiarioservicio");
        // line 40
        echo "
            ";
        // line 42
        echo "
            ";
        // line 43
        if (($this->env->getExtension('security')->isGranted("ROLE_PLANIFICADOR_SUP") || $this->env->getExtension('security')->isGranted("ROLE_PLANIFICADOR_ENT"))) {
            // line 44
            echo "                ";
            $context["submenuOptions"] = array("Anual por entidad" => (isset($context["planAnualEntHref"]) ? $context["planAnualEntHref"] : $this->getContext($context, "planAnualEntHref")), "Anual por servicio" => (isset($context["planAnualSerHref"]) ? $context["planAnualSerHref"] : $this->getContext($context, "planAnualSerHref")), "Mensual por servicio" => (isset($context["planMensualHref"]) ? $context["planMensualHref"] : $this->getContext($context, "planMensualHref")), "Diario por servicio" => (isset($context["planDiarioHref"]) ? $context["planDiarioHref"] : $this->getContext($context, "planDiarioHref")));
            // line 50
            echo "            ";
        } else {
            // line 51
            echo "                ";
            $context["submenuOptions"] = array("Diario por servicio" => (isset($context["planDiarioHref"]) ? $context["planDiarioHref"] : $this->getContext($context, "planDiarioHref")));
            // line 54
            echo "            ";
        }
        // line 55
        echo "

            ";
        // line 57
        echo twig_include($this->env, $context, "::layout_modules_menu.html.twig", array("submenuTitle" => "Planificación", "submenuHref" => (isset($context["href"]) ? $context["href"] : $this->getContext($context, "href")), "submenuOptions" => (isset($context["submenuOptions"]) ? $context["submenuOptions"] : $this->getContext($context, "submenuOptions"))));
        // line 63
        echo "
        </div>

        <div class=\"row\" style=\"margin-top: 51px; \">
            <div class=\"col-sm-11\" style=\"margin-left: 25px; margin-right: 100px;\">
                ";
        // line 68
        $this->env->loadTemplate("::flashmessages.html.twig")->display($context);
        // line 69
        echo "            </div>
        </div>

        <div id=\"container\" style=\"margin-top: 10px;\">
            ";
        // line 73
        $this->displayBlock('content', $context, $blocks);
        // line 75
        echo "        </div>

        <nav class=\"navbar navbar-default navbar-fixed-bottom\" role=\"navigation\">
            <div class=\"container\">
                Sisconee | Módulo de Planificación
            </div>
        </nav>
    </div>

";
    }

    // line 73
    public function block_content($context, array $blocks = array())
    {
        // line 74
        echo "            ";
    }

    // line 86
    public function block_javascripts($context, array $blocks = array())
    {
        // line 87
        echo "            <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("jquery/jquery.min.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 88
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("jquery/jquery-validate/jquery.validate.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 89
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sisconeeapp/js/commonFieldsValidation.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 90
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bootstrap/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
        ";
    }

    public function getTemplateName()
    {
        return "sisconeeAppBundle:GeneralLayout:layout_planificacion.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  186 => 90,  182 => 89,  178 => 88,  173 => 87,  166 => 74,  163 => 73,  148 => 73,  142 => 69,  131 => 57,  124 => 54,  121 => 51,  118 => 50,  115 => 44,  110 => 42,  107 => 40,  101 => 38,  98 => 37,  95 => 36,  71 => 18,  61 => 13,  56 => 12,  52 => 10,  35 => 4,  32 => 3,  155 => 56,  150 => 75,  147 => 53,  143 => 48,  140 => 68,  134 => 49,  132 => 47,  126 => 43,  120 => 40,  117 => 39,  113 => 43,  104 => 39,  97 => 33,  90 => 31,  88 => 32,  48 => 9,  45 => 10,  43 => 8,  40 => 7,  38 => 7,  33 => 4,  30 => 3,  189 => 68,  184 => 67,  181 => 66,  175 => 49,  170 => 86,  168 => 18,  165 => 16,  162 => 15,  151 => 57,  133 => 63,  127 => 55,  122 => 49,  119 => 47,  102 => 46,  93 => 35,  86 => 31,  77 => 32,  75 => 31,  66 => 18,  62 => 26,  58 => 24,  51 => 12,  42 => 8,  34 => 3,  84 => 47,  79 => 23,  72 => 21,  68 => 17,  64 => 27,  60 => 17,  57 => 14,  54 => 13,  47 => 12,  44 => 11,  39 => 7,  36 => 7,  31 => 2,  29 => 4,  27 => 3,);
    }
}
