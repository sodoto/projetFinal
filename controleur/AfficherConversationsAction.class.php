<?php
require_once('./controleur/Action.interface.php');
require_once('/modele/MessageDAO.class.php');


class AfficherConversationsAction implements Action {
	public function execute(){
		
		if (!ISSET($_SESSION)) {
			session_start();
			
		}
		
		if (!ISSET($_SESSION["connected"])){  
		return "login";  
		}else{

				return "afficherConversations";
				
		}
					
		
	}
}
