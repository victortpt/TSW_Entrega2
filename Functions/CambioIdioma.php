<!--
Documento php que contiene el código php que permite cambiar el idioma
Pablo Pazos Domínguez, Alias:3w68x9
02/10/2018
-->
<?php
session_start();
$idioma = $_POST['idioma'];
$_SESSION['idioma'] = $idioma;
header('Location:' . $_SERVER["HTTP_REFERER"]);
?>