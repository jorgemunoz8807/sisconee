<?php

/* sisconeeAdministracionBundle:Configuracion:edit.html.twig */
class __TwigTemplate_5859d3b513cb2855a96b9c57e54f134ba6b9ea9f3cd660f464e9086caac88a59 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("sisconeeAdministracionBundle:Default:layout_admin.html.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "sisconeeAdministracionBundle:Default:layout_admin.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        $this->env->loadTemplate("::flashmessages.html.twig")->display($context);
        // line 5
        echo "
    <h1>Configuración General</h1>

    ";
        // line 8
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), 'form_start');
        echo "
    ";
        // line 9
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), 'widget');
        echo "


    ";
        // line 12
        if ($this->env->getExtension('security')->isGranted("ROLE_PLANIFICADOR_SUP")) {
            // line 13
            echo "    <div class=\"form-actions\">
        <input type=\"submit\" class=\"btn btn-primary \" value=\"Cambiar\" />
        <a id=\"closeOpenConfig\" class=\"btn btn-default\" href=\"";
            // line 15
            echo $this->env->getExtension('routing')->getPath("configuracion_changeStatus");
            echo "\">";
            echo twig_escape_filter($this->env, (isset($context["statusText"]) ? $context["statusText"] : $this->getContext($context, "statusText")), "html", null, true);
            echo "</a>
        <a style=\"margin-left: 100px\" class=\"btn btn-default\" href=\"";
            // line 16
            echo $this->env->getExtension('routing')->getPath("configuracion_create");
            echo "\">Nueva Configuración</a>
    </div>
    ";
        }
        // line 19
        echo "
    ";
        // line 20
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), 'form_end');
        echo "

";
    }

    // line 24
    public function block_javascripts($context, array $blocks = array())
    {
        // line 25
        echo "
    ";
        // line 26
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
    <script>
        var getConfigurationUrl = '";
        // line 28
        echo $this->env->getExtension('routing')->getPath("get_configuration");
        echo "';
    </script>
    <script src=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sisconeeadministracion/js/configurations.js"), "html", null, true);
        echo "\"></script>


";
    }

    public function getTemplateName()
    {
        return "sisconeeAdministracionBundle:Configuracion:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 30,  89 => 28,  84 => 26,  81 => 25,  78 => 24,  71 => 20,  68 => 19,  62 => 16,  56 => 15,  52 => 13,  50 => 12,  44 => 9,  40 => 8,  35 => 5,  32 => 4,  29 => 3,);
    }
}
