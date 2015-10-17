<?php

/* AGVaultBundle:File:shareWith.html.twig */
class __TwigTemplate_93fd0e9f4f5820bb4616812d4e3a770ec88beaaf6140ab5feb6a931f08df8f93 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("AGVaultBundle::layout.html.twig", "AGVaultBundle:File:shareWith.html.twig", 1);
        $this->blocks = array(
            'ag_vault_content' => array($this, 'block_ag_vault_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AGVaultBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 3
        $this->env->getExtension('form')->renderer->setTheme((isset($context["form"]) ? $context["form"] : null), array(0 => "bootstrap_3_horizontal_layout.html.twig"));
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_ag_vault_content($context, array $blocks = array())
    {
        // line 6
        echo "\t<div class=\"row\">
\t\t<div class=\"col-md-10 col-md-offset-1\">
\t\t\t<h2>";
        // line 8
        echo $this->env->getExtension('font_awesome_extension')->fontAwesomeGenerator("share-alt");
        echo " Partage de <em>";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "name", array()), "html", null, true);
        echo "</em></h2>
\t\t\t<hr/>
\t\t\t";
        // line 10
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : null), 'form');
        echo "
\t\t</div>
\t</div>
";
    }

    public function getTemplateName()
    {
        return "AGVaultBundle:File:shareWith.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  45 => 10,  38 => 8,  34 => 6,  31 => 5,  27 => 1,  25 => 3,  11 => 1,);
    }
}
/* {% extends 'AGVaultBundle::layout.html.twig' %}*/
/* */
/* {% form_theme form 'bootstrap_3_horizontal_layout.html.twig' %}*/
/* */
/* {% block ag_vault_content %}*/
/* 	<div class="row">*/
/* 		<div class="col-md-10 col-md-offset-1">*/
/* 			<h2>{{ fa('share-alt') }} Partage de <em>{{ file.name }}</em></h2>*/
/* 			<hr/>*/
/* 			{{ form(form) }}*/
/* 		</div>*/
/* 	</div>*/
/* {% endblock %}*/
