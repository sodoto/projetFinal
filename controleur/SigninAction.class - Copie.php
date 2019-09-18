<?php
require_once('./controleur/Action.interface.php');
class SigninAction implements Action {
	public function execute(){
		//esta instruccion hace que aparezca la pantalla de login en un principio
		if (!ISSET($_REQUEST["email"]))
			return "login";
		if (!$this->valide())
		{
			//$_REQUEST["global_message"] = "Le formulaire contient des erreurs. Veuillez les corriger.";	
			return "signin";
		}
		
		require_once('/modele/MemberDAO.class.php');
		$mdao = new MemberDAO();
		$membre = $mdao->findByEmail($_REQUEST["email"]);
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

		$_SESSION["connected"] = $_REQUEST["email"];
		$_SESSION["idMember"] = $membre->getIdMember();
		//si esta todo correcto va a la vista afficher
		return "afficherRequest";//debe seguir a los skills
	}
	//Verification de champs du formulaire
	public function valide()
	{
		$result = true;
		if ($_REQUEST['email'] == "")
		{
			$_REQUEST["field_messages"]["username"] = "Veuillez entrer votre nom d'utilisateur";
			$result = false;
		}	
		if ($_REQUEST['password'] == "")
		{
			$_REQUEST["field_messages"]["password"] = "Mot de passe obligatoire";
			$result = false;
		}
		if ($_REQUEST['password2'] == "")
		{
			$_REQUEST["field_messages"]["password2"] = "Retapez le mot de passe";
			$result = false;
		}	
		if ($_REQUEST['password2'] != $_REQUEST['password'])
		{
			$_REQUEST["field_messages"]["passwordMissMatch"] = "Les deux mots de passe ne correspondent pas, veuillez vérifier";
			$result = false;
		}	
		return $result;
	}
}
?>