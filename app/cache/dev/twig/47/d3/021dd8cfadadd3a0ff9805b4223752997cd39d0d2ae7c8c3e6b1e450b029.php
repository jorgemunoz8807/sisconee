<?php

/* sisconeeAdministracionBundle:Usuario:new.html.twig */
class __TwigTemplate_47d3021dd8cfadadd3a0ff9805b4223752997cd39d0d2ae7c8c3e6b1e450b029 extends Twig_Template
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

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "    <style>
        @media (min-width: 768px) {
            .table {
                width: 50%;
            }

            .admin-list-actions.autosize {
                width: 50%;
            }
        }
    </style>
    <h1>Adicionar Usuario</h1>

    ";
        // line 17
        $this->env->loadTemplate("::flashmessages.html.twig")->display($context);
        // line 18
        echo "
    ";
        // line 19
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_start');
        echo "
    ";
        // line 21
        echo "    ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "nombre"), 'row');
        echo "
    ";
        // line 22
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "rol"), 'row');
        echo "
    ";
        // line 23
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "username"), 'row');
        echo "
    ";
        // line 24
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "entidad"), 'row');
        echo "
    ";
        // line 25
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "correo"), 'row');
        echo "
    ";
        // line 26
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "_token"), 'row');
        echo "
    ";
        // line 28
        echo "        ";
        // line 29
        echo "    ";
        // line 30
        echo "


    <div class=\"form-actions\">
        <input type=\"submit\" class=\"btn btn-primary\" value=\"Aceptar\" />
        <a class=\"btn btn-default\" href=\"";
        // line 35
        echo $this->env->getExtension('routing')->getPath("administracion_usuario");
        echo "\">Regresar al listado</a>
    </div>
    ";
        // line 37
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_end', array("render_rest" => false));
        echo "



";
    }

    public function getTemplateName()
    {
        return "sisconeeAdministracionBundle:Usuario:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  96 => 37,  91 => 35,  84 => 30,  82 => 29,  80 => 28,  76 => 26,  72 => 25,  68 => 24,  64 => 23,  60 => 22,  55 => 21,  51 => 19,  48 => 18,  46 => 17,  31 => 4,  28 => 3,);
    }
}
