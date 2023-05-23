<?php
include "conexionPDO.php";
$array_borrados = $_POST["borrar"];
$error = 0;
for ($i = 0; $i < count($array_borrados); $i++) {
    $SentenciaSQL = "DELETE FROM embarcaciones WHERE Matricula = '$array_borrados[$i]'";
    // Creamos la consulta y asignamos el resultado a la variable $result
    $result = $conexion->query($SentenciaSQL);
    if (!$result) {
        $error = 1;
    }
}
if ($error == 0) {
    echo "<br><br> La(s) embarcación(es) ha(n) sido eliminada(s) correctamente.";
}
?>
