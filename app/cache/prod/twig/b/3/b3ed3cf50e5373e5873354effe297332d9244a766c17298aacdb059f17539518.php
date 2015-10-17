<?php

/* FOSUserBundle:Security:login.html.twig */
class __TwigTemplate_ce6e1e65fd2243b8beb3bbaafe19dced4d283c76d09fdd2ef7e41ee97cadd3ef extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::base.html.twig", "FOSUserBundle:Security:login.html.twig", 1);
        $this->blocks = array(
            'navbar' => array($this, 'block_navbar'),
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

    // line 3
    public function block_navbar($context, array $blocks = array())
    {
        // line 4
        echo "\t<nav class=\"navbar navbar-default\">
\t\t<div class=\"container\">
\t\t\t<!-- Brand and toggle get grouped for better mobile display -->
\t\t\t<div class=\"navbar-header\">
\t\t\t\t<button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#bs-example-navbar-collapse-1\" aria-expanded=\"false\">
\t\t\t\t\t<span class=\"sr-only\">Toggle navigation</span>
\t\t\t\t\t<span class=\"icon-bar\"></span>
\t\t\t\t\t<span class=\"icon-bar\"></span>
\t\t\t\t\t<span class=\"icon-bar\"></span>
\t\t\t\t</button>
\t\t\t\t<a class=\"navbar-brand\" href=\"";
        // line 14
        echo $this->env->getExtension('routing')->getPath("ag_vault_homepage");
        echo "\">";
        echo $this->env->getExtension('font_awesome_extension')->fontAwesomeGenerator("unlock-alt");
        echo " Vault</a>
\t\t\t</div>
\t\t</div><!-- /.container -->
\t</nav>
";
    }

    // line 20
    public function block_body($context, array $blocks = array())
    {
        // line 21
        echo "\t<div class=\"row\">
\t\t<div class=\"col-md-12\">
\t\t\t<h1>Bienvenue sur le Vault</h1>
\t\t</div>
\t</div>
\t<div class=\"row text-justify\">
\t\t<div class=\"col-md-6\">
\t\t\t<h2>Se connecter</h2>
\t\t\t<hr/>
\t\t\t";
        // line 30
        if ((isset($context["error"]) ? $context["error"] : null)) {
            // line 31
            echo "\t\t\t\t<div class=\"alert alert-danger\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["error"]) ? $context["error"] : null), array(), "FOSUserBundle"), "html", null, true);
            echo "</div>
\t\t\t";
        }
        // line 33
        echo "\t\t\t<form action=\"";
        echo $this->env->getExtension('routing')->getPath("fos_user_security_check");
        echo "\" method=\"post\">
\t\t\t\t<input type=\"hidden\" name=\"_csrf_token\" value=\"";
        // line 34
        echo twig_escape_filter($this->env, (isset($context["csrf_token"]) ? $context["csrf_token"] : null), "html", null, true);
        echo "\" />
\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t<label for=\"username\">";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.username", array(), "FOSUserBundle"), "html", null, true);
        echo "</label>
\t\t\t\t\t<input class=\"form-control\" type=\"text\" id=\"username\" name=\"_username\" value=\"";
        // line 37
        echo twig_escape_filter($this->env, (isset($context["last_username"]) ? $context["last_username"] : null), "html", null, true);
        echo "\" required=\"required\" autofocus=\"on\" />
\t\t\t\t</div>
\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t<label for=\"password\">";
        // line 40
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.password", array(), "FOSUserBundle"), "html", null, true);
        echo "</label>
\t\t\t\t\t<input class=\"form-control\" type=\"password\" id=\"password\" name=\"_password\" required=\"required\" />
\t\t\t\t</div>
\t\t\t\t<div class=\"checkbox\">
\t\t\t\t\t<label for=\"remember_me\">
\t\t\t\t\t\t<input type=\"checkbox\" id=\"remember_me\" name=\"_remember_me\" value=\"on\" />
\t\t\t\t\t\t";
        // line 46
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.remember_me", array(), "FOSUserBundle"), "html", null, true);
        echo "
\t\t\t\t\t</label>
\t\t\t\t</div>
\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t<input class=\"btn btn-primary pull-right\" type=\"submit\" id=\"_submit\" name=\"_submit\" value=\"";
        // line 50
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.submit", array(), "FOSUserBundle"), "html", null, true);
        echo "\" />
\t\t\t\t</div>
\t\t\t</form>
\t\t\t<div class=\"clearfix\"></div>
\t\t</div>
\t\t<div class=\"col-md-6\">
\t\t\t<h2>Stocker et organiser vos documents personnels</h2>
\t\t\t<p>Ici vous pouvez en toute sécurité stocker tous vos documents personnels (CNI, Passport, RIB, etc.)</p>
\t\t\t<p>Ainsi vous pourrez y avoir accèder peu importe où vous vous trouvez, à condition bien sûr d'avoir accès à internet.</p>
\t\t\t<p>Vous pourrez notamment télécharger vos documents sur votre téléphone, votre tablette, ou votre ordinateur portable, mais également envoyer des documents par mail à un quiconque vous souhaitez.</p>
\t\t</div>
\t</div>
";
    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Security:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  113 => 50,  106 => 46,  97 => 40,  91 => 37,  87 => 36,  82 => 34,  77 => 33,  71 => 31,  69 => 30,  58 => 21,  55 => 20,  44 => 14,  32 => 4,  29 => 3,  11 => 1,);
    }
}
/* {% extends '::base.html.twig' %}*/
/* */
/* {% block navbar %}*/
/* 	<nav class="navbar navbar-default">*/
/* 		<div class="container">*/
/* 			<!-- Brand and toggle get grouped for better mobile display -->*/
/* 			<div class="navbar-header">*/
/* 				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">*/
/* 					<span class="sr-only">Toggle navigation</span>*/
/* 					<span class="icon-bar"></span>*/
/* 					<span class="icon-bar"></span>*/
/* 					<span class="icon-bar"></span>*/
/* 				</button>*/
/* 				<a class="navbar-brand" href="{{ path('ag_vault_homepage') }}">{{ fa('unlock-alt') }} Vault</a>*/
/* 			</div>*/
/* 		</div><!-- /.container -->*/
/* 	</nav>*/
/* {% endblock %}*/
/* */
/* {% block body %}*/
/* 	<div class="row">*/
/* 		<div class="col-md-12">*/
/* 			<h1>Bienvenue sur le Vault</h1>*/
/* 		</div>*/
/* 	</div>*/
/* 	<div class="row text-justify">*/
/* 		<div class="col-md-6">*/
/* 			<h2>Se connecter</h2>*/
/* 			<hr/>*/
/* 			{% if error %}*/
/* 				<div class="alert alert-danger">{{ error|trans({}, 'FOSUserBundle') }}</div>*/
/* 			{% endif %}*/
/* 			<form action="{{ path("fos_user_security_check") }}" method="post">*/
/* 				<input type="hidden" name="_csrf_token" value="{{ csrf_token }}" />*/
/* 				<div class="form-group">*/
/* 					<label for="username">{{ 'security.login.username'|trans({}, 'FOSUserBundle') }}</label>*/
/* 					<input class="form-control" type="text" id="username" name="_username" value="{{ last_username }}" required="required" autofocus="on" />*/
/* 				</div>*/
/* 				<div class="form-group">*/
/* 					<label for="password">{{ 'security.login.password'|trans({}, 'FOSUserBundle') }}</label>*/
/* 					<input class="form-control" type="password" id="password" name="_password" required="required" />*/
/* 				</div>*/
/* 				<div class="checkbox">*/
/* 					<label for="remember_me">*/
/* 						<input type="checkbox" id="remember_me" name="_remember_me" value="on" />*/
/* 						{{ 'security.login.remember_me'|trans({}, 'FOSUserBundle') }}*/
/* 					</label>*/
/* 				</div>*/
/* 				<div class="form-group">*/
/* 					<input class="btn btn-primary pull-right" type="submit" id="_submit" name="_submit" value="{{ 'security.login.submit'|trans({}, 'FOSUserBundle') }}" />*/
/* 				</div>*/
/* 			</form>*/
/* 			<div class="clearfix"></div>*/
/* 		</div>*/
/* 		<div class="col-md-6">*/
/* 			<h2>Stocker et organiser vos documents personnels</h2>*/
/* 			<p>Ici vous pouvez en toute sécurité stocker tous vos documents personnels (CNI, Passport, RIB, etc.)</p>*/
/* 			<p>Ainsi vous pourrez y avoir accèder peu importe où vous vous trouvez, à condition bien sûr d'avoir accès à internet.</p>*/
/* 			<p>Vous pourrez notamment télécharger vos documents sur votre téléphone, votre tablette, ou votre ordinateur portable, mais également envoyer des documents par mail à un quiconque vous souhaitez.</p>*/
/* 		</div>*/
/* 	</div>*/
/* {% endblock %}*/
