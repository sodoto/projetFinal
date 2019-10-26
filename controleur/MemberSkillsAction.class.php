<?php
require_once('./controleur/Action.interface.php');
require_once('/modele/classes/MemberSkills.class.php');
require_once('./modele/MemberSkillsDAO.class.php');

class MemberSkillsAction implements Action {
	public function execute(){

if (!ISSET($_SESSION))
	session_start();
	
		$idMember=$_SESSION["idMember"];
		
		$dao=new MemberSkillsDAO();
		
		if (isset($_POST['submit'])) {
			if(isset($_POST['deObj'])){
				$memberskill = new Memberskills();
				$memberskill->setIdMember($idMember);
				$memberskill->setIdSkill(1);
				$dao->insertMemberSkills($memberskill);
			}
			if(isset($_POST['peintA'])){
				$memberskill = new Memberskills();
				$memberskill->setIdMember($idMember);
				$memberskill->setIdSkill(2);
				$dao->insertMemberSkills($memberskill);
			}
			if(isset($_POST['peintO'])){
				$memberskill = new Memberskills();
				$memberskill->setIdMember($idMember);
				$memberskill->setIdSkill(3);
				$dao->insertMemberSkills($memberskill);
			}
			if(isset($_POST['trad'])){
				$memberskill = new Memberskills();
				$memberskill->setIdMember($idMember);
				$memberskill->setIdSkill(4);
				$dao->insertMemberSkills($memberskill);
			}
			if(isset($_POST['nett'])){
				$memberskill = new Memberskills();
				$memberskill->setIdMember($idMember);
				$memberskill->setIdSkill(5);
				$dao->insertMemberSkills($memberskill);
			}
			if(isset($_POST['transp'])){
				$memberskill = new Memberskills();
				$memberskill->setIdMember($idMember);
				$memberskill->setIdSkill(6);
				$dao->insertMemberSkills($memberskill);
			}
			if(isset($_POST['acomp'])){
				$memberskill = new Memberskills();
				$memberskill->setIdMember($idMember);
				$memberskill->setIdSkill(7);
				$dao->insertMemberSkills($memberskill);
			}
			if(isset($_POST['ense'])){
				$memberskill = new Memberskills();
				$memberskill->setIdMember($idMember);
				$memberskill->setIdSkill(8);
				$dao->insertMemberSkills($memberskill);
			}
			if(isset($_POST['org'])){
				$memberskill = new Memberskills();
				$memberskill->setIdMember($idMember);
				$memberskill->setIdSkill(9);
				$dao->insertMemberSkills($memberskill);
			}if(isset($_POST['cuis'])){
				$memberskill = new Memberskills();
				$memberskill->setIdMember($idMember);
				$memberskill->setIdSkill(10);
				$dao->insertMemberSkills($memberskill);
			}
			if(isset($_POST['nour'])){
				$memberskill = new Memberskills();
				$memberskill->setIdMember($idMember);
				$memberskill->setIdSkill(11);
				$dao->insertMemberSkills($memberskill);
			}
			if(isset($_POST['cond'])){
				$memberskill = new Memberskills();
				$memberskill->setIdMember($idMember);
				$memberskill->setIdSkill(12);
				$dao->insertMemberSkills($memberskill);
			}
			if(isset($_POST['rep'])){
				$memberskill = new Memberskills();
				$memberskill->setIdMember($idMember);
				$memberskill->setIdSkill(13);
				$dao->insertMemberSkills($memberskill);
			}
			return "afficherRequest";
		}

		if(isset($_POST['edit']))
		{
			$tSkillsMember = $dao->findSkills($_SESSION["idMember"]);
			$skillIdMember = Array();

			if(!empty($_REQUEST["formSkill"]))
			{
				$selectedSkill = $_REQUEST["formSkill"];

				// Vérifie si le membre à enlevé des compétences
				foreach($tSkillsMember as $skill)
				{
					$skillIdMember[] = $skill->getIdSkill();
					if(!in_array($skill->getIdSkill(),$selectedSkill))
					{
						$dao->delete($skill);
					}
				}

				// Vérifie si le membres a ajouté des compétences
				foreach($selectedSkill as $skill)
				{
					if(!in_array($skill,$skillIdMember))
					{
						$newSkill = new MemberSkills();
						$newSkill->setIdMember($idMember);
						$newSkill->setIdSkill($skill);
						$dao->insertMemberSkills($newSkill);
					}
				}
			}
			else
			{
				foreach($tSkillsMember as $skill)
				{
					$dao->delete($skill);
				}
			}
			return "mySkills";
		}

		if (isset($_POST['reset'])) {
		header('location:competences.php');//changer buttons off
		}
	}
}
