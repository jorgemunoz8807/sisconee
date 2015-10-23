<?php

/* sisconeeAppBundle:Planificacion:services_planification.html.twig */
class __TwigTemplate_2edb95866e612657ee3371e118616f7a28de84a5197675cf6a3e54e26b34390b extends Twig_Template
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
        echo "<label class=\"control-label\" for=\"services\">Servicio:</label>
<select id=\"services\">
    ";
        // line 3
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["services"]) ? $context["services"] : $this->getContext($context, "services")));
        foreach ($context['_seq'] as $context["_key"] => $context["s"]) {
            // line 4
            echo "        <option value=";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["s"]) ? $context["s"] : $this->getContext($context, "s")), "getId"), "html", null, true);
            echo " ";
            echo ((($this->getAttribute((isset($context["s"]) ? $context["s"] : $this->getContext($context, "s")), "id") == $this->getAttribute((isset($context["selectedService"]) ? $context["selectedService"] : $this->getContext($context, "selectedService")), "id"))) ? ("selected='true'") : (""));
            echo ">
            ";
            // line 5
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["s"]) ? $context["s"] : $this->getContext($context, "s")), "getNombre"), "html", null, true);
            echo "
        </option>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['s'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 8
        echo "</select>";
    }

    public function getTemplateName()
    {
        return "sisconeeAppBundle:Planificacion:services_planification.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  43 => 8,  34 => 5,  27 => 4,  23 => 3,  19 => 1,  194 => 74,  190 => 73,  181 => 67,  175 => 65,  172 => 64,  162 => 57,  158 => 55,  143 => 53,  139 => 51,  137 => 50,  132 => 47,  127 => 45,  122 => 44,  119 => 43,  114 => 40,  109 => 39,  103 => 35,  98 => 32,  94 => 30,  91 => 29,  88 => 28,  71 => 27,  68 => 26,  66 => 25,  60 => 22,  51 => 16,  48 => 15,  41 => 10,  37 => 8,  32 => 4,  29 => 3,);
    }
}
