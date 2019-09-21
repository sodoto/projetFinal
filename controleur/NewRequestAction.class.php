<?php
require_once('./controleur/Action.interface.php');
require_once('/modele/RequestDAO.class.php');
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