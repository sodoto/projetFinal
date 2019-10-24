<?php
require_once('./controleur/Action.interface.php');
require_once('/modele/RequestDAO.class.php');
require_once('/modele/OfferRequestDAO.class.php');
require_once('/modele/classes/Request.class.php');
date_default_timezone_set('America/Toronto');

class DeleteRequestAction implements Action {
    public function execute(){
        if(!ISSET($_SESSION))
        {
            session_start();
        }
        if(!ISSET($_SESSION["connected"]))
        {
			return "default";
        }
        
        $_SESSION["requestDeleted"] = false;

        $rdao = new RequestDAO();
        $offerdao = new OfferRequestDAO();
        $request = $rdao->find($_REQUEST["idRequest"]);
        
        if ($request == null || $request->getIdMember() != $_SESSION["idMember"])
        {
            $_SESSION["erreurRequest"] = true;
            return "myRequest";
        }

        // Vérifie si la demande n'as pas déjà des offres
        $resultOffer = $offerdao->findByIdRequest($request->getIdRequest());

        if(count($resultOffer) < 1)
        {
            $n = $rdao->delete($request);

            if($n > 0)
            {
                $_SESSION["requestDeleted"] = true;
            }
        }
        else
        {
            $_SESSION["erreurRequest"] = true;
        }

        return "myRequest";
    }
}