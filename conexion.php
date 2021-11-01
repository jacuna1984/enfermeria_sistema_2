<?php
require_once "./credenciales_bd.php";

//function conectabd(){
    //$servidor="localhost";
    //$usuario="root";
    //$pass="root";
    //$enfermeria="enfermeria";
    $enlace = new mysqli(DB_HOST,DB_USER, DB_PASS, DB_NAME);
    mysqli_set_charset($enlace,"utf8");
    if(!$enlace->connect_error){
        die("error de conexion: ".$enlace->connect_error);
    }
    //else{
      //  echo"conexion exitosa";
    //}
    //return $conecta;
//}
//conectabd();
?>