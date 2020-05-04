<?php include('../subpages/admins/header.php'); ?>

<?php 

    if(!isset($_SESSION['nombre'])){
        header('location: admin_superadmin_login.php');
    }    
?>

<?php
require(__DIR__.'/../../control/artistasControl.php');
$idArtista= $_GET['id'];//1; //$_GET['idGenero'];  id obtenido desde SuperAdmin
$dataArtista=listarArtista($idArtista); // funcion de generosControl

?>


<body>
    
<div class="container p-4">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body border border-info">
                <form method="POST" action="../../control/artistasControl.php?accion=editarArtista" enctype="multipart/form-data">

                    <div class="form-group">   
                        <label for="ArtistaIn" class="text-info">Nombre</label> 
                        <input type="text" name="artista" id="ArtistaIn" class="form-control" value="<?php echo htmlspecialchars($dataArtista['nombre']);?>" >
                        <input type="hidden" name="idArtista" value="<?php echo $dataArtista['idArtista'];?>">
                    </div>

                    <label for="imagenIn" class="text-info">Imagen</label>
                    <div class="form-group">
                                                                        
                        <input type="file" class="form-control-file btn btn-secondary" name="imagen" id="imagenIn">         
                        <input type="hidden" name="imagen" value="<?php echo $dataArtista['imagen'];?>">
                    </div>

                    <label for="estadoIn" class="text-info">Estado</label>
                    <div class="form-group">
                        
                        <div class="rad-btn-contenedor">
                            <input type="hidden" name="estado" id="estadoHidden" value="<?php echo $dataArtista['idEstado'];?>">
                         </div>

                    </div>
                
                    <button  type="submit" class="btn-info form-control" name="update">
                        Editar
                    </button>
        
     
                </form>
            </div>
        </div>
    </div>
</div>
    <?php include("../subpages/admins/footer.php")?>
    <script src="../subpages/scripts/editarArtista.js"></script>
</body>