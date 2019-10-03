<?php  

        include '../Functions/Authentication.php';
        include '../Views/CarpetaRaiz_View.php';
        include '../Models/CARPETAS_model.php';
        include '../Models/FICHEROS_Model.php';

        session_start();
        if(!IsAuthenticated()){
            echo "No estas autenticado";
        }else{
            if(isset($_GET['logout'])){
                include '../Functions/Desconectar.php';
            }else{
                switch($_REQUEST['action']){
 
                    case 'ShowallRaiz':
                            $carpetas; //almacena los datos
                            $ficheros;

                            $CARPETA = new CARPETAS_Model('', '', 'NULL', '', $_SESSION['login']);
                            
                            $FICHERO = new FICHEROS_Model('', '', '', '', 'NULL', $_SESSION['login']); 

                            $carpetas = $CARPETA->RellenaDatos(); //Variable que guarda todas las tuplas de una tabla
                            
                            
                            $carpetas2 = $CARPETA->RellenaDatos();


                            $ficheros = $FICHERO->RellenaDatos(); //Variable que guarda todas las tuplas de una tabla
                            $ficheros2 = $FICHERO->RellenaDatos();
                            

                            new CarpetaRaiz($carpetas, $carpetas2, $ficheros, $ficheros2); //Crea el showall con los datos a mostrar
                        
				

                break;
                case 'Showall':
                            $carpetas; //almacena los datos
                            $ficheros;

                            $CARPETA = new CARPETAS_Model('', '', $_GET['idCarpetaPadre'], '', $_SESSION['login']);
                            
                            $FICHERO = new FICHEROS_Model('', '', '', '', $_GET['idCarpetaPadre'], $_SESSION['login']); 

                            $carpetas = $CARPETA->RellenaDatos(); //Variable que guarda todas las tuplas de una tabla
                            

                            $carpetas2 = $CARPETA->RellenaDatos();
                            
                            $ficheros = $FICHERO->RellenaDatos(); //Variable que guarda todas las tuplas de una tabla
                            $ficheros2 = $FICHERO->RellenaDatos();
                            

                            new CarpetaRaiz( $carpetas, $carpetas2, $ficheros, $ficheros2); //Crea el showall con los datos a mostrar
                        
				

				break;

                }

            }
        }
    
		
?>




