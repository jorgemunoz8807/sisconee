<?php

/* sisconeeAdministracionBundle:Entidad:index.html.twig */
class __TwigTemplate_f11873eb03452181bead9343f8dbd9c98c8d76750f8ea57e664b6b4e26697daa extends Twig_Template
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

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
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
    <h1>Gestionar Entidades</h1>

    ";
        // line 20
        $this->env->loadTemplate("::flashmessages.html.twig")->display($context);
        // line 21
        echo "    ";
        $this->env->loadTemplate("::modal-delete.html.twig")->display($context);
        // line 22
        echo "

    <div class=\"admin-list-actions autosize\">

        ";
        // line 27
        echo "        <form id=\"admin-search-form\" action=\"";
        echo $this->env->getExtension('routing')->getPath("administracion_entidad");
        echo "\" method=\"post\">
            <div id=\"admin-search-layout\" class=\"input-group\" style=\"float: right;\">
                <input id=\"admin-search-text\" name=\"filter\" type=\"text\" class=\"form-control\" placeholder=\"Buscar...\" value=\"";
        // line 29
        echo twig_escape_filter($this->env, (isset($context["filter"]) ? $context["filter"] : $this->getContext($context, "filter")), "html", null, true);
        echo "\">
                <span id=\"admin-search-button\" title=\"Buscar...\" class=\"input-group-addon glyphicon glyphicon-search\"></span>
            </div>
        </form>

        ";
        // line 35
        echo "        <div class=\"vinculo-add\">
            <a class=\"btn btn-default\" href=\"";
        // line 36
        echo $this->env->getExtension('routing')->getPath("administracion_entidad_new");
        echo "\">
                <span class=\"glyphicon glyphicon-plus-sign\"></span>Adicionar
            </a>
        </div>
    </div>

    ";
        // line 42
        if ((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities"))) {
            // line 43
            echo "        <table class=\"table table-striped table-bordered table-hover\">
            ";
            // line 45
            echo "            <thead>
            <tr>
                <th style=\"width: 18%;\">
                    ";
            // line 48
            $this->env->loadTemplate("sisconeeAdministracionBundle::link-orden.html.twig")->display(array_merge($context, array("url" => "administracion_entidad", "column_name" => "codReeup", "caption" => "CODREEUP")));
            // line 49
            echo "                </th>

                <th style=\"width: 15%;\">
                    ";
            // line 52
            $this->env->loadTemplate("sisconeeAdministracionBundle::link-orden.html.twig")->display(array_merge($context, array("url" => "administracion_entidad", "column_name" => "siglas", "caption" => "Siglas")));
            // line 53
            echo "                </th>

                <th style=\"width: 20%;\">
                    ";
            // line 56
            $this->env->loadTemplate("sisconeeAdministracionBundle::link-orden.html.twig")->display(array_merge($context, array("url" => "administracion_entidad", "column_name" => "nombre", "caption" => "Nombre")));
            // line 57
            echo "                </th>

               ";
            // line 62
            echo "
                <th style=\"width: 25%;\">
                    ";
            // line 64
            $this->env->loadTemplate("sisconeeAdministracionBundle::link-orden.html.twig")->display(array_merge($context, array("url" => "administracion_entidad", "column_name" => "entidadPadre", "caption" => "Entidad Padre")));
            // line 65
            echo "                </th>
                <th style=\"width: 25%;\">
                    Acciones
                </th>
            </tr>
            </thead>

            ";
            // line 73
            echo "            <tbody>
            ";
            // line 74
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")));
            foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
                // line 75
                echo "                <tr>
                    <td>
                        ";
                // line 77
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getCodReeup"), "html", null, true);
                echo "
                    </td>
                    <td>
                        ";
                // line 80
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getSiglas"), "html", null, true);
                echo "
                    </td>
                    <td>
                        ";
                // line 83
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getNombre"), "html", null, true);
                echo "
                    </td>
                   ";
                // line 88
                echo "                    <td>
                        ";
                // line 89
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getEntidadPadre"), "html", null, true);
                echo "
                    </td>
                    <td>
                        <a href=\"";
                // line 92
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("administracion_entidad_edit", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
                echo "\"><span class=\"glyphicon glyphicon-pencil\"></span>Editar</a>
                        <a class=\"link-eliminar\" href=\"javascript:void(0);\"
                           data-url = \"";
                // line 94
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("administracion_entidad_delete", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
                echo "\"
                           data-descripcion=\"";
                // line 95
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "siglas"), "html", null, true);
                echo "\"
                           data-toggle=\"modal\" data-target=\"#modal-delete\">
                            <span class=\"glyphicon glyphicon-trash\"></span>Eliminar
                        </a>
                    </td>
                </tr>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 102
            echo "            </tbody>

            ";
            // line 105
            echo "            <tfoot>
            <tr>
                <td colspan=\"6\" style=\"vertical-align:middle;\">
                    ";
            // line 108
            $this->env->loadTemplate("sisconeeAdministracionBundle::form-paginacion.html.twig")->display(array_merge($context, array("url" => "administracion_entidad")));
            // line 109
            echo "                </td>
            </tr>
            </tfoot>

        </table>
    ";
        } else {
            // line 115
            echo "        <p>No se encontraron registros...</p>
    ";
        }
        // line 117
        echo "



";
    }

    // line 123
    public function block_javascripts($context, array $blocks = array())
    {
        // line 124
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
    <script src=\"";
        // line 125
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("layoutadmin/admin-list.js"), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "sisconeeAdministracionBundle:Entidad:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  228 => 125,  223 => 124,  220 => 123,  212 => 117,  208 => 115,  200 => 109,  198 => 108,  193 => 105,  189 => 102,  176 => 95,  172 => 94,  167 => 92,  161 => 89,  158 => 88,  153 => 83,  147 => 80,  141 => 77,  137 => 75,  133 => 74,  130 => 73,  121 => 65,  119 => 64,  115 => 62,  111 => 57,  109 => 56,  104 => 53,  102 => 52,  97 => 49,  95 => 48,  90 => 45,  87 => 43,  85 => 42,  76 => 36,  73 => 35,  65 => 29,  59 => 27,  53 => 22,  50 => 21,  48 => 20,  32 => 6,  29 => 5,);
    }
}
