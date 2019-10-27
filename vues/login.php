<?php 
if (!ISSET($_SESSION)) {
    session_start();
}

$u = "";
if (ISSET($_REQUEST["email"]))
	$u = $_REQUEST["email"];
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
	<title>Connexion</title>
</head>

<body>
	<div class="d-flex flex-column align-content-stretch bd-highlight" style="height: 100vh;">
		<?php
			include("/vues/banner.php");
		?>
		
		<div class="d-flex flex-row justify-content-center align-items-center bd-highlight flex-grow-1">
			<form action="" method="POST" class="formLogin">
				<h1>Login</h1>

				<input type="text" id="inputEmail" class="Input-Login" name="email" placeholder="Courrier &eacute;lectronique ou Nom d'utilisateur" value="<?=$u?>">
				<?php 
					if (ISSET($_REQUEST["field_messages"]["email"]))
					{
				?>
					<span class="warningMessage"><?=$_REQUEST["field_messages"]["email"]?></span><br /><br />
				<?php
					}
				?>
				<input type="text" class="Input-Login" style="display:none">
				<input type="password" class="Input-Login" style="display:none">
				<input type="password" class="Input-Login" name="password" placeholder="Mot de passe">
				<?php 
					if (ISSET($_REQUEST["field_messages"]["password"]))
					{
				?>
					<span class="warningMessage"><?=$_REQUEST["field_messages"]["password"]?></span><br /><br />
				<?php
					}
				?>

				<input name="action" value="connecter" type="hidden" />
				<button type="submit" class="btn btn2 btn-lg btn-block text-uppercase">Se Connecter</button>
				<br /><br /><br />
				<a class="text-dark1" href="?action=signup">Pas inscrit? Créer un compte</a>
			</form>
		</div>
		
		<?php
			include("/vues/footer.php");
		?>
</body>
</html>