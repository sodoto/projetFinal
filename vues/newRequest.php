<?php
require_once('/modele/RequestDAO.class.php');
date_default_timezone_set('America/Toronto');
    if(!ISSET($_SESSION))
    {
        session_start();
    }

    $title = "";
    $dateService = "";
    $location = "";
    $statut = "";

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
	<div class="d-flex flex-column align-content-stretch bd-highlight" style="height: 100vh;">
		<?php
			include("banner.php");
			//include("menu.php");
		?>

		<div>
            <h2>Ajouter une demande</h2>

            <?php
				require_once('/modele/RequestDAO.class.php');
				$dao = new RequestDAO();
				if(ISSET($_SESSION["requestCreated"]) && $_SESSION["requestCreated"] == true)
				{
			?>
			<div class="container">
				<div class="alert alert-info alert-dismissible">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Succès!</strong> Vous avez ajouté une demande!
				</div>
			</div>
			<?php
				$_SESSION["requestCreated"] = false;
				}
			?>

            <form action="" method="POST" class="formLogin">
                <small>Titre</small>
                <input type="text" class="Input-Login" name="title" value="<?php echo $title?>" placeholder="Titre"><br/>
                <?php if (ISSET($_REQUEST["field_messages"]["title"])) 
                    echo "<span class=\"warningMessage\">".$_REQUEST["field_messages"]["title"]."</span><br /><br />";
                ?>
                <small>Date du service demandé</small>
                <input type="date" class="Input-Login" name="dateService"  value="<?php echo date('Y-m-d')?>"><br/>
                <?php if (ISSET($_REQUEST["field_messages"]["dateService"])) 
                    echo "<span class=\"warningMessage\">".$_REQUEST["field_messages"]["dateService"]."</span><br /><br />";
                ?>
                <small>Ville</small>
                <input type="text" class="Input-Login" name="location" value="<?php echo $location?>" placeholder="Location"><br/>
                <?php if (ISSET($_REQUEST["field_messages"]["location"])) 
                    echo "<span class=\"warningMessage\">".$_REQUEST["field_messages"]["location"]."</span><br /><br />";
                ?>
                <small>Compétence requise</small>
                <select name="skills" class="select-form">
                    <?php
                        require_once('/modele/SkillsDAO.class.php');
                        $dao = new SkillsDAO();
                        $tSkills = $dao->findAll();
                        foreach ($tSkills as $skills)
                        {
                    ?>
                        <option value="<?=$skills->getIdSkill()?>" ><?=$skills->getDescription()?></option>
                    <?php
                        }
                    ?>
                </select>
                <input type="hidden" name="action" value="newRequest">
                <button type="submit" name="submit" value="submit" >Ajouter</button>
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