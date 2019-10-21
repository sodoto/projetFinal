<?php
require_once('./controleur/Action.interface.php');
class AfficherRequestAction implements Action {
	public function execute(){
		if (!ISSET($_SESSION)) session_start();
		
		if (!ISSET($_SESSION["connected"])){  //ici on peut bloquer que quelqu'un qui n'est pas enregistré puisse voir les requêtes
			return "login";  
		}
		else{
			if(ISSET($_REQUEST["search"]))
			{
				$_SESSION["searchKeyword"] = $_REQUEST["searchKeyword"];
				return "afficherRequest";
			}
			return "afficherRequest";
		}
					
		
	}
}
