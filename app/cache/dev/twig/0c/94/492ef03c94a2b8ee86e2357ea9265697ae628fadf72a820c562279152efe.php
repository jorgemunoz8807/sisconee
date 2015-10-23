<?php

/* sisconeeAppBundle:Reports:report_filtro.html.twig */
class __TwigTemplate_0c94492ef03c94a2b8ee86e2357ea9265697ae628fadf72a820c562279152efe extends Twig_Template
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
        echo "
Provincia(s):
";
        // line 3
        if ((twig_length_filter($this->env, (isset($context["Listado_provincia"]) ? $context["Listado_provincia"] : $this->getContext($context, "Listado_provincia"))) > 0)) {
            // line 4
            echo "    <select id=\"lista_provincia\" style=\"width: 100%\" class=\"form-control\">
        ";
            // line 5
            if (($this->env->getExtension('security')->isGranted("ROLE_PLANIFICADOR_SUP") || $this->env->getExtension('security')->isGranted("ROLE_SUPERVISOR_SUP"))) {
                // line 6
                echo "        <option value=\"-1\"><--Mostrar todas--></option>

        ";
            }
            // line 9
            echo "
        ";
            // line 10
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["Listado_provincia"]) ? $context["Listado_provincia"] : $this->getContext($context, "Listado_provincia")));
            foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
                // line 11
                echo "            <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : $this->getContext($context, "p")), "getId"), "html", null, true);
                echo "\">
                ";
                // line 12
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : $this->getContext($context, "p")), "getDescripcion"), "html", null, true);
                echo "
            </option>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['p'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 15
            echo "    </select>
";
        } else {
            // line 17
            echo "    <select id=\"lista_provincia\" style=\"width: 100%\" class=\"form-control\">

            <option value=\"0\">No hay datos a mostrar</option>

    </select>
";
        }
        // line 23
        echo "
";
    }

    public function getTemplateName()
    {
        return "sisconeeAppBundle:Reports:report_filtro.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  47 => 12,  42 => 11,  28 => 5,  25 => 4,  23 => 3,  19 => 1,  189 => 94,  185 => 93,  181 => 92,  177 => 91,  173 => 90,  169 => 89,  165 => 88,  161 => 87,  156 => 86,  149 => 73,  146 => 72,  133 => 74,  125 => 68,  123 => 67,  116 => 62,  109 => 42,  103 => 39,  100 => 38,  97 => 37,  94 => 36,  91 => 35,  89 => 34,  82 => 30,  67 => 17,  64 => 16,  60 => 17,  56 => 15,  52 => 10,  43 => 8,  40 => 7,  35 => 9,  32 => 3,  535 => 438,  452 => 358,  411 => 320,  383 => 295,  354 => 269,  326 => 244,  296 => 217,  266 => 190,  228 => 155,  206 => 136,  202 => 135,  198 => 134,  193 => 95,  190 => 132,  153 => 85,  140 => 87,  135 => 85,  131 => 72,  115 => 68,  112 => 55,  106 => 40,  86 => 45,  84 => 31,  74 => 37,  68 => 23,  48 => 9,  45 => 15,  38 => 10,  33 => 10,  30 => 6,);
    }
}
