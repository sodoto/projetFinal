<?php
require_once('/classes/Database.class.php');
require_once('/classes/Message.class.php');

class MessageDAO
{
    public function insert($message) {
        $db = Database::getInstance();
        $n = 0;

        try{
            $pstmt = $db->prepare("INSERT INTO message (message,idOffer,idMemberEmetteur, dateHeure)
                                    VALUES (:m,:ido,:ide, :d)");		
			$n = $pstmt->execute(array(':m' => $message->getMessage(),
                                       ':ido' => $message->getIdOffer(),
									   ':ide' => $message->getIdMemberEmetteur(),
									   ':d' => $message->getDateHeure()));
 
            $pstmt->closeCursor();
            $pstmt = NULL;
            Database::close();
        }
        catch (PDOException $ex){
        }           
        return $n;	
    }

}


			