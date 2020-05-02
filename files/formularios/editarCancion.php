<?php include('../subpages/admins/header.php'); ?>

<?php
require(__DIR__.'/../../control/cancionesControl.php');
$idCancion= $_GET['id'];//1; //$_GET['idCancion'];  id obtenido desde SuperAdmin
$dataCancion=listarCancion($idCancion); // funcion de AlbumesControl
?>


<body>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form method="POST" action="../../control/cancionesControl.php?accion=editarGenero">
                    <label for=""></label>
                    <input type="hidden" name="idCancion" value="<?php echo $dataCancion['idCancion'];?>">
                    <div class="form-group">
                        <input type="text" name="" id="" value="<?php echo $dataCancion['nombre'];?>">   
                    </div>
                    <label for="artistaSelect">Artista</label>
                    <div class="form-group">
                        
                        <select name="idArtista" id="artistaSelect">
                            <option value="<?php echo $dataCancion['idArtista'];?>"></option>

                        </select>
                    </div>
                    <label for="albumSelect">Album</label>
                    <div class="form-group">
                        
                        <select name="idAlbum" id="albumSelect">
                            <option value="<?php echo $dataCancion['idAlbum'];?>"></option>

                        </select>
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
<script src="../subpages/scripts/editarCancion.js"></script>
</body>