<?php

/* AGVaultBundle:Folder:modals.html.twig */
class __TwigTemplate_525a5441322248f0c82e25aeb6e339fb324572ba03f273f0a500d6ac6041b477 extends Twig_Template
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
        // line 4
        echo "<div class=\"modal fade\" id=\"newFolderModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"newFolderModal\">
\t<div class=\"modal-dialog modal-md\">
\t\t<div class=\"modal-content\">
\t\t\t<div class=\"modal-header\">
\t\t\t\t<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
\t\t\t\t<h4>";
        // line 9
        echo $this->env->getExtension('font_awesome_extension')->fontAwesomeGenerator("folder");
        echo " Nouveau dossier</h4>
\t\t\t</div>
\t\t\t<div class=\"modal-body\">
\t\t\t\t<div class=\"container-fluid\">
\t\t\t\t\t";
        // line 13
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["formFolder"]) ? $context["formFolder"] : null), 'form');
        echo "
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
</div>
";
        // line 20
        echo "
";
        // line 24
        echo "<div class=\"modal fade\" id=\"newFileModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"newFileModal\">
\t<div class=\"modal-dialog modal-md\">
\t\t<div class=\"modal-content\">
\t\t\t<div class=\"modal-header\">
\t\t\t\t<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
\t\t\t\t<h4>";
        // line 29
        echo $this->env->getExtension('font_awesome_extension')->fontAwesomeGenerator("file");
        echo " Nouveau fichier</h4>
\t\t\t</div>
\t\t\t<div class=\"modal-body\">
\t\t\t\t<div class=\"container-fluid\">
\t\t\t\t\t";
        // line 33
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["formFile"]) ? $context["formFile"] : null), 'form');
        echo "
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
</div>
";
        // line 40
        echo "
";
        // line 44
        echo "<div class=\"modal fade\" id=\"renameModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"renameModal\">
\t<div class=\"modal-dialog modal-md\">
\t\t<div class=\"modal-content\">
\t\t\t<div class=\"modal-header\">
\t\t\t\t<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
\t\t\t\t<h4>";
        // line 49
        echo $this->env->getExtension('font_awesome_extension')->fontAwesomeGenerator("edit");
        echo " Renommer dossier/fichier</h4>
\t\t\t</div>
\t\t\t<div class=\"modal-body\">
\t\t\t\t<div class=\"container-fluid\">
\t\t\t\t\t<form action=\"\" method=\"post\">
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<label class=\"control-label required\" for=\"newName\">Nom</label>
\t\t\t\t\t\t\t<input class=\"form-control\" id=\"newName\" type=\"text\" required=\"required\"/>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<button class=\"btn btn-primary\" type=\"submit\">
\t\t\t\t\t\t\t\tRenommer
\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t</div>
\t\t\t\t\t</form>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
</div>
";
        // line 70
        echo "
";
        // line 74
        echo "<div class=\"modal fade\" id=\"fileDetailsModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"fileDetailsModal\">
\t<div class=\"modal-dialog modal-md\">
\t\t<div class=\"modal-content\">
\t\t\t<div class=\"modal-header\">
\t\t\t\t<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
\t\t\t\t<h4>";
        // line 79
        echo $this->env->getExtension('font_awesome_extension')->fontAwesomeGenerator("bar-chart");
        echo " Détails du fichier <span class=\"filename\"></span></h4>
\t\t\t</div>
\t\t\t<div class=\"modal-body\">
\t\t\t\t<div class=\"container-fluid\">
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
</div>
";
        // line 89
        echo "
";
        // line 93
        echo "<div class=\"modal fade\" id=\"shareLinkModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"shareLinkModal\">
\t<div class=\"modal-dialog modal-md\">
\t\t<div class=\"modal-content\">
\t\t\t<div class=\"modal-header\">
\t\t\t\t<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
\t\t\t\t<h4>";
        // line 98
        echo $this->env->getExtension('font_awesome_extension')->fontAwesomeGenerator("share-alt");
        echo " Génération du lien de partage pour <span class=\"filename\"></span></h4>
\t\t\t</div>
\t\t\t<div class=\"modal-body\">
\t\t\t\t<div class=\"container-fluid\">
\t\t\t\t\t<label for=\"shareLink\">Lien</label>
\t\t\t\t\t<div class=\"loader\">
\t\t\t\t\t\t<span></span><span></span><span></span>
\t\t\t\t\t</div>
\t\t\t\t\t<input id=\"shareLink\" type=\"text\">
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
</div>";
    }

    public function getTemplateName()
    {
        return "AGVaultBundle:Folder:modals.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  133 => 98,  126 => 93,  123 => 89,  111 => 79,  104 => 74,  101 => 70,  78 => 49,  71 => 44,  68 => 40,  59 => 33,  52 => 29,  45 => 24,  42 => 20,  33 => 13,  26 => 9,  19 => 4,);
    }
}
/* {#*/
/* 	Modal box for new folder form*/
/* #}*/
/* <div class="modal fade" id="newFolderModal" tabindex="-1" role="dialog" aria-labelledby="newFolderModal">*/
/* 	<div class="modal-dialog modal-md">*/
/* 		<div class="modal-content">*/
/* 			<div class="modal-header">*/
/* 				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>*/
/* 				<h4>{{ fa('folder') }} Nouveau dossier</h4>*/
/* 			</div>*/
/* 			<div class="modal-body">*/
/* 				<div class="container-fluid">*/
/* 					{{ form(formFolder) }}*/
/* 				</div>*/
/* 			</div>*/
/* 		</div>*/
/* 	</div>*/
/* </div>*/
/* {# End modal #}*/
/* */
/* {#*/
/* 	Modal box for new file form*/
/* #}*/
/* <div class="modal fade" id="newFileModal" tabindex="-1" role="dialog" aria-labelledby="newFileModal">*/
/* 	<div class="modal-dialog modal-md">*/
/* 		<div class="modal-content">*/
/* 			<div class="modal-header">*/
/* 				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>*/
/* 				<h4>{{ fa('file') }} Nouveau fichier</h4>*/
/* 			</div>*/
/* 			<div class="modal-body">*/
/* 				<div class="container-fluid">*/
/* 					{{ form(formFile) }}*/
/* 				</div>*/
/* 			</div>*/
/* 		</div>*/
/* 	</div>*/
/* </div>*/
/* {# End modal #}*/
/* */
/* {#*/
/* 	Modal box for renaming folders*/
/* #}*/
/* <div class="modal fade" id="renameModal" tabindex="-1" role="dialog" aria-labelledby="renameModal">*/
/* 	<div class="modal-dialog modal-md">*/
/* 		<div class="modal-content">*/
/* 			<div class="modal-header">*/
/* 				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>*/
/* 				<h4>{{ fa('edit') }} Renommer dossier/fichier</h4>*/
/* 			</div>*/
/* 			<div class="modal-body">*/
/* 				<div class="container-fluid">*/
/* 					<form action="" method="post">*/
/* 						<div class="form-group">*/
/* 							<label class="control-label required" for="newName">Nom</label>*/
/* 							<input class="form-control" id="newName" type="text" required="required"/>*/
/* 						</div>*/
/* 						<div class="form-group">*/
/* 							<button class="btn btn-primary" type="submit">*/
/* 								Renommer*/
/* 							</button>*/
/* 						</div>*/
/* 					</form>*/
/* 				</div>*/
/* 			</div>*/
/* 		</div>*/
/* 	</div>*/
/* </div>*/
/* {# End modal #}*/
/* */
/* {#*/
/* 	Modal box for file details*/
/* #}*/
/* <div class="modal fade" id="fileDetailsModal" tabindex="-1" role="dialog" aria-labelledby="fileDetailsModal">*/
/* 	<div class="modal-dialog modal-md">*/
/* 		<div class="modal-content">*/
/* 			<div class="modal-header">*/
/* 				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>*/
/* 				<h4>{{ fa('bar-chart') }} Détails du fichier <span class="filename"></span></h4>*/
/* 			</div>*/
/* 			<div class="modal-body">*/
/* 				<div class="container-fluid">*/
/* 				</div>*/
/* 			</div>*/
/* 		</div>*/
/* 	</div>*/
/* </div>*/
/* {# End modal #}*/
/* */
/* {#*/
/* 	Modal for generating share link*/
/* #}*/
/* <div class="modal fade" id="shareLinkModal" tabindex="-1" role="dialog" aria-labelledby="shareLinkModal">*/
/* 	<div class="modal-dialog modal-md">*/
/* 		<div class="modal-content">*/
/* 			<div class="modal-header">*/
/* 				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>*/
/* 				<h4>{{ fa('share-alt') }} Génération du lien de partage pour <span class="filename"></span></h4>*/
/* 			</div>*/
/* 			<div class="modal-body">*/
/* 				<div class="container-fluid">*/
/* 					<label for="shareLink">Lien</label>*/
/* 					<div class="loader">*/
/* 						<span></span><span></span><span></span>*/
/* 					</div>*/
/* 					<input id="shareLink" type="text">*/
/* 				</div>*/
/* 			</div>*/
/* 		</div>*/
/* 	</div>*/
/* </div>*/
