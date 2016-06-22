<?php
	include 'php/elem_html/input.php';
	include 'php/elem_html/label_solo_lectura.php';
	include 'php/elem_html/button.php';
?>

<!DOCTYPE html>
	<html lang="es">
		<head>
			<meta charset="UTF-8">
			<title>Registro de nuevo ususario</title>
			<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
			<link rel="stylesheet" href="css/bootstrap.min.css">
			<link rel="stylesheet" href="css/form_registro.css">
			<link href="css/signin.css" rel="stylesheet">
		</head>
		<body>
			<?php
				/*definicion de inputs, labels, botones.*/
				$input_1 = new input("text","id_emp","id_emp_2","'Número de empleado:'","^[0-9]*$","",0);
				$label_1 = new label_solo_lectura("id_emp_2","Número de empleado:");
				$button_1 = new button("submit","reuperar","Recuperar");
				$inputs=[$input_1];
				$labels=[$label_1];
			?>
			<h1 class="form-signin-heading">Reportes de Incidentes<br> Institucional</h1>
			<h2 class="form-signin-heading">Recuperar Contraseña</h2>
			<div class="container">
				<form method="post" class="form-signin form-margin" name="registro" onsubmit="return verifica_igual()" action ="#">
					<!-- entradas de texto -->
					<div class="form-group">
						<?php
							/*se imprimen los elmentos*/
							for($i=0;$i<count($inputs);$i++){
								$labels[$i]->crea_label();
								$inputs[$i]->crea_input();
							}
						?>
					</div>		
					<br>
<button class="btn btn-lg btn-primary btn-block" type="submit">Recuperar</button>
				</form>
			</div>
			<script src="js/jquery.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
		</body>
	</html>