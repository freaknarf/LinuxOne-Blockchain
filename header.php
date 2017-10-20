<?php

   echo "<div id='header'> 
            <h3> TROCAPP</h3>";
            	echo "<div id='menu_login'>";

            if (!isset($_SESSION['participantId'])){
            		 echo "<a href='login.php' >Log in </a>";
            		 echo "<a href='inscription.php' >Sign in</a>";


            }else{
            		echo "<label>Connected:".$_SESSION['participantId']."</label>";
                        echo "  <a href='deconnexion.php'>Disconnect</a>";

            }
            	echo "</div>";


echo   "</div>";

?>