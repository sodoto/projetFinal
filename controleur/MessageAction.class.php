
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
			$idMember=isset($_SESSION['idMember'])?$_SESSION['idMember']:'';//Changer á Emetteur du message
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
				//falta poner el usuario que envia el mensaje - persona que quiere ayudar
				$message->setMessage($_REQUEST['message']);
				$message->setIdRequest($_SESSION["IDRequest"]);
				$message->setIdMemberEmetteur($_SESSION["idMember"]);//cambiar variable de ingreso idMembreEmeteur
				$message->setDateHeure($date);	
				$daoMe->insert($message);


				$dao = new OfferRequestDAO();
				date_default_timezone_set("America/Toronto");
			
				$date = date('Y-m-d H:i:s');
			
				$offerRequest = new OfferRequest();
				$offerRequest->setStatus("Message d'adie envoye");
				$offerRequest->setDateOffer($date);
				$offerRequest->setComment("Awaiting");
				//El id aca debe ser el de la persona que quiere ayudar
				$offerRequest->setIdMember($idMember); //idMembreEmeteur
				$offerRequest->setIdRequest($IDRequest);
				$dao->create($offerRequest);
				
				
				// $daoMail= new MemberDAO();
			
				// $mess=$daoMail->findEmailById($_SESSION["idMember"]);
				
				// $courriel= $mess->getEmail();
				// //echo $courriel;
				
				
				// $subject = 'Testing Sendmail';
				// $headers = 'From SOSVITE';
				
				// if(mail($courriel,$subject,$_REQUEST['message'],$headers)){
				// echo "email sent";
				// }
				// else{
				// echo "email sending failed";
				// }




			
			}
			
			return "messageEnvoye";
			
		}
					
		
	}
}
