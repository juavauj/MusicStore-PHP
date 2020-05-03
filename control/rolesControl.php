<?php

require(__DIR__ . '/../modelo/class.Roles.php');

/* 
 Recepcion de datos de peticios AJAX para la carga de radio buttons
*/
$json = file_get_contents('php://input');
$data=json_decode($json);
$accionRoles=$data->accion;
//****************


switch ($accionRoles) {
    case 'consultarRolesAJAX':
        rolesAJAX();
        break;
    
    default:
        # code...
        break;
}

function rolesAJAX(){
    $rol= new Roles();

    $rolesJSON=$rol->mostrarRoles();

    echo json_encode($rolesJSON);

}





?>