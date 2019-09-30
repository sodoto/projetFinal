<?php
require_once('/classes/Database.class.php');
require_once('/classes/Message.class.php');

class MessageDAO
{
    public function insert($message) {
        $db = Database::getInstance();
        $n = 0;

        try{
            $pstmt = $db->prepare("INSERT INTO message (message,idRequest,idMember, dateHeure, messageLu)
                                    VALUES (:m,:ido,:ide, :d, :e)");		
			$n = $pstmt->execute(array(':m' => $message->getMessage(),
                                       ':ido' => $message->getIdRequest(),
									   ':ide' => $message->getIdMember(),
									   ':d' => $message->getDateHeure(),
									   ':e' => $message->getMessageLu()));
			
            $pstmt->closeCursor();
            $pstmt = NULL;
            Database::close();
        }
        catch (PDOException $ex){
        }           
        return $n;	
    }
	
	public static function messageLuStatus($id)
	{
		 $db = Database::getInstance();
          
            try {			
                $pstmt = $db->prepare("SELECT count(m1.messageLu) as messagelu FROM message m1 INNER JOIN request o1 on m1.idRequest=o1.idRequest 
					 WHERE o1.idMember=:id and m1.messageLu='No'");
               $pstmt->execute(array (':id' => $id));
            $result = $pstmt->fetch(PDO::FETCH_OBJ);
			
            if($result) {
              
                $pstmt->closeCursor();
                $pstmt = NULL;
                Database::close();
                return $result->messagelu;
				
            }
			else
				return 99;
            $pstmt->closeCursor();
            $pstmt = NULL;
            Database::close();
        }
        catch (PDOException $ex){
        }           
        return NULL;
	}	
	
	public static function findMemberMessages($id)
	{
		 $db = Database::getInstance();
            //creacion de un array
			$favs = Array();
            try {			
                $pstmt = $db->prepare("SELECT me1.dateHeure, m1.username, r1.title, me1.messageLu, me1.idMessage FROM message me1 
				INNER JOIN members m1 on me1.idMember=m1.idMember 
				INNER JOIN request r1 on r1.idRequest=me1.idRequest and r1.idMember=:id");
                $pstmt->execute(array (':id' => $id));

                while ($result = $pstmt->fetch(PDO::FETCH_OBJ))
                {
                        $mes = new Message();
                        $mes->loadFromObject2($result);
                        array_push($favs, $mes);
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


			