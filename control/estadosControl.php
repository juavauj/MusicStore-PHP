<?php

require(__DIR__ . '/../modelo/class.Estados.php');
/* 
 Recepcion de datos de peticios AJAX para la carga de radio buttons
*/
$json = file_get_contents('php://input');
$data=json_decode($json);
$accionEstados=$data->accion;
//****************


switch ($accionEstados) {
    case 'consultarEstadosAJAX':
        estadosAJAX();
        break;
    
    default:
        # code...
        break;
}

function estadosAJAX(){
    $estado= new Estados();

    $estadosJSON=$estado->mostrarEstados();

    echo json_encode($estadosJSON);

}

?>