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
		
		<title>Conversation</title>
</head>

<body>
	
		<?php
			include("banner.php");
			//include("menu.php");
		?>
		<?php
				require_once('/modele/MessageDAO.class.php');
				$dao = new MessageDAO();
				
				if(isset($_REQUEST['IdMessage']))
				{ 		 
				$_SESSION["IdMessage"]= $_REQUEST['IdMessage']; 
				}	
					$dao->updateMessageLu($_SESSION["IdMessage"]); //message lu
				
				if(isset($_REQUEST['idRecepteur']))
				{ 		 
				$_SESSION["idRecepteur"]= $_REQUEST['idRecepteur']; 
				}		
				if(isset($_REQUEST['IdRequest']))
				{ 		 
				$_SESSION["IdRequest"]= $_REQUEST['IdRequest']; 
				}	
				
				if(isset($_REQUEST['userName']))
				{ 		 
				$_SESSION["userName"]= $_REQUEST['userName']; 
				}	
	
			?>	
			
		<h2> CONVERSATION</h3>
			<?php //echo $_SESSION["idMember"] ?>
			
					<?php
						$tRequest = $dao->findConversation($_SESSION['idMember'], $_SESSION['idRecepteur'], $_SESSION['IdRequest']);
						foreach($tRequest as $request) {
					
					if($request->getUsername()==$_SESSION["userName"]){
						
					?>
				<div class="col-md-6 col-xl-12 pl-md-3 px-lg-auto px-0">
				<li class="d-flex justify-content-center">
				<img src="./images/member/<?=$request->getPhoto()?>" alt="avatar" class="avatar rounded-circle "  height="100px!important">
				<div class="chat-body white p-3 ml-2 z-depth-1">
                <div class="header">
                 <strong class="primary-font"><?=$request->getUsername()?></strong>
                 <small class="pull-right text-muted"><i class="far fa-clock"></i> <?=$request->getDateHeure()?></small>
                </div>
                <hr class="w-100">
                <p class="mb-0">
                  <?=$request->getMessage()?>
                </p>
				</div>
				</li>
				<br>	
				</div>				
					
					<?php  
					}
					else 
					{
					  ?>	
				<div class="col-md-6 col-xl-12 pl-md-3 px-lg-auto px-0">	
				<li class="d-flex justify-content-center">
				<div class="chat-body white p-3 z-depth-1">
                <div class="header">
                <strong class="primary-font"><?=$request->getUsername()?></strong>
                <small class="pull-right text-muted"><i class="far fa-clock"></i> <?=$request->getDateHeure()?></small>
                </div>
                <hr class="w-100">
                <p class="mb-0">
                  <?=$request->getMessage()?>
                </p>
				</div>
				<img src="./images/member/<?=$request->getPhoto()?>" alt="avatar" class="avatar rounded-circle" height="100px!important">
				</li>
				</div>
				<br>
										
						<?php
					}
						
					}
					?>
		
		<div>
		
			<form action="" method="POST" class="formLogin" >
		<textarea name="message" rows="5" cols="40" maxlength="200" >Écrivez votre message (200 caractères max)</textarea>
		
		<br>
		<input name="action" value="afficherConversations" type="hidden" />
		
		<button type="submit"  class="btn2">Continuer</button>
		</form>
		
		
		</div>
		<div class="mt-auto">
			<?php
				include("footer.php");
			?>
		</div>
</body>
</html>
