	<!--
Documento php que contiene la clase para la vista de mensajes.
Pablo Pazos Domínguez, Alias:3w68x9
02/10/2018
-->
<div id="caja">	
<?php

class MESSAGE{

	private $string; 
	private $volver;

	function __construct($string, $volver){
		$this->string = $string;
		$this->volver = $volver;	
		$this->render();
	}
	function render(){

		include '../Locales/Strings_'.$_SESSION['idioma'].'.php';
		include '../Views/Header.php';
?>
		<section>
			<form class="section_formulario">
				<fieldset>
					<legend><?php echo $strings['Mensaje del sistema'];?></legend>
					<br>
					<br>
					<label><?php echo $strings[$this->string];?></label>
					<?php 
					if($this->string == 'No existen participaciones'){
						echo '<a class="button2" href=\'' . $this->volver . "'>".$strings['Añadir Participación']."</a>";
					}else if($this->string == 'No existen participaciones con estas especificaciones'){
						echo '<a class="button2" href=\'' . $this->volver . "'>".$strings['Volver']."</a>";
					}
					else{
						echo '<a class="button2" href=\'' . $this->volver . "'>".$strings['Volver']."</a>";
					}
					
					?>
				</fieldset>

			</form>
		</section>
</div>
		
<?php
		include '../Views/Footer.php';
	} //fin metodo render

}
