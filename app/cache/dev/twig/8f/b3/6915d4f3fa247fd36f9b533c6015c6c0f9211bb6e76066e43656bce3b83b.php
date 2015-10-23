<?php

/* sisconeeAdministracionBundle:Entidad:new.html.twig */
class __TwigTemplate_8fb36915d4f3fa247fd36f9b533c6015c6c0f9211bb6e76066e43656bce3b83b extends Twig_Template
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

    <h1>Adicionar Entidad</h1>

    ";
        // line 9
        $this->env->loadTemplate("::flashmessages.html.twig")->display($context);
        // line 10
        echo "
    ";
        // line 11
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_start');
        echo "
        ";
        // line 12
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget');
        echo "
        <div class=\"form-actions\">
            <input type=\"submit\" class=\"btn btn-primary\" value=\"Aceptar\" />
            <a class=\"btn btn-default\" href=\"";
        // line 15
        echo $this->env->getExtension('routing')->getPath("administracion_entidad");
        echo "\">Regresar al listado</a>
        </div>
        ";
        // line 17
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_end');
        echo "

    ";
        // line 26
        echo "
    ";
        // line 28
        echo "
   ";
        // line 39
        echo "
";
    }

    public function getTemplateName()
    {
        return "sisconeeAdministracionBundle:Entidad:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  68 => 39,  65 => 28,  62 => 26,  57 => 17,  52 => 15,  46 => 12,  42 => 11,  39 => 10,  37 => 9,  31 => 5,  28 => 4,);
    }
}
