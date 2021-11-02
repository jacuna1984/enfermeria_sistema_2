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
    // $conexion ->begin_transaction();
    try{
        $sql = "INSERT INTO usuarios_personas (`dni`,`password`,`nombre`,`apellido`,`email`) VALUES (?,?,?,?,?)";
        if ($consulta = $enlace->prepare($sql)) {
            $consulta->bind_param('issss',$dni,$password,$nombre,$apellido,$email);
            if ($consulta->execute()){
                $id = $consulta->insert_id;
                $consulta->free_result();
                $conexion->close();
                echo "Operacion Exitosa";
            } else {
                echo "fallo la operacion";
            }
            
        }

        
        
    } catch(Exception $e) {
        $conexion->close();
        header("Location: ./registro.php?errorRegistrodetalle=$e");
    }
}

?>