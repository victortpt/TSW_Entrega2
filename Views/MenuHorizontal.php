<!--
Documento php que contiene el código php de la vista del menú horizontal
Pablo Pazos Domínguez, Alias:3w68x9
02/10/2018
-->
	<nav class="navegacion">
		<ul class="menu">
			<li><a href="../Controllers/LoteriaIU_Controller.php"><?php echo $strings['Todas las Participaciones'];?></a></li>
			<li><a href="#"><?php echo $strings['Acerca de nosotros'];?></a></li>
			<li><a href="#"><?php echo $strings['Empresa'];?></a>
				<ul class="submenu">
					<li><a href="#"><?php echo $strings['Empresa'];?>2.1</a></li>
					<li><a href="#"><?php echo $strings['Empresa'];?>2.2</a></li>
					<li><a href="#"><?php echo $strings['Empresa'];?>2.3</a></li>
				</ul>
			</li>
			<li><a href="#"><?php echo $strings['Foro'];?></a>
				<ul class="submenu">
					<li><a href="#"><?php echo $strings['Foro'];?> 2.1</a></li>
					<li><a href="#"><?php echo $strings['Foro'];?> 2.2</a></li>
					<li><a href="#"><?php echo $strings['Foro'];?> 2.3</a></li>
				</ul>
			</li>
		</ul>		
	</nav>				
	
