<?php

/* sisconeeAppBundle:Default:login.html.twig */
class __TwigTemplate_004188a2653f34c34d2e4f6546b4c26758f91c4bda881de947758c717bdb12ef extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::layout_general.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
            'aside' => array($this, 'block_aside'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::layout_general.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo "Formulario de acceso";
    }

    // line 4
    public function block_content($context, array $blocks = array())
    {
        // line 5
        echo "
        ";
        // line 6
        if ((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error"))) {
            // line 7
            echo "                <div>";
            echo twig_escape_filter($this->env, (isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "html", null, true);
            echo "</div>
        ";
        }
        // line 9
        echo "        <div class=\"col-md-4 col-md-offset-4\">
            <div class=\"login-panel panel panel-default\">
                <div class=\"panel-heading\">
                    <h3 class=\"panel-title\">Por favor inicie sesión </h3>
                </div>
                <div class=\"panel-body\">
                    <form action=\"";
        // line 15
        echo $this->env->getExtension('routing')->getPath("usuario_login_check");
        echo "\" method=\"post\">
                    ";
        // line 17
        echo "                        <label for=\"username\">Usuario:</label>
                        <input class=\"form-control\" type=\"text\" id=\"username\" name=\"_username\"
                               value=\"";
        // line 19
        echo twig_escape_filter($this->env, (isset($context["last_username"]) ? $context["last_username"] : $this->getContext($context, "last_username")), "html", null, true);
        echo "\" />
                        <label for=\"password\">Contraseña:</label>
                        <input class=\"form-control\" type=\"password\" id=\"password\" name=\"_password\" />
                        ";
        // line 24
        echo "                        <p>
                        <input class=\"btn btn-lg btn-success btn-block\" type=\"submit\" name=\"login\" value=\"Acceder\" />
                        </p>
                    </form>
                    ";
        // line 45
        echo "                </div>
            </div>
        </div>
    ";
    }

    // line 49
    public function block_aside($context, array $blocks = array())
    {
    }

    // line 50
    public function block_javascripts($context, array $blocks = array())
    {
        // line 51
        echo "  ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
    <link href=\"";
        // line 52
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bootstrap/css/bootstrap.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
    ";
        // line 54
        echo "   <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("layout_general/css/sb-admin-2.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\"/>

";
    }

    public function getTemplateName()
    {
        return "sisconeeAppBundle:Default:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  103 => 54,  99 => 52,  94 => 51,  91 => 50,  86 => 49,  79 => 45,  73 => 24,  67 => 19,  63 => 17,  59 => 15,  51 => 9,  45 => 7,  43 => 6,  40 => 5,  37 => 4,  31 => 2,);
    }
}
