		<a name="top"></a>
		<div class="breadcrumbs_publico">
		<img src="<?php echo  $_SESSION['rutaimg'];?>flecha1.png" align="absmiddle" />&nbsp;<a href="<?php echo  URL_EMPRESA; ?>"><?php echo  NOMBRE_EMPRESA; ?></a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="<?php echo $_SESSION['rutaraiz']; ?>/app/acceso/index.php">Acceso</a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="../index.php">Plantillas</a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<span class="sin_enlace">Facturas</span>
		</div>
        <p align="justify" class="titulo_seccion">Plantillas</p>
		<p align="justify" style="margin-left:10px">A continuación puede acceder a cualquiera de los siguientes modelos de facturas:</p>
		<p align="left" style="margin-left:10px; margin-right:10px"><img src="<?php echo  $_SESSION['rutaimg'];?>pdf.gif" align="absmiddle" />&nbsp;&nbsp;<a target="_blank" href="generar_factura.php?tipo=4" title="Modelo de factura de contrato de compra-venta" style="margin-left:10px">Modelo de factura de contrato de compra-venta</a></p>
		<p align="left" style="margin-left:10px; margin-right:10px"><img src="<?php echo  $_SESSION['rutaimg'];?>pdf.gif" align="absmiddle" />&nbsp;&nbsp;<a target="_blank" href="generar_factura.php?tipo=5" title="Modelo de factura de arrendamiento" style="margin-left:10px">Modelo de factura de arrendamiento</a></p>
		<!--  Navegacion -->	
		<p align="right">
			<a href="../index.php"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>volver.gif" align="absmiddle"></a>&nbsp;&nbsp;<a href="../index.php">Volver</a>
			&nbsp;&nbsp;&nbsp;
			<a href="#top" title="Subir"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>subir.png"></a>&nbsp;&nbsp;<a href="#top" title="Subir">Subir</a>
		</p>