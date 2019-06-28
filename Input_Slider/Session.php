<?php
		//Apro la sessione e...
		session_start();

		//Recupero username e password dal form
		$user = $_POST['user'];
		$pswd = $_POST['pswd'];

		//Salvo i dati...
		$_SESSION['user'] = $user;
		$_SESSION['pswd'] = $pswd;
?>
<html>
	<META HTTP-EQUIV=REFRESH content="0;Load_Preset.php">
</html>