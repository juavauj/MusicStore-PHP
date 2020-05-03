<?php

require(__DIR__ . '/../modelo/class.Artistas.php');


$accionArtista = '';
$json = file_get_contents('php://input');
$data = json_decode($json);
if (!empty($data)) {
    $accionArtista = $data->accion;
} else if (isset($_GET['accion'])) {
    $accionArtista = $_GET['accion'];
}
// *******


switch ($accionArtista) {
    case 'consultarArtistasAJAX':
        artistasAJAX();
        break;
    case 'editarArtista':
        editarArtista();
        break;
    case 'getArtistasActivos':
        getArtistasActivos();
        break;
    default:
        # code...
        break;
}

function listarArtista($idArtista)
{
    $artista = new Artistas();
    $result = $artista->listarArtista($idArtista);

    if ($result != 'error') {
        return $result;
    } else {
        echo "Error - No hay productos";
    }
}


function artistasAJAX()
{
    $artista = new Artistas();

    $artistasJSON = $artista->mostrarArtistas();

    echo json_encode($artistasJSON);
};

function editarArtista(){
    $artista= new Artistas();

    $id=$_POST['idArtista'];
    $nombre=addslashes($_POST['artista']);
    $imagen = "files/images/albumes/".basename($_FILES['imagen']['name']); // variable a enviar al query
    
    if ($imagen!='files/images/albumes/'){
        $carpetaAdmin = "../files/images/albumes/".basename($_FILES['imagen']['name']);
        move_uploaded_file($_FILES['imagen']['tmp_name'], $carpetaAdmin);
    }else{
        $imagen=$_POST['imagen'];
    }
    
    $estado=$_POST['estado'];
    
    $artista->modificarArtista($id,$nombre,$imagen,$estado);

}

?>
function getArtistasActivos()
{
    header('Content-Type: application/json');
    $artistas = new Artistas();
    $result = $artistas->getArtistasActivos();
    echo json_encode($result);
    exit();
}
?>
