		<a name="top"></a>
		<div class="breadcrumbs_publico"><img src="<?php echo  $_SESSION['rutaimg'];?>flecha1.png" align="absmiddle" />&nbsp;<a href="<?php echo  URL_EMPRESA; ?>"><?php echo  NOMBRE_EMPRESA; ?></a>&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="<?php echo $_SESSION['rutaraiz']; ?>/app/acceso/index.php">Acceso</a>&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="../index.php">Inmuebles</a>&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="../editar.php?id=<?php echo  $_GET['id']; ?>">Editar</a>&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<span class="sin_enlace">Insertar enlace</span></div>
        <p align="justify" class="titulo_seccion">Inmuebles</p>	
		<?php
			// Control de errores
			if ($_POST)
			{
				if($_SESSION['hayerroreseditarenlaces'])
				{
		?>
					<div class="titulo_errores"><strong>Informe de errores</strong> &nbsp;| &nbsp;<?php echo  count($_SESSION['erroreseditarenlaces']); ?> error(es) encontrado(s)</div>
					<div class="detalle_errores">
					<ul class="lista_errores">
		<?php
					foreach($_SESSION['erroreseditarenlaces'] as $error)
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
		<?php include('form_enlace.php'); ?>
		<input type="hidden" name="inmueble" value="<?php echo  $_GET['id']; ?>"  />
		<input type="hidden" name="id_enlace" value="<?php echo  $_GET['id_enlace']; ?>"  />		
		<br clear="all" />
		<p align="center">
        	<input type="image" style="vertical-align:middle" id="boton_editar_bd" name="boton_seleccionar" src="<?php echo  $_SESSION['rutaimg'];?>editar.gif" onmouseover="document.getElementById('boton_editar_bd').src='<?php echo  $_SESSION['rutaimg'];?>editar.gif'" onmouseout="document.getElementById('boton_editar_bd').src='<?php echo  $_SESSION['rutaimg'];?>editar.gif'" />&nbsp;&nbsp;Actualizar en BD
        </p>
		</form>	
		<!--  Navegacion -->
		<p align="right">
			<a href="<?php echo  enlace_volver_general(); ?>"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>volver.gif" align="absmiddle"></a>&nbsp;&nbsp;<a href="<?php echo  enlace_volver_general(); ?>">Volver</a>
		</p>