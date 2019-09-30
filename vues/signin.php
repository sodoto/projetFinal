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
				$messageForm = "Vous avez déjà un compte?";
				
				if (ISSET($_REQUEST["global_message"]))
				$msg="<span class=\"warningMessage\">".$_REQUEST["global_message"]."</span>";
				
				$f = "";
				$l = "";
				$c = "";
				$e = "";
				$u = "";
				
				
				if (ISSET($_REQUEST["firstname"]))
					$f = $_REQUEST["firstname"];
				if (ISSET($_REQUEST["lastname"]))
					$l = $_REQUEST["lastname"];
				if (ISSET($_REQUEST["city"]))
					$c = $_REQUEST["city"];
				if (ISSET($_REQUEST["email"]))
					$e = $_REQUEST["email"];
				if (ISSET($_REQUEST["username"]))
					$u = $_REQUEST["username"];
				
			?>

			<div class="d-flex flex-row justify-content-center align-items-center bd-highlight flex-grow-1">
				<form action="" method="POST" class="formLogin" style="margin: 50px;">
					<h1>S'inscrire</h1>
					<input type="text" class="Input-Login" name="firstname" value="<?php echo $f?>" placeholder="Prenom"><br/>
					<?php if (ISSET($_REQUEST["field_messages"]["firstname"])) 
					echo "<span class=\"warningMessage\">".$_REQUEST["field_messages"]["firstname"]."</span>";
					?>
					<input type="text" class="Input-Login" name="lastname" value="<?php echo $l?>" placeholder="Nom"><br/>
					<?php if (ISSET($_REQUEST["field_messages"]["lastname"])) 
					echo "<span class=\"warningMessage\">".$_REQUEST["field_messages"]["lastname"]."</span>";
					?>
					<input type="text" class="Input-Login" name="city"  value="<?php echo $c?>" placeholder="Ville"><br/>
					<?php if (ISSET($_REQUEST["field_messages"]["city"])) 
					echo "<span class=\"warningMessage\">".$_REQUEST["field_messages"]["city"]."</span>";
					?>
					<input type="email" class="Input-Login" name="email" value="<?php echo $e?>" placeholder="Courrier &eacute;lectronique"><br/>
					<?php if (ISSET($_REQUEST["field_messages"]["email"])) 
					echo "<span class=\"warningMessage\">".$_REQUEST["field_messages"]["email"]."</span>";
					?>
					<input type="text" class="Input-Login" name="username" value="<?php echo $u?>" placeholder="Utilisateur"><br/>
					<?php if (ISSET($_REQUEST["field_messages"]["username"])) 
					echo "<span class=\"warningMessage\">".$_REQUEST["field_messages"]["username"]."</span>";
					?>
					<input type="text" class="Input-Login" style="display:none">
					<input type="password" class="Input-Login" style="display:none">
					
					<input type="password" class="Input-Login" name="password"  placeholder="Mot de passe"><br/>
					<?php if (ISSET($_REQUEST["field_messages"]["password"])) 
					echo "<span class=\"warningMessage\">".$_REQUEST["field_messages"]["password"]."</span>";
					?>
					<input type="password" class="Input-Login" name="password2"  placeholder="R&eacute;p&eacute;ter le mot de passe"><br/>
					<?php if (ISSET($_REQUEST["field_messages"]["password2"])) 
					echo "<span class=\"warningMessage\">".$_REQUEST["field_messages"]["password2"]."</span></br>";
					?>
					<button type="submit" class="btn btn-lg btn-block text-uppercase">S'inscrire</button>
						
					<br />
					<span class="text-dark1">Vous avez déjà un compte?</span>
					<a class="text-dark1" href="?action=connecter">Login</a>
				</form>
			</div>
			
		<?php
			include("footer.php");
		?>
		</div>
	</body>
</html>
