<?php

require(__DIR__ . '/../config/class.Conexion.php');

class Albumes
{

    public function __construct()
    {
    }

    public function listarAlbum($idAlbum)
    {
        $db = new Conexion();

        $sql = "SELECT * FROM albumes WHERE idAlbum='$idAlbum' ";

        $result = $db->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            //print_r($row);
            return $row;
        } else {

            return "error";
        }
    }

    public function mostrarAlbumes()
    {
        $db = new Conexion();
        $sql = "SELECT * FROM  albumes ";

        $result = $db->query($sql);
        $resultados = array();
        if ($result->num_rows > 0) {
            while ($r = mysqli_fetch_assoc($result)) {
                $resultados[] = $r;
            };
            return $resultados;
        } else {
            return 'error';
        }
    }

    // Retorna todos los albumes activos
    public function getAlbumesActivos()
    {
        $db = new Conexion();
        $query  = "SELECT a.* FROM albumes AS a ";
        $query .= "INNER JOIN estados AS e ON a.idEstado = e.idEstado ";
        $query .= "WHERE e.estado = 'activo'";
        return $db->query($query)->fetch_all(MYSQLI_ASSOC);
    }

    // Retorna todos los albumes activos bajo determinado genero
    public function getSoloGenero($idGenero)
    {
        $db = new Conexion();
        $query  = "SELECT a.nombre AS nombreAlbum, ";
        $query .= "ar.nombre AS nombreArtista, ";
        $query .= "a.descripcion AS descripcion, ";
        $query .= "a.precio AS precio, a.imagen AS imagen";
        $query .= "FROM albumes AS a ";
        $query .= "INNER JOIN estados AS e ON a.idEstado = e.idEstado ";
        $query .= "INNER JOIN artistas AS ar ON a.idArtista = ar.idArtista ";
        $query .= "WHERE e.estado = 'activo' AND a.idGenero = $idGenero";
        return $db->query($query)->fetch_all(MYSQLI_ASSOC);
    }
}
?>