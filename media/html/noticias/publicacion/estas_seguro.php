		<a name="top"></a>
		<div class="breadcrumbs_publico"><img src="<?php echo  $_SESSION['rutaimg'];?>flecha1.png" align="absmiddle" />&nbsp;<a href="<?php echo  URL_EMPRESA; ?>"><?php echo  NOMBRE_EMPRESA; ?></a>&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="<?php echo $_SESSION['rutaraiz']; ?>/app/acceso/index.php">Acceso</a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="../index.php">Noticias</a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="index.php">Publicaci�n de Noticias</a>&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<span class="sin_enlace">Borrar noticia</span></div>
        <p align="justify" class="titulo_seccion">Publicaci�n de Noticias</p>
		<p align="justify"><img align="absmiddle" src="<?php echo $_SESSION['rutaimg']; ?>pregunta.gif">
			&nbsp;�Est�s seguro de que deseas eliminar la noticia seleccionada?
		</p>
		<p align="center"><img align="absmiddle" src="<?php echo $_SESSION['rutaimg']; ?>si.png">&nbsp;<a href="borrar.php?id=<?php echo $_GET['id']; ?>">Si</a>&nbsp;&nbsp;&nbsp;&nbsp;<img align="absmiddle" src="<?php echo $_SESSION['rutaimg']; ?>no.png">&nbsp;<a href="index.php">No</a></p>
		<!--  Navegacion -->	
		<p align="right">
			<a href="index.php"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>volver.gif" align="absmiddle"></a>&nbsp;&nbsp;<a href="index.php">Volver</a>
			&nbsp;&nbsp;&nbsp;
			<a href="#top" title="Subir"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>subir.png"></a>&nbsp;&nbsp;<a href="#top" title="Subir">Subir</a>
		</p>