<?php

/* sisconeeAppBundle:Reports:report_filtro_years.html.twig */
class __TwigTemplate_4b24b2cd75e67fc767f6daaa0cea44a1c995f8803fd91699151bb54f89b893d1 extends Twig_Template
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
        echo "Periodo:
";
        // line 2
        if ((twig_length_filter($this->env, (isset($context["Listado_Years"]) ? $context["Listado_Years"] : $this->getContext($context, "Listado_Years"))) > 0)) {
            // line 3
            echo "        <select id=\"Years\"  style=\"width: 100%\" class=\"form-control\">

            ";
            // line 5
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["Listado_Years"]) ? $context["Listado_Years"] : $this->getContext($context, "Listado_Years")));
            foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
                // line 6
                echo "                <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["t"]) ? $context["t"] : $this->getContext($context, "t")), "periodoTrabajo"), "html", null, true);
                echo "\">
                    ";
                // line 7
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["t"]) ? $context["t"] : $this->getContext($context, "t")), "periodoTrabajo"), "html", null, true);
                echo "
                </option>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['t'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 10
            echo "        </select>
";
        } else {
            // line 12
            echo "
    <select id=\"Years\"  style=\"width: 100%\" class=\"form-control\">
        <option value=\"0\">No hay datos a mostrar</option>
    </select>

";
        }
    }

    public function getTemplateName()
    {
        return "sisconeeAppBundle:Reports:report_filtro_years.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 12,  37 => 7,  77 => 23,  72 => 20,  63 => 17,  58 => 16,  53 => 15,  46 => 10,  41 => 10,  39 => 9,  29 => 5,  27 => 4,  24 => 3,  22 => 2,  47 => 12,  42 => 11,  28 => 5,  25 => 4,  23 => 3,  19 => 1,  189 => 94,  185 => 93,  181 => 92,  177 => 91,  173 => 90,  169 => 89,  165 => 88,  161 => 87,  156 => 86,  149 => 73,  146 => 72,  133 => 74,  125 => 68,  123 => 67,  116 => 62,  109 => 42,  103 => 39,  100 => 38,  97 => 37,  94 => 36,  91 => 35,  89 => 34,  82 => 30,  67 => 17,  64 => 16,  60 => 17,  56 => 15,  52 => 10,  43 => 8,  40 => 7,  35 => 7,  32 => 6,  535 => 438,  452 => 358,  411 => 320,  383 => 295,  354 => 269,  326 => 244,  296 => 217,  266 => 190,  228 => 155,  206 => 136,  202 => 135,  198 => 134,  193 => 95,  190 => 132,  153 => 85,  140 => 87,  135 => 85,  131 => 72,  115 => 68,  112 => 55,  106 => 40,  86 => 45,  84 => 31,  74 => 37,  68 => 23,  48 => 12,  45 => 15,  38 => 10,  33 => 10,  30 => 6,);
    }
}
