<?php
// -- Contrôleur frontal --
require_once('/controleur/ActionBuilder.class.php');
require_once('./controleur/RequirePRGAction.interface.php');
	$action = NULL;
	$vue = NULL;
	if (ISSET($_REQUEST["action"]))
	{
		$action = ActionBuilder::getAction($_REQUEST["action"]);
		$vue = $action->execute();
	}
	else	
	{
		$action = ActionBuilder::getAction("");
		$vue = $action->execute();
	}

	if ($action instanceof RequirePRGAction)
	{
		header("Location: ?action=".$vue);
	}
	else
	{
		include_once('vues/'.$vue.'.php');
	}
?>
