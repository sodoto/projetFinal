<?php
require_once('/controleur/AfficherRequestAction.class.php');
require_once('/controleur/DefaultAction.class.php');
require_once('/controleur/LoginAction.class.php');
require_once('/controleur/LogoutAction.class.php');
require_once('/controleur/SigninAction.class.php');
require_once('/controleur/MyRequestAction.class.php');
require_once('/controleur/MemberSkillsAction.class.php');
require_once('/controleur/OfferRequestAction.class.php');
require_once('/controleur/MessageAction.class.php');
require_once('/controleur/EditRequestAction.class.php');
require_once('/controleur/NewRequestAction.class.php');
require_once('/controleur/MyOfferRequestAction.class.php');
require_once('/controleur/MySkillsAction.class.php');
require_once('/controleur/AfficherMessagesAction.class.php');
require_once('/controleur/AfficherConversationsAction.class.php');

class ActionBuilder{
	public static function getAction($nomAction){
		switch ($nomAction)
		{
			case "mesOffres" :
				return new MyOfferRequestAction();
				break;
			case "newRequest" :
				return new NewRequestAction();
				break;
			case "editRequest" :
				return new EditRequestAction();
				break;
			case "connecter" :
				return new LoginAction();
				break; 
			case "signin" :
				return new SigninAction();
				break;
			case "memberSkills" :
				return new MemberSkillsAction();
				break; 				
			case "deconnecter" :
				return new LogoutAction();
				break; 
			case "afficherRequest" :
				return new AfficherRequestAction();
				break;
			case "mesDemandes" :
				return new myRequestAction();
				break;
			case "offerRequest" :
				return new OfferRequestAction();
				break;	
			case "messageEnvoye" :
				return new MessageAction();
				break;	
			case "mySkills" :
				return new MySkillsAction();
				break;	
			case "afficherMessages" :
				return new AfficherMessagesAction();
				break;	
			case "afficherConversations" :
				return new AfficherConversationsAction();
				break;			
			default :
				return new DefaultAction();
		}
	}
}
?>
