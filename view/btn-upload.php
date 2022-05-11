<?php

session_start();
//$_SESSION["email_usu"]=$correo;

if(isset($_SESSION["email_usu"])){
    header("Location:subir.actividad.php");
}else{
    header("Location:login.html");
} 

