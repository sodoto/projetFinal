<?php
require_once('./controleur/Action.interface.php');
class AfficherAction implements Action {
	public function execute(){
		if (!ISSET($_SESSION)) session_start();
		if (!ISSET($_SESSION["connected"]))	//utilisateur non connected.
			//return "login";//si hay login v a mostrar de lo contrario va a indice
		return "afficherRequest";
	}
}