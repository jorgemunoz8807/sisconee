<?php

/* sisconeeAdministracionBundle::link-orden.html.twig */
class __TwigTemplate_a6b44613c2de1b2b11e9bed3081a81f42d36ad1dabdb9948a2a66f6cae9428b8 extends Twig_Template
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
        if (((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")) != (isset($context["column_name"]) ? $context["column_name"] : $this->getContext($context, "column_name")))) {
            // line 2
            echo "    <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["url"]) ? $context["url"] : $this->getContext($context, "url")), array("column" => (isset($context["column_name"]) ? $context["column_name"] : $this->getContext($context, "column_name")), "order" => "ASC")), "html", null, true);
            echo "\">
        ";
            // line 3
            echo " ";
            echo (isset($context["caption"]) ? $context["caption"] : $this->getContext($context, "caption"));
            echo " ";
            // line 4
            echo "        ";
            if (((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")) == (isset($context["column_name"]) ? $context["column_name"] : $this->getContext($context, "column_name")))) {
                // line 5
                echo "            ";
                if (((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")) == "ASC")) {
                    // line 6
                    echo "                <span class=\"admin-order-arrow glyphicon glyphicon-arrow-down\"></span>
            ";
                } else {
                    // line 8
                    echo "                <span class=\"admin-order-arrow glyphicon glyphicon-arrow-up\"></span>
            ";
                }
                // line 10
                echo "        ";
            }
            // line 11
            echo "    </a>


";
        } else {
            // line 15
            echo "    ";
            if (((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")) != "ASC")) {
                // line 16
                echo "        ";
                // line 17
                echo "        <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["url"]) ? $context["url"] : $this->getContext($context, "url")), array("column" => (isset($context["column_name"]) ? $context["column_name"] : $this->getContext($context, "column_name")), "order" => "ASC")), "html", null, true);
                echo "\">
            ";
                // line 18
                echo " ";
                echo (isset($context["caption"]) ? $context["caption"] : $this->getContext($context, "caption"));
                echo " ";
                // line 19
                echo "            ";
                if (((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")) == (isset($context["column_name"]) ? $context["column_name"] : $this->getContext($context, "column_name")))) {
                    // line 20
                    echo "                ";
                    if (((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")) == "ASC")) {
                        // line 21
                        echo "                    <span class=\"admin-order-arrow glyphicon glyphicon-arrow-down\"></span>
                ";
                    } else {
                        // line 23
                        echo "                    <span class=\"admin-order-arrow glyphicon glyphicon-arrow-up\"></span>
                ";
                    }
                    // line 25
                    echo "            ";
                }
                // line 26
                echo "        </a>
        ";
                // line 28
                echo "    ";
            } else {
                // line 29
                echo "        ";
                // line 30
                echo "        <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["url"]) ? $context["url"] : $this->getContext($context, "url")), array("column" => (isset($context["column_name"]) ? $context["column_name"] : $this->getContext($context, "column_name")), "order" => "DESC")), "html", null, true);
                echo "\">
            ";
                // line 31
                echo " ";
                echo (isset($context["caption"]) ? $context["caption"] : $this->getContext($context, "caption"));
                echo " ";
                // line 32
                echo "            ";
                if (((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")) == (isset($context["column_name"]) ? $context["column_name"] : $this->getContext($context, "column_name")))) {
                    // line 33
                    echo "            ";
                    if (((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")) == "ASC")) {
                        // line 34
                        echo "                <span class=\"admin-order-arrow glyphicon glyphicon-arrow-down\"></span>
            ";
                    } else {
                        // line 36
                        echo "                <span class=\"admin-order-arrow glyphicon glyphicon-arrow-up\"></span>
            ";
                    }
                    // line 38
                    echo "        ";
                }
                // line 39
                echo "        </a>
        ";
                // line 41
                echo "    ";
            }
        }
    }

    public function getTemplateName()
    {
        return "sisconeeAdministracionBundle::link-orden.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  121 => 41,  115 => 38,  111 => 36,  97 => 31,  92 => 30,  90 => 29,  84 => 26,  77 => 23,  73 => 21,  70 => 20,  67 => 19,  63 => 18,  58 => 17,  56 => 16,  47 => 11,  44 => 10,  40 => 8,  36 => 6,  33 => 5,  30 => 4,  26 => 3,  21 => 2,  19 => 1,  220 => 117,  215 => 116,  212 => 115,  207 => 112,  204 => 106,  200 => 104,  193 => 99,  191 => 98,  186 => 95,  183 => 93,  174 => 89,  161 => 81,  157 => 80,  152 => 78,  146 => 76,  142 => 74,  139 => 73,  134 => 63,  127 => 61,  123 => 59,  118 => 39,  109 => 51,  107 => 34,  104 => 33,  101 => 32,  99 => 46,  95 => 44,  93 => 43,  89 => 41,  87 => 28,  81 => 25,  79 => 35,  71 => 30,  62 => 24,  57 => 22,  53 => 15,  50 => 19,  48 => 18,  32 => 4,  29 => 3,);
    }
}
