<?php

/* AGVaultBundle:Folder:showAdmin.html.twig */
class __TwigTemplate_550a504623c0629de783476c64482d86ab82d95e61412e412f0d0031ab80de6e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("AGVaultBundle::layout.html.twig", "AGVaultBundle:Folder:showAdmin.html.twig", 1);
        $this->blocks = array(
            'breadcrumbs' => array($this, 'block_breadcrumbs'),
            'ag_vault_content' => array($this, 'block_ag_vault_content'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AGVaultBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 3
        $this->env->getExtension('form')->renderer->setTheme((isset($context["formFolder"]) ? $context["formFolder"] : null), array(0 => "bootstrap_3_layout.html.twig"));
        // line 4
        $this->env->getExtension('form')->renderer->setTheme((isset($context["formFile"]) ? $context["formFile"] : null), array(0 => "bootstrap_3_layout.html.twig"));
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 6
    public function block_breadcrumbs($context, array $blocks = array())
    {
        // line 7
        echo "\t";
        $this->displayParentBlock("breadcrumbs", $context, $blocks);
        echo "
\t";
        // line 8
        if ( !(null === (isset($context["folder"]) ? $context["folder"] : null))) {
            // line 9
            echo "\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["listParents"]) ? $context["listParents"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["parent"]) {
                // line 10
                echo "\t\t\t<li><a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ag_vault_folder_show", array("id" => $this->getAttribute($context["parent"], "id", array()), "slug" => $this->getAttribute($context["parent"], "slug", array()))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["parent"], "name", array()), "html", null, true);
                echo "</a></li>
\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['parent'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 12
            echo "\t\t<li class=\"active\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["folder"]) ? $context["folder"] : null), "name", array()), "html", null, true);
            echo "</li>
\t";
        }
    }

    // line 16
    public function block_ag_vault_content($context, array $blocks = array())
    {
        // line 17
        echo "\t";
        $this->loadTemplate("AGVaultBundle:Folder:modals.html.twig", "AGVaultBundle:Folder:showAdmin.html.twig", 17)->display($context);
        // line 18
        echo "
\t";
        // line 19
        $this->loadTemplate((($this->env->getExtension('mobile_detect.twig.extension')->isMobile()) ? ("AGVaultBundle:Folder:mobile.html.twig") : ("AGVaultBundle:Folder:desktop.html.twig")), "AGVaultBundle:Folder:showAdmin.html.twig", 19)->display($context);
        // line 20
        echo "
";
    }

    // line 23
    public function block_javascripts($context, array $blocks = array())
    {
        // line 24
        echo "\t";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
\t<script src=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/jquery.fancybox.pack.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/folder.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/modal.js"), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "AGVaultBundle:Folder:showAdmin.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  101 => 27,  97 => 26,  93 => 25,  88 => 24,  85 => 23,  80 => 20,  78 => 19,  75 => 18,  72 => 17,  69 => 16,  61 => 12,  50 => 10,  45 => 9,  43 => 8,  38 => 7,  35 => 6,  31 => 1,  29 => 4,  27 => 3,  11 => 1,);
    }
}
/* {% extends 'AGVaultBundle::layout.html.twig' %}*/
/* */
/* {% form_theme formFolder 'bootstrap_3_layout.html.twig' %}*/
/* {% form_theme formFile 'bootstrap_3_layout.html.twig' %}*/
/* */
/* {% block breadcrumbs %}*/
/* 	{{ parent() }}*/
/* 	{% if folder is not null %}*/
/* 		{% for parent in listParents %}*/
/* 			<li><a href="{{ path('ag_vault_folder_show', { id:parent.id, slug:parent.slug }) }}">{{ parent.name }}</a></li>*/
/* 		{% endfor %}*/
/* 		<li class="active">{{ folder.name }}</li>*/
/* 	{% endif %}*/
/* {% endblock %}*/
/* */
/* {% block ag_vault_content %}*/
/* 	{% include 'AGVaultBundle:Folder:modals.html.twig' %}*/
/* */
/* 	{% include is_mobile() ? 'AGVaultBundle:Folder:mobile.html.twig' : 'AGVaultBundle:Folder:desktop.html.twig' %}*/
/* */
/* {% endblock %}*/
/* */
/* {% block javascripts %}*/
/* 	{{ parent() }}*/
/* 	<script src="{{ asset('js/jquery.fancybox.pack.js') }}"></script>*/
/* 	<script src="{{ asset('js/folder.js') }}"></script>*/
/* 	<script src="{{ asset('js/modal.js') }}"></script>*/
/* {% endblock %}*/
