<?php

function DisplayMyItems(){
   $curl=new Curl();  
   $myItems=json_decode($curl->curlGet("/org.acme.sample.UserAsset"),true);
   echo'<table>';

   foreach ($myItems as $key => $value) {
      if($value['owner']=="resource:org.acme.sample.SampleParticipant#participantId:".$_SESSION['participantId']){
         $description=$value["description"];
         echo "<tr><td value=$description>$description</td>";
                  $value=$value["value"];
         echo "<td value=$value>$value</td></tr>";
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
         echo "<tr><td class='item' value=$description>$description</td>";
         $value=$value["value"];
         echo "<td value=$value>$value</td>";
         echo"<td><a class='btn btn-info' role='button' href='tradeForm.php?assetId=$assetId'> Echanger</td></tr>";
      }
   }

   echo'</table>';
}

function DisplayTrades(){
   $curl=new Curl(); 
   $myTrades=json_decode($curl->curlGet("/org.acme.sample.Request"),true);;;

   echo'<table>';


   foreach ($myTrades as $key => $value) {
//      if($value['owner']!="resource:org.acme.sample.SampleParticipant#participantId:".$_SESSION['participantId'])
      {



         echo "<table class='trade'>";

         $id=$value['requestId'];
         if (isset($id))
            echo "<td>$id</td>";

///DISPLAY ASSET 1 DESCRIPTION
         $asset1=$value['asset1'];
         if (isset($asset1)){
            echo "<td>$asset1</td>";
            $assetId1= explode("assetId:", $asset1);
            $assetId1="assetId:".$assetId1[count($assetId1)-1];
            if (isset($assetId1)){
                $myItem=json_decode($curl->curlGet("/org.acme.sample.UserAsset"."/$assetId1"),true);
            
            }
            if (isset($myItem['description']))
               echo $myItem['description'].' - ';
         }
///DISPLAY ASSET 2 DESCRIPTION
         $asset2=$value['asset2'];
          if (isset($asset2))   {
            echo "<td>$asset2</td>";

         $assetId2= explode("assetId:", $asset2);
         $assetId2="assetId:".$assetId2[count($assetId2)-1];
         $myItem=json_decode($curl->curlGet("/org.acme.sample.UserAsset"."/$assetId2"),true);
         if (isset($myItem['description']))
            echo $myItem['description'];
         }
///DISPLAY TRADE STATE
         $state=$value['state'];
         if (isset($state))
            if ($state=='OK')
            echo "<td class='.bg-success'>$state</td>";
            else
            echo "<td class='.bg-danger'>$state</td>";

         echo"<form class='trade' method='POST' action='process.php'>
         <input type='text' name='action'     value='echanger'  hidden>
         <input type='text' name='assetId1'   value='$asset1'  hidden>";
         if (isset($asset2) )
            echo"<input type='text' name='assetId2'   value='$asset2'  hidden>";
         echo"<input type='text' name='requestId'  value='$id'  hidden>
         <input type='text' name='assetId1'   value='$state'  hidden>";
         if ($state!='OK')
            echo"<input type='submit'  class='btn btn-info' name='trade' value='Echanger' />";
         echo"</form>";
         echo "</table>";



}
}

}

/*
=======


>>>>>>> 889a954b46d13e3ed262cc12986e1e3cedf7b769
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
<<<<<<< HEAD
         $assetId1=$jsonarray[$i]['asset1'];
         $assetId2=$jsonarray[$i]['asset2'];
=======
         $fullassetId1=$jsonarray[$i]['asset1'];
         $fullassetId2=$jsonarray[$i]['asset2'];

         $assetId1 = preg_split('/#/',$fullassetId1);
         $assetId2 = preg_split('/#/',$fullassetId2);

>>>>>>> 889a954b46d13e3ed262cc12986e1e3cedf7b769
         $requestId=$jsonarray[$i]['requestId'];


         ///// warning big shit here
<<<<<<< HEAD
         echo "<td><a href='process.php?action=echanger&requestId=".$requestId."&assetId1=".htmlspecialchars($assetId1)."&assetId2=".$assetId2."'>Echanger</a></td>";
=======
         echo "<td><a href='process.php?action=echanger&requestId=".$requestId."&assetId1=".$assetId1[1]."&assetId2=".$assetId2[1]."'>Echanger</a></td>";
>>>>>>> 889a954b46d13e3ed262cc12986e1e3cedf7b769
         
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
<<<<<<< HEAD
*/

?>