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

    public function editarGenero($id,$genero){
        $db= new Conexion();
        $sql="UPDATE generos SET genero='$genero' WHERE idGenero='$id'";

        echo $db->query($sql)?  header('location: ../files/subpages/admins/superAdmin.php') :  'error';

        

    }

    // Un genero esta activo si hay al menos un album (activo)
    // que tiene ese genero
    public function getGenerosActivos() {
        $db = new Conexion();
        // No se tiene en cuenta el case, solo generos distintos
        $query  = "SELECT DISTINCT(LOWER(g.genero)) AS genero, g.idGenero FROM generos AS g ";
        $query .= "INNER JOIN albumes AS a ON g.idGenero = a.idGenero ";
        $query .= "INNER JOIN estados AS e ON a.idEstado = e.idEstado ";
        $query .= "WHERE e.estado = 'activo'";
        return $db->query($query)->fetch_all(MYSQLI_ASSOC);
    }

}
?>