<?php


$curl = new Curl();
$_SESSION['participantId']=6666;
echo "<div id='window' class='row'>";

//form add an user asset
echo"
	<div class='col-4 panel'><label> Ajouter un bien</label>
		<form method='post' action='process.php'>
			<label>Valeur estimée en euro<input type='integer' name='value' /></label></br>
			<label>Description du bien<input type='text' name='description' /></label>
         <input type='text' name='participantId' value='".$_SESSION['participantId']."' hidden />
         <input type='submit' name='adduserasset' value='Ajouter le bien' />
		</form>
	</div>
";

//Display my user assets
echo "<div class='col-4 panel'><label> Mes biens</label>";
DisplayMyItems($usr);

echo "</div>";


//Display all assets
echo "<div class='col-4 panel'><label> Les biens disponibles</label>";
DisplayAllItems();
echo"</div>";


//Display My Request
echo"<div class='col-12 panel'><label>Mes demandes</label>";
$listeJSON = $curl->curlGet('/org.acme.sample.Request'); 
DisplayJSONList($listeJSON);
echo"</div>";



echo "</div>";


?>