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
        <div id="tablausuarios">
            <h2>Lista de Clientes</h2>
            <form method="post"  action="eliminar_clientes_lista.php">
                <table>
                    <tr>
                        <th>ID</th>
                        <th>DNI</th>
                        <th>Nombre</th>
                        <th>Apellido1</th>
                        <th>Apellido2</th>
                        <th>Dirección</th>
                        <th>CP</th>
                        <th>Población</th>
                        <th>Provincia</th>
                        <th>Teléfono</th>
                        <th>Email</th>
                        <th>Foto</th>
                        <th>Eliminar</th>
                        <th>Editar</th>
                    </tr>
      

<?php
include("conexionPDO.php");
include("eliminar_temporales.php");

// Definimos la cadena de la consulta
$sql = "SELECT * FROM clientes ORDER BY id_cliente";
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
          <td><center><b>$id_cliente</b></center></td>
          <td>$dni</td>
          <td>$nombre</td>
          <td>$apellido1</td>
          <td>$apellido2</td>
          <td>$direccion</td>
          <td>$cp</td>
          <td>$poblacion</td>
          <td>$provincia</td>
          <td>$telefono</td>
          <td>$email</td>
          <td><center><a href='temporales/$imagen'> <img src='temporales/$imagen' width='50' border='0'></a></center></td>
          <td><center><input type='checkbox' name='borrar[]' value='$id_cliente'></center></td>
          <td><center><a href='editar_cliente.php?id_cliente=$id_cliente'>Editar</a></center></td>

        </tr>";
}

?>

</table>
                <div class="botones">
                    <input type="submit" value="Eliminar clientes seleccionados" id="eliminar">
                    <input type="reset" value="Deseleccionar Todos" id="deseleccion">
                </div>
            </form>
            <div id="introducir">
                <button onclick="window.location.href='introducir_clientes.html';">Ir a introducir clientes</button>
            </div>
        </div>
    </div>
</body>
</html>
