<?php
//entrada a la aplicacion

//se va usar la session de la conexion
session_start();

include './Functions/Authentication.php';

if (!IsAuthenticated()){
    //header apunta al Register_Controller
	header('Location:./Controllers/Login_Controller.php');
}else{
    header('Location:./Controllers/Carpeta_Controller.php');
}


?>
