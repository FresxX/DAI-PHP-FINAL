<?php
include "conexionPDO.php";
$array_borrados=$_POST["borrar"];
$error=0;
for($i=0;$i<count($array_borrados);$i++)
{
    $SentenciaSQL="Delete from clientes where Id_Cliente= '$array_borrados[$i]'";
    //creamos la consulta y asignamos el resultado a la variable $result
    $result = $conexion->query($SentenciaSQL);
    if(!$result)
    {
        $error=1;
    }
}
if($error==0)
{
    echo "<br><br> El (LOS) Cliente(s) hasn sido eliminados correctamente";

}

?>