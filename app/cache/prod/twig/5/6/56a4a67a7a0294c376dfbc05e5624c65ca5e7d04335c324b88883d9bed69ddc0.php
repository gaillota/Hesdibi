<?php

/* AGVaultBundle:Folder:mobile.html.twig */
class __TwigTemplate_b4dc3eb6c751d976ea440bb69b84660beef5a0ff9815910d90e6515705d22154 extends Twig_Template
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
        // line 2
        echo "<div class=\"btn-group dropup\">
\t<button type=\"button\" class=\"btn btn-primary dropdown-toggle btn-xs\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">+</button>
\t<ul class=\"dropdown-menu\">
\t\t<li><a href=\"#\" type=\"button\" data-toggle=\"modal\" data-target=\"#newFolderModal\">";
        // line 5
        echo $this->env->getExtension('font_awesome_extension')->fontAwesomeGenerator("folder");
        echo "</a></li>
\t\t<li><a href=\"#\" type=\"button\" data-toggle=\"modal\" data-target=\"#newFileModal\">";
        // line 6
        echo $this->env->getExtension('font_awesome_extension')->fontAwesomeGenerator("file-pdf-o");
        echo "</a></li>
\t</ul>
</div>
<form action=\"\" method=\"GET\" class=\"mobile-search visible-xs\">
\t<div class=\"input-group\">
\t\t<span class=\"input-group-addon\" id=\"addon2\">";
        // line 11
        echo $this->env->getExtension('font_awesome_extension')->fontAwesomeGenerator("search");
        echo "</span>
\t\t<input type=\"text\" class=\"form-control\" placeholder=\"Recherche\" name=\"s\" aria-describedby=\"addon2\" autocomplete=\"off\">
\t</div>
</form>
";
        // line 16
        echo "
";
        // line 18
        echo "<div class=\"row\" id=\"vault-mobile\" style=\"margin-bottom: 70px;\">
\t<div class=\"col-xs-12 text-center\">
\t\t<h2 style=\"margin: 0;\">
\t\t\t";
        // line 21
        if ( !(null === (isset($context["folder"]) ? $context["folder"] : null))) {
            // line 22
            echo "\t\t\t\t";
            echo $this->env->getExtension('font_awesome_extension')->fontAwesomeGenerator("folder-open");
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["folder"]) ? $context["folder"] : null), "name", array()), "html", null, true);
            echo "
\t\t\t";
        } else {
            // line 24
            echo "\t\t\t\t";
            echo $this->env->getExtension('font_awesome_extension')->fontAwesomeGenerator("lock");
            echo " Mon Vault
\t\t\t";
        }
        // line 26
        echo "\t\t</h2>
\t\t<div class=\"row\">
\t\t\t";
        // line 28
        $context["nbrElements"] = 0;
        // line 29
        echo "\t\t\t";
        $context["noFolder"] = 0;
        // line 30
        echo "\t\t\t";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["listFolders"]) ? $context["listFolders"] : null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["f"]) {
            // line 31
            echo "\t\t\t\t";
            $context["nbrElements"] = ((isset($context["nbrElements"]) ? $context["nbrElements"] : null) + 1);
            // line 32
            echo "\t\t\t\t<div class=\"col-xs-6\">
\t\t\t\t\t<div class=\"btn-group dropdown actions";
            // line 33
            if ((((isset($context["nbrElements"]) ? $context["nbrElements"] : null) % 2) == 0)) {
                echo " inverse-dropdown";
            }
            echo "\">
\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-default dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
\t\t\t\t\t\t\t<span class=\"caret\"></span>
\t\t\t\t\t\t</button>
\t\t\t\t\t\t<ul class=\"dropdown-menu\">
\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a href=\"";
            // line 39
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ag_vault_folder_move", array("id" => $this->getAttribute($context["f"], "id", array()))), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t\t";
            // line 40
            echo $this->env->getExtension('font_awesome_extension')->fontAwesomeGenerator("location-arrow");
            echo " Modifier emplacement
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t<li class=\"divider\"></li>
\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a href=\"#\" type=\"button\" data-toggle=\"modal\" data-target=\"#renameModal\" data-id=\"";
            // line 45
            echo twig_escape_filter($this->env, $this->getAttribute($context["f"], "id", array()), "html", null, true);
            echo "\" data-href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ag_vault_folder_rename", array("id" => $this->getAttribute($context["f"], "id", array()))), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t\t";
            // line 46
            echo $this->env->getExtension('font_awesome_extension')->fontAwesomeGenerator("edit");
            echo " Renommer
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a href=\"";
            // line 50
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ag_vault_folder_remove", array("id" => $this->getAttribute($context["f"], "id", array()))), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t\t";
            // line 51
            echo $this->env->getExtension('font_awesome_extension')->fontAwesomeGenerator("remove");
            echo " Supprimer
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t</ul>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"icon\">
\t\t\t\t\t\t";
            // line 57
            echo $this->env->getExtension('font_awesome_extension')->fontAwesomeGenerator("folder");
            echo "
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"title\">
\t\t\t\t\t\t<a href=\"";
            // line 60
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ag_vault_folder_show", array("id" => $this->getAttribute($context["f"], "id", array()), "slug" => $this->getAttribute($context["f"], "slug", array()))), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t";
            // line 61
            echo twig_escape_filter($this->env, $this->getAttribute($context["f"], "name", array()), "html", null, true);
            echo "
\t\t\t\t\t\t</a>
\t\t\t\t\t\t<span class=\"size\">";
            // line 63
            echo twig_escape_filter($this->env, $this->env->getExtension('size_reformat_extension')->sizeReformat($this->getAttribute($context["f"], "size", array())), "html", null, true);
            echo "</span>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 67
            echo "\t\t\t\t";
            $context["noFolder"] = 1;
            // line 68
            echo "\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['f'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 69
        echo "\t\t\t";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["listFiles"]) ? $context["listFiles"] : null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["file"]) {
            // line 70
            echo "\t\t\t\t";
            $context["nbrElements"] = ((isset($context["nbrElements"]) ? $context["nbrElements"] : null) + 1);
            // line 71
            echo "\t\t\t\t<div class=\"col-xs-6\">
\t\t\t\t\t<div class=\"btn-group dropdown actions";
            // line 72
            if ((((isset($context["nbrElements"]) ? $context["nbrElements"] : null) % 2) == 0)) {
                echo " inverse-dropdown";
            }
            echo "\">
\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-default dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
\t\t\t\t\t\t\t<span class=\"caret\"></span>
\t\t\t\t\t\t</button>
\t\t\t\t\t\t<ul class=\"dropdown-menu\">
\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a href=\"";
            // line 78
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ag_vault_file_download", array("id" => $this->getAttribute($context["file"], "id", array()))), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t\t";
            // line 79
            echo $this->env->getExtension('font_awesome_extension')->fontAwesomeGenerator("download");
            echo " Télécharger
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a href=\"";
            // line 83
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ag_vault_file_send", array("id" => $this->getAttribute($context["file"], "id", array()))), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t\t";
            // line 84
            echo $this->env->getExtension('font_awesome_extension')->fontAwesomeGenerator("envelope");
            echo " Envoyer par e-mail
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a href=\"#\" data-toggle=\"modal\" data-target=\"#fileDetailsModal\" data-details=\"";
            // line 88
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ag_vault_file_details", array("id" => $this->getAttribute($context["file"], "id", array()))), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t\t";
            // line 89
            echo $this->env->getExtension('font_awesome_extension')->fontAwesomeGenerator("bar-chart");
            echo " Voir détails
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a href=\"";
            // line 93
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ag_vault_file_move", array("id" => $this->getAttribute($context["file"], "id", array()))), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t\t";
            // line 94
            echo $this->env->getExtension('font_awesome_extension')->fontAwesomeGenerator("location-arrow");
            echo " Modifier emplacement
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t<li class=\"divider\"></li>
\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a href=\"#\" type=\"button\" data-toggle=\"modal\" data-target=\"#renameModal\" data-id=\"";
            // line 99
            echo twig_escape_filter($this->env, $this->getAttribute($context["file"], "id", array()), "html", null, true);
            echo "\" data-href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ag_vault_file_rename", array("id" => $this->getAttribute($context["file"], "id", array()))), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t\t";
            // line 100
            echo $this->env->getExtension('font_awesome_extension')->fontAwesomeGenerator("edit");
            echo " Renommer
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a href=\"";
            // line 104
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ag_vault_file_remove", array("id" => $this->getAttribute($context["file"], "id", array()))), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t\t";
            // line 105
            echo $this->env->getExtension('font_awesome_extension')->fontAwesomeGenerator("times");
            echo " Supprimer
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t</ul>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"icon\">
\t\t\t\t\t\t";
            // line 111
            echo $this->env->getExtension('font_awesome_extension')->fontAwesomeGenerator("file-pdf-o");
            echo "
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"title\">
\t\t\t\t\t\t<a class=\"pdf\" href=\"";
            // line 114
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ag_vault_file_preview", array("id" => $this->getAttribute($context["file"], "id", array()))), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t";
            // line 115
            echo twig_escape_filter($this->env, $this->getAttribute($context["file"], "name", array()), "html", null, true);
            echo "
\t\t\t\t\t\t</a>
\t\t\t\t\t\t<span class=\"size\">";
            // line 117
            echo twig_escape_filter($this->env, $this->env->getExtension('size_reformat_extension')->sizeReformat($this->getAttribute($context["file"], "size", array())), "html", null, true);
            echo "</span>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 121
            echo "\t\t\t\t";
            if ((array_key_exists("search", $context) &&  !(null === (isset($context["search"]) ? $context["search"] : null)))) {
                // line 122
                echo "\t\t\t\t\t<div class=\"col-xs-12 text-center\">
\t\t\t\t\t\t<h5 style=\"margin-top: 20px;\">
\t\t\t\t\t\t\tAucun résultat pour la recherche <em>";
                // line 124
                echo twig_escape_filter($this->env, (isset($context["search"]) ? $context["search"] : null), "html", null, true);
                echo "</em>.
\t\t\t\t\t\t</h5>
\t\t\t\t\t</div>
\t\t\t\t";
            } else {
                // line 128
                echo "\t\t\t\t\t";
                if ((isset($context["noFolder"]) ? $context["noFolder"] : null)) {
                    // line 129
                    echo "\t\t\t\t\t\t<div class=\"col-xs-12 text-center\">
\t\t\t\t\t\t\t<h5 style=\"margin-top: 20px;\">
\t\t\t\t\t\t\t\tAucun contenu dans ";
                    // line 131
                    if ( !(null === (isset($context["folder"]) ? $context["folder"] : null))) {
                        echo "ce dossier.";
                    } else {
                        echo "votre Vault.";
                    }
                    // line 132
                    echo "\t\t\t\t\t\t\t</h5>
\t\t\t\t\t\t</div>
\t\t\t\t\t";
                }
                // line 135
                echo "\t\t\t\t";
            }
            // line 136
            echo "\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['file'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 137
        echo "\t\t</div>
\t</div>
</div>";
    }

    public function getTemplateName()
    {
        return "AGVaultBundle:Folder:mobile.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  329 => 137,  323 => 136,  320 => 135,  315 => 132,  309 => 131,  305 => 129,  302 => 128,  295 => 124,  291 => 122,  288 => 121,  279 => 117,  274 => 115,  270 => 114,  264 => 111,  255 => 105,  251 => 104,  244 => 100,  238 => 99,  230 => 94,  226 => 93,  219 => 89,  215 => 88,  208 => 84,  204 => 83,  197 => 79,  193 => 78,  182 => 72,  179 => 71,  176 => 70,  170 => 69,  164 => 68,  161 => 67,  152 => 63,  147 => 61,  143 => 60,  137 => 57,  128 => 51,  124 => 50,  117 => 46,  111 => 45,  103 => 40,  99 => 39,  88 => 33,  85 => 32,  82 => 31,  76 => 30,  73 => 29,  71 => 28,  67 => 26,  61 => 24,  53 => 22,  51 => 21,  46 => 18,  43 => 16,  36 => 11,  28 => 6,  24 => 5,  19 => 2,);
    }
}
/* {# Button displayed in mobile view #}*/
/* <div class="btn-group dropup">*/
/* 	<button type="button" class="btn btn-primary dropdown-toggle btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">+</button>*/
/* 	<ul class="dropdown-menu">*/
/* 		<li><a href="#" type="button" data-toggle="modal" data-target="#newFolderModal">{{ fa('folder') }}</a></li>*/
/* 		<li><a href="#" type="button" data-toggle="modal" data-target="#newFileModal">{{ fa('file-pdf-o') }}</a></li>*/
/* 	</ul>*/
/* </div>*/
/* <form action="" method="GET" class="mobile-search visible-xs">*/
/* 	<div class="input-group">*/
/* 		<span class="input-group-addon" id="addon2">{{ fa('search') }}</span>*/
/* 		<input type="text" class="form-control" placeholder="Recherche" name="s" aria-describedby="addon2" autocomplete="off">*/
/* 	</div>*/
/* </form>*/
/* {# End button #}*/
/* */
/* {# Mobile view #}*/
/* <div class="row" id="vault-mobile" style="margin-bottom: 70px;">*/
/* 	<div class="col-xs-12 text-center">*/
/* 		<h2 style="margin: 0;">*/
/* 			{% if folder is not null %}*/
/* 				{{ fa('folder-open') }} {{ folder.name }}*/
/* 			{% else %}*/
/* 				{{ fa('lock') }} Mon Vault*/
/* 			{% endif %}*/
/* 		</h2>*/
/* 		<div class="row">*/
/* 			{% set nbrElements = 0 %}*/
/* 			{% set noFolder = 0 %}*/
/* 			{% for f in listFolders %}*/
/* 				{% set nbrElements = nbrElements + 1 %}*/
/* 				<div class="col-xs-6">*/
/* 					<div class="btn-group dropdown actions{% if nbrElements % 2 == 0 %} inverse-dropdown{% endif %}">*/
/* 						<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">*/
/* 							<span class="caret"></span>*/
/* 						</button>*/
/* 						<ul class="dropdown-menu">*/
/* 							<li>*/
/* 								<a href="{{ path('ag_vault_folder_move', {id:f.id}) }}">*/
/* 									{{ fa('location-arrow') }} Modifier emplacement*/
/* 								</a>*/
/* 							</li>*/
/* 							<li class="divider"></li>*/
/* 							<li>*/
/* 								<a href="#" type="button" data-toggle="modal" data-target="#renameModal" data-id="{{ f.id }}" data-href="{{ path('ag_vault_folder_rename', { id:f.id }) }}">*/
/* 									{{ fa('edit') }} Renommer*/
/* 								</a>*/
/* 							</li>*/
/* 							<li>*/
/* 								<a href="{{ path('ag_vault_folder_remove', { id:f.id }) }}">*/
/* 									{{ fa('remove') }} Supprimer*/
/* 								</a>*/
/* 							</li>*/
/* 						</ul>*/
/* 					</div>*/
/* 					<div class="icon">*/
/* 						{{ fa('folder') }}*/
/* 					</div>*/
/* 					<div class="title">*/
/* 						<a href="{{ path('ag_vault_folder_show', { id:f.id, slug:f.slug }) }}">*/
/* 							{{ f.name }}*/
/* 						</a>*/
/* 						<span class="size">{{ f.size|size }}</span>*/
/* 					</div>*/
/* 				</div>*/
/* 			{% else %}*/
/* 				{% set noFolder = 1 %}*/
/* 			{% endfor %}*/
/* 			{% for file in listFiles %}*/
/* 				{% set nbrElements = nbrElements + 1 %}*/
/* 				<div class="col-xs-6">*/
/* 					<div class="btn-group dropdown actions{% if nbrElements % 2 == 0 %} inverse-dropdown{% endif %}">*/
/* 						<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">*/
/* 							<span class="caret"></span>*/
/* 						</button>*/
/* 						<ul class="dropdown-menu">*/
/* 							<li>*/
/* 								<a href="{{ path('ag_vault_file_download', { id:file.id }) }}">*/
/* 									{{ fa('download') }} Télécharger*/
/* 								</a>*/
/* 							</li>*/
/* 							<li>*/
/* 								<a href="{{ path('ag_vault_file_send', { id:file.id }) }}">*/
/* 									{{ fa('envelope') }} Envoyer par e-mail*/
/* 								</a>*/
/* 							</li>*/
/* 							<li>*/
/* 								<a href="#" data-toggle="modal" data-target="#fileDetailsModal" data-details="{{ path('ag_vault_file_details', {id:file.id}) }}">*/
/* 									{{ fa('bar-chart') }} Voir détails*/
/* 								</a>*/
/* 							</li>*/
/* 							<li>*/
/* 								<a href="{{ path('ag_vault_file_move', {id:file.id}) }}">*/
/* 									{{ fa('location-arrow') }} Modifier emplacement*/
/* 								</a>*/
/* 							</li>*/
/* 							<li class="divider"></li>*/
/* 							<li>*/
/* 								<a href="#" type="button" data-toggle="modal" data-target="#renameModal" data-id="{{ file.id }}" data-href="{{ path('ag_vault_file_rename', { id:file.id }) }}">*/
/* 									{{ fa('edit') }} Renommer*/
/* 								</a>*/
/* 							</li>*/
/* 							<li>*/
/* 								<a href="{{ path('ag_vault_file_remove', { id:file.id }) }}">*/
/* 									{{ fa('times') }} Supprimer*/
/* 								</a>*/
/* 							</li>*/
/* 						</ul>*/
/* 					</div>*/
/* 					<div class="icon">*/
/* 						{{ fa('file-pdf-o') }}*/
/* 					</div>*/
/* 					<div class="title">*/
/* 						<a class="pdf" href="{{ path('ag_vault_file_preview', { id:file.id }) }}">*/
/* 							{{ file.name }}*/
/* 						</a>*/
/* 						<span class="size">{{ file.size|size }}</span>*/
/* 					</div>*/
/* 				</div>*/
/* 			{% else %}*/
/* 				{% if search is defined and search is not null %}*/
/* 					<div class="col-xs-12 text-center">*/
/* 						<h5 style="margin-top: 20px;">*/
/* 							Aucun résultat pour la recherche <em>{{ search }}</em>.*/
/* 						</h5>*/
/* 					</div>*/
/* 				{% else %}*/
/* 					{% if  noFolder %}*/
/* 						<div class="col-xs-12 text-center">*/
/* 							<h5 style="margin-top: 20px;">*/
/* 								Aucun contenu dans {% if folder is not null %}ce dossier.{% else %}votre Vault.{% endif %}*/
/* 							</h5>*/
/* 						</div>*/
/* 					{% endif %}*/
/* 				{% endif %}*/
/* 			{% endfor %}*/
/* 		</div>*/
/* 	</div>*/
/* </div>*/
