<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
</head>
<body>
<?php
if(isset($_POST["crearUsuario"])){

}
    if(isset($_POST["usuario"])&& isset($_POST["correo"])&& isset($_POST["psw"])){
        $connection = mysqli_connect('localhost', 'root', '', 'bd_actividades');

        $usuario=$_POST['usuario'];
        $email= $_POST['correo'];
        $password=sha1($_POST["psw"]);


        $comprobar= "SELECT email_usuario FROM tbl_usuarios;";
        $cons = mysqli_query($connection,$comprobar);
        $lista_emails=array();

        while ($fila = mysqli_fetch_assoc($cons)){
            $lista_emails[]=$fila['email_usuario']; 
        }

        if (!in_array($email,$lista_emails)) {
            $sql = "INSERT INTO `tbl_usuarios` (`nombre_usuario`, `email_usuario`, `contra_usuario`) VALUES ('$usuario', '$email', '$password')";
            $insert = mysqli_query($connection, $sql);
        /*     echo "<script type=\"text/javascript\">alert(\"Usuario '$usuario' agregado correctamente\");</script>";  */
            ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                function aviso(url) {
                    Swal.fire({
                            title: 'Usuario creado',
                            icon: 'success',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Iniciar sesión'
                        })
                        .then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = url;
                            }
                        })
                }

                aviso('./login.html');
            </script>
        <?php
        } else{
            /* echo "<script type=\"text/javascript\">alert(\"Usuario '$usuario' repetido\");</script>"; */
            ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                function aviso(url) {
                    Swal.fire({
                            title: 'Este correo ya esta registrado',
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

                aviso('./register.html');
            </script>
            <?php
        }

    }
?>
</body>
</html>



