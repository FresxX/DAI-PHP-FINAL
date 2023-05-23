<?php
include ("seguridad.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Menú de Administración</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.cdnfonts.com/css/royal-glamour" rel="stylesheet">
                
   
    </head>
<body>
    <div id="admin-header">
        <h1>Barcos Admin</h1>
        <a href="cerrar_sesion.php" id="cerrar-sesion">Cerrar sesión</a>
    </div>
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
        <a id="abox" href="listar_factura.php">
            <div class="admin-box">
                <h2>Facturas</h2>
            </div>
            </a>
</div>
</body>
</html>