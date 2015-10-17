<?php

/* FOSUserBundle:Profile:show.html.twig */
class __TwigTemplate_13cf88a731408de4f6fd1b080b9262501b045bb4cd46b206180be354313af6df extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("AGUserBundle::layout.html.twig", "FOSUserBundle:Profile:show.html.twig", 1);
        $this->blocks = array(
            'flashbag' => array($this, 'block_flashbag'),
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
    public function block_flashbag($context, array $blocks = array())
    {
        // line 6
        echo "\t";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "flashBag", array()), "all", array()));
        foreach ($context['_seq'] as $context["type"] => $context["messages"]) {
            // line 7
            echo "\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["messages"]);
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 8
                echo "\t\t\t<div class=\"alert alert-success alert-dismissible fade in\" role=\"alert\">
\t\t\t\t<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
\t\t\t\t\t<span aria-hidden=\"true\">&times;</span>
\t\t\t\t</button>
\t\t\t\t";
                // line 12
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($context["message"], array(), "FOSUserBundle"), "html", null, true);
                echo "
\t\t\t</div>
\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 15
            echo "\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['type'], $context['messages'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    // line 18
    public function block_breadcrumbs($context, array $blocks = array())
    {
        // line 19
        echo "\t";
        $this->displayParentBlock("breadcrumbs", $context, $blocks);
        echo "
\t<li class=\"active\">Mon compte</li>
";
    }

    // line 23
    public function block_ag_user_content($context, array $blocks = array())
    {
        // line 24
        echo "    <div class=\"row\">
\t    <div class=\"col-md-12 text-center\">
\t\t    <h2>";
        // line 26
        echo $this->env->getExtension('font_awesome_extension')->fontAwesomeGenerator("user");
        echo " Mon Compte</h2>
\t\t    <hr/>
\t    </div>
        <div class=\"col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1\">
            ";
        // line 30
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "flashbag", array()), "all", array()));
        foreach ($context['_seq'] as $context["label"] => $context["flashes"]) {
            // line 31
            echo "                ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["flashes"]);
            foreach ($context['_seq'] as $context["_key"] => $context["flash"]) {
                // line 32
                echo "                    <div class=\"alert alert-";
                echo twig_escape_filter($this->env, $context["label"], "html", null, true);
                echo "\">
                        ";
                // line 33
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("change_password.flash.success", array(), "FOSUserBundle"), "html", null, true);
                echo "
                    </div>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flash'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 36
            echo "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['label'], $context['flashes'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 37
        echo "            <div class=\"panel panel-default\">
                <div class=\"panel-heading\">
                    Informations personnelles
                </div>
                <ul class=\"list-group\">
                    <li class=\"list-group-item\">
                        <i class=\"fa fa-user\"></i> ";
        // line 43
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("profile.show.username", array(), "FOSUserBundle"), "html", null, true);
        echo " : ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "username", array()), "html", null, true);
        echo "
                    </li>
                    <li class=\"list-group-item\">
                        <i class=\"fa fa-envelope\"></i> ";
        // line 46
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("profile.show.email", array(), "FOSUserBundle"), "html", null, true);
        echo " : ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "email", array()), "html", null, true);
        echo "
                    </li>
                </ul>
            </div>
            <div class=\"row\">
                <div class=\"col-xs-12\">
                    <a href=\"";
        // line 52
        echo $this->env->getExtension('routing')->getPath("fos_user_profile_edit");
        echo "\" class=\"btn btn-default\">
                        <i class=\"fa fa-edit\"></i> Modifier mon compte
                    </a>
                    <a href=\"";
        // line 55
        echo $this->env->getExtension('routing')->getPath("fos_user_change_password");
        echo "\" class=\"btn btn-default\">
                        <i class=\"fa fa-lock\"></i> Changer mot de passe
                    </a>
                </div>
            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Profile:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  153 => 55,  147 => 52,  136 => 46,  128 => 43,  120 => 37,  114 => 36,  105 => 33,  100 => 32,  95 => 31,  91 => 30,  84 => 26,  80 => 24,  77 => 23,  69 => 19,  66 => 18,  58 => 15,  49 => 12,  43 => 8,  38 => 7,  33 => 6,  30 => 5,  11 => 1,);
    }
}
/* {% extends 'AGUserBundle::layout.html.twig' %}*/
/* */
/* {% trans_default_domain 'FOSUserBundle' %}*/
/* */
/* {% block flashbag %}*/
/* 	{% for type, messages in app.session.flashBag.all %}*/
/* 		{% for message in messages %}*/
/* 			<div class="alert alert-success alert-dismissible fade in" role="alert">*/
/* 				<button type="button" class="close" data-dismiss="alert" aria-label="Close">*/
/* 					<span aria-hidden="true">&times;</span>*/
/* 				</button>*/
/* 				{{ message|trans({}, 'FOSUserBundle') }}*/
/* 			</div>*/
/* 		{% endfor %}*/
/* 	{% endfor %}*/
/* {% endblock %}*/
/* */
/* {% block breadcrumbs %}*/
/* 	{{ parent() }}*/
/* 	<li class="active">Mon compte</li>*/
/* {% endblock %}*/
/* */
/* {% block ag_user_content %}*/
/*     <div class="row">*/
/* 	    <div class="col-md-12 text-center">*/
/* 		    <h2>{{ fa('user') }} Mon Compte</h2>*/
/* 		    <hr/>*/
/* 	    </div>*/
/*         <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">*/
/*             {% for label, flashes in app.session.flashbag.all %}*/
/*                 {% for flash in flashes %}*/
/*                     <div class="alert alert-{{ label }}">*/
/*                         {{ 'change_password.flash.success'|trans }}*/
/*                     </div>*/
/*                 {% endfor %}*/
/*             {% endfor %}*/
/*             <div class="panel panel-default">*/
/*                 <div class="panel-heading">*/
/*                     Informations personnelles*/
/*                 </div>*/
/*                 <ul class="list-group">*/
/*                     <li class="list-group-item">*/
/*                         <i class="fa fa-user"></i> {{ 'profile.show.username'|trans }} : {{ user.username }}*/
/*                     </li>*/
/*                     <li class="list-group-item">*/
/*                         <i class="fa fa-envelope"></i> {{ 'profile.show.email'|trans }} : {{ user.email }}*/
/*                     </li>*/
/*                 </ul>*/
/*             </div>*/
/*             <div class="row">*/
/*                 <div class="col-xs-12">*/
/*                     <a href="{{ path('fos_user_profile_edit') }}" class="btn btn-default">*/
/*                         <i class="fa fa-edit"></i> Modifier mon compte*/
/*                     </a>*/
/*                     <a href="{{ path('fos_user_change_password') }}" class="btn btn-default">*/
/*                         <i class="fa fa-lock"></i> Changer mot de passe*/
/*                     </a>*/
/*                 </div>*/
/*             </div>*/
/*         </div>*/
/*     </div>*/
/* {% endblock %}*/
/* */
