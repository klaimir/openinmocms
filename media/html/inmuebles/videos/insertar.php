		<a name="top"></a>
		<div class="breadcrumbs_publico"><img src="<?php echo  $_SESSION['rutaimg'];?>flecha1.png" align="absmiddle" />&nbsp;<a href="<?php echo  URL_EMPRESA; ?>"><?php echo  NOMBRE_EMPRESA; ?></a>&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="<?php echo $_SESSION['rutaraiz']; ?>/app/acceso/index.php">Acceso</a>&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="../index.php">Inmuebles</a>&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="../editar.php?id=<?php echo  $_GET['id']; ?>">Editar</a>&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<span class="sin_enlace">Asignar video</span></div>
        <p align="justify" class="titulo_seccion">Inmuebles</p>	
		<?php
			// Control de errores
			if ($_POST)
			{
				if($_SESSION['hayerroresasignarvideos'])
				{
		?>
					<div class="titulo_errores"><strong>Informe de errores</strong> &nbsp;| &nbsp;<?php echo  count($_SESSION['erroresasignarvideos']); ?> error(es) encontrado(s)</div>
					<div class="detalle_errores">
					<ul class="lista_errores">
		<?php
					foreach($_SESSION['erroresasignarvideos'] as $error)
					{
		?>		
						<li><?php echo  $error; ?></li>
		<?php
					}
		?>
					</ul>
					</div>
					<br />
		<?php
				}
			}
		?>               
		<form action="" name="formulario" id="formulario" method="post" enctype="multipart/form-data">
		<!-- Fichero -->
		<span style="text-align:right">Fichero (<?php echo  MAXTAM_VIDEOS;?>Mb. MAX.) (*): </span>
		<input class="campo_texto" type="file" id="fichero" name="fichero" size="55px" title="Fichero (<?php echo  MAXTAM_VIDEOS;?>Mb. MAX.)" onchange="modificado=true">
		<br />
		<p align="center">
        	<input type="image" style="vertical-align:middle" id="boton_insertar_bd" name="boton_seleccionar" src="<?php echo  $_SESSION['rutaimg'];?>insertar.gif" onmouseover="document.getElementById('boton_insertar_bd').src='<?php echo  $_SESSION['rutaimg'];?>insertar.gif'" onmouseout="document.getElementById('boton_insertar_bd').src='<?php echo  $_SESSION['rutaimg'];?>insertar.gif'" />&nbsp;&nbsp;Insertar en BD
        </p>
		</form>	
		<!--  Navegacion -->
		<p align="right">
			<a href="<?php echo  enlace_volver_general(); ?>"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>volver.gif" align="absmiddle"></a>&nbsp;&nbsp;<a href="<?php echo  enlace_volver_general(); ?>">Volver</a>
		</p>