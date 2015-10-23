<?php

/* sisconeeAppBundle:PlanAnualServicio:index.html.twig */
class __TwigTemplate_dd72d950d71d9ee033ad40d028536efeb606a201274b74ee39fe690b1c3f04a6 extends Twig_Template
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
        $context["emptyInfo"] = "No existen planes anuales creados para los servicios de ";
        // line 4
        $context["plansInfo"] = "Planes anuales de los servicios de ";
        // line 5
        $context["firstColumnHead"] = "Servicio";
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 7
    public function block_creationForm($context, array $blocks = array())
    {
        // line 8
        echo "    ";
        $this->env->loadTemplate("sisconeeAppBundle:PlanAnualServicio:new.html.twig")->display($context);
    }

    // line 11
    public function block_tableFirstColumn($context, array $blocks = array())
    {
        // line 12
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ap"]) ? $context["ap"] : $this->getContext($context, "ap")), "servicio"), "html", null, true);
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
        echo $this->env->getExtension('routing')->getPath("plananualservicio_load_data");
        echo "';
            var formSubmit = '";
        // line 18
        echo $this->env->getExtension('routing')->getPath("plananualservicio_create");
        echo "';
            var emptyInfo = '";
        // line 19
        echo twig_escape_filter($this->env, (isset($context["emptyInfo"]) ? $context["emptyInfo"] : $this->getContext($context, "emptyInfo")), "html", null, true);
        echo "';
            var plansInfo = '";
        // line 20
        echo twig_escape_filter($this->env, (isset($context["plansInfo"]) ? $context["plansInfo"] : $this->getContext($context, "plansInfo")), "html", null, true);
        echo "';
            var formPlanFieldName = 'sisconee_appbundle_plananualservicio[plan]';
            var formId = 'annualPlanificationForm';
        </script>
        ";
        // line 24
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "

        ";
        // line 47
        echo "
    ";
    }

    public function getTemplateName()
    {
        return "sisconeeAppBundle:PlanAnualServicio:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  84 => 47,  79 => 24,  72 => 20,  68 => 19,  64 => 18,  60 => 17,  57 => 16,  54 => 15,  47 => 12,  44 => 11,  39 => 8,  36 => 7,  31 => 5,  29 => 4,  27 => 3,);
    }
}
