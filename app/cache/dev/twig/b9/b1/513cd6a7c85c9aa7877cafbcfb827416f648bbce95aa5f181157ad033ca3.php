<?php

/* sisconeeAdministracionBundle::form-paginacion.html.twig */
class __TwigTemplate_b9b1513cd6a7c85c9aa7877cafbcfb827416f648bbce95aa5f181157ad033ca3 extends Twig_Template
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
        echo "<label id=\"admin-recordcount\">Cantidad de registros: ";
        echo twig_escape_filter($this->env, (isset($context["count"]) ? $context["count"] : $this->getContext($context, "count")), "html", null, true);
        echo "</label>

";
        // line 3
        if (((isset($context["page_count"]) ? $context["page_count"] : $this->getContext($context, "page_count")) > 1)) {
            // line 4
            echo "    <div id=\"admin-paginator\">
        <label>P&aacute;gina seleccionada:</label>

        <select id=\"admin-page-list\" data-url=\"";
            // line 7
            echo $this->env->getExtension('routing')->getPath((isset($context["url"]) ? $context["url"] : $this->getContext($context, "url")), array("page" => "ppage"));
            echo "\">
            ";
            // line 8
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(range(1, (isset($context["page_count"]) ? $context["page_count"] : $this->getContext($context, "page_count"))));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 9
                echo "                <option ";
                if (((isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")) == (isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")))) {
                    echo " selected=\"selected\" ";
                }
                echo " value=\"";
                echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "html", null, true);
                echo "\"><a href=\"\">";
                echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "html", null, true);
                echo "</a></option>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 11
            echo "        </select>

        <label> de ";
            // line 13
            echo twig_escape_filter($this->env, (isset($context["page_count"]) ? $context["page_count"] : $this->getContext($context, "page_count")), "html", null, true);
            echo "</label>

        <div class=\"paginator-controls\">
            <a class=\"admin-list-navcontrol ";
            // line 16
            if (((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) == 1)) {
                echo " disabled ";
            }
            echo "\" title=\"Ir a la primera p&aacute;gina\" href=\"";
            echo $this->env->getExtension('routing')->getPath((isset($context["url"]) ? $context["url"] : $this->getContext($context, "url")), array("page" => "1"));
            echo "\"><span class=\"glyphicon glyphicon-fast-backward\"></span></a>
            <a class=\"admin-list-navcontrol ";
            // line 17
            if (((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) == 1)) {
                echo " disabled ";
            }
            echo "\" title=\"Ir a la p&aacute;gina anterior\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["url"]) ? $context["url"] : $this->getContext($context, "url")), array("page" => ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) - 1))), "html", null, true);
            echo "\"><span class=\"glyphicon glyphicon-backward\"></span></a>

            <a class=\"admin-list-navcontrol ";
            // line 19
            if (((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) == (isset($context["page_count"]) ? $context["page_count"] : $this->getContext($context, "page_count")))) {
                echo " disabled ";
            }
            echo "\" title=\"Ir a la p&aacute;gina siguiente\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["url"]) ? $context["url"] : $this->getContext($context, "url")), array("page" => ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) + 1))), "html", null, true);
            echo "\"><span class=\"glyphicon glyphicon-forward\"></span></a>
            <a class=\"admin-list-navcontrol ";
            // line 20
            if (((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) == (isset($context["page_count"]) ? $context["page_count"] : $this->getContext($context, "page_count")))) {
                echo " disabled ";
            }
            echo "\" title=\"Ir a la &uacute;ltima p&aacute;gina\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["url"]) ? $context["url"] : $this->getContext($context, "url")), array("page" => (isset($context["page_count"]) ? $context["page_count"] : $this->getContext($context, "page_count")))), "html", null, true);
            echo "\"><span class=\"glyphicon glyphicon-fast-forward\"></span></a>
        </div>
    </div>
";
        }
    }

    public function getTemplateName()
    {
        return "sisconeeAdministracionBundle::form-paginacion.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  90 => 20,  82 => 19,  73 => 17,  65 => 16,  55 => 11,  40 => 9,  36 => 8,  32 => 7,  27 => 4,  25 => 3,  19 => 1,  390 => 170,  382 => 159,  380 => 158,  375 => 155,  372 => 153,  365 => 151,  356 => 137,  352 => 135,  346 => 133,  344 => 132,  341 => 131,  332 => 127,  325 => 125,  318 => 123,  311 => 121,  304 => 119,  301 => 118,  298 => 117,  296 => 116,  293 => 115,  283 => 110,  276 => 108,  269 => 106,  262 => 104,  259 => 103,  256 => 102,  254 => 101,  251 => 100,  241 => 95,  234 => 93,  227 => 91,  220 => 89,  217 => 88,  214 => 87,  212 => 86,  209 => 85,  199 => 80,  192 => 78,  185 => 76,  178 => 74,  171 => 72,  168 => 71,  165 => 70,  163 => 69,  159 => 67,  150 => 63,  143 => 61,  136 => 59,  133 => 58,  130 => 57,  128 => 56,  125 => 55,  116 => 51,  109 => 49,  102 => 47,  99 => 46,  96 => 45,  94 => 44,  88 => 41,  84 => 40,  79 => 39,  76 => 37,  72 => 36,  67 => 33,  59 => 13,  51 => 19,  47 => 17,  45 => 16,  31 => 4,  28 => 3,);
    }
}
