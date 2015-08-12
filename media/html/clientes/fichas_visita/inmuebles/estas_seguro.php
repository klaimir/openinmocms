		<a name="top"></a>
		<div class="breadcrumbs_publico">
		<img src="<?php echo  $_SESSION['rutaimg'];?>flecha1.png" align="absmiddle" />&nbsp;<a href="<?php echo  URL_EMPRESA; ?>"><?php echo  NOMBRE_EMPRESA; ?></a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="<?php echo $_SESSION['rutaraiz']; ?>/app/acceso/index.php">Acceso</a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="../../index.php">Clientes</a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="../../editar.php?id=<?php echo  $_GET['id']; ?>">Editar</a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="../index.php?id=<?php echo  $_GET['id']; ?>">Ficha de visita</a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="../editar.php?id=<?php echo  $_GET['id']; ?>&id_ficha_visita=<?php echo  $_GET['ficha_visita']; ?>">Editar</a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<span class="sin_enlace">Borrar inmueble</span>
		</div>
        <p align="justify" class="titulo_seccion">Clientes</p>				
		<p  align="justify"><img src="<?php echo  $_SESSION['rutaimg'];?>pregunta.gif" align="absmiddle">&nbsp;&nbsp;&iquest;Est&aacute;s seguro de que deseas eliminar la asignaci&oacute;n del inmueble seleccionado?</p>
		<p align="center"><img align="absmiddle" src="<?php echo $_SESSION['rutaimg']; ?>si.png">&nbsp;<a href="borrar.php?inmueble=<?php echo $_GET['inmueble']; ?>&id=<?php echo $_GET['id']; ?>&ficha_visita=<?php echo $_GET['ficha_visita']; ?>">Si</a>&nbsp;&nbsp;&nbsp;&nbsp;<img align="absmiddle" src="<?php echo $_SESSION['rutaimg']; ?>no.png">&nbsp;<a href="../editar.php?id=<?php echo $_GET['id']; ?>&id_ficha_visita=<?php echo $_GET['ficha_visita']; ?>">No</a></p>
		<!--  Navegacion -->
		<p align="right">
			<a href="<?php echo  enlace_volver_general(); ?>"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>volver.gif" align="absmiddle"></a>&nbsp;&nbsp;<a href="<?php echo  enlace_volver_general(); ?>">Volver</a>
			&nbsp;&nbsp;&nbsp;
			<a href="#top" title="Subir"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>subir.png"></a>&nbsp;&nbsp;<a href="#top" title="Subir">Subir</a>
		</p>