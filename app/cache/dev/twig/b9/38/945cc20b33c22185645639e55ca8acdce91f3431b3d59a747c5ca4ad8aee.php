<?php

/* sisconeeAdministracionBundle:Usuario:edit.html.twig */
class __TwigTemplate_b938945cc20b33c22185645639e55ca8acdce91f3431b3d59a747c5ca4ad8aee extends Twig_Template
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
        echo "

    <h1>Editar usuario: ";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "nombre"), "html", null, true);
        echo " </h1>

    ";
        // line 8
        $this->env->loadTemplate("::flashmessages.html.twig")->display($context);
        // line 9
        echo "    ";
        $this->env->loadTemplate("::modal-delete.html.twig")->display($context);
        // line 10
        echo "    ";
        // line 15
        echo "
    ";
        // line 17
        echo "    ";
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), 'form_start');
        echo "

    ";
        // line 19
        if ((!array_key_exists("editPass", $context))) {
            // line 20
            echo "        ";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "nombre"), 'row');
            echo "
        ";
            // line 21
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "rol"), 'row');
            echo "
        ";
            // line 22
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "username"), 'row');
            echo "
        ";
            // line 23
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "entidad"), 'row');
            echo "
        ";
            // line 24
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "correo"), 'row');
            echo "
    ";
        }
        // line 26
        echo "
    ";
        // line 27
        if (array_key_exists("editPass", $context)) {
            // line 28
            echo "        ";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "password"), 'row');
            echo "

        <div hidden=\"hidden\">
            ";
            // line 31
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "nombre"), 'row');
            echo "
            ";
            // line 32
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "rol"), 'row');
            echo "
            ";
            // line 33
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "username"), 'row');
            echo "
            ";
            // line 34
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "entidad"), 'row');
            echo "
            ";
            // line 35
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "correo"), 'row');
            echo "
        </div>
    ";
        }
        // line 38
        echo "
    ";
        // line 39
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "_token"), 'row');
        echo "



    ";
        // line 44
        echo "
    ";
        // line 46
        echo "
    ";
        // line 48
        echo "



    <div class=\"form-actions\">

        <input type=\"submit\" class=\"btn btn-primary\" value=\"Aceptar\"/>
        <a class=\"btn btn-default\" href=\"";
        // line 55
        echo $this->env->getExtension('routing')->getPath("administracion_usuario");
        echo "\">Regresar al listado</a>

        <a class=\"btn btn-danger link-eliminar\" style=\"margin-left:50px;\" href=\"javascript:void(0)\"
           data-url=\"";
        // line 58
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("administracion_usuario_delete", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
        echo "\"
           data-descripcion=\"";
        // line 59
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "nombre"), "html", null, true);
        echo "\"
           data-toggle=\"modal\" data-target=\"#modal-delete\">
            <span class=\"glyphicon glyphicon-trash\"></span>Eliminar
        </a>
    </div>
    ";
        // line 65
        echo "    ";
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), 'form_end', array("render_rest" => false));
        echo "



";
    }

    // line 71
    public function block_javascripts($context, array $blocks = array())
    {
        // line 72
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
    <script src=\"";
        // line 73
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("layoutadmin/admin-list.js"), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "sisconeeAdministracionBundle:Usuario:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  176 => 73,  171 => 72,  168 => 71,  158 => 65,  150 => 59,  146 => 58,  140 => 55,  131 => 48,  128 => 46,  125 => 44,  118 => 39,  115 => 38,  109 => 35,  105 => 34,  101 => 33,  97 => 32,  93 => 31,  86 => 28,  84 => 27,  81 => 26,  76 => 24,  72 => 23,  68 => 22,  64 => 21,  59 => 20,  57 => 19,  51 => 17,  48 => 15,  46 => 10,  43 => 9,  41 => 8,  36 => 6,  32 => 4,  29 => 3,);
    }
}
