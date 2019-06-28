<?php
	
	
		
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = 'slide_db';
	
	$name = $_POST["name"];
	$cogn = $_POST["cogn"];
	$user = $_POST["user"];
	$pswd = $_POST["pswd"];
		

	// Create connection
	$conne = mysqli_connect($servername, $username, $password, $dbname);
	
		
	//var_dump($conne);

	if (!$conne) {
		die("Connection failed: " . mysqli_connect_error());
	}
	//echo "Connected successfully";
	//echo "<br>";
		
	
	$sql = "INSERT INTO utenti(Nome, Cognome, Nome_Utente, Pswd)
	VALUES ('$name','$cogn','$user','$pswd')";
	if (mysqli_query($conne, $sql)) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conne);
	}

?>
<html>
	<META HTTP-EQUIV=REFRESH content="3;Index.php">
</html>