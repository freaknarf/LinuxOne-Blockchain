<!DOCTYPE html>
<html>
<head>
	<title>TROCAPP</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<meta charset="utf-8">
</head>
<body>
	<?php
	include_once 'Curl.php';

	$curl=new APP\Curl();




	;
//form add an user asset
	echo"
	<div class='col-4'><label> Ajouter un bien</label>
	<form method='post' action='sendAsset.php'>
	<label>Valeur</label><input type='integer' name='value' />
	<label>Currence</label>
	<select name ='tradingSymbol'>";

	$exchange=json_decode($curl->curlGet("/org.acme.mynetwork.Commodity/"),true);;;
	foreach ($exchange as $key => $value) {
		$symbol=$value["tradingSymbol"];

		echo "<option value=$symbol>$symbol</option>";
	}


	echo"</select> 
	<label>Description du bien</label><input type='text' name='description' />
	<input type='submit'>
	</form>
	</div>
	";

//Display my user assets
	echo "<div class='col-4'><label> Mes biens</label>";

$myItems=json_decode($curl->curlGet("/org.acme.mynetwork.Commodity/"),true);;;
	foreach ($myItems as $key => $value) {
		$description=$value["description"];
		echo "<option value=$description>$description</option><br>";
	}


	echo "</div>";
//Display all assets
	echo "<div class='col-4'><label> Les biens disponibles</label>";
	$items=json_decode($curl->curlGet("/org.acme.mynetwork.Commodity/"),true);;;
	foreach ($items as $key => $value) {
		$description=$value["description"];

		echo "<option value=$description>$description</option><br>";
	}


	echo"</div>";
	?>
</body>
</html>

