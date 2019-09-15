<?php
require_once('/classes/Database.class.php');
require_once('/classes/Memberskills.class.php');

class MemberSkillsDAO
{
    public function create($memberSkills) {
        $db = Database::getInstance();
        $n = 0;

        try{
            $pstmt = $db->prepare("INSERT INTO memberskills (idMember,idSkill)
                                    VALUES (:idm,:ids)");
            $n = $pstmt->execute(array(':idm' => $memberSkills->getIdMember(),
                                       ':ids' => $memberSkills->getIdSkill()));

            $pstmt->closeCursor();
            $pstmt = NULL;
            Database::close();
        }
        catch (PDOException $ex){
        }           
        return $n;	
    }

    public function delete($memberSkills) {
        $db = Database::getInstance();
        $n = 0;

        try{
            $pstmt = $db->prepare("DELETE FROM memberskills WHERE idSkill=:ids AND idMember=:idm");
            $n = $pstmt->execute(array(':ids' => $memberSkills->getIdSkill(),
                                       ':idm' => $memberSkills->getIdMember()));

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
        $memberskills = Array();

        try{
            $pstmt = $db->prepare("SELECT * FROM memberskills");
            $pstmt->execute();

            while($result = $pstmt->fetch(PDO::FETCH_OBJ)) {
                $ms = new MemberSkills();
                $ms->loadFromObject($result);
                array_push($memberskills, $ms);
            }

            $pstmt->closeCursor();
            $pstmt = NULL;
            Database::close();
        }
        catch (PDOException $ex){
        }
        return $memberskills;      
    }

    public function findByIdMember($id) {
        $db = Database::getInstance();

        try{
            $pstmt = $db->prepare("SELECT * FROM memberskills WHERE idMember=:id");
            $pstmt->execute(array(':id'=$id));

            while($result = $pstmt->fetch(PDO::FETCH_OBJ)) {
                $ms = new MemberSkills();
                $ms->loadFromObject($result);
                array_push($memberskills, $ms);
            }

            $pstmt->closeCursor();
            $pstmt = NULL;
            Database::close();
        }
        catch (PDOException $ex){
        }           
        return $memberskills;
    }

    public function findByIdSkill($id) {
        $db = Database::getInstance();

        try{
            $pstmt = $db->prepare("SELECT * FROM memberskills WHERE idSkill=:id");
            $pstmt->execute(array(':id'=$id));

            while($result = $pstmt->fetch(PDO::FETCH_OBJ)) {
                $ms = new MemberSkills();
                $ms->loadFromObject($result);
                array_push($memberskills, $ms);
            }

            $pstmt->closeCursor();
            $pstmt = NULL;
            Database::close();
        }
        catch (PDOException $ex){
        }           
        return $memberskills;
    }
}