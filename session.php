<?php
function estaLogueado(){
    session_start();
    if (!$_SESSION["nombre"]){
        header("Location: ./login.php");
    }
}
