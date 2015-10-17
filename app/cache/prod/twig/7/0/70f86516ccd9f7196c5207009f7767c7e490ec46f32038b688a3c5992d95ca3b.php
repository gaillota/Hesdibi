<?php

/* AGVaultBundle::layout.html.twig */
class __TwigTemplate_5e1cb337670bf7ff522d21e39ec0865edd0f4b256d228781c7f97b650f422075 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::base.html.twig", "AGVaultBundle::layout.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
            'breadcrumbs' => array($this, 'block_breadcrumbs'),
            'ag_vault_content' => array($this, 'block_ag_vault_content'),
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

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "\t<ol class=\"breadcrumb\">
\t\t";
        // line 5
        $this->displayBlock('breadcrumbs', $context, $blocks);
        // line 8
        echo "\t</ol>
\t";
        // line 9
        $this->displayBlock('ag_vault_content', $context, $blocks);
    }

    // line 5
    public function block_breadcrumbs($context, array $blocks = array())
    {
        // line 6
        echo "\t\t\t<li><a href=\"";
        echo $this->env->getExtension('routing')->getPath("ag_vault_homepage");
        echo "\">";
        echo $this->env->getExtension('font_awesome_extension')->fontAwesomeGenerator("home");
        echo "</a></li>
\t\t";
    }

    // line 9
    public function block_ag_vault_content($context, array $blocks = array())
    {
        // line 10
        echo "\t";
    }

    public function getTemplateName()
    {
        return "AGVaultBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  60 => 10,  57 => 9,  48 => 6,  45 => 5,  41 => 9,  38 => 8,  36 => 5,  33 => 4,  30 => 3,  11 => 1,);
    }
}
/* {% extends '::base.html.twig' %}*/
/* */
/* {% block body %}*/
/* 	<ol class="breadcrumb">*/
/* 		{% block breadcrumbs %}*/
/* 			<li><a href="{{ path('ag_vault_homepage') }}">{{ fa('home') }}</a></li>*/
/* 		{% endblock %}*/
/* 	</ol>*/
/* 	{% block ag_vault_content %}*/
/* 	{% endblock %}*/
/* {% endblock %}*/
