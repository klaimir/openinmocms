		<a name="top"></a>
		<div class="breadcrumbs_publico"><img src="<?php echo  $_SESSION['rutaimg'];?>flecha1.png" align="absmiddle" />&nbsp;<a href="<?php echo  URL_EMPRESA; ?>"><?php echo  NOMBRE_EMPRESA; ?></a>&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="<?php echo $_SESSION['rutaraiz']; ?>/app/acceso/index.php">Acceso</a>&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="../index.php">Inmuebles</a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="../editar.php?id=<?php echo  $_GET['id'];?>" onclick="if (modificado==true) { if(confirm('Va a salir sin guardar los datos. &iquest;Desea salir de todas formas?')) return true; else return false; }">Editar</a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?id=<?php echo  $_GET['id'];?>" onclick="if (modificado==true) { if(confirm('Va a salir sin guardar los datos. &iquest;Desea salir de todas formas?')) return true; else return false; }">Adjuntos</a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<span class="sin_enlace">Borrar Adjunto</span></div>
        <p align="justify" class="titulo_seccion">Inmuebles</p>				
		<p  align="justify">
			<img src="<?php echo  $_SESSION['rutaimg'];?>pregunta.gif" align="absmiddle">&nbsp;&nbsp;
			¿Estás seguro de que deseas eliminar el fichero seleccionado?
		</p>
		<p align="center">
			<img align="absmiddle" src="<?php echo $_SESSION['rutaimg']; ?>si.png">&nbsp;
			<a href="borrar.php?id_fichero=<?php echo  $_GET['id_fichero']; ?>&id=<?php echo  $_GET['id']; ?>">Si</a>&nbsp;&nbsp;&nbsp;&nbsp;
			<img align="absmiddle" src="<?php echo $_SESSION['rutaimg']; ?>no.png">&nbsp;
			<a href="index.php?id=<?php echo  $_GET['id']; ?>">No</a>
		</p>
		<!--  Navegacion -->	
		<p align="right">
			<a href="index.php?id=<?php echo  $_GET['id']; ?>"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>volver.gif" align="absmiddle"></a>&nbsp;&nbsp;
			<a href="index.php?id=<?php echo  $_GET['id']; ?>">Volver</a>&nbsp;&nbsp;&nbsp;
			<a href="#top" title="Subir"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>subir.png"></a>&nbsp;&nbsp;<a href="#top" title="Subir">Subir</a>
		</p>