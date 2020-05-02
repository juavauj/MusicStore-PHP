<?php

require(__DIR__ . '/../modelo/class.Artistas.php');


$accionArtista='';
$json = file_get_contents('php://input');
$data=json_decode($json);
if(!empty($data)){
    $accionArtista=$data->accion;
}else if(isset($_GET['accion'])){
    $accionArtista=$_GET['accion'];
}
// *******


switch ($accionArtista) {
    case 'consultarArtistasAJAX':
        artistasAJAX();
        break;
    case 'editarArtista':
        editarArtista();
    
    default:
        # code...
        break;
}


function artistasAJAX(){
    $artista= new Artistas();

    $artistasJSON=$artista->mostrarArtistas();

    echo json_encode($artistasJSON);

};

?>