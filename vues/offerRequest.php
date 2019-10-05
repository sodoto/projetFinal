<?php
if (!ISSET($_SESSION))
	session_start();
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
	<title>Page d'accueil</title>
</head>

<body>
	<div class="d-flex flex-column align-content-stretch bd-highlight" style="height: 100vh;">
		<?php
			include("banner.php");
			//include("menu.php");
			
			if(isset($_REQUEST['IdRequest']))
{ 		
			//$IDRequest = $_REQUEST['IdRequest']; 
			$_SESSION["IDRequest"]= $_REQUEST['IdRequest']; 
			
}
		?>

		<div>
			<h2>Merci de votre intérêt à mettre vos compétences au service de quelqu'un</h2>
			
			<?php
				require_once('/modele/AfficherRequestDAO.class.php');
				$dao = new afficherRequestDAO();
			?>	
			<h2> Vous avez sélectionné la tâche suivante</h2>
			<br>
			<br>
			<?php //echo $_SESSION["idMember"] ?>
			<table class="table">
				<thead class="thead-light">
					<tr>
						<td>SKILL WANTED</td>
						<td>DESCRIPTION</td>
						<td>DATE REQUEST</td>
						<td>DATE OF SERVICE</td>
						<td>LOCATION</td>
						<td>STATUS</td>
						<td>USER</td>
						
					</tr>
				</thead>
				<tbody>
					<?php
					$skillWanted="";
					
						$tRequest = $dao->findIdSkill($_SESSION["IDRequest"]);
						foreach($tRequest as $request) {
							$_SESSION["skillWanted"]=$request->getSkillWanted();
							$_SESSION["title"]=$request->getTitle();
							$_SESSION["dateRequest"]=$request->getDateRequest();
							$_SESSION["dateService"]=$request->getDateService();
							$_SESSION["location"]=$request->getLocation();
							$_SESSION["status"]=$request->getStatus();
							$_SESSION["username"]=$request->getUsername();
						    $_SESSION["idRecepteur"]=$request->getIdMember();
						}
					?>
					<tr>
						<td><?php echo $_SESSION["skillWanted"]?></td>
						<td><?php echo $_SESSION["title"]?></td>
						<td><?php echo $_SESSION["dateRequest"] ?></td>
						<td><?php echo $_SESSION["dateService"]?></td>
						<td><?php echo $_SESSION["location"]?></td>
						<td><?php echo $_SESSION["status"]?></td>	
						<td><?php echo $_SESSION["username"]?></td>
						
						
						
						
					
				
					</tr>
					
				</tbody>
				
			</table>
		</div>
		
		<div>
		<br>
		<br>
		<h2> Envoyez un message à cet utilisateur pour lui dire comment vous pouvez l'aider</h2>
		</div>
		<form action="" method="POST" class="formLogin" >
		<textarea name="message" rows="5" cols="40" maxlength="200" >Écrivez votre message (200 caractères max)</textarea>
		
		<br>
		<input name="action" value="messageEnvoye" type="hidden" />
		<button type="submit" class="btn2">Continuer</button>
		</form>
			
			

			
		
		<div class="mt-auto">
			<?php
				include("footer.php");
			?>
		</div>
</body>
</html>
