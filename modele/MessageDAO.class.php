<?php
require_once('/classes/Database.class.php');
require_once('/classes/Message.class.php');

class MessageDAO
{
    public function insert($message) {
        $db = Database::getInstance();
        $n = 0;

        try{

            $pstmt = $db->prepare("INSERT INTO message (message,idRequest,idMember, idRecepteur, dateHeure, messageLu)
                                    VALUES (:m,:ido,:ide,:idr, :d, :e)");		
			$n = $pstmt->execute(array(':m' => $message->getMessage(),
                                       ':ido' => $message->getIdRequest(),
									   ':ide' => $message->getIdMember(),
									   ':idr' => $message->getIdRecepteur(),
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

    public function findByIdOffer($id) {
        $db = Database::getInstance();
        $messages = Array();

        try {			
            $pstmt = $db->prepare("SELECT * FROM message WHERE idOffer=:id");
            $pstmt->execute(array (':id' => $id));

            while ($result = $pstmt->fetch(PDO::FETCH_OBJ))
            {
                    $mes = new Message();
                    $mes->loadFromObject($result);
                    array_push($messages, $mes);
            }
            $pstmt->closeCursor();
            $pstmt = NULL;
            Database::close();
        }
        catch (PDOException $ex){
        }             
        return $messages;
    }
	
	public static function messageLuStatus($id)
	{
		 $db = Database::getInstance();
          
            try {			
                $pstmt = $db->prepare("SELECT count(m1.messageLu) as messagelu FROM message m1 WHERE m1.idRecepteur=:id and m1.messageLu='No'");
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
	
	public static function findMemberMessagesEnvoyes($id)
	{
		 $db = Database::getInstance();
            //creacion de un array
			$favs = Array();
            try {			
                $pstmt = $db->prepare("SELECT me1.dateHeure, m1.username, r1.title, me1.messageLu, me1.idMessage, me1.idRecepteur, r1.idRequest FROM message me1 
				INNER JOIN members m1 on me1.idRecepteur=m1.idMember 
				INNER JOIN request r1 on r1.idRequest=me1.idRequest where me1.idMember=:id");
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
	
	public static function findMemberMessagesRecus($id)
	{
		 $db = Database::getInstance();
            //creacion de un array
			$favs = Array();
            try {			
                $pstmt = $db->prepare("SELECT me1.dateHeure, m1.username, r1.title, me1.messageLu, me1.idMessage, me1.idMember, r1.idRequest FROM message me1 
				INNER JOIN members m1 on me1.idMember=m1.idMember 
				INNER JOIN request r1 on r1.idRequest=me1.idRequest where me1.idRecepteur=:id");
                $pstmt->execute(array (':id' => $id));

                while ($result = $pstmt->fetch(PDO::FETCH_OBJ))
                {
                        $mes = new Message();
                        $mes->loadFromObject3($result);
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
	
	
	 public function updateMessageLu($idMessage) {
        $db = Database::getInstance();
        $n = 0;
		$lu="Yes";
        try{
            $pstmt = $db->prepare("UPDATE message SET messageLu=:ml WHERE idMessage=:idMessage");
            $n = $pstmt->execute(array(':ml' => $lu,
                                       ':idMessage' => $idMessage)); 
            
            $pstmt->closeCursor();
            $pstmt = NULL;
            Database::close();                                 
        }
        catch (PDOException $ex){
        }           
        return $n;
    }
	
	public static function findConversation($idMember, $idRecepteur, $idRequest)
	{
		 $db = Database::getInstance();
            //creacion de un array
			$favs = Array();
            try {			
                $pstmt = $db->prepare("SELECT me1.dateHeure, m1.username, me1.message, m1.photo_path FROM message me1 
				INNER JOIN members m1 on me1.idMember=m1.idMember where me1.idRequest=:idRequest and 
                (me1.idMember=:idMember or me1.idRecepteur=:idMember) and (me1.idMember=:idRecepteur or me1.idRecepteur=:idRecepteur) order by me1.dateHeure");

                $pstmt->execute(array (':idMember' => $idMember,
										':idRecepteur' => $idRecepteur,
										':idRequest' => $idRequest));

                while ($result = $pstmt->fetch(PDO::FETCH_OBJ))
                {
                        $mes = new Message();
                        $mes->loadFromObject4($result);
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


			