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
		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<title>Page d'accueil</title>
	</head>

<body>
	<div>
	<?php
		include("/vues/banner.php");
	?>
	</div>
    
    <div class="container">
    <form action="" method="POST" class="formLogin">
        <h1>LOGIN</h1>

		<input type="email" class="Input-Login" name="email" placeholder="Courrier &eacute;lectronique" value="<?=$u?>">
		<?php 
			if (ISSET($_REQUEST["field_messages"]["email"]))
			{
		?>
			<span class="warningMessage"><?=$_REQUEST["field_messages"]["email"]?></span><br /><br />
		<?php
			}
		?>
		<input type="password" class="Input-Login" name="password" placeholder="Mot de passe">
		<?php 
			if (ISSET($_REQUEST["field_messages"]["password"]))
			{
		?>
			<span class="warningMessage"><?=$_REQUEST["field_messages"]["password"]?></span><br /><br />
		<?php
			}
		?>
        <span style="float:right;">
        <button type="submit" href="?action=connecter" class="btn2">Entrer</button>
        <button type="reset"href="#" class="btn2">Vider</button>
        </span>
        </br></br></br>
            <!--<button type="button" href="?action=signin" class="btn3 btn-lg btn-block"><a style="line-height: 1px;" class="text-dark1">Pas inscrit? Créer un compte</a></button>-->
            <a class="text-dark1" href="?action=signin">Pas inscrit? Créer un compte</a>
    </form>
	
    </div>
	<div>
	<?php
		include("/vues/footer.php");
	?>
	</div>
</body>
</html>