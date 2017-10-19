<?php


$curl = new Curl();

echo "<div id='window' class='row'>";

//form add an user asset
echo"
<div class='col-5 panel'><h2><label class='text-primary'> Add some goods !</label></h2>
<form method='post' action='process.php'>
<label>Valeur estimée en euro<input type='integer' name='value' /></label></br>
<label>Description du bien<input type='text' name='description' /></label>
<input type='text' name='participantId' value='".$_SESSION['participantId']."' hidden />

<input type='submit' name='adduserasset' value='Ajouter le bien' />
</form>
</div>
";

//Display my user assets
echo "<div class='col-5 panel'><h2><label> My wallet:</label></h2>";
DisplayMyItems();
echo "</div>";

//Display all assets
echo "<div class='col-10 panel'><h2><label class='text-primary'>Available for trade:</label></h2>";
DisplayAllItems();
echo"</div>";

//Display My Request
echo"<div class='col-10 panel'><h2><label class='text-primary'>My requests:</label></h2>";
DisplayTrades();
echo"</div>";



echo "</div>";


?>