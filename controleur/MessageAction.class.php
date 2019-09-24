<?php
require_once('./controleur/Action.interface.php');
require_once('./modele/MessageDAO.class.php');
require_once('/modele/OfferRequestDAO.class.php');
require_once('./modele/MemberDAO.class.php');

class MessageAction implements Action {
	
	
	public function execute(){
		
		if (!ISSET($_SESSION)) {
			session_start();
			$status="";
			$status=isset($_SESSION['status'])?$_SESSION['status']:'';
			$IDRequest="";
			$IDRequest=isset($_SESSION['IDRequest'])?$_SESSION['IDRequest']:'';
			$idMember="";
			$idMember=isset($_SESSION['idMember'])?$_SESSION['idMember']:'';
		}
		
		if (!ISSET($_SESSION["connected"])){  
		return "login";  
		}
		else{
			
			if (isset($_REQUEST['message'])){
				
			
				$daoMe = new MessageDAO();			
				date_default_timezone_set("America/Toronto");
			
				$date = date('Y-m-d H:i:s');

				$message=new Message();
				$message->setMessage($_REQUEST['message']);
				$message->setIdRequest($_SESSION["IDRequest"]);
				$message->setIdMember($_SESSION["idMember"]);
				$message->setDateHeure($date);	
				$daoMe->insert($message);


				$daoMail= new MemberDAO();
			
				$daoMail->findEmailById($_SESSION["idMember"]);
			/*	
				echo $mess;
				
			
				$msg = wordwrap($_REQUEST['message'],70);
				
				mail("someone@example.com","SOSvite sent you a message from",$msg);

*/
				$dao = new OfferRequestDAO();
				date_default_timezone_set("America/Toronto");
			
				$date = date('Y-m-d H:i:s');
			
				$offerRequest = new OfferRequest();
				$offerRequest->setStatus("Message d'adie envoye");
				$offerRequest->setDateOffer($date);
				$offerRequest->setComment("Awaiting");
				$offerRequest->setIdMember($idMember);
				$offerRequest->setIdRequest($IDRequest);
				$dao->create($offerRequest);
			}
			
			return "messageEnvoye";
			
		}
					
		
	}
}
