<?php

require(__DIR__ . '/../config/class.Conexion.php');

class Roles{

    public function __construct(){

    }


    function mostrarRoles(){
        $db=new Conexion();

        $sql="SELECT * FROM roles";
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