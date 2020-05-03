<?php

require(__DIR__ . '/../config/class.Conexion.php');

class Artistas
{

    public function __construct()
    {
    }


    public function mostrarArtistas()
    {
        $db = new Conexion();
        $sql = "SELECT * FROM  artistas ";

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

    // Todos los artistas cuyo estado es activo
    public function getArtistasActivos()
    {
        $db = new Conexion();
        $query  = "SELECT a.nombre AS nombre, a.imagen AS imagen ";
        $query .= "FROM artistas AS a ";
        $query .= "INNER JOIN estados AS e ON a.idEstado = e.idEstado ";
        $query .= "WHERE e.estado = 'activo'";
        return $db->query($query)->fetch_all(MYSQLI_ASSOC);
    }
}
?>
