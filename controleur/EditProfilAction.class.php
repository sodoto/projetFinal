<?php
require_once('./controleur/Action.interface.php');
require_once('/modele/MemberDAO.class.php');
require_once('/modele/classes/Member.class.php');

class EditProfilAction implements Action {
	public function execute(){
        if (!ISSET($_SESSION)) {
			session_start();
        }
		
		$_SESSION["passwordChanged"] = false;

        if (!ISSET($_SESSION["connected"])){  
            return "login";
        }
        else
        {
			$dao = new MemberDAO();

			if(ISSET($_REQUEST["EditPassword"]))
			{
				if (ISSET($_REQUEST["sendEditPassword"]))
				{
					if (!$this->validePassword())
					{
						return "editPassword";
					}
					else
					{
						$memberPass = new Member();
						$memberPass -> setPassword($_REQUEST["newPassword"]);
						$memberPass -> setIdMember($_SESSION["idMember"]);

						$_SESSION["patate"] = $memberPass->getPassword();
						$_SESSION["patate2"] = $memberPass->getIdMember();

						$n = $dao->updatePassword($memberPass);

						if($n != 0)
						{
							$_SESSION["passwordChanged"] = true;
						}

						return "profil";
					}
				}
				else
				{
					return "editPassword";
				}
			}
			elseif(ISSET($_REQUEST["EditProfil"]))
			{
				if (ISSET($_REQUEST["sendEditForm"]))
				{
					if (!$this->valide())
					{
						return "editProfil";
					}
					else
					{

						$member = new Member();
						$member -> setIdMember($_SESSION["idMember"]);
						$member -> setFirstname($_REQUEST["firstname"]);
						$member -> setLastname($_REQUEST["lastname"]);
						$member -> setCity($_REQUEST["city"]);
						$member -> setUsername($_REQUEST["username"]);
						$member -> setEMail($_REQUEST["email"]);

						if(ISSET($_FILES["profilPicture"]) && $_FILES['profilPicture']["name"]!="")
						{
							$dossier = "./images/member/";
							$nomFichier = $_REQUEST["email"]."_".$_FILES["profilPicture"]["name"];
							if (copy($_FILES["profilPicture"]["tmp_name"],$dossier.$nomFichier))
							{
								unlink($_FILES['profilPicture']['tmp_name']);
							}
							$member -> setPhoto($nomFichier);

							$dao->updateWithProfilPicture($member);
						}
						else
						{
							$dao->update($member);
						}
					}

					return "profil";
				}
				else
				{
					return "editProfil";
				}
			}
			else
			{
				return "profil";
			}
            
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
        
		return $result;
	}

	public function validePassword()
	{
		$dao = new MemberDAO();
		$memberPass = $dao->find($_SESSION['idMember']);

		$result = true;
		if ($_REQUEST['oldPassword'] != $memberPass->getPassword())
		{
			$_REQUEST["field_messages"]["oldPassword"] = "Ancien mot de passe n'est pas valide";
			$result = false;
		}
		if ($_REQUEST['newPassword'] == "")
		{
			$_REQUEST["field_messages"]["newPassword"] = "Mot de passe obligatoire";
			$result = false;
		}
		if ($_REQUEST['newPassword2'] == "")
		{
			$_REQUEST["field_messages"]["newPassword2"] = "Retapez le mot de passe";
			$result = false;
		}	
		if ($_REQUEST['newPassword'] != $_REQUEST['newPassword2'])
		{
			$_REQUEST["field_messages"]["passwordMissMatch"] = "Les deux mots de passe ne correspondent pas, veuillez vérifier";
			$result = false;
		}
		return $result;
	}
}