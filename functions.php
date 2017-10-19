<?php

function DisplayMyItems(){
   $curl=new Curl();  
   $myItems=json_decode($curl->curlGet("/org.acme.sample.UserAsset"),true);
   echo'<table>';

   foreach ($myItems as $key => $value) {
      if($value['owner']=="resource:org.acme.sample.SampleParticipant#".$_SESSION['participantId']){
         $description=$value["description"];
         echo "<tr><td value=$description>$description</td></tr>";
      }
   }
   echo'</table>';

}

function DisplayAllItems(){
   $curl=new Curl(); 
   $myItems=json_decode($curl->curlGet("/org.acme.sample.UserAsset"),true);;;
   echo'<table>';


   foreach ($myItems as $key => $value) {
      if($value['owner']!="resource:org.acme.sample.SampleParticipant#".$_SESSION['participantId']){
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
         
         echo "<td><a href='process.php?action=echanger'>Echanger</a></td>";
         
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

?>