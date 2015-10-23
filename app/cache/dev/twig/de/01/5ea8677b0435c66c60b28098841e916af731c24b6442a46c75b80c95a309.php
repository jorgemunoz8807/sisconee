<?php

/* sisconeeAdministracionBundle:Servicio:new.html.twig */
class __TwigTemplate_de015ea8677b0435c66c60b28098841e916af731c24b6442a46c75b80c95a309 extends Twig_Template
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
        echo "    <h1>Adicionar Servicio </h1>

    ";
        // line 8
        $this->env->loadTemplate("::flashmessages.html.twig")->display($context);
        // line 9
        echo "
    ";
        // line 10
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_start');
        echo "
    ";
        // line 11
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget');
        echo "
    <div class=\"form-actions\">
        <input type=\"submit\" class=\"btn btn-primary\" value=\"Aceptar\" />
        <a class=\"btn btn-default\" href=\"";
        // line 14
        echo $this->env->getExtension('routing')->getPath("administracion_servicio");
        echo "\">Regresar al listado</a>
    </div>
    ";
        // line 16
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_end');
        echo "



";
    }

    // line 21
    public function block_javascripts($context, array $blocks = array())
    {
        // line 22
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
    ";
        // line 51
        echo "
    <script>
        var \$provincia = \$('#sisconee_appbundle_servicio_provincia');
        // When sport gets selected ...
        \$provincia.change(function() {
// ... retrieve the corresponding form.
            var \$form = \$(this).closest('form');
// Simulate form data, but only include the selected sport value.
            var data = {};
            data[\$provincia.attr('name')] = \$provincia.val();
// Submit data via AJAX to the form's action path.

            \$.ajax({
                url : \$form.attr('action'),
                type: \$form.attr('method'),
                data : data,
                success: function(html) {
// Replace current position field ...
                    \$('#sisconee_appbundle_servicio_municipio').replaceWith(
// ... with the returned one from the AJAX response.
                            \$(html).find('#sisconee_appbundle_servicio_municipio')
                    );
// Position field now displays the appropriate positions.
                }
            });
        });
    </script>

";
    }

    public function getTemplateName()
    {
        return "sisconeeAdministracionBundle:Servicio:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 51,  68 => 22,  65 => 21,  56 => 16,  51 => 14,  45 => 11,  41 => 10,  38 => 9,  36 => 8,  32 => 6,  29 => 5,);
    }
}
