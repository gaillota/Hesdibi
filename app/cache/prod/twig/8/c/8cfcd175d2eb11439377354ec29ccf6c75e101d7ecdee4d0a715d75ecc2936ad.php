<?php

/* ::nav.html.twig */
class __TwigTemplate_cd9a33adc007fadb7655e58638690dbb44648c8076408416758d5265ad328ef9 extends Twig_Template
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
        echo "<nav class=\"navbar navbar-default\">
\t<div class=\"container\">
\t\t<div class=\"navbar-header\">
\t\t\t<button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#bs-example-navbar-collapse-1\" aria-expanded=\"false\">
\t\t\t\t<span class=\"sr-only\">Toggle navigation</span>
\t\t\t\t<span class=\"icon-bar\"></span>
\t\t\t\t<span class=\"icon-bar\"></span>
\t\t\t\t<span class=\"icon-bar\"></span>
\t\t\t</button>
\t\t\t<a class=\"navbar-brand\" href=\"";
        // line 10
        echo $this->env->getExtension('routing')->getPath("ag_vault_homepage");
        echo "\">";
        echo $this->env->getExtension('font_awesome_extension')->fontAwesomeGenerator("home");
        echo " Vault</a>
\t\t</div>
\t\t<div class=\"collapse navbar-collapse\" id=\"bs-example-navbar-collapse-1\">
\t\t\t<ul class=\"nav navbar-nav\">
\t\t\t\t";
        // line 14
        if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN")) {
            // line 15
            echo "\t\t\t\t\t<li>
\t\t\t\t\t\t<a href=\"";
            // line 16
            echo $this->env->getExtension('routing')->getPath("ag_vault_folder_index");
            echo "\">
\t\t\t\t\t\t\t";
            // line 17
            echo $this->env->getExtension('font_awesome_extension')->fontAwesomeGenerator("folder");
            echo " Mes dossiers
\t\t\t\t\t\t</a>
\t\t\t\t\t</li>
\t\t\t\t\t<li>
\t\t\t\t\t\t<a href=\"";
            // line 21
            echo $this->env->getExtension('routing')->getPath("ag_user_admin_index");
            echo "\">
\t\t\t\t\t\t\t";
            // line 22
            echo $this->env->getExtension('font_awesome_extension')->fontAwesomeGenerator("users");
            echo " Gestion des utilisateurs
\t\t\t\t\t\t</a>
\t\t\t\t\t</li>
\t\t\t\t\t<li>
\t\t\t\t\t\t<a href=\"";
            // line 26
            echo $this->env->getExtension('routing')->getPath("ag_vault_link_all");
            echo "\">
\t\t\t\t\t\t\t";
            // line 27
            echo $this->env->getExtension('font_awesome_extension')->fontAwesomeGenerator("share-alt");
            echo " Liens de partage
\t\t\t\t\t\t</a>
\t\t\t\t\t</li>
\t\t\t\t";
        }
        // line 31
        echo "\t\t\t</ul>
\t\t\t<ul class=\"nav navbar-nav navbar-right\">
\t\t\t\t<li class=\"dropdown\">
\t\t\t\t\t<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">";
        // line 34
        echo $this->env->getExtension('font_awesome_extension')->fontAwesomeGenerator("user");
        echo " <span class=\"hidden-sm hidden-xs\">Connecté en tant que </span><i>";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "html", null, true);
        echo "</i> <span class=\"caret\"></span></a>
\t\t\t\t\t<ul class=\"dropdown-menu\">
\t\t\t\t\t\t<li><a href=\"";
        // line 36
        echo $this->env->getExtension('routing')->getPath("fos_user_profile_show");
        echo "\">";
        echo $this->env->getExtension('font_awesome_extension')->fontAwesomeGenerator("user");
        echo " Mon compte</a></li>
\t\t\t\t\t\t<li><a href=\"";
        // line 37
        echo $this->env->getExtension('routing')->getPath("fos_user_change_password");
        echo "\">";
        echo $this->env->getExtension('font_awesome_extension')->fontAwesomeGenerator("lock");
        echo " Changer mon mot de passe</a></li>
\t\t\t\t\t\t<li class=\"divider\"></li>
\t\t\t\t\t\t<li><a href=\"";
        // line 39
        echo $this->env->getExtension('routing')->getPath("fos_user_security_logout");
        echo "\">";
        echo $this->env->getExtension('font_awesome_extension')->fontAwesomeGenerator("times");
        echo " Se deconnecter</a></li>
\t\t\t\t\t</ul>
\t\t\t\t</li>
\t\t\t</ul>
\t\t</div>
\t</div>
</nav>";
    }

    public function getTemplateName()
    {
        return "::nav.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  102 => 39,  95 => 37,  89 => 36,  82 => 34,  77 => 31,  70 => 27,  66 => 26,  59 => 22,  55 => 21,  48 => 17,  44 => 16,  41 => 15,  39 => 14,  30 => 10,  19 => 1,);
    }
}
/* <nav class="navbar navbar-default">*/
/* 	<div class="container">*/
/* 		<div class="navbar-header">*/
/* 			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">*/
/* 				<span class="sr-only">Toggle navigation</span>*/
/* 				<span class="icon-bar"></span>*/
/* 				<span class="icon-bar"></span>*/
/* 				<span class="icon-bar"></span>*/
/* 			</button>*/
/* 			<a class="navbar-brand" href="{{ path('ag_vault_homepage') }}">{{ fa('home') }} Vault</a>*/
/* 		</div>*/
/* 		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">*/
/* 			<ul class="nav navbar-nav">*/
/* 				{% if is_granted('ROLE_ADMIN') %}*/
/* 					<li>*/
/* 						<a href="{{ path('ag_vault_folder_index') }}">*/
/* 							{{ fa('folder') }} Mes dossiers*/
/* 						</a>*/
/* 					</li>*/
/* 					<li>*/
/* 						<a href="{{ path('ag_user_admin_index') }}">*/
/* 							{{ fa('users') }} Gestion des utilisateurs*/
/* 						</a>*/
/* 					</li>*/
/* 					<li>*/
/* 						<a href="{{ path('ag_vault_link_all') }}">*/
/* 							{{ fa('share-alt') }} Liens de partage*/
/* 						</a>*/
/* 					</li>*/
/* 				{% endif %}*/
/* 			</ul>*/
/* 			<ul class="nav navbar-nav navbar-right">*/
/* 				<li class="dropdown">*/
/* 					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ fa('user') }} <span class="hidden-sm hidden-xs">Connecté en tant que </span><i>{{ app.user }}</i> <span class="caret"></span></a>*/
/* 					<ul class="dropdown-menu">*/
/* 						<li><a href="{{ path('fos_user_profile_show') }}">{{ fa('user') }} Mon compte</a></li>*/
/* 						<li><a href="{{ path('fos_user_change_password') }}">{{ fa('lock') }} Changer mon mot de passe</a></li>*/
/* 						<li class="divider"></li>*/
/* 						<li><a href="{{ path('fos_user_security_logout') }}">{{ fa('times') }} Se deconnecter</a></li>*/
/* 					</ul>*/
/* 				</li>*/
/* 			</ul>*/
/* 		</div>*/
/* 	</div>*/
/* </nav>*/
