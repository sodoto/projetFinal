<?php
require_once('/controleur/DefaultAction.class.php');
require_once('/controleur/LoginAction.class.php');
require_once('/controleur/LogoutAction.class.php');
class ActionBuilder{
	public static function getAction($nomAction){
		switch ($nomAction)
		{
			case "connecter" :
				return new LoginAction();
				break; 
			case "deconnecter" :
				return new LogoutAction();
				break; 
			case "afficher" :
				return new AfficherAction();
				break; 
			default :
				return new DefaultAction();
		}
	}
}
?>
