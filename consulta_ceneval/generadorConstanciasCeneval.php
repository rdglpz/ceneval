<?php
	include('server.php');
	$mysqli = new mysqli($hostname, $username, $password,$bdeDatos);
	if ($mysqli->connect_error) {
		die("Connection failed: " . $mysqli->connect_error);
	}
	$id=$_POST["inputUsuario"];
    $pswd=$_POST["inputPassword"];
    $sql = "SELECT * FROM umichccu_sistemaIncidentes.usuarios where id_usuario='$id' and contraseña='$pswd'";
    $result = mysqli_query($mysqli, $sql);
    if (!$result){
        echo "Fallo al ejecutar la consulta: (" . $mysqli->errno . ") " . $mysqli->error;
         $mysqli->close();
    }
    if ($fila = $result->fetch_assoc()) {
        // echo "Usuario Valido, redireccionar...";
        session_start();
        $_SESSION['id'] = $fila['id_usuario'];
        $_SESSION['mysqli'] = $mysqli;
        header('Location: menuBaseDeDatos.php');
    }else{
        // echo "Contraseña Incorrecta";
        header('Location: login.php');
    }
?>
