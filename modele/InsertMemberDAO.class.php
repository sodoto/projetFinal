<?php
require_once('/classes/Database.class.php');
require_once('/classes/Member.class.php');

class InsertMemberDAO
{
   public function insertMember($member) {
		$db = Database::getInstance();//appel au singleton pour obtenir la connexion à la BD (le PDO)
		$n = 0;
            try {
                $pstmt = $db->prepare("INSERT INTO members (firstname ,lastname ,city,email,username,password)".
                                                  " VALUES (:i,:u,:p,:l,:f,:e)");
                $n = $pstmt->execute(array(':i' => $member->getFirstname(),
										   ':u' => $member->getLastname(),
										   ':p' => $member->getCity(),
										   ':l' => $member->getEmail(),
										   ':f' => $member->getUsername(),
										   ':e' => $member->getPassword()));
										  
									   
                $pstmt->closeCursor();
                $pstmt = NULL;
                Database::close();
				
				
				
            }
            catch (PDOException $ex){
            }             
			return $n;   
	}
}