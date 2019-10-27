<?php
	if (!ISSET($_SESSION)) session_start();
?>

<form action="" method="post">
	Nombre de r&eacute;sultats par page :
	<?php
		$selected = "selected=\"selected\"";
		$n = -1;
		if (ISSET($_SESSION['navig']['taillePage']))
			$n = $_SESSION['navig']['taillePage'];
	?>	

	<select name="nbParPage">
		<option value="1" <?php echo ($n==1)?$selected:"";?>>1</option>
		<option value="2" <?php echo ($n==2)?$selected:"";?>>2</option>
		<option value="4" <?php echo ($n==4)?$selected:"";?>>4</option>
		<option value="10" <?php echo ($n==10)?$selected:"";?>>10</option>
		<option value="25" <?php echo ($n==25)?$selected:"";?>>25</option>
	</select>
	<input type="submit" name="setNbParPage" value="Go" />
	<input type="hidden" name="action" value="afficherRequest" />
</form>
		
<?php		
	if (ISSET($_SESSION['navig']))
	{
		$numPage = 1;
		if (ISSET($_REQUEST["numPage"]))
		{
			$numPage = $_REQUEST["numPage"];
		}
		$tRequest = $dao->getPage($numPage,$_SESSION['navig']['taillePage']);
?>
		Page <?php echo $numPage?> de <?php echo $_SESSION['navig']["nbPages"]?>
		<?php 
			$x = ($numPage-1)*$_SESSION['navig']["taillePage"]+1;
			$y = ($numPage)*$_SESSION['navig']["taillePage"];
			if ($y > $_SESSION['navig']["nbResultats"])
			$y = $_SESSION['navig']["nbResultats"];
		?>
		--- R&eacute;sultats <?php echo $x?> &agrave; <?php echo $y?> sur un total de <?php echo $_SESSION['navig']["nbResultats"]?><br />
		<?php
			if ($_SESSION['navig']["nbPages"]>1)
			{
		?>
			<table id="barreNavigation">
				<tr>
					<?php
						if ($numPage > 1)
						{
					?>
							<td><a href="./?action=afficherRequest&numPage=1"><b>First</b></a> </td>
							<td><a href="./?action=afficherRequest&numPage=<?php echo $numPage-1?>"><b>&lt;</b></a></td>
					<?php
						}
						else
						{
					?>
							<td><b>First</b></td>
							<td><b>&lt;</b></td>
					<?php
						}
						
						for ($i=1;$i<=$_SESSION["navig"]["nbPages"];$i++)
						{
						
							if ($i == $numPage)
							{
								echo "<td>".$i."</td>";
							}
							
							else
							{
								echo "<td><a href=\"./?action=afficherRequest&numPage=".$i."\">".$i."</a></td>";
							}
						}
						
						if ($numPage < $_SESSION["navig"]["nbPages"])
						{
					?>
							<td><a href="./?action=afficherRequest&numPage=<?php echo $numPage+1?>"><b>&gt;</b></a></td> 
							<td><a href="./?action=afficherRequest&numPage=<?php echo $_SESSION["navig"]["nbPages"]?>"><b>Last</b></a></td>
					<?php
						}
						else
						{
					?>
							<td><b>&gt;</b></td><td><b>Last</b></td> 
					<?php
						}
					?>
				</tr>
			</table> 
			<?php
			}	
			$s = "&numPage=".$numPage;
}
else
{
	$tRequest = $dao->findAllWithSkillDesc();
}

?>	

