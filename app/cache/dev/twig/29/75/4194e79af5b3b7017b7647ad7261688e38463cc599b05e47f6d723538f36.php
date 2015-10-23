<?php

/* sisconeeAppBundle:Planificacion:general_planificacion.html.twig */
class __TwigTemplate_29754194e79af5b3b7017b7647ad7261688e38463cc599b05e47f6d723538f36 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("sisconeeAppBundle:GeneralLayout:layout_planificacion.html.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
            'planification' => array($this, 'block_planification'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "sisconeeAppBundle:GeneralLayout:layout_planificacion.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "    <div class=\"row\">
        <div class=\"col-sm-12\">
            <div class=\"pull-right\">
                ";
        // line 7
        $context["planStyle"] = "";
        // line 8
        echo "                <label class=\"control-label\" style=\"font-weight: bold\">Plan:</label>
                ";
        // line 9
        if ((null === (isset($context["generalPlan"]) ? $context["generalPlan"] : $this->getContext($context, "generalPlan")))) {
            // line 10
            echo "                    ";
            $context["planStyle"] = "color: red";
            // line 11
            echo "                    ";
            $context["generalPlan"] = "--no definido--";
            // line 12
            echo "                ";
        }
        // line 13
        echo "                <span class=\"label label-info\" id=\"reference-plan\"
                      style=\"margin-right: 10px; ";
        // line 14
        echo twig_escape_filter($this->env, (isset($context["planStyle"]) ? $context["planStyle"] : $this->getContext($context, "planStyle")), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, (isset($context["generalPlan"]) ? $context["generalPlan"] : $this->getContext($context, "generalPlan")), "html", null, true);
        echo "</span>

                <label class=\"control-label\" style=\"font-weight: bold\">Restante:</label>

                ";
        // line 18
        if ((null === (isset($context["generalPlan"]) ? $context["generalPlan"] : $this->getContext($context, "generalPlan")))) {
            // line 19
            echo "                    <span class=\"label label-info\" style=\"color: red\">-</span>
                ";
        } else {
            // line 21
            echo "                    <span ";
            echo " class=\"label label-info\" id=\"remaining-plan\">";
            echo twig_escape_filter($this->env, (isset($context["remaining"]) ? $context["remaining"] : $this->getContext($context, "remaining")), "html", null, true);
            echo "</span>
                ";
        }
        // line 23
        echo "            </div>
        </div>
    </div>

    <div class=\"row\">
        <div class=\"col-sm-6\">
            <label class=\"control-label\" for=\"parent_entities\">Entidad:</label>
            ";
        // line 30
        if ((!(isset($context["fixedEntity"]) ? $context["fixedEntity"] : $this->getContext($context, "fixedEntity")))) {
            // line 31
            echo "                <select id=\"parent_entities\" name=\"select_parent_entities\">
                    ";
            // line 32
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")));
            foreach ($context['_seq'] as $context["_key"] => $context["e"]) {
                // line 33
                echo "                        <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "id"), "html", null, true);
                echo "\" ";
                echo ((($this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "id") == $this->getAttribute((isset($context["parentEntity"]) ? $context["parentEntity"] : $this->getContext($context, "parentEntity")), "id"))) ? ("selected='true'") : (""));
                echo ">
                            ";
                // line 34
                echo twig_escape_filter($this->env, (isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "html", null, true);
                echo "
                        </option>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['e'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 37
            echo "                </select>
            ";
        } else {
            // line 39
            echo "                <label>
                    ";
            // line 40
            echo twig_escape_filter($this->env, (isset($context["parentEntity"]) ? $context["parentEntity"] : $this->getContext($context, "parentEntity")), "html", null, true);
            echo "
                </label>
            ";
        }
        // line 43
        echo "        </div>
    </div>

    <div class=\"row\">
                ";
        // line 47
        $this->displayBlock('planification', $context, $blocks);
        // line 49
        echo "
    </div>
";
    }

    // line 47
    public function block_planification($context, array $blocks = array())
    {
        // line 48
        echo "                ";
    }

    // line 53
    public function block_javascripts($context, array $blocks = array())
    {
        // line 54
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
    ";
        // line 56
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("layoutadmin/admin-list.js"), "html", null, true);
        echo "\"></script>

";
    }

    public function getTemplateName()
    {
        return "sisconeeAppBundle:Planificacion:general_planificacion.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  155 => 56,  150 => 54,  147 => 53,  143 => 48,  140 => 47,  134 => 49,  132 => 47,  126 => 43,  120 => 40,  117 => 39,  113 => 37,  104 => 34,  97 => 33,  90 => 31,  88 => 30,  48 => 11,  45 => 10,  43 => 9,  40 => 8,  38 => 7,  33 => 4,  30 => 3,  189 => 68,  184 => 67,  181 => 66,  175 => 49,  170 => 19,  168 => 18,  165 => 16,  162 => 15,  151 => 57,  133 => 53,  127 => 51,  122 => 49,  119 => 47,  102 => 46,  93 => 32,  86 => 35,  77 => 32,  75 => 31,  66 => 18,  62 => 26,  58 => 24,  51 => 12,  42 => 8,  34 => 3,  84 => 47,  79 => 23,  72 => 21,  68 => 19,  64 => 27,  60 => 17,  57 => 14,  54 => 13,  47 => 12,  44 => 11,  39 => 7,  36 => 7,  31 => 2,  29 => 4,  27 => 3,);
    }
}
