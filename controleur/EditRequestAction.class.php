<?php
require_once('./controleur/Action.interface.php');
require_once('/modele/RequestDAO.class.php');
require_once('/modele/classes/Request.class.php');
date_default_timezone_set('America/Toronto');

class EditRequestAction implements Action {
    public function execute(){
        if(!ISSET($_SESSION))
        {
            session_start();
        }
        if(!ISSET($_SESSION["connected"]))
        {
			return "default";
        }
        // if (!$this->valide())
		// {
		// 	return "editRequest";
		// }
        
        $_SESSION["requestEdited"] = false;

        $dao = new RequestDAO();
        $request = $dao->find($_REQUEST["idRequest"]);

        if ($request->getIdMember() != $_SESSION["idMember"])
        {
            $_SESSION["erreurRequest"] = true;
            return "myRequest";
        }
        
        if (ISSET($_REQUEST["sendEditForm"]))
        {
            if (!$this->valide())
            {
            	return "editRequest";
            }

            $editedRequest = new Request();
            $editedRequest -> setIdRequest($_REQUEST["idRequest"]);
            $editedRequest -> setTitle($_REQUEST["title"]);
            $editedRequest -> setDateService(date($_REQUEST["dateService"]));
            $editedRequest -> setLocation($_REQUEST["location"]);
            $editedRequest -> setStatus($_REQUEST["statut"]);
            $editedRequest -> setSkillWanted($_REQUEST["skills"]);

            $n = $dao -> update($editedRequest);

            if($n != 0)
            {
                $_SESSION["requestEdited"] = true;
            }

        }

        return "editRequest";
        


    }

    public function valide()
	{
		$result = true;
		if ($_REQUEST['title'] == "")
		{
			$_REQUEST["field_messages"]["title"] = "Inscrivez un titre";
			$result = false;
		}	
		if ($_REQUEST['dateService'] == "")
		{
			$_REQUEST["field_messages"]["dateService"] = "Inscrivez une date";
			$result = false;
        }
        if ($_REQUEST['location'] == "")
		{
			$_REQUEST["field_messages"]["location"] = "Inscrivez une ville";
			$result = false;
        }
        
		return $result;
	}
}