<?php
require_once('./controleur/Action.interface.php');
require_once('/classes/Memberskills.class.php');

class MemberSkillsAction implements Action {
	public function execute(){
		if (!ISSET($_REQUEST["username"]))
			return "signin";
	
$idMember=$_SESSION["idMember"];
	
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

if (isset($_POST['reset'])) {
header('location:competences.php');//changer buttons off
}	
		
}
?>