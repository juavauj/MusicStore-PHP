<?php

require_once(__DIR__ . '/../modelo/class.Albumes.php');

$json = file_get_contents('php://input');
$data=json_decode($json);
$accionAlbum=$data->accion;
$album=($accionAlbum=='consultaAlbum')?$data->album :''; // parametro varible de busqueda dependiente de landing page admins, puede ser isset->$_GET[]

switch ($accionAlbum) {
    case 'consultaAlbumes':
        $albumes = new Albumes();

        $result= $albumes->mostrarAlbumes();

        
        break;
    
    default:
       
        break;
}





echo $album;
?>