<?php



echo "<div id='window' class='row'>";

$id = rand(1,9999);

//form add an user asset
echo"
	<div class='col-12 panel'><label>Inscription</label>
		<form method='post' action='process.php'>
			<label>ParticipantId<input type='integer' name='participantId' value='$id' /></label></br>
			<label>Mot de passe<input type='password' name='mdp' /></label>

         <input type='submit' name='inscription' value='Se connecter'/>
		</form>
	</div>
";





echo "</div>";


?>