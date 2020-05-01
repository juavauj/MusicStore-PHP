<?php include("../subpages/header.html")?> 

<?php
require(__DIR__.'/../../control/generosControl.php');
$idGenero= $_GET['id'];//1; //$_GET['idGenero'];  id obtenido desde SuperAdmin
    $dataGenero=listarGenero($idGenero); // funcion de generosControl

?>

<body>
    <form method="POST" action="">

        <label for="generoIn">Genero</label>
        <input type="text" name="genero" id="generoIn" value="<?php echo $dataGenero['genero'];?>" >
        <input type="submit" value="Editar">



    </form>

</body>