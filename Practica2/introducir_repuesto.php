<!DOCTYPE html>
<link rel="stylesheet" href="style.css">
<html>
<head>
    <title>Formulario de Registro de Repuesto</title>
</head>
<body>
    <h2>Registro de Repuesto</h2>
    <form method="post" action="introducir_repuesto2.php" enctype="multipart/form-data">

        <label for="referencia">Referencia:</label>
        <input type="text" id="referencia" name="referencia" required><br><br>

        <label for="descripcion">Descripción:</label>
        <input type="text" id="descripcion" name="descripcion" required><br><br>

        <label for="importe">Importe:</label>
        <input type="text" id="importe" name="importe" required><br><br>

        <label for="ganancia">Ganancia:</label>
        <input type="text" id="ganancia" name="ganancia" required><br><br>

        <input type="submit" value="Introducir Repuesto">
        <input type="reset" value="Borrar">
    </form>
</body>
</html>
