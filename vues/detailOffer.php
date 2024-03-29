<?php
	if(!ISSET($_SESSION))
	{
		session_start();
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
    <title>Détail Offre</title>
</head>
<body>
    <div class="d-flex flex-column align-content-stretch bd-highlight" style="height: 100vh;">
        <?php
            include("banner.php");
        ?>

        <?php
            require_once('/modele/OfferRequestDAO.class.php');
            require_once('/modele/MessageDAO.class.php');
            require_once('/modele/RequestDAO.class.php');
            require_once('/modele/MemberDAO.class.php');
            $oDao = new OfferRequestDAO();
            $mDao = new MessageDAO();
            $rDao = new RequestDAO();
            $memDao = new MemberDAO();
            $offer = $oDao->findByIdOffer($_REQUEST["offerSelected"]);
            $tMessages = $mDao->findByIdOffer($_REQUEST["offerSelected"]);
            $request = $rDao->find($offer->getIdRequest());
            $member = $memDao->find($request->getIdMember());
        ?>

        <div class="container">
            <?=$offer->getIdOffer()?>

            <h1>MESSAGE</h1>
            <?php foreach($tMessages as $mess) {
                if($mess->getIdMember() == $_SESSION["idMember"])
                {
            ?>
                <div class="card w-75 text-right mt-3" style="width: 500px; color:red; float: right;">
                    <div class="card-header">
                        Vous -- <?=$mess->getDateHeure()?>
                    </div>
                    <div class="card-body">
                        <div class="card-title">
                            
                        </div>
                        <?=$mess->getMessage()?>
                    </div>
                </div>
            <?php
                }
                else
                {
            ?>
                <div class="card w-75 mt-3" style="width: 500px; color:green; float: left;">
                    <div class="card-header">
                        <?=$member->getFirstname()?> <?=$member->getLastname()?> -- <?=$mess->getDateHeure()?>
                    </div>
                    <div class="card-body">
                        <?=$mess->getMessage()?>
                    </div>
                </div>
            <?php
                }
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
