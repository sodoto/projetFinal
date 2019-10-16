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
	<title>Inscriptions</title>
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
				<h1>Modifier profil</h1>
				<small>Prénom</small>
				<input type="text" class="Input-Login" name="firstname" value="<?php echo $firstname?>" placeholder="Prenom"><br/>
				<?php if (ISSET($_REQUEST["field_messages"]["firstname"])) 
				echo "<span class=\"warningMessage\">".$_REQUEST["field_messages"]["firstname"]."</span>";
				?>
				<small>Nom</small>
				<input type="text" class="Input-Login" name="lastname" value="<?php echo $lastname?>" placeholder="Nom"><br/>
				<?php if (ISSET($_REQUEST["field_messages"]["lastname"])) 
				echo "<span class=\"warningMessage\">".$_REQUEST["field_messages"]["lastname"]."</span>";
				?>
				<small>Ville</small>
				<input type="text" class="Input-Login" name="city"  value="<?php echo $city?>" placeholder="Ville"><br/>
				<?php if (ISSET($_REQUEST["field_messages"]["city"])) 
				echo "<span class=\"warningMessage\">".$_REQUEST["field_messages"]["city"]."</span>";
				?>
				<small>Courrier électronique</small>
				<input type="email" class="Input-Login" name="email" value="<?php echo $email?>" placeholder="Courrier &eacute;lectronique"><br/>
				<?php if (ISSET($_REQUEST["field_messages"]["email"])) 
				echo "<span class=\"warningMessage\">".$_REQUEST["field_messages"]["email"]."</span>";
				?>
				<small>Nom d'utilisateur</small>
				<input type="text" class="Input-Login" name="username" value="<?php echo $username?>" placeholder="Utilisateur"><br/>
				<?php if (ISSET($_REQUEST["field_messages"]["username"])) 
				echo "<span class=\"warningMessage\">".$_REQUEST["field_messages"]["username"]."</span>";
				?>
				
				<input type="text" class="Input-Login" style="display:none">
				<input type="password" class="Input-Login" style="display:none">

				<small>Ancien mot de passe</small>
				<input type="password" class="Input-Login" name="oldPassword"  placeholder="Ancien mot de passe"><br/>
				<?php if (ISSET($_REQUEST["field_messages"]["oldPassword"])) 
				echo "<span class=\"warningMessage\">".$_REQUEST["field_messages"]["password"]."</span>";
				?>
				<small>Nouveau mot de passe</small>
				<input type="password" class="Input-Login" name="password"  placeholder="Nouveau mot de passe"><br/>
				<?php if (ISSET($_REQUEST["field_messages"]["password"])) 
				echo "<span class=\"warningMessage\">".$_REQUEST["field_messages"]["password"]."</span>";
				?>
				<small>Répéter le mot de passe</small>
				<input type="password" class="Input-Login" name="password2"  placeholder="R&eacute;p&eacute;ter le mot de passe"><br/>
				<?php if (ISSET($_REQUEST["field_messages"]["password2"])) 
				echo "<span class=\"warningMessage\">".$_REQUEST["field_messages"]["password2"]."</span></br>";
				?>
				<small>Photo de profil</small>
				<input type="file" id="inputfile" class="inputfile1" name="profilPicture" />
				<label onclick="changeTextFile()" for="inputfile"><span id="filename"><?=$photoName?></span><strong>Choisir un fichier</strong></label>

				<input type="hidden" name="sendEditProfil">
				<button type="submit" class="btn btn-lg btn-block text-uppercase">Modifier</button>
				<br />
			</form>
		</div>
		
		<?php
			include("footer.php");
		?>
	</div>
</body>
</html>
