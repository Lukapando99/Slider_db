<?php
// Start the session
session_start();

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

	
	
	$sql = "SELECT id FROM utenti 
	WHERE Nome_utente='$user' && Pswd='$pswd'";

	$result = mysqli_query($conn, $sql);
	
	if(!$result) die("Errore SQL: " .mysqli_error($conn));
	
	if (mysqli_num_rows($result) > 0) {
    // output data of each row
		while($row = mysqli_fetch_assoc($result)) {
			$utenza = $row["id"];
		}
	}
	else {
		echo "0 results";
}

$_SESSION["utenza"] = $utenza;


?>
<html>

<title>
	AGGIUNGI PRESET
</title>

<link rel="stylesheet" type="text/css" href="Sorgente_CSS.css"/>

<body>

	<form action="Dati.php" method="POST" class="form">
		<div class="switch-field" align="center">
			<h1>
			Scorrimento
			</h1>
				
					<input type="radio" id="mv1" name="mv" value="1"checked/>
					<label for="mv1">Completo</label><br><br>
					<input type="radio" id="mv2" name="mv" value="2"> 
					<label for="mv2">1/2</label><br><br>
			</div>	
			<div class="switch-field" align="center">
					<input type="radio" id="mv3" name="mv" value="3"> 
					<label for="mv3">1/4</label>
					
			</div>	
			<div class="switch-field" align="center">
			<h1>
			Direzione
			</h1>
				
					<input type="radio" id="dirdx" name="dir" value="dx" checked/>
					<label for="dirdx">Destra</label><br><br>
					<input type="radio" id="dirsx" name="dir" value="sx">
					<label for="dirsx">Sinistra</label>
					
			
			</div>
			<div class="switch-field" align="center">
			<h1>
			Rotazione
			</h1>
				
					<input type="radio" id="gira1"name="gira"  value="1" checked/>
					<label for="gira1">Completo</label><br><br>
					<input type="radio" id="gira2" name="gira" value="2"> 
					<label for="gira2">1/2</label><br><br>
			</div>
			<div class="switch-field" align="center">
					<input type="radio" id="gira3" name="gira" value="3">
					<label for="gira3">1/4</label>
			</div>
			<div class="switch-field" align="center">	
			<h1>
			Direzione Rotazione
			</h1>
				
					<input type="radio" name="ruota" id="ruotadx" value="dx" checked/>
					<label for="ruotadx">Destra</label><br><br>
					<input type="radio" name="ruota" id="ruotasx" value="sx"> 
					<label for="ruotasx">Sinistra</label>
		</div>
		<div align="center">
			<br>
			<input type="submit" class="btn" value="Aggiungi">
				
		</div>
		
	</form>
</body>

</html>