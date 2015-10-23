<?php

/* sisconeeAppBundle:PlanDiarioServicio:index.html.twig */
class __TwigTemplate_fed8003bae1ab97c7a3eef7cec5a146514a327e285fd3cc6aa8da1d228b36cdf extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("sisconeeAppBundle:Planificacion:general_planificacion.html.twig");

        $this->blocks = array(
            'planification' => array($this, 'block_planification'),
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

    // line 3
    public function block_planification($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        $context["months"] = array(0 => "Enero", 1 => "Febrero", 2 => "Marzo", 3 => "Abril", 4 => "Mayo", 5 => "Junio", 6 => "Julio", 7 => "Agosto", 8 => "Septiembre", 9 => "Octubre", 10 => "Noviembre", 11 => "Diciembre");
        // line 16
        echo "
    ";
        // line 17
        $context["weeks"] = array(0 => "Semana 1 (1-7)", 1 => "Semana 2 (8-14)", 2 => "Semana 3 (15-21)", 3 => "Semana 4 (22-28)", 4 => "Semana 5 (29-31)");
        // line 18
        echo "
    <div class=\"col-sm-12\">
        ";
        // line 21
        echo "        <div class=\"row\">
            <div class=\"col-sm-6\">
                ";
        // line 23
        echo twig_include($this->env, $context, "sisconeeAppBundle:Planificacion:services_planification.html.twig", array("services" => (isset($context["services"]) ? $context["services"] : $this->getContext($context, "services"))));
        echo "
            </div>
        </div>

        <div class=\"form-inline row\">
            ";
        // line 29
        echo "            <div class=\"form-group col-lg-4\">
                <label class=\"control-label\" for=\"month_selected\">Mes:</label>
                <select id=\"month_selected\">
                    ";
        // line 32
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["months"]) ? $context["months"] : $this->getContext($context, "months")));
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
        foreach ($context['_seq'] as $context["_key"] => $context["month_name"]) {
            // line 33
            echo "                        <option value=";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "index"), "html", null, true);
            echo " ";
            echo ((($this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "index") == (isset($context["selectedMonth"]) ? $context["selectedMonth"] : $this->getContext($context, "selectedMonth")))) ? ("selected='true'") : (""));
            echo ">";
            echo twig_escape_filter($this->env, (isset($context["month_name"]) ? $context["month_name"] : $this->getContext($context, "month_name")), "html", null, true);
            echo "</option>
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['month_name'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 35
        echo "                </select>
            </div>

            ";
        // line 39
        echo "            <div class=\"form-group col-lg-4\">
                <label class=\"control-label\" for=\"week_selected\">Semana:</label>
                <select id=\"week_selected\">
                    ";
        // line 42
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["weeks"]) ? $context["weeks"] : $this->getContext($context, "weeks")));
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
        foreach ($context['_seq'] as $context["_key"] => $context["week_name"]) {
            // line 43
            echo "                        <option id=\"week";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "index"), "html", null, true);
            echo "\" ";
            echo ((($this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "index") == (isset($context["selectedWeek"]) ? $context["selectedWeek"] : $this->getContext($context, "selectedWeek")))) ? ("selected='true'") : (""));
            echo "
                                value=";
            // line 44
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "index"), "html", null, true);
            echo ">";
            echo twig_escape_filter($this->env, (isset($context["week_name"]) ? $context["week_name"] : $this->getContext($context, "week_name")), "html", null, true);
            echo "</option>
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['week_name'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 46
        echo "                </select>
            </div>
        </div>

        ";
        // line 51
        echo "        <div class=\"row\" style=\"align-content: center\">
            <h4 class=\"header_top\">Planes diarios asignados al servicio ";
        // line 52
        echo twig_escape_filter($this->env, (isset($context["selectedService"]) ? $context["selectedService"] : $this->getContext($context, "selectedService")), "html", null, true);
        echo "</h4>
        </div>

        <div class=\"row\">
            <div class=\"col-sm-12\">

                ";
        // line 58
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["plans_form"]) ? $context["plans_form"] : $this->getContext($context, "plans_form")), 'form_start', array("attr" => array("class" => "form-horizontal")));
        echo "

                ";
        // line 61
        echo "                <div class=\"row\">
                    <div class=\"col-sm-12\">
                        ";
        // line 63
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(1, 31));
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
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 64
            echo "                            ";
            if ((((isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")) % 7) == 1)) {
                // line 65
                echo "                                ";
                $context["weekIndex"] = ((((isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")) / 7) + 1) - (1 / 7));
                // line 66
                echo "                                ";
                $context["visible"] = ((((isset($context["weekIndex"]) ? $context["weekIndex"] : $this->getContext($context, "weekIndex")) > 1)) ? ("none") : ("block"));
                // line 67
                echo "                                <div class=\"week";
                echo twig_escape_filter($this->env, (isset($context["weekIndex"]) ? $context["weekIndex"] : $this->getContext($context, "weekIndex")), "html", null, true);
                echo "\" style=\"display: ";
                echo twig_escape_filter($this->env, (isset($context["visible"]) ? $context["visible"] : $this->getContext($context, "visible")), "html", null, true);
                echo "\">
                            ";
            }
            // line 69
            echo "                            <div class=\"col-lg-3\">
                                ";
            // line 70
            $context["planField"] = $this->getAttribute($this->getAttribute((isset($context["plans_form"]) ? $context["plans_form"] : $this->getContext($context, "plans_form")), "plans"), (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), array(), "array");
            // line 71
            echo "                                <div class=\"row\" id=\"plan_day";
            echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "html", null, true);
            echo "\">
                                    <div &#123;&#35; id=\"plans_";
            // line 72
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "index"), "html", null, true);
            echo "\"&#35;&#125;>
                                        ";
            // line 73
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["planField"]) ? $context["planField"] : $this->getContext($context, "planField")), 'label');
            echo "
                                    </div>

                                    ";
            // line 76
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["plans_form"]) ? $context["plans_form"] : $this->getContext($context, "plans_form")), "plans"), 'label');
            echo "
                                    ";
            // line 77
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["planField"]) ? $context["planField"] : $this->getContext($context, "planField")), 'widget');
            echo "

                                    ";
            // line 79
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["plans_form"]) ? $context["plans_form"] : $this->getContext($context, "plans_form")), "hpPlans"), 'label');
            echo "
                                    ";
            // line 80
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["plans_form"]) ? $context["plans_form"] : $this->getContext($context, "plans_form")), "hpPlans"), (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), array(), "array"), 'widget');
            echo "

                                </div>
                            </div>
                            ";
            // line 84
            if ((((isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")) % 7) == 0)) {
                // line 85
                echo "                                </div>
                            ";
            }
            // line 87
            echo "                        ";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 88
        echo "
                        ";
        // line 112
        echo "
                    </div>
                </div>

                ";
        // line 116
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["plans_form"]) ? $context["plans_form"] : $this->getContext($context, "plans_form")), 'form_end');
        echo "

            </div>

        </div>

    </div>
";
    }

    // line 125
    public function block_javascripts($context, array $blocks = array())
    {
        // line 126
        echo "        ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
        <script>
            var redirectTo = '";
        // line 128
        echo $this->env->getExtension('routing')->getPath("plandiarioservicio");
        echo "';
            var planFieldsCommonName = 'sisconee_appbundle_lecturadiariaservicio[plans]';
            var hpPlanFieldsCommonName = 'sisconee_appbundle_lecturadiariaservicio[hpPlans]';
            var fieldsCount = 7;
            var formId = 'form_plans_day';
        </script>
        <script src=\"";
        // line 134
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sisconeeapp/js/dayPlanification.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 135
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sisconeeapp/js/servicePlanification.js"), "html", null, true);
        echo "\"></script>
    ";
    }

    public function getTemplateName()
    {
        return "sisconeeAppBundle:PlanDiarioServicio:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  315 => 135,  311 => 134,  302 => 128,  296 => 126,  293 => 125,  281 => 116,  275 => 112,  272 => 88,  258 => 87,  254 => 85,  252 => 84,  245 => 80,  241 => 79,  236 => 77,  232 => 76,  226 => 73,  222 => 72,  217 => 71,  215 => 70,  212 => 69,  204 => 67,  201 => 66,  198 => 65,  195 => 64,  178 => 63,  174 => 61,  169 => 58,  160 => 52,  157 => 51,  151 => 46,  133 => 44,  126 => 43,  109 => 42,  104 => 39,  99 => 35,  78 => 33,  61 => 32,  56 => 29,  48 => 23,  44 => 21,  40 => 18,  38 => 17,  35 => 16,  32 => 4,  29 => 3,);
    }
}
