<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
session_start();
$titulo=$_POST['titulo'];
$descripcion=$_POST['descripcion'];
$foto=$_FILES['foto'];
$opcion=$_POST['opcion'];
$correo=$_SESSION["email_usu"];


$path="/www/app-actividades/img";
$destino=$_SERVER['DOCUMENT_ROOT'].$path.'/'.$foto['name']; 

if(($foto['size']<1000*1024) && ($foto['type']=="image/jpeg" || $foto['type']=="image/png" || $foto['type']=="image/gif")){
    $exito=move_uploaded_file($foto['tmp_name'], $destino );
    if($exito){
        //conexion a la base de datos
        //Subir los datos a la tabla correspondiente
        $destino=$foto['name'];
        $connection = mysqli_connect('localhost', 'root', '', 'bd_actividades');
        $sql = "INSERT INTO `tbl_actividades` (`correo_act`, `titulo_act`, `desc_act`, `foto_act`) VALUES ('$correo', '$titulo', '$descripcion', '$destino')";
        $insert = mysqli_query($connection, $sql);
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            function aviso(url) {
                Swal.fire({
                        title: 'Proceso terminado',
                        icon: 'success',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Volver'
                    })
                    .then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = url;
                        }
                    })
            }

            aviso('./actividades.php');
        </script>
    <?php
    }
}else{
    echo 'El archivo es demasiado grande y supera 200k';
}











?>
</body>
</html>