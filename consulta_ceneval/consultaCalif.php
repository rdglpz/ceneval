<?php
    include 'php/elem_html/input.php';
    include 'php/elem_html/label_solo_lectura.php';
    session_start();
    if ((isset($_SESSION['flag']))) {
        $_SESSION['flag']==NULL;
        session_write_close();
        $recuperarPswd = "<div><a href='recuperar_pass.php'>Recuperar Contraseña</a></div>";
    }else{
        echo isset($_SESSION['flag']);
        $_SESSION['flag']=NULL;
        $recuperarPswd = "";
    }
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
    <?php
        $input_1 = new input("text","inputUsuario","cveCeneval","'FOLIO CENEVAL'","^[0-9]*$","",0);
        $label_1 = new label_solo_lectura("id_user","Usuario:");
        $inputs = [$input_1];
        $labels = [$label_1];
    ?>
    <h1 class="form-signin-heading">Calificaciones Ceneval</h1>
    <div class="container">
        <form action="verCalificacionCeneval.php" class="form-signin" method="post">   
            <h2 class="form-signin-heading">Introduce tu FOLIO de CENEVAL </h2>
            <h3> (compuesto por 9 dígitos)<h3>
            <br>
            <?php
                for ($i=0;$i<count($inputs);$i++){
                    $labels[$i]->crea_label();
                    $inputs[$i]->crea_input();
                }
            ?>
            <div class="row" >
                <div class="col-sm-7 text-left">
                    <?php //echo $recuperarPswd ?>
                </div>
                <div class="col-sm-5 text-right">
                <!--    <a href="new_reg_user.php">Nuevo usuario</a> -->
                </div>
            </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Consultar Calificación</button>
        </form>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>

