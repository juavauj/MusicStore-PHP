<?php


require(__DIR__ . '/../modelo/class.Usuarios.php');

// Registro de usuario en la tienda
if(isset($_GET['accion'])){

    if ($_GET["accion"] == "registro_usuario") {
        // ¿Se utilizo el formulario?
        if (isset($_POST["form-registration"])) {
            // Obtener datos del formulario
            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
            // El correo es case insensitive
            $correo = strtolower($_POST["correo"]);
            $contrasena = $_POST["contrasena"];
    
            // Los campos no estan vacios
            if (empty($nombre) || empty($apellido) || empty($correo) || empty($contrasena)) {
                // Redireccion de nuevo al formulario
                header("Location: ../files/formularios/user_login_registration.php?form=form_registration&error=empty_fields");
    
                // Finalizar inmediatamente el script
                exit();
            }
    
            // El correo es valido
            if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                header("Location: ../files/formularios/user_login_registration.php?form=form_registration&error=invalid_email");
                exit();
            }
    
            // Intentar registrar al usuario
            $usuarios = new Usuarios();
            $success = $usuarios->userRegistration($nombre, $apellido, $correo, $contrasena, "user");
    
            if ($success) {
                // Redireccion a la vista de login
                header("Location: ../files/formularios/user_login_registration.php?form=form_login&success=ok");
                exit();
            } else {
                header("Location: ../files/formularios/user_login_registration.php?form=form_registration&error=user_exists");
                exit();
            }
        }
    }
    
    // Login de usuario en la tienda
    if ($_GET["accion"] == "login_usuario") {
        if (isset($_POST["form-login"])) {
            // Comparacion sin tener en cuenta el case
            $correo = strtolower($_POST["correo"]);
    
            $contrasena = $_POST["contrasena"];
    
            // Intentar el login del usuario
            $usuarios = new Usuarios();
            $success = $usuarios->userLogin($correo, $contrasena);
    
            if ($success) {
                // Redireccion al index
                header("Location: ../index.php");
                exit();
            } else {
                header("Location: ../files/formularios/user_login_registration.php?form=form_login&error=user_not_exists");
                exit();
            }
        }
    }
    
    // Login administrativo
    if ($_GET["accion"] == "login_administrativo") {
        if (isset($_POST["form-login"])) {
            $correo = strtolower($_POST["correo"]);
    
            $contrasena = $_POST["contrasena"];
    
            // Intentar el login del usuario
            $usuarios = new Usuarios();
            $result = $usuarios->adminLogin($correo, $contrasena);
    
            if ($result == "admin") {
                header("Location: ../files/subpages/admins/admin.php");
                exit();
            }
    
            if ($result == "superadmin") {
                header("Location: ../files/subpages/admins/superAdmin.php");
                exit();
            }
    
            // Podria ser que un usuario comun esta intentando login o el
            // usuario no existe
            header("Location: ../files/formularios/admin_superadmin_login.php?error=login_invalid");
        }
    }
    if($_GET["accion"] == "editarAdmin"){
        editarAdmin();
    }
    

}



function listarAdmin($idAdmin){
    $usuario= new Usuarios();
    $result= $usuario->listarAdmin($idAdmin);

    if($result!='error'){
        return $result;

    }else{
        echo "Error - No hay productos";
    }
}

function editarAdmin(){
    $usuario= new Usuarios();

    $id=$_POST['idUsuario'];
    $nombre=addslashes($_POST['nombre']);
    $apellido=addslashes($_POST['apellido']);
    $correo=addslashes($_POST['correo']);
    $contrasena=addslashes($_POST['contrasena']);
    $idEstado=$_POST['estado'];
    $idRol=$_POST['rol'];

    $usuario->editarAdmin($id,$nombre,$apellido,$correo,$contrasena,$idEstado,$idRol);

}


?>
