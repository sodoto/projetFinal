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
			
			<?php
				require_once('/modele/MessageDAO.class.php');
				$dao = new MessageDAO();
				
			?>	
			<h2> LISTE DE MESSAGES</h3>
			<?php //echo $_SESSION["idMember"] ?>
			<table class="table">
				<thead class="thead-light">
					<tr>
						<td>DATE D'ENVOI</td>
						<td>USERNAME</td>
						<td>TITLE</td>
						<td>STATUS</td>
						<td>ACCEDER</td>
						
					</tr>
				</thead>
				<tbody>
					<?php
						$tRequest = $dao->findMemberMessages($_SESSION['idMember']);
						foreach($tRequest as $request) {
					?>
					<tr>
						<td><?=$request->getDateHeure()?></td>
						<td><?=$request->getUsername()?></td>
						<td><?=$request->getTitle()?></td>
						<td><?=$request->getMessageLu()?></td>
						<td>						
						   
							<a href="?action=afficherConversations&IdMessage=<?=$request->getIdMessage()?>">Message!</a> 
						</td>
					</tr>
					<?php  
					}
					?>
				</tbody>
			</table>
		</div>
		<div class="mt-auto">
			<?php
				include("footer.php");
			?>
		</div>
</body>
</html>