
<?php

class CarpetaRaiz{


	function __construct($carpetas, $carpetas2, $ficheros, $ficheros2){ 
		$this->render( $carpetas, $carpetas2, $ficheros, $ficheros2);
	}

	function render($carpetas, $carpetas2, $ficheros, $ficheros2){

		include '../Views/Header.php'; //header necesita los strings
	?>

<body>
<div>
                <div class="row contenedor-ruta">
                    <div class="col-sm-2">
                        <a href="#" class="nuevo">Nuevo</a>
                    </div>
                    <div class="col-sm-10">

                        <a href="#" class="ruta">Mi Unidad</a><span class="fas fa-chevron-right ruta2"></span><a href="#" class="ruta">4 Informatica</a>
                    </div>
                    
                </div>
            </div>

            <div class="contenedor-carpeta">
                <div class="row">
                        <div class="col-sm-2">
                            <div class="row fila-opcion">
                                <i class="fas fa-boxes icono-opcion"></i>
                                <a href="#" class="opcion">Mi unidad</a>
                            </div>
                            <div class="row fila-opcion">
                                <i class="fas fa-share-alt-square icono-opcion"></i>
                                <a href="#" class="opcion">Compartido conmigo</a>
                            </div>
                            <div class="row fila-opcion">
                                <i class="fas fa-star icono-opcion"></i>
                                <a href="#" class="opcion">Destacado</a>
                            </div>
                            <div class="row fila-opcion">
                                <i class="fas fa-trash icono-opcion"></i>
                                <a href="#" class="opcion">Papelera</a>
                            </div>
                        </div>
<?php                   
                        $row2 = $carpetas2->fetch_array();
                        if(!sizeof($row2) == 0){
?>
                        <div class="col-sm-10">
                        <div class="row">
                            <h5 class="tipo-archivo">Carpetas</h5>
                        </div>
                        <div class="row">
<?php
                        }
                        else{
?>
                        <div class="col-sm-10">
                        <div class="row">
                            <h5 class="tipo-archivo">No hay Archivos</h5>
                        </div>
                        <div class="row">
<?php
                        }
                        while($row = $carpetas->fetch_array()){ //Para cada contrato dentro de cada centro
?>                      
                                <div class="card carpeta" style="width: 15rem; margin-right: 25px;">
                                    <a href="../Controllers/Carpeta_Controller.php?action=Showall&idCarpetaPadre=<?php echo $row['uid']?>">
                                        <div class="card-body">
                                            <div class="row">
                                                <i class="fas fa-folder icono-imagen"></i>
                                                <p class="texto-tarjeta"><?php echo $row['nombre']?></p>
                                            </div>
                                        </div>
                                    </a>    
                                </div>
<?php
                        } //Fin while contratos dentro de cada centro
                 
                        $row4 = $ficheros2->fetch_array();
                        if(!sizeof($row2) == 0){
?>
                        <div class="col-sm-10">
                        <div class="row">
                            <h5 class="tipo-archivo">Ficheros</h5>
                        </div>
                        <div class="row">
<?php
                        }
                        else{
?>
                        <div class="col-sm-10">
                        <div class="row">
                            <h5 class="tipo-archivo">No hay Ficheros</h5>
                        </div>
                        <div class="row">
<?php
                        }
                        while($row3 = $ficheros->fetch_array()){ //Para cada contrato dentro de cada centro
?>                      
                                <div class="card" style="width: 15rem; margin-right: 25px;">
                                            <div class="img-caja">
                                                <span class="fas fa-file-pdf pdf"></span>
                                            </div>
                                            <div class="card-body caja-nombre-archivo">
                                                <h6 class="card-title"><?php echo $row3['nombre']?></h6>
                                            </div>
                                </div>
<?php
                        } //Fin while contratos dentro de cada centro
?>
                               
</body>
	<?php
		include '../Views/Footer.php';
	} //fin metodo render

} //fin REGISTER

?>
