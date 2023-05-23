<?php
include("conexionPDO.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener la referencia del repuesto a eliminar
    $referencia = $_POST["referencia"];

    // Validar y sanitizar el valor de la referencia antes de usarlo en la consulta
    $referencia = intval($referencia);

    // Ejecutar la consulta DELETE para eliminar el repuesto
    $sentenciaSQL = "DELETE FROM repuestos WHERE referencia = $referencia";
    $result = $conexion->query($sentenciaSQL);

    if ($result) {
        // Redireccionar a la página de listar repuestos después de la eliminación exitosa
        header("Location: listar_repuestos.php");
        exit();
    } else {
        // Manejar el caso de error en la eliminación del repuesto
        echo "Error al eliminar el repuesto.";
    }
}
?>
