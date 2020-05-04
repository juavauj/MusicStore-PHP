<?php include('../subpages/admins/header.php'); ?>

<?php 

    if(!isset($_SESSION['nombre'])){
        header('location: admin_superadmin_login.php');
    }    
?>


<?php
require(__DIR__.'/../../control/albumesControl.php');
$idAlbum= $_GET['id'];//1; //$_GET['idAlbum'];  id obtenido desde SuperAdmin
$dataAlbum=listarAlbum($idAlbum); // funcion de AlbumesControl

?>


<body>
<div class="container p-4">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body border border-info">
                <form method="POST" action="../../control/albumesControl.php?accion=editarAlbum" enctype="multipart/form-data">
                    <input type="hidden" name="idAlbum" value="<?php echo $dataAlbum['idAlbum'];?>">

                    <div class="form-row">                        
                        <div class="form-group col-md-6">    
                            <label class="text-info" for="nombreIn">Nombre</label>                    
                            <input type="text" name="nombre" class="form-control" id="nombreIn" value="<?php echo htmlspecialchars($dataAlbum['nombre']);?>">          
                        </div>                        
                        <div class="form-group col-md-6">
                            <label class="text-info" for="precioIn">Precio</label>                        
                            <input type="number" class="form-control" step="any" name="precio" id="precioIn" value="<?php echo $dataAlbum['precio'];?>">
                        </div>
                    </div>

                    <label class="text-info" for="imagenIn">Imagen</label>
                    <div class="form-group">                         
                        <input type="file" class="form-control-file btn btn-secondary" name="imagen" id="imagenIn">         
                        <input type="hidden" name="imagen" value="<?php echo $dataAlbum['imagen'];?>">
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="text-info" for="precioIn">Precio</label>                        
                            <input type="number" class="form-control" step="any" name="precio" id="precioIn" value="<?php echo $dataAlbum['precio'];?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="text-info" for="fechaIn">Fecha</label>
                            <input type="date" class="form-control" name="fecha" id="fechaIn" value="<?php echo $dataAlbum['fecha'];?>">
                        </div>
                    </div>

                    
                    <div class="form-group">
                        <label class="text-info" for="descripcionIn">Descripcion</label>
                        <textarea name="descripcion" class="form-control" id="descripcionIn" rows="4" cols="40" ><?php echo htmlspecialchars($dataAlbum['descripcion']);?></textarea>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label class="text-info" for="stockIn">Stock Fisico</label>
                            <input type="number" name="stock" class="form-control" id="stockIn" value="<?php echo $dataAlbum['stockFisico'];?>">

                        </div>
                        
                        <div class="form-group col-md-6">
                            <label class="text-info" for="estadoIn">Estado</label>
                            <div class="rad-btn-contenedor pt-1">
                                <input type="hidden" name="estado" id="estadoHidden" value="<?php echo $dataAlbum['idEstado'];?>">
                            </div>
                        </div>

                    </div>
                    <label class="text-info" for="generoSelect">Genero</label>
                    <div class="form-group">
                        
                        <select name="genero" id="generoSelect" class="form-control btn btn-secondary dropdown-toggle">
                            <option value="<?php echo $dataAlbum['idGenero'];?>"></option>

                        </select>
                    </div>


                    <label class="text-info" for="artistaSelect">Artista</label>
                    <div class="form-group">
                        
                        <select name="artista" id="artistaSelect" class="form-control btn btn-secondary dropdown-toggle">
                            <option value="<?php echo $dataAlbum['idArtista'];?>"></option>

                        </select>
                    </div>
                
                    <button  type="submit" class="btn-success form-control" name="update">
                        Editar
                    </button>
        
     
                </form>
            </div>
        </div>
    </div>
</div>

    

    

    <?php include("../subpages/admins/footer.php")?>
    <script src="../subpages/scripts/editarAlbum.js"></script>
</body>
</html>