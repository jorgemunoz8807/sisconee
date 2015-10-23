<?php

/* sisconeeAppBundle::edit-delete-plans.html.twig */
class __TwigTemplate_ab73460b04bae7fd9b125f1531ff8a3976e39688e626a4e68a8a45d27d09de54 extends Twig_Template
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
        // line 2
        echo "    ";
        // line 4
        $context["deleteDir"] = ((isset($context["dir"]) ? $context["dir"] : $this->getContext($context, "dir")) . "_delete");
        // line 5
        $context["editDir"] = ((isset($context["dir"]) ? $context["dir"] : $this->getContext($context, "dir")) . "_edit");
        // line 6
        echo "
            <a id='edit-plans'  href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["editDir"]) ? $context["editDir"] : $this->getContext($context, "editDir")), array("id" => (isset($context["apId"]) ? $context["apId"] : $this->getContext($context, "apId")), "parentEntityId" => (isset($context["parentEntityId"]) ? $context["parentEntityId"] : $this->getContext($context, "parentEntityId")))), "html", null, true);
        echo "\"><span class=\"glyphicon glyphicon-pencil\"></span>Editar</a>
     ";
        // line 10
        echo "            <a class=\"link-eliminar\" href=\"javascript:void(0);\"
               data-url = \"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["deleteDir"]) ? $context["deleteDir"] : $this->getContext($context, "deleteDir")), array("id" => (isset($context["apId"]) ? $context["apId"] : $this->getContext($context, "apId")))), "html", null, true);
        echo "\"
               data-descripcion=\"";
        // line 12
        echo twig_escape_filter($this->env, (isset($context["apDescription"]) ? $context["apDescription"] : $this->getContext($context, "apDescription")), "html", null, true);
        echo "\"
               data-toggle=\"modal\" data-target=\"#modal-delete\">
               <span class=\"glyphicon glyphicon-trash\"></span>
               Eliminar
            </a>
     ";
    }

    public function getTemplateName()
    {
        return "sisconeeAppBundle::edit-delete-plans.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  39 => 12,  35 => 11,  32 => 10,  28 => 7,  25 => 6,  23 => 5,  21 => 4,  19 => 2,);
    }
}
