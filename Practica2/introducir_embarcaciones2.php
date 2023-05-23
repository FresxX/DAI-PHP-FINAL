<?php
include("conexionPDO.php");
$matricula = $_POST["matricula"];
$longitud = $_POST["longitud"];
$potencia = $_POST["potencia"];
$motor = $_POST["motor"];
$anio = $_POST["anio"];
$color = $_POST["color"];
$material = $_POST["material"];
$id_cliente = $_POST["id_cliente"];

if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
    $foto = $_FILES['foto']['tmp_name'];
    // Tratamiento necesario para introducir la imagen en la base de datos
    $fotografia = imagecreatefromjpeg($foto);
    ob_start(); // abrimos el buffer interno
    // obtenemos el fichero jpg-binario del buffer y lo almacenamos en la variable jpg
    imagejpeg($fotografia);
    $jpg = ob_get_contents();
    // cerramos el buffer
    // preparamos la variable para usarla en una consulta SQL
    ob_end_clean();
    $intermedio = addslashes(trim($jpg));
    $jpg = str_replace('##', '\##', $intermedio);
}

$SentenciaSQL = "INSERT INTO embarcaciones(Matricula, Longitud, Potencia, Motor, Año, Color, Material, Id_Cliente, Fotografia) VALUES
('$matricula', '$longitud', '$potencia', '$motor', '$anio', '$color', '$material', '$id_cliente', '$jpg')";

// Ejecutamos la consulta y asignamos el resultado a la variable $result
$result = $conexion->query($SentenciaSQL);
if (!$result) {
    echo "<br>Error al introducir la embarcación en la base de datos";
} else {
    echo "<br>La embarcación se ha introducido con éxito en la base de datos";
}
?>
