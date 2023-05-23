<!DOCTYPE html>
<link rel="stylesheet" href="style.css">
<html>
<head>
    <title>Formulario de Registro de Barco</title>
</head>
<body>
    <h2>Registro de Barco</h2>
    <form method="post" action="introducir_embarcaciones2.php" enctype="multipart/form-data">

        <label for="matricula">Matrícula:</label>
        <input type="text" id="matricula" name="matricula" required><br><br>

        <label for="longitud">Longitud:</label>
        <input type="text" id="longitud" name="longitud" required><br><br>

        <label for="potencia">Potencia:</label>
        <input type="text" id="potencia" name="potencia" required><br><br>

        <label for="motor">Motor:</label>
        <input type="text" id="motor" name="motor" required><br><br>

        <label for="anio">Año:</label>
        <input type="text" id="anio" name="anio" required><br><br>

        <label for="color">Color:</label>
        <input type="text" id="color" name="color" required><br><br>

        <label for="material">Material:</label>
        <input type="text" id="material" name="material" required><br><br>

        <label for="id_cliente">ID Cliente:</label>
		<?php
        include("conexionPDO.php");

        // Definimos la cadena de la consulta
        $sql_clientes = "SELECT Id_Cliente, Nombre FROM clientes";
        // Creamos la consulta y asignamos el resultado a la variable $result
        $result_clientes = $conexion->query($sql_clientes);
        // Extraemos los valores de $result
        $clientes = $result_clientes->fetchAll();

        // Generar el select con los nombres de las personas correspondientes a los ID de clientes
        echo "<select id='id_cliente' name='id_cliente' required>";
        foreach ($clientes as $cliente) {
            $id = $cliente['Id_Cliente'];
            $nombre = $cliente['Nombre'];
            echo "<option value='$id'>$nombre</option>";
        }
        echo "</select>";
        ?>
        <br><br>

        <label for="foto">Foto:</label>
        <input type="file" name="foto"><br><br>

        <input type="submit" value="Introducir Barco">
        <input type="reset" value="Borrar">
    </form>
</body>
</html>
