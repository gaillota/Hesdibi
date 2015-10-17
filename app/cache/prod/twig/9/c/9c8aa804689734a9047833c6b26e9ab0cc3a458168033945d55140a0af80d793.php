<?php

/* AGVaultBundle:Folder:desktop.html.twig */
class __TwigTemplate_ec80b907577ddb4307357b0014ac132303e13e1533e470a2f5c8f10a88cbb5ac extends Twig_Template
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
        echo "<div class=\"row\" id=\"vault\">
\t<div class=\"col-md-2 text-center\">
\t\t<div class=\"btn-group dropdown new\">
\t\t\t<button type=\"button\" class=\"btn btn-primary dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
\t\t\t\tNouveau <span class=\"caret\"></span>
\t\t\t</button>
\t\t\t<ul class=\"dropdown-menu\">
\t\t\t\t<li>
\t\t\t\t\t<a href=\"#\" type=\"button\" data-toggle=\"modal\" data-target=\"#newFileModal\">
\t\t\t\t\t\t";
        // line 11
        echo $this->env->getExtension('font_awesome_extension')->fontAwesomeGenerator("file-pdf-o");
        echo " Fichier
\t\t\t\t\t</a>
\t\t\t\t</li>
\t\t\t\t<li>
\t\t\t\t\t<a href=\"#\" type=\"button\" data-toggle=\"modal\" data-target=\"#newFolderModal\">
\t\t\t\t\t\t";
        // line 16
        echo $this->env->getExtension('font_awesome_extension')->fontAwesomeGenerator("folder");
        echo " Dossier
\t\t\t\t\t</a>
\t\t\t\t</li>
\t\t\t</ul>
\t\t</div>
\t</div>
\t<div class=\"col-md-10\">
\t\t<div class=\"pull-right searchForm\">
\t\t\t<form action=\"\" method=\"GET\">
\t\t\t\t<div class=\"input-group\">
\t\t\t\t\t<span class=\"input-group-addon\" id=\"addon1\">";
        // line 26
        echo $this->env->getExtension('font_awesome_extension')->fontAwesomeGenerator("search");
        echo "</span>
\t\t\t\t\t<input type=\"text\" class=\"form-control\" placeholder=\"Recherche\" name=\"s\" aria-describedby=\"addon1\" ";
        // line 27
        if ((array_key_exists("search", $context) &&  !(null === (isset($context["search"]) ? $context["search"] : null)))) {
            echo "value=\"";
            echo twig_escape_filter($this->env, (isset($context["search"]) ? $context["search"] : null), "html", null, true);
            echo "\"";
        }
        echo ">
\t\t\t\t</div>
\t\t\t</form>
\t\t</div>
\t\t<h2 style=\"margin-top: 0;\">
\t\t\t";
        // line 32
        if ((array_key_exists("search", $context) &&  !(null === (isset($context["search"]) ? $context["search"] : null)))) {
            // line 33
            echo "\t\t\t\tRésultat de la recherche : <em>";
            echo twig_escape_filter($this->env, (isset($context["search"]) ? $context["search"] : null), "html", null, true);
            echo "</em>
\t\t\t";
        } else {
            // line 35
            echo "\t\t\t\t";
            if ( !(null === (isset($context["folder"]) ? $context["folder"] : null))) {
                // line 36
                echo "\t\t\t\t\t<a href=\"";
                echo twig_escape_filter($this->env, (((null === $this->getAttribute((isset($context["folder"]) ? $context["folder"] : null), "parent", array()))) ? ($this->env->getExtension('routing')->getPath("ag_vault_homepage")) : ($this->env->getExtension('routing')->getPath("ag_vault_folder_show", array("id" => $this->getAttribute($this->getAttribute((isset($context["folder"]) ? $context["folder"] : null), "parent", array()), "id", array()), "slug" => $this->getAttribute($this->getAttribute((isset($context["folder"]) ? $context["folder"] : null), "parent", array()), "slug", array()))))), "html", null, true);
                echo "\">
\t\t\t\t\t\t";
                // line 37
                echo $this->env->getExtension('font_awesome_extension')->fontAwesomeGenerator("arrow-left");
                echo "&nbsp;
\t\t\t\t\t</a>
\t\t\t\t\t";
                // line 39
                echo $this->env->getExtension('font_awesome_extension')->fontAwesomeGenerator("folder-open");
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["folder"]) ? $context["folder"] : null), "name", array()), "html", null, true);
                echo "
\t\t\t\t";
            } else {
                // line 41
                echo "\t\t\t\t\t";
                echo $this->env->getExtension('font_awesome_extension')->fontAwesomeGenerator("lock");
                echo " Mon Vault
\t\t\t\t";
            }
            // line 43
            echo "\t\t\t\t<small>";
            echo twig_escape_filter($this->env, $this->env->getExtension('size_reformat_extension')->sizeReformat((isset($context["size"]) ? $context["size"] : null)), "html", null, true);
            echo "</small>
\t\t\t";
        }
        // line 45
        echo "\t\t</h2>
\t\t<table class=\"table table-hover table-striped\">
\t\t\t<tr>
\t\t\t\t<th>Nom</th>
\t\t\t\t<th>Dernière modification</th>
\t\t\t\t<th>Taille</th>
\t\t\t\t<th>Partage</th>
\t\t\t\t<th></th>
\t\t\t</tr>
\t\t\t";
        // line 54
        $context["noFolder"] = 0;
        // line 55
        echo "\t\t\t";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["listFolders"]) ? $context["listFolders"] : null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["f"]) {
            // line 56
            echo "\t\t\t\t<tr data-row=\"folder\" data-folder-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["f"], "id", array()), "html", null, true);
            echo "\">
\t\t\t\t\t<td>
\t\t\t\t\t\t";
            // line 58
            echo $this->env->getExtension('font_awesome_extension')->fontAwesomeGenerator("folder");
            echo "
\t\t\t\t\t\t<a href=\"";
            // line 59
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ag_vault_folder_show", array("id" => $this->getAttribute($context["f"], "id", array()), "slug" => $this->getAttribute($context["f"], "slug", array()))), "html", null, true);
            echo "\" data-name>";
            echo twig_escape_filter($this->env, $this->getAttribute($context["f"], "name", array()), "html", null, true);
            echo "</a>
\t\t\t\t\t</td>
\t\t\t\t\t<td>";
            // line 61
            echo twig_escape_filter($this->env, $this->env->getExtension('fate_fr_extension')->dateFrGenerator($this->getAttribute($context["f"], "lastModified", array())), "html", null, true);
            echo "</td>
\t\t\t\t\t<td>";
            // line 62
            echo twig_escape_filter($this->env, $this->env->getExtension('size_reformat_extension')->sizeReformat($this->getAttribute($context["f"], "size", array())), "html", null, true);
            echo "</td>
\t\t\t\t\t<td></td>
\t\t\t\t\t<td>
\t\t\t\t\t\t<div class=\"btn-group dropdown actions pull-right\">
\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-default dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
\t\t\t\t\t\t\t\t<span class=\"caret\"></span>
\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t<ul class=\"dropdown-menu\">
\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t<a href=\"";
            // line 71
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ag_vault_folder_move", array("id" => $this->getAttribute($context["f"], "id", array()))), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t\t\t";
            // line 72
            echo $this->env->getExtension('font_awesome_extension')->fontAwesomeGenerator("location-arrow");
            echo " Modifier emplacement
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t<li class=\"divider\"></li>
\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t<a href=\"#\" type=\"button\" data-toggle=\"modal\" data-target=\"#renameModal\" data-id=\"";
            // line 77
            echo twig_escape_filter($this->env, $this->getAttribute($context["f"], "id", array()), "html", null, true);
            echo "\" data-href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ag_vault_folder_rename", array("id" => $this->getAttribute($context["f"], "id", array()))), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t\t\t";
            // line 78
            echo $this->env->getExtension('font_awesome_extension')->fontAwesomeGenerator("edit");
            echo " Renommer
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t<a href=\"";
            // line 82
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ag_vault_folder_remove", array("id" => $this->getAttribute($context["f"], "id", array()))), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t\t\t";
            // line 83
            echo $this->env->getExtension('font_awesome_extension')->fontAwesomeGenerator("remove");
            echo " Supprimer
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</div>
\t\t\t\t\t</td>
\t\t\t\t</tr>
\t\t\t";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 91
            echo "\t\t\t\t";
            $context["noFolder"] = 1;
            // line 92
            echo "\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['f'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 93
        echo "\t\t\t";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["listFiles"]) ? $context["listFiles"] : null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["file"]) {
            // line 94
            echo "\t\t\t\t<tr data-row=\"file\" data-file-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["file"], "id", array()), "html", null, true);
            echo "\">
\t\t\t\t\t<td>
\t\t\t\t\t\t";
            // line 96
            echo $this->env->getExtension('font_awesome_extension')->fontAwesomeGenerator("file-pdf-o");
            echo "
\t\t\t\t\t\t<a class=\"pdf\" href=\"";
            // line 97
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ag_vault_file_preview", array("id" => $this->getAttribute($context["file"], "id", array()))), "html", null, true);
            echo "\" data-name>";
            echo twig_escape_filter($this->env, $this->getAttribute($context["file"], "name", array()), "html", null, true);
            echo "</a>
\t\t\t\t\t</td>
\t\t\t\t\t<td>";
            // line 99
            echo twig_escape_filter($this->env, $this->env->getExtension('fate_fr_extension')->dateFrGenerator($this->getAttribute($context["file"], "lastModified", array())), "html", null, true);
            echo "</td>
\t\t\t\t\t<td>";
            // line 100
            echo twig_escape_filter($this->env, $this->env->getExtension('size_reformat_extension')->sizeReformat($this->getAttribute($context["file"], "size", array())), "html", null, true);
            echo "</td>
\t\t\t\t\t<td>
\t\t\t\t\t\t";
            // line 102
            if (((twig_length_filter($this->env, $this->getAttribute($context["file"], "authorizedUsers", array())) > 0) || (twig_length_filter($this->env, $this->getAttribute($context["file"], "shareLinks", array())) > 0))) {
                // line 103
                echo "\t\t\t\t\t\t\t";
                if ((twig_length_filter($this->env, $this->getAttribute($context["file"], "authorizedUsers", array())) > 0)) {
                    echo "Partagé (";
                    echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute($context["file"], "authorizedUsers", array())), "html", null, true);
                    echo ")";
                }
                if (twig_length_filter($this->env, $this->getAttribute($context["file"], "shareLinks", array()))) {
                    if (((twig_length_filter($this->env, $this->getAttribute($context["file"], "authorizedUsers", array())) > 0) && (twig_length_filter($this->env, $this->getAttribute($context["file"], "shareLinks", array())) > 0))) {
                        echo ", ";
                    }
                    echo "Liens (";
                    echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute($context["file"], "shareLinks", array())), "html", null, true);
                    echo ")";
                }
                // line 104
                echo "\t\t\t\t\t\t";
            } else {
                // line 105
                echo "\t\t\t\t\t\t\tNon partagé
\t\t\t\t\t\t";
            }
            // line 107
            echo "\t\t\t\t\t</td>
\t\t\t\t\t<td>
\t\t\t\t\t\t<div class=\"btn-group dropdown actions pull-right\">
\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-default dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
\t\t\t\t\t\t\t\t<span class=\"caret\"></span>
\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t<ul class=\"dropdown-menu\">
\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t<a href=\"";
            // line 115
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ag_vault_file_download", array("id" => $this->getAttribute($context["file"], "id", array()))), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t\t\t";
            // line 116
            echo $this->env->getExtension('font_awesome_extension')->fontAwesomeGenerator("download");
            echo " Télécharger
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t<a href=\"";
            // line 120
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ag_vault_file_send", array("id" => $this->getAttribute($context["file"], "id", array()))), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t\t\t";
            // line 121
            echo $this->env->getExtension('font_awesome_extension')->fontAwesomeGenerator("envelope");
            echo " Envoyer par e-mail
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t<a href=\"#\" data-toggle=\"modal\" data-target=\"#shareLinkModal\" data-get-link=\"";
            // line 125
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ag_vault_file_generate_link", array("id" => $this->getAttribute($context["file"], "id", array()))), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t\t\t";
            // line 126
            echo $this->env->getExtension('font_awesome_extension')->fontAwesomeGenerator("share-alt");
            echo " Générer lien de partage
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t<a href=\"";
            // line 130
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ag_vault_file_share_with", array("id" => $this->getAttribute($context["file"], "id", array()))), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t\t\t";
            // line 131
            echo $this->env->getExtension('font_awesome_extension')->fontAwesomeGenerator("users");
            echo " Partager avec
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t<a href=\"#\" data-toggle=\"modal\" data-target=\"#fileDetailsModal\" data-details=\"";
            // line 135
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ag_vault_file_details", array("id" => $this->getAttribute($context["file"], "id", array()))), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t\t\t";
            // line 136
            echo $this->env->getExtension('font_awesome_extension')->fontAwesomeGenerator("bar-chart");
            echo " Voir détails
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t<li class=\"divider\"></li>
\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t<a href=\"";
            // line 141
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ag_vault_file_move", array("id" => $this->getAttribute($context["file"], "id", array()))), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t\t\t";
            // line 142
            echo $this->env->getExtension('font_awesome_extension')->fontAwesomeGenerator("location-arrow");
            echo " Modifier emplacement
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t<a href=\"#\" type=\"button\" data-toggle=\"modal\" data-target=\"#renameModal\" data-id=\"";
            // line 146
            echo twig_escape_filter($this->env, $this->getAttribute($context["file"], "id", array()), "html", null, true);
            echo "\" data-href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ag_vault_file_rename", array("id" => $this->getAttribute($context["file"], "id", array()))), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t\t\t";
            // line 147
            echo $this->env->getExtension('font_awesome_extension')->fontAwesomeGenerator("edit");
            echo " Renommer
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t<a href=\"";
            // line 151
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ag_vault_file_remove", array("id" => $this->getAttribute($context["file"], "id", array()))), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t\t\t";
            // line 152
            echo $this->env->getExtension('font_awesome_extension')->fontAwesomeGenerator("times");
            echo " Supprimer
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</div>
\t\t\t\t\t</td>
\t\t\t\t</tr>
\t\t\t";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 160
            echo "\t\t\t\t";
            if ((array_key_exists("search", $context) &&  !(null === (isset($context["search"]) ? $context["search"] : null)))) {
                // line 161
                echo "\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"text-center\" colspan=\"5\">
\t\t\t\t\t\t\tAucun résultat pour la recherche <em>";
                // line 163
                echo twig_escape_filter($this->env, (isset($context["search"]) ? $context["search"] : null), "html", null, true);
                echo "</em>.
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t";
            } else {
                // line 167
                echo "\t\t\t\t\t";
                if ((isset($context["noFolder"]) ? $context["noFolder"] : null)) {
                    // line 168
                    echo "\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td class=\"text-center\" colspan=\"5\">
\t\t\t\t\t\t\t\tAucun contenu dans ";
                    // line 170
                    if ( !(null === (isset($context["folder"]) ? $context["folder"] : null))) {
                        echo "ce dossier.";
                    } else {
                        echo "votre Vault.";
                    }
                    // line 171
                    echo "\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t";
                }
                // line 174
                echo "\t\t\t\t";
            }
            // line 175
            echo "\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['file'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 176
        echo "\t\t</table>
\t</div>
</div>";
    }

    public function getTemplateName()
    {
        return "AGVaultBundle:Folder:desktop.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  414 => 176,  408 => 175,  405 => 174,  400 => 171,  394 => 170,  390 => 168,  387 => 167,  380 => 163,  376 => 161,  373 => 160,  360 => 152,  356 => 151,  349 => 147,  343 => 146,  336 => 142,  332 => 141,  324 => 136,  320 => 135,  313 => 131,  309 => 130,  302 => 126,  298 => 125,  291 => 121,  287 => 120,  280 => 116,  276 => 115,  266 => 107,  262 => 105,  259 => 104,  244 => 103,  242 => 102,  237 => 100,  233 => 99,  226 => 97,  222 => 96,  216 => 94,  210 => 93,  204 => 92,  201 => 91,  188 => 83,  184 => 82,  177 => 78,  171 => 77,  163 => 72,  159 => 71,  147 => 62,  143 => 61,  136 => 59,  132 => 58,  126 => 56,  120 => 55,  118 => 54,  107 => 45,  101 => 43,  95 => 41,  88 => 39,  83 => 37,  78 => 36,  75 => 35,  69 => 33,  67 => 32,  55 => 27,  51 => 26,  38 => 16,  30 => 11,  19 => 2,);
    }
}
/* {# Desktop view #}*/
/* <div class="row" id="vault">*/
/* 	<div class="col-md-2 text-center">*/
/* 		<div class="btn-group dropdown new">*/
/* 			<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">*/
/* 				Nouveau <span class="caret"></span>*/
/* 			</button>*/
/* 			<ul class="dropdown-menu">*/
/* 				<li>*/
/* 					<a href="#" type="button" data-toggle="modal" data-target="#newFileModal">*/
/* 						{{ fa('file-pdf-o') }} Fichier*/
/* 					</a>*/
/* 				</li>*/
/* 				<li>*/
/* 					<a href="#" type="button" data-toggle="modal" data-target="#newFolderModal">*/
/* 						{{ fa('folder') }} Dossier*/
/* 					</a>*/
/* 				</li>*/
/* 			</ul>*/
/* 		</div>*/
/* 	</div>*/
/* 	<div class="col-md-10">*/
/* 		<div class="pull-right searchForm">*/
/* 			<form action="" method="GET">*/
/* 				<div class="input-group">*/
/* 					<span class="input-group-addon" id="addon1">{{ fa('search') }}</span>*/
/* 					<input type="text" class="form-control" placeholder="Recherche" name="s" aria-describedby="addon1" {% if search is defined and search is not null %}value="{{ search }}"{% endif %}>*/
/* 				</div>*/
/* 			</form>*/
/* 		</div>*/
/* 		<h2 style="margin-top: 0;">*/
/* 			{% if search is defined and search is not null %}*/
/* 				Résultat de la recherche : <em>{{ search }}</em>*/
/* 			{% else %}*/
/* 				{% if folder is not null %}*/
/* 					<a href="{{ folder.parent is null ? path('ag_vault_homepage') : path('ag_vault_folder_show', {id:folder.parent.id, slug:folder.parent.slug}) }}">*/
/* 						{{ fa('arrow-left') }}&nbsp;*/
/* 					</a>*/
/* 					{{ fa('folder-open') }} {{ folder.name }}*/
/* 				{% else %}*/
/* 					{{ fa('lock') }} Mon Vault*/
/* 				{% endif %}*/
/* 				<small>{{ size|size }}</small>*/
/* 			{% endif %}*/
/* 		</h2>*/
/* 		<table class="table table-hover table-striped">*/
/* 			<tr>*/
/* 				<th>Nom</th>*/
/* 				<th>Dernière modification</th>*/
/* 				<th>Taille</th>*/
/* 				<th>Partage</th>*/
/* 				<th></th>*/
/* 			</tr>*/
/* 			{% set noFolder = 0 %}*/
/* 			{% for f in listFolders %}*/
/* 				<tr data-row="folder" data-folder-id="{{ f.id }}">*/
/* 					<td>*/
/* 						{{ fa('folder') }}*/
/* 						<a href="{{ path('ag_vault_folder_show', { id:f.id, slug:f.slug }) }}" data-name>{{ f.name }}</a>*/
/* 					</td>*/
/* 					<td>{{ f.lastModified|date_fr }}</td>*/
/* 					<td>{{ f.size|size }}</td>*/
/* 					<td></td>*/
/* 					<td>*/
/* 						<div class="btn-group dropdown actions pull-right">*/
/* 							<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">*/
/* 								<span class="caret"></span>*/
/* 							</button>*/
/* 							<ul class="dropdown-menu">*/
/* 								<li>*/
/* 									<a href="{{ path('ag_vault_folder_move', {id:f.id}) }}">*/
/* 										{{ fa('location-arrow') }} Modifier emplacement*/
/* 									</a>*/
/* 								</li>*/
/* 								<li class="divider"></li>*/
/* 								<li>*/
/* 									<a href="#" type="button" data-toggle="modal" data-target="#renameModal" data-id="{{ f.id }}" data-href="{{ path('ag_vault_folder_rename', { id:f.id }) }}">*/
/* 										{{ fa('edit') }} Renommer*/
/* 									</a>*/
/* 								</li>*/
/* 								<li>*/
/* 									<a href="{{ path('ag_vault_folder_remove', { id:f.id }) }}">*/
/* 										{{ fa('remove') }} Supprimer*/
/* 									</a>*/
/* 								</li>*/
/* 							</ul>*/
/* 						</div>*/
/* 					</td>*/
/* 				</tr>*/
/* 			{% else %}*/
/* 				{% set noFolder = 1 %}*/
/* 			{% endfor %}*/
/* 			{% for file in listFiles %}*/
/* 				<tr data-row="file" data-file-id="{{ file.id }}">*/
/* 					<td>*/
/* 						{{ fa('file-pdf-o') }}*/
/* 						<a class="pdf" href="{{ path('ag_vault_file_preview', { id:file.id }) }}" data-name>{{ file.name }}</a>*/
/* 					</td>*/
/* 					<td>{{ file.lastModified|date_fr }}</td>*/
/* 					<td>{{ file.size|size }}</td>*/
/* 					<td>*/
/* 						{% if file.authorizedUsers|length > 0 or file.shareLinks|length > 0 %}*/
/* 							{% if file.authorizedUsers|length > 0 %}Partagé ({{ file.authorizedUsers|length }}){% endif %}{% if file.shareLinks|length %}{% if file.authorizedUsers|length > 0 and file.shareLinks|length > 0 %}, {% endif %}Liens ({{ file.shareLinks|length }}){% endif %}*/
/* 						{% else %}*/
/* 							Non partagé*/
/* 						{% endif %}*/
/* 					</td>*/
/* 					<td>*/
/* 						<div class="btn-group dropdown actions pull-right">*/
/* 							<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">*/
/* 								<span class="caret"></span>*/
/* 							</button>*/
/* 							<ul class="dropdown-menu">*/
/* 								<li>*/
/* 									<a href="{{ path('ag_vault_file_download', { id:file.id }) }}">*/
/* 										{{ fa('download') }} Télécharger*/
/* 									</a>*/
/* 								</li>*/
/* 								<li>*/
/* 									<a href="{{ path('ag_vault_file_send', { id:file.id }) }}">*/
/* 										{{ fa('envelope') }} Envoyer par e-mail*/
/* 									</a>*/
/* 								</li>*/
/* 								<li>*/
/* 									<a href="#" data-toggle="modal" data-target="#shareLinkModal" data-get-link="{{ path('ag_vault_file_generate_link', { id:file.id }) }}">*/
/* 										{{ fa('share-alt') }} Générer lien de partage*/
/* 									</a>*/
/* 								</li>*/
/* 								<li>*/
/* 									<a href="{{ path('ag_vault_file_share_with', { id:file.id }) }}">*/
/* 										{{ fa('users') }} Partager avec*/
/* 									</a>*/
/* 								</li>*/
/* 								<li>*/
/* 									<a href="#" data-toggle="modal" data-target="#fileDetailsModal" data-details="{{ path('ag_vault_file_details', {id:file.id}) }}">*/
/* 										{{ fa('bar-chart') }} Voir détails*/
/* 									</a>*/
/* 								</li>*/
/* 								<li class="divider"></li>*/
/* 								<li>*/
/* 									<a href="{{ path('ag_vault_file_move', {id:file.id}) }}">*/
/* 										{{ fa('location-arrow') }} Modifier emplacement*/
/* 									</a>*/
/* 								</li>*/
/* 								<li>*/
/* 									<a href="#" type="button" data-toggle="modal" data-target="#renameModal" data-id="{{ file.id }}" data-href="{{ path('ag_vault_file_rename', { id:file.id }) }}">*/
/* 										{{ fa('edit') }} Renommer*/
/* 									</a>*/
/* 								</li>*/
/* 								<li>*/
/* 									<a href="{{ path('ag_vault_file_remove', { id:file.id }) }}">*/
/* 										{{ fa('times') }} Supprimer*/
/* 									</a>*/
/* 								</li>*/
/* 							</ul>*/
/* 						</div>*/
/* 					</td>*/
/* 				</tr>*/
/* 			{% else %}*/
/* 				{% if search is defined and search is not null %}*/
/* 					<tr>*/
/* 						<td class="text-center" colspan="5">*/
/* 							Aucun résultat pour la recherche <em>{{ search }}</em>.*/
/* 						</td>*/
/* 					</tr>*/
/* 				{% else %}*/
/* 					{% if noFolder %}*/
/* 						<tr>*/
/* 							<td class="text-center" colspan="5">*/
/* 								Aucun contenu dans {% if folder is not null %}ce dossier.{% else %}votre Vault.{% endif %}*/
/* 							</td>*/
/* 						</tr>*/
/* 					{% endif %}*/
/* 				{% endif %}*/
/* 			{% endfor %}*/
/* 		</table>*/
/* 	</div>*/
/* </div>*/
