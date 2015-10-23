<?php

/* sisconeeAdministracionBundle:Usuario:index.html.twig */
class __TwigTemplate_a39753ea5476a2c0e2fff4e407167b8a75cbdf0b666c5909545d09088fbfc6ed extends Twig_Template
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
    <h1>Gestionar Usuarios </h1>

    ";
        // line 18
        $this->env->loadTemplate("::flashmessages.html.twig")->display($context);
        // line 19
        echo "    ";
        $this->env->loadTemplate("::modal-delete.html.twig")->display($context);
        // line 20
        echo "
    <div class=\"admin-list-actions autosize\">
        <form id=\"admin-search-form\" action=\"";
        // line 22
        echo $this->env->getExtension('routing')->getPath("administracion_usuario");
        echo "\" method=\"post\">
            <div id=\"admin-search-layout\" class=\"input-group\" style=\"float: right;\">
                <input id=\"admin-search-text\" name=\"filter\" type=\"text\" class=\"form-control\" placeholder=\"Buscar...\" value=\"";
        // line 24
        echo twig_escape_filter($this->env, (isset($context["filter"]) ? $context["filter"] : $this->getContext($context, "filter")), "html", null, true);
        echo "\">
                <span id=\"admin-search-button\" title=\"Buscar...\" class=\"input-group-addon glyphicon glyphicon-search\"></span>
            </div>
        </form>

        <div class=\"vinculo-add\">
            <a class=\"btn btn-default\" href=\"";
        // line 30
        echo $this->env->getExtension('routing')->getPath("administracion_usuario_new");
        echo "\">
                <span class=\"glyphicon glyphicon-plus-sign\"></span>Adicionar
            </a>
        </div>
    </div>
    ";
        // line 35
        if ((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities"))) {
            // line 36
            echo "        <table class=\"table table-striped table-bordered table-hover\">
            <thead>
            <tr>
                <th style=\"width: 50%;\">
                    ";
            // line 40
            $this->env->loadTemplate("sisconeeAdministracionBundle::link-orden.html.twig")->display(array_merge($context, array("url" => "administracion_usuario", "column_name" => "nombre", "caption" => "Nombre")));
            // line 41
            echo "                </th>
                <th>
                    ";
            // line 43
            $this->env->loadTemplate("sisconeeAdministracionBundle::link-orden.html.twig")->display(array_merge($context, array("url" => "administracion_usuario", "column_name" => "username", "caption" => "Login")));
            // line 44
            echo "                </th>
                <th>
                    ";
            // line 46
            $this->env->loadTemplate("sisconeeAdministracionBundle::link-orden.html.twig")->display(array_merge($context, array("url" => "administracion_usuario", "column_name" => "rol", "caption" => "Rol")));
            // line 47
            echo "                </th>
                ";
            // line 49
            echo "                <th>
                    ";
            // line 50
            $this->env->loadTemplate("sisconeeAdministracionBundle::link-orden.html.twig")->display(array_merge($context, array("url" => "administracion_usuario", "column_name" => "correo", "caption" => "Correo")));
            // line 51
            echo "                </th>
                <th style=\"width: 25%;\">
                    Acciones
                </th>
            </tr>
            </thead>
            <tbody>
            ";
            // line 58
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")));
            $context['_iterated'] = false;
            foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
                // line 59
                echo "                <tr>
                    <td>
                        <a href=\"";
                // line 61
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("administracion_usuario_edit", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "nombre"), "html", null, true);
                echo "</a>
                    </td>
                    <td>";
                // line 63
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "username"), "html", null, true);
                echo "</td>

                    ";
                // line 73
                echo "
                    <td>";
                // line 74
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["roles"]) ? $context["roles"] : $this->getContext($context, "roles")), $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "rol"), array(), "array"), "html", null, true);
                echo "</td>
                    ";
                // line 76
                echo "                    <td>";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "correo"), "html", null, true);
                echo "</td>
                    <td>
                        <a href=\"";
                // line 78
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("administracion_usuario_edit", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
                echo "\"><span class=\"glyphicon glyphicon-pencil\"></span>Editar</a>
                        <a class=\"link-eliminar\" href=\"javascript:void(0);\"
                           data-url = \"";
                // line 80
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("administracion_usuario_delete", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
                echo "\"
                           data-descripcion=\"";
                // line 81
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "nombre"), "html", null, true);
                echo "\"
                           data-toggle=\"modal\" data-target=\"#modal-delete\">
                            <span class=\"glyphicon glyphicon-trash\"></span>Eliminar
                        </a>
                    </td>

                </tr>
            ";
                $context['_iterated'] = true;
            }
            if (!$context['_iterated']) {
                // line 89
                echo "                <tr>
                    <td colspan=\"2\" style=\"text-align:center;\">No se encontraron registros...</td>
                </tr>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 93
            echo "            </tbody>
            ";
            // line 95
            echo "            <tfoot>
            <tr>
                <td colspan=\"6\" style=\"vertical-align:middle;\">
                    ";
            // line 98
            $this->env->loadTemplate("sisconeeAdministracionBundle::form-paginacion.html.twig")->display(array_merge($context, array("url" => "administracion_usuario")));
            // line 99
            echo "                </td>
            </tr>
            </tfoot>
        </table>
    ";
        } else {
            // line 104
            echo "        <p>No se encontraron registros...</p>
    ";
        }
        // line 106
        echo "
";
        // line 112
        echo "
";
    }

    // line 115
    public function block_javascripts($context, array $blocks = array())
    {
        // line 116
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
    <script src=\"";
        // line 117
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("layoutadmin/admin-list.js"), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "sisconeeAdministracionBundle:Usuario:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  220 => 117,  215 => 116,  212 => 115,  207 => 112,  204 => 106,  200 => 104,  193 => 99,  191 => 98,  186 => 95,  183 => 93,  174 => 89,  161 => 81,  157 => 80,  152 => 78,  146 => 76,  142 => 74,  139 => 73,  134 => 63,  127 => 61,  123 => 59,  118 => 58,  109 => 51,  107 => 50,  104 => 49,  101 => 47,  99 => 46,  95 => 44,  93 => 43,  89 => 41,  87 => 40,  81 => 36,  79 => 35,  71 => 30,  62 => 24,  57 => 22,  53 => 20,  50 => 19,  48 => 18,  32 => 4,  29 => 3,);
    }
}
