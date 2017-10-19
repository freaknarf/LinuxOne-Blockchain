
<?php

session_start();
include "Curl.php";
include "functions.php";


if(!empty($_POST['adduserasset'])){
   $value = $_POST['value'];
   $description = $_POST['description'];
   $participantId = $_SESSION['participantId'];
   $asset_id = rand(0,9999);
   $data = '{
  "$class": "org.acme.sample.UserAsset",
  "owner": "resource:org.acme.sample.SampleParticipant#participantId:'.$participantId.'",
  "assetId": "assetId:'.$asset_id.'",
  "value": "'.$value.'",
  "description": "'.$description.'"
   }';
   
   $curl = new Curl();
   $curl->curlPost('/org.acme.sample.UserAsset',$data); 
   echo "<script>
          window.open('index.php', '_self');
        </script>";
}

var_dump($_GET);
if(!empty($_GET['action'])){
   if($_GET['action'] == 'echanger'){
       $curl = new Curl();
       $data=array(
  "$class"=> "org.acme.sample.Request",
  "requestId"=> $_GET['requestId'],
  "asset1"=> $_GET['assetId1'],
  "asset2"=> $_GET['assetId2'],
  "state"=> "OK");

    echo $curl->curlPost('/org.acme.sample.Request',json_encode($data)); 
   }
} 



if(!empty($_POST['inscription'])){
   $id = $_POST['participantId'];
   $password = $_POST['password'];
   $first_name = $_POST['first_name'];
   $last_name = $_POST['last_name'];
    $data = '{
      "$class": "org.acme.sample.SampleParticipant",
      "participantId": "participantId:'.$id.'",
      "password": "'.$password.'",
      "firstName": "'.$first_name.'",
      "lastName": "'.$last_name.'"
    }';
    //echo $data;
   $curl = new Curl();
   $curl->curlPost('/org.acme.sample.SampleParticipant',$data); 
   //header('Location: index.php');
   echo "<script>
          window.open('index.php', '_self');
        </script>";
} 

if(!empty($_POST['connexion'])){
   $id = $_POST['participantId'];
   $password = $_POST['password'];
   
    $data = '{
      "$class": "org.acme.sample.SampleParticipant",
      "participantId": "participantId:'.$id.'",
      "password": "'.$password.'"
    }';
   //$curl = new Curl();
  // $connect = $curl->curlGet('/org.acme.sample.SampleParticipant',$data);
   $_SESSION['participantId'] = $id; 

   echo "<script>
          window.open('index.php', '_self');
        </script>";
}
?>