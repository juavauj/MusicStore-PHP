<?php include('../subpages/admins/headerForms.php'); ?>


<?php 

    if(!isset($_SESSION['nombre'])){
        header('location: admin_superadmin_login.php');
    }    
?>


<?php
require(__DIR__.'/../../control/cancionesControl.php');
$idCancion= $_GET['id'];//1; //$_GET['idCancion'];  id obtenido desde SuperAdmin
$dataCancion=listarCancion($idCancion); // funcion de AlbumesControl

?>


<body>
<div class="container p-4">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body border border-info">
                <form method="POST" action="../../control/cancionesControl.php?accion=editarCancion">
                    <label for="nombreIn" class="text-info">Nombre</label>
                    <input type="hidden" name="idCancion" value="<?php echo $dataCancion['idCancion'];?>">
                    <div class="form-group">
                        <input type="text" name="nombre" class="form-control" id="nombreIn" value="<?php echo htmlspecialchars($dataCancion['nombre']);?>">   
                    </div>
                    <label for="artistaSelect" class="text-info">Artista</label>
                    <div class="form-group">
                        <select name="idArtista" class="form-control btn btn-secondary dropdown-toggle" id="artistaSelect">
                            <option value="<?php echo $dataCancion['idArtista'];?>"></option>
                        </select>
                    </div>
                    <label for="albumSelect" class="text-info">Album</label>
                    <div class="form-group">
                        
                        <select name="idAlbum" class="form-control btn btn-secondary dropdown-toggle" id="albumSelect">
                            <option value="<?php echo $dataCancion['idAlbum'];?>"></option>
                        </select>
                    </div>
                    <label for="estadoIn" class="text-info">Estado</label>
                    <div class="form-group">     
                        <div class="rad-btn-contenedor">
                            <input type="hidden" name="estado" id="estadoHidden" value="<?php echo $dataCancion['idEstado'];?>">
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
<script src="../subpages/scripts/editarCancion.js"></script>
</body>