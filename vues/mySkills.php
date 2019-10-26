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
			
		?>
			
		
			<h2>Mes compétences</h2>
			


			<?php
			//Columns must be a factor of 12 (1,2,3,4,6,12)
			$numOfCols = 4;
			$rowCount = 0;
			$bootstrapColWidth = 12 / $numOfCols;
			?>
			<div class="row">
			<?php
					require_once('/modele/MemberSkillsDAO.class.php');
					$dao = new MemberSkillsDAO();
					$tRequest = $dao->findSkills($_SESSION["idMember"]);
					foreach($tRequest as $request) {
			?>  
			<div class="col-md-<?php echo $bootstrapColWidth; ?>">
            <div class="card"  style="width: 18rem;">
				<img src="./images/skills/<?=$request->getImage_path();?>" class="card-img-top" alt="...">
				<div class="card-body">
				<h5 class="card-title"><i class="far fa-star"></i> - <?=$request->getDescription()?></h5>
				<p class="card-text"> </p>
				</div>
				</div>
			</div>
			<?php
			$rowCount++;
			if($rowCount % $numOfCols == 0) echo '</div><div class="row">';
			}
			?>
			</div>
		
		
		
		
			

			<!-- Image -->
			<img src="./images/handshake.jpg" style="max-width: 20rem;" alt="Photo of sunset">
			<div class="card-body">
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
		<?php print_r($tSkillId); ?>
		<form action="" method="POST" class="formLogin">
			<label class="slider-label">Deplacer des objets </label>
			<label class="switch">
				<input type="checkbox" name="deObj" value="deObj" <?php echo (in_array(1,$tSkillId) ? "checked" : "");?>>
				<div class="slider round"></div>
			</label>
			<br>
			<label class="slider-label">Peinture(art)</label>
			<label class="switch">
				<input type="checkbox" name="peintA" value="peintA" <?php echo (in_array(2,$tSkillId) ? "checked" : "");?>>
				<div class="slider round"></div>
			</label>
			<br>
			<label class="slider-label">Peinture (murs et objets similaires)</label>
			<label class="switch">
				<input type="checkbox" name="peintO" value="peintO" <?php echo (in_array(3,$tSkillId) ? "checked" : "");?>>
				<div class="slider round"></div>
			</label>
			<br>
			<label class="slider-label">Traduire </label>
			<label class="switch">
				<input type="checkbox" name="trad" value="trad" <?php echo (in_array(4,$tSkillId) ? "checked" : "");?>>
				<div class="slider round"></div>
			</label>
			<br>
			<label class="slider-label">Nettoyer </label>
			<label class="switch">
				<input type="checkbox" name="nett" value="nett" <?php echo (in_array(5,$tSkillId) ? "checked" : "");?>>
				<div class="slider round"></div>
			</label>
			<br>
			<label class="slider-label">Transporter quelque chose</label>
			<label class="switch">
				<input type="checkbox" name="transp" value="transp" <?php echo (in_array(6,$tSkillId) ? "checked" : "");?>>
				<div class="slider round"></div>
			</label>
			<br>
			<label class="slider-label">Acompagner</label>
			<label class="switch">
				<input type="checkbox" name="acomp" value="acomp" <?php echo (in_array(7,$tSkillId) ? "checked" : "");?>>
				<div class="slider round"></div>
			</label>
			<br>
			<label class="slider-label">Enseigner </label>
			<label class="switch">
				<input type="checkbox" name="ense" value="ense" <?php echo (in_array(8,$tSkillId) ? "checked" : "");?>>
				<div class="slider round"></div>
			</label>
			<br>
			<label class="slider-label">Organiser </label>
			<label class="switch">
				<input type="checkbox"name="org" value="org" <?php echo (in_array(9,$tSkillId) ? "checked" : "");?>>
				<div class="slider round"></div>
			</label>
			<br>
			<label class="slider-label">Cuisiner </label>
			<label class="switch">
				<input type="checkbox" name="cuis" value="cuis" <?php echo (in_array(10,$tSkillId) ? "checked" : "");?>>
				<div class="slider round"></div>
			</label>
			<br>
			<label class="slider-label">Nourrir</label>
			<label class="switch">
				<input type="checkbox" name="nour" value="nour" <?php echo (in_array(11,$tSkillId) ? "checked" : "");?>>
				<div class="slider round"></div>
			</label>
			<br>
			<label class="slider-label">Conduire</label>
			<label class="switch">
				<input type="checkbox" name="cond" value="cond" <?php echo (in_array(12,$tSkillId) ? "checked" : "");?>>
				<div class="slider round"></div>
			</label>
			<br>
			<label class="slider-label">Réparer quelque chose</label>
			<label class="switch">
				<input type="checkbox" name="rep" value="rep" <?php echo (in_array(13,$tSkillId) ? "checked" : "");?>>
				<div class="slider round"></div>
			</label>
			<br>
			<input name="action" value="memberSkills" type="hidden" />
			<button type="submit" name="submit" value="submit" >Enregistrer</button>
			<button type="reset" name="reset" value="reset"  >Éteindre les boutons</button>
		</form>

		
		<div class="mt-auto">
			<?php
				include("footer.php");
			?>
		</div>
	</div>
</body>
</html>
