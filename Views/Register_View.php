	<!--
Documento php que contiene la clase para la vista de registrarse.
Pablo Pazos Domínguez, Alias:3w68x9
02/10/2018
-->
	<div id="caja">
		<?php

		class Register{


			function __construct(){	
				$this->render();
			}

			function render(){

				include '../Views/Header.php'; //header necesita los strings
		?>
		<script type="text/javascript" src="../Views/Javascript/md5.js"></script> 
		<script type="text/javascript">
	    function encriptar(){
	      document.getElementById('password').value = hex_md5(document.getElementById('password').value);
	      return true;
	    }
	</script>
	 	<section class="section_formulario">	
	 		
	 		
			<form name = 'form2' id="form2" action='../Controllers/Register_Controller.php' enctype="multipart/form-data" method='post' onsubmit="return validarRegister(this); return encriptar();">
				<fieldset>
					<legend><?php echo $strings['Registro'];?></legend>
				</fieldset>
					
				 	<input type = 'text' name = 'login' id = 'login' placeholder = 'DNI*' size = '9'  maxlength="9" onblur="comprobarDni(this);" >
				 	<label><?php echo $strings['Sube una foto personal'];?>*</label>
					<input type="file" name="file" id="fileToUpload">
					<input type="password" id="password" name="password" placeholder="<?php echo $strings['Contraseña'];?>*" maxlength="20" size="34" onblur="comprobarTexto( this, 20 );">
					<input type="text" id="nombre" name="nombre"  maxlength="30" size="37" placeholder="<?php echo $strings['Nombre'];?>*" onblur=" comprobarAlfabetico(this,30);">
					<input type="text" id="apellidos" name="apellidos" placeholder="<?php echo $strings['Apellidos'];?>*" maxlength="50" size="74" onblur="comprobarAlfabetico(this,50);">
					<input type="text" name="telefono" id="telefono" placeholder="<?php echo $strings['Teléfono'];?>*" maxlength="11" size="30" onblur="comprobarTelf(this);">
					<label><?php echo $strings['Sexo'];?>*</label>
					<select name="sexo">
						<option value="hombre"><?php echo $strings['Hombre'];?></option>
						<option value="mujer"><?php echo $strings['Mujer'];?></option>
					</select>
					<input type="email" id="email" name="email" placeholder="<?php echo $strings['Email'];?>*" maxlength="60" size="78" onblur="comprobarExpresionRegular(this, /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i, 60);">
					<input type="text" id="fecha" class="tcal tcalInput" name="fecha" placeholder="<?php echo $strings['Fecha de Nacimiento'];?>*" readonly>

					<button type="submit"  class="button"><span class="fas fa-check"></span></button>
					<a class="button2" href="../Controllers/Login_Controller.php"><i class="fas fa-undo" ></i></a>
			</form>		
			
		</section>
	
</div> 			
		<?php
			include '../Views/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

