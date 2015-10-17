<?php

/* FOSUserBundle:Admin:add.html.twig */
class __TwigTemplate_04da2dc9fe654dd261309ac5cfb4e48a617b3a3468efa22196423dbd41c7faca extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("AGUserBundle::layout.html.twig", "FOSUserBundle:Admin:add.html.twig", 1);
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
    <li class=\"active\">Ajouter</li>
";
    }

    // line 9
    public function block_ag_user_content($context, array $blocks = array())
    {
        // line 10
        echo "    <div class=\"row\">
        <div class=\"col-md-10 col-md-offset-1\">
            <h1>";
        // line 12
        echo $this->env->getExtension('font_awesome_extension')->fontAwesomeGenerator("user-plus");
        echo " Ajouter un utilisateur</h1>
            <hr/>
        </div>
    </div>
    <div class=\"row\">
        <div class=\"col-md-10 col-md-offset-1\">
            ";
        // line 18
        $this->loadTemplate("AGUserBundle:Admin:form.html.twig", "FOSUserBundle:Admin:add.html.twig", 18)->display($context);
        // line 19
        echo "        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Admin:add.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  62 => 19,  60 => 18,  51 => 12,  47 => 10,  44 => 9,  37 => 5,  32 => 4,  29 => 3,  11 => 1,);
    }
}
/* {% extends 'AGUserBundle::layout.html.twig' %}*/
/* */
/* {% block breadcrumbs %}*/
/*     {{ parent() }}*/
/*     <li><a href="{{ path('ag_user_admin_index') }}">Gestion des utilisateurs</a></li>*/
/*     <li class="active">Ajouter</li>*/
/* {% endblock %}*/
/* */
/* {% block ag_user_content %}*/
/*     <div class="row">*/
/*         <div class="col-md-10 col-md-offset-1">*/
/*             <h1>{{ fa('user-plus') }} Ajouter un utilisateur</h1>*/
/*             <hr/>*/
/*         </div>*/
/*     </div>*/
/*     <div class="row">*/
/*         <div class="col-md-10 col-md-offset-1">*/
/*             {% include 'AGUserBundle:Admin:form.html.twig' %}*/
/*         </div>*/
/*     </div>*/
/* {% endblock %}*/
