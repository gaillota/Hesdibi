<?php

/* AGVaultBundle:File:details.html.twig */
class __TwigTemplate_60661454cb31584d72b5d7eeedb4bd67f721a8697bbf0cabefaef44d97288a9b extends Twig_Template
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
        ob_start();
        // line 2
        echo "\t<div class=\"panel panel-info\">
\t\t<div class=\"panel-body\">
\t\t\t<p><strong>Nom</strong> : ";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "name", array()), "html", null, true);
        echo "</p>
\t\t\t<p><strong>Taille</strong> : ";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('size_reformat_extension')->sizeReformat($this->getAttribute((isset($context["file"]) ? $context["file"] : null), "size", array())), "html", null, true);
        echo "</p>
\t\t\t<p><strong>Propriétaire</strong> : ";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "owner", array()), "html", null, true);
        echo "</p>
\t\t\t<p><strong>Dernière modification</strong> : ";
        // line 7
        echo twig_escape_filter($this->env, (($this->env->getExtension('fate_fr_extension')->dateFrGenerator($this->getAttribute((isset($context["file"]) ? $context["file"] : null), "lastModified", array())) . " ") . twig_date_format_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "lastModified", array()), "à H:i")), "html", null, true);
        echo "</p>
\t\t</div>

\t\t";
        // line 11
        echo "\t\t<ul class=\"list-group\">
\t\t\t<li class=\"list-group-item\">
\t\t\t\t<h4>";
        // line 13
        echo $this->env->getExtension('font_awesome_extension')->fontAwesomeGenerator("envelope");
        echo " Liste d'envoi</h4>
\t\t\t\t";
        // line 14
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["file"]) ? $context["file"] : null), "sendTo", array()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["send"]) {
            // line 15
            echo "\t\t\t\t\t<p class=\"small\">";
            echo twig_escape_filter($this->env, (($this->getAttribute($context["send"], 0, array()) . " - ") . $this->env->getExtension('fate_fr_extension')->dateFrGenerator($this->getAttribute($context["send"], 1, array()))), "html", null, true);
            echo " à ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["send"], 1, array()), "H:i"), "html", null, true);
            echo "</p>
\t\t\t\t";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 17
            echo "\t\t\t\t\t<p class=\"small\"><i>Aucun envoi</i></p>
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['send'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 19
        echo "\t\t\t</li>
\t\t\t<li class=\"list-group-item\">
\t\t\t\t<h4>";
        // line 21
        echo $this->env->getExtension('font_awesome_extension')->fontAwesomeGenerator("share-alt");
        echo " Lien de partage</h4>
\t\t\t\t<ul>
\t\t\t\t\t";
        // line 23
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["file"]) ? $context["file"] : null), "shareLinks", array()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["shareLink"]) {
            // line 24
            echo "\t\t\t\t\t\t<li class=\"small\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ag_vault_file_show", array("token" => $this->getAttribute($context["shareLink"], "token", array()))), "html", null, true);
            echo "</li>
\t\t\t\t\t";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 26
            echo "\t\t\t\t\t\t<li class=\"small\">Aucun lien de partage</li>
\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['shareLink'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 28
        echo "\t\t\t\t</ul>
\t\t\t</li>
\t\t\t<li class=\"list-group-item\">
\t\t\t\t<h4>";
        // line 31
        echo $this->env->getExtension('font_awesome_extension')->fontAwesomeGenerator("users");
        echo " Partager avec</h4>
\t\t\t\t<ul>
\t\t\t\t\t";
        // line 33
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["file"]) ? $context["file"] : null), "authorizedUsers", array()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 34
            echo "\t\t\t\t\t\t<li class=\"small\">";
            echo twig_escape_filter($this->env, $context["user"], "html", null, true);
            echo "</li>
\t\t\t\t\t";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 36
            echo "\t\t\t\t\t\t<li class=\"small\">Partagé avec personne</li>
\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 38
        echo "\t\t\t\t</ul>
\t\t\t</li>
\t\t</ul>
\t</div>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "AGVaultBundle:File:details.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  132 => 38,  125 => 36,  117 => 34,  112 => 33,  107 => 31,  102 => 28,  95 => 26,  87 => 24,  82 => 23,  77 => 21,  73 => 19,  66 => 17,  56 => 15,  51 => 14,  47 => 13,  43 => 11,  37 => 7,  33 => 6,  29 => 5,  25 => 4,  21 => 2,  19 => 1,);
    }
}
/* {% spaceless %}*/
/* 	<div class="panel panel-info">*/
/* 		<div class="panel-body">*/
/* 			<p><strong>Nom</strong> : {{ file.name }}</p>*/
/* 			<p><strong>Taille</strong> : {{ file.size|size }}</p>*/
/* 			<p><strong>Propriétaire</strong> : {{ file.owner }}</p>*/
/* 			<p><strong>Dernière modification</strong> : {{ file.lastModified|date_fr ~ ' ' ~ file.lastModified|date("\à H:i") }}</p>*/
/* 		</div>*/
/* */
/* 		{# List group #}*/
/* 		<ul class="list-group">*/
/* 			<li class="list-group-item">*/
/* 				<h4>{{ fa('envelope') }} Liste d'envoi</h4>*/
/* 				{% for send in file.sendTo %}*/
/* 					<p class="small">{{ send.0 ~ ' - ' ~ send.1|date_fr }} à {{ send.1|date('H:i') }}</p>*/
/* 				{% else %}*/
/* 					<p class="small"><i>Aucun envoi</i></p>*/
/* 				{% endfor %}*/
/* 			</li>*/
/* 			<li class="list-group-item">*/
/* 				<h4>{{ fa('share-alt') }} Lien de partage</h4>*/
/* 				<ul>*/
/* 					{% for shareLink in file.shareLinks %}*/
/* 						<li class="small">{{ path('ag_vault_file_show', { token:shareLink.token }) }}</li>*/
/* 					{% else %}*/
/* 						<li class="small">Aucun lien de partage</li>*/
/* 					{% endfor %}*/
/* 				</ul>*/
/* 			</li>*/
/* 			<li class="list-group-item">*/
/* 				<h4>{{ fa('users') }} Partager avec</h4>*/
/* 				<ul>*/
/* 					{% for user in file.authorizedUsers %}*/
/* 						<li class="small">{{ user }}</li>*/
/* 					{% else %}*/
/* 						<li class="small">Partagé avec personne</li>*/
/* 					{% endfor %}*/
/* 				</ul>*/
/* 			</li>*/
/* 		</ul>*/
/* 	</div>*/
/* {% endspaceless %}*/
