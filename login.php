<?php
require_once "./conexion.php";
$error='';
if (isset($_POST["enviar"])) {
    $link = $enlace;
    $dni = $_POST["dni"];
    $password = $_POST["pass"];
    $sql = "SELECT dni, 'password', nombre, apellido, email, tipo_usuario_id  FROM usuarios_personas WHERE dni=?";
    $consulta = $link->prepare($sql);
    $consulta->bind_param('i',$dni);
   
    if ( $consulta=$enlace->prepare($sql)) {
        $consulta->bind_param("i",$dni);
        $consulta->bind_result($dniBd, $passBd, $nombre, $apellido, $emailBd, $tipo);

        if($consulta->fetch()){
            $consulta->free_result();
            $consulta->close();
            if ($password==$passBd){
                session_start();
                $_SESSION["dni"]=$dni;
                $_SESSION["nombre"]=$nombre;
                $_SESSION["apellido"]=$apellido;
                $_SESSION["email"]=$emailBd;
                $_SESSION["tipo"]=$tipo;
                if($tipo==1){
                    header("location: home.php");
                    exit;
                }
            }
        }
        $error='exito';
    }
    else{
        $error='usuario no existe';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/styles.css"/>
    <title>Inicio de sesión</title>
</head>

<body id="body2">

<div class="dropdown-menu_1">
<form class="px-4 py-3" method = "post" action = "#">
<div class="mb-3">
    <label for="exampleDropdownFormEmail1" class="form-label" >DNI</label>
    <input type="number" class="form-control" id="exampleDropdownFormEmail1" placeholder="Ingrese su DNI" name="dni">
</div>
<div class="mb-3">
    <label for="exampleDropdownFormPassword1" class="form-label" >Password</label>
    <input type="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="Ingrese su contraseña" name="pass">
</div>
<div class="mb-3">
    <div class="form-check">
    <input type="checkbox" class="form-check-input" id="dropdownCheck">
    <label class="form-check-label" for="dropdownCheck">
        Guardar datos
    </label>
    </div>
</div>
<button type="submit" class="btn btn-primary" name="enviar">ENVIAR</button>
</form>
<div class="dropdown-divider"></div>
<a class="dropdown-item" href="#">Registrarse</a>
<a class="dropdown-item" href="#">¿Olvidaste tu contraseña?</a>
</div>
<div>
    <?php
    echo $error;
    ?>
</div>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>