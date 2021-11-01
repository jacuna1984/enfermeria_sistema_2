<?php
require_once "./conexion.php";

$dni = $_POST["dni"];
$password = $_POST["password"];
$password2 = $_POST["password2"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$email = $_POST["email"];

if ($password == $password2){
    $passHash = password_hash($password, PASSWORD_DEFAULT);
    $conexion = $enlace;
    $conexion ->begin_transaction();
    try{
        $sql = "INSERT INTO usuarios_personas (dni,'password',nombre,apellido,email) VALUES (?,?,?,?,?)";
        if ($consulta = $enlace->prepare($sql)) {
            $consulta->bind_param('issss',$dni,$password,$nombre,$apellido,$email);
            $consulta->execute();
            $consulta->store_result(); //ver que hace esta línea
            $id = $consulta->insert_id;
            $consulta->free_result();
        }

        $sqlRegistro = "INSERT INTO registro (usuario_id, accion) VALUES (?,?)";
        if($consulta2 = $enlace->prepare($sqlRegistro)) {
            $texto = 'usuario creado';
            $consulta2->bind_param("is, $id, $texto");

            if($consulta2->exectute()){
                $consulta2->store_result();
                $consulta2->free_result();
                $conexion->close();
            }
        }
        header("Location: .index.php?usuario=$id");
    } catch(Exception $e) {
        $conexion->close();
        header("Location: ./registro.php?errorRegistrodetalle=$e");
    }
}
?>