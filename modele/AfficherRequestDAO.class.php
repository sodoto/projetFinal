<?php
//Conexion a la base de datos
include_once('/modele/classes/Database.class.php');
//Uso de la clase que genera objetos de la base de datos
include_once('/modele/classes/Request.class.php'); 

class afficherRequestDAO
{		
//Inner join 3 tables
	public static function findAll()
	{
		 $db = Database::getInstance();
            //creacion de un array
			$favs = Array();
            try {			
                $pstmt = $db->prepare("SELECT idRequest, description, title, 
				    dateRequest, dateService, location, status, username FROM request r1 INNER JOIN members m1 on r1.idMember=m1.idMember 
					INNER JOIN skills s1 on r1.skillWanted=s1.idSkills");
                $pstmt->execute();

                while ($result = $pstmt->fetch(PDO::FETCH_OBJ))
                {
                        $req = new Request();
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
	
	public static function findIdSkill($idRequest)
	{
		 $db = Database::getInstance();
          $favs = Array();
            try {			
                $pstmt = $db->prepare("SELECT idRequest, description, title, 
				    dateRequest, dateService, location, status, username FROM request r1 INNER JOIN members m1 on r1.idMember=m1.idMember 
					INNER JOIN skills s1 on r1.skillWanted=s1.idSkills WHERE idRequest=:idRequest");
                 $pstmt->execute(array(':idRequest'=> $idRequest));
			
                while ($result = $pstmt->fetch(PDO::FETCH_OBJ))
                {
                        $req = new Request();
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
?>