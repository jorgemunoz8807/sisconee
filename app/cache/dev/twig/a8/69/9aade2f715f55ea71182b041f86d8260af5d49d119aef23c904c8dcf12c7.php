<?php

/* sisconeeAdministracionBundle:TipoServicio:index.html.twig */
class __TwigTemplate_a8699aade2f715f55ea71182b041f86d8260af5d49d119aef23c904c8dcf12c7 extends Twig_Template
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

    // line 4
    public function block_content($context, array $blocks = array())
    {
        // line 5
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
    <h1>Gestionar Tipo de servicio</h1>

    ";
        // line 19
        $this->env->loadTemplate("::flashmessages.html.twig")->display($context);
        // line 20
        echo "    ";
        $this->env->loadTemplate("::modal-delete.html.twig")->display($context);
        // line 21
        echo "
    <div class=\"admin-list-actions autosize\">
        <form id=\"admin-search-form\" action=\"";
        // line 23
        echo $this->env->getExtension('routing')->getPath("administracion_tiposervicio");
        echo "\" method=\"post\">
            <div id=\"admin-search-layout\" class=\"input-group\" style=\"float: right;\">
                <input id=\"admin-search-text\" name=\"filter\" type=\"text\" class=\"form-control\" placeholder=\"Buscar...\" value=\"";
        // line 25
        echo twig_escape_filter($this->env, (isset($context["filter"]) ? $context["filter"] : $this->getContext($context, "filter")), "html", null, true);
        echo "\">
                <span id=\"admin-search-button\" title=\"Buscar...\" class=\"input-group-addon glyphicon glyphicon-search\"></span>
            </div>
        </form>

        <div class=\"vinculo-add\">
            <a class=\"btn btn-default\" href=\"";
        // line 31
        echo $this->env->getExtension('routing')->getPath("administracion_tiposervicio_new");
        echo "\">
                <span class=\"glyphicon glyphicon-plus-sign\"></span>Adicionar
            </a>
        </div>
    </div>
    ";
        // line 36
        if ((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities"))) {
            // line 37
            echo "        <table class=\"table table-striped table-bordered table-hover\">
            <thead>
            <tr>
                <th style=\"width: 75%;\">
                    <a href=\"";
            // line 41
            echo $this->env->getExtension('routing')->getPath("administracion_tiposervicio", array("column" => "descripcion"));
            echo "\">
                        Nombre
                        ";
            // line 43
            if (((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")) == "descripcion")) {
                // line 44
                echo "                            ";
                if (((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")) == "ASC")) {
                    // line 45
                    echo "                                <span class=\"admin-order-arrow glyphicon glyphicon-arrow-down\"></span>
                            ";
                } else {
                    // line 47
                    echo "                                <span class=\"admin-order-arrow glyphicon glyphicon-arrow-up\"></span>
                            ";
                }
                // line 49
                echo "                        ";
            }
            // line 50
            echo "                    </a>

                </th>
                <th style=\"width: 25%;\">
                    Acciones
                </th>
            </tr>
            </thead>
            <tbody>
            ";
            // line 59
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")));
            $context['_iterated'] = false;
            foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
                // line 60
                echo "                <tr>
                    <td>
                        <a href=\"";
                // line 62
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("administracion_tiposervicio_edit", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "descripcion"), "html", null, true);
                echo "</a>
                    </td>
                    <td>
                        <a href=\"";
                // line 65
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("administracion_tiposervicio_edit", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
                echo "\"><span class=\"glyphicon glyphicon-pencil\"></span>Editar</a>
                        <a class=\"link-eliminar\" href=\"javascript:void(0);\"
                           data-url = \"";
                // line 67
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("administracion_tiposervicio_delete", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
                echo "\"
                           data-descripcion=\"";
                // line 68
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "descripcion"), "html", null, true);
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
                // line 75
                echo "                <tr>
                    <td colspan=\"2\" style=\"text-align:center;\">No se encontraron registros...</td>
                </tr>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 79
            echo "            </tbody>
            ";
            // line 81
            echo "            <tfoot>
            <tr>
                <td colspan=\"6\" style=\"vertical-align:middle;\">
                    ";
            // line 84
            $this->env->loadTemplate("sisconeeAdministracionBundle::form-paginacion.html.twig")->display(array_merge($context, array("url" => "administracion_tiposervicio")));
            // line 85
            echo "                </td>
            </tr>
            </tfoot>
        </table>
    ";
        } else {
            // line 90
            echo "        <p>No se encontraron registros...</p>
    ";
        }
        // line 92
        echo "    ";
        // line 121
        echo "    <div class=\"vinculo-add\">
        <a class=\"btn btn-default\" href=\"";
        // line 122
        echo $this->env->getExtension('routing')->getPath("administracion_tiposervicio_new");
        echo "\">
            <span class=\"glyphicon glyphicon-plus-sign\"></span>Adicionar
        </a>
    </div>
    ";
    }

    // line 128
    public function block_javascripts($context, array $blocks = array())
    {
        // line 129
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
    <script src=\"";
        // line 130
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("layoutadmin/admin-list.js"), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "sisconeeAdministracionBundle:TipoServicio:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  209 => 130,  204 => 129,  201 => 128,  192 => 122,  189 => 121,  187 => 92,  183 => 90,  176 => 85,  174 => 84,  169 => 81,  166 => 79,  157 => 75,  145 => 68,  141 => 67,  136 => 65,  128 => 62,  124 => 60,  119 => 59,  108 => 50,  105 => 49,  101 => 47,  97 => 45,  94 => 44,  92 => 43,  87 => 41,  81 => 37,  79 => 36,  71 => 31,  62 => 25,  57 => 23,  53 => 21,  50 => 20,  48 => 19,  32 => 5,  29 => 4,);
    }
}
