<?php

/* sisconeeAdministracionBundle:Default:layout_edituser.html.twig */
class __TwigTemplate_b70b3887dea449e4b56e4fbbdd327b88b8a8ef5f7eea469532e481c266be12bb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'content' => array($this, 'block_content'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        // line 4
        echo "    Editar usuario
";
    }

    // line 7
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 8
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bootstrap/css/bootstrap.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\"/>
    <link href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bootstrap/css/bootstrap-theme.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\"/>
    <link href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("layoutadmin/styles.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\"/>
";
    }

    // line 13
    public function block_body($context, array $blocks = array())
    {
        // line 14
        echo "    <div id=\"ajax-loader\">
        Actualizando registros
    </div>

    <style>
        @media (min-width: 768px) {
            .table {
                width: 50%;
            }

            .admin-list-actions.autosize {
                width: 50%;
            }
        }
    </style>

    ";
        // line 30
        $this->env->loadTemplate("::modal-delete.html.twig")->display($context);
        // line 31
        echo "
    <div>
        <div class=\"row\">
            ";
        // line 34
        $context["userEditHref"] = $this->env->getExtension('routing')->getPath("usuario_edit", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getId", array(), "method")));
        // line 35
        echo "            ";
        $context["passEditHref"] = $this->env->getExtension('routing')->getPath("usuario_edit_password", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getId", array(), "method")));
        // line 36
        echo "
            ";
        // line 37
        echo twig_include($this->env, $context, "::layout_modules_menu.html.twig", array("submenuTitle" => "Editar usuario", "submenuHref" => "#", "submenuOptions" => array("Editar cuenta" => (isset($context["userEditHref"]) ? $context["userEditHref"] : $this->getContext($context, "userEditHref")), "Cambiar contraseña" => (isset($context["passEditHref"]) ? $context["passEditHref"] : $this->getContext($context, "passEditHref")))));
        // line 46
        echo "

        </div>

        <div class=\"row\" style=\"margin-top: 51px; \">
            <div class=\"col-sm-11\" style=\"margin-left: 25px; margin-right: 100px;\">
                ";
        // line 52
        $this->env->loadTemplate("::flashmessages.html.twig")->display($context);
        // line 53
        echo "            </div>
        </div>

        <div id=\"container\" style=\"margin-top: 10px;\">
            ";
        // line 57
        $this->displayBlock('content', $context, $blocks);
        // line 59
        echo "        </div>

        <nav class=\"navbar navbar-default navbar-fixed-bottom\" role=\"navigation\">
            <div class=\"container\">
                Sisconee | Editar usuario
            </div>
        </nav>

    </div>

";
    }

    // line 57
    public function block_content($context, array $blocks = array())
    {
        // line 58
        echo "            ";
    }

    // line 71
    public function block_javascripts($context, array $blocks = array())
    {
        // line 72
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("jquery/jquery.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 73
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bootstrap/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "sisconeeAdministracionBundle:Default:layout_edituser.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  143 => 73,  138 => 72,  135 => 71,  131 => 58,  128 => 57,  114 => 59,  112 => 57,  106 => 53,  104 => 52,  96 => 46,  94 => 37,  91 => 36,  86 => 34,  81 => 31,  79 => 30,  61 => 14,  58 => 13,  52 => 10,  48 => 9,  43 => 8,  88 => 35,  83 => 28,  80 => 27,  74 => 24,  69 => 22,  62 => 18,  57 => 16,  49 => 11,  45 => 10,  40 => 7,  35 => 4,  32 => 3,  29 => 3,);
    }
}
