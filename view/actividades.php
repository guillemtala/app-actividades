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
                        <a class="nav-link active disabled" href="./actividades.php">Actividades</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="./mis-actividades.php">Mis Actividades</a>
                    </li> -->
                    <!-- <li class="nav-item">-->
                        <?php
                        session_start();
                        if(isset($_SESSION["email_usu"])){
                            echo "<li class='nav-item'>";
                            echo "<a class='nav-link' href='./mis-actividades.php'>Mis Actividades</a>";
                            echo "</li>";
                        }
                        
                        ?>
                    
                    
                </ul>
                <form class="d-flex">
                    <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> -->
                    <a href="btn-upload.php"><button class="btn btn-light form-control me-1" type="button"><i
                            class="fa-solid fa-arrow-up-from-bracket"></i></button></a>
                            <?php
                            /* session_start(); */
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
    <!-- Top -->
    <div class="row-c padding-m">
        <h4 class="column-1 padding-m">Top 5</h4>

        <div class="column-1 padding-s">
            
            <?php
                $cantidad = 5;
                $connection = mysqli_connect('localhost', 'root', '', 'bd_actividades');
                $sql2 = "SELECT * FROM tbl_actividades WHERE opcion_act='Publico';";
                $query= mysqli_query($connection, $sql2);
                $numFilas = mysqli_num_rows($query);
                /* echo $numFilas;  */
                $cantidadPaginas = $numFilas-$cantidad;

                $sql3 = "SELECT * FROM tbl_actividades WHERE opcion_act='Publico' ORDER BY hora_act ASC LIMIT $cantidadPaginas, $cantidad;";
                $query2 = mysqli_query($connection, $sql3);

                $ruta="../img/";
                foreach ($query2 as $actividad) {
                    ?>
                    <div class="column-5 padding-s">
                        <?php
                    $rutacompleta=$ruta.$actividad['foto_act'];
                    /* echo $rutacompleta;
                    
                    echo '<br>'; */
                    /* echo $actividad['id']; */
                    /* $id=$actividad['id']; */
                    echo  "<a href='./actividad.php?id={$actividad['id']}'><img src='{$rutacompleta}' class='target'></a>";
                    ?>
                    </div>
                    <?php
                }
                    ?>
        </div>

    </div>

    <!-- listado de actividades -->
    <div class="row-c">
        <div class="column-1 padding-m">
            <h4 class="padding-m">Explora</h4>
        </div>

        <?php
                $connection = mysqli_connect('localhost', 'root', '', 'bd_actividades');
                $sql = "SELECT * FROM tbl_actividades WHERE opcion_act='Publico';";
                $listadodept= mysqli_query($connection, $sql);

                $numFilas2 = mysqli_num_rows($listadodept);
                /* echo $numFilas2; */
                /* $i = 0;  */
                $ruta="../img/";
                foreach ($listadodept as $actividad) {
/*                     if($i <= $numFilas2){
                      $i=$i+1;  
                    }
                    echo $i;  */
                 
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

                    <?php
                    
                
                echo "<button class='btn btn-light m-1' type='submit' onclick='copiar({$actividad['id']});'><i class='fa-solid fa-link'></i></button>";
                /* echo "<input style='' type='text' value='http://localhost/www/app-actividades/view/actividad.php?id={$actividad['id']}' id='copy$i'>"; */
                    if(isset($_SESSION["email_usu"])){
                            echo "<a><button onclick='muestra({$actividad['id']});' id='cambio{$actividad['id']}' class='btn btn-light m-1' type='submit'><i class='fa-solid fa-heart'></i></button></a>";
                        }else{
                            echo "<a href='./login.html'><button class='btn btn-light m-1' type='submit'><i class='fa-solid fa-heart'></i></button></a>";
                        }
                ?>
                <script src="url.js"></script>
<!--                 <script src>
                    function copiar(id){
                        /* var id=id; */
                        /* Get the text field */
                        
                        var copyText = document.getElementById("copy");

                        /* Select the text field */
                        copyText.select();
                        copyText.setSelectionRange(0, 99999); /* For mobile devices */

                        /* Copy the text inside the text field */
                        navigator.clipboard.writeText(copyText.value);
                        
                        /* Alert the copied text */
                        alert("Copied the text: " + copyText.value);
                        
                    }
                </script> -->
<!--                 <script>
                        function muestra(i) {
                        
                            var mostrar = document.getElementById("cambio" + i);
                            /* console.log(mostrar); */
                            if (mostrar.className == "btn btn-light m-1") {
                                mostrar.className = "btn btn-danger m-1";
                            }
                            else if (mostrar.className == "btn btn-danger m-1") {
                                mostrar.className = "btn btn-light m-1";
                            }

                        }
                    </script> -->
            </div>
        </div>
        <?php
                }
            ?>
    </div>
</body>

</html>