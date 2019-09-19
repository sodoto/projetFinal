<?php
require_once('/classes/Database.class.php');
require_once('/classes/OfferRequest.class.php');

class OfferRequestDAO
{
    public function create($offerRequest) {
        $db = Database::getInstance();
        $n = 0;

        try{
            $pstmt = $db->prepare("INSERT INTO offerrequest (status,dateOffer,comment,idMember,idRequest)
                                    VALUES (:s,:do,:c,:idm,:idr)");
            $n = $pstmt->execute(array(':s' => $offerRequest->getStatus(),
                                       ':do' => $offerRequest->getDateOffer(),
                                       ':c' => $offerRequest->getComment(),
                                       ':idm' => $offerRequest->getIdMember(),
                                       ':idr' => $offerRequest->getIdRequest()));

            $pstmt->closeCursor();
            $pstmt = NULL;
            Database::close();
        }
        catch (PDOException $ex){
        }           
        return $n;	
    }

    public function update($offerRequest) {
        $db = Database::getInstance();
        $n = 0;

        try{
            $pstmt = $db->prepare("UPDATE offerrequest SET comment=:c, dateOffer=:do, status=:s WHERE idOffer=:ido");
            $n = $pstmt->execute(array(':ido' => $offerRequest->getIdOffer(),
                                       ':do' => $offerRequest->getDateOffer(),
                                       ':s' => $offerRequest->getStatus(),
                                       ':c' => $offerRequest->getComment()));
            
            $pstmt->closeCursor();
            $pstmt = NULL;
            Database::close();                                 
        }
        catch (PDOException $ex){
        }           
        return $n;
    }

    public function delete($offerRequest) {
        $db = Database::getInstance();
        $n = 0;

        try{
            $pstmt = $db->prepare("DELETE FROM offerrequest WHERE idOffer=:id");
            $n = $pstmt->execute(array(':id' => $request->getIdOffer()));

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
        $offerRequests = Array();

        try{
            $pstmt = $db->prepare("SELECT * FROM offerrequest");
            $pstmt->execute();

            while($result = $pstmt->fetch(PDO::FETCH_OBJ)) {
                $o = new OfferRequest();
                $o->loadFromObject($result);
                array_push($offerRequests, $o);
            }

            $pstmt->closeCursor();
            $pstmt = NULL;
            Database::close();
        }
        catch (PDOException $ex){
        }           
        return $offerRequests;
    }

    public function findByIdOffer($id) {
        $db = Database::getInstance();

        try{
            $pstmt = $db->prepare("SELECT * FROM offerrequest WHERE idOffer=:id");
            $pstmt->execute(array(':id'=>$id));

            $result = $pstmt->fetch(PDO::FETCH_OBJ);

            if($result) {
                $o = new OfferRequest();
                $o->loadFromObject($result);
                $pstmt->closeCursor();
                $pstmt = NULL;
                Database::close();
                return $o;
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