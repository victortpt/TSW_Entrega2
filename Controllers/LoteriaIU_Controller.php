<!--
Documento php que contiene las funcionalidades de todos los formularios y de las vistas de estos
Pablo Pazos Domínguez, Alias:3w68x9
02/10/2018
-->
<?php
//session
session_start();
//incluir funcion autenticacion
include '../Functions/Authentication.php';
//si no esta autenticado
if (!IsAuthenticated()){
	header('Location: ../index.php');
}
//esta autenticado
else{
	//si no hay acción utilizamos la default
	if(!isset($_GET['action'])){
		$action ='';
	}
	else{
		$action = $_GET['action'];//si no la definimod con el get
	}

	switch ($action){//switch que difencia entre los distintos tipos de vistas según la acción
    case 'add'://caso añadir
        if(!$_POST){
			include '../Views/Form/ADD_View.php';
			$add = new Add();
		}
		else{
			
			$file_name = $_FILES['file']['name'];
		    $file_type = $_FILES['file']['type'];
		    $file_size = $_FILES['file']['size'];
		    $file_tem_Loc = $_FILES['file']['tmp_name'];
		    $file_store = "../Files/Boletos/".$file_name;
		    move_uploaded_file($file_tem_Loc, $file_store);

			include '../Models/LOTERIAS_Model.php';
			$boleto = new LOTERIAS_Model($_POST['email'],$_POST['nombre'],$_POST['apellidos'],$_POST['participacion'],$file_store,$_POST['ingresado'],'','No');
			$respuesta = $boleto->Register();

			if ($respuesta == 'true'){
				$respuesta = $boleto->ADD();
				Include '../Views/MESSAGE_View.php';
				new MESSAGE($respuesta, '../Controllers/LoteriaIU_Controller.php');
			}
			else{
				include '../View/MESSAGE_View.php';
				new MESSAGE($respuesta, '../Controllers/LoteriaIU_Controller.php');
			}

		}
        break;
    case 'delete'://caso eliminar
       include '../Models/LOTERIAS_Model.php';
		
		
		if(!isset($_GET['borrado'])){
			include '../Views/Form/Delete_View.php';
			$MUESTRA = new LOTERIAS_Model($_GET['email'],'','','','','','','');
			$valores = $MUESTRA->RellenaDatos();
			new Delete($valores);
		}
		else{
			unlink( $_GET['resguardo']);
			$EDIT = new LOTERIAS_Model($_GET['email'],'','','','','','','');
			$respuesta = $EDIT->DELETE();


			if ($respuesta == 'Error en la inserción'){
				Include '../Views/MESSAGE_View.php';
				new MESSAGE($respuesta, './LoteriaIU_Controller.php');
			}
			else{
				include '../Views/MESSAGE_View.php';
				new MESSAGE($respuesta, './LoteriaIU_Controller.php');
			}	
		}
        break;
    case 'edit'://caso editar
		include '../Models/LOTERIAS_Model.php';
		if(isset($_GET['email'])){	
			include '../Views/Form/Edit_View.php';
			$MUESTRA = new LOTERIAS_Model($_GET['email'],'','','','','','','');

			$valores = $MUESTRA->RellenaDatos();
			$edit = new Edit($valores);
		}else{

			$x = $_GET['resguardo'];
			$file_name = $_FILES['file']['name'];
		    $file_type = $_FILES['file']['type'];
		    $file_size = $_FILES['file']['size'];
		    $file_tem_Loc = $_FILES['file']['tmp_name'];
		    $file_store = "../Files/Boletos/".$file_name;
		     if($file_size != 0){
		    	unlink($x);
		    }else{
		    	$file_store = $x;
		    }
		    move_uploaded_file($file_tem_Loc, $file_store);
			$boleto = new LOTERIAS_Model($_POST['email'],$_POST['nombre'],$_POST['apellidos'],$_POST['participacion'],$file_store,$_POST['ingresado'],$_POST['premiopersonal'],$_POST['pagado']);
			$respuesta = $boleto->EDIT();
			if ($respuesta == 'Error en la inserción'){
				Include '../Views/MESSAGE_View.php';
				new MESSAGE($respuesta, './LoteriaIU_Controller.php?accion=edit&email='.$_POST['email']);
			}
			else{
				include '../Views/MESSAGE_View.php';
				new MESSAGE($respuesta, './LoteriaIU_Controller.php');
			}
		}
    	break;
    case 'showcurrent'://caso ver una tupla concreta
    	include '../Models/LOTERIAS_Model.php';
		if(isset($_GET['email'])){	
			include '../Views/Form/Showcurrent_View.php';
			$MUESTRA = new LOTERIAS_Model($_GET['email'],'','','','','','','');

			$valores = $MUESTRA->RellenaDatos();
			$edit = new Showcurrent($valores);
		}
		break;
	case 'search'://caso buscar
		if(!isset($_POST['email']) && !isset($_POST['nombre']) && !isset($_POST['apellidos']) && !isset($_POST['participacion']) && !isset($_POST['resguardo']) && !isset($_POST['ingresado']) && !isset($_POST['premiopersonal']) && !isset($_POST['pagado']) ){
			include '../Views/Form/Search_View.php';
			new Search();
		}
		else{		
			include '../Models/LOTERIAS_Model.php';
			include '../Views/Form/Showall_View.php';
			$boleto = new LOTERIAS_Model($_POST['email'],$_POST['nombre'],$_POST['apellidos'],$_POST['participacion'],$_POST['resguardo'],$_POST['ingresado'],$_POST['premiopersonal'],$_POST['pagado']);
			$todas = $boleto->Search();
			$valores = $boleto->Search();
			$max = 0;
			while($datos=$todas->fetch_array()){
				$max = $max + 1;
			}
			if($max != 0){
				$edit = new Showall($valores);
			}
			else{
				Include '../Views/MESSAGE_View.php';
				new MESSAGE('No existen participaciones con estas especificaciones','../Controllers/LoteriaIU_Controller.php?action=search');
			}
		}
		break;
    default://caso predefinido que es el de mostrar todas las participaciones
        include '../Models/LOTERIAS_Model.php';
		include '../Views/Form/Showall_View.php';
		$EDIT = new LOTERIAS_Model('','','','','','','','');

		$todas = $EDIT->SHOWALL();
		$valores = $EDIT->SHOWALL();
		$max = 0;
		while($datos=$todas->fetch_array()){
			$max = $max + 1;
		}
		if($max != 0){
			$edit = new Showall($valores);
		}
		else{
			Include '../Views/MESSAGE_View.php';
			new MESSAGE('No existen participaciones','../Controllers/LoteriaIU_Controller.php?action=add');
		}
        break;
	}

}

?>