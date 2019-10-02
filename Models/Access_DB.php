<!--
Documento php que contiene el código php que permite la conexión con la base de datos
Pablo Pazos Domínguez, Alias:3w68x9
02/10/2018
-->
<?php
function ConnectDB()
{
    $mysqli = new mysqli("localhost", "root", "" , "DRAIFDB");
    	
	if ($mysqli->connect_errno) {
		include '../View/MESSAGE_View.php';
		new MESSAGE("Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error, './index.php');
		return false;
	}
	else{
		return $mysqli;
	}
}

?>
