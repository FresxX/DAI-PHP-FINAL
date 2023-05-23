
<?php

$base = $_POST["baseImponible"];
$iva = $_POST["iva"];
$numeroFactura = $_POST["numeroFactura"];
$referencia = $_POST["referencia"];
$unidades = $_POST["unidades"];

$sql_repuestos = "SELECT * FROM repuestos WHERE Referencia = $referencia";
// Creamos la consulta y asignamos el resultado a la variable $result
$result_repuestos = $conexion->query($sql_repuestos);
// Extraemos los valores de $result
$repuestos = $result_repuestos->fetchAll();
$aux = 0;
$total = 0;
foreach ($repuestos as $row) {
    $importe = $row['Importe'];
    $ganancia = $row['Ganancia'];
   $aux = $importe + $ganancia;
   $aux = $aux * $unidades;
   $base = $base + $aux;
   $total = $base * (1+($iva/100));
    
}


$sql = "UPDATE factura
SET 

Base_Imponible='$baseImponible',

Total='$total'
WHERE Numero_Factura='$numeroFactura'";

$update = $conexion->prepare($sql);
$update->execute();



?>