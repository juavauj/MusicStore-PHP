<?php

require(__DIR__ . '/../config/class.Conexion.php');

class Canciones{

    public function __construct(){

    }

    public function mostrarCancion($id){

        $db= new Conexion();
        $sql="SELECT * FROM  canciones WHERE idCancion='$id'";

        $result=$db->query($sql);

        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            //print_r($row);
            return $row;

        }else{

            return "error";
        }


    }

    public function editarCancion($id,$nombre,$idArtista,$idAlbum){
        $db= new Conexion();
        $sql="UPDATE canciones SET nombre='$nombre', idArtista='$idArtista', idAlbum='$idAlbum' WHERE idCancion='$id'";
        $db->query($sql);

        echo $db->query($sql)?  header('location: ../files/subpages/admins/superAdmin.php') :  'errorsss';

    }

}

?>