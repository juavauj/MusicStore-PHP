<?php

require(__DIR__ . '/../config/class.Conexion.php');

class Generos{

    public function __construct(){

    }


    public function mostrarGeneros(){
        $db=new Conexion();
        $sql="SELECT * FROM generos ";
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

    public function mostrarGenero($idGenero){
        $db= new Conexion();
        $sql="SELECT * FROM  generos WHERE idGenero='$idGenero'";

        $result=$db->query($sql);

        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            //print_r($row);
            return $row;

        }else{

            return "error";
        }

    }

}

?>