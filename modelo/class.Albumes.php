<?php

require(__DIR__ . '/../config/class.Conexion.php');

class Albumes{

    public function __construct(){

    }

    public function listarAlbum($idAlbum){
        $db=new Conexion();

        $sql="SELECT * FROM albumes WHERE idAlbum='$idAlbum' ";

        $result=$db->query($sql);

        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            //print_r($row);
            return $row;

        }else{

            return "error";
        }

    }

    public function mostrarAlbumes(){
        $db= new Conexion();
        $sql="SELECT * FROM  albumes ";

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

}

?>