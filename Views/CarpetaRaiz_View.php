
<?php

class CarpetaRaiz{


	function __construct(){ 
		$this->render();
	}

	function render(){

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
                        <div class="col-sm-10">
                            <div class="row">
                                <h5 class="tipo-archivo">Carpetas</h5>
                            </div>
                            <div class="row">
                                <div class="card carpeta" style="width: 15rem; margin-right: 25px;">
                                        <div class="card-body">
                                                <div class="row">
                                                    <i class="fas fa-folder icono-imagen"></i>
                                                    <p class="texto-tarjeta">TSW</p>
                                                </div>
                                        </div>
                                </div>
                                <div class="card carpeta" style="width: 15rem; margin-right: 25px;">
                                        <div class="card-body">
                                                <div class="row">
                                                    <span class="fas fa-folder icono-imagen"></span>
                                                    <p class="texto-tarjeta">ABP</p>
                                                </div>
                                        </div>
                                </div>
                                <div class="card carpeta" style="width: 15rem; margin-right: 25px;">
                                        <div class="card-body cuerpo-tarjeta">
                                            <div class="row">
                                                <i class="fas fa-folder icono-imagen"></i>
                                                <p class="texto-tarjeta">Dispositivos móviles</p>
                                            </div>
                                        </div>
                                </div>      
                            </div>
                                <h5 class="tipo-archivo">Archivos</h5>
                            <div>
                            <div class="row">
                                    <div class="card" style="width: 15rem; margin-right: 25px;">
                                            <div class="img-caja">
                                                <span class="fas fa-file-pdf pdf"></span>
                                            </div>
                                            <div class="card-body caja-nombre-archivo">
                                                <h6 class="card-title">archivo.xlsx</h6>
                                            </div>
                                    </div>
                                    <div class="card" style="width: 15rem; margin-right: 25px;">
                                            <div class="img-caja">
                                                <span class="fas fa-file-word pdf"></span>
                                            </div>
                                            <div class="card-body caja-nombre-archivo">
                                                <h6 class="card-title">prueba.pdf</h6>
                                            </div>
                                    </div>
                                    <div class="card" style="width: 15rem; margin-right: 25px;">
                                            <div class="img-caja">
                                                <span class="fas fa-file-image pdf"></span>
                                            </div>
                                            <div class="card-body caja-nombre-archivo">
                                                <h6 class="card-title">imagen.jpg</h6>
                                            </div>
                                    </div>      
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
</body>
	<?php
		include '../Views/Footer.php';
	} //fin metodo render

} //fin REGISTER

?>
