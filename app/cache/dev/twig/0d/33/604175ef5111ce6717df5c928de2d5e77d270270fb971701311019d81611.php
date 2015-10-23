<?php

/* sisconeeAppBundle:Reports:report_filtro_entidad.html.twig */
class __TwigTemplate_0d33604175ef5111ce6717df5c928de2d5e77d270270fb971701311019d81611 extends Twig_Template
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
";
        // line 2
        $context["disabled"] = "";
        // line 3
        echo "
";
        // line 4
        if (((isset($context["id_provincia"]) ? $context["id_provincia"] : $this->getContext($context, "id_provincia")) == null)) {
            // line 5
            echo "      ";
            $context["disabled"] = "disabled";
            // line 6
            echo "   ";
        }
        // line 7
        echo "
Entidad(es):
";
        // line 9
        if ((twig_length_filter($this->env, (isset($context["Listado_Entidad"]) ? $context["Listado_Entidad"] : $this->getContext($context, "Listado_Entidad"))) > 0)) {
            // line 10
            echo "        <select id=\"lista_entidad\" style=\"width: 100%;\" ";
            echo twig_escape_filter($this->env, (isset($context["disabled"]) ? $context["disabled"] : $this->getContext($context, "disabled")), "html", null, true);
            echo "  class=\"form-control\" >
            ";
            // line 11
            if (($this->env->getExtension('security')->isGranted("ROLE_PLANIFICADOR_SUP") || $this->env->getExtension('security')->isGranted("ROLE_SUPERVISOR_SUP"))) {
                // line 12
                echo "                <option value=\"-1\"><--Mostrar todas--></option>

            ";
            }
            // line 15
            echo "            ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["Listado_Entidad"]) ? $context["Listado_Entidad"] : $this->getContext($context, "Listado_Entidad")));
            foreach ($context['_seq'] as $context["_key"] => $context["e"]) {
                // line 16
                echo "                <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "getId"), "html", null, true);
                echo "\">
                    ";
                // line 17
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "getNombre"), "html", null, true);
                echo "
                </option>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['e'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 20
            echo "        </select>

";
        } else {
            // line 23
            echo "        <select id=\"lista_entidad\" style=\"width: 100%;\" ";
            echo twig_escape_filter($this->env, (isset($context["disabled"]) ? $context["disabled"] : $this->getContext($context, "disabled")), "html", null, true);
            echo "  class=\"form-control\" >
            <option value=\"0\">No hay datos a mostrar</option>
        </select>
";
        }
    }

    public function getTemplateName()
    {
        return "sisconeeAppBundle:Reports:report_filtro_entidad.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  77 => 23,  72 => 20,  63 => 17,  58 => 16,  53 => 15,  46 => 11,  41 => 10,  39 => 9,  29 => 5,  27 => 4,  24 => 3,  22 => 2,  47 => 12,  42 => 11,  28 => 5,  25 => 4,  23 => 3,  19 => 1,  189 => 94,  185 => 93,  181 => 92,  177 => 91,  173 => 90,  169 => 89,  165 => 88,  161 => 87,  156 => 86,  149 => 73,  146 => 72,  133 => 74,  125 => 68,  123 => 67,  116 => 62,  109 => 42,  103 => 39,  100 => 38,  97 => 37,  94 => 36,  91 => 35,  89 => 34,  82 => 30,  67 => 17,  64 => 16,  60 => 17,  56 => 15,  52 => 10,  43 => 8,  40 => 7,  35 => 7,  32 => 6,  535 => 438,  452 => 358,  411 => 320,  383 => 295,  354 => 269,  326 => 244,  296 => 217,  266 => 190,  228 => 155,  206 => 136,  202 => 135,  198 => 134,  193 => 95,  190 => 132,  153 => 85,  140 => 87,  135 => 85,  131 => 72,  115 => 68,  112 => 55,  106 => 40,  86 => 45,  84 => 31,  74 => 37,  68 => 23,  48 => 12,  45 => 15,  38 => 10,  33 => 10,  30 => 6,);
    }
}
