<?php
require_once('./controleur/Action.interface.php');
require_once('/modele/RequestDAO.class.php');
require_once('/modele/RequestPhotosDAO.class.php');
require_once('/modele/classes/Request.class.php');
date_default_timezone_set('America/Toronto');

class NewRequestAction implements Action {
    public function execute(){
        if(!ISSET($_SESSION))
        {
            session_start();
        }
        if(!ISSET($_SESSION["connected"]))
        {
			return "default";
        }
        if (!ISSET($_REQUEST["title"])){
			return "newRequest";
		}
        if (!$this->valide())
		{
			//$_REQUEST["global_message"] = "Le formulaire contient des erreurs. Veuillez les corriger.";	
			return "newRequest";
        }
       
	   
	    
		
		
	
		//-----------------
        $request = new Request();
        $request -> setIdMember($_SESSION["idMember"]);
        $request -> setTitle($_REQUEST["title"]);
        $request -> setDateService(date($_REQUEST["dateService"]));
        $request -> setDateRequest(date('Y-m-d H:i:s'));
        $request -> setLocation($_REQUEST["location"]);
        $request -> setStatus("ouverte");
        $request -> setSkillWanted($_REQUEST["skills"]);

        $dao = new RequestDAO();

        $n = $dao -> create($request);


		//stocker les images dans le dossier
	
		$lastRequest = new Request();
		$lastRequest = $dao->findLast();
		$var = $lastRequest->getIdRequest();
		$date = date('Y-m-d H:i:s');
		
			$targetDir = "./images/imagesRequete/";
			$allowTypes = array('jpg','png','jpeg','gif');
			
			$statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
			if(!empty(array_filter($_FILES['files']['name']))){
				foreach($_FILES['files']['name'] as $key=>$val){
					// File upload path
					$fileName = basename($_FILES['files']['name'][$key]);
					$targetFilePath = $targetDir . $fileName;
					
					// Check whether file type is valid
					$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
					if(in_array($fileType, $allowTypes)){
						// Enregistrer dans le dossier
						if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){
							
							// Enregistrer l'info dans la BD requestPhotos

						$reqPhotos = new RequestPhotos();	
						$reqPhotos -> setNomFichier($fileName);
						$reqPhotos -> setDateUpLoad($date);
						$reqPhotos -> setIdRequestPhoto($var);	
												
						$daoPhoto = new RequestPhotosDAO();
						$daoPhoto -> create($reqPhotos);	
							
						}else{
							$errorUpload .= $_FILES['files']['name'][$key].', ';
						}
					}else{
						$errorUploadType .= $_FILES['files']['name'][$key].', ';
					}
				}
			
			}
		

        if($n != 0)
            {
                $_SESSION["requestCreated"] = true;
            }
			

        return "newRequest";
    }

    public function valide()
	{
		$result = true;
		if ($_REQUEST['title'] == "")
		{
			$_REQUEST["field_messages"]["title"] = "Donnez un titre";
			$result = false;
		}	
		if ($_REQUEST['location'] == "")
		{
			$_REQUEST["field_messages"]["location"] = "Donnez une ville";
			$result = false;
		}	
		return $result;
	}
}	
	