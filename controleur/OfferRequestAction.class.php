<?php
require_once('./controleur/Action.interface.php');
require_once('/modele/OfferRequestDAO.class.php');


class OfferRequestAction implements Action {
	public function execute(){
		
		if (!ISSET($_SESSION)) session_start();
		
		if (!ISSET($_SESSION["connected"])){  
		return "login";  
		}
		else{
			
				$dao = new OfferRequestDAO();
				date_default_timezone_set("America/Toronto");
			
				$date = date('Y-m-d H:i:s');
			
				$offerRequest = new OfferRequest();
				$offerRequest->setStatus($_SESSION["status"]);
				$offerRequest->setDateOffer($date);
				$offerRequest->setComment("Awaiting");
				$offerRequest->setIdMember($_SESSION["idMember"]);
				$offerRequest->setIdRequest($_SESSION["IDRequest"]);
				$dao->create($offerRequest);
		
			return "offerRequest";
		}
					
		
	}
}
