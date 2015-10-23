<?php

/* ::layout_general.html.twig */
class __TwigTemplate_72dbfc562a69be7f74676e49f57e2f31e9be7bfe6a2498c6f909a1a131b98784 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'metadata' => array($this, 'block_metadata'),
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
    public function block_metadata($context, array $blocks = array())
    {
        // line 4
        echo "    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, maximum-scale=1\">
";
    }

    // line 8
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 9
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bootstrap/css/bootstrap.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
    <link href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bootstrap/css/bootstrap-theme.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
    ";
        // line 12
        echo "    ";
        // line 13
        echo "    ";
        // line 14
        echo "
    ";
        // line 16
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("layout_general/css/style.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\"/>
    <link href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("layout_general/css/layout.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\"/>

";
    }

    // line 21
    public function block_body($context, array $blocks = array())
    {
        // line 22
        echo "    ";
        $this->env->loadTemplate("layout_general-header.html.twig")->display($context);
        // line 23
        echo "    <div class=\"wrap container\">
        <div class=\"content\">
            ";
        // line 25
        $this->displayBlock('content', $context, $blocks);
        // line 28
        echo "        </div>
    </div>

    ";
        // line 31
        $this->env->loadTemplate("layout_general-footer.html.twig")->display($context);
    }

    // line 25
    public function block_content($context, array $blocks = array())
    {
        // line 26
        echo "             Sisconee Sistema para el control de la energía eléctrica
            ";
    }

    // line 34
    public function block_javascripts($context, array $blocks = array())
    {
        // line 35
        echo "        <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("layout_general/js/jquery-1.7.2.min.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bootstrap/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
       ";
        // line 40
        echo "
        <script type=\"text/javascript\">
            /*\$(document).ready(function() {
                \$().UItoTop({ easingType: 'easeOutQuart' });
            });*/
        </script>




    ";
    }

    public function getTemplateName()
    {
        return "::layout_general.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  113 => 40,  109 => 36,  104 => 35,  96 => 26,  93 => 25,  82 => 25,  78 => 23,  75 => 22,  72 => 21,  65 => 17,  60 => 16,  57 => 14,  55 => 13,  53 => 12,  49 => 10,  44 => 9,  41 => 8,  35 => 4,  32 => 3,  101 => 34,  97 => 50,  92 => 49,  89 => 31,  84 => 28,  77 => 43,  67 => 19,  63 => 17,  59 => 15,  51 => 9,  45 => 7,  43 => 6,  40 => 5,  37 => 4,  31 => 2,);
    }
}
