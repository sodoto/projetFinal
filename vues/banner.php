<?php
	if (!ISSET($_SESSION)) session_start();
?>
<nav class="navbar navbar-expand-lg navbar-light">
	<a class="navbar-brand" href="?action=default">
		<img id="logo" src="./images/logo_transparent.png" alt="CommunAction">
	</a>

	<ul class="nav navbar-nav align-items-center mr-auto">
		<li class="nav-item">
				<a class="text-light" href="?action=afficherRequest">Voir les demandes</a>
		</li>
	</ul>

	<ul class="nav navbar-nav ml-auto">
		<?php
			if (ISSET($_SESSION["connected"]))
			{
		?>
			<!-- Menu dropdown -->
			<li class="nav-item dropdown">
					<a class="dropdown-toggle text-light" role="button" data-toggle="dropdown">
						<i class="fas fa-user"></i> Mon Profil
					</a> 
					<div class="dropdown-content">
						<img class="rounded-circle" src="./images/member/<?=$_SESSION['photoMember']?>" width="20"> 
						<a class="text-dark" href="?action=profil"><?=$_SESSION['nameMember']?></a><br/>
						<a class="text-dark" class="dropdown-item" href="?action=mySkills">MES COMP&Eacute;TENCES</a> <br/>
						<a class="text-dark" class="dropdown-item" href="?action=mesDemandes">MES DEMANDES</a> <br/>
						<a class="text-dark" class="dropdown-item" href="?action=mesOffres">MES OFFRES</a> <br/>
						<a class="text-dark" class="dropdown-item" href="?action=aidesCompletees">DEMANDES COMPLET&Eacute;ES</a> <br/>
						<a class="text-dark" class="dropdown-item" href="?action=afficherMessages">NOTIFICATIONS/MESSAGES</a><br/>
					</div>
			</li>
			<li class="nav-item">
				<a class="text-light" class="nav-link" href="?action=deconnecter"><i class="fas fa-sign-out-alt"></i> Logout</a>
			</li>
		<?php
			}
			else
			{
		?>
			<!-- Affiché seulement si l'utilisateur n'est pas connecté -->
			<li class="nav-item">
				<a class="text-light" class="nav-link" href="?action=connecter"><i class="fas fa-sign-in-alt"></i> Login</a>
			</li>
		<?php
			}
		?>
	</ul>
</nav>
