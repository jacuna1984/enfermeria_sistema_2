<?php
require "conexion.php";
$mysql=conectabd();
$dni=$_POST["dni"];
$password=$_POST["password"];
$nombre=$_POST["nombre"];
$apellido=$_POST["apellido"];
$sql="insert into usuarios_personas(dni,password,nombre,apellido) values(?,?,?,?)";
$resultado=$mysql->prepare($sql);
$resultado->bind_param('isss',$dni,$password,$nombre,$apellido);
$resultado->execute();
?>