<?php
	if (!ISSET($_SESSION)) session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Language" content="en-ca">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" href="./css/style.css" type="text/css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<title>Page d'accueil</title>
	</head>

<body >
	<div class="d-flex flex-column align-content-stretch bd-highlight" style="height: 100vh;">
			<?php
				include("/vues/banner.php");
			?>
		<div>
			<div class="d-flex flex-column align-items-center bd-highlight" style="background-image: url('./images/hand.jpg'); height: 500px; background-size: cover; padding:10px">
				<h2 style="color:white">Les demandes récentes</h2>
				<div class="card-deck" style="width: 60%; padding-top: 30px;">
					<?php
						require_once('/modele/AfficherRequestDAO.class.php');
						$dao = new RequestDAO();
						$tRequest = $dao->findThreeLast();
						foreach($tRequest as $request) {
					?>
					<div class="card"  style="width: 18rem;">
						<img src="./images/paint.jpg" class="card-img-top" alt="...">
						<div class="card-body">
							<h5 class="card-title"><?=$request->getTitle()?></h5>
							<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
						</div>
					</div>
					<?php
						}
					?>
				</div>
			</div>
			<div class="d-flex flex-column align-items-center bd-highlight" style="padding: 20px">
				<h2>Témoignages</h2>
				<div class="card mb-3" style="max-width: 540px; height: 150px; font-size: 12px;">
					<div class="row no-gutters">
						<div class="col-md-4">
							<img src="./images/robert.jpg" class="card-img rounded-circle" alt="..." style="width: 148px;">
						</div>
						<div class="col-md-8">
							<div class="card-body">
								<h5 class="card-title">Une expérience inoubliable!</h5>
								<p class="card-text">
									Après maintenant 3 demandes chez CommunAction, je le recommande à tous! J'ai reçu un service exceptionnel 
									par tous les bénévoles qui ont répondu à mes demandes.
								</p>
								<p class="card-text"><small class="text-muted">Robert - Terrebonne</small></p>
							</div>
						</div>
					</div>
				</div>
				<div class="card mb-3" style="max-width: 540px; height: 150px; font-size: 12px;">
					<div class="row no-gutters">
						<div class="col-md-4">
							<img src="./images/marie.jpg" class="card-img rounded-circle" alt="..." style="width: 148px;">
						</div>
						<div class="col-md-8">
							<div class="card-body">
								<h5 class="card-title">Merci à vous</h5>
								<p class="card-text">
									Votre service est exceptionnel, j'ai pu terminer de petits travaux dans ma maison malgré ma blessure à la jambe.
								</p>
								<p class="card-text"><small class="text-muted">Marie - Montréal</small></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			
		</div>
		<div class="mt-auto">
			<?php
				include("/vues/footer.php");
			?>
		</div>
	</div>
</body>
</html>
