<?php

session_start();
//$_SESSION["email_usu"]=$correo;

if(isset($_SESSION["email_usu"])){
    header("Location:subir.actividad.html");
}else{
    header("Location:login.html");
} 

