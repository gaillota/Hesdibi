<?php

/* FOSUserBundle:Admin:remove.html.twig */
class __TwigTemplate_593180edfc2fe66db9855365769b766b50d19b8a791189e040e1b71b7346d22d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("AGUserBundle::layout.html.twig", "FOSUserBundle:Admin:remove.html.twig", 1);
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

    // line 3
    public function block_breadcrumbs($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        $this->displayParentBlock("breadcrumbs", $context, $blocks);
        echo "
    <li><a href=\"";
        // line 5
        echo $this->env->getExtension('routing')->getPath("ag_user_admin_index");
        echo "\">Gestion des utilisateurs</a></li>
    <li class=\"active\">Supprimer</li>
";
    }

    // line 9
    public function block_ag_user_content($context, array $blocks = array())
    {
        // line 10
        echo "    <div class=\"row\">
        <div class=\"col-xs-12\">
            <h1>Supprimer l'utilisateur <i>";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "username", array()), "html", null, true);
        echo "</i></h1>
            <hr/>
            <div class=\"row\">
                <div class=\"col-md-12 text-center\">
                    <p>
                        Êtes-vous sûr de vouloir supprimer cet utilisateur ?
                    </p>
                    <form action=\"\" method=\"POST\">
                        <a class=\"btn btn-default\" href=\"";
        // line 20
        echo $this->env->getExtension('routing')->getPath("ag_user_admin_index");
        echo "\">
                            <i class=\"fa fa-arrow-left\"></i> Retour
                        </a>
                        <button class=\"btn btn-danger\" type=\"submit\">
                            <i class=\"fa fa-trash\"></i> Oui, supprimer le sa mère
                        </button>
                        ";
        // line 26
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'rest');
        echo "
                    </form>
                </div>
            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Admin:remove.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  71 => 26,  62 => 20,  51 => 12,  47 => 10,  44 => 9,  37 => 5,  32 => 4,  29 => 3,  11 => 1,);
    }
}
/* {% extends 'AGUserBundle::layout.html.twig' %}*/
/* */
/* {% block breadcrumbs %}*/
/*     {{ parent() }}*/
/*     <li><a href="{{ path('ag_user_admin_index') }}">Gestion des utilisateurs</a></li>*/
/*     <li class="active">Supprimer</li>*/
/* {% endblock %}*/
/* */
/* {% block ag_user_content %}*/
/*     <div class="row">*/
/*         <div class="col-xs-12">*/
/*             <h1>Supprimer l'utilisateur <i>{{ user.username }}</i></h1>*/
/*             <hr/>*/
/*             <div class="row">*/
/*                 <div class="col-md-12 text-center">*/
/*                     <p>*/
/*                         Êtes-vous sûr de vouloir supprimer cet utilisateur ?*/
/*                     </p>*/
/*                     <form action="" method="POST">*/
/*                         <a class="btn btn-default" href="{{ path('ag_user_admin_index') }}">*/
/*                             <i class="fa fa-arrow-left"></i> Retour*/
/*                         </a>*/
/*                         <button class="btn btn-danger" type="submit">*/
/*                             <i class="fa fa-trash"></i> Oui, supprimer le sa mère*/
/*                         </button>*/
/*                         {{ form_rest(form) }}*/
/*                     </form>*/
/*                 </div>*/
/*             </div>*/
/*         </div>*/
/*     </div>*/
/* {% endblock %}*/
