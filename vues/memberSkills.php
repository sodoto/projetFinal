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
	<title>Inscrition - Compétences</title>
</head>

<body>
	<div>
		<?php
			include("banner.php");
		?>
		<main>
			<article>
				<section>
					<h1 id="heading1">Voulez-vous aider les autres? Dites-nous vos compétences</h1>
					<p id="par1">
						<strong>Si pour le moment vous ne pouvez pas aider les autres ne vous inquiétez pas, continuez simplement.</strong>
					</p> 
					<p id="par1">
						<strong>Si vous changez d'avis plus tard vous pouvez ajouter des compétences dans vos préferences</strong>
					</p>
					<form action="" method="POST" class="formLogin">
						<label class="slider-label">Déplacement d'objets</label>
						<label class="switch">
							<input type="checkbox" name="deObj" value="deObj" >
							<div class="slider round"></div>
						</label>
						<br>
						<label class="slider-label">Peinture(art)</label>
						<label class="switch">
							<input type="checkbox"  name="peintA" value="peintA">
							<div class="slider round"></div>
						</label>
						<br>
						<label class="slider-label">Peinture(murs et objets similaires)</label>
						<label class="switch">
							<input type="checkbox" name="peintO" value="peintO">
							<div class="slider round"></div>
						</label>
						<br>
						<label class="slider-label">Traduction</label>
						<label class="switch">
							<input type="checkbox" name="trad" value="trad">
							<div class="slider round"></div>
						</label>
						<br>
						<label class="slider-label">Nettoyage</label>
						<label class="switch">
							<input type="checkbox" name="nett" value="nett">
							<div class="slider round"></div>
						</label>
						<br>
						<label class="slider-label">Transport d'objets</label>
						<label class="switch">
							<input type="checkbox" name="transp" value="transp">
							<div class="slider round"></div>
						</label>
						<br>
						<label class="slider-label">Accompagnement</label>
						<label class="switch">
							<input type="checkbox" name="acomp" value="acomp">
							<div class="slider round"></div>
						</label>
						<br>
						<label class="slider-label">Enseignement</label>
						<label class="switch">
							<input type="checkbox" name="ense" value="ense">
							<div class="slider round"></div>
						</label>
						<br>
						<label class="slider-label">Organisation</label>
						<label class="switch">
							<input type="checkbox"name="org" value="org">
							<div class="slider round"></div>
						</label>
						<br>
						<label class="slider-label">Cuisine</label>
						<label class="switch">
							<input type="checkbox" name="cuis" value="cuis">
							<div class="slider round"></div>
						</label>
						<br>
						<label class="slider-label">Accompagnement en voiture</label>
						<label class="switch">
							<input type="checkbox" name="cond" value="cond">
							<div class="slider round"></div>
						</label>
						<br>
						<label class="slider-label">Réparation</label>
						<label class="switch">
							<input type="checkbox" name="rep" value="rep">
							<div class="slider round"></div>
						</label>
						<br>
						<input name="action" value="memberSkills" type="hidden" />
						<button type="submit" name="submit" value="submit" >Enregistrer</button>
						<button type="reset" name="reset" value="reset"  >Réinitialiser les boutons</button>
					</form>
				</section>
			</article>
		</main>
			
		<?php
			include("footer.php");
		?>
	</div>
</body>
</html>
