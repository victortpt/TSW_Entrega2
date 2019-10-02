<!--
Documento php que contiene el código php que permite saber si el usuario esta logeado
Pablo Pazos Domínguez, Alias:3w68x9
02/10/2018
-->
<?php
function IsAuthenticated(){
	if (!isset($_SESSION['login'])){
		//header('Location:USUARIOS_Controller.php?accion=Login');	
		return false;
	}
	else{
		if (isset($_SESSION['login'])) //HavePermissions($controller, $_REQUEST['accion']) deberia ir en el if
		//new Mensaje('No tiene permisos para ejecutar esta acción','index.php');	
		
		//header('Location:USUARIOS_Controller.php');
		return true;
	}
} //end of function IsAuthenticated()
?>

