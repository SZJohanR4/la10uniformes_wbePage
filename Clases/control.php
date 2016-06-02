<?php

include '../Clases/Uniforme.php';
include '../Clases/administrador.php';
include '../Clases/Proveedor.php';
include '../Clases/imagenes.php';
include '../Clases/SistemaApp.php';
include '../Clases/Sistema_De_Solicitud.php';
include '../GUI/Administrador/Paginas/login.php';

if (isset($_POST['enviarProveedor'])) {
    
    $idProveedor = $_POST['idProveedor'];
    $nombre= $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $documento = $_POST['documento'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $cuenta = $_POST['cuenta'];
    $direccion = $_POST['direccion'];
    $estado = $_POST['estado'];
    
    


    $proveedor = new Proveedor();
     $proveedor->insertarProveedor($idProveedor, $nombre, $apellido, $documento, $correo, $contrasena, $cuenta, $direccion, $estado);
   
   
  echo '<script language="javascript">
    window.location = " ../GUI/proveedor/insertarUniforme.php";
</script>';
}

if (isset($_POST['enviarUniforme'])) {
    
    $iduniforme = $_POST['idUniform'];
    $equipo = $_POST['equipo'];
    $categoria = $_POST['categoria'];
    $talla = $_POST['Talla'];
    $precio = $_POST['precio'];
    $tela = $_POST['tela'];
    $descuento = $_POST['descuento'];
    $replica = $_POST['replica'];
    $clasificacion = $_POST['clasificacion'];
    $descripcion = $_POST['Descripcion'];
    $proveedor = $_POST['selectproveedor'];
    


    $uniform = new Uniforme();

    $uniform->insertarUniforme($iduniforme, $equipo, $categoria, $talla,
            $precio, $tela, $descuento,$replica,$clasificacion,$descripcion,$proveedor);
   
  echo '<script language="javascript">
    window.location = " ../GUI/proveedor/indexproveedor.php";
</script>';
}
if (isset($_POST['eliminarUniformeadmin'])) {
   
    $uniforme= $_POST['selectelmiminar'];
    $uniformes = new administrador();
    $uniformes->EliminarUniformes($uniforme);
    echo '<script language="javascript">
    window.location = " ../GUI/Administrador/Paginas/login.php";
</script>';
   

}
if (isset($_POST['eliminarUniforme'])) {
   
    $uniforme= $_POST['selectelmiminar'];
    $uniformes = new Uniforme();
    $uniformes->EliminarUniformes($uniforme);
    echo '<script language="javascript">
    window.location = " ../GUI/proveedor/insertarUniforme.php";
</script>';
   

}


if (isset($_POST['enviarImagen'])) {

    $idimagen = $_POST['idimagen'];
    $nombre = $_FILES['imagen']['name']; //este es el nombre del archivo que acabas de subir

   $nombre = $_FILES['imagen']['name']; //este es el nombre del archivo que acabas de subir

    $tipo = $_FILES['imagen']['type']; //este es el tipo de archivo que acabas de subir
    $_FILES['imagen']['tmp_name']; //este es donde esta almacenado el archivo que acabas de subir.
    $_FILES['imagen']['size']; //este es el tamaño en bytes que tiene el archivo que acabas de subir.
    $_FILES['imagen']['error']; //este almacena el codigo de error que resultaría en la subida.
//imagen es el nombre del input tipo file del formulario.
    if ($_FILES["imagen"]["error"] > 0) {
        echo "ha ocurrido un error";
    } else {
        //ahora vamos a verificar si el tipo de archivo es un tipo de imagen permitido.
        //y que el tamano del archivo no exceda los 100kb
//         ""
        $permitidos = array("image/jpg", "image/jpeg", "image/jpeg", "image/gif", "image/png");
        $limite_kb = 1000;

        if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024) {
            //esta es la ruta donde copiaremos la imagen
            //recuerden que deben crear un directorio con este mismo nombre
            //en el mismo lugar donde se encuentra el archivo subir.php
       
           
            $ruta = "../../GUI/imagenes/" .$nombre;
            //comprovamos si este archivo existe para no volverlo a copiar.
            //pero si quieren pueden obviar esto si no es necesario.
            //o pueden darle otro nombre para que no sobreescriba el actual.
            if (!file_exists($ruta)) {
                //aqui movemos el archivo desde la ruta temporal a nuestra ruta
                //usamos la variable $resultado para almacenar el resultado del proceso de mover el archivo
                //almacenara true o false
                $resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);
            }
        }
    }
    $descripcion=$_POST['Descripcion'];
    $tipos=$_POST['tipo'];
    $iduniforme=$_POST['select3'];
    $idpropietario =$_POST['selectproveedor'];
    $idimagen=$_POST['idimagen'];
    
    $imagen = new imagenes();
    $imagen->insertarImagen($idimagen, $idpropietario, $iduniforme, $tipos,$ruta, $descripcion);
      echo '<script language="javascript">
    window.location = " ../GUI/proveedor/indexproveedor.php";
</script>';

  
}

if (isset($_POST['enviarSolicitudPublicidad'])) {
    include '../Clases/Subscripcion.php';
    $subscripcion = new Subscripcion();


    $id = $_POST['idI'];
    $titulo = $_POST['tituloI'];
    $descripcion = $_POST['descripcionI'];
    
    
    $uploads_dir = "../uniformes/";
    $idProveedor="../uniformes/". $_POST['idI'].".jpg";
    $tmp_name=$_FILES["fotografia"]["tmp_name"];
    $name=$_FILES["fotografia"]["name"];
    $sd="../uniformes/".$name;//ruta donde queda guardada la imagen

    $prueba=move_uploaded_file($tmp_name, $uploads_dir.$name);
    rename($sd, $idProveedor);//renombro la imagen con el id que entre el proveedor 
    
   
$subscripcion->solicitarSubscripcion($sd,$id,$titulo,$descripcion);   
      
 
}

// PARTE CONTROL - ELKIN PRADA
if (isset($_POST['Ingresar'])) {

    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];
    $ingresar = new SistemaApp();
    $ingresar->ingresarAlSistema($usuario, $contraseña);
}



?>

