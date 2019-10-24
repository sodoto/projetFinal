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
            $n = $pstmt->execute(array(':id' => $offerRequest->getIdOffer()));

            $pstmt->closeCursor();
            $pstmt = NULL;
            Database::close();
        }
        catch (PDOException $ex){
        }           
        return $n;
    }

    public function findLast() {
        $db = Database::getInstance();

        try {			
            $pstmt = $db->prepare("SELECT * FROM offerrequest ORDER BY idOffer DESC LIMIT 1");
            $pstmt->execute();

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

    public function findByIdRequest($id) {
        $db = Database::getInstance();
        $offerRequests = Array();

        try{
            $pstmt = $db->prepare("SELECT * FROM offerrequest WHERE idRequest=:id");
            $pstmt->execute(array(':id'=>$id));

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

    public function findByIdMemberIdRequest($idm,$idr) {
        $db = Database::getInstance();

        try{
            $pstmt = $db->prepare("SELECT * FROM offerrequest WHERE idMember=:idm AND idRequest=:idr");
            $pstmt->execute(array(':idm'=>$idm,
                                   ':idr'=>$idr));

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

    public function findByIdMember($idMember) {
        $db = Database::getInstance();
        $offerRequests = Array();

        try{
            $pstmt = $db->prepare("SELECT * FROM offerrequest WHERE idMember=:id");
            $pstmt->execute(array(':id'=>$idMember));

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
	
	public function findMembersByIdRequest($idRequest) {
        $db = Database::getInstance();
        $offerRequests = Array();

        try{
            $pstmt = $db->prepare("SELECT of1.idOffer, of1.dateOffer, of1.idMember, m1.photo_path, m1.username FROM offerrequest of1 
				INNER JOIN members m1 on of1.idMember=m1.idMember where of1.idrequest=:idRequest");
            $pstmt->execute(array(':idRequest'=>$idRequest));

            while($result = $pstmt->fetch(PDO::FETCH_OBJ)) {
                $o = new OfferRequest();
                $o->loadFromObject1($result);
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
	
	 public function updateTerminee($idOffer) {
        $db = Database::getInstance();
        $n = 0;
		$comment="finished";
		$status="Aide fournie";
        try{
            $pstmt = $db->prepare("UPDATE offerrequest SET comment=:c, status=:s WHERE idOffer=:idOffer");
            $n = $pstmt->execute(array(':c' => $comment,
                                       ':s' => $status,
                                       ':idOffer' => $idOffer));
            
            $pstmt->closeCursor();
            $pstmt = NULL;
            Database::close();                                 
        }
        catch (PDOException $ex){
        }           
        return $n;
    }
	
}