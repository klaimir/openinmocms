		<a name="top"></a>
		<div class="breadcrumbs_publico">
		<img src="<?php echo  $_SESSION['rutaimg'];?>flecha1.png" align="absmiddle" />&nbsp;<a href="<?php echo  URL_EMPRESA; ?>"><?php echo  NOMBRE_EMPRESA; ?></a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="<?php echo $_SESSION['rutaraiz']; ?>/app/acceso/index.php">Acceso</a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="index.php">Informes</a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<span class="sin_enlace">Informe por captador</span></div>
		<p align="justify" class="titulo_seccion">Informes</p>	
		<p align="justify" style="margin-left:10px">A continuación puede seleccionar los siguientes formatos del informe:</p>
		<img src="<?php echo  $_SESSION['rutaimg'];?>pieplot.jpg" align="absmiddle" />&nbsp;&nbsp;<a href="generar_diagrama_captadores.php?tipo_diagrama=pie" target="_blank">Generar diagrama (Cuñas)</a>
		<br  /><br  />
		<img src="<?php echo  $_SESSION['rutaimg'];?>diagrama.png" align="absmiddle" />&nbsp;&nbsp;<a href="generar_diagrama_captadores.php?tipo_diagrama=plot" target="_blank">Generar diagrama (Barras)</a>
		<br  /><br  />
		<img src="<?php echo  $_SESSION['rutaimg'];?>pdf.gif" align="absmiddle" />&nbsp;&nbsp;<a href="generar_diagrama_captadores.php?tipo_diagrama=pdf" target="_blank">Generar diagramas (PDF)</a>	
		<!--  Navegacion -->	
		<p align="right">
			<a href="index.php"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>volver.gif" align="absmiddle"></a>&nbsp;&nbsp;<a href="index.php">Volver</a>
			&nbsp;&nbsp;&nbsp;
			<a href="#top" title="Subir"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>subir.png"></a>&nbsp;&nbsp;<a href="#top" title="Subir">Subir</a>
		</p>