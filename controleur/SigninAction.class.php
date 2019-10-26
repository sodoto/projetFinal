<?php
require_once('./controleur/Action.interface.php');
require_once('./modele/InsertMemberDAO.class.php');

class SigninAction implements Action {
	public function execute(){
		//esta instruccion permite cargar la pagina si no hay sesion todavia
		if (!ISSET($_REQUEST["username"]))
			return "signin";
		if (!$this->valide())
		{
			//$_REQUEST["global_message"] = "Le formulaire contient des erreurs. Veuillez les corriger.";	
			return "signin";
		}
		
		$dao = new InsertMemberDAO();
		
		$member = new Member();
		$member->setFirstname($_REQUEST['firstname']);
		$member->setLastname($_REQUEST['lastname']);
		$member->setCity($_REQUEST['city']);
		$member->setEmail($_REQUEST['email']);
		$member->setUsername($_REQUEST['username']);
		$member->setPassword($_REQUEST['password']);
		$dao->insertMember($member);
		
		
		
		require_once('/modele/MemberDAO.class.php');
		$mdao = new MemberDAO();
		$membre = $mdao->findUser($_REQUEST["username"]);
		
		if (!ISSET($_SESSION)) 
		session_start();
		$_SESSION["connected"] = $_REQUEST["username"];
		$_SESSION["idMember"] = $membre->getIdMember();
		$_SESSION["photoMember"] = $member->getPhoto();
		//si esta todo correcto va a la vista afficher
		return "memberSkills";//debe seguir a los skills
	}
	//Verification de champs du formulaire
	public function valide()
	{
		$result = true;
		if ($_REQUEST['firstname'] == "")
		{
			$_REQUEST["field_messages"]["firstname"] = "Veuillez entrer votre prenom";
			$result = false;
		}	
		if ($_REQUEST['lastname'] == "")
		{
			$_REQUEST["field_messages"]["lastname"] = "Veuillez entrer votre nom de famille";
			$result = false;
		}
		if ($_REQUEST['city'] == "")
		{
			$_REQUEST["field_messages"]["city"] = "Veuillez entrer la ville";
			$result = false;
		}	
		if ($_REQUEST['email'] == "")
		{
			$_REQUEST["field_messages"]["email"] = "Veuillez entrer le courrier électronique";
			$result = false;
		}	
		if ($_REQUEST['username'] == "")
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