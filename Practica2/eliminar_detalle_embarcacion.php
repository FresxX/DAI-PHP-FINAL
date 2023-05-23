<?php
include("conexionPDO.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener la matrícula de la embarcación a eliminar
    $matricula = $_POST["matricula"];

    // Validar y sanitizar el valor de la matrícula antes de usarlo en la consulta
    $matricula = htmlspecialchars($matricula);

    // Ejecutar la consulta DELETE para eliminar la embarcación
    $sentenciaSQL = "DELETE FROM embarcaciones WHERE Matricula = '$matricula'";
    $result = $conexion->query($sentenciaSQL);

    if ($result) {
        // Redireccionar a la página de listar embarcaciones después de la eliminación exitosa
        header("Location: listar_embarcaciones.php");
        exit();
    } else {
        // Manejar el caso de error en la eliminación de la embarcación
        echo "Error al eliminar la embarcación.";
    }
}
?>
