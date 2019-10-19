<?php
require_once('./controleur/Action.interface.php');

class EditProfilAction implements Action {
	public function execute(){
        if (!ISSET($_SESSION)) {
			session_start();
        }
        
        if (!ISSET($_SESSION["connected"])){  
            return "login";
        }
        else
        {
            return "profil";
        }

        if (ISSET($_REQUEST["sendEditForm"]))
        {
            
        }

    }

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
        if ($_REQUEST['oldPassword'] == "")
		{
			$_REQUEST["field_messages"]["oldPassword"] = "Mot de passe obligatoire";
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