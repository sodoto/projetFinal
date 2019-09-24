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
		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<title>Page d'accueil</title>
</head>

<body>
	<div class="d-flex flex-column align-content-stretch bd-highlight" style="height: 100vh;">
		<?php
			include("banner.php");
			//include("menu.php");
		?>

		<div>
			<h2>MES OFFRES</h2>
			<table class="table">
				<thead class="thead-light">
					<tr>
						<td>DEMANDE</td>
						<td>DATE DE L'OFFRE</td>
						<td>COMMENTAIRES</td>
						<td>STATUS</td>
						<td>ACTION</td>
					</tr>
				</thead>
				<tbody>
                    <?php
                        require_once('/modele/OfferRequestDAO.class.php');
                        $dao = new OfferRequestDAO();
						$tOfferRequest = $dao->findByIdMember($_SESSION["idMember"]);
						date_default_timezone_set('America/Toronto');
                        if(empty($tOfferRequest)){
                            echo "Vous n'avez aucune demande!";
                        }
                        else{
						    foreach($tOfferRequest as $offerRequest) {
								$dateOffer = date_create($offerRequest->getDateOffer());
					?>
					<tr>
						<td><?=$offerRequest->getIdRequest()?></td>
						<td><?=date_format($dateOffer, "d/m/Y")?></td>
						<td><?=$offerRequest->getComment()?></td>
						<td><?=$offerRequest->getStatus()?></td>
						<td>
							<a href='?action=editRequest&idRequest=<?=$offerRequest->getIdRequest()?>' title='&eacute;diter'><i class="far fa-edit"></i></a>
							<a href='?action=suppRequest&idRequest=<?=$offerRequest->getIdRequest()?>' title='effacer'><i class="far fa-trash-alt"></i></a>
							<!--Para que no aparezca el item de adicionar se puede hacer un campo hiden CAMBIAR PARA USAR CAMPO HIDEN-->
						</td>
					</tr>
                    <?php 
                            }
					    }
					?>
				</tbody>
			</table>
			<form action="" method="POST">
			<input name="action" value="newRequest" type="hidden" />
				<button type="submit">Nouvelle demande</button>
			</form>
		</div>
		<div class="mt-auto">
			<?php
				include("footer.php");
			?>
		</div>
	</div>
</body>
</html>