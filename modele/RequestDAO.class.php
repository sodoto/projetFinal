<?php
require_once('/classes/Database.class.php');
require_once('/classes/Request.class.php');

class RequestDAO
{
    public function create($request) {
        $db = Database::getInstance();
        $n = 0;

        try{
            $pstmt = $db->prepare("INSERT INTO request (title,description_request,dateRequest,dateService,location,status,idMember,skillWanted)
                                    VALUES (:t,:d,:dr,:ds,:c,:s,:idm,:sw)");
            $n = $pstmt->execute(array(':t' => $request->getTitle(),
                                       ':d' => $request->getDescription(),
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
            $pstmt = $db->prepare("UPDATE request SET title=:t, description_request=:d, dateService=:ds, location=:c, status=:s, skillWanted=:sw WHERE idRequest=:idr");
            $n = $pstmt->execute(array(':idr' => $request->getIdRequest(),
                                       ':t' => $request->getTitle(),
                                       ':d' => $request->getDescription(),
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

    public static function findAllWithSkillDesc()
	{
		 $db = Database::getInstance();
            //creacion de un array
			$favs = Array();
            try {			
                $pstmt = $db->prepare("SELECT idRequest, description_request, description, title, 
				    dateRequest, dateService, location, status, r1.idMember, username FROM request r1 INNER JOIN members m1 on r1.idMember=m1.idMember 
					INNER JOIN skills s1 on r1.skillWanted=s1.idSkills where r1.status='ouverte'");
                $pstmt->execute();

                while ($result = $pstmt->fetch(PDO::FETCH_OBJ))
                {
                        $req = new Request();
                        $req->loadFromObject1($result);
                        array_push($favs, $req);
                }
                $pstmt->closeCursor();
                $pstmt = NULL;
                Database::close();
            }
            catch (PDOException $ex){
            }             
            return $favs;
    }
    
    public static function findByKeyword($keyword)
	{
		 $db = Database::getInstance();
            //creacion de un array
			$favs = Array();
            try {			
                $pstmt = $db->prepare("SELECT idRequest, description_request, description, title, 
				    dateRequest, dateService, location, status, r1.idMember, username FROM request r1 INNER JOIN members m1 on r1.idMember=m1.idMember 
					INNER JOIN skills s1 on r1.skillWanted=s1.idSkills where r1.status='ouverte' AND (r1.title LIKE :k OR r1.description_request LIKE :k)");
                $pstmt->execute(array(':k'=> "%".$keyword."%"));

                while ($result = $pstmt->fetch(PDO::FETCH_OBJ))
                {
                        $req = new Request();
                        $req->loadFromObject1($result);
                        array_push($favs, $req);
                }
                $pstmt->closeCursor();
                $pstmt = NULL;
                Database::close();
            }
            catch (PDOException $ex){
            }             
            return $favs;
	}

    public function findThreeLast() {
        $db = Database::getInstance();
        $requests = Array();

        try{
            $pstmt = $db->prepare("SELECT * FROM request ORDER BY dateRequest LIMIT 3");
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

	 public function findLast() {
        $db = Database::getInstance();

        try {			
            $pstmt = $db->prepare("SELECT * FROM request ORDER BY idRequest DESC LIMIT 1");
            $pstmt->execute();

            $result = $pstmt->fetch(PDO::FETCH_OBJ);

            if($result) {
                $o = new Request();
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
        $requests = Array();

        try{
            $pstmt = $db->prepare("SELECT * FROM request WHERE idMember=:id and status='ouverte'");
            $pstmt->execute(array(':id'=> $idMember));

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
	
	public function updateFermee($idRequest) {
        $db = Database::getInstance();
        $n = 0;
		$status="fermee";
        try{
            $pstmt = $db->prepare("UPDATE request SET status=:s WHERE idRequest=:idRequest");
            $n = $pstmt->execute(array(':s' => $status,
									':idRequest' => $idRequest));
            
            $pstmt->closeCursor();
            $pstmt = NULL;
            Database::close();                                 
        }
        catch (PDOException $ex){
        }           
        return $n;
    }
	
	 public function findByIdMemberFermees($idMember) {
        $db = Database::getInstance();
        $requests = Array();

        try{
            $pstmt = $db->prepare("SELECT * FROM request WHERE idMember=:id and status='fermee'");
            $pstmt->execute(array(':id'=> $idMember));

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
	
	 public function findByIdMemberCompletees($idMember) {
        $db = Database::getInstance();
        $requests = Array();

        try{
            $pstmt = $db->prepare("SELECT r.*, m.username, m.photo_path, s.description from request r 
			INNER JOIN offerRequest o on o.idRequest=r.idRequest 
			INNER JOIN members m on m.idMember=o.idMember 
			INNER JOIN skills s on s.idSkills=r.skillWanted WHERE r.idMember=:id and r.status='fermee'");
            $pstmt->execute(array(':id'=> $idMember));

            while($result = $pstmt->fetch(PDO::FETCH_OBJ)) {
                $r = new Request();
                $r->loadFromObject2($result);
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

    public static function findIdSkill($idRequest)
	{
		 $db = Database::getInstance();
          $favs = Array();
            try {			
                $pstmt = $db->prepare("SELECT idRequest, description_request, description, title, 
				    dateRequest, dateService, location, status, r1.idMember, username FROM request r1 INNER JOIN members m1 on r1.idMember=m1.idMember 
					INNER JOIN skills s1 on r1.skillWanted=s1.idSkills WHERE idRequest=:idRequest");
                 $pstmt->execute(array(':idRequest'=> $idRequest));
			
                while ($result = $pstmt->fetch(PDO::FETCH_OBJ))
                {
                        $req = new Request();
                        $req->loadFromObject1($result);
                        array_push($favs, $req);
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