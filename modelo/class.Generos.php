<?php

require(__DIR__ . '/../config/class.Conexion.php');

class Generos{

    public function __construct(){

    }

    // Mostrar albumes por genero

    public function mostrarAlbumes(){
        $db = new Conexion();

        $sql = "SELECT nombre, imagen FROM albumes AS a INNER JOIN generos AS g ON a.idGenero = g.idGenero"
    }


    // Filtrar albumes por genero

}

?>