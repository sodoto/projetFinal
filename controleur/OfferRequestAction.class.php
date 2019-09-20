<?php
require_once('./controleur/Action.interface.php');
require_once('/modele/OfferRequestDAO.class.php');
require_once('./modele/MessageDAO.class.php');

class OfferRequestAction implements Action {
	public function execute(){
		if (!ISSET($_SESSION)) session_start();
		
		if (!ISSET($_SESSION["connected"])){  
		return "login";  
		}
		else{
	
			if (isset($_REQUEST['message']) && isset($_REQUEST['status'])&& isset($_REQUEST['idMember'])){
				
				$message=($_POST['message']);
				$status=($_POST['status']);
				$idMember=($_POST['idMember']);
				
				$dao = new OfferRequestDAO();
				date_default_timezone_set("America/Toronto");
			
				$date = date('Y-m-d H:i:s');
			
				$offerRequest = new OfferRequest();
				$offerRequest->setStatus($status);
				$offerRequest->setDateOffer($date);
				$offerRequest->setComment("Text");
				$offerRequest->setIdMember($idMember);
				$offerRequest->setIdRequest($_SESSION["IDRequest"]);
				$dao->create($offerRequest);
				
				$daoMe = new MessageDAO();
				
				$message=new Message();
				
			
			}
			
			
			return "offerRequest";
		}
					
		
	}
}
