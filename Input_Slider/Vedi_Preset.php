<?php
	$servername = "127.0.0.1";
	$username = "root";
	$password = "";
	$dbname = "slide_db";
	// Connessione
	
	
	$conn = mysqli_connect($servername, $username, $password,$dbname);
	if (!$conn)
		die("Connection failed: " . mysqli_connect_error());

	$sql = "SELECT ID, mv, dir, temp, gira, ruota  FROM preset 
	INNER JOIN carica ON id_fk WHERE utente_fk=$utenza";
	
	$result = mysqli_query($conn, $sql);
	
	if(!$result) die("Errore SQL: " .mysqli_error($conn));
	
	$return = array();
	
	while($row = mysqli_fetch_assoc($result)){
		
		$return[] = $row; 
		
	}
	
	echo json_encode($return);
	echo "<input type=\"button\" onclick=\"location.href='Index.html'\" value=\"HOME\"/>";
	
?>
<html>
	<title>
		Slider
	</title>
	
	<body>
	
	<table style="width:100%">
  <tr>
    <th>Firstname</th>
    <th>Lastname</th> 
    <th>Age</th>
  </tr>
  <tr>
    <td>Jill</td>
    <td>Smith</td> 
    <td>50</td>
  </tr>
  <tr>
    <td>Eve</td>
    <td>Jackson</td> 
    <td>94</td>
  </tr>
</table>
	
	</body>
	
	
</html>