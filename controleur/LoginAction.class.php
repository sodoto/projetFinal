<?php
require_once('./controleur/Action.interface.php');

class LoginAction implements Action {
	public function execute(){
		if (!ISSET($_SESSION))
		{
			session_start();
		}
		if(ISSET($_SESSION["connected"])){
			return "default";
			echo $_SESSION["connected"];
		}
		if (!ISSET($_REQUEST["email"])){
			return "login";
		}
		if (!$this->valide())
		{
			//$_REQUEST["global_message"] = "Le formulaire contient des erreurs. Veuillez les corriger.";	
			return "login";
		}

		require_once('/modele/MemberDAO.class.php');
		$mdao = new MemberDAO();
		$member = $mdao->findByEmailOrUsername($_REQUEST["email"]);
		if ($member == null)
			{
				$_REQUEST["field_messages"]["email"] = "Utilisateur inexistant.";	
				return "login";
			}
		else if ($member->getPassword() != $_REQUEST["password"])
			{
				$_REQUEST["field_messages"]["password"] = "Mot de passe incorrect.";	
				return "login";
			}

		$_SESSION["connected"] = $_REQUEST["email"];
		$_SESSION["idMember"] = $member->getIdMember();
		$_SESSION["photoMember"] = $member->getPhoto();
		$_SESSION["nameMember"] = $member->getFirstName()." ".$member->getLastName();
		$_SESSION["erreurRequest"] = false;
		$_SESSION["userName"]=$member->getUsername();
		return "default";
	}
	
	public function valide()
	{
		$result = true;
		if ($_REQUEST['email'] == "")
		{
			$_REQUEST["field_messages"]["email"] = "Donnez votre nom d'utilisateur";
			$result = false;
		}	
		if ($_REQUEST['password'] == "")
		{
			$_REQUEST["field_messages"]["password"] = "Mot de passe obligatoire";
			$result = false;
		}	
		return $result;
	}
}
?>