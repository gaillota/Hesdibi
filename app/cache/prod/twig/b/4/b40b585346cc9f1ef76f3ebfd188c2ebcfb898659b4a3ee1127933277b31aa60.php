<?php

/* AGVaultBundle:Folder:showUser.html.twig */
class __TwigTemplate_4a8f22d3a44e327ba8e51bfb213b45eea8b172035b8e4a889140f3c2e1f29c5f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("AGVaultBundle::layout.html.twig", "AGVaultBundle:Folder:showUser.html.twig", 1);
        $this->blocks = array(
            'ag_vault_content' => array($this, 'block_ag_vault_content'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AGVaultBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_ag_vault_content($context, array $blocks = array())
    {
        // line 4
        echo "\t<div class=\"row hidden-xs\" id=\"vault\">
\t\t<div class=\"col-md-2 text-center\">
\t\t\t<div class=\"btn-group dropdown new\">
\t\t\t\t<button type=\"button\" class=\"btn btn-primary dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\" disabled>
\t\t\t\t\tNouveau <span class=\"caret\"></span>
\t\t\t\t</button>
\t\t\t</div>
\t\t</div>
\t\t<div class=\"col-md-10\">
\t\t\t<div class=\"pull-right searchForm\">
\t\t\t\t<form action=\"\" method=\"GET\">
\t\t\t\t\t<div class=\"input-group\">
\t\t\t\t\t\t<span class=\"input-group-addon\" id=\"addon1\">";
        // line 16
        echo $this->env->getExtension('font_awesome_extension')->fontAwesomeGenerator("search");
        echo "</span>
\t\t\t\t\t\t<input type=\"text\" class=\"form-control\" placeholder=\"Recherche\" name=\"s\" aria-describedby=\"addon1\" ";
        // line 17
        if ((array_key_exists("search", $context) &&  !(null === (isset($context["search"]) ? $context["search"] : null)))) {
            echo "value=\"";
            echo twig_escape_filter($this->env, (isset($context["search"]) ? $context["search"] : null), "html", null, true);
            echo "\"";
        }
        echo ">
\t\t\t\t\t</div>
\t\t\t\t</form>
\t\t\t</div>
\t\t\t<h2 style=\"margin-top: 0;\">
\t\t\t\t";
        // line 22
        if ((array_key_exists("search", $context) &&  !(null === (isset($context["search"]) ? $context["search"] : null)))) {
            // line 23
            echo "\t\t\t\t\tRésultat de la recherche : <em>";
            echo twig_escape_filter($this->env, (isset($context["search"]) ? $context["search"] : null), "html", null, true);
            echo "</em>
\t\t\t\t";
        } else {
            // line 25
            echo "\t\t\t\t\t";
            echo $this->env->getExtension('font_awesome_extension')->fontAwesomeGenerator("lock");
            echo " Mon Vault
\t\t\t\t";
        }
        // line 27
        echo "\t\t\t</h2>
\t\t\t<table class=\"table table-hover table-striped\">
\t\t\t\t<tr>
\t\t\t\t\t<th>Nom</th>
\t\t\t\t\t<th>Dernière modification</th>
\t\t\t\t\t<th>Taille</th>
\t\t\t\t\t<th></th>
\t\t\t\t</tr>
\t\t\t\t";
        // line 35
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["listFiles"]) ? $context["listFiles"] : null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["file"]) {
            // line 36
            echo "\t\t\t\t\t<tr data-row=\"file\" data-file-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["file"], "id", array()), "html", null, true);
            echo "\">
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t";
            // line 38
            echo $this->env->getExtension('font_awesome_extension')->fontAwesomeGenerator("file-pdf-o");
            echo "
\t\t\t\t\t\t\t<a class=\"pdf\" href=\"";
            // line 39
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ag_vault_file_preview", array("id" => $this->getAttribute($context["file"], "id", array()))), "html", null, true);
            echo "\" data-name>";
            echo twig_escape_filter($this->env, $this->getAttribute($context["file"], "name", array()), "html", null, true);
            echo "</a>
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td>";
            // line 41
            echo twig_escape_filter($this->env, $this->env->getExtension('fate_fr_extension')->dateFrGenerator($this->getAttribute($context["file"], "lastModified", array())), "html", null, true);
            echo "</td>
\t\t\t\t\t\t<td>";
            // line 42
            echo twig_escape_filter($this->env, $this->env->getExtension('size_reformat_extension')->sizeReformat($this->getAttribute($context["file"], "size", array())), "html", null, true);
            echo "</td>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t<div class=\"btn-group dropdown actions pull-right\">
\t\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-default dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
\t\t\t\t\t\t\t\t\t<span class=\"caret\"></span>
\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t<ul class=\"dropdown-menu\">
\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t<a href=\"";
            // line 50
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ag_vault_file_download", array("id" => $this->getAttribute($context["file"], "id", array()))), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t\t\t\t";
            // line 51
            echo $this->env->getExtension('font_awesome_extension')->fontAwesomeGenerator("download");
            echo " Télécharger
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 59
            echo "\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"text-center\" colspan=\"5\">
\t\t\t\t\t";
            // line 61
            if ((array_key_exists("search", $context) &&  !(null === (isset($context["search"]) ? $context["search"] : null)))) {
                // line 62
                echo "\t\t\t\t\t\tAucun résultat pour la recherche <em>";
                echo twig_escape_filter($this->env, (isset($context["search"]) ? $context["search"] : null), "html", null, true);
                echo "</em>.
\t\t\t\t\t";
            } else {
                // line 64
                echo "\t\t\t\t\t\tAntoine n'a partagé aucun fichier avec vous.
\t\t\t\t\t";
            }
            // line 66
            echo "\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['file'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 69
        echo "\t\t\t</table>
\t\t</div>
\t</div>
";
    }

    // line 74
    public function block_javascripts($context, array $blocks = array())
    {
        // line 75
        echo "\t";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
\t<script type=\"text/javascript\">
\t\t\$('.pdf').click(function (e) {
\t\t\te.preventDefault();

\t\t\t\$.fancybox({
\t\t\t\t'width' : '90%',
\t\t\t\t'height' : '90%',
\t\t\t\t'autoSize' : false,
\t\t\t\t'content': '<embed src=\"'+this.href+'#nameddest=self&page=1&view=FitH,0&zoom=80,0,0\" type=\"application/pdf\" height=\"99%\" width=\"100%\" />'
\t\t\t});
\t\t});
\t</script>
";
    }

    public function getTemplateName()
    {
        return "AGVaultBundle:Folder:showUser.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  174 => 75,  171 => 74,  164 => 69,  156 => 66,  152 => 64,  146 => 62,  144 => 61,  140 => 59,  127 => 51,  123 => 50,  112 => 42,  108 => 41,  101 => 39,  97 => 38,  91 => 36,  86 => 35,  76 => 27,  70 => 25,  64 => 23,  62 => 22,  50 => 17,  46 => 16,  32 => 4,  29 => 3,  11 => 1,);
    }
}
/* {% extends 'AGVaultBundle::layout.html.twig' %}*/
/* */
/* {% block ag_vault_content %}*/
/* 	<div class="row hidden-xs" id="vault">*/
/* 		<div class="col-md-2 text-center">*/
/* 			<div class="btn-group dropdown new">*/
/* 				<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" disabled>*/
/* 					Nouveau <span class="caret"></span>*/
/* 				</button>*/
/* 			</div>*/
/* 		</div>*/
/* 		<div class="col-md-10">*/
/* 			<div class="pull-right searchForm">*/
/* 				<form action="" method="GET">*/
/* 					<div class="input-group">*/
/* 						<span class="input-group-addon" id="addon1">{{ fa('search') }}</span>*/
/* 						<input type="text" class="form-control" placeholder="Recherche" name="s" aria-describedby="addon1" {% if search is defined and search is not null %}value="{{ search }}"{% endif %}>*/
/* 					</div>*/
/* 				</form>*/
/* 			</div>*/
/* 			<h2 style="margin-top: 0;">*/
/* 				{% if search is defined and search is not null %}*/
/* 					Résultat de la recherche : <em>{{ search }}</em>*/
/* 				{% else %}*/
/* 					{{ fa('lock') }} Mon Vault*/
/* 				{% endif %}*/
/* 			</h2>*/
/* 			<table class="table table-hover table-striped">*/
/* 				<tr>*/
/* 					<th>Nom</th>*/
/* 					<th>Dernière modification</th>*/
/* 					<th>Taille</th>*/
/* 					<th></th>*/
/* 				</tr>*/
/* 				{% for file in listFiles %}*/
/* 					<tr data-row="file" data-file-id="{{ file.id }}">*/
/* 						<td>*/
/* 							{{ fa('file-pdf-o') }}*/
/* 							<a class="pdf" href="{{ path('ag_vault_file_preview', { id:file.id }) }}" data-name>{{ file.name }}</a>*/
/* 						</td>*/
/* 						<td>{{ file.lastModified|date_fr }}</td>*/
/* 						<td>{{ file.size|size }}</td>*/
/* 						<td>*/
/* 							<div class="btn-group dropdown actions pull-right">*/
/* 								<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">*/
/* 									<span class="caret"></span>*/
/* 								</button>*/
/* 								<ul class="dropdown-menu">*/
/* 									<li>*/
/* 										<a href="{{ path('ag_vault_file_download', { id:file.id }) }}">*/
/* 											{{ fa('download') }} Télécharger*/
/* 										</a>*/
/* 									</li>*/
/* 								</ul>*/
/* 							</div>*/
/* 						</td>*/
/* 					</tr>*/
/* 				{% else %}*/
/* 					<tr>*/
/* 						<td class="text-center" colspan="5">*/
/* 					{% if search is defined and search is not null %}*/
/* 						Aucun résultat pour la recherche <em>{{ search }}</em>.*/
/* 					{% else %}*/
/* 						Antoine n'a partagé aucun fichier avec vous.*/
/* 					{% endif %}*/
/* 						</td>*/
/* 					</tr>*/
/* 				{% endfor %}*/
/* 			</table>*/
/* 		</div>*/
/* 	</div>*/
/* {% endblock %}*/
/* */
/* {% block javascripts %}*/
/* 	{{ parent() }}*/
/* 	<script type="text/javascript">*/
/* 		$('.pdf').click(function (e) {*/
/* 			e.preventDefault();*/
/* */
/* 			$.fancybox({*/
/* 				'width' : '90%',*/
/* 				'height' : '90%',*/
/* 				'autoSize' : false,*/
/* 				'content': '<embed src="'+this.href+'#nameddest=self&page=1&view=FitH,0&zoom=80,0,0" type="application/pdf" height="99%" width="100%" />'*/
/* 			});*/
/* 		});*/
/* 	</script>*/
/* {% endblock %}*/
