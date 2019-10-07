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
	<title>Page d'accueil</title>
</head>

<body>
	<div class="d-flex flex-column align-content-stretch bd-highlight" style="height: 100vh;">   
		<?php
			include("banner.php");
		
			require_once('/modele/RequestDAO.class.php');
			$dao = new RequestDAO();
			$ariaExpanded = "true";
			$collapsedShow = "show";
			$collapsed = "";
			require_once('/modele/MessageDAO.class.php');
			$daoM = new MessageDAO();
			$mesagesNonLus=$daoM->messageLuStatus($_SESSION["idMember"]);
		?>
		<!-- Affichage du nombres de messages non lus -->
		<div width="200px">
  			<a  href="?action=afficherMessages">Messages non lus </a><span class="badge badge-warning ml-2"><?=$mesagesNonLus?></span>
		</div>	

		<p>
			<h2> Demandes</h2>
			<h4>Découvrez comment vous pouvez venir en aide aux différents membres!</h4>
		</p>

		<div class="d-flex flex-row justify-content-center bd-highlight flex-grow-1">
			<div class="accordion" id="accordionRequest" role="tablist">
				<?php
					$tRequest = $dao->findAll();
					$now = date_create();
					foreach($tRequest as $request) {
						$dateRequest = date_create($request->getDateRequest());
						$dateDiff = date_diff($dateRequest,$now);
						$days = $dateDiff->format('%a');
						$dateService = date_create($request->getDateService());
						if($request->getIdMember() != $_SESSION["idMember"])
						{
				?>
				<div class="card">
					<h4 class="card-header text-left" role="tab" id="heading<?=$request->getIdRequest()?>" >
						<a class="<?=$collapsed?> d-block" style="color:#444" data-toggle="collapse" href="#collapse<?=$request->getIdRequest()?>"  aria-expanded="<?=$ariaExpanded?>" aria-controls="collapse<?=$request->getIdRequest()?>">
							<span>
								<i class="fa fa-chevron-down float-right"></i><?=$request->getTitle()?> <span class="text-muted" style="font-size: 12px"> Il y a <?=$days?> jours </span>
							</span>
						</a>
					</h4>

					<div id="collapse<?=$request->getIdRequest()?>" class="collapse <?=$collapsedShow?>" aria-labelledby="heading<?=$request->getIdRequest()?>" data-parent="#accordionRequest">
						<div class="card-body">
							Date du service demandé: <?=date_format($dateService, "d/m/Y")?> <br/>
							Date de la demande: <?=date_format($dateRequest, "d/m/Y")?> <br/>
							Location: <?=$request->getLocation()?> <br/>
							Status: <?=$request->getStatus()?> <br/>
							Habileté demandée: <?=$request->getSkillWanted()?> <br/>
						</div>
						<div class="card-footer text-right">
							<a href="?action=offerRequest&IdRequest=<?=$request->getIdRequest()?>">SOS Go!</a> 
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
		
		<div class="mt-auto">
			<?php
				include("footer.php");
			?>
		</div>
	</div>
</body>
</html>
