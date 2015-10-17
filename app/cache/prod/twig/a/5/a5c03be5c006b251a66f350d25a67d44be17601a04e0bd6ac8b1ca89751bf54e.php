<?php

/* FOSUserBundle:Profile:edit.html.twig */
class __TwigTemplate_5a815a302ab905671bf04dc3176dc559118d4827bf1400a0c9d9326b32b4ea09 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("AGUserBundle::layout.html.twig", "FOSUserBundle:Profile:edit.html.twig", 1);
        $this->blocks = array(
            'breadcrumbs' => array($this, 'block_breadcrumbs'),
            'ag_user_content' => array($this, 'block_ag_user_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AGUserBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_breadcrumbs($context, array $blocks = array())
    {
        // line 6
        echo "\t";
        $this->displayParentBlock("breadcrumbs", $context, $blocks);
        echo "
\t<li><a href=\"";
        // line 7
        echo $this->env->getExtension('routing')->getPath("fos_user_profile_show");
        echo "\">Mon compte</a></li>
\t<li class=\"active\">Modifier mes informations</li>
";
    }

    // line 11
    public function block_ag_user_content($context, array $blocks = array())
    {
        // line 12
        echo "    <div class=\"row\">
\t    <div class=\"col-md-12 text-center\">
\t\t    <h2>";
        // line 14
        echo $this->env->getExtension('font_awesome_extension')->fontAwesomeGenerator("edit");
        echo " Modifier mes informations</h2>
\t\t    <hr/>
\t    </div>
        <div class=\"col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1\">
            ";
        // line 19
        echo "            ";
        // line 20
        echo "\t        <form action=\"";
        echo $this->env->getExtension('routing')->getPath("fos_user_profile_edit");
        echo "\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'enctype');
        echo " method=\"POST\" class=\"fos_user_profile_edit\">
\t\t        <div class=\"form-group\">
\t\t\t        ";
        // line 22
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "username", array()), 'label', array("label" => "Nom d'utilisateur :"));
        echo " :
\t\t\t        ";
        // line 23
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "username", array()), 'errors');
        echo "
\t\t\t        ";
        // line 24
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "username", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "
\t\t        </div>
\t\t        <div class=\"form-group\">
\t\t\t        ";
        // line 27
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "email", array()), 'label', array("label" => "Adresse e-mail :"));
        echo " :
\t\t\t        ";
        // line 28
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "email", array()), 'errors');
        echo "
\t\t\t        ";
        // line 29
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "email", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "
\t\t        </div>
\t\t        <div class=\"form-group\">
\t\t\t        ";
        // line 32
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "current_password", array()), 'label', array("label" => "Mot de passe actuel"));
        echo " :
\t\t\t        ";
        // line 33
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "current_password", array()), 'errors');
        echo "
\t\t\t        ";
        // line 34
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "current_password", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "
\t\t        </div>
\t\t        ";
        // line 36
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'rest');
        echo "
\t\t        <div>
\t\t\t        <input class=\"btn btn-default\" type=\"submit\" value=\"";
        // line 38
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("profile.edit.submit", array(), "FOSUserBundle"), "html", null, true);
        echo "\" />
\t\t        </div>
\t        </form>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Profile:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  114 => 38,  109 => 36,  104 => 34,  100 => 33,  96 => 32,  90 => 29,  86 => 28,  82 => 27,  76 => 24,  72 => 23,  68 => 22,  60 => 20,  58 => 19,  51 => 14,  47 => 12,  44 => 11,  37 => 7,  32 => 6,  29 => 5,  11 => 1,);
    }
}
/* {% extends 'AGUserBundle::layout.html.twig' %}*/
/* */
/* {% trans_default_domain 'FOSUserBundle' %}*/
/* */
/* {% block breadcrumbs %}*/
/* 	{{ parent() }}*/
/* 	<li><a href="{{ path('fos_user_profile_show') }}">Mon compte</a></li>*/
/* 	<li class="active">Modifier mes informations</li>*/
/* {% endblock %}*/
/* */
/* {% block ag_user_content  %}*/
/*     <div class="row">*/
/* 	    <div class="col-md-12 text-center">*/
/* 		    <h2>{{ fa('edit') }} Modifier mes informations</h2>*/
/* 		    <hr/>*/
/* 	    </div>*/
/*         <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">*/
/*             {#{% form_theme form 'bootstrap_3_layout.html.twig' %}#}*/
/*             {#{{ form(form) }}#}*/
/* 	        <form action="{{ path('fos_user_profile_edit') }}" {{ form_enctype(form) }} method="POST" class="fos_user_profile_edit">*/
/* 		        <div class="form-group">*/
/* 			        {{ form_label(form.username, "Nom d'utilisateur :") }} :*/
/* 			        {{ form_errors(form.username) }}*/
/* 			        {{ form_widget(form.username, {'attr' : {'class': 'form-control'}}) }}*/
/* 		        </div>*/
/* 		        <div class="form-group">*/
/* 			        {{ form_label(form.email, "Adresse e-mail :") }} :*/
/* 			        {{ form_errors(form.email) }}*/
/* 			        {{ form_widget(form.email, {'attr' : {'class': 'form-control'}}) }}*/
/* 		        </div>*/
/* 		        <div class="form-group">*/
/* 			        {{ form_label(form.current_password, "Mot de passe actuel") }} :*/
/* 			        {{ form_errors(form.current_password) }}*/
/* 			        {{ form_widget(form.current_password, {'attr' : {'class': 'form-control'}}) }}*/
/* 		        </div>*/
/* 		        {{ form_rest(form) }}*/
/* 		        <div>*/
/* 			        <input class="btn btn-default" type="submit" value="{{ 'profile.edit.submit'|trans }}" />*/
/* 		        </div>*/
/* 	        </form>*/
/*         </div>*/
/*     </div>*/
/* {% endblock %}*/
/* */
