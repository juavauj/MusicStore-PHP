<?php

require(__DIR__ . '/../config/class.Conexion.php');

class Generos{

    public function __construct(){

    }

<<<<<<< HEAD
    // Mostrar albumes por genero

    public function mostrarAlbumes(){
        $db = new Conexion();

        $sql = "SELECT nombre, imagen FROM albumes AS a INNER JOIN generos AS g ON a.idGenero = g.idGenero"
    }


    // Filtrar albumes por genero
=======

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

    public function editarGenero($id,$genero){
        $db= new Conexion();
        $sql="UPDATE generos SET genero='$genero' WHERE idGenero='$id'";

        echo $db->query($sql)?  header('location: ../files/subpages/admins/superAdmin.php') :  'error';

        

    }
>>>>>>> 5b8f96bb965f02aa066ffb9ee2fdf0de18499a25

}

?>