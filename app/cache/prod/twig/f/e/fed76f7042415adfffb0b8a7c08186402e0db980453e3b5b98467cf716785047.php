<?php

/* ::base.html.twig */
class __TwigTemplate_ab34f32bdfab62e88e091e42f1e30f7584c7d87818575fb593fd7bb3cbd2df26 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'navbar' => array($this, 'block_navbar'),
            'flashbag' => array($this, 'block_flashbag'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>My Vault</title>
\t    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, maximum-scale=1\">
\t    <meta name=\"mobile-web-app-capable\" content=\"yes\">
\t    <meta name=\"apple-mobile-web-app-capable\" content=\"yes\">
\t    <link rel=\"manifest\" href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("manifest.json"), "html", null, true);
        echo "\">
\t    <link rel=\"icon\" sizes=\"192x192\" href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("img/apple-icon-192x192.png"), "html", null, true);
        echo "\" />
\t    <link rel=\"apple-touch-icon\" sizes=\"192x192\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("img/apple-icon-192x192.png"), "html", null, true);
        echo "\" />
        ";
        // line 12
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 22
        echo "        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>
        ";
        // line 25
        $this->displayBlock('navbar', $context, $blocks);
        // line 28
        echo "        <div class=\"container\">
\t        ";
        // line 29
        $this->displayBlock('flashbag', $context, $blocks);
        // line 41
        echo "\t        ";
        $this->displayBlock('body', $context, $blocks);
        // line 42
        echo "        </div>
        ";
        // line 43
        $this->displayBlock('javascripts', $context, $blocks);
        // line 47
        echo "    </body>
</html>
";
    }

    // line 12
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 13
        echo "\t        <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css\">
\t        ";
        // line 15
        echo "\t        ";
        // line 16
        echo "\t        ";
        // line 17
        echo "\t        <link href=\"//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css\" rel=\"stylesheet\">
\t        <link rel=\"stylesheet\" href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("css/jquery.fancybox.css"), "html", null, true);
        echo "\"/>
\t        <link rel=\"stylesheet\" href=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("css/style.css"), "html", null, true);
        echo "\"/>
\t        <link rel=\"stylesheet\" href=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("css/responsive.css"), "html", null, true);
        echo "\"/>
        ";
    }

    // line 25
    public function block_navbar($context, array $blocks = array())
    {
        // line 26
        echo "\t        ";
        $this->loadTemplate("::nav.html.twig", "::base.html.twig", 26)->display($context);
        // line 27
        echo "        ";
    }

    // line 29
    public function block_flashbag($context, array $blocks = array())
    {
        // line 30
        echo "\t\t        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "flashbag", array()), "all", array()));
        foreach ($context['_seq'] as $context["label"] => $context["flashes"]) {
            // line 31
            echo "\t\t\t        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["flashes"]);
            foreach ($context['_seq'] as $context["_key"] => $context["flash"]) {
                // line 32
                echo "\t\t\t\t        <div class=\"alert alert-";
                echo twig_escape_filter($this->env, $context["label"], "html", null, true);
                echo " alert-dismissible fade in\" role=\"alert\">
\t\t\t\t\t        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
\t\t\t\t\t\t        <span aria-hidden=\"true\">&times;</span>
\t\t\t\t\t        </button>
\t\t\t\t\t        ";
                // line 36
                echo twig_escape_filter($this->env, $context["flash"], "html", null, true);
                echo "
\t\t\t\t        </div>
\t\t\t        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flash'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 39
            echo "\t\t        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['label'], $context['flashes'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 40
        echo "\t        ";
    }

    // line 41
    public function block_body($context, array $blocks = array())
    {
    }

    // line 43
    public function block_javascripts($context, array $blocks = array())
    {
        // line 44
        echo "\t        <script src=\"//code.jquery.com/jquery-1.11.3.min.js\"></script>
\t        <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js\"></script>
        ";
    }

    public function getTemplateName()
    {
        return "::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  161 => 44,  158 => 43,  153 => 41,  149 => 40,  143 => 39,  134 => 36,  126 => 32,  121 => 31,  116 => 30,  113 => 29,  109 => 27,  106 => 26,  103 => 25,  97 => 20,  93 => 19,  89 => 18,  86 => 17,  84 => 16,  82 => 15,  79 => 13,  76 => 12,  70 => 47,  68 => 43,  65 => 42,  62 => 41,  60 => 29,  57 => 28,  55 => 25,  48 => 22,  46 => 12,  42 => 11,  38 => 10,  34 => 9,  24 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/*     <head>*/
/*         <meta charset="UTF-8" />*/
/*         <title>My Vault</title>*/
/* 	    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">*/
/* 	    <meta name="mobile-web-app-capable" content="yes">*/
/* 	    <meta name="apple-mobile-web-app-capable" content="yes">*/
/* 	    <link rel="manifest" href="{{ asset('manifest.json') }}">*/
/* 	    <link rel="icon" sizes="192x192" href="{{ asset('img/apple-icon-192x192.png') }}" />*/
/* 	    <link rel="apple-touch-icon" sizes="192x192" href="{{ asset('img/apple-icon-192x192.png') }}" />*/
/*         {% block stylesheets %}*/
/* 	        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">*/
/* 	        {#<link href="{{ asset('cdn/bootstrap-paper.min.css') }}" rel="stylesheet"/>#}*/
/* 	        {#<link href="{{ asset('cdn/bootstrap-yeti.min.css') }}" rel="stylesheet"/>#}*/
/* 	        {#<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/lumen/bootstrap.min.css"/>#}*/
/* 	        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">*/
/* 	        <link rel="stylesheet" href="{{ asset('css/jquery.fancybox.css') }}"/>*/
/* 	        <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>*/
/* 	        <link rel="stylesheet" href="{{ asset('css/responsive.css') }}"/>*/
/*         {% endblock %}*/
/*         <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />*/
/*     </head>*/
/*     <body>*/
/*         {% block navbar %}*/
/* 	        {% include '::nav.html.twig' %}*/
/*         {% endblock %}*/
/*         <div class="container">*/
/* 	        {% block flashbag %}*/
/* 		        {% for label, flashes in app.session.flashbag.all %}*/
/* 			        {% for flash in flashes %}*/
/* 				        <div class="alert alert-{{ label }} alert-dismissible fade in" role="alert">*/
/* 					        <button type="button" class="close" data-dismiss="alert" aria-label="Close">*/
/* 						        <span aria-hidden="true">&times;</span>*/
/* 					        </button>*/
/* 					        {{ flash }}*/
/* 				        </div>*/
/* 			        {% endfor %}*/
/* 		        {% endfor %}*/
/* 	        {% endblock %}*/
/* 	        {% block body %}{% endblock %}*/
/*         </div>*/
/*         {% block javascripts %}*/
/* 	        <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>*/
/* 	        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>*/
/*         {% endblock %}*/
/*     </body>*/
/* </html>*/
/* */
