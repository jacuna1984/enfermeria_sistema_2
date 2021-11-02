<?php

require_once "./conexion.php";

$consulta = "SELECT * from tipos_usuarios";
$datos = mysqli_query($enlace, $consulta);
$fila = mysqli_fetch_array ($datos);


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
            var estado=true;
            if(document.getElementById("dni").value=="" || document.getElementById("password").value=="" || document.getElementById("nombre").value=="" || document.getElementById("apellido").value=="")
        estado=false;}
        return estado;
    </script>
</head>
<body id="body2">
    <header class="header">
        <h1 id="titulo">INSITUTO SUPERIOR DE FORMACIÓN DOCENTE "MERCEDES"</h1>
                <img class="img-header" src="img/Logo-ISFD-Banderin-tricolor-01-500x500.png" width="130px" height="180px">
    </header>
    <div class="formusr">
        <form action="registro.php" method="post" onclick="return control()">
            <div class="form-group">
                <label for="dni">DNI</label>
                <input required type="text" id="dni" name="dni" size="60em" placeholder="Tipear su DNI">
            </div>
                <div class="form-group">
                <label for="password">Contraseña</label>
                <input required type="password" id="contraseña" name="password" size="60em" placeholder="Tipear una contraseña">
            </div>
            <div class="form-group">
                <label for="password2">Ingrese nuevamente la contraseña</label>
                <input required type="password2" id="contraseña2" name="password2" size="60em" placeholder="Tipear nuevamente la contraseña">
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
            <select id="provincia">
                <option value="x1">Opcion X1</option>
            </select>
            <div class="form-group2">
                <label for="ciudad">Ciudad</label>
            </div>
            <select id="ciudad">
                <option value="x1">Opcion X1</option>
            </select>
            <div class="form-group2">
                <label for="opc_usr">¿Es estudiante o Profesor?</label>
                <select required name="tipo_usuario" class="form-control">
                    <option value="#"></option>
                    <option value="tipo_usuario">Estudiante</option>
                    <option value="tipo_usuario">Profesor</option>
                </select>
            </div>
            <div class="form-group2">
                <label for="carrera">Seleccione su carrera</label>
                <select required name="carrera" class="form-control">
                    <option value="#"></option>
                    <option value="enfermeria">Enfermería</option>
                </select>
            </div>
            <div class="form-group2">
                <label for="espacio_curricular">Espacio Curricular</label>
                <select required name="espacio_curricular" class="form-control">
                    <option value="#"></option>
                    <option value="espacio_curricular">Practica I</option>
                    <option value="espacio_curricular">Practica II</option>
                    <option value="espacio_curricular">Practica III</option>
                </select>
            </div>
            <div class="form-group">
                <label for="ciclo_lectivo">Ciclo lectivo</label>
                <input required type="text" id="ciclo_lectivo" name="ciclo_lectivo" size="60em" placeholder="Tipear su año lectivo">
            </div>
            <div class="btn-group btn-group-xl d-grid gap-2 col-6 mx-auto" role="group" aria-label="Basic example">
                <button type="submit" class="btn btn-primary btn-lg" value="enviar">Enviar</button>
            </div>
            
        </form>
    </div>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>