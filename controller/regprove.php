<?php
session_start();
include '../modelo/consulSQL.php';

sleep(5);
$nitProve= $_POST['prove-nit'];
$nameProve= $_POST['prove-name'];

$telProve= $_POST['prove-tel'];
$webProve= $_POST['prove-web'];

if(!$nitProve=="" && !$nameProve=="" && !$telProve=="" && !$webProve==""){
    $verificar=  ejecutarSQL::consultar("select * from proveedor where NIT='".$nitProve."'");

    $verificaltotal = mysqli_num_rows($verificar);
    if($verificaltotal<=0){
        if(consultasSQL::InsertSQL("proveedor", "NIT, Nombre,  Telefono, SitioWeb", "'$nitProve','$nameProve','$telProve','$webProve'")){
             
            echo '<img src="assets/img/correcto.png" class="center-all-contens"><br><p class="lead text-center">Proveedor añadido éxitosamente</p>';
        }else{
           echo '<img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">Ha ocurrido un error.<br>Por favor intente nuevamente</p>'; 
        }
    }else{
        echo '<img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">El número de NIT que ha ingresado ya existe.<br>Por favor ingrese otro número de NIT</p>';
    }
}else {
    echo '<img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">Error los campos no deben de estar vacíos</p>';
}
