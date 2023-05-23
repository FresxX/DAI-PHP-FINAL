<?php
include("seguridad.php");
include "conexionPDO.php";

$numero_factura = $_POST["id"];
$error = 0;

$SentenciaSQL = "DELETE FROM factura WHERE Numero_Factura = :numero_factura";
$consulta = $conexion->prepare($SentenciaSQL);
$consulta->bindParam(':numero_factura', $numero_factura);

if ($consulta->execute()) {
    echo "<br><br> La factura ha sido eliminada correctamente.";
} else {
    $error = 1;
}


?>