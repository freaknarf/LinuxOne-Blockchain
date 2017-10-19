<?php



echo "<div id='window' class='row'>";

$id = rand(1,9999);

//form add an user asset
echo"
	<div class='col-12 panel'><label>Inscription</label>
		<form method='post' action='process.php'>
			<label>ParticipantId<input type='integer' name='participantId' value='$id' /></label></br>
			<label>Mot de passe<input type='password' name='password' /></label></br>
			<label>Prénom<input type='text' name='first_name' /></label></br>
			<label>Nom<input type='text' name='last_name' /></label></br>

         <input type='submit' name='inscription' value='Se connecter'/>
		</form>
	</div>
";





echo "</div>";


?>