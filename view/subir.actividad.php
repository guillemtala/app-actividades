<?php
session_start();
if(!isset($_SESSION["email_usu"])){
    header("Location:login.html");
}
?>
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

<body class="body2">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <div class="container-fluid">
        <div class="row flex ">
            <div class="col-6 shadow padding-register color-register">
                <div class="flex">
                    <h2>Subir actividad</h2>
                </div>
                <form action="proc_subir_actividad.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <br>
                        <label for="uname"><b>Titulo</b></label>
                        <br>
                        <input class="form-control" type="text" placeholder="Escribe el titulo de tu actividad" name="titulo" required>
                    </div>
                    <div class="mb-3 ">
                        <br>
                        <label for="psw"><b>Descripcion</b></label>
                        <br>
                        <input class="form-control" type="text" placeholder="Escribe la descripcion de tu actividad" name="descripcion" required>
                    </div>
                    <div class="mb-3 ">
                        <br>
                        <label for="psw"><b>Foto</b></label>
                        <br>
                        <input class="form-control" type="file" placeholder="Escoje una imagen" name="foto" required>
                    </div>
                    <div>
                        <br>
                        <label for="topic"><b>Topic</b></label>
                        <br>
                        <select name="topic" required>

                            <option>Matematicas</option>

                            <option>Informatica</option>
                      
                          </select>
                        <br>
                        <br>
                    </div>
                    <div class="mb-3 ">
                        <input type="radio" name="opcion" value="true" required>
                        <label for="opcion">P??blico</label>

                        <input type="radio" name="opcion" value="false" required>
                        <label for="opcion">Privado</label>
                    </div>
                    <br>
                    <input class="btn btn-danger form-control" type="submit" value="Crear actividad" name="crear">
                    <br>

                </form>
            </div>
        </div>
    </div>


    </form>
</body>

</html>