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
                return $result->messagelu;//['messagelu'];
				
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

}


			