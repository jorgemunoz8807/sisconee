<?php

/* sisconeeAppBundle:GeneralLayout:layout_registro.html.twig */
class __TwigTemplate_b07f94975484f1be3e1410ad5d62e1a3f9d617925a71211d0fe25e2d57224697 extends Twig_Template
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
        echo "    Consumo
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
    <link href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("layout_general/css/style.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\"/>
";
    }

    // line 14
    public function block_body($context, array $blocks = array())
    {
        // line 15
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
        // line 28
        $this->env->loadTemplate("::modal-delete.html.twig")->display($context);
        // line 29
        echo "
    <div>
        <div class=\"row\">
            ";
        // line 33
        echo "            ";
        $context["href"] = $this->env->getExtension('routing')->getPath("registro_lecturas");
        // line 34
        echo "            ";
        echo twig_include($this->env, $context, "::layout_modules_menu.html.twig", array("submenuTitle" => "Consumo", "submenuHref" => (isset($context["href"]) ? $context["href"] : $this->getContext($context, "href")), "submenuOptions" => array()));
        echo "

        </div>

        <div class=\"row\" style=\"margin-top: 51px; \">
            <div class=\"col-sm-11\" style=\"margin-left: 25px; margin-right: 100px;\">
                ";
        // line 40
        $this->env->loadTemplate("::flashmessages.html.twig")->display($context);
        // line 41
        echo "            </div>
        </div>

        <div id=\"container\" style=\"margin-top: 10px;\">
            ";
        // line 45
        $this->displayBlock('content', $context, $blocks);
        // line 47
        echo "        </div>

        <nav class=\"navbar navbar-default navbar-fixed-bottom\" role=\"navigation\">
            <div class=\"container\">
                Sisconee | Módulo de Consumo
            </div>
        </nav>
    </div>

";
    }

    // line 45
    public function block_content($context, array $blocks = array())
    {
        // line 46
        echo "            ";
    }

    // line 58
    public function block_javascripts($context, array $blocks = array())
    {
        // line 59
        echo "            <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("jquery/jquery.min.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 60
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("jquery/jquery-validate/jquery.validate.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 61
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bootstrap/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
        ";
    }

    public function getTemplateName()
    {
        return "sisconeeAppBundle:GeneralLayout:layout_registro.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  142 => 61,  138 => 60,  133 => 59,  130 => 58,  126 => 46,  123 => 45,  110 => 47,  108 => 45,  102 => 41,  100 => 40,  90 => 34,  87 => 33,  82 => 29,  80 => 28,  65 => 15,  62 => 14,  56 => 11,  48 => 9,  43 => 8,  40 => 7,  35 => 4,  32 => 3,  401 => 309,  396 => 308,  393 => 307,  370 => 287,  319 => 239,  249 => 172,  234 => 160,  206 => 135,  167 => 99,  144 => 79,  139 => 78,  136 => 77,  93 => 33,  88 => 30,  79 => 27,  74 => 26,  70 => 25,  64 => 21,  61 => 20,  54 => 72,  52 => 10,  34 => 4,  31 => 3,);
    }
}
