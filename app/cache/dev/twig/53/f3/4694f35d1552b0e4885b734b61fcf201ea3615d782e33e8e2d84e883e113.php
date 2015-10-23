<?php

/* sisconeeAppBundle:Planificacion:annual_planificacion.html.twig */
class __TwigTemplate_53f34694f35d1552b0e4885b734b61fcf201ea3615d782e33e8e2d84e883e113 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("sisconeeAppBundle:Planificacion:general_planificacion.html.twig");

        $this->blocks = array(
            'planification' => array($this, 'block_planification'),
            'creationForm' => array($this, 'block_creationForm'),
            'tableFirstColumn' => array($this, 'block_tableFirstColumn'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "sisconeeAppBundle:Planificacion:general_planificacion.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_planification($context, array $blocks = array())
    {
        // line 3
        echo "    <div class=\"col-sm-12\">
        <div class=\"container\" style=\"margin-top: 20px; margin-left: 20px;\">

            ";
        // line 7
        echo "            <div class=\"row vinculo-add\">
                <a class=\"btn btn-default addplan-btn ";
        // line 8
        echo (((isset($context["showAddButton"]) ? $context["showAddButton"] : $this->getContext($context, "showAddButton"))) ? ("") : ("myhidden"));
        echo "\" data-textadd=\"Adicionar\"
                   data-texthidd=\"Ocultar\">
                    <span class=\"glyphicon glyphicon-plus-sign\"></span> <span id=\"btntext\">Adicionar</span>
                </a>
            </div>

            ";
        // line 15
        echo "            ";
        $this->displayBlock('creationForm', $context, $blocks);
        // line 21
        echo "

            ";
        // line 24
        echo "            <div class=\"row\" id=\"plansListContainer\">
                <h4 id=\"info-plans\">
                    ";
        // line 26
        if ((twig_length_filter($this->env, (isset($context["annualPlans"]) ? $context["annualPlans"] : $this->getContext($context, "annualPlans"))) == 0)) {
            // line 27
            echo "                        ";
            // line 28
            echo "                        ";
            echo twig_escape_filter($this->env, (isset($context["emptyInfo"]) ? $context["emptyInfo"] : $this->getContext($context, "emptyInfo")), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, (isset($context["parentEntity"]) ? $context["parentEntity"] : $this->getContext($context, "parentEntity")), "html", null, true);
            echo "

                    ";
        } else {
            // line 31
            echo "                        ";
            // line 32
            echo "                        ";
            echo twig_escape_filter($this->env, (isset($context["plansInfo"]) ? $context["plansInfo"] : $this->getContext($context, "plansInfo")), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, (isset($context["parentEntity"]) ? $context["parentEntity"] : $this->getContext($context, "parentEntity")), "html", null, true);
            echo "

                    ";
        }
        // line 35
        echo "                </h4>

                <table id=\"planification-table\" class=\"table table-striped table-bordered table-hover\">
                    <thead id=\"planification-table-head\">
                    <tr>
                        <th>";
        // line 40
        echo twig_escape_filter($this->env, (isset($context["firstColumnHead"]) ? $context["firstColumnHead"] : $this->getContext($context, "firstColumnHead")), "html", null, true);
        echo "</th>
                        <th>Plan</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody id=\"planification-table-body\">
                    ";
        // line 46
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["annualPlans"]) ? $context["annualPlans"] : $this->getContext($context, "annualPlans")));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["ap"]) {
            // line 47
            echo "                        <tr>
                            ";
            // line 49
            echo "                            <td>";
            $this->displayBlock('tableFirstColumn', $context, $blocks);
            echo "</td>
                            ";
            // line 51
            echo "                            <td>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ap"]) ? $context["ap"] : $this->getContext($context, "ap")), "plan"), "html", null, true);
            echo "</td>
                            <td>
                                ";
            // line 53
            echo twig_include($this->env, $context, "sisconeeAppBundle::edit-delete-plans.html.twig", array("dir" => (isset($context["url"]) ? $context["url"] : $this->getContext($context, "url")), "apId" => $this->getAttribute((isset($context["ap"]) ? $context["ap"] : $this->getContext($context, "ap")), "id"), "parentEntityId" => $this->getAttribute((isset($context["parentEntity"]) ? $context["parentEntity"] : $this->getContext($context, "parentEntity")), "getId", array(), "method"), "apDescription" => $this->getAttribute((isset($context["ap"]) ? $context["ap"] : $this->getContext($context, "ap")), "getDescription", array(), "method")));
            echo "
                            </td>
                        </tr>
                    ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ap'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 57
        echo "                    </tbody>
                </table>
            </div>

        </div>
    </div>

";
    }

    // line 15
    public function block_creationForm($context, array $blocks = array())
    {
        // line 16
        echo "            <div class=\"row\">
                ";
        // line 18
        echo "                ";
        // line 19
        echo "            </div>
            ";
    }

    // line 49
    public function block_tableFirstColumn($context, array $blocks = array())
    {
        echo "   ";
    }

    // line 66
    public function block_javascripts($context, array $blocks = array())
    {
        // line 67
        echo "        ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
        <script src=\"";
        // line 68
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sisconeeapp/js/annualPlanification.js"), "html", null, true);
        echo "\"></script>
    ";
    }

    public function getTemplateName()
    {
        return "sisconeeAppBundle:Planificacion:annual_planificacion.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  189 => 68,  184 => 67,  181 => 66,  175 => 49,  170 => 19,  168 => 18,  165 => 16,  162 => 15,  151 => 57,  133 => 53,  127 => 51,  122 => 49,  119 => 47,  102 => 46,  93 => 40,  86 => 35,  77 => 32,  75 => 31,  66 => 28,  62 => 26,  58 => 24,  51 => 15,  42 => 8,  34 => 3,  84 => 47,  79 => 24,  72 => 20,  68 => 19,  64 => 27,  60 => 17,  57 => 16,  54 => 21,  47 => 12,  44 => 11,  39 => 7,  36 => 7,  31 => 2,  29 => 4,  27 => 3,);
    }
}
