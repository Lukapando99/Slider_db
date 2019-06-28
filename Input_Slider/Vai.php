<?php

	$pre = $_POST["pre"];
	
	
	$output = exec("python /path/prova.py $pre");
	echo $output;
	
	echo "Preset selezionato: ". $pre;
	
?>