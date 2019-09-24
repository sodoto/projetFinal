<?php
require_once('/classes/Database.class.php');
require_once('/classes/Request.class.php');

class RequestDAO
{
    public function create($request) {
        $db = Database::getInstance();
        $n = 0;

        try{
            $pstmt = $db->prepare("INSERT INTO request (title,dateRequest,dateService,location,status,idMember,skillWanted)
                                    VALUES (:t,:dr,:ds,:c,:s,:idm,:sw)");
            $n = $pstmt->execute(array(':t' => $request->getTitle(),
                                       ':dr' => $request->getDateRequest(),
                                       ':ds' => $request->getDateService(),
                                       ':c' => $request->getLocation(),
                                       ':s' => $request->getStatus(),
                                       ':idm' => $request->getIdMember(),
                                       ':sw' => $request->getSkillWanted()));

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
            $pstmt = $db->prepare("UPDATE request SET title=:t, dateService=:ds, location=:c, status=:s, skillWanted=:sw WHERE idRequest=:idr");
            $n = $pstmt->execute(array(':idr' => $request->getIdRequest(),
                                       ':t' => $request->getTitle(),
                                       ':ds' => $request->getDateService(),
                                       ':c' => $request->getLocation(),
                                       ':s' => $request->getStatus(),
                                       ':sw' => $request->getSkillWanted()));
            
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
            $pstmt->execute(array(':id'=> $id));

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

    public function findByIdMember($idMember) {
        $db = Database::getInstance();
        $requests = Array();

        try{
            $pstmt = $db->prepare("SELECT * FROM request r1 INNER JOIN members m1 ON r1.idMember = m1.idMember
                INNER JOIN skills s1 ON r1.skillWanted=s1.idSkills WHERE r1.idMember=:id ");
            $pstmt->execute(array(':id'=> $idMember));

            while($result = $pstmt->fetch(PDO::FETCH_OBJ)) {
                $r = new Request();
                $r->loadFromObject1($result);
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
}