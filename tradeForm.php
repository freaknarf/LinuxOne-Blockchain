<?php

session_start();

include "Curl.php";
include "functions.php";

echo "
<html>
	<head>
		<title>TROCAPP</title>
		<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css' integrity='sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M' crossorigin='anonymous'>
      <link rel='stylesheet' href='style.css' type='text/css'>
      <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	</head>
	<body>
";

include "header.php";


echo "<div id='window' class='row'>";

//form add an user asset
echo"
	<div class='col-12 panel'><label> Faire une demande de troc</label>
		<form method='post' action='process.php'>
			<label>Asset to trade: <input type='text' name='asset1' value='".$_GET['assetId']."'/></label></br>
<label>Your asset: </label>
			<select name='yourAsset'>";
   $curl=new Curl();  
   $myItems=json_decode($curl->curlGet("/org.acme.sample.UserAsset"),true);

   var_dump($myItems);
      foreach ($myItems as $key => $value) {

     if($value['owner']=="resource:org.acme.sample.SampleParticipant#participantId:".$_SESSION['participantId']){
         $description=$value["description"];
         $assetid=$value["assetId"];
         echo "<option value='".$assetid."'>$description</option>";
      }
}
			echo"</select>
		

         <input type='submit' name='submitRequest' value='Demander'/>
		</form>
	</div>
";





echo "</div>";


?>