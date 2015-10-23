<?php

/* sisconeeAppBundle:Default:message.html.twig */
class __TwigTemplate_4c115c98e565f7f90166d109a0eab23eadeb14792e1d01f5fd6912fac6cc3cb6 extends Twig_Template
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
        echo "<h2>
    Su cuenta en SISCONEE ha sido creada satisfactoriamente
</h2>

<h3>Sus datos se muestran a continuación:</h3>

<p>Nombre de usuario: <b>";
        // line 7
        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")), "html", null, true);
        echo "</b></p>

<p>Contraseña:<b> ";
        // line 9
        echo twig_escape_filter($this->env, (isset($context["password"]) ? $context["password"] : $this->getContext($context, "password")), "html", null, true);
        echo "</b></p>

<h3>
    Gracias por utilizar nuestro sitio...
</h3>";
    }

    public function getTemplateName()
    {
        return "sisconeeAppBundle:Default:message.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  32 => 9,  27 => 7,  19 => 1,);
    }
}
