<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Login</title>
    <link rel="stylesheet" href="../css/index.css">
</head>

<body class="body3">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <div class="container-fluid">
        <div class="row flex">
            <div class="col-6 shadow padding-register color-register border">
                <div class="flex">
                    <h2>Actividad</h2>
                </div>
                <?php

                    $id = $_GET['id'];
                    /* echo $id; */
                    $connection = mysqli_connect('localhost', 'root', '', 'bd_actividades');
                    $sql = "SELECT * FROM tbl_actividades WHERE id={$_GET['id']}";
                    $listadodept= mysqli_query($connection, $sql);
                    $ruta="../img/";

                    foreach ($listadodept as $actividad){
                        $rutacompleta=$ruta.$actividad['foto_act'];
                        
                        /* echo $rutacompleta; */
                        ?>
                        <div class="mb-3 flex">
                            <h3>TITULO</h3>
                        </div>
                        <div class="flex">
                        <?php
                        echo  "<h4>{$actividad['titulo_act']}</h4>";
                        ?>
                        </div>
                        <div class="mb-3 flex">
                            <h3>DESCRIPCION</h3>
                        </div>
                        <div class="flex">
                        <?php
                        echo  "<h4>{$actividad['desc_act']}</h4>";
                        ?>
                        </div>
                        <div class="mb-3 flex">
                            <h3>IMAGEN</h3>
                        </div>
                        <div class="flex">
                        <?php
                        echo  "<img src='{$rutacompleta}' class='target'>";
                        ?>
                        </div>
                        <div class="mb-3 flex">
                            <h3>FECHA DE PUBLICACIÓN</h3>
                        </div>
                        <div class="flex">
                        <?php
                        echo  "<h4>{$actividad['hora_act']}</h4>";
                        ?>
                        </div>
                        <?php
                        $connection = mysqli_connect('localhost', 'root', '', 'bd_actividades');
                        $correo_act=$actividad['correo_act'];
                        /* echo $correo_act; */
                        $sql2 = "SELECT * FROM `tbl_usuarios` WHERE `email_usuario`='{$correo_act}'";
                        /* $sql2="SELECT * FROM `tbl_usuarios` WHERE `email_usuario` LIKE {$correo_act}" */
                        /* echo $sql2; */
                        $listadodept2= mysqli_query($connection, $sql2);
                        /* echo $listadodept2; */
                        /* $usuario = mysqli_fetch_array($listadodept2, MYSQLI_ASSOC); */
                        /* print_r($sql2); */
                        foreach ($listadodept2 as $usuario){
                            /* echo $usuario; */
                            ?>
                            <div class="mb-3 flex">
                                <h3>PUBLICADOR</h3>
                            </div>
                            <div class="flex">
                            <?php
                            echo  "<h4>{$usuario['nombre_usuario']}</h4>";
                            ?>
                            </div>
                            <?php 
                        }
                    }

                ?>
            </div>
        </div>
    </div>


    </form>
</body>

</html>