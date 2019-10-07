<?php
	if(!ISSET($_SESSION))
	{
		session_start();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Language" content="en-ca">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel="stylesheet" href="./css/style.css" type="text/css" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script type="text/javascript" src="./javascript/javascript.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<title>Mes offres</title>
</head>

<body>
	<!-- Div contenant les informations de la demande qui sera selectionné (caché au démarrage) -->
	<div id="myNav" class="overlay">
		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		<?php
			require_once('/modele/RequestDAO.class.php');
		?>
		<div class="overlay-content" id="afficheRequest">
			<div class="card ">
				<div class="card-header">
				<span id="title"><span>
				</div>
				<div class="card-body">
					Date de la demande: <span id="dateRequest"></span> <br/>
					Date demandé du service: <span id="dateService"></span> <br/>
					Location: <span id="location"></span> <br/>
					Status: <span id="status"></span> <br/>
					Habileté demandée: <span id="description"></span> <br/>
				</div>
			</div>
		</div>
	</div>

	<div class="d-flex flex-column align-content-stretch bd-highlight" style="height: 100vh;">
		<?php
			include("banner.php");
			//include("menu.php");
		?>

		<div class="d-flex flex-column align-items-center bd-highlight flex-grow-1">
			<h2>MES OFFRES</h2>
			<div class="accordion" id="accordionRequest" role="tablist">
				<?php
					require_once('/modele/OfferRequestDAO.class.php');
					require_once('/modele/RequestDAO.class.php');
					require_once('/modele/SkillsDAO.class.php');
					$daoOfferRequest = new OfferRequestDAO();
					$daoRequest = new RequestDAO();
					$daoSkill = new SkillsDAO();
					$tOfferRequest = $daoOfferRequest->findByIdMember($_SESSION["idMember"]);
					$ariaExpanded = "true";
					$collapsedShow = "show";
					$collapsed = "";
					date_default_timezone_set('America/Toronto');
					if(empty($tOfferRequest)){
						echo "Vous n'avez aucune offre!";
					}
					else{
						$trequest = Array();
						foreach($tOfferRequest as $offerRequest) {
							$dateOffer = date_create($offerRequest->getDateOffer());
							$request = $daoRequest->find($offerRequest->getIdRequest());
							$skillDesc = $daoSkill->find($request->getSkillWanted());
							$dateRequestService = date_create($request->getDateService());
							$dateRequest = date_create($request->getDateRequest());
							$trequest[] = array(
								"idRequest" => $request->getIdRequest(),
								"skill" => utf8_encode($skillDesc->getDescription()),
								"title" => $request->getTitle(),
								"dateRequest" => date_format($dateRequest, "d/m/Y H:i:s"),
								"dateService" => date_format($dateRequestService, "d/m/Y"),
								"location" => $request->getLocation(),
								"status" => $request->getStatus(),
								"idMember" => $request->getIdMember()
								);
				?>
				<div class="card">
					<h4 class="card-header text-left" role="tab" id="heading<?=$offerRequest->getIdOffer()?>">
						<a class="<?=$collapsed?> d-block " style="color:#444"  data-toggle="collapse" href="#collapse<?=$offerRequest->getIdOffer()?>"  aria-expanded="<?=$ariaExpanded?>" aria-controls="collapse<?=$offerRequest->getIdOffer()?>">
							<span>
							<i class="fa fa-chevron-down float-right"></i><?=$request->getTitle()?>
							</span>
						</a>
					</h4>
				
					<div id="collapse<?=$offerRequest->getIdOffer()?>" class="collapse <?=$collapsedShow?>" aria-labelledby="heading<?=$offerRequest->getIdOffer()?>" data-parent="#accordionRequest">
						<div class="card-body">
							<a href="#" onclick="openNav(this,json)" data-id="<?=$request->getIdRequest()?>" title="Voir la demande">Voir la requête</a><br/>
							Date de l'offre: <?=date_format($dateOffer, "d/m/Y")?> <br/>
							Commentaire: <?=$offerRequest->getComment()?> <br/>
							Status: <?=$offerRequest->getStatus()?> <br/>
						</div>
						<div class="card-footer text-right">
							<a href="?action=detailOffer&offerSelected=<?=$offerRequest->getIdOffer()?>" ><i class="fas fa-comments"></i></a>
						</div>
					</div>
				</div>
					<?php
							$ariaExpanded = "false";
							$collapsedShow = "";
							$collapsed = "collapsed";
                        }
					}
					?>
				
			</div>
		</div>

		<div>
			<?php
				include("footer.php");
			?>
		</div>
	</div>
	<!-- Encodage du tableau php contenant les demandes en objet JSON -->
	<script type="text/javascript">
		var json = <?=json_encode($trequest)?>;
	</script>
</body>
</html>