<?php
require_once "./conexion.php";
$consulta=$enlace->prepare("SELECT * FROM provincias order by nombre asc");
if ($consulta->execute()) {
    $resultados = $consulta->get_result();
$provincias = null;
while ($provincia = $resultados->fetch_assoc()) {
    $provincias = $provincias . "<option
    value=".$provincia['id'].">".
    ucwords($provincia['nombre'])."</option>";
    
}
$consulta->free_result();
$conexion->close();

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <select name="provincia_id">
            <option value="null"> Seleccione Una Provincia </option>
            <?php echo $provincias ?>
        </select>
    </form>
</body>
</html>
