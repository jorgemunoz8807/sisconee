<?php

/* sisconeeAppBundle:Default:message.txt.twig */
class __TwigTemplate_acad6f90ec13e2c0b7dde1c7394bc57213420bbb04c37ed58ba2e76788cf7f1d extends Twig_Template
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
        echo "<h1>Su cuenta en SISCONEE ha sido creada satisfactoriamente</h1>

Sus datos se muestran a continuación:

Nombre de usuario: <b>";
        // line 5
        echo (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name"));
        echo "</b>

Contraseña: <b>";
        // line 7
        echo (isset($context["password"]) ? $context["password"] : $this->getContext($context, "password"));
        echo "</b>

Gracias por utilizar nuestro sitio...";
    }

    public function getTemplateName()
    {
        return "sisconeeAppBundle:Default:message.txt.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  30 => 7,  25 => 5,  19 => 1,);
    }
}
