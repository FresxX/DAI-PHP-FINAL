<?php
include("conexionPDO.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el ID del cliente a eliminar
    $id_cliente = $_POST["id_cliente"];

    // Validar y sanitizar el valor del ID del cliente antes de usarlo en la consulta
    $id_cliente = intval($id_cliente);

    // Ejecutar la consulta DELETE para eliminar el cliente
    $sentenciaSQL = "DELETE FROM clientes WHERE Id_Cliente = $id_cliente";
    $result = $conexion->query($sentenciaSQL);

    if ($result) {
        // Redireccionar a la página de listar clientes después de la eliminación exitosa
        header("Location: listar.php");
        exit();
    } else {
        // Manejar el caso de error en la eliminación del cliente
        echo "Error al eliminar el cliente.";
    }
}
?>
