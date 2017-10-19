<?php

function DisplayMyItems(){
   $curl=new Curl();  
   $myItems=json_decode($curl->curlGet("/org.acme.sample.UserAsset"),true);
   echo'<table>';

   foreach ($myItems as $key => $value) {
      if($value['owner']=="resource:org.acme.sample.SampleParticipant#participantId:".$_SESSION['participantId']){
         $description=$value["description"];
         echo "<tr><td value=$description>$description</td></tr>";
      }
   }
   echo'</table>';

}

function DisplayAllItems(){
   $curl=new Curl(); 
   $myItems=json_decode($curl->curlGet("/org.acme.sample.UserAsset"),true);
   echo'<table>';


   foreach ($myItems as $key => $value) {
      if($value['owner'] != "resource:org.acme.sample.SampleParticipant#participantId:".$_SESSION['participantId']){
         
         $description=$value["description"];
        $assetId=$value["assetId"];
         echo "<tr><td value=$description>$description</td><td><a href='tradeForm.php?assetId=$assetId'> Echanger</td></tr>";
      }
   }

   echo'</table>';
}





function DisplayJSONList($json){

   $jsonarray = json_decode($json, true); 
   
   echo "<table>";
   
   
   
   //Display the columns name on the first row
   echo "<tr>";
   echo "<td></td>";
   //echo $jsonarray;
   if(count($jsonarray)>1){
      //echo $jsonarray[0];
      $arraykey =  array_keys($jsonarray[0]);
   }else{
      $arraykey =  array_keys($jsonarray);
   }
   for($i=0;$i<count($arraykey);$i++){
      echo "<td>$arraykey[$i]</td>";
   }
   
   echo "</tr>";
   
   //Display the list
   if(count($jsonarray)>1){
      for($i=0;$i<count($jsonarray);$i++){
         echo "<tr>";
         $fullassetId1=$jsonarray[$i]['asset1'];
         $fullassetId2=$jsonarray[$i]['asset2'];

         $assetId1 = preg_split('/#/',$fullassetId1);
         $assetId2 = preg_split('/#/',$fullassetId2);

         $requestId=$jsonarray[$i]['requestId'];


         ///// warning big shit here
         echo "<td><a href='process.php?action=echanger&requestId=".$requestId."&assetId1=".$assetId1[1]."&assetId2=".$assetId2[1]."'>Echanger</a></td>";
         
         foreach($jsonarray[$i] as $key){
            echo "<td> $key</td>";
         }
         echo "</tr>";
      };
   }else{
      echo "<tr>";

      echo "<td><a href='process.php?action=echanger'>Echanger</a></td>";

      foreach($jsonarray as $key){
         echo "<td> $key</td>";
      }
      echo "</tr>";

   }
   
   
   echo "</table>";
}


function DisplayTrades(){
   $curl=new Curl();
   $myItems=json_decode($curl->curlGet("/org.acme.sample.Request"),true);;;
   echo'<table>';
 
 
   foreach ($myItems as $key => $value) {
//      if($value['owner']!="resource:org.acme.sample.SampleParticipant#participantId:".$_SESSION['participantId'])
      {
      $fullassetId1=$jsonarray[$i]['asset1'];
         $fullassetId2=$jsonarray[$i]['asset2'];

         $assetId1 = preg_split('/#/',$fullassetId1);
         $assetId2 = preg_split('/#/',$fullassetId2);


      echo "<table>";
 
      $id=$value['requestId'];
     // echo "<td>$id</td>";
      $fullassetId1=$value['asset1'];
       $asset1 = preg_split('/#/',$fullassetId1);
       //     echo "<td>$asset1[1]</td>";
      $fullassetId2=$value['asset2'];
      $asset2 = preg_split('/#/',$fullassetId2);
         //   echo "<td>$asset2[1]</td>";
      $state=$value['state'];
           // echo "<td>$state</td>";
   echo"<form method='POST' action='process.php'>
   <input type='text' name='action'     value='echanger'  >
   <input type='text' name='assetId1'   value='$asset1[1]'  >
   <input type='text' name='assetId2'   value='$asset2[1]'  >
   <input type='text' name='requestId'  value='$id'  >
   <input type='text' name='assetId1'   value='$state'  >
   <input type='submit' name='echanger' value='Echanger' />";
   echo"</form>";
      echo "</table>";
 
 
      /*
{
  "$class": "org.acme.sample.SubmitRequest",
  "asset": "string",
  "newstate": "string",
  "transactionId": "string",
  "timestamp": "2017-10-19T18:33:35.542Z"
}
 
      */
 
      }
   }
 
}
?>