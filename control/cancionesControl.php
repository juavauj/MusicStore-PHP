<?php

require(__DIR__ . '/../modelo/class.Canciones.php');


$accionCancion='';
if(isset($_GET['accion'])){
    $accionCancion=$_GET['accion'];
}
// *******


switch ($accionCancion) {
    case 'editarCancion':
        editarCancion();
    
    default:
        # code...
        break;
}





function listarCancion($idCancion){
    $cancion= new Canciones();
    $result=$cancion->mostrarCancion($idCancion);

    if($result!='error'){
        return $result;

    }else{
        echo "Error - No hay productos";
    }



};

function editarCancion(){
    $cancion = new Canciones();

    $nombreCancion=addslashes($_POST['nombre']);
    $idCancion=$_POST['idCancion'];
    $idArtista=$_POST['idArtista'];
    $idAlbum=$_POST['idAlbum'];
    $estado=$_POST['estado'];

    
    

    $cancion->editarCancion($idCancion,$nombreCancion,$idArtista,$idAlbum,$estado);

};

?>