<?php
include("conexionPDO.php");
$arrayBorrados = $_POST["borrar"];
$error = 0;

for ($i = 0; $i < count($arrayBorrados); $i++) {
    $sentenciaSQL = "DELETE FROM factura WHERE Numero_Factura = '$arrayBorrados[$i]'";
    $result = $conexion->query($sentenciaSQL);

    if (!$result) {
        $error = 1;
    }
}

if ($error == 0) {
    header("Location: listar_factura.php");
}
?>
