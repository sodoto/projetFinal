<?php
require_once('/classes/Database.class.php');
require_once('/classes/Message.class.php');

class MessageDAO
{
    public function insert($message) {
        $db = Database::getInstance();
        $n = 0;

        try{
            $pstmt = $db->prepare("INSERT INTO message (message,dateHeure,idRequest,idMemberRecepteur,idMemberEmetteur)
                                    VALUES (:m,:d,:idr,:idm, :ide)");		
			$n = $pstmt->execute(array(':m' => $message->getMessage(),
                                       ':d' => $message->getDateHeure(),
                                       ':idr' => $message->getIdRequest(),
                                       ':idm' => $message->getIdMemberRecepteur(),
									   ':ide' => $message->getIdMemberEmetteur()));
 
            $pstmt->closeCursor();
            $pstmt = NULL;
            Database::close();
        }
        catch (PDOException $ex){
        }           
        return $n;	
    }

}


			