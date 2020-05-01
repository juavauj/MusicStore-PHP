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
        $query_exists = "SELECT * FROM usuarios WHERE correo = '$correo' AND contrasena = '$contrasena'";
        $res = $conexion->query($query_exists);

        if ($res->num_rows == 1) {
            return true;
        }

        // El usuario no existe
        return false;
    }

    // Login administrativo
    public function adminLogin($correo, $contrasena)
    {
        $conexion = new Conexion();
        $query_exists = (
            "SELECT * FROM usuarios AS u " .
            "INNER JOIN roles AS r ON u.idRol = r.idRol " .
            "WHERE correo = '$correo' AND contrasena = '$contrasena'"
        );
        $res = $conexion->query($query_exists);

        if ($res->num_rows == 1) {
            $row = $res->fetch_assoc();
            return $row["rol"];
        }

        // El usuario no existe
        return false;
    }
}

?>
