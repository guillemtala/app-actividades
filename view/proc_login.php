<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
</head>
<body>
<?php
/* if(isset($_POST["iniciar"])){

} */

if(isset($_POST["iniciar"])){

    if(isset($_POST["correo"])&& isset($_POST["psw"])){
        $correo=$_POST["correo"];
        $password=sha1($_POST["psw"]);
        $connection = mysqli_connect('localhost', 'root', '', 'bd_actividades');
        $comprobar= "SELECT * FROM tbl_usuarios WHERE email_usuario = '{$correo}' AND contra_usuario = '{$password}';";
        $cons = mysqli_query($connection,$comprobar);
        $num = mysqli_num_rows($cons);
        if($num==1){
            //
            session_start();
            $_SESSION["email_usu"]=$correo;
            /* $_SESSION['like'] */
            //echo "Usuario correcto";
            //echo "<script>window.location.href='../index.html';</script>";
            header("Location:../index.php");
        }else {
            // echo "<script>window.location.href='./login.html';</script>";
            ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            function aviso(url) {
                Swal.fire({
                        title: 'El correo o la contraseña son incorrectos',
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

            aviso('./login.html');
        </script>
    <?php
        } 
    }   
}
    

?>

</body>
</html>
