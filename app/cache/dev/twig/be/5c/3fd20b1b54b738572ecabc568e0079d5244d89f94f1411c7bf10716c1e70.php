<?php

/* sisconeeAdministracionBundle:Servicio:index.html.twig */
class __TwigTemplate_be5c3fd20b1b54b738572ecabc568e0079d5244d89f94f1411c7bf10716c1e70 extends Twig_Template
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
        echo "    <style>
        @media (min-width: 768px) {
            .table {
                width: 60%;
            }

            .admin-list-actions.autosize {
                width: 50%;
            }
        }
    </style>
    <h1>Gestionar servicios</h1>

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
        // line 23
        echo $this->env->getExtension('routing')->getPath("administracion_servicio");
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
        echo $this->env->getExtension('routing')->getPath("administracion_servicio_new");
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
                <th ";
            // line 40
            echo ">
                    <a href=\"";
            // line 41
            echo $this->env->getExtension('routing')->getPath("administracion_servicio", array("column" => "nombre"));
            echo "\">
                        Nombre
                        ";
            // line 43
            if (((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")) == "nombre")) {
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
                <th>Código CEE </th>
                <th>CRF</th>
                <th>Entidad</th>
                <th>Tipo de servicio</th>
                <th>Horario pico</th>
                <th style=\"width: 25%;\">
                    Acciones
                </th>
            </tr>
            </thead>
            <tbody>
            ";
            // line 64
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")));
            $context['_iterated'] = false;
            foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
                // line 65
                echo "                <tr>
                    <td>
                        <a href=\"";
                // line 67
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("administracion_servicio_edit", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "nombre"), "html", null, true);
                echo "</a>
                    </td>
                    <td>";
                // line 69
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "codClienteEE"), "html", null, true);
                echo "</td>
                    <td>";
                // line 70
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "codRutaFolio"), "html", null, true);
                echo "</td>
\t\t            <td>";
                // line 71
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "entidad"), "html", null, true);
                echo "</td>
                    <td>";
                // line 72
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "tipoServicio"), "html", null, true);
                echo "</td>
                    <td>";
                // line 73
                if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "horarioPico")) {
                    echo " ";
                    echo "Sí";
                    echo "  ";
                } else {
                    echo " ";
                    echo "No";
                    echo " ";
                }
                echo "</td>
                    
                    <td>
                        <a href=\"";
                // line 76
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("administracion_servicio_edit", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
                echo "\"><span class=\"glyphicon glyphicon-pencil\"></span>Editar</a>
                        <a class=\"link-eliminar\" href=\"javascript:void(0);\"
                           data-url = \"";
                // line 78
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("administracion_servicio_delete", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
                echo "\"
                           data-descripcion=\"";
                // line 79
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
                // line 86
                echo "                <tr>
                    <td colspan=\"2\" style=\"text-align:center;\">No se encontraron registros...</td>
                </tr>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 90
            echo "            </tbody>
            ";
            // line 92
            echo "            <tfoot>
            <tr>
                <td colspan=\"6\" style=\"vertical-align:middle;\">
                    ";
            // line 95
            $this->env->loadTemplate("sisconeeAdministracionBundle::form-paginacion.html.twig")->display(array_merge($context, array("url" => "administracion_servicio")));
            // line 96
            echo "                </td>
            </tr>
            </tfoot>
        </table>
    ";
        } else {
            // line 101
            echo "        <p>No se encontraron registros...</p>
    ";
        }
        // line 103
        echo "    ";
        // line 138
        echo "
    <div class=\"vinculo-add\">
        <a class=\"btn btn-default\" href=\"";
        // line 140
        echo $this->env->getExtension('routing')->getPath("administracion_servicio_new");
        echo "\">
            <span class=\"glyphicon glyphicon-plus-sign\"></span>Adicionar
        </a>
    </div>
";
    }

    // line 146
    public function block_javascripts($context, array $blocks = array())
    {
        // line 147
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
    <script src=\"";
        // line 148
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("layoutadmin/admin-list.js"), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "sisconeeAdministracionBundle:Servicio:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  246 => 148,  241 => 147,  238 => 146,  229 => 140,  225 => 138,  223 => 103,  219 => 101,  212 => 96,  210 => 95,  205 => 92,  202 => 90,  193 => 86,  181 => 79,  177 => 78,  172 => 76,  158 => 73,  154 => 72,  150 => 71,  146 => 70,  142 => 69,  135 => 67,  131 => 65,  126 => 64,  110 => 50,  107 => 49,  103 => 47,  99 => 45,  96 => 44,  94 => 43,  89 => 41,  86 => 40,  81 => 37,  79 => 36,  71 => 31,  62 => 25,  57 => 23,  52 => 20,  49 => 19,  47 => 18,  32 => 5,  29 => 4,);
    }
}
