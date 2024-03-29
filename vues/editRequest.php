<?php
require_once('/modele/RequestDAO.class.php');
date_default_timezone_set('America/Toronto');
    if(!ISSET($_SESSION))
    {
        session_start();
    }

    $dao = new RequestDAO();
    $request = $dao->find($_REQUEST["idRequest"]);
    $idrequest = $request->getIdRequest();
    $title = $request->getTitle();
    $description = $request->getDescription();
    $dateService = $request->getDateService();
    $location = $request->getLocation();
    $statut = $request->getStatus();
    $selected1 = "";
    $selected2 = "";
    $selected3 = "";

    switch ($statut)
    {
        case "ouverte":
            $selected1 = "selected";
            break;
        case "attente":
            $selected2 = "selected";
            break;
        case "complete":
            $selected3 = "selected";
            break;
    }
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
    <title>Modifier une demande</title>
</head>

<body>
	<div class="d-flex flex-column align-content-stretch bd-highlight" style="height: 100vh;">
		<?php
			include("banner.php");
		?>

		<div class="d-flex flex-column justify-content-center align-items-center bd-highlight flex-grow-1">
            <?php
				require_once('/modele/RequestDAO.class.php');
				$dao = new RequestDAO();
				if(ISSET($_SESSION["requestEdited"]) && $_SESSION["requestEdited"] == true)
				{
            ?>
            <!-- Affichage d'un message si la demande à bien été ajouté -->
			<div class="container">
				<div class="alert alert-info alert-dismissible">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Succès!</strong> Vous avez modifié votre demande!
				</div>
			</div>
			<?php
				$_SESSION["requestEdited"] = false;
				}
			?>

            <form id="formEditRequest" action="" method="POST" class="formLogin">
                <h2>Modifier ma demande</h2>
                <small>Titre</small>
                <input type="text" class="Input-Login" name="title" value="<?php echo $title?>" placeholder="Titre"><br/>
                <?php if (ISSET($_REQUEST["field_messages"]["title"])) 
                    echo "<span class=\"warningMessage\">".$_REQUEST["field_messages"]["title"]."</span><br /><br />";
                ?>
                <small>Description</small>
                <textarea form="formEditRequest" class="form-control" name="description" row="4"><?php echo $description?></textarea>
                <?php if (ISSET($_REQUEST["field_messages"]["description"])) 
                    echo "<span class=\"warningMessage\">".$_REQUEST["field_messages"]["description"]."</span><br /><br />";
                ?>
                <small>Date du service demandé</small>
                <input type="date" class="Input-Login" name="dateService"  value="<?php echo date('Y-m-d',strtotime($dateService))?>"><br/>
                <?php if (ISSET($_REQUEST["field_messages"]["dateService"])) 
                    echo "<span class=\"warningMessage\">".$_REQUEST["field_messages"]["dateService"]."</span><br /><br />";
                ?>
                <small>Ville</small>
                <input type="text" class="Input-Login" name="location" value="<?php echo $location?>" placeholder="Location"><br/>
                <?php if (ISSET($_REQUEST["field_messages"]["location"])) 
                    echo "<span class=\"warningMessage\">".$_REQUEST["field_messages"]["location"]."</span><br /><br />";
                ?>
                <small>Statut</small>
                <select name="statut" class="select-form">
                    <option value="ouverte" <?=$selected1?>>Ouverte</option>
                    <option value="attente" <?=$selected2?>>En attente</option>
                    <option value="complete" <?=$selected3?>>Complété</option>
                </select>
                <small>Compétence requise</small>
                <select name="skills" class="select-form">
                    <?php
                        require_once('/modele/SkillsDAO.class.php');
                        $dao = new SkillsDAO();
                        $tSkills = $dao->findAll();
                        foreach ($tSkills as $skills)
                        {
                            if($skills->getIdSkill() == $request->getSkillWanted())
                                $selected = "selected";
                            else
                                $selected = "";
                    ?>
                        <option value="<?=$skills->getIdSkill()?>" <?=$selected?> ><?=$skills->getDescription()?></option>
                    <?php
                        }
                    ?>
                </select>
                <input type="hidden" name="sendEditForm">
                <button type="submit" class="btn btn2 btn-lg btn-block text-uppercase">Enregistrer</button>
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