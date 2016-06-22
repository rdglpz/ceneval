<?php
	include 'php/elem_html/input.php';
	include 'php/elem_html/button.php';
	include 'php/elem_html/select.php';
	include 'php/consultas/insertar.php';
	include 'php/conectar_2.php';
	include 'php/elem_html/label_solo_lectura.php';
	$query = "select * from dependencias";
	$result = mysqli_query($consulta_db, $query);
	$i=0;
	$opciones=[];
	$valores=[];

	if (!$result){
		    	echo "Fallo al ejecutar la consulta: (" . $consulta_db->errno . ") " . $consulta_db->error;
	}else{
		while ($fila = $result->fetch_assoc()){
			$opciones[$i] = $fila ["nombre"];
			$valores[$i] = $fila ["id_dependencia"];
			$i++;
		}
	}

?>

<!DOCTYPE html>
	<html lang="es">
		<head>
			<meta charset="UTF-8">
			<title>Registro de nuevo ususario</title>
			<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
			<link rel="stylesheet" href="css/bootstrap.min.css">
			<link rel="stylesheet" href="css/form_registro.css">
			<link rel="stylesheet" href="css/signin.css">
		</head>
		<body>
			<?php
				/*definicion de inputs, labels, botones y selects.*/

				$input_1 = new input("text","id_emp","id_emp_2","'Número de empleado:'","^[0-9]*$","",0);
				$input_2 = new input("text","nombre","id_nombre","'Nombre:'","^[a-zA-Z]*$","",0);
				$input_3 = new input("text","appat","id_pat","'Apellido Paterno:'","^[a-zA-Z]*$","",0);
				$input_4 = new input("text","apmat","id_mat","'Apellido Materno:'","^[a-zA-Z]*$","",0);
				$input_5 = new input("email","correo","id_correo","'Correo Electrónico:'","*$","",0);
				$input_6 = new input("password","pass","pass_id","'Contraseña:'","^[a-zA-Z0-9]*$","",0);
				$input_7 = new input("password","pass_2","pass_id2","'Verifica contraseña:'","^[a-zA-Z0-9]*$","",0);

				$label_1 = new label_solo_lectura("id_emp_2","Número de empleado:");
				$label_2 = new label_solo_lectura("id_nombre","Nombre:");
				$label_3 = new label_solo_lectura("id_pat","Apellido Paterno:");
				$label_4 = new label_solo_lectura("id_nombre","Apellido Materno:");
				$label_5 = new label_solo_lectura("id_nombre","Correo Electrónico:");
				$label_6 = new label_solo_lectura("pass_id","Contraseña:");
				$label_7 = new label_solo_lectura("pass_id2","Verifica contraseña:");

				$button_1 = new button("submit","registro","Registrar");

				$select_1 = new select_list($opciones,$valores,"Dependencia","id_dep","dep");

				$inputs=[$input_1,$input_2,$input_3,$input_4,$input_5,$input_6,$input_7];
				$labels=[$label_1,$label_2,$label_3,$label_4,$label_5,$label_6,$label_7];
			?>
			<h1 class="form-signin-heading">Reportes de Incidentes<br> Institucional</h1>
			<h2 class="form-signin-heading">Registro de Nuevo Usuario</h2>
			<div class="container">
				<form method="post" class="form-margin form-signin" name="registro" onsubmit="return verifica_igual()" action ="new_reg_user.php">
					<br>
					<!-- entradas de texto -->
					<div class="form-group">
						<?php
							/*se imprimen los elmentos*/
							for($i=0;$i<count($inputs);$i++){
								$labels[$i]->crea_label();
								$inputs[$i]->crea_input();
							}

							$select_1->crea_select();
						?>
					</div>		
					<br>
					<?php
						$button_1->crea_button();
					?>
				</form>
			</div>
			<?php
				if (isset($_POST["registro"])){
					
					$id_emp = $_POST["id_emp"];
					$nombre = $_POST["nombre"];
					$appat = $_POST["appat"];
					$apmat = $_POST["apmat"];
					$correo = $_POST["correo"];
					$pass = $_POST["pass"];
					$depend = $_POST["dep"];

					$query = "describe usuarios";
					$result = mysqli_query($consulta_db, $query);
					$nombre_elementos = [];
					$i=0;

					if (!$result){
		    			echo "Fallo al ejecutar la consulta: (" . $consulta_db->errno . ") " . $consulta_db->error;
					}else{
						while ($fila = $result->fetch_assoc()){
							$nombre_elementos[$i] = $fila ["Field"];
							$i++;
						}
					}

					$addelem_tabla = [$id_emp,$depend,$correo,$nombre,$apmat,$appat,$pass,"1","0"];
					$inserta = new inserta($addelem_tabla,$nombre_elementos,$consulta_db,"usuarios");
					$inserta->insertar_en_tabla();

				}
			?>
			<script src="js/jquery.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
			<script src="js/ver_pass.js"></script>
		</body>
	</html>