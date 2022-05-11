<?php
session_start();
$connection = mysqli_connect('localhost', 'root', '', 'bd_actividades');
/* $sql = "SELECT * FROM tbl_like WHERE actividad_fk={$_GET['id']};";
$listadodept= mysqli_query($connection, $sql); */
$likes=1;
$idact=$_GET['id'];
$correo_act=$_SESSION['email_usu'];
/* echo $correo_act; */
$sql2 = "SELECT id FROM `tbl_usuarios` WHERE `email_usuario`='{$correo_act}'";

$sql3="SELECT likes FROM tbl_like WHERE actividad_fk='{$_GET['id']}';";
$likesquehay= mysqli_query($connection, $sql3);
/* echo $likesquehay; */
/* $sql2="SELECT * FROM `tbl_usuarios` WHERE `email_usuario` LIKE {$correo_act}" */
/* echo $sql2; */
$idusuario= mysqli_query($connection, $sql2);
$row = mysqli_fetch_array($idusuario);
/* print_r($row); */
$idusuario2 = $row[0];

$row2 = mysqli_fetch_array($likesquehay);
/* print_r($row2); */
$likesquehay2=$row2[0];
/* echo $likesquehay2; */
/* echo $idusuario2; */
/* $comprobar= "SELECT usuario_fk FROM tbl_like;";
$cons = mysqli_query($connection,$comprobar);
$lista_emails=array();

while ($fila = mysqli_fetch_assoc($cons)){
    $lista_emails[]=$fila['correo_contacto']; 
} */
/* if(empty($likesquehay)){

        
        
        
    
} */
if(!empty($likesquehay)){
    $likessum=$likesquehay2+1;
    $sql5 = "UPDATE `tbl_like` SET `likes` = '$likessum' WHERE actividad_fk='{$_GET['id']}';";
    $listadodept2= mysqli_query($connection, $sql5);
    echo $sql5;

    /* echo '<script type="text/javascript">';
    echo "muestra({$_GET['id']});";
    echo '</script>'; */
    echo "<script>";
    echo "muestra({$_GET['id']});";
    echo "</script>";
    ?>
    <script src="url.js"></script>
    <?php
    /* header("Location:actividades.php"); */
    
}else{
    $sql4 = "INSERT INTO `tbl_like` (`usuario_fk`, `actividad_fk`, `likes`) VALUES ('$idusuario2', '$idact', '$likes')";
        
    $listadodept2= mysqli_query($connection, $sql4);

    echo $sql4;
    
}
