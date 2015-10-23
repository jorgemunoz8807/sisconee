<?php

/* sisconeeAppBundle:GeneralLayout:layout_reportes.html.twig */
class __TwigTemplate_c7ff6ee5435180a9d0b320323984c2ea34524fc1bd4e9b7b6e4ef8f9548ff336 extends Twig_Template
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
        echo "    Reportes
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
    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("layout_reportes/jquery.jqplot.css"), "html", null, true);
        echo "\" />
    ";
        // line 13
        echo "    ";
    }

    // line 16
    public function block_body($context, array $blocks = array())
    {
        // line 17
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
        // line 30
        $this->env->loadTemplate("::modal-delete.html.twig")->display($context);
        // line 31
        echo "
    <div>
        <div class=\"row\">
            ";
        // line 34
        $context["href"] = $this->env->getExtension('routing')->getPath("index_reportes");
        // line 35
        echo "            ";
        $context["planMensualHref"] = $this->env->getExtension('routing')->getPath("sisconee_app_reportes", array("Nomb_Report" => "plan_mensual"));
        // line 36
        echo "            ";
        $context["compDiarioHref"] = $this->env->getExtension('routing')->getPath("sisconee_app_reportes", array("Nomb_Report" => "comportamiento_diario"));
        // line 37
        echo "            ";
        $context["parteDiarioHref"] = $this->env->getExtension('routing')->getPath("sisconee_app_reportes", array("Nomb_Report" => "parte_diario"));
        // line 38
        echo "            ";
        // line 40
        echo "            ";
        $context["parteConsumo"] = $this->env->getExtension('routing')->getPath("sisconee_app_reportes", array("Nomb_Report" => "parte_consumo"));
        // line 41
        echo "
            ";
        // line 43
        echo "            ";
        echo twig_include($this->env, $context, "::layout_modules_menu.html.twig", array("submenuTitle" => "Reportes", "submenuHref" => (isset($context["href"]) ? $context["href"] : $this->getContext($context, "href")), "submenuOptions" => array("Plan Mensual" => (isset($context["planMensualHref"]) ? $context["planMensualHref"] : $this->getContext($context, "planMensualHref")), "Comportamiento Diario" => (isset($context["compDiarioHref"]) ? $context["compDiarioHref"] : $this->getContext($context, "compDiarioHref")), "Parte Diario" => (isset($context["parteDiarioHref"]) ? $context["parteDiarioHref"] : $this->getContext($context, "parteDiarioHref")), "Parte del Consumo" => (isset($context["parteConsumo"]) ? $context["parteConsumo"] : $this->getContext($context, "parteConsumo")), "Consumo Acumulado" => "#")));
        // line 55
        echo "

            ";
        // line 58
        echo "            ";
        // line 60
        echo "
            ";
        // line 66
        echo "
        </div>

        <div class=\"row\" style=\"margin-top: 51px; \">
            <div class=\"col-sm-11\" style=\"margin-left: 25px; margin-right: 100px;\">
                ";
        // line 71
        $this->env->loadTemplate("::flashmessages.html.twig")->display($context);
        // line 72
        echo "            </div>
        </div>

        <div id=\"container\" style=\"margin-top: 10px;\">
            ";
        // line 76
        $this->displayBlock('content', $context, $blocks);
        // line 78
        echo "        </div>

        <nav class=\"navbar navbar-default navbar-fixed-bottom\" role=\"navigation\">
            <div class=\"container\">
                Sisconee | Módulo de Reportes
            </div>
        </nav>
    </div>

";
    }

    // line 76
    public function block_content($context, array $blocks = array())
    {
        // line 77
        echo "            ";
    }

    // line 89
    public function block_javascripts($context, array $blocks = array())
    {
        // line 90
        echo "            <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("jquery/jquery.min.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 91
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bootstrap/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
            <script language=\"javascript\" type=\"text/javascript\" src=\"";
        // line 92
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("layout_reportes/jquery.jqplot.min.js"), "html", null, true);
        echo "\"></script>
            <script language=\"javascript\" type=\"text/javascript\"  src=\"";
        // line 93
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("layout_reportes/plugins/jqplot.canvasTextRenderer.js"), "html", null, true);
        echo "\"></script>
            <script language=\"javascript\" type=\"text/javascript\"  src=\"";
        // line 94
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("layout_reportes/plugins/jqplot.canvasAxisLabelRenderer.js"), "html", null, true);
        echo "\"></script>
            <script language=\"javascript\" type=\"text/javascript\"  src=\"";
        // line 95
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("layout_reportes/plugins/jqplot.canvasAxisTickRenderer.js"), "html", null, true);
        echo "\"></script>
            <script language=\"javascript\" type=\"text/javascript\"  src=\"";
        // line 96
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("layout_reportes/plugins/jqplot.pointLabels.js"), "html", null, true);
        echo "\"></script>
            <script language=\"javascript\" type=\"text/javascript\"  src=\"";
        // line 97
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("layout_reportes/plugins/jqplot.enhancedLegendRenderer.js"), "html", null, true);
        echo "\"></script>
            <script language=\"javascript\" type=\"text/javascript\"  src=\"";
        // line 98
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("layout_reportes/plugins/jqplot.categoryAxisRenderer.js"), "html", null, true);
        echo "\"></script>
            <script language=\"javascript\" type=\"text/javascript\"  src=\"";
        // line 99
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("layout_reportes/plugins/jqplot.barRenderer.min.js"), "html", null, true);
        echo "\"></script>
        ";
    }

    public function getTemplateName()
    {
        return "sisconeeAppBundle:GeneralLayout:layout_reportes.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  197 => 99,  193 => 98,  189 => 97,  185 => 96,  181 => 95,  177 => 94,  173 => 93,  169 => 92,  165 => 91,  160 => 90,  157 => 89,  153 => 77,  150 => 76,  137 => 78,  135 => 76,  129 => 72,  127 => 71,  120 => 66,  117 => 60,  115 => 58,  111 => 55,  108 => 43,  105 => 41,  102 => 40,  100 => 38,  97 => 37,  94 => 36,  91 => 35,  89 => 34,  84 => 31,  82 => 30,  67 => 17,  64 => 16,  60 => 13,  56 => 11,  52 => 10,  48 => 9,  43 => 8,  40 => 7,  35 => 4,  32 => 3,  31 => 4,  28 => 3,);
    }
}
