<?php 
//FUNCION PARA ELIMINAR LOS ARCHIVOS TEMPORALES DE LA FUNCION GLOB
foreach(glob("./temporales/*.tmp*") as $nombrearchivo)
    {
        unlink($nombrearchivo);
    }

?>