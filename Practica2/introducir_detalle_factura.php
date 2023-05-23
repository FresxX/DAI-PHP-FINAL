<!DOCTYPE html>
<link rel="stylesheet" href="style.css">
<html>
<head>
    <title>Formulario de Registro de Detalle de Factura</title>
</head>
<body>
    <h2>Registro de Detalle de Factura</h2>
    <form method="post" action="introducir_detalle_factura2.php">

        <label for="numero_factura">Número de Factura:</label>
        <input type="text" id="numero_factura" name="numero_factura" required><br><br>

        <label for="referencia">Referencia:</label>
        <?php
        include("conexionPDO.php");

        // Definimos la cadena de la consulta
        $sql_repuestos = "SELECT Referencia, Descripcion FROM repuestos";
        // Creamos la consulta y asignamos el resultado a la variable $result
        $result_repuestos = $conexion->query($sql_repuestos);
        // Extraemos los valores de $result
        $repuestos = $result_repuestos->fetchAll();

        // Generar el select con las referencias y descripciones de los repuestos
        echo "<select id='referencia' name='referencia' required>";
        foreach ($repuestos as $repuesto) {
            $referencia = $repuesto['Referencia'];
            $descripcion = $repuesto['Descripcion'];
            echo "<option value='$referencia'>$referencia - $descripcion</option>";
        }
        echo "</select>";
        ?>
        <br><br>

        <label for="unidades">Unidades:</label>
        <input type="text" id="unidades" name="unidades" required><br><br>
        <input type="submit" id="eliminar-todo" value="Introducir Detalle de Factura">
        <input type="reset" id="eliminar-todo" value="Borrar">
    </form>
</body>
</html>
