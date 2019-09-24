<?php
require_once('./controleur/Action.interface.php');
require_once('/modele/OfferRequestDAO.class.php');


class OfferRequestAction implements Action {
	public function execute(){
		
		if (!ISSET($_SESSION)) {
			session_start();
			
		}
		
		if (!ISSET($_SESSION["connected"])){  
		return "login";  
		}else{

				return "offerRequest";
				
		}
					
		
	}
}
