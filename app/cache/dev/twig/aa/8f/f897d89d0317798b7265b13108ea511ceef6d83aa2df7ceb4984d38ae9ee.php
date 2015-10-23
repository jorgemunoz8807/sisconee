<?php

/* sisconeeAppBundle:Registro:lista_servicios.html.twig */
class __TwigTemplate_aa8ff897d89d0317798b7265b13108ea511ceef6d83aa2df7ceb4984d38ae9ee extends Twig_Template
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
        echo "Servicio(s):
        <select id=\"servicios\">
            <option value=\"-1\"><--Seleccione un servicio--></option>
            ";
        // line 4
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["servicios"]) ? $context["servicios"] : $this->getContext($context, "servicios")));
        foreach ($context['_seq'] as $context["_key"] => $context["s"]) {
            // line 5
            echo "                <option value=\" ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["s"]) ? $context["s"] : $this->getContext($context, "s")), "getId"), "html", null, true);
            echo " \">
                    ";
            // line 6
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["s"]) ? $context["s"] : $this->getContext($context, "s")), "getNombre"), "html", null, true);
            echo "
                </option>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['s'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 9
        echo "        </select>











";
    }

    public function getTemplateName()
    {
        return "sisconeeAppBundle:Registro:lista_servicios.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 9,  33 => 6,  28 => 5,  24 => 4,  19 => 1,  142 => 61,  138 => 60,  133 => 59,  130 => 58,  126 => 46,  123 => 45,  110 => 47,  108 => 45,  102 => 41,  100 => 40,  90 => 34,  87 => 33,  82 => 29,  80 => 28,  65 => 15,  62 => 14,  56 => 11,  48 => 9,  43 => 8,  40 => 7,  35 => 4,  32 => 3,  401 => 309,  396 => 308,  393 => 307,  370 => 287,  319 => 239,  249 => 172,  234 => 160,  206 => 135,  167 => 99,  144 => 79,  139 => 78,  136 => 77,  93 => 33,  88 => 30,  79 => 27,  74 => 26,  70 => 25,  64 => 21,  61 => 20,  54 => 72,  52 => 10,  34 => 4,  31 => 3,);
    }
}
