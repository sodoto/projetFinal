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
	<title>Messages</title>
	<script>
		(function(document) {
			'use strict';

			var LightTableFilter = (function(Arr) {

				var _input;

				function _onInputEvent(e) {
					_input = e.target;
					var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
					Arr.forEach.call(tables, function(table) {
						Arr.forEach.call(table.tBodies, function(tbody) {
							Arr.forEach.call(tbody.rows, _filter);
						});
					});
				}

				function _filter(row) {
					var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
					row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
				}

				return {
					init: function() {
						var inputs = document.getElementsByClassName('light-table-filter');
						Arr.forEach.call(inputs, function(input) {
							input.oninput = _onInputEvent;
						});
					}
				};
			})(Array.prototype);

			document.addEventListener('readystatechange', function() {
				if (document.readyState === 'complete') {
					LightTableFilter.init();
				}
			});

		})(document);


		$(document).ready(function() {
			$("#envoyes").hide();
		});

		$(document).ready(function(){
		$("#messayesRecus").click(function(){
			$("#recus").show();
			$("#envoyes").hide();
		});
		$("#messayesEnvoyes").click(function(){
			$("#recus").hide();
			$("#envoyes").show();
			
		});
		});
	</script>
</head>
<body>
	<div class="d-flex flex-column align-content-stretch bd-highlight" style="height: 100vh;">
		<?php
			include("banner.php");
		?>
		<div>		
			<button id="messayesRecus" >Messages - Reçus</button>
			<button id="messayesEnvoyes" >Messages - Envoyés</button>
		</div>	
		<div id="recus">
			<?php
				require_once('/modele/MessageDAO.class.php');
				$dao = new MessageDAO();
			?>	
			<h2>Messages - Reçus</h2>
			<input type="search" id="myInput" class="light-table-filter" data-table="order-table1" placeholder="Filter">
			<table class="order-table1 table">
				<thead class="thead-light">
					<tr>
						<th>Date d'envoi</th>
						<th>Reçu de</th>
						<th>Titre</th>
						<th>Message lu</th>					
						<th>Accéder</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$tRequest = $dao->findMemberMessagesRecus($_SESSION['idMember']);
						foreach($tRequest as $request) {
					?>
					<tr>
						<td><?=$request->getDateHeure()?></td>
						<td><?=$request->getUsername()?></td>
						<td><?=$request->getTitle()?></td>
						<td><?=$request->getMessageLu()?></td>
						<td>						
							<a href="?action=afficherConversations&IdMessage=<?=$request->getIdMessage()?>
							&idRecepteur=<?=$request->getIdMember()?>&IdRequest=<?=$request->getIdRequest()?>">Message!</a>  
						</td>
					</tr>
					<?php  
						}
					?>
				</tbody>
			</table>
		</div>	
			
		<div id="envoyes">
			<h2> Messages - Envoyés</h3>
			<input type="search" id="myInput" class="light-table-filter" data-table="order-table" placeholder="Filter">
			<table class="order-table table">
				<thead class="thead-light">
					<tr>
						<th>Date d'envoi</th>
						<th>Envoyé à</th>
						<th>Titre</th>						
						<th>Accéder</th>	
					</tr>
				</thead>
				<tbody>
					<?php
						$tRequest = $dao->findMemberMessagesEnvoyes($_SESSION['idMember']);
						foreach($tRequest as $request) {
					?>
					<tr>
						<td><?=$request->getDateHeure()?></td>
						<td><?=$request->getUsername()?></td>
						<td><?=$request->getTitle()?></td>
						
						<td>						
						   
							<a href="?action=afficherConversations&IdMessage=<?=$request->getIdMessage()?>
							&idRecepteur=<?=$request->getIdRecepteur()?>&IdRequest=<?=$request->getIdRequest()?>">Message!</a>  
						</td>
					</tr>
					<?php  
						}
					?>
				</tbody>
			</table>
		</div>
		<div class="mt-auto">
			<?php
				include("footer.php");
			?>
		</div>
	</div>
</body>
</html>
