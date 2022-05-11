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
/* echo $opcion; */
$topic=$_POST['topic'];
/* echo $topic; */
$correo=$_SESSION["email_usu"];

/* $time = time(); */
$time=date("d-m-Y (H:i:s)");
/* echo date("d-m-Y (H:i:s)", $time); */
/* echo $time; */
/* print_r($foto); */

if($opcion=='true'){
    $pubpriv="Publico";
}else if($opcion=='false'){
    $pubpriv="Privado";
}

/* echo $pubpriv; */

$path="../img";
$destino=$_SERVER['DOCUMENT_ROOT'].$path.'/'.$foto['name']; 

if(($foto['size']<1000*1024) && ($foto['type']=="image/jpeg" || $foto['type']=="image/png" || $foto['type']=="image/gif")){
    $exito=move_uploaded_file($foto['tmp_name'], $destino );
    if($exito){
        //conexion a la base de datos
        //Subir los datos a la tabla correspondiente
        $destino=$foto['name'];
        $connection = mysqli_connect('localhost', 'root', '', 'bd_actividades');
        $sql = "INSERT INTO `tbl_actividades` (`correo_act`, `titulo_act`, `desc_act`, `foto_act`, `hora_act`, `opcion_act`,`topic_act`) VALUES ('$correo', '$titulo', '$descripcion', '$destino', '$time', '$pubpriv', '$topic')";
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
    ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            function aviso(url) {
                Swal.fire({
                        title: 'El archivo es demasiado grande o no esta con el formato adecuado',
                        icon: 'error',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Volver'
                    })
                    .then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = url;
                        }
                    })
            }

            aviso('./subir.actividad.html');
        </script>
    <?php

}











?>
</body>
</html>