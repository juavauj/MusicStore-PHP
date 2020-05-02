<?php

require(__DIR__ . '/../config/class.Conexion.php');

class Artistas{

    public function __construct(){

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
}

?>