<?php

/* sisconeeAppBundle:PlanAnualEntidad:index.html.twig */
class __TwigTemplate_65809a20bb142bdb187aed0bf128383996dd92175dfb51a698cf38d7fb08335f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("sisconeeAppBundle:Planificacion:annual_planificacion.html.twig");

        $this->blocks = array(
            'creationForm' => array($this, 'block_creationForm'),
            'tableFirstColumn' => array($this, 'block_tableFirstColumn'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "sisconeeAppBundle:Planificacion:annual_planificacion.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 3
        $context["emptyInfo"] = "No existen planes anuales creados para las entidades subordinadas a ";
        // line 4
        $context["plansInfo"] = "Planes anuales de las entidades subordinadas a ";
        // line 5
        $context["firstColumnHead"] = "Entidad";
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 7
    public function block_creationForm($context, array $blocks = array())
    {
        // line 8
        echo "    ";
        $this->env->loadTemplate("sisconeeAppBundle:PlanAnualEntidad:new.html.twig")->display($context);
    }

    // line 11
    public function block_tableFirstColumn($context, array $blocks = array())
    {
        // line 12
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ap"]) ? $context["ap"] : $this->getContext($context, "ap")), "entidad"), "html", null, true);
        echo "
";
    }

    // line 15
    public function block_javascripts($context, array $blocks = array())
    {
        // line 16
        echo "        <script>
            var loadDataUrl = '";
        // line 17
        echo $this->env->getExtension('routing')->getPath("plananualentidad_load_data");
        echo "';
            var formSubmit = '";
        // line 18
        echo $this->env->getExtension('routing')->getPath("plananualentidad_create");
        echo "';
            var emptyInfo = '";
        // line 19
        echo twig_escape_filter($this->env, (isset($context["emptyInfo"]) ? $context["emptyInfo"] : $this->getContext($context, "emptyInfo")), "html", null, true);
        echo "';
            var plansInfo = '";
        // line 20
        echo twig_escape_filter($this->env, (isset($context["plansInfo"]) ? $context["plansInfo"] : $this->getContext($context, "plansInfo")), "html", null, true);
        echo "';
            var formPlanFieldName = 'sisconee_appbundle_plananualentidad[plan]';
            var formId = 'annualPlanificationForm';
        </script>
        ";
        // line 24
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "

        ";
        // line 28
        echo "
    ";
    }

    public function getTemplateName()
    {
        return "sisconeeAppBundle:PlanAnualEntidad:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  84 => 28,  79 => 24,  72 => 20,  68 => 19,  64 => 18,  60 => 17,  57 => 16,  54 => 15,  47 => 12,  44 => 11,  39 => 8,  36 => 7,  31 => 5,  29 => 4,  27 => 3,);
    }
}
