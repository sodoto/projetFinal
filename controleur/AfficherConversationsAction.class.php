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
					
						
					if(isset($_REQUEST['message'])) {
						
						$idMember="";
						$idMember=isset($_SESSION['idMember'])?$_SESSION['idMember']:'';

						$daoMe = new MessageDAO();			
						date_default_timezone_set("America/Toronto");
					
						$date = date('Y-m-d H:i:s');

						$message=new Message();
						$message->setMessage($_REQUEST['message']);
						$message->setIdRequest($_SESSION["IdRequest"]);
						$message->setIdMember($idMember);
						$message->setIdRecepteur($_SESSION["idRecepteur"]);
						$message->setDateHeure($date);
						$message->setMessageLu("No");
						
						$daoMe->insert($message); //Enviar mensaje
				

						
			}	
			
				return "afficherConversations";	
		}
					
		
	}
}
