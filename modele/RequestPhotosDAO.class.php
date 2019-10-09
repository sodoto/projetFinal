<?php
require_once('/classes/Database.class.php');
require_once('/classes/RequestPhotos.class.php');

class RequestPhotosDAO
{
    public function create($requestPhotos) {
        $db = Database::getInstance();
        $n = 0;

        try{

            $pstmt = $db->prepare("INSERT INTO requestphotos (nomFichier,dateUpLoad, idRequestPhoto)
                                    VALUES (:nf,:d,:idr)");		
			$n = $pstmt->execute(array(':nf' => $requestPhotos->getNomFichier(),
                                       ':d' => $requestPhotos->getDateUpLoad(),
									   ':idr' => $requestPhotos->getIdRequestPhoto()));

           
            $pstmt->closeCursor();
            $pstmt = NULL;
            Database::close();
        }
        catch (PDOException $ex){
        }           
        return $n;	
    }

   public function findByIdRequest($id) {
        $db = Database::getInstance();
        $photos = Array();

        try {			
            $pstmt = $db->prepare("SELECT nomFichier FROM requestphotos WHERE idRequestPhoto=:id");
            $pstmt->execute(array (':id' => $id));

            while ($result = $pstmt->fetch(PDO::FETCH_OBJ))
            {
                    $pic = new RequestPhotos();
                    $pic->loadFromObject1($result);
                    array_push($photos, $pic);
            }
            $pstmt->closeCursor();
            $pstmt = NULL;
            Database::close();
        }
        catch (PDOException $ex){
        }             
        return $photos;
    }

}


			