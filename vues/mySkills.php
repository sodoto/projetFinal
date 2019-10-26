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
	<title>Mes compétences</title>
</head>

<body>
	<div class="d-flex flex-column align-content-stretch bd-highlight" style="height: 100vh;">
		<?php
			include("banner.php");
			require_once('/modele/MemberSkillsDAO.class.php');
				$dao = new MemberSkillsDAO();
		?>

		<div id="div-competence" class="d-flex flex-column">
			<div id="cardCompetences" class="card text-white mb-3 d-inline-block" style="max-width: 25rem; background-color:#101820FF" >
				<div class="card-body">
					<h4 class="card-title">Mes compétences</h4>

					<div style="text-align: center; padding: 5px;">
						<!-- Image -->
						<img src="./images/logo_only.png" style="max-width: 20rem;" alt="Logo">
					</div>
					<?php
						$tSkillId = Array();
						$tSkills = $dao->findSkills($_SESSION["idMember"]);
						foreach($tSkills as $skill) {
							$tSkillId[] = $skill->getIdSkill();
					?>
					<p class="card-text">
						<i class="far fa-star"></i> - <?=$skill->getDescription()?>
					</p>
					<?php  
						}
					?>			
				</div>
			</div>
			<?php

			?>
			<form action="" method="POST" class="formLogin">
				<label class="slider-label">Deplacer des objets </label>
				<label class="switch">
					<input type="checkbox" name="formSkill[]" value="1" <?php echo (in_array(1,$tSkillId) ? "checked" : "");?>>
					<div class="slider round"></div>
				</label>
				<br>
				<label class="slider-label">Peinture(art)</label>
				<label class="switch">
					<input type="checkbox" name="formSkill[]" value="2" <?php echo (in_array(2,$tSkillId) ? "checked" : "");?>>
					<div class="slider round"></div>
				</label>
				<br>
				<label class="slider-label">Peinture (murs et objets similaires)</label>
				<label class="switch">
					<input type="checkbox" name="formSkill[]" value="3" <?php echo (in_array(3,$tSkillId) ? "checked" : "");?>>
					<div class="slider round"></div>
				</label>
				<br>
				<label class="slider-label">Traduire </label>
				<label class="switch">
					<input type="checkbox" name="formSkill[]" value="4" <?php echo (in_array(4,$tSkillId) ? "checked" : "");?>>
					<div class="slider round"></div>
				</label>
				<br>
				<label class="slider-label">Nettoyer </label>
				<label class="switch">
					<input type="checkbox" name="formSkill[]" value="5" <?php echo (in_array(5,$tSkillId) ? "checked" : "");?>>
					<div class="slider round"></div>
				</label>
				<br>
				<label class="slider-label">Transporter quelque chose</label>
				<label class="switch">
					<input type="checkbox" name="formSkill[]" value="6" <?php echo (in_array(6,$tSkillId) ? "checked" : "");?>>
					<div class="slider round"></div>
				</label>
				<br>
				<label class="slider-label">Acompagner</label>
				<label class="switch">
					<input type="checkbox" name="formSkill[]" value="7" <?php echo (in_array(7,$tSkillId) ? "checked" : "");?>>
					<div class="slider round"></div>
				</label>
				<br>
				<label class="slider-label">Enseigner </label>
				<label class="switch">
					<input type="checkbox" name="formSkill[]" value="8" <?php echo (in_array(8,$tSkillId) ? "checked" : "");?>>
					<div class="slider round"></div>
				</label>
				<br>
				<label class="slider-label">Organiser </label>
				<label class="switch">
					<input type="checkbox"name="formSkill[]" value="9" <?php echo (in_array(9,$tSkillId) ? "checked" : "");?>>
					<div class="slider round"></div>
				</label>
				<br>
				<label class="slider-label">Cuisiner </label>
				<label class="switch">
					<input type="checkbox" name="formSkill[]" value="10" <?php echo (in_array(10,$tSkillId) ? "checked" : "");?>>
					<div class="slider round"></div>
				</label>
				<br>
				<label class="slider-label">Nourrir</label>
				<label class="switch">
					<input type="checkbox" name="formSkill[]" value="11" <?php echo (in_array(11,$tSkillId) ? "checked" : "");?>>
					<div class="slider round"></div>
				</label>
				<br>
				<label class="slider-label">Conduire</label>
				<label class="switch">
					<input type="checkbox" name="formSkill[]" value="12" <?php echo (in_array(12,$tSkillId) ? "checked" : "");?>>
					<div class="slider round"></div>
				</label>
				<br>
				<label class="slider-label">Réparer quelque chose</label>
				<label class="switch">
					<input type="checkbox" name="formSkill[]" value="13" <?php echo (in_array(13,$tSkillId) ? "checked" : "");?>>
					<div class="slider round"></div>
				</label>
				<br>
				<input name="action" value="memberSkills" type="hidden" />
				<button type="submit" name="edit" value="edit" >Enregistrer</button>
				<button type="reset" name="reset" value="reset"  >Éteindre les boutons</button>
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
