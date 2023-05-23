<?php include ('seguridad.php');
?>
<form method="post" action="eliminar_clientes_lista.php"

<?php
include("conexionPDO.php");
include ("eliminar_temporales.php");

    //Definimos la cadena de la consulta
    $sql = "SELECT * FROM clientes order by id_cliente";
    //Creamos la consulta y asignamos el resultado a la variable $result
    $result = $conexion->query($sql);
    //Extraemos los valores de $result
    $rows = $result->fetchAll();

    // Como los valores están en un array asolciativo, usamos foreach para extraer los valores de $rows
foreach ($rows as $row) {
$id_cliente=$row['Id_Cliente'];
$dni=$row['DNI'];
$nombre=$row['Nombre'];
$apellido1=$row['Apellido1'];
$apellido2=$row['Apellido2'];
$direccion=$row['Direccion'];
$cp=$row['CP'];
$poblacion=$row['Poblacion'];
$provincia=$row['Provincia'];
$telefono=$row['Telefono'];
$email=$row['Email'];
$foto=$row['Fotografia'];
$imagen=basename(tempnam(getcwd()."/temporales","temp"));
$imagen.=".jpg";
$fichero=fopen("./temporales/".$imagen,"w");
fwrite($fichero,$foto);
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
<td>$email</td></tr>
<td><center><a href=temporales/$imagen> <img src=temporales/$imagen width=50 border=0></a></center></td></tr>
<td><center><input type=checkbox name=borrar[] value=$id_cliente></center></td></tr>";
}

?>

<input type="submit" value="Eliminar clientes seleccionados">
<input type="reset" value="Deseleccionar Todos">
</form>