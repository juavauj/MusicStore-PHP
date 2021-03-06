<?php
require(__DIR__ . '/../config/class.Conexion.php');

class Usuarios
{

    public function __construct()
    {
    }


    // Registrar un usuario (solo si su correo no existe)
    public function userRegistration($nombre, $apellido, $correo, $contrasena, $user_type)
    {
        $conexion = new Conexion();
        $query_non_existent = "SELECT * FROM usuarios WHERE correo = '$correo'";
        $res = $conexion->query($query_non_existent);

        if ($res->num_rows > 0) {
            return false;
        }

        if ($user_type == "user") {
            $idEstado = 1;
            $idRol = 1;
            $query_insert_user = ("INSERT INTO usuarios (nombre, apellido, correo, contrasena, idEstado, idRol) " .
                "VALUES ('$nombre', '$apellido', '$correo', '$contrasena', $idEstado, $idRol)");
            $conexion->query($query_insert_user);
            return true;
        }

        if ($user_type == "admin") {
            $idEstado = 1;
            $idRol = 2;

            $query_insert_user = ("INSERT INTO usuarios (nombre, apellido, correo, contrasena, idEstado, idRol) " .
                "VALUES ('$nombre', '$apellido', '$correo', '$contrasena', $idEstado, $idRol)");
            $conexion->query($query_insert_user);
            return true;
        }

        // No es un tipo de usuario valido
        return false;
    }

    // Login al usuario
    public function userLogin($correo, $contrasena)
    {
        $conexion = new Conexion();
        $query_exists  = "SELECT u.nombre AS nombre, u.apellido AS apellido, ";
        $query_exists .= "u.correo AS correo, e.estado AS estado, r.rol AS rol ";
        $query_exists .= "FROM usuarios AS u ";
        $query_exists .= "INNER JOIN estados AS e ON u.idEstado = e.idEstado ";
        $query_exists .= "INNER JOIN roles AS r ON u.idRol = r.idRol ";
        $query_exists .= "WHERE correo = '$correo' AND contrasena = '$contrasena' AND estado = 'activo'";

        return $conexion->query($query_exists)->fetch_all(MYSQLI_ASSOC);
    }

    // Login administrativo
    public function adminLogin($correo, $contrasena)
    {
        $conexion = new Conexion();
        $query_exists  = "SELECT u.nombre AS nombre, u.apellido AS apellido, ";
        $query_exists .= "u.correo AS correo, e.estado AS estado, r.rol AS rol ";
        $query_exists .= "FROM usuarios AS u ";
        $query_exists .= "INNER JOIN estados AS e ON u.idEstado = e.idEstado ";
        $query_exists .= "INNER JOIN roles AS r ON u.idRol = r.idRol ";
        $query_exists .= "WHERE correo = '$correo' AND contrasena = '$contrasena' AND estado = 'activo'";

        return $conexion->query($query_exists)->fetch_all(MYSQLI_ASSOC);
    }

    public function listarAdmin($id)
    {

        $db = new Conexion();

        $sql = "SELECT * FROM usuarios WHERE idUsuario='$id' AND idRol=2 ";

        $result = $db->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            //print_r($row);
            return $row;
        } else {

            return "error";
        }
    }

    public function editarAdmin($id,$nombre,$apellido,$correo,$contrasena,$idEstado,$idRol){
        session_start();
        $url='';
        $db= new Conexion();
        $sql="UPDATE usuarios SET nombre='$nombre',apellido='$apellido',correo='$correo',contrasena='$contrasena',idEstado='$idEstado',idRol='$idRol' WHERE idUsuario='$id'";
        if($_SESSION['rol'] == 'superadmin'){     
            $url='location: ../files/subpages/admins/superAdmin.php';
        } else {           
            $url='location: ../files/subpages/admins/admin.php';
        }; 

        echo $db->query($sql)?   header($url) :  'error';
    }
}
?>
