<?php
require_once('./controleur/Action.interface.php');
require_once('./modele/RequestDAO.class.php');
class AfficherRequestAction implements Action {
	public function execute(){
		if (!ISSET($_SESSION)) session_start();
		
		if (!ISSET($_SESSION["connected"])){  //ici on peut bloquer que quelqu'un qui n'est pas enregistré puisse voir les requêtes
			return "login";  
		}
		if(ISSET($_REQUEST["search"]))
		{
		$_SESSION["searchKeyword"] = $_REQUEST["searchKeyword"];
		return "afficherRequest";
		}
		
		if (ISSET($_REQUEST["setNbParPage"]))	//EL USUARIO SELECCIONÓ EL NUMERO DE RESULTADOS PARA MOSTRAR POR PAGINA l'utilisateur a cliqué sur le bouton Go
		{
			$_REQUEST['numPage'] = 1;
			//LA VARIABLE taillePage TOMA EL RESULTADO DEL FORMULARIO (NUMERO DE RESULTADOS POR PAGINA)
			$taillePage = $_REQUEST["nbParPage"];
			$dao = new RequestDAO();
			$liste = $dao->findAllWithSkillDesc();
			//TOTAL DE REGISTROS EN LA LISTA
			$nbResultats = sizeof($liste);
			
			//DECLARACION DE UN ARRAY PARA ALMANECAR LAS VARIOABLES DE SESSION DE LA NAVEGACION 
			$_SESSION["navig"] = array();
			//CREACION DE LA PRIMERA VARIABLE DE NAVEGACION ["navig"]["nbResultats"] = TAMAÑO TOTAL DE RESULTADOS DE LA BASE DE DATOS
			$_SESSION["navig"]["nbResultats"] = $nbResultats;
			//CREACION DE LA SEGUNDA VARIABLE DE NAVEGACION ["navig"]["taillePage"] = NUMERO DE REGISTROS POR PAGINA
			$_SESSION["navig"]["taillePage"] = $taillePage;
			//CREACION DE LA TERCERA VARIABLE DE NAVEGACION ["navig"]["nbPages"] = CANTIDAD DE PAGINAS RESULTANTES DE ACUERDO A INPUT DEL USUARIO
			//(int) REDONDEA EL VALOR. SE DEBE RESTAR Y SUMAR 1 PARA PODER REDONDEAR HACIA ARRIBA PARA NO DEJAR LOS ULTIMOS REGISTROS SIN PAGINA 
            $_SESSION["navig"]["nbPages"] = (int)(($_SESSION["navig"]["nbResultats"]-1)/$taillePage)+1;
		}
		
		return "afficherRequest";
		
					
		
	}
}
