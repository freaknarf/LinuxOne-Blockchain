<?php
session_start();

   echo "<div id='header'> 
            <h3> TROCAPP</h3>";
            	echo "<div id='menu_login'>";

            if (!isset($_SESSION['participantId'])){
            		 echo "<a href='login.php' >Connection </a>";
            		 echo "<a href='inscription.php' >Connection </a>";


            }else{
            		echo "<label>Connecter en tant que participant ".$_SESSION['participantId']."</label>";

            }
            	echo "</div>";


echo   "</div>";


?>