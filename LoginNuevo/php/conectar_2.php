<?php
	/*crea la conexion a la base de datos.*/
	$hostname = "p:148.216.0.150"; 
	$username = "rdglpz";
	$password = "root";
	$bdeDatos = "umichccu_sistemaIncidentes";

	if (!isset($_SESSION)){
		session_start();	
	}
	
	$consulta_db = new mysqli($hostname, $username, $password,$bdeDatos);

	if ($consulta_db->connect_error) {
	    die("Connection failed: " . $consulta_db->connect_error);
	}

/*	if ($consulta_db->ping()) {
		$consulta_db->reconnect;
    	printf ("¡La conexión está bien!\n");
	} else {
		$consulta_db->reconnect;
	    printf ("Error: %s\n", $mysqli->error);
	}
*/
?>