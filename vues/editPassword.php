<?php
require_once('/modele/MemberDAO.class.php');
	if (!ISSET($_SESSION)) session_start();

	$firstname = "";
	$lastname = "";
	$city = "";
	$email = "";
	$username = "";
	$photoName = "Photo de profil";
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
	<title>Modifier mot de passe</title>
</head>

<body>
	<div class="d-flex flex-column align-content-stretch bd-highlight" style="height: 100vh;">
		<?php
			include("banner.php");
			
			$daoM = new MemberDAO();
			$member = $daoM -> find($_SESSION["idMember"]);

			$firstname = $member->getFirstname();
			$lastname = $member->getLastName();
			$city = $member->getCity();
			$email = $member->getEmail();
			$username = $member->getUsername();
			$photoName = $member->getPhoto();
			
			
		?>

		<div class="d-flex flex-row justify-content-center align-items-center bd-highlight flex-grow-1">
			<form action="" method="POST" class="formLogin" style="margin: 50px;" enctype="multipart/form-data">
				<h1>Modifier mot de passe</h1>
				<small>Ancien mot de passe</small>
				<input type="password" class="Input-Login" name="oldPassword"  placeholder="Ancien mot de passe"><br/>
				<?php if (ISSET($_REQUEST["field_messages"]["oldPassword"])) 
					echo "<span class=\"warningMessage\">".$_REQUEST["field_messages"]["oldPassword"]."</span><br/>";
				?>
				<small>Nouveau mot de passe</small>
				<input type="password" class="Input-Login" name="newPassword"  placeholder="Nouveau mot de passe"><br/>
				<?php if (ISSET($_REQUEST["field_messages"]["newPassword"])) 
					echo "<span class=\"warningMessage\">".$_REQUEST["field_messages"]["newPassword"]."</span><br/>";
				?>
				<small>Répéter le mot de passe</small>
				<input type="password" class="Input-Login" name="newPassword2"  placeholder="R&eacute;p&eacute;ter le mot de passe"><br/>
				<?php if (ISSET($_REQUEST["field_messages"]["newPassword2"])) 
					echo "<span class=\"warningMessage\">".$_REQUEST["field_messages"]["newPassword2"]."</span></br>";
				?>
				<?php if (ISSET($_REQUEST["field_messages"]["passwordMissMatch"])) 
					echo "<span class=\"warningMessage\">".$_REQUEST["field_messages"]["passwordMissMatch"]."</span></br>";
				?>
			
				<input type="hidden" name="sendEditPassword">
				<button type="submit" class="btn btn2 btn-lg btn-block text-uppercase">Modifier</button>
				<br />
			</form>
		</div>
		
		<?php
			include("footer.php");
		?>
	</div>
</body>
</html>
