<?php
require_once('./controleur/Action.interface.php');
require_once('/modele/RequestDAO.class.php');
require_once('/modele/RequestPhotosDAO.class.php');
require_once('/modele/classes/Request.class.php');
require_once('./controleur/RequirePRGAction.interface.php');

date_default_timezone_set('America/Toronto');

class AfficherNewRequestAction implements Action {
    public function execute(){
        if(!ISSET($_SESSION))
        {
            session_start();
        }
        if(!ISSET($_SESSION["connected"]))
        {
			return "default";
        }
			return "newRequest";

    }

}	
	