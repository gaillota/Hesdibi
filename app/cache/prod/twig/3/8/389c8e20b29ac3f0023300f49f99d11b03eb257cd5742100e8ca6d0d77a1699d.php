<?php

/* FOSUserBundle:Admin:index.html.twig */
class __TwigTemplate_0f49774ef7ea13398b7879472d07a647ae1fced6a115157761cb4d2294aa7075 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("AGUserBundle::layout.html.twig", "FOSUserBundle:Admin:index.html.twig", 1);
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
    <li class=\"active\">Gestion des utilisateurs</li>
";
    }

    // line 8
    public function block_ag_user_content($context, array $blocks = array())
    {
        // line 9
        echo "    <div class=\"row\">
        <div class=\"col-md-12\">
            <h2 style=\"margin-bottom: 20px;\"><i class=\"fa fa-users\"></i> Liste des utilisateurs <a class=\"btn btn-success btn-xs pull-right\" href=\"";
        // line 11
        echo $this->env->getExtension('routing')->getPath("ag_user_admin_add");
        echo "\"><i class=\"fa fa-user-plus\"></i> Ajouter</a></h2>
            <div class=\"table-responsive\">
                <table class=\"table table-striped table-hover\">
                    <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>E-mail</th>
                        <th>Last Login</th>
                        <th>Droits</th>
                        <th class=\"text-center\">Activé</th>
                        <th class=\"text-center\">Verrouillé</th>
                        <th></th>
                    </tr>
                    ";
        // line 24
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["users"]) ? $context["users"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 25
            echo "\t                    ";
            if ( !$this->getAttribute($context["user"], "hasRole", array(0 => "ROLE_ADMIN"), "method")) {
                // line 26
                echo "\t                        <tr>
\t                            <td>";
                // line 27
                echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "id", array()), "html", null, true);
                echo "</td>
\t                            <td>";
                // line 28
                echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "username", array()), "html", null, true);
                echo "</td>
\t                            <td>";
                // line 29
                echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "email", array()), "html", null, true);
                echo "</td>
\t                            <td>
\t                                ";
                // line 31
                if ( !(null === $this->getAttribute($context["user"], "lastLogin", array()))) {
                    // line 32
                    echo "\t                                    ";
                    echo twig_escape_filter($this->env, $this->env->getExtension('fate_fr_extension')->dateFrGenerator($this->getAttribute($context["user"], "lastLogin", array())), "html", null, true);
                    echo " à ";
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["user"], "lastLogin", array()), "H:i"), "html", null, true);
                    echo "
\t                                ";
                } else {
                    // line 34
                    echo "\t                                    Jamais connecté.
\t                                ";
                }
                // line 36
                echo "\t                            </td>
\t                            <td>";
                // line 37
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["user"], "roles", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["role"]) {
                    echo "<span class=\"label label-default\">";
                    echo twig_escape_filter($this->env, $context["role"], "html", null, true);
                    echo "</span> ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['role'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                echo "</td>
\t                            <td class=\"text-center\">";
                // line 38
                echo ((($this->getAttribute($context["user"], "enabled", array()) == 1)) ? ("<i class=\"fa fa-check\"></i>") : ("<i class=\"fa fa-times\"></i>"));
                echo "</td>
\t                            <td class=\"text-center\">";
                // line 39
                echo ((($this->getAttribute($context["user"], "locked", array()) == 1)) ? ("<i class=\"fa fa-check\"></i>") : ("<i class=\"fa fa-times\"></i>"));
                echo "</td>
\t                            <td>
\t                                <a class=\"btn btn-warning btn-xs\" href=\"";
                // line 41
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ag_user_admin_edit", array("id" => $this->getAttribute($context["user"], "id", array()))), "html", null, true);
                echo "\">
\t\t                                ";
                // line 42
                echo $this->env->getExtension('font_awesome_extension')->fontAwesomeGenerator("edit");
                echo " Editer
\t                                </a>
\t                                <a class=\"btn btn-danger btn-xs\" href=\"";
                // line 44
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ag_user_admin_remove", array("id" => $this->getAttribute($context["user"], "id", array()))), "html", null, true);
                echo "\">
\t                                    ";
                // line 45
                echo $this->env->getExtension('font_awesome_extension')->fontAwesomeGenerator("remove");
                echo " Supprimer
\t                                </a>
\t                            </td>
\t                        </tr>
\t                    ";
            }
            // line 50
            echo "                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 51
        echo "                </table>
            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Admin:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  152 => 51,  146 => 50,  138 => 45,  134 => 44,  129 => 42,  125 => 41,  120 => 39,  116 => 38,  103 => 37,  100 => 36,  96 => 34,  88 => 32,  86 => 31,  81 => 29,  77 => 28,  73 => 27,  70 => 26,  67 => 25,  63 => 24,  47 => 11,  43 => 9,  40 => 8,  32 => 4,  29 => 3,  11 => 1,);
    }
}
/* {% extends 'AGUserBundle::layout.html.twig' %}*/
/* */
/* {% block breadcrumbs %}*/
/*     {{ parent() }}*/
/*     <li class="active">Gestion des utilisateurs</li>*/
/* {% endblock %}*/
/* */
/* {% block ag_user_content %}*/
/*     <div class="row">*/
/*         <div class="col-md-12">*/
/*             <h2 style="margin-bottom: 20px;"><i class="fa fa-users"></i> Liste des utilisateurs <a class="btn btn-success btn-xs pull-right" href="{{ path('ag_user_admin_add') }}"><i class="fa fa-user-plus"></i> Ajouter</a></h2>*/
/*             <div class="table-responsive">*/
/*                 <table class="table table-striped table-hover">*/
/*                     <tr>*/
/*                         <th>#</th>*/
/*                         <th>Username</th>*/
/*                         <th>E-mail</th>*/
/*                         <th>Last Login</th>*/
/*                         <th>Droits</th>*/
/*                         <th class="text-center">Activé</th>*/
/*                         <th class="text-center">Verrouillé</th>*/
/*                         <th></th>*/
/*                     </tr>*/
/*                     {% for user in users %}*/
/* 	                    {% if not user.hasRole('ROLE_ADMIN') %}*/
/* 	                        <tr>*/
/* 	                            <td>{{ user.id }}</td>*/
/* 	                            <td>{{ user.username }}</td>*/
/* 	                            <td>{{ user.email }}</td>*/
/* 	                            <td>*/
/* 	                                {% if user.lastLogin is not null %}*/
/* 	                                    {{ user.lastLogin|date_fr }} à {{ user.lastLogin|date('H:i') }}*/
/* 	                                {% else %}*/
/* 	                                    Jamais connecté.*/
/* 	                                {% endif %}*/
/* 	                            </td>*/
/* 	                            <td>{% for role in user.roles %}<span class="label label-default">{{ role }}</span> {% endfor %}</td>*/
/* 	                            <td class="text-center">{{ user.enabled == 1 ? '<i class="fa fa-check"></i>' : '<i class="fa fa-times"></i>' }}</td>*/
/* 	                            <td class="text-center">{{ user.locked == 1 ? '<i class="fa fa-check"></i>' : '<i class="fa fa-times"></i>' }}</td>*/
/* 	                            <td>*/
/* 	                                <a class="btn btn-warning btn-xs" href="{{ path('ag_user_admin_edit', { id: user.id }) }}">*/
/* 		                                {{ fa('edit') }} Editer*/
/* 	                                </a>*/
/* 	                                <a class="btn btn-danger btn-xs" href="{{ path('ag_user_admin_remove', { id: user.id }) }}">*/
/* 	                                    {{ fa('remove') }} Supprimer*/
/* 	                                </a>*/
/* 	                            </td>*/
/* 	                        </tr>*/
/* 	                    {% endif %}*/
/*                     {% endfor %}*/
/*                 </table>*/
/*             </div>*/
/*         </div>*/
/*     </div>*/
/* {% endblock %}*/
