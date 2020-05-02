<<<<<<< HEAD
<?php include("../subpages/header.html")?> 
=======

<?php include('../subpages/admins/header.php'); ?>
>>>>>>> 5b8f96bb965f02aa066ffb9ee2fdf0de18499a25

<?php
require(__DIR__.'/../../control/generosControl.php');
$idGenero= $_GET['id'];//1; //$_GET['idGenero'];  id obtenido desde SuperAdmin
    $dataGenero=listarGenero($idGenero); // funcion de generosControl

?>

<body>
<<<<<<< HEAD
    <form method="POST" action="">

        <label for="generoIn">Genero</label>
        <input type="text" name="genero" id="generoIn" value="<?php echo $dataGenero['genero'];?>" >
        <input type="submit" value="Editar">



    </form>

=======
    
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form method="POST" action="../../control/generosControl.php?accion=editarGenero">
                    <div class="form-group">
                        <label for="generoIn">Genero</label>
                        <input type="text" name="genero" id="generoIn" value="<?php echo $dataGenero['genero'];?>" >
                        <input type="hidden" name="idGenero" value="<?php echo $dataGenero['idGenero'];?>">

                    </div>
                
                    <button  type="submit" class="btn-success" name="update">
                        Editar
                    </button>
        
     
                </form>
            </div>
        </div>
    </div>
</div>
    <?php include("../subpages/admins/footer.php")?>
>>>>>>> 5b8f96bb965f02aa066ffb9ee2fdf0de18499a25
</body>