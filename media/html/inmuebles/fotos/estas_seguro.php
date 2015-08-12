		<a name="top"></a>
		<div class="breadcrumbs_publico"><img src="<?php echo  $_SESSION['rutaimg'];?>flecha1.png" align="absmiddle" />&nbsp;<a href="<?php echo  URL_EMPRESA; ?>"><?php echo  NOMBRE_EMPRESA; ?></a>&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="<?php echo $_SESSION['rutaraiz']; ?>/app/acceso/index.php">Acceso</a>&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="../index.php">Inmuebles</a>&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="../editar.php?id=<?php echo  $_GET['id']; ?>">Editar</a>&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<span class="sin_enlace">Borrar fotografía</span></div>
        <p align="justify" class="titulo_seccion">Inmuebles</p>				
		<p  align="justify"><img src="<?php echo  $_SESSION['rutaimg'];?>pregunta.gif" align="absmiddle">&nbsp;&nbsp;&iquest;Est&aacute;s seguro de que deseas eliminar la fotografía seleccionada?</p>
		<p align="center"><img align="absmiddle" src="<?php echo $_SESSION['rutaimg']; ?>si.png">&nbsp;<a href="borrar.php?fichero=<?php echo $_GET['fichero']; ?>&id=<?php echo $_GET['id']; ?>">Si</a>&nbsp;&nbsp;&nbsp;&nbsp;<img align="absmiddle" src="<?php echo $_SESSION['rutaimg']; ?>no.png">&nbsp;<a href="../editar.php?id=<?php echo $_GET['id']; ?>">No</a></p>
		<?php
		if($num_carteles_obtenidos!=0)
		{
		?>
		<p  align="justify">
			<img src="<?php echo  $_SESSION['rutaimg'];?>info.gif" align="absmiddle">&nbsp;&nbsp;
			La imagen seleccionada está asociada a un cartel del inmueble actual
		</p>
		<?php
		}
		?>
		<!--  Navegacion -->
		<p align="right">
			<a href="<?php echo  enlace_volver_general(); ?>"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>volver.gif" align="absmiddle"></a>&nbsp;&nbsp;<a href="<?php echo  enlace_volver_general(); ?>">Volver</a>
			&nbsp;&nbsp;&nbsp;
			<a href="#top" title="Subir"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>subir.png"></a>&nbsp;&nbsp;<a href="#top" title="Subir">Subir</a>
		</p>
