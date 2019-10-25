<?php
require_once('/classes/Database.class.php');


class MemberSkillsDAO
{
    //INSERT MEMBER SKILLS
	public function insertMemberSkills($skill) {
		$db = Database::getInstance();//appel au singleton pour obtenir la connexion à la BD (le PDO)
		//creacion de un array
			
		
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
	

	
	public static function findSkills($id)
	{
		 $db = Database::getInstance();
          $favs = Array();
            try {			
                $pstmt = $db->prepare("SELECT s1.idSkills, s1.description FROM memberskills m1 INNER JOIN skills s1 on m1.idSkill = s1.idSkills and m1.idMember=:id");
                 $pstmt->execute(array(':id'=> $id));
			
                while ($result = $pstmt->fetch(PDO::FETCH_OBJ))
                {
                        $req = new MemberSkills();
                        $req->loadFromObject1($result);
                        array_push($favs, $req);
                }
                $pstmt->closeCursor();
                $pstmt = NULL;
                Database::close();
            }
            catch (PDOException $ex){
            }             
            return $favs;
	}	
}