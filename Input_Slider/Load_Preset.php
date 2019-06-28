<?php
// Start the session
session_start();
?>
<html>

	<title>
		Slider
	</title>
	
	<link rel="stylesheet" type="text/css" href="Sorgente_CSS_inserisci.css"/>
	
	<body>
		
	<?php
	$servername = "127.0.0.1";
	$username = "root";
	$password = "";
	$dbname = "slide_db";
	// Connessione
	
	//Recupero i dati...
	$user = $_SESSION['user'];
	$pswd = $_SESSION['pswd'];
	
	
	$conn = mysqli_connect($servername, $username, $password,$dbname);
	if (!$conn)
		die("Connection failed: " . mysqli_connect_error());

	
	
	$sql = "SELECT preset.ID, mv, dir, gira, ruota  FROM preset 
	INNER JOIN carica ON id_fk=preset.ID INNER JOIN utenti ON utenti.id=utente_fk
	WHERE Nome_utente='$user' && Pswd='$pswd'";
	
	$result = mysqli_query($conn, $sql);
	
	if(!$result) die("Errore SQL: " .mysqli_error($conn));
	
	if ($result->num_rows > 0) {
    // output data of each row
		while($row = $result->fetch_assoc()) {
			echo "<br> ID". $row["ID"]. " - Scorrimento: ". $row["mv"]. " Direzione: " . $row["dir"] . " Rotazione: ". $row["gira"]. " Direzione rotazione: ". $row["ruota"]. "<br>";
		}
	} else {
	echo "0 results";
}
	
	//echo json_encode($return);
	//echo "<input type=\"button\" onclick=\"location.href='Index.html'\" value=\"HOME\"/>";
		
?>

	<form action="Vai.php" method="POST">
		
		<div align="center">
		<h1>
		Carica Preset
		</h1><br>
		<input type="number" name="pre" min="1" placeholder="Numero Preset..."><br>
		<input type="submit" class="btn" value="Avvia"><br><br>
		<h1>
		<a href="Aggiungi_Preset.php">Aggiungi Preset</a>
		<h1>
		<!--
		<a href="Vedi_Preset.php">Visualizza Preset</a><br>
		-->
	</form>	
	</body>
	
	
</html>