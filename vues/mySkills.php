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
		
		
		
		
			
		
		<div class="mt-auto">
			<?php
				include("footer.php");
			?>
		</div>
	</div>
</body>
</html>
