<?php
// Start the session
session_start();
		
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = 'slide_db';
	
	$mv = $_POST["mv"];
	$dir = $_POST["dir"];
	$gira = $_POST["gira"];
	$ruota = $_POST["ruota"];
	$utenza = $_SESSION["utenza"];	

	// Create connection
	$conne = mysqli_connect($servername, $username, $password, $dbname);
	
	
	$sql = "INSERT INTO preset(mv, dir, gira, ruota)
	VALUES ('$mv','$dir','$gira','$ruota')";
	if (mysqli_query($conne, $sql)) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conne);
	}
		
	//var_dump($conne);

	if (!$conne) {
		die("Connection failed: " . mysqli_connect_error());
	}
	echo "Connected successfully";
	echo "<br>";
		
	$sql1 = "SELECT preset.ID FROM preset 
			ORDER BY ID DESC LIMIT 1";
	
	$result = mysqli_query($conne, $sql1);
	
	if(!$result) die("Errore SQL: " .mysqli_error($conne));
		
	//if (mysqli_num_rows($result) > 0) { 
    // output data of each row
		//while($row = mysqli_fetch_assoc($result)) {
			$row = mysqli_fetch_assoc($result);
			$identifica = $row["ID"];
		//}
	//}
	//else {
	//echo "0 results";
	//}
	
	$sql2 = "INSERT INTO carica(utente_fk, id_fk)
	VALUES ('$utenza','$identifica')";
	if (mysqli_query($conne, $sql2)) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql2 . "<br>" . mysqli_error($conne);
	}
	
	
	
	mysqli_close($conne);

?>

<html>
	 <META HTTP-EQUIV=REFRESH content="0;Load_Preset.php"> 
</html>