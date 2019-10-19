<?php
require_once('/classes/Database.class.php');
require_once('/classes/Member.class.php');

class MemberDAO
{
    public function create($member) {
        $db = Database::getInstance();
        $n = 0;

        try{
            $pstmt = $db->prepare("INSERT INTO members (firstName,lastName,city,email,username,password)
                                    VALUES (:fn,:ln,:c,:e,:u,:p)");
            $n = $pstmt->execute(array(':fn' => $member->getFirstname(),
                                       ':ln' => $member->getLastname(),
                                       ':c' => $member->getCity(),
                                       ':e' => $member->getEMail(),
                                       ':u' => $member->getUsername(),
                                       ':p' => $member->getPassword()));

            $pstmt->closeCursor();
            $pstmt = NULL;
            Database::close();
        }
        catch (PDOException $ex){
        }           
        return $n;	
    }

    public function createWithProfilPicture($member) {
        $db = Database::getInstance();
        $n = 0;

        try{
            $pstmt = $db->prepare("INSERT INTO members (firstName,lastName,city,photo_path,email,username,password)
                                    VALUES (:fn,:ln,:c,:ph,:e,:u,:p)");
            $n = $pstmt->execute(array(':fn' => $member->getFirstname(),
                                       ':ln' => $member->getLastname(),
                                       ':ph' => $member->getPhoto(),
                                       ':c' => $member->getCity(),
                                       ':e' => $member->getEMail(),
                                       ':u' => $member->getUsername(),
                                       ':p' => $member->getPassword()));

            $pstmt->closeCursor();
            $pstmt = NULL;
            Database::close();
        }
        catch (PDOException $ex){
        }           
        return $n;	
    }

    public function update($member) {
        $db = Database::getInstance();
        $n = 0;

        try{
            $pstmt = $db->prepare("UPDATE members SET firstName=:fn ,lastName=:ln ,city=:c ,email=:e, username=:u WHERE idMember=:id");
            $n = $pstmt->execute(array(':fn' => $member->getFirstname(),
                                       ':ln' => $member->getLastname(),
                                       ':c' => $member->getCity(),
                                       ':e' => $member->getEMail(),
                                       ':u' => $member->getUsername(),
                                       ':id' => $member->getIdMember())); 
            
            $pstmt->closeCursor();
            $pstmt = NULL;
            Database::close();                                 
        }
        catch (PDOException $ex){
        }           
        return $n;
    }

    public function updateWithProfilPicture($member) {
        $db = Database::getInstance();
        $n = 0;

        try{
            $pstmt = $db->prepare("UPDATE members SET firstName=:fn ,lastName=:ln ,city=:c ,email=:e, username=:u, photo_path=:ph WHERE idMember=:id");
            $n = $pstmt->execute(array(':fn' => $member->getFirstname(),
                                       ':ln' => $member->getLastname(),
                                       ':c' => $member->getCity(),
                                       ':e' => $member->getEMail(),
                                       ':u' => $member->getUsername(),
                                       ':ph' => $member->getPhoto(),
                                       ':id' => $member->getIdMember())); 
            
            $pstmt->closeCursor();
            $pstmt = NULL;
            Database::close();                                 
        }
        catch (PDOException $ex){
        }           
        return $n;
    }

    public function updatePassword($member) {
        $db = Database::getInstance();
        $n = 0;

        try{
            $pstmt = $db->prepare("UPDATE members SET password=:p WHERE idMember=:id");
            $n = $pstmt->execute(array(':p' => $member->getPassword(),
                                       ':id' => $member->getIdMember())); 
            
            $pstmt->closeCursor();
            $pstmt = NULL;
            Database::close();                                 
        }
        catch (PDOException $ex){
        }           
        return $n;
    }

    public function delete($member) {
        $db = Database::getInstance();
        $n = 0;

        try{
            $pstmt = $db->prepare("DELETE FROM members WHERE idMember=:id");
            $n = $pstmt->execute(array(':id' => $member->getIdMember()));

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
        $members = Array();

        try{
            $pstmt = $db->prepare("SELECT * FROM members");
            $pstmt->execute();

            while($result = $pstmt->fetch(PDO::FETCH_OBJ)) {
                $m = new Member();
                $m->loadFromObject($result);
                array_push($members, $m);
            }

            $pstmt->closeCursor();
            $pstmt = NULL;
            Database::close();
        }
        catch (PDOException $ex){
        }           
        return $members;
    }

    public function find($id) {
        $db = Database::getInstance();

        try{
            $pstmt = $db->prepare("SELECT * FROM members WHERE idMember=:id");
            $pstmt->execute(array(':id'=>$id));

            $result = $pstmt->fetch(PDO::FETCH_OBJ);

            if($result) {
                $m = new Member();
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
	
	public function findUser($username) {
        $db = Database::getInstance();

        try{
            $pstmt = $db->prepare("SELECT * FROM members WHERE username=:username");
            $pstmt->execute(array(':username'=>$username));

            $result = $pstmt->fetch(PDO::FETCH_OBJ);

            if($result) {
                $m = new Member();
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

    public function findByEmailOrUsername($email) {
        $db = Database::getInstance();

        try{
            $pstmt = $db->prepare("SELECT * FROM members WHERE email=:e OR username=:e");
            $pstmt->execute(array(':e'=> $email));

            $result = $pstmt->fetch(PDO::FETCH_OBJ);

            if($result) {
                $m = new Member();
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
	
	 public function findEmailById($idMember) {
        $db = Database::getInstance();

        try{
            $pstmt = $db->prepare("SELECT email FROM members WHERE idMember=:e");
            $pstmt->execute(array(':e'=> $idMember));

            $result = $pstmt->fetch(PDO::FETCH_OBJ);

            if($result) {
                $m = new Member();
                $m->loadFromObject2($result);
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