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
	<title>Demande complétée</title>
</head>

<body>
	<div class="d-flex flex-column align-content-stretch bd-highlight" style="height: 100vh;">
		<?php
			include("banner.php");
			//include("menu.php");
		?>

		<div class="d-flex flex-column align-items-center bd-highlight flex-grow-1">
			<h2>Mes demandes complétées</h2>
			<?php
				require_once('/modele/RequestDAO.class.php');
				$daoRequest = new RequestDAO();
				if((ISSET($_SESSION["erreurRequest"]) && $_SESSION["erreurRequest"] == true))
				{
			?>
			<div class="container">
				<div class="alert alert-info alert-dismissible">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Attention!</strong> Vous ne pouvez pas modifier cette demande!
				</div>
			</div>
			<?php
				$_SESSION["erreurRequest"] = false;
				}
			?>

			<div class="accordion" id="accordionRequest" role="tablist">
				<?php
					$tRequest = $daoRequest->findByIdMemberCompletees($_SESSION["idMember"]);
					 
					$ariaExpanded = "true";
					$collapsedShow = "show";
					$collapsed = "";
					date_default_timezone_set('America/Toronto');
					if(empty($tRequest)){
						echo "Vous n'avez aucune demande!";
					}
					else{
						foreach($tRequest as $request) {
							$dateRequest = date_create($request->getDateRequest());
							$dateService = date_create($request->getDateService());
							
				?>
				<div class="card">
					<h4 class="card-header text-left" role="tab" id="heading<?=$request->getIdRequest()?>">
						<a class="<?=$collapsed?> d-block " style="color:#444"  data-toggle="collapse" href="#collapse<?=$request->getIdRequest()?>"  aria-expanded="<?=$ariaExpanded?>" aria-controls="collapse<?=$request->getIdRequest()?>">
							<span>
							<i class="fa fa-chevron-down float-right"></i><?=$request->getTitle()?>
							</span>
						</a>
					</h4>
				
					<div id="collapse<?=$request->getIdRequest()?>" class="collapse <?=$collapsedShow?>" aria-labelledby="heading<?=$request->getIdRequest()?>" data-parent="#accordionRequest">
						<div class="card-body">
							Date du service: <?=date_format($dateService, "d/m/Y")?> <br/>
							Date de la demande: <?=date_format($dateRequest, "d/m/Y")?> <br/>
							Location: <?=$request->getLocation()?> <br/>
							Status: <?=$request->getStatus()?> <br/>
							Membre qui a aidé: <?=$request->getUsername()?> <br/>
							<img src="./images/member/<?=$request->getPhoto_path()?>" alt="avatar" class="avatar rounded-circle "  height="100px!important">
						</div>
						<div class="card-footer text-right">
							<a href='?action=editRequest&idRequest=<?=$request->getIdRequest()?>' title='&eacute;diter'><i class="far fa-edit"></i></a>
							<a href='?action=suppRequest&idRequest=<?=$request->getIdRequest()?>' title='effacer'><i class="far fa-trash-alt"></i></a>
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
		<div >
			<?php
				include("footer.php");
			?>
		</div>
	</div>
</body>
</html>