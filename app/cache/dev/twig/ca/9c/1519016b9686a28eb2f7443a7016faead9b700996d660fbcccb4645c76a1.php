<?php

/* sisconeeAppBundle:Planificacion:index_planificacion.html.twig */
class __TwigTemplate_ca9c1519016b9686a28eb2f7443a7016faead9b700996d660fbcccb4645c76a1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("sisconeeAppBundle:GeneralLayout:layout_planificacion.html.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "sisconeeAppBundle:GeneralLayout:layout_planificacion.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["selectedOptionId"] = "";
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "
    <h1>Bienvenido a la Planificación</h1>


";
    }

    public function getTemplateName()
    {
        return "sisconeeAppBundle:Planificacion:index_planificacion.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  33 => 6,  30 => 5,  25 => 1,);
    }
}
