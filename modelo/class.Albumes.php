<?php

require(__DIR__ . '/../config/class.Conexion.php');

class Albumes{

    public function __construct(){

    }

    public function mostrarAlbumes(){
        $db=new Conexion();

        $sql="SELECT nombre FROM albumes  ";

        $result=$db->query($sql);

        if($result->num_rows > 0){
            $row = mysqli_fetch_all($result);
            return $row;

        }else{

            return "error";
        }

    }




?>