<?php

/* ::base.html.twig */
class __TwigTemplate_b1f57442bd775e8a52e7191ef3305010635f16d2fb3e63fcacbc18a9fbd9dd7f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>SISCONEE 1.0 | ";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 7
        echo "        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>
        ";
        // line 10
        $this->displayBlock('body', $context, $blocks);
        // line 11
        echo "        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 12
        echo "    </body>
</html>
";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
    }

    // line 10
    public function block_body($context, array $blocks = array())
    {
    }

    // line 11
    public function block_javascripts($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  68 => 11,  58 => 6,  47 => 12,  42 => 10,  33 => 6,  29 => 5,  23 => 1,  113 => 40,  109 => 36,  104 => 35,  96 => 26,  93 => 25,  82 => 25,  78 => 23,  75 => 22,  72 => 21,  65 => 17,  60 => 16,  57 => 14,  55 => 13,  53 => 5,  49 => 10,  44 => 11,  41 => 8,  35 => 7,  32 => 3,  101 => 34,  97 => 50,  92 => 49,  89 => 31,  84 => 28,  77 => 43,  67 => 19,  63 => 10,  59 => 15,  51 => 9,  45 => 7,  43 => 6,  40 => 5,  37 => 4,  31 => 2,);
    }
}
