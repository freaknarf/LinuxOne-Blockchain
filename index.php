
<?php
include 'Curl.php';

$curl=new APP\Curl();

echo "
<html>
	<head>
		<title>TROCAPP</title>
		<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous'>
	</head>
	<body>
";


//form add an user asset
echo"
	<div class='col-4'><label> Ajouter un bien</label>
		<form method='post' action='process.php'>
			<label>Valeur estimÃ©e en Euro</label><input type='integer' name='value' />
			<label>Description du bien</label><input type='text' name='description' />
		</form>
	</div>
";

//Display my user assets
echo "<div class='col-4'><label> Mes biens</label>";


echo "</div>";


//Display all assets
echo "<div class='col-4'><label> Les biens disponibles</label>";
$curl = new Curl();
$curl->curlGet('/org.acme.sample.UserAsset'; 
echo $curl;

echo"</div>";





echo "</body></html>";

