<?php

include "Curl.php";
include "functions.php";


if(!empty($_POST['adduserasset'])){
   $value = $_POST['value'];
   $description = $_POST['description'];
   $participantId = $_POST['participantId'];
   $asset_id = rand(0,9999);
   $data = '{
  "$class": "org.acme.sample.UserAsset",
  "owner": "resource:org.acme.sample.SampleParticipant#participantId: '.$participantId.'",
  "assetId": "assetId:'.$asset_id.'",
  "value": "'.$value.'",
  "description": "'.$description.'"
   }';
   
   $curl = new Curl();
   $curl->curlPost('/org.acme.sample.UserAsset',$data); 
   header('Location: index.php');
}


if(!empty($_GET['action'])){
   if($_GET['action'] == 'echanger'){
      echo "formulaire echange a faire";
   
   }
}	



?>