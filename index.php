<?php
// -- Contrôleur frontal --
require_once('/controleur/ActionBuilder.class.php');
if (ISSET($_REQUEST["action"]))
	{
		//$vue = ActionBuilder::getAction($_REQUEST["action"])->execute();
		/*
		Ou :*/
		$actionDemandee = $_REQUEST["action"];
		$controleur = ActionBuilder::getAction($actionDemandee);
		$vue = $controleur->execute();
		/**/
	}
else	
	{
		$action = ActionBuilder::getAction("");
		$vue = $action->execute();
	}
// On affiche la page (vue)
include_once('vues/'.$vue.'.php');
?>
