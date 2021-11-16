<?php

require_once "./conexion.php";





$id=$_GET['idProvincia'];
$sql = "SELECT id, nombre FROM ciudades WHERE provincia_id = ?";
$consultaloc = $enlace->prepare($sql);
$consultaloc->bind_param("i",$id);
if ($consultaloc->execute()) {
    $ciudades = $consultaloc->get_result();
    $itemselect = null;
    // if ($consultaloc->num_row() > 0) {   
    while($ciudad = $ciudades->fetch_assoc()) {
        $itemselect.= "<option value =' {$ciudad['id']}'> 
    {$ciudad['nombre']}
    </option>";
    }
    // }
    $consultaloc->free_result();
    $consultaloc->close();
    echo $itemselect;
}

?>