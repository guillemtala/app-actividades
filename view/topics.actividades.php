<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividades</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/e0b63cee0f.js" crossorigin="anonymous"></script>
    <!-- Hoja de estilos -->
    <link rel="stylesheet" href="../css/main.css">

</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php">#AppName</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 50vh;">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="./nosotros.php">Sobre nosotros</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="./actividades.php">Actividades</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active disabled" href="./mis-actividades.php">Mis Actividades</a>
                    </li>
                    <!-- <li class="nav-item">
                        <?php
                        /* session_start();
                        if(isset($_SESSION["email_usu"])){
                            echo "<li class='nav-item'>";
                            echo "<a class='nav-link' href='./mis-actividades.html'>Mis Actividades</a>";
                            echo "</li>";
                        } */
                        
                        ?>
                    </li> -->
                    
                </ul>
                <form class="d-flex">
                    <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> -->
                    <a href="btn-upload.php"><button class="btn btn-light form-control me-1" type="button"><i
                            class="fa-solid fa-arrow-up-from-bracket"></i></button></a>
                            <?php
                            session_start();
                            //$_SESSION["email_usu"]=$correo;
                            
                            if(isset($_SESSION["email_usu"])){
                                echo "<a href='../view/logout.php'><button class='btn btn-light form-control ms-1' type='button'>Logout</button></a>";
                            }else{
                                echo "<a href='../view/login.html'><button class='btn btn-light form-control ms-1' type='button'>Acceder</button></a>";
                            } 

                   
                    ?>
                </form>
            </div>
        </div>
    </nav>

    <!-- listado de actividades -->
    <div class="row-c">
        <div class="column-1 padding-m">
            <h3 class="padding-m">Topics</h3>
        </div>

        <?php

        if(isset($_GET['id'])&& ($_GET['id'])=="mates"){
            ?>
            <div class="column-1 padding-m">
            <h4 class="padding-m">Matemáticas</h4>
        </div>

            <?php
            $connection = mysqli_connect('localhost', 'root', '', 'bd_actividades');
                $sql = "SELECT * FROM tbl_actividades WHERE topic_act='Matematicas' AND opcion_act='Publico';";
                /* echo $sql; */
                /* echo $sql; */
                $listadodept= mysqli_query($connection, $sql);

                $ruta="../img/";
                foreach ($listadodept as $actividad) {
                    ?>
                    <div class="column-3 padding-mobile">
                        <?php
                    $rutacompleta=$ruta.$actividad['foto_act'];
                    /* echo $rutacompleta;
                    
                    echo '<br>'; */
                    /* echo $actividad['id']; */
                    /* $id=$actividad['id']; */
                    echo  "<a href='./actividad.php?id={$actividad['id']}'><img src='{$rutacompleta}' class='target'></a>";
                    ?>
                    <div style="float: right;" class="padding-m">
                <button class="btn btn-light m-1" type="submit"><i class="fa-solid fa-link"></i></button>
                <button class="btn btn-light m-1" type="submit"><i class="fa-solid fa-heart"></i></button>
            </div>
        </div>
        <?php
                 } 
            ?>
    
        <?php

        }else if(isset($_GET['id'])&& ($_GET['id'])=="info"){
            ?>
            <div class="column-1 padding-m">
            <h4 class="padding-m">Informatica</h4>
        </div>

            <?php
            $connection = mysqli_connect('localhost', 'root', '', 'bd_actividades');
                $sql2 = "SELECT * FROM tbl_actividades WHERE topic_act='Informatica' AND opcion_act='Publico';";
                /* echo $sql; */
                $listadodept2= mysqli_query($connection, $sql2);

                $ruta="../img/";
                foreach ($listadodept2 as $actividad) {
                    ?>
                    <div class="column-3 padding-mobile">
                        <?php
                    $rutacompleta=$ruta.$actividad['foto_act'];
                    /* echo $rutacompleta;
                    
                    echo '<br>'; */
                    /* echo $actividad['id']; */
                    /* $id=$actividad['id']; */
                    echo  "<a href='./actividad.php?id={$actividad['id']}'><img src='{$rutacompleta}' class='target'></a>";
                    ?>
                    <div style="float: right;" class="padding-m">
                <button class="btn btn-light m-1" type="submit"><i class="fa-solid fa-link"></i></button>
                <button class="btn btn-light m-1" type="submit"><i class="fa-solid fa-heart"></i></button>
            </div>
        </div>
        <?php
                 } 
            ?>
    </div>
    <?php
        }
                
           ?>    

</body>

</html>