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
		
			$offerRequest = new OfferRequest();
			$offerRequest->setStatus($_REQUEST['status']);
			$offerRequest->setDateOffer(date("Y/m/d"));
			$offerRequest->setComment("Text");
			$offerRequest->setIdMember($_REQUEST['idMember']);
			$offerRequest->setIdRequest($_REQUEST['idRequest']);
			$dao->create($offerRequest);
			
			return "offerRequest";
		}
					
		
	}
}
