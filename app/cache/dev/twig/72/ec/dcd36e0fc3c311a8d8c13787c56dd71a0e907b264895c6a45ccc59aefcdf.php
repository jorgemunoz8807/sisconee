<?php

/* sisconeeAppBundle:Trazas:index.html.twig */
class __TwigTemplate_72ecdcd36e0fc3c311a8d8c13787c56dd71a0e907b264895c6a45ccc59aefcdf extends Twig_Template
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
    ";
        // line 16
        if (twig_test_empty((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")))) {
            // line 17
            echo "        <h1>El Historial de Operaciones esta en blanco</h1>
    ";
        } else {
            // line 19
            echo "
        <h1>Listado de Trazas</h1>

        <table class=\"table table-striped table-bordered table-hover\">
            <thead>
            <tr>
                ";
            // line 26
            echo "                <th>Operación</th>
                <th>Tabla</th>
                <th>Registro</th>
                <th>Datos</th>
                <th>Fecha</th>
                <th>Usuario</th>
                ";
            // line 33
            echo "            </tr>
            </thead>
            <tbody>
            ";
            // line 36
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")));
            foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
                // line 37
                echo "                <tr>
                    ";
                // line 39
                echo "                    <td>";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "operacion"), "html", null, true);
                echo "</td>
                    <td>";
                // line 40
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "tabla"), "html", null, true);
                echo "</td>
                    <td>";
                // line 41
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "registro"), "html", null, true);
                echo "</td>


                    ";
                // line 44
                if (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "tabla") == "plan_anual_entidad")) {
                    // line 45
                    echo "                        ";
                    $context["data"] = twig_split_filter($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "datos"), ",");
                    // line 46
                    echo "                        <td>
                            <strong>";
                    // line 47
                    echo "Plan: ";
                    echo "</strong> ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), 0, array(), "array"), "html", null, true);
                    echo "
                            <br>
                            <strong>";
                    // line 49
                    echo "Entidad: ";
                    echo " </strong>";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), 1, array(), "array"), "html", null, true);
                    echo "
                            <br>
                            <strong>";
                    // line 51
                    echo "Año: ";
                    echo " </strong> ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), 2, array(), "array"), "html", null, true);
                    echo "

                        </td>
                    ";
                }
                // line 55
                echo "
                    ";
                // line 56
                if (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "tabla") == "plan_anual_servicio")) {
                    // line 57
                    echo "                        ";
                    $context["data"] = twig_split_filter($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "datos"), ",");
                    // line 58
                    echo "                        <td>
                            <strong>";
                    // line 59
                    echo "Plan: ";
                    echo "</strong> ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), 0, array(), "array"), "html", null, true);
                    echo "
                            <br>
                            <strong>";
                    // line 61
                    echo "Servicio: ";
                    echo " </strong>";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), 1, array(), "array"), "html", null, true);
                    echo "
                            <br>
                            <strong>";
                    // line 63
                    echo "Año: ";
                    echo " </strong> ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), 2, array(), "array"), "html", null, true);
                    echo "

                        </td>
                    ";
                }
                // line 67
                echo "

                    ";
                // line 69
                if (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "tabla") == "plan_mensual_servicio")) {
                    // line 70
                    echo "                        ";
                    $context["data"] = twig_split_filter($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "datos"), ",");
                    // line 71
                    echo "                        <td>
                            <strong>";
                    // line 72
                    echo "Plan: ";
                    echo "</strong> ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), 0, array(), "array"), "html", null, true);
                    echo "
                            <br>
                            <strong>";
                    // line 74
                    echo "Plan HP: ";
                    echo " </strong>";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), 1, array(), "array"), "html", null, true);
                    echo "
                            <br>
                            <strong>";
                    // line 76
                    echo "Servicio: ";
                    echo " </strong> ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), 2, array(), "array"), "html", null, true);
                    echo "
                            <br>
                            <strong>";
                    // line 78
                    echo "Mes: ";
                    echo " </strong> ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), 3, array(), "array"), "html", null, true);
                    echo "
                            <br>
                            <strong>";
                    // line 80
                    echo "Año: ";
                    echo " </strong> ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), 4, array(), "array"), "html", null, true);
                    echo "


                        </td>
                    ";
                }
                // line 85
                echo "
                    ";
                // line 86
                if (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "tabla") == "plan_diario_servicio")) {
                    // line 87
                    echo "                        ";
                    $context["data"] = twig_split_filter($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "datos"), ",");
                    // line 88
                    echo "                        <td>
                            <strong>";
                    // line 89
                    echo "Plan: ";
                    echo "</strong> ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), 0, array(), "array"), "html", null, true);
                    echo "
                            <br>
                            <strong>";
                    // line 91
                    echo "Plan HP: ";
                    echo " </strong>";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), 1, array(), "array"), "html", null, true);
                    echo "
                            <br>
                            <strong>";
                    // line 93
                    echo "Servicio: ";
                    echo " </strong> ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), 2, array(), "array"), "html", null, true);
                    echo "
                            <br>
                            <strong>";
                    // line 95
                    echo "Fecha: ";
                    echo " </strong> ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), 3, array(), "array"), "html", null, true);
                    echo "


                        </td>
                    ";
                }
                // line 100
                echo "
                    ";
                // line 101
                if (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "tabla") == "lectura_diaria_servicio")) {
                    // line 102
                    echo "                        ";
                    $context["data"] = twig_split_filter($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "datos"), ",");
                    // line 103
                    echo "                        <td>
                            <strong>";
                    // line 104
                    echo "Consumo: ";
                    echo "</strong> ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), 0, array(), "array"), "html", null, true);
                    echo "
                            <br>
                            <strong>";
                    // line 106
                    echo "Consumo HP: ";
                    echo " </strong>";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), 1, array(), "array"), "html", null, true);
                    echo "
                            <br>
                            <strong>";
                    // line 108
                    echo "Servicio: ";
                    echo " </strong> ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), 2, array(), "array"), "html", null, true);
                    echo "
                            <br>
                            <strong>";
                    // line 110
                    echo "Fecha: ";
                    echo " </strong> ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), 3, array(), "array"), "html", null, true);
                    echo "


                        </td>
                    ";
                }
                // line 115
                echo "
                    ";
                // line 116
                if (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "tabla") == "user")) {
                    // line 117
                    echo "                        ";
                    $context["data"] = twig_split_filter($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "datos"), ",");
                    // line 118
                    echo "                        <td>
                            <strong>";
                    // line 119
                    echo "Correo: ";
                    echo "</strong> ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), 0, array(), "array"), "html", null, true);
                    echo "
                            <br>
                            <strong>";
                    // line 121
                    echo "Nombre: ";
                    echo " </strong>";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), 1, array(), "array"), "html", null, true);
                    echo "
                            <br>
                            <strong>";
                    // line 123
                    echo "Rol: ";
                    echo " </strong> ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), 2, array(), "array"), "html", null, true);
                    echo "
                            <br>
                            <strong>";
                    // line 125
                    echo "Usuario: ";
                    echo " </strong> ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), 3, array(), "array"), "html", null, true);
                    echo "
                            <br>
                            <strong>";
                    // line 127
                    echo "Entidad: ";
                    echo " </strong> ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), 4, array(), "array"), "html", null, true);
                    echo "

                        </td>
                    ";
                }
                // line 131
                echo "
                    <td>";
                // line 132
                if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "fechaHora")) {
                    // line 133
                    echo "                            ";
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "fechaHora"), "Y-m-d H:i:s"), "html", null, true);
                    echo "
                        ";
                }
                // line 135
                echo "                    </td>
                    <td>
                        <a href=\"";
                // line 137
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("administracion_usuario_show", array("id" => $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "idUsuario"), "id"))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "idUsuario"), "id"), "html", null, true);
                echo "</a>
                    </td>


                    ";
                // line 151
                echo "                </tr>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 153
            echo "            </tbody>


        </table>

        <ul>
            ";
            // line 164
            echo "        </ul>
    ";
        }
    }

    public function getTemplateName()
    {
        return "sisconeeAppBundle:Trazas:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  380 => 164,  372 => 153,  365 => 151,  356 => 137,  352 => 135,  346 => 133,  344 => 132,  341 => 131,  332 => 127,  325 => 125,  318 => 123,  311 => 121,  304 => 119,  301 => 118,  298 => 117,  296 => 116,  293 => 115,  283 => 110,  276 => 108,  269 => 106,  262 => 104,  259 => 103,  256 => 102,  254 => 101,  251 => 100,  241 => 95,  234 => 93,  227 => 91,  220 => 89,  217 => 88,  214 => 87,  212 => 86,  209 => 85,  199 => 80,  192 => 78,  185 => 76,  178 => 74,  171 => 72,  168 => 71,  165 => 70,  163 => 69,  159 => 67,  150 => 63,  143 => 61,  136 => 59,  133 => 58,  130 => 57,  128 => 56,  125 => 55,  116 => 51,  109 => 49,  102 => 47,  99 => 46,  96 => 45,  94 => 44,  88 => 41,  84 => 40,  79 => 39,  76 => 37,  72 => 36,  67 => 33,  59 => 26,  51 => 19,  47 => 17,  45 => 16,  31 => 4,  28 => 3,);
    }
}
