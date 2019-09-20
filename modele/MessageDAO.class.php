<?php
require_once('/classes/Database.class.php');
require_once('/classes/Message.class.php');

class MessageDAO
{
    public function create($message) {
        $db = Database::getInstance();
        $n = 0;

        try{
            $pstmt = $db->prepare("INSERT INTO message (message,idOffer,idMember,dateTime)
                                    VALUES (:idmess,:m,:ido,:idmem,:t)");
            $n = $pstmt->execute(array(':m' => $message->getMessage(),
                                       ':ido' => $message->getidOffer(),
                                       ':idmem' => $message->getidMember(),
                                       ':t' => $message->getTimeMessage()));

            $pstmt->closeCursor();
            $pstmt = NULL;
            Database::close();
        }
        catch (PDOException $ex){
        }           
        return $n;	
    }

    public function update($message) {
        $db = Database::getInstance();
        $n = 0;

        try{
            $pstmt = $db->prepare("UPDATE messageChat SET message=:m ,timeMessage=:t WHERE idMessage=:id");
            $n = $pstmt->execute(array(':m' => $message->getMessage(),
                                       ':t' => $message->getTimeMessage(),
                                       ':id' => $message->getIdMessage()));
            
            $pstmt->closeCursor();
            $pstmt = NULL;
            Database::close();                                 
        }
        catch (PDOException $ex){
        }           
        return $n;
    }

    public function delete($message) {
        $db = Database::getInstance();
        $n = 0;

        try{
            $pstmt = $db->prepare("DELETE FROM messageChat WHERE idMessage=:id");
            $n = $pstmt->execute(array(':id' => $message->getIdMessage()));

            $pstmt->closeCursor();
            $pstmt = NULL;
            Database::close();
        }
        catch (PDOException $ex){
        }           
        return $n;
    }

    public function findAll() {
        $db = Database::getInstance();
        $messages = Array();

        try{
            $pstmt = $db->prepare("SELECT * FROM messageChat");
            $pstmt->execute();

            while($result = $pstmt->fetch(PDO::FETCH_OBJ)) {
                $m = new Message();
                $m->loadFromObject($result);
                array_push($messages, $m);
            }

            $pstmt->closeCursor();
            $pstmt = NULL;
            Database::close();
        }
        catch (PDOException $ex){
        }           
        return $messages;
    }

    public function find($id) {
        $db = Database::getInstance();

        try{
            $pstmt = $db->prepare("SELECT * FROM messageChat WHERE idMessage=:id");
            $pstmt->execute(array(':id'=>$id));

            $result = $pstmt->fetch(PDO::FETCH_OBJ);

            if($result) {
                $m = new Message();
                $m->loadFromObject($result);
                $pstmt->closeCursor();
                $pstmt = NULL;
                Database::close();
                return $m;
            }
            $pstmt->closeCursor();
            $pstmt = NULL;
            Database::close();
        }
        catch (PDOException $ex){
        }           
        return NULL;
    }
}