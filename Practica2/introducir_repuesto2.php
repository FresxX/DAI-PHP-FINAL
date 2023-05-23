<?php
include("conexionPDO.php");
$referencia = $_POST["referencia"];
$descripcion = $_POST["descripcion"];
$importe = $_POST["importe"];
$ganancia = $_POST["ganancia"];

$SentenciaSQL = "INSERT INTO repuestos(Referencia, Descripcion, Importe, Ganancia) VALUES ('$referencia', '$descripcion', '$importe', '$ganancia')";

// Ejecutamos la consulta y asignamos el resultado a la variable $result
$result = $conexion->query($SentenciaSQL);
if (!$result) {
    echo "<br>Error al introducir el repuesto en la base de datos";
} else {
    header("Location: listar_repuestos.php");
}

?>
