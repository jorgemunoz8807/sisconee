<?php

/* sisconeeAdministracionBundle:Default:layout_admin.html.twig */
class __TwigTemplate_91c53278870cb54a0a5de4baf8059e4931139cb1248c687271b994a6d8b0e974 extends Twig_Template
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
        echo "    Administración
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
        $context["href"] = $this->env->getExtension('routing')->getPath("administracion");
        // line 35
        echo "            ";
        $context["gralConfigHref"] = $this->env->getExtension('routing')->getPath("configuracion_edit");
        // line 36
        echo "            ";
        $context["userAdminHref"] = $this->env->getExtension('routing')->getPath("administracion_usuario");
        // line 37
        echo "            ";
        $context["entityAdminHref"] = $this->env->getExtension('routing')->getPath("administracion_entidad");
        // line 38
        echo "            ";
        $context["serviceTypeAdminHref"] = $this->env->getExtension('routing')->getPath("administracion_tiposervicio");
        // line 39
        echo "            ";
        $context["serviceAdminHref"] = $this->env->getExtension('routing')->getPath("administracion_servicio");
        // line 40
        echo "            ";
        $context["historialAdminHref"] = $this->env->getExtension('routing')->getPath("trazas");
        // line 41
        echo "

            ";
        // line 44
        echo "
            ";
        // line 45
        echo twig_include($this->env, $context, "::layout_modules_menu.html.twig", array("submenuTitle" => "Administración", "submenuHref" => (isset($context["href"]) ? $context["href"] : $this->getContext($context, "href")), "submenuOptions" => array("Configuración general" => (isset($context["gralConfigHref"]) ? $context["gralConfigHref"] : $this->getContext($context, "gralConfigHref")), "Usuarios" => (isset($context["userAdminHref"]) ? $context["userAdminHref"] : $this->getContext($context, "userAdminHref")), "Entidades" => (isset($context["entityAdminHref"]) ? $context["entityAdminHref"] : $this->getContext($context, "entityAdminHref")), "Tipos de servicio" => (isset($context["serviceTypeAdminHref"]) ? $context["serviceTypeAdminHref"] : $this->getContext($context, "serviceTypeAdminHref")), "Servicios" => (isset($context["serviceAdminHref"]) ? $context["serviceAdminHref"] : $this->getContext($context, "serviceAdminHref")), "Historial de operaciones" => (isset($context["historialAdminHref"]) ? $context["historialAdminHref"] : $this->getContext($context, "historialAdminHref")))));
        // line 58
        echo "


        </div>

        <div class=\"row\" style=\"margin-top: 51px; \">
            <div class=\"col-sm-11\" style=\"margin-left: 25px; margin-right: 100px;\">
                ";
        // line 65
        $this->env->loadTemplate("::flashmessages.html.twig")->display($context);
        // line 66
        echo "            </div>
        </div>

        <div id=\"container\" style=\"margin-top: 10px;\">
            ";
        // line 70
        $this->displayBlock('content', $context, $blocks);
        // line 72
        echo "        </div>

        <nav class=\"navbar navbar-default navbar-fixed-bottom\" role=\"navigation\">
            <div class=\"container\">
                Sisconee | Módulo de Administración
            </div>
        </nav>

    </div>

";
    }

    // line 70
    public function block_content($context, array $blocks = array())
    {
        // line 71
        echo "            ";
    }

    // line 84
    public function block_javascripts($context, array $blocks = array())
    {
        // line 85
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("jquery/jquery.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 86
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bootstrap/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "sisconeeAdministracionBundle:Default:layout_admin.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  163 => 86,  158 => 85,  155 => 84,  151 => 71,  148 => 70,  134 => 72,  132 => 70,  126 => 66,  124 => 65,  115 => 58,  113 => 45,  110 => 44,  106 => 41,  103 => 40,  100 => 39,  97 => 38,  94 => 37,  91 => 36,  88 => 35,  86 => 34,  81 => 31,  79 => 30,  61 => 14,  58 => 13,  52 => 10,  48 => 9,  43 => 8,  40 => 7,  35 => 4,  32 => 3,);
    }
}
