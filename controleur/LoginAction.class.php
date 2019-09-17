<?php
require_once('./controleur/Action.interface.php');
class LoginAction implements Action {
	public function execute(){
		if (!ISSET($_REQUEST["email"]))
			return "login";
		if (!$this->valide())
		{
			//$_REQUEST["global_message"] = "Le formulaire contient des erreurs. Veuillez les corriger.";	
			return "login";
		}

		require_once('/modele/UserDAO.class.php');
		$udao = new UserDAO();
		$user = $udao->find($_REQUEST["email"]);
		if ($user == null)
			{
				$_REQUEST["field_messages"]["email"] = "Utilisateur inexistant.";	
				return "login";
			}
		else if ($user->getPassword() != $_REQUEST["password"])
			{
				$_REQUEST["field_messages"]["password"] = "Mot de passe incorrect.";	
				return "login";
			}
		if (!ISSET($_SESSION)) session_start();
		$_SESSION["connected"] = $_REQUEST["email"];
		return "afficher";
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