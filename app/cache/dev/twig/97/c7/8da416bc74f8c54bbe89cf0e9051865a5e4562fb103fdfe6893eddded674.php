<?php

/* sisconeeAppBundle:PlanMensualServicio:index.html.twig */
class __TwigTemplate_97c78da416bc74f8c54bbe89cf0e9051865a5e4562fb103fdfe6893eddded674 extends Twig_Template
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
        echo "
    <div class=\"col-sm-12\">

        ";
        // line 8
        echo "        <div class=\"row\">
            <div class=\"col-sm-6\">
                ";
        // line 10
        echo twig_include($this->env, $context, "sisconeeAppBundle:Planificacion:services_planification.html.twig", array("services" => (isset($context["services"]) ? $context["services"] : $this->getContext($context, "services"))));
        echo "
            </div>
        </div>

        ";
        // line 15
        echo "        <div class=\"row\" style=\"align-content: center\">
            <h4 class=\"header_top\">Planes mensuales asignados al servicio ";
        // line 16
        echo twig_escape_filter($this->env, (isset($context["selectedService"]) ? $context["selectedService"] : $this->getContext($context, "selectedService")), "html", null, true);
        echo "</h4>
        </div>

        <div class=\"row\">
            <div class=\"col-sm-12\">

                ";
        // line 22
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["plans_form"]) ? $context["plans_form"] : $this->getContext($context, "plans_form")), 'form_start', array("attr" => array("class" => "form-horizontal")));
        echo "

                <div class=\"row mensual-plans-container\">
                    ";
        // line 25
        $context["plansPerColumn"] = 4;
        // line 26
        echo "
                    ";
        // line 27
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["plans_form"]) ? $context["plans_form"] : $this->getContext($context, "plans_form")), "plans"));
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
        foreach ($context['_seq'] as $context["_key"] => $context["planField"]) {
            // line 28
            echo "
                        ";
            // line 29
            if ((($this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "index") % (isset($context["plansPerColumn"]) ? $context["plansPerColumn"] : $this->getContext($context, "plansPerColumn"))) == 1)) {
                echo " ";
                // line 30
                echo "                            <div class=\"col-md-3\">
                        ";
            }
            // line 32
            echo "
                        <div class=\"form-group mensual-plan-container\">
                            <div class=\"col-lg-6\" style=\"text-align: right;\">
                                ";
            // line 35
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["planField"]) ? $context["planField"] : $this->getContext($context, "planField")), 'label');
            echo "
                            </div>
                            <div class=\"col-lg-6\">
                                ";
            // line 39
            echo "                                ";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["planField"]) ? $context["planField"] : $this->getContext($context, "planField")), 'widget', array("attr" => array("style" => "width: 100%")));
            echo "
                                ";
            // line 40
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["planField"]) ? $context["planField"] : $this->getContext($context, "planField")), 'errors');
            echo "

                                ";
            // line 43
            echo "                                ";
            if ($this->getAttribute((isset($context["selectedService"]) ? $context["selectedService"] : $this->getContext($context, "selectedService")), "getHorarioPico")) {
                // line 44
                echo "                                ";
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["plans_form"]) ? $context["plans_form"] : $this->getContext($context, "plans_form")), "hpPlans"), $this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "index"), array(), "array"), 'widget', array("attr" => array("style" => "width: 100%")));
                echo "
                                ";
                // line 45
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["plans_form"]) ? $context["plans_form"] : $this->getContext($context, "plans_form")), "hpPlans"), $this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "index"), array(), "array"), 'errors');
                echo "
                                ";
            }
            // line 47
            echo "                            </div>
                        </div>

                        ";
            // line 50
            if ((($this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "index") % (isset($context["plansPerColumn"]) ? $context["plansPerColumn"] : $this->getContext($context, "plansPerColumn"))) == 0)) {
                // line 51
                echo "                            </div>
                        ";
            }
            // line 53
            echo "
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['planField'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 55
        echo "                </div>

                ";
        // line 57
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["plans_form"]) ? $context["plans_form"] : $this->getContext($context, "plans_form")), 'form_end');
        echo "
            </div>
        </div>

    </div>
";
    }

    // line 64
    public function block_javascripts($context, array $blocks = array())
    {
        // line 65
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
    <script>
        var redirectTo = '";
        // line 67
        echo $this->env->getExtension('routing')->getPath("planmensualservicio");
        echo "';
        var planFieldsCommonName = 'sisconee_appbundle_planesmensuales[plans]';
        var hpPlanFieldsCommonName = 'sisconee_appbundle_planesmensuales[hpPlans]';
        var fieldsCount = 12;
        var formId = 'mensualPlanificationForm';
    </script>
    <script src=\"";
        // line 73
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sisconeeapp/js/servicePlanification_monthly.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 74
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sisconeeapp/js/servicePlanification.js"), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "sisconeeAppBundle:PlanMensualServicio:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  194 => 74,  190 => 73,  181 => 67,  175 => 65,  172 => 64,  162 => 57,  158 => 55,  143 => 53,  139 => 51,  137 => 50,  132 => 47,  127 => 45,  122 => 44,  119 => 43,  114 => 40,  109 => 39,  103 => 35,  98 => 32,  94 => 30,  91 => 29,  88 => 28,  71 => 27,  68 => 26,  66 => 25,  60 => 22,  51 => 16,  48 => 15,  41 => 10,  37 => 8,  32 => 4,  29 => 3,);
    }
}
