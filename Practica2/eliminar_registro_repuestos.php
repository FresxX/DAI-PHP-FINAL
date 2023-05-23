<?php
include("conexionPDO.php");
$referencia = $_POST["referencia"];
$descripcion = $_POST["descripcion"];
$importe = $_POST["importe"];
$ganancia = $_POST["ganancia"];

$sql = "UPDATE repuestos
SET 
Descripcion='$descripcion',
Importe='$importe',
Ganancia='$ganancia'
WHERE Referencia='$referencia'";

$update = $conexion->prepare($sql);
$update->execute();
?>
