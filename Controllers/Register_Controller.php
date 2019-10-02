<!--
Documento php que contiene el código php que controla las funcionalidades y el comportamiento de la vista register.
Pablo Pazos Domínguez, Alias:3w68x9
02/10/2018
-->
<?php

session_start();
include_once '../Locales/Strings_'.$_SESSION['idioma'].'.php';
//session_start();
if(!isset($_POST['login'])){
	include '../Views/Register_View.php';
	$register = new Register();
}
else{
	include '../Models/USUARIOS_Model.php';
	$file_name = $_FILES['file']['name'];
    $file_type = $_FILES['file']['type'];
    $file_size = $_FILES['file']['size'];
    $file_tem_Loc = $_FILES['file']['tmp_name'];
    $file_store = "../Files/Usuarios/".$file_name;
    move_uploaded_file($file_tem_Loc, $file_store);
	

	$x = cambiaf_a_mysql ($_POST['fecha']);
	$resultado = str_replace("-", "", $x);
	
	$usuario = new USUARIOS_Model($_POST['login'],$_POST['password'],$_POST['login'],$_POST['nombre'],$_POST['apellidos'],$_POST['telefono'],$_POST['email'],$resultado,$file_store,$_POST['sexo']);
	$respuesta = $usuario->Register();
	
	if ($respuesta == 'true'){
		$respuesta = $usuario->registrar();
		Include '../Views/MESSAGE_View.php';
		new MESSAGE($respuesta, './Login_Controller.php');
	}
	else{
		include '../Views/MESSAGE_View.php';
		new MESSAGE($respuesta, './Login_Controller.php');
	}

}
function  cambiaf_a_mysql ( $fecha ){ 

	$mifecha = explode("/", $fecha);
	$lafecha=$mifecha[2]."-".$mifecha[1]."-".$mifecha[0]; 
	return $lafecha; 
 }  

?>

