<?php include('../subpages/admins/headerForms.php'); ?>

<?php 

    if(!isset($_SESSION['nombre'])){
        header('location: admin_superadmin_login.php');
    }    
?>


<?php
require(__DIR__.'/../../control/generosControl.php');
$idGenero= $_GET['id'];//1; //$_GET['idGenero'];  id obtenido desde SuperAdmin
    $dataGenero=listarGenero($idGenero); // funcion de generosControl

?>

<body>
    
<div class="container p-4">
    <div class="row">
        <div class="col-md-5 mx-auto ">
            <div class="card card-body border border-info">
                <form method="POST" action="../../control/generosControl.php?accion=editarGenero">
                    <div class="form-group">
                        <label for="generoIn">Genero</label>
                        <input type="text" name="genero" id="generoIn" value="<?php echo htmlspecialchars($dataGenero['genero']);?>" >
                        <input type="hidden" name="idGenero" value="<?php echo $dataGenero['idGenero'];?>">
                    </div>
                    <div class="form-group">
                        <label for="estadoIn" class="text-info">Estado</label>      
                        <div class="rad-btn-contenedor">
                            <input type="hidden" name="estado" id="estadoHidden" value="<?php echo $dataGenero['idEstado'];?>">
                         </div>
                    </div>
                    <button  type="submit" class="btn btn-info btn-block" name="update">
                        Editar
                    </button>       
                </form>
            </div>
        </div>
    </div>
</div>
    
<script src="../subpages/scripts/editarGenero.js"></script>
<?php include("../subpages/admins/footer.php")?>
    