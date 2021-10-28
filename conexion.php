<?php
function conectabd(){
    $servidor="localhost";
    $usuario="root";
    $pass="root";
    $enfermeria="enfermeria";
    $conecta=mysqli_connect($servidor,$usuario,$pass,$enfermeria);
    mysqli_set_charset($conecta,"utf8");
    if(!$conecta){
        die("error de conexion");
    }
    else{
        echo"conexion exitosa";
    }
    return $conecta;
}
conectabd();
?>