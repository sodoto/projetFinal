<?php
require_once('/classes/Database.class.php');


class MemberSkillsDAO
{
    //INSERT MEMBER SKILLS
	public function insertMemberSkills($skill) {
		$db = Database::getInstance();//appel au singleton pour obtenir la connexion à la BD (le PDO)
		$n = 0;
            try {
                $pstmt = $db->prepare("INSERT INTO memberskills (idMember ,idSkill)".
                                                  " VALUES (:i,:u)");
                $n = $pstmt->execute(array(':i' => $skill->getIdMember(),
										   ':u' => $skill->getIdSkill()));				   
                $pstmt->closeCursor();
                $pstmt = NULL;
                Database::close();
	
            }
            catch (PDOException $ex){
            }             
			return $n;   
	}
}