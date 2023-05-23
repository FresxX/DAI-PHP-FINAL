<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lista clientes</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.cdnfonts.com/css/quela" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/qeinsha" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/tt-rationalist-trl" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/royal-glamour" rel="stylesheet">
</head>
<body>
    <div id="admin-header">
        <h1>Barcos Admin</h1>
        <a href="cerrar_sesion.php" id="cerrar-sesion">Cerrar sesión</a>
    </div>
    <div id="admin-container">
        <div id="admin-menu">
            <a id="abox" href="listar.php">
                <div class="admin-box">
                    <h2>Usuarios</h2>
                </div>
            </a>
            <a id="abox" href="listar_embarcaciones.php">
                <div class="admin-box">
                    <h2>Embarcaciones</h2>
                </div>
            </a>
            <a id="abox" href="listar_repuestos.php">
        <div class="admin-box">
            <h2>Repuestos</h2>
        </div>
        </a>
        <a id="abox" href="listar_factura.php">
            <div class="admin-box">
                <h2>Facturas</h2>
            </div>
            </a>
        </div>
        <div id="tablabarcos">


<?php
include("conexionPDO.php");

/// Definimos la cadena de la consulta
$id_cliente = $_GET['id_cliente'];
$sql = "SELECT * FROM clientes WHERE Id_Cliente = $id_cliente";
// Creamos la consulta y asignamos el resultado a la variable $result
$result = $conexion->query($sql);
// Extraemos los valores de $result
$rows = $result->fetchAll();

// Como los valores están en un array asociativo, usamos foreach para extraer los valores de $rows
foreach ($rows as $row) {
  $id_cliente = $row['Id_Cliente'];
  $dni = $row['DNI'];
  $nombre = $row['Nombre'];
  $apellido1 = $row['Apellido1'];
  $apellido2 = $row['Apellido2'];
  $direccion = $row['Direccion'];
  $cp = $row['CP'];
  $poblacion = $row['Poblacion'];
  $provincia = $row['Provincia'];
  $telefono = $row['Telefono'];
  $email = $row['Email'];
  $foto = $row['Fotografia'];
  $imagen = basename(tempnam(getcwd()."/temporales", "temp")) . ".jpg";
  $fichero = fopen("./temporales/" . $imagen, "w");
  fwrite($fichero, $foto);
  fclose($fichero);

  echo "<tr>
         
          <td><center><a href='temporales/$imagen'> <img src='temporales/$imagen' width='50' border='0'></a></center></td>
        
        </tr>";
        
  // Mostrar el formulario de edición para este cliente
  echo "
        <form action='editar_registros.php' method='post'>
            <input type='hidden' name='id_cliente' value='$id_cliente'>
            <table>
                <tr>
                    <td>DNI:</td>
                    <td><input type='text' name='dni' value='$dni'></td>
                </tr>
                <tr>
                    <td>Nombre:</td>
                    <td><input type='text' name='nombre' value='$nombre'></td>
                </tr>
                <tr>
                    <td>Apellido 1:</td>
                    <td><input type='text' name='apellido1' value='$apellido1'></td>
                </tr>
                <tr>
                    <td>Apellido 2:</td>
                    <td><input type='text' name='apellido2' value='$apellido2'></td>
                </tr>
                <tr>
                    <td>Dirección:</td>
                    <td><input type='text' name='direccion' value='$direccion'></td>
                </tr>
                <tr>
                
                    <td>Código Postal:</td>
                    <td><input type='text' name='cp' value='$cp'></td>
                </tr>
                <tr>
                    <td>Población:</td>
                    <td><input type='text' name='poblacion' value='$poblacion'></td>
                </tr>
                <tr>
                    <td>Provincia:</td>
                    <td><input type='text' name='provincia' value='$provincia'></td>
                </tr>
                <tr>
                    <td>Teléfono:</td>
                    <td><input type='text' name='telefono' value='$telefono'></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type='text' name='email' value='$email'></td>
                </tr>
            </table>
            <input type='submit' value='Guardar cambios'>
        </form>";
            // Botón de eliminación del cliente
    echo "
    <form action='eliminar_detalle_clientes.php' method='post' onsubmit='return confirm(\"¿Estás seguro de eliminar este cliente?\")'>
        <input type='hidden' name='id_cliente' value='$id_cliente'>
        <input type='submit' value='Eliminar cliente'>
    </form>";
}
    
?>

</div>
</body>
</html>