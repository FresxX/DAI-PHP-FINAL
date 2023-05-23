<!DOCTYPE html>
<link rel="stylesheet" href="style.css">
<html>
<head>
    <title>Formulario de Registro de Factura</title>
</head>
<body>
    <h2>Registro de Factura</h2>
    <form method="post" action="introducir_factura2.php" enctype="multipart/form-data">

        <label for="numeroFactura">Número de Factura:</label>
        <input type="text" id="numeroFactura" name="numeroFactura" required><br><br>

        <label for="matricula">Matrícula:</label>
        <?php
        include("conexionPDO.php");

        // Definimos la cadena de la consulta
        $sql_matriculas = "SELECT Matricula FROM embarcaciones";
        // Creamos la consulta y asignamos el resultado a la variable $result
        $result_matriculas = $conexion->query($sql_matriculas);
        // Extraemos los valores de $result
        $matriculas = $result_matriculas->fetchAll();

        // Generar el select con las matrículas registradas en la tabla embarcaciones
        echo "<select id='matricula' name='matricula' required>";
        foreach ($matriculas as $matricula) {
            $matricula = $matricula['Matricula'];
            echo "<option value='$matricula'>$matricula</option>";
        }
        echo "</select>";
        ?>
        <br><br>

        <label for="manoDeObra">Mano de Obra:</label>
        <input type="text" id="manoDeObra" name="manoDeObra" required><br><br>

        <label for="precioHora">Precio por Hora:</label>
        <input type="text" id="precioHora" name="precioHora" required><br><br>

        <label for="fechaEmision">Fecha de Emisión:</label>
        <input type="date" id="fechaEmision" name="fechaEmision" required><br><br>

        <label for="fechaPago">Fecha de Pago:</label>
        <input type="date" id="fechaPago" name="fechaPago" required><br><br>

    

        <label for="iva">IVA:</label>
        <input type="text" id="iva" name="iva" required><br><br>

    

        <input type="submit" value="Introducir Factura">
        <input type="reset" value="Borrar">
    </form>
</body>
</html>
