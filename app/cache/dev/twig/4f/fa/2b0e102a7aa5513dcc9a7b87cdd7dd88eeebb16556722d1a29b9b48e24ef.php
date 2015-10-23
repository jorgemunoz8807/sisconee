<?php

/* sisconeeAppBundle:PlanAnualServicio:new.html.twig */
class __TwigTemplate_4ffa2b0e102a7aa5513dcc9a7b87cdd7dd88eeebb16556722d1a29b9b48e24ef extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
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

    // line 4
    public function block_body($context, array $blocks = array())
    {
        // line 5
        echo "<div class=\"myhidden\" id=\"addplan-form\" >
        ";
        // line 7
        echo "        ";
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form');
        echo "
    </div>
";
    }

    public function getTemplateName()
    {
        return "sisconeeAppBundle:PlanAnualServicio:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  28 => 4,  186 => 90,  182 => 89,  178 => 88,  173 => 87,  166 => 74,  163 => 73,  148 => 73,  142 => 69,  131 => 57,  124 => 54,  121 => 51,  118 => 50,  115 => 44,  110 => 42,  107 => 40,  101 => 38,  98 => 37,  95 => 36,  71 => 18,  61 => 13,  56 => 12,  52 => 10,  35 => 4,  32 => 3,  155 => 56,  150 => 75,  147 => 53,  143 => 48,  140 => 68,  134 => 49,  132 => 47,  126 => 43,  120 => 40,  117 => 39,  113 => 43,  104 => 39,  97 => 33,  90 => 31,  88 => 32,  48 => 9,  45 => 10,  43 => 8,  40 => 7,  38 => 7,  33 => 4,  30 => 3,  189 => 68,  184 => 67,  181 => 66,  175 => 49,  170 => 86,  168 => 18,  165 => 16,  162 => 15,  151 => 57,  133 => 63,  127 => 55,  122 => 49,  119 => 47,  102 => 46,  93 => 35,  86 => 31,  77 => 32,  75 => 31,  66 => 18,  62 => 26,  58 => 24,  51 => 12,  42 => 8,  34 => 7,  84 => 47,  79 => 23,  72 => 21,  68 => 17,  64 => 27,  60 => 17,  57 => 14,  54 => 13,  47 => 12,  44 => 11,  39 => 7,  36 => 7,  31 => 5,  29 => 4,  27 => 3,);
    }
}
