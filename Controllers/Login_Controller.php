<?php
	session_start();
		include '../Views/MESSAGE_View.php';
		if(isset($_GET['reject'])){
			//new MESSAGE('Aun no te ha registrado el administrador', './Login_Controller.php');	
		}
		else{
			if(!isset($_REQUEST['login']) && !(isset($_REQUEST['password']))){
				include '../Views/Login_View.php';
				$login = new Login();
			}
			else{
				include '../Models/Access_DB.php';
				include '../Models/USUARIOS_Model.php';
                $usuario = new USUARIOS_Model($_REQUEST['login'],$_REQUEST['password'],'','','','');
                $respuesta = $usuario->login();

				if ($respuesta == 'true'){
                        $_SESSION['login'] = $_REQUEST['login'];
					header('Location:../index.php');
				}
				else{	
					echo "No va";
				}

			}
		}
?>

