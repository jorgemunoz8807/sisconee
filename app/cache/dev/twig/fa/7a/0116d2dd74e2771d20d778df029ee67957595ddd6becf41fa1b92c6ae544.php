<?php

/* sisconeeAdministracionBundle:TipoServicio:new.html.twig */
class __TwigTemplate_fa7a0116d2dd74e2771d20d778df029ee67957595ddd6becf41fa1b92c6ae544 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("sisconeeAdministracionBundle:Default:layout_admin.html.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
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

    // line 4
    public function block_content($context, array $blocks = array())
    {
        // line 5
        echo "
    <h1>Adicionar Tipo de Servicio</h1>

        ";
        // line 8
        $this->env->loadTemplate("::flashmessages.html.twig")->display($context);
        // line 9
        echo "
    ";
        // line 10
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_start');
        echo "
      ";
        // line 11
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget');
        echo "
        <div class=\"form-actions\">
            <input type=\"submit\" class=\"btn btn-primary\" value=\"Aceptar\" />
            <a class=\"btn btn-default\" href=\"";
        // line 14
        echo $this->env->getExtension('routing')->getPath("administracion_tiposervicio");
        echo "\">Regresar al listado</a>
        </div>
    ";
        // line 16
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_end');
        echo "

";
    }

    public function getTemplateName()
    {
        return "sisconeeAdministracionBundle:TipoServicio:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  56 => 16,  51 => 14,  45 => 11,  41 => 10,  38 => 9,  36 => 8,  31 => 5,  28 => 4,);
    }
}
