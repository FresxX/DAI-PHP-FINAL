<?php
include "conexionPDO.php";
$array_borrados = $_POST["borrar"];
$error = 0;
for ($i = 0; $i < count($array_borrados); $i++) {
    $SentenciaSQL = "DELETE FROM repuestos WHERE Referencia = '$array_borrados[$i]'";
    // Creamos la consulta y asignamos el resultado a la variable $result
    $result = $conexion->query($SentenciaSQL);
    if (!$result) {
        $error = 1;
    }
}
if ($error == 0) {
    echo "<br><br> El/los repuesto(s) ha(n) sido eliminado(s) correctamente.";
}
?>
