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
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form method="POST" action="../../control/artistasControl.php?accion=editarArtista" enctype="multipart/form-data">
                    <label for="ArtistaIn">Nombre</label>
                    <div class="form-group">
                        
                        <input type="text" name="artista" id="ArtistaIn" value="<?php echo htmlspecialchars($dataArtista['nombre']);?>" >
                        <input type="hidden" name="idArtista" value="<?php echo $dataArtista['idArtista'];?>">

                    </div>
                    <label for="imagenIn">Imagen</label>
                    <div class="form-group">
                                                                        
                        <input type="file" class="form-control-file" name="imagen" id="imagenIn">         
                        <input type="hidden" name="imagen" value="<?php echo $dataArtista['imagen'];?>">
                    </div>

                    <label for="estadoIn">Estado</label>
                    <div class="form-group">
                        
                        <div class="rad-btn-contenedor">

                            <input type="hidden" name="estado" id="estadoHidden" value="<?php echo $dataArtista['idEstado'];?>">


                         </div>

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
    <script src="../subpages/scripts/editarArtista.js"></script>
</body>