<?php

require_once "./conexion.php";

$consulta = "SELECT * from tipos_usuarios";
$datos = mysqli_query($enlace, $consulta);
$fila = mysqli_fetch_array ($datos);

$consulform=$enlace->prepare("SELECT * FROM provincias order by nombre asc");
if ($consulform->execute()) {
    $resultados = $consulform->get_result();
$provincias = null;
while ($provincia = $resultados->fetch_assoc()) {
    $provincias = $provincias . "<option
    value=".$provincia['id'].">".
    ucwords($provincia['nombre'])."</option>";
}

$consulform->free_result();
$consulform->close();
}

$consulform=$enlace->prepare("SELECT * FROM ciudades order by nombre asc");
if ($consulform->execute()) {
    $resultados = $consulform->get_result();
$ciudades = null;
while ($ciudad = $resultados->fetch_assoc()) {
    $ciudades = $ciudades . "<option
    value=".$ciudad['id'].">".
    ucwords($ciudad['nombre'])."</option>";
}

$consulform->free_result();
$consulform->close();
}

$consulform=$enlace->prepare("SELECT * FROM tipos_usuarios order by nombre asc");
if ($consulform->execute()) {
    $resultados = $consulform->get_result();
$tusuarios = null;
while ($tusuario = $resultados->fetch_assoc()) {
    $tusuarios = $tusuarios . "<option
    value=".$tusuario['id'].">".
    ucwords($tusuario['nombre'])."</option>";
}
$consulform->free_result();
$consulform->close();

}

$consulform=$enlace->prepare("SELECT * FROM carreras order by nombre asc");
if ($consulform->execute()) {
    $resultados = $consulform->get_result();
$carreras = null;
while ($carrera = $resultados->fetch_assoc()) {
    $carreras = $carreras . "<option
    value=".$carrera['id'].">".
    ucwords($carrera['nombre'])."</option>";
}
$consulform->free_result();
$consulform->close();

}

$consulform=$enlace->prepare("SELECT * FROM espacios_curriculares order by nombre asc");
if ($consulform->execute()) {
    $resultados = $consulform->get_result();
$esp_currs = null;
while ($esp_curr = $resultados->fetch_assoc()) {
    $esp_currs = $esp_currs . "<option
    value=".$esp_curr['id'].">".
    ucwords($esp_curr['nombre'])."</option>";
}
$consulform->free_result();
$consulform->close();

}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/styles.css"/>
    <title>Inicio de Sesión - Enfermería</title>
    <script>
        function control() {
        //     var estado=true;
        //     if(document.getElementById("dni").value=="" || document.getElementById("password").value=="" || document.getElementById("nombre").value=="" || document.getElementById("apellido").value==""){
        //         estado=false;
        //         return estado;
        //     }
            return true;
        }
        function passIguales(){
            var pass1 = document.getElementById("contraseña").value;
            var pass2 = document.getElementById("contraseña2").value;
            var boton = document.getElementById ("enviar");
            console.log(boton);
            if(pass1==pass2){
                boton.removeAttribute("disabled");
        } else
            boton.setAttribute("disabled", true);
            // return pass1==pass2 (otra manera mas corta)
        }

    </script>

</head>

<body id="body2">

    <header class="header_1">
        <h1 id="titulo">INSITUTO SUPERIOR DE FORMACIÓN DOCENTE "MERCEDES"</h1>
    </header>

    <div>
        <img class="img-header" src="img/Logo-ISFD-Banderin-tricolor-01-500x500.png" width="130px" height="180px">
    </div>

    <div class="formusr">
        <form class="was-validated" action="registro.php" method="post" onclick="return control()">
            <div class="form-group" class="mb-3">
                <label for="dni">DNI</label>
                <input class="form-control is-invalid" required type="text" id="dni" name="dni" size="60em" placeholder="Tipear su DNI">
            </div>
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input class="form-control is-invalid" required type="password" id="contraseña" name="password"  size="60em" placeholder="Tipear una contraseña" autocomplete=off>
                </div>
            <div class="form-group">
                <label for="password2">Ingrese nuevamente la contraseña</label>
                <input class="form-control is-invalid" required type="password" id="contraseña2" name="password2" onkeyup="passIguales()" size="60em" placeholder="Tipear nuevamente la contraseña" autocomplete=off>
            </div>

            <hr>
            
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input required type="text" id="nombre" name="nombre" size="60em" placeholder="Tipear su nombre">
            </div>

            <div class="form-group">
                <label for="apellido">Apellido</label>
                <input required type="text" id="apellido" name="apellido" size="60em" placeholder="Tipear su apellido">
            </div>

            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" name="email" id="email" size="60em" placeholder="Tipear su correo electrónico">
            </div>

            <div class="form-group">
                <label for="direccion">Dirección</label>
                <input type="text" id="direccion" size="60em" placeholder="Tipear su domicilio">
            </div>

            <div class="form-group">
                <label for="telefono">Telefono</label>
                <input type="text" id="telefono" size="60em" placeholder="Tipear su telefono">
            </div>

            <div class="form-group">
                <label for="fechanacimiento">Fecha de nacimiento</label>
                <input type="date" id="nacimiento" size="60em" placeholder="Tipear su fecha de nacimiento">
            </div>

            <div class="form-group2">
                <label for="provincia">Provincia</label>
            </div>
            <form action="" method="post">
                <select name="provincia_id">
                    <option value="null"> Seleccione una Provincia </option>
                    <?php echo $provincias ?>
                </select>
            </form>

            <div class="form-group2">
                <label for="ciudad">Ciudad</label>
            </div>
            <form action="" method="post">
                <select name="ciudad_id">
                    <option value="null"> Seleccione una ciudad </option>
                    <?php echo $ciudades ?>
                </select>
            </form>

            <div class="form-group2">
                <label for="tipos_usuarios">Tipo de usuario</label>
            </div>
            <form action="" method="post">
                <select name="tipo_usuario_id">
                    <option value="null"> Seleccione un tipo de usuario </option>
                    <?php echo $tusuarios ?>
                </select>
            </form>

            <div class="form-group2">
                <label for="carreras">Carrera</label>
            </div>
            <form action="" method="post">
                <select name="carrera_id">
                    <option value="null"> Seleccione su carrera </option>
                    <?php echo $carreras ?>
                </select>
            </form>

            <div class="form-group2">
                <label for="espacios_curriculares">Espacio Curricular</label>
            </div>
            <form action="" method="post">
                <select name="espacios_curriculares_id">
                    <option value="null"> Seleccione su espacio curricular </option>
                    <?php echo $esp_currs ?>
                </select>
            </form>

            <div class="form-group">
                <label for="ciclo_lectivo">Ciclo lectivo</label>
                <input required type="text" id="ciclo_lectivo" name="ciclo_lectivo" size="60em" placeholder="Tipear su año lectivo">
            </div>

            <div class="btn-group btn-group-xl d-grid gap-2 col-6 mx-auto" role="group" aria-label="Basic example">
                <button type="submit" id="enviar" class="btn btn-primary btn-lg" value="enviar">Enviar</button>
            </div>
            
        </form>
    </div>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>