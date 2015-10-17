<?php

/* AGUserBundle:Admin:form.html.twig */
class __TwigTemplate_90dae80c51c8e49a9944b581ab1dac5ea5c38bdeb26c8cd7b65df985c4a7928f extends Twig_Template
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
        $this->env->getExtension('form')->renderer->setTheme((isset($context["form"]) ? $context["form"] : null), array(0 => "bootstrap_3_horizontal_layout.html.twig"));
        // line 2
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : null), 'form');
        echo "
";
    }

    public function getTemplateName()
    {
        return "AGUserBundle:Admin:form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  21 => 2,  19 => 1,);
    }
}
/* {% form_theme form 'bootstrap_3_horizontal_layout.html.twig' %}*/
/* {{ form(form) }}*/
/* */
