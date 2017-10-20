<?php


	include_once 'Curl.php';

	$curl=new APP\Curl();

$json=array(
  "\$class"=>"org.acme.mynetwork.Commodity",
  "tradingSymbol"=> $_POST['description'],
  "description"=> $_POST['description'],
  "mainExchange"=> $_POST['tradingSymbol'],
  "quantity"=>$_POST['value'],
  "owner"=> "TRADER1"
);

echo $curl->curlPost("/org.acme.mynetwork.Commodity/",json_encode($json));