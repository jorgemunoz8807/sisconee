<?php

/* sisconeeAppBundle:Reports:listado_parte_consumo.html.twig */
class __TwigTemplate_316cf221e2125064c9fc596f516090ce405cadc3deaa92af67afe92bbf4f1db7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        if ((twig_length_filter($this->env, (isset($context["Listado"]) ? $context["Listado"] : $this->getContext($context, "Listado"))) > 0)) {
            // line 2
            echo "
        <h1>Organismo:";
            // line 3
            echo twig_escape_filter($this->env, (isset($context["organismo"]) ? $context["organismo"] : $this->getContext($context, "organismo")), "html", null, true);
            echo "</h1>
        <br>
        <p>Entidades/Servicios que han reportado consumo para la fecha: <p>

        <table class=\"table table-bordered table-hover table-striped\">

            <tr>
                <th>Entidad</th>
                <th>Servicio</th>
                <th>Consumo reportado</th>
                <th>Consumo HP reportado</th>

            </tr>

            ";
            // line 17
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["Listado"]) ? $context["Listado"] : $this->getContext($context, "Listado")));
            foreach ($context['_seq'] as $context["_key"] => $context["e"]) {
                // line 18
                echo "
                <tr>
                    <td>";
                // line 20
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "NombreEntidad", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 21
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "NombreServicio", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 22
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "ConsumoReportado", array(), "array"), "html", null, true);
                echo "</td>
                    <td>";
                // line 23
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "ConsumoHPReportado", array(), "array"), "html", null, true);
                echo "</td>

                </tr>


            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['e'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 29
            echo "

        </table>
";
        } else {
            // line 33
            echo "
    <h1>No hay datos a mostrar</h1>


";
        }
    }

    public function getTemplateName()
    {
        return "sisconeeAppBundle:Reports:listado_parte_consumo.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  79 => 33,  73 => 29,  61 => 23,  57 => 22,  53 => 21,  49 => 20,  45 => 18,  41 => 17,  24 => 3,  21 => 2,  19 => 1,);
    }
}
