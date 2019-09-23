<?php
require_once('./controleur/Action.interface.php');
require_once('./modele/MessageDAO.class.php');

class MessageAction implements Action {
	
	
	public function execute(){
		
		if (!ISSET($_SESSION)) session_start();
		
		if (!ISSET($_SESSION["connected"])){  
		return "login";  
		}
		else{
			
			if (isset($_REQUEST['message'])){
				
				$message=$_REQUEST['message'];
				echo $message;
			
				$daoMe = new MessageDAO();			
				date_default_timezone_set("America/Toronto");
			
				$date = date('Y-m-d H:i:s');

				$message=new Message();
				$message->setMessage($_REQUEST['message']);
				$message->setIdRequest($_SESSION["IDRequest"]);
				$message->setIdMember($_SESSION["idMember"]);
				$message->setDateHeure($date);	
				$daoMe->insert($message);

			
			}
			
			return "afficherRequest";
			
		}
					
		
	}
}
