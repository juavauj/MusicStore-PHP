<?php
require_once(__DIR__ . '/../modelo/class.Albumes.php');


$accionAlbum = '';
$json = file_get_contents('php://input');
$data = json_decode($json);
if (!empty($data)) {
    $accionAlbum = $data->accion;
} else if (isset($_GET['accion'])) {
    $accionAlbum = $_GET['accion'];
}
// *******


switch ($accionAlbum) {
    case 'consultarAlbumesAJAX':
        albumesAJAX();
        break;
    case 'editarAlbum':
        editarAlbum();
        break;
    case 'getAlbumesActivos':
        getAlbumesActivos();
        break;
    case 'getSoloGenero':
        if (isset($_GET['idGenero'])) {
            $idGenero = $_GET['idGenero'];
            getSoloGenero($idGenero);
        }
        break;
    default:
        # code...
        break;
}


function albumesAJAX()
{
    $album = new Albumes();

    $albumesJSON = $album->mostrarAlbumes();

    echo json_encode($albumesJSON);
};

function listarAlbum($idAlbum)
{
    $album = new Albumes();
    $result = $album->listarAlbum($idAlbum);

    if ($result != 'error') {
        return $result;
    } else {
        echo "Error - No hay productos";
    }
}

// Retorna como JSON todos los albumes activos
function getAlbumesActivos()
{
    header('Content-Type: application/json');
    $albumes = new Albumes();
    $result = $albumes->getAlbumesActivos();
    echo json_encode($result);
    exit();
}

// Retorna como JSON todos los albumes activos bajo un genero especifico
function getSoloGenero($idGenero)
{
    header('Content-Type: application/json');
    $albumes = new Albumes();
    $result = $albumes->getSoloGenero($idGenero);
    echo json_encode($result);
    exit();
}

function editarAlbum(){
    $album = new Albumes();
    $id=$_POST['idAlbum'];
    $nombre=addslashes($_POST['nombre']);
    $imagen = "files/images/albumes/".basename($_FILES['imagen']['name']); // variable a enviar al query
    if ($imagen!='files/images/albumes/'){
        $carpetaAdmin = "../files/images/albumes/".basename($_FILES['imagen']['name']);
        move_uploaded_file($_FILES['imagen']['tmp_name'], $carpetaAdmin);
    }else{
        $imagen=$_POST['imagen'];
    }
    
    
    $precio=$_POST['precio'];
    $descripcion=addslashes($_POST['descripcion']);
    $fecha=$_POST['fecha'];
    $stock=$_POST['stock'];
    $estado=$_POST['estado'];
    $genero=$_POST['genero'];
    $artista=$_POST['artista'];

    $album->modificarAlbum($id,$nombre,$imagen,$precio,$descripcion,$fecha,$stock,$estado,$genero,$artista);



}
?>
