<?php

require(__DIR__ . '/../modelo/class.Generos.php');
/* 
 Recepcion de datos de peticios AJAX para la carga de dropdown list
*/
$accionGenero = '';
$json = file_get_contents('php://input');
$data = json_decode($json);
if (!empty($data)) {
    $accionGenero = $data->accion;
} else if (isset($_GET['accion'])) {
    $accionGenero = $_GET['accion'];
}
// *******


switch ($accionGenero) {
    case 'consultarGenerosAJAX':
        generosAJAX();
        break;
    case 'editarGenero':
        editarGenero();
        break;
    case 'getGenerosActivos':
        getGenerosActivos();
        break;
    default:
        # code...
        break;
}

function generosAJAX()
{
    $genero = new Generos();

    $generosJSON = $genero->mostrarGeneros();

    echo json_encode($generosJSON);
};

function editarGenero()
{
    $genero = new Generos();

    $nombreGenero = $_POST['genero'];
    $idGenero = $_POST['idGenero'];

    $genero->editarGenero($idGenero, $nombreGenero);
};

function listarGenero($idGenero)
{
    $genero = new Generos();
    $result = $genero->mostrarGenero($idGenero);

    if ($result != 'error') {
        return $result;
    } else {
        echo "Error - No hay productos";
    }
};

// Retorna todos los generos activos
function getGenerosActivos()
{
    header('Content-Type: application/json');
    $generos = new Generos();
    $result = $generos->getGenerosActivos();
    echo json_encode($result);
    exit();
}
?>