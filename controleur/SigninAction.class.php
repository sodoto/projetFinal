<?php
require_once('./controleur/Action.interface.php');
class LoginAction implements Action {
	public function execute(){
		//esta instruccion hace que aparezca la pantalla de login en un principio
		if (!ISSET($_REQUEST["username"]))
			return "login";
		if (!$this->valide())
		{
			//$_REQUEST["global_message"] = "Le formulaire contient des erreurs. Veuillez les corriger.";	
			return "login";
		}
		
		require_once('/modele/membreDAO.class.php');
		$mdao = new membreDAO();
		$membre = $mdao->find($_REQUEST["username"]);
		if ($membre == null)
			{
				$_REQUEST["field_messages"]["username"] = "Utilisateur inexistant.";	
				//vuelve al login si el usuario no existe
				return "login";
			}
		else if ($membre->getPassword() != $_REQUEST["password"])
			{
				$_REQUEST["field_messages"]["password"] = "Mot de passe incorrect.";	
				//vuelve al usuario si el correo no es correcto
				return "login";
			}
		if (!ISSET($_SESSION)) session_start();
		$_SESSION["connected"] = $_REQUEST["username"];
		$_SESSION["idMember"] = $membre->getIdMember();
		//si esta todo correcto va a la vista afficher
		return "afficherRequest";
	}
	public function valide()
	{
		$result = true;
		if ($_REQUEST['username'] == "")
		{
			$_REQUEST["field_messages"]["username"] = "Donnez votre nom d'utilisateur";
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