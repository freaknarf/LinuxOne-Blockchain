<?php



echo "<div id='window' class='row'>";

//form add an user asset
echo"
	<div class='col-12 panel'><label> Se connecter</label>
		<form method='post' action='process.php'>
			<label>ParticipantId<input type='integer' name='participantId' /></label></br>
			<label>Mot de passe<input type='password' name='mdp' /></label>

         <input type='submit' name='connection' value='Se connecter'/>
		</form>
	</div>
";





echo "</div>";


?>