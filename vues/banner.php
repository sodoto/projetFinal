<?php
	if (!ISSET($_SESSION)) session_start();
?>
	<nav class="navbar navbar-expand-lg navbar-light">
		<a class="navbar-brand" href="#">
			<img src="./images/logoSOSVITE.png" alt="CommunAction" style="height:70px;">
		</a>

			<ul class="nav navbar-nav align-items-center mr-auto">
				<li class="nav-item">
					<!-- <button type="button" href="#"> -->
						<a class="text-dark1" href="?action=afficherRequest">Toute les demandes</a>
					<!-- </button> -->
				</li>
				<li class="nav-item">
					<form class="form-inline">
						<div class="input-group">
							<input type="text" class="rechercher" class="form-control" placeholder="Rechercher" aria-label="Rechercher" aria-describedby="button-addon2">
							<div class="input-group-append">
								<button class="btn2 my-2 my-sm-0" type="button" id="button-addon2">
									<i class="fas fa-search"></i>
								</button>
							</div>
						</div>
					</form>
				</li>	
			</ul>

			<ul class="nav navbar-nav ml-auto">
			<?php
				if (ISSET($_SESSION["connected"]))
				{
			?>
				<li class="nav-item dropdown">
						<a class="text-dark1" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown">
							<i class="fas fa-user"></i> Mon Profil
						</a> 
						<div class="dropdown-content">
							<a class="text-dark" class="dropdown-item" href="#">VOS COMP&Eacute;TENCES</a> </br>
							<a class="text-dark" class="dropdown-item" href="#"> VOS DEMANDES</a> </br>
							<a class="text-dark" class="dropdown-item" href="#"> AIDES COMPLET&Eacute;ES</a> </br>
							<a class="text-dark" class="dropdown-item" href="#"> NOTIFICATIONS/MESSAGES</a></br>
						</div>
				</li>
				<li class="nav-item">
					<a class="text-dark1" class="nav-link" href="?action=deconnecter"><i class="fas fa-sign-out-alt"></i> Logout</a>
				</li>
			<?php
				}
				else
				{
			?>
				<li class="nav-item">
					<a class="text-dark1" class="nav-link" href="?action=connecter"><i class="fas fa-sign-in-alt"></i> Login</a>
				</li>
				<?php
					}
				?>
			</ul>
	</nav> 
