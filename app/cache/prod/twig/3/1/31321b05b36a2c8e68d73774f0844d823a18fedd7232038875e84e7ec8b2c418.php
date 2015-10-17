<?php

/* AGUserBundle:Mail:add.html.twig */
class __TwigTemplate_b3c85012573d00d6d66f3d3d52b58ac93fa5fbf3c09cd5026de7f4bec1e85957 extends Twig_Template
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
        echo "Salut ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "username", array()), "html", null, true);
        echo ",<br><br>
Ton compte a bien été crée sur <a href=\"";
        // line 2
        echo twig_escape_filter($this->env, (isset($context["homepage"]) ? $context["homepage"] : null), "html", null, true);
        echo "\">My Vault</a>.<br><br>
Informations de connexion :<br>
- Nom d'utilisateur : ";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "username", array()), "html", null, true);
        echo "<br>
- Mot de passe : ";
        // line 5
        echo twig_escape_filter($this->env, (isset($context["password"]) ? $context["password"] : null), "html", null, true);
        echo "<br><br>
Nous te conseillons vivement de changer ton mot de passe en cliquant ici : <br><br>
<a style=\"padding: 10px 15px; text-decoration: none; color:white; font-weight: 500; background: #5CB85C;border-color: #4CAE4C;border-radius: 3px;\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, (isset($context["changePassword"]) ? $context["changePassword"] : null), "html", null, true);
        echo "\">Changer mon mot de passe</a>
<br><br>
A bientôt,<br>
L'administrateur.<br><br>
<i><small>Ce message est à destination de ";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "email", array()), "html", null, true);
        echo ". Si ce n'est pas vous, merci d'ignorer son contenu.</small></i>
";
    }

    public function getTemplateName()
    {
        return "AGUserBundle:Mail:add.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  45 => 11,  38 => 7,  33 => 5,  29 => 4,  24 => 2,  19 => 1,);
    }
}
/* Salut {{ user.username }},<br><br>*/
/* Ton compte a bien été crée sur <a href="{{ homepage }}">My Vault</a>.<br><br>*/
/* Informations de connexion :<br>*/
/* - Nom d'utilisateur : {{ user.username }}<br>*/
/* - Mot de passe : {{ password }}<br><br>*/
/* Nous te conseillons vivement de changer ton mot de passe en cliquant ici : <br><br>*/
/* <a style="padding: 10px 15px; text-decoration: none; color:white; font-weight: 500; background: #5CB85C;border-color: #4CAE4C;border-radius: 3px;" href="{{ changePassword }}">Changer mon mot de passe</a>*/
/* <br><br>*/
/* A bientôt,<br>*/
/* L'administrateur.<br><br>*/
/* <i><small>Ce message est à destination de {{ user.email }}. Si ce n'est pas vous, merci d'ignorer son contenu.</small></i>*/
/* */
