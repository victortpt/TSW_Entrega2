<!--
Documento php que contiene el código php que permite desconectarse de la aplicación
Pablo Pazos Domínguez, Alias:3w68x9
02/10/2018
-->
<?php
session_start();
session_destroy();
header('Location:../index.php');

?>
