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
 if (!isset($_SESSION['participantId'])){
 	include "login_form.php";
 }else{
 	include "dashboard.php";
 }




echo "</body></html>";




?>