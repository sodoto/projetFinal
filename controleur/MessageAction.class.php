
<?php
require_once('./controleur/Action.interface.php');
require_once('./modele/MessageDAO.class.php');
require_once('/modele/OfferRequestDAO.class.php');
require_once('./modele/MemberDAO.class.php');
require_once('./modele/RequestDAO.class.php');

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
			$idRecepteur="";
			$idRecepteur=isset($_SESSION['idRecepteur'])?$_SESSION['idRecepteur']:'';
		}
		
		if (!ISSET($_SESSION["connected"])){  
			return "login";  
		}
		else{
			if (isset($_REQUEST['message'])){
			
				$rdao = new RequestDAO();
				$request = $rdao->find($IDRequest);
				$ordao = new OfferRequestDAO();

				if($idMember == $request->getIdMember())
				{
					$_SESSION["erreurOfferRequest"] = true;
					return "offerRequest";
				}
				else
				{
					if($ordao->findByIdMemberIdRequest($idMember,$IDRequest) == NULL)
					{
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

						$lastOfferRequest = new OfferRequest();
						$lastOfferRequest = $dao->findLast();
						

						$daoMe = new MessageDAO();			
						date_default_timezone_set("America/Toronto");
					
						$date = date('Y-m-d H:i:s');

						$message=new Message();
						$message->setMessage($_REQUEST['message']);
						$message->setIdRequest($_SESSION["IDRequest"]);
						$message->setIdMember($_SESSION["idMember"]);
						$message->setIdRecepteur($_SESSION["idRecepteur"]);
						$message->setDateHeure($date);
						$message->setMessageLu("No");
						$message->setIdOffer($lastOfferRequest->getIdOffer());
						
						$daoMe->insert($message);
					}
					else
					{
						$_SESSION["erreurOfferRequestDouble"] = true;
						return "offerRequest";
					}
				}
			
			}
			
			return "messageEnvoye";
			
		}
					
		
	}
}
