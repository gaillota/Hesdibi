<?php

/* AGVaultBundle:File:remove.html.twig */
class __TwigTemplate_4abf49071153b8b7b8faa3c56d7c51f34885530dea4dba3a730874d4acd484bd extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("AGVaultBundle::layout.html.twig", "AGVaultBundle:File:remove.html.twig", 1);
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
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 13
    public function block_ag_vault_content($context, array $blocks = array())
    {
        // line 14
        echo "\t<div class=\"row\">
\t\t<div class=\"col-md-12 text-center\">
\t\t\t<p>Êtes-vous sûr de vouloir supprimer le fichier <em>";
        // line 16
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "name", array()), "html", null, true);
        echo "</em> ";
        if ( !(null === $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "folder", array()))) {
            echo "du dossier ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["file"]) ? $context["file"] : null), "folder", array()), "name", array()), "html", null, true);
        } else {
            echo "de votre Vault";
        }
        echo " ?</p>
\t\t\t";
        // line 17
        if ( !(null === $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "folder", array()))) {
            // line 18
            echo "\t\t\t\t<a class=\"btn btn-default\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ag_vault_folder_show", array("id" => $this->getAttribute($this->getAttribute((isset($context["file"]) ? $context["file"] : null), "folder", array()), "id", array()))), "html", null, true);
            echo "\">
\t\t\t\t\t";
            // line 19
            echo $this->env->getExtension('font_awesome_extension')->fontAwesomeGenerator("arrow-left");
            echo " Retour à mon dossier.
\t\t\t\t</a>
\t\t\t";
        } else {
            // line 22
            echo "\t\t\t\t<a class=\"btn btn-default\" href=\"";
            echo $this->env->getExtension('routing')->getPath("ag_vault_homepage");
            echo "\">
\t\t\t\t\t";
            // line 23
            echo $this->env->getExtension('font_awesome_extension')->fontAwesomeGenerator("arrow-left");
            echo " Retour à mon Vault.
\t\t\t\t</a>
\t\t\t";
        }
        // line 26
        echo "
\t\t\t<hr/>
\t\t\t<form action=\"\" method=\"POST\">
\t\t\t\t<button class=\"btn btn-danger\" type=\"submit\">
\t\t\t\t\t";
        // line 30
        echo $this->env->getExtension('font_awesome_extension')->fontAwesomeGenerator("times");
        echo " Supprimer ce fichier
\t\t\t\t</button>
\t\t\t\t";
        // line 32
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'rest');
        echo "
\t\t\t</form>
\t\t</div>
\t</div>
";
    }

    public function getTemplateName()
    {
        return "AGVaultBundle:File:remove.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  81 => 32,  76 => 30,  70 => 26,  64 => 23,  59 => 22,  53 => 19,  48 => 18,  46 => 17,  35 => 16,  31 => 14,  28 => 13,  11 => 1,);
    }
}
/* {% extends 'AGVaultBundle::layout.html.twig' %}*/
/* */
/* {#{% block breadcrumbs %}#}*/
/* 	{#{{ parent() }}#}*/
/* 	{#{% if folder is not null %}#}*/
/* 		{#{% for parent in listParents %}#}*/
/* 			{#<li><a href="{{ path('ag_vault_folder_show', { id:parent.id }) }}">{{ parent.name }}</a></li>#}*/
/* 		{#{% endfor %}#}*/
/* 	{#{% endif %}#}*/
/* 	{#<li class="active">Supprimer</li>#}*/
/* {#{% endblock %}#}*/
/* */
/* {% block ag_vault_content %}*/
/* 	<div class="row">*/
/* 		<div class="col-md-12 text-center">*/
/* 			<p>Êtes-vous sûr de vouloir supprimer le fichier <em>{{ file.name }}</em> {% if file.folder is not null %}du dossier {{ file.folder.name }}{% else %}de votre Vault{% endif %} ?</p>*/
/* 			{% if file.folder is not null %}*/
/* 				<a class="btn btn-default" href="{{ path('ag_vault_folder_show', { id:file.folder.id }) }}">*/
/* 					{{ fa('arrow-left') }} Retour à mon dossier.*/
/* 				</a>*/
/* 			{% else %}*/
/* 				<a class="btn btn-default" href="{{ path('ag_vault_homepage') }}">*/
/* 					{{ fa('arrow-left') }} Retour à mon Vault.*/
/* 				</a>*/
/* 			{% endif %}*/
/* */
/* 			<hr/>*/
/* 			<form action="" method="POST">*/
/* 				<button class="btn btn-danger" type="submit">*/
/* 					{{ fa('times') }} Supprimer ce fichier*/
/* 				</button>*/
/* 				{{ form_rest(form) }}*/
/* 			</form>*/
/* 		</div>*/
/* 	</div>*/
/* {% endblock %}*/
