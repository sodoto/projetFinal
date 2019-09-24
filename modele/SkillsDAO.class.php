<?php
require_once('/classes/Database.class.php');
require_once('/classes/Skills.class.php');

class SkillsDAO
{
    public function create($skills) {
        $db = Database::getInstance();
        $n = 0;

        try{
            $pstmt = $db->prepare("INSERT INTO skills (idSkill,description)
                                    VALUES (:id,:d)");
            $n = $pstmt->execute(array(':id' => $skills->getIdSkill(),
                                       ':d' => $skills->getDescription()));

            $pstmt->closeCursor();
            $pstmt = NULL;
            Database::close();
        }
        catch (PDOException $ex){
        }           
        return $n;	
    }

    public function update($skills) {
        $db = Database::getInstance();
        $n = 0;

        try{
            $pstmt = $db->prepare("UPDATE skills SET description=:d WHERE idSkill=:id");
            $n = $pstmt->execute(array('id' => $skills->getIdSkill(),
                                       ':d' => $skills->getDescription()));
            
            $pstmt->closeCursor();
            $pstmt = NULL;
            Database::close();                                 
        }
        catch (PDOException $ex){
        }           
        return $n;
    }

    public function delete($skills) {
        $db = Database::getInstance();
        $n = 0;

        try{
            $pstmt = $db->prepare("DELETE FROM skills WHERE idSkill=:id");
            $n = $pstmt->execute(array(':id' => $skills->getIdSkill()));

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
        $skills = Array();

        try{
            $pstmt = $db->prepare("SELECT * FROM skills");
            $pstmt->execute();

            while($result = $pstmt->fetch(PDO::FETCH_OBJ)) {
                $s = new Skills();
                $s->loadFromObject($result);
                array_push($skills, $s);
            }

            $pstmt->closeCursor();
            $pstmt = NULL;
            Database::close();
        }
        catch (PDOException $ex){
        }           
        return $skills;
    }

    public function find($id) {
        $db = Database::getInstance();

        try{
            $pstmt = $db->prepare("SELECT * FROM skills WHERE idSkills=:id");
            $pstmt->execute(array(':id'=> $id));

            $result = $pstmt->fetch(PDO::FETCH_OBJ);

            if($result) {
                $m = new Skills();
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