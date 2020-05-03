<?php

require(__DIR__ . '/../config/class.Conexion.php');

class Artistas{

    public function __construct(){

    }

    public function listarArtista($idArtista)
    {
        $db = new Conexion();

        $sql = "SELECT * FROM artistas WHERE idArtista='$idArtista' ";

        $result = $db->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            //print_r($row);
            return $row;
        } else {

            return "error";
        }
    }


    public function mostrarArtistas(){
        $db= new Conexion();
        $sql="SELECT * FROM  artistas ";

        $result=$db->query($sql);
        $resultados=array();
        if($result->num_rows >0){
            while($r=mysqli_fetch_assoc($result)){
                $resultados[]=$r;
            };
            return $resultados;

        }else{
            return 'error';
        }

    }

    public function modificarArtista($id,$nombre,$imagen,$estado){
        $db= new Conexion();

        $sql="UPDATE artistas SET nombre='$nombre',imagen='$imagen',idEstado='$estado' WHERE idArtista='$id'";
        var_dump($sql);
        echo $db->query($sql)?  header('location: ../files/subpages/admins/superAdmin.php') :  'error';

    }
}

?>