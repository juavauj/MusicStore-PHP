<?php

require(__DIR__ . '/../modelo/class.Canciones.php');








function listarCancion($idCancion){
    $cancion= new Canciones();
    $result=$cancion->mostrarCancion($idCancion);

    if($result!='error'){
        return $result;

    }else{
        echo "Error - No hay productos";
    }



};

?>