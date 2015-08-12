		<a name="top"></a>
		<div class="breadcrumbs_publico"><img src="<?php echo  $_SESSION['rutaimg'];?>flecha1.png" align="absmiddle" />&nbsp;<a href="<?php echo  URL_EMPRESA; ?>"><?php echo  NOMBRE_EMPRESA; ?></a>&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="<?php echo $_SESSION['rutaraiz']; ?>/app/acceso/index.php">Acceso</a>&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="index.php">Inmuebles</a>&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<span class="sin_enlace">Insertar</span></div>
		<p align="justify" class="titulo_seccion">Inmuebles</p>
		<?php
			// Control de errores
			if ($_POST)
			{
				if($_SESSION['hayerroresinsertarinmueble'])
				{
		?>
					<div class="titulo_errores"><strong>Informe de errores</strong> &nbsp;| &nbsp;<?php echo  count($_SESSION['erroresinsertarinmueble']); ?> error(es) encontrado(s)</div>
					<div class="detalle_errores">
					<ul class="lista_errores">
		<?php
					foreach($_SESSION['erroresinsertarinmueble'] as $error)
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
		<form action="" name="insertar_inmueble" id="insertar_inmueble" method="post" enctype="multipart/form-data">
		<?php include('form_inmueble.php'); ?>
		</form>
		<p align="center">
			<a href="<?php echo obtenerURLactual();?>" onclick="document.getElementById('insertar_inmueble').submit();return false"><img src="<?php echo  $_SESSION['rutaimg'];?>insertar.gif" border="0" align="absmiddle" /></a>&nbsp;&nbsp;
			<a href="<?php echo obtenerURLactual();?>" onclick="document.getElementById('insertar_inmueble').submit();return false">Insertar en BD</a>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="<?php echo obtenerURLactual();?>" onclick="document.getElementById('insertar_inmueble').reset();"><img src="<?php echo  $_SESSION['rutaimg'];?>no.png" border="0" align="absmiddle" /></a>&nbsp;&nbsp;
			<a href="<?php echo obtenerURLactual();?>" onclick="document.getElementById('insertar_inmueble').reset();">Limpiar todo</a>			
        </p>
		<!--  Navegacion -->	
		<p align="right">
			<a href="index.php"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>volver.gif" align="absmiddle"></a>&nbsp;&nbsp;<a href="index.php">Volver</a>
			&nbsp;&nbsp;&nbsp;
			<a href="#top" title="Subir"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>subir.png"></a>&nbsp;&nbsp;<a href="#top" title="Subir">Subir</a>
		</p>