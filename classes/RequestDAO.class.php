<?php
require_once('/classes/Database.class.php');
require_once('/classes/Request.class.php');

class RequestDAO
{
    public function create($request) {
        $db = Database::getInstance();
        $n = 0;

        try{
            $pstmt = $db->prepare("INSERT INTO request (idRequest,title,dateRequest,dateService,city,status,idMember)
                                    VALUES (:idr,:t,:dr,:ds,:c,:s,:idm)");
            $n = $pstmt->execute(array(':idr' => $request->getIdRequest(),
                                       ':t' => $request->getTitle(),
                                       ':dr' => $request->getDateRequest(),
                                       ':ds' => $request->getDateService(),
                                       ':c' => $request->getCity(),
                                       ':s' => $request->getStatus(),
                                       ':idm' => $request->getIdMember()));

            $pstmt->closeCursor();
            $pstmt = NULL;
            Database::close();
        }
        catch (PDOException $ex){
        }           
        return $n;	
    }

    public function update($request) {
        $db = Database::getInstance();
        $n = 0;

        try{
            $pstmt = $db->prepare("UPDATE request SET title=:t, dateService=:ds, city=:c, status=:s WHERE idRequest=:idr");
            $n = $pstmt->execute(array(':idr' => $request->getIdRequest(),
                                       ':title' => $request->getTitle(),
                                       ':ds' => $request->getDateService(),
                                       ':c' => $request->getCity(),
                                       ':s' => $request->getStatus()));
            
            $pstmt->closeCursor();
            $pstmt = NULL;
            Database::close();                                 
        }
        catch (PDOException $ex){
        }           
        return $n;
    }

    public function delete($request) {
        $db = Database::getInstance();
        $n = 0;

        try{
            $pstmt = $db->prepare("DELETE FROM request WHERE idRequest=:id");
            $n = $pstmt->execute(array(':id' => $request->getIdRequest()));

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
        $requests = Array();

        try{
            $pstmt = $db->prepare("SELECT * FROM request");
            $pstmt->execute();

            while($result = $pstmt->fetch(PDO::FETCH_OBJ)) {
                $r = new Request();
                $r->loadFromObject($result);
                array_push($requests, $r);
            }

            $pstmt->closeCursor();
            $pstmt = NULL;
            Database::close();
        }
        catch (PDOException $ex){
        }           
        return $requests;
    }

    public function find($id) {
        $db = Database::getInstance();

        try{
            $pstmt = $db->prepare("SELECT * FROM request WHERE idRequest=:id");
            $pstmt->execute(array(':id'= $id));

            $result = $pstmt->fetch(PDO::FETCH_OBJ);

            if($result) {
                $r = new Request();
                $r->loadFromObject($result);
                $pstmt->closeCursor();
                $pstmt = NULL;
                Database::close();
                return $r;
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