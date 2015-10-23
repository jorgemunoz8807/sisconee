<?php

/* sisconeeAdministracionBundle:Usuario:commonUserEdit.html.twig */
class __TwigTemplate_8b2dc8dc5821915fb2e22524b2fbd054de46aff59dce604e6f8f93c2254c4564 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("sisconeeAdministracionBundle:Default:layout_edituser.html.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "sisconeeAdministracionBundle:Default:layout_edituser.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "
    <h1>Editar datos generales";
        // line 5
        echo " </h1>

    ";
        // line 7
        $this->env->loadTemplate("::flashmessages.html.twig")->display($context);
        // line 8
        echo "    ";
        $this->env->loadTemplate("::modal-delete.html.twig")->display($context);
        // line 9
        echo "    ";
        // line 14
        echo "
    ";
        // line 16
        echo "    ";
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), 'form_start');
        echo "

    ";
        // line 18
        if ((!array_key_exists("editPass", $context))) {
            // line 19
            echo "        ";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "nombre"), 'row');
            echo "
        ";
            // line 20
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "username"), 'row');
            echo "
        ";
            // line 21
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "correo"), 'row');
            echo "
    ";
        }
        // line 23
        echo "
    ";
        // line 24
        if (array_key_exists("editPass", $context)) {
            // line 25
            echo "        ";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "password"), 'row');
            echo "

        <div hidden=\"hidden\">
            ";
            // line 28
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "nombre"), 'row');
            echo "
            ";
            // line 29
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "rol"), 'row');
            echo "
            ";
            // line 30
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "username"), 'row');
            echo "
            ";
            // line 31
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "entidad"), 'row');
            echo "
            ";
            // line 32
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "correo"), 'row');
            echo "
        </div>
    ";
        }
        // line 35
        echo "
    ";
        // line 36
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "_token"), 'row');
        echo "

    ";
        // line 39
        echo "
    ";
        // line 41
        echo "
    ";
        // line 43
        echo "
    <div class=\"form-actions\">
        <input type=\"submit\" class=\"btn btn-primary\" value=\"Aceptar\"/>
        ";
        // line 47
        echo "        <a class=\"btn btn-default\" href=\"#\">Cancelar</a>
    </div>
    ";
        // line 50
        echo "    ";
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), 'form_end', array("render_rest" => false));
        echo "

";
    }

    // line 54
    public function block_javascripts($context, array $blocks = array())
    {
        // line 55
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
    <script src=\"";
        // line 56
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("layoutadmin/admin-list.js"), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "sisconeeAdministracionBundle:Usuario:commonUserEdit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  144 => 56,  139 => 55,  136 => 54,  128 => 50,  124 => 47,  119 => 43,  116 => 41,  113 => 39,  108 => 36,  105 => 35,  99 => 32,  95 => 31,  91 => 30,  87 => 29,  83 => 28,  76 => 25,  74 => 24,  71 => 23,  66 => 21,  62 => 20,  57 => 19,  55 => 18,  49 => 16,  46 => 14,  44 => 9,  41 => 8,  39 => 7,  35 => 5,  32 => 4,  29 => 3,);
    }
}
