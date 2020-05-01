<?php

require_once(__DIR__ . '/../modelo/class.Albumes.php');


    
/* $json = file_get_contents('php://input');
$data=json_decode($json);
$accionAlbum=$data->accion; */
 //($accionAlbum=='consultaAlbum')?$data->album :''; // parametro varible de busqueda dependiente de landing page admins, puede ser isset->$_GET[]

/* switch ($accionAlbum) {
    case 'consultaAlbumes':
        

        
        
        break;
    
    default:
       
        break;
} */

function listarAlbum($idAlbum){
    $album = new Albumes();
    $result=$album->listarAlbum($idAlbum);

    if($result!='error'){
        return $result;

        
    }else{
        echo "Error - No hay productos";
    }




}





?>