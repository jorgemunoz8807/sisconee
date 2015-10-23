<?php

/* sisconeeAppBundle:Reports:index_reportes.html.twig */
class __TwigTemplate_41e3ff8293c5b02bcb3397b7b5df9b093f16a958e74364936137450a65ece1a1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("sisconeeAppBundle:GeneralLayout:layout_reportes.html.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "sisconeeAppBundle:GeneralLayout:layout_reportes.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "
    <h1>Bienvenido a los Reportes</h1>

";
    }

    public function getTemplateName()
    {
        return "sisconeeAppBundle:Reports:index_reportes.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 4,  28 => 3,);
    }
}
