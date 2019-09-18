<?php
require_once('./controleur/Action.interface.php');
class MyRequestAction implements Action {
	public function execute(){
		if (!ISSET($_SESSION)) session_start();
		
		if (!ISSET($_SESSION["connected"])){  //utilisateur non connected.
			return "login";  //si hay login v a mostrar de lo contrario va a indice
		}
		else{
			return "myRequest";
		}
					
		
	}
}