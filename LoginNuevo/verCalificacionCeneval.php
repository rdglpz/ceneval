<?php
    session_start();
	include('server.php');
	$mysqli = new mysqli($hostname, $username, $password,$bdeDatos);
	if ($mysqli->connect_error) {
		die("Connection failed: " . $mysqli->connect_error);
	}
    $tableName = "umichccu_sistemaIncidentes.ejemplo";
	$folioCeneval=$_POST["inputUsuario"];  
	$query="SELECT NOMBRE, APE_MAT, APE_PAT, FOLIO_CENEVAL, MATRICULA, LUG_GPI, PCNE, PPMA, PPAN, DICTAMEN FROM umichccu_sistemaIncidentes.ejemplo where FOLIO_CENEVAL=$folioCeneval";
//	echo $query;
	$result = mysqli_query($mysqli, $query);
      $mysqli->close();
    $theVariable = array("NOMBRE", "APELLIDO PATERNO", "APELLIDO MATERNO", "FOLIO_CENEVAL", "MATRICULA", "LUG_GPI", "PCNE", "PPMA", "PPAN", "DICTAMEN");
   
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <title>Calificaciones CENEVAL</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
</head>

<body>
    <div class="container">
   
            <br>
            <h2>Resultado CENEVAL</h2>
        
            <div class="row" >
                 
      
       
            
    
    
  
            
<?
                    if ($result->num_rows > 0) {
                        echo '<div class="table-responsive">';
                        echo '<table class="table">';
                        $i=0;
                        echo "<tbody>";
                        while($row=mysqli_fetch_array($result,MYSQLI_NUM)) {
                            $tamResultado = sizeof($row);
                            for ($j=0; $j<$tamResultado; $j++){
                                 echo "<tr>";
                                echo "<td> ".$theVariable[$j].": </td>";
                                echo " <td> ".$row[$j]." </td>";
                                echo "</tr>";
                            }
                             
                        }
                        echo "</tbody>";
                        echo "</table>";
                     
                    }else{
                        echo "<p>No hay resultados: Verifica tu numero de matrícula</p>";
                    }
                  
?>
            
  </div>
          <form action="login.php" class="form-signin" method="post">   
           
        <button class="btn btn-lg btn-primary btn-block" type="submit">Consultar otro folio</button>
        </form>
                    
             
  
  
                <div class="col-sm-5 text-right">
           
                </div>
            </div>
     <!--   <button class="btn btn-lg btn-primary btn-block" type="submit">Regresar</button> -->
  
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>

