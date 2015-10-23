<?php

/* sisconeeAppBundle:PlanAnualEntidad:new.html.twig */
class __TwigTemplate_906cdb40198dd4cdc8f4c882c19f6bb56f8614248e85f61ccabc9c2471ba6aa0 extends Twig_Template
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
        echo "<div class=\"myhidden\" id=\"addplan-form\" >
    ";
        // line 2
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_start');
        echo "
    ";
        // line 3
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
        echo "
    ";
        // line 5
        echo "    ";
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_end');
        echo "
</div>

";
    }

    public function getTemplateName()
    {
        return "sisconeeAppBundle:PlanAnualEntidad:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  30 => 5,  26 => 3,  22 => 2,  19 => 1,  84 => 28,  79 => 24,  72 => 20,  68 => 19,  64 => 18,  60 => 17,  57 => 16,  54 => 15,  47 => 12,  44 => 11,  39 => 8,  36 => 7,  31 => 5,  29 => 4,  27 => 3,);
    }
}
