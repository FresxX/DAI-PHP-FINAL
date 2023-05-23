<?php
include ("conexionPDO.php");
$matricula = $_POST["matricula"];
$longitud = $_POST["longitud"];
$potencia = $_POST["potencia"];
$motor = $_POST["motor"];
$año = $_POST["anio"];
$color = $_POST["color"];
$material = $_POST["material"];
$idCliente = $_POST["id_cliente"];

$sql = "UPDATE embarcaciones
SET 
Longitud='$longitud',
Potencia='$potencia',
Motor='$motor',
Año='$año',
Color='$color',
Material='$material',
Id_Cliente='$idCliente'
WHERE Matricula='$matricula'";

$update = $conexion->prepare($sql);
$update->execute();

// Redireccionar a la página listar.php después de guardar los cambios
header("Location: listar_embarcaciones.php");
exit();
?>
