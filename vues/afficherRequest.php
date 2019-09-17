
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
<div>
<?php
	include("banner.php");
	//include("menu.php");
?>
	<div id="content">
	<h2>Découvrez comment vous pouvez aider quelqu'un</h2>
<?php
require_once('/modele/classes/Request.class.php');
require_once('/modele/AfficherRequestDAO.class.php');

$dao = new afficherRequestDAO();
?>	
<h2> LISTE DE REQUESTS</h3>
	<?php //echo $_SESSION["idMember"] ?>
	<table class="table">
	<thead class="thead-light">
	<tr>
	<td>SKILL WANTED</td>
	<td>DESCRIPTION</td>
	<td>DATE REQUEST</td>
	<td>DATE OF SERVICE</td>
	<td>LOCATION</td>
	<td>STATUS</td>
	<td>USER</td>
	<td>ACTION</td>
	
	
	</tr>
	</thead>
	<tbody>
	<?php
    $tRequest = $dao->findAll();
    foreach($tRequest as $request) {
		?>
	  <tr>
	 <td><?=$request->getSkillWanted()?></td>
	 <td><?=$request->getTitle()?></td>
	 <td><?=$request->getDateRequest()?></td>
	 <td><?=$request->getDateService()?></td>
	 <td><?=$request->getLocation()?></td>
	 <td><?=$request->getStatus()?></td>
	 <td><?=$request->getIdMember()?></td>
	
	 
	  <td><a href='?action=edit&idRequest=<?=$request->getIdRequest()?>' title='&eacute;diter'><span class="glyphicon glyphicon-edit"></a>
	  <a href='?action=supp&idRequest=<?=$request->getIdRequest()?>' title='effacer'><span class="glyphicon glyphicon-trash"></a>
	  <!--Para que no aparezca el item de adicionar se puede hacer un campo hiden CAMBIAR PARA USAR CAMPO HIDEN-->
	 
	  </td>
	<?php  
    }
	?>
	</tbody>
	</table>
	</div>
<?php
	include("footer.php");
?>
</div>
</body>
</html>
