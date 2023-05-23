<?php
include("conexionPDO.php");

$numeroFactura = $_POST["numero_factura"];
$referencia = $_POST["referencia"];
$unidades = $_POST["unidades"];




$SentenciaSQL = "INSERT INTO detalle_factura(Numero_Factura, Referencia, Unidades) VALUES ('$numeroFactura', '$referencia', '$unidades')";

$result = $conexion->query($SentenciaSQL);
if (!$result) {
    echo "<br>Error al introducir los datos en la base de datos";
} else {
    


$base = $_POST["base"];
$iva = $_POST["iva1"];
$numeroFactura = $_POST["numeroFacturaToDelete"];
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


var_dump($base);
var_dump($total);

$sql = "UPDATE factura
SET 

Base_Imponible='$base',

Total='$total'
WHERE Numero_Factura='$numeroFactura'";

$update = $conexion->prepare($sql);
$update->execute();


     header("Location: listar_factura.php");
}




?>
