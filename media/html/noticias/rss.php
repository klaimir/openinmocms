		<a name="top"></a>
		<div class="breadcrumbs_publico"><img src="<?php echo  $_SESSION['rutaimg'];?>flecha1.png" align="absmiddle" />&nbsp;<a href="<?php echo  URL_EMPRESA; ?>"><?php echo  NOMBRE_EMPRESA; ?></a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<span class="sin_enlace">RSS</span></div>
        <p align="justify" class="titulo_seccion"><?php echo  $textos['titulo_seccion']; ?></p>
		<h1>RSS</h1>
		<p align="justify"><?php echo  $textos['parrafo1']; ?></p>
		<h1><?php echo  $textos['titulo1']; ?></h1>
		<p align="justify"><?php echo  $textos['parrafo2']; ?></p>
		<h1><?php echo  $textos['titulo2']; ?></h1>
		<p align="justify"><?php echo  $textos['parrafo3']; ?></p>
		<p align="justify"><?php echo  $textos['parrafo4']; ?></p>
		<br  />
		<p align="justify">
		<img align="absmiddle" src="<?php echo $_SESSION['rutaimg']; ?>rss.png">
		&nbsp;&nbsp;&nbsp;&nbsp;<a target="_blank" href="<?php echo  $_SESSION['rutadocs'];?>rss_<?php echo  $idioma_rss; ?>.xml"><?php echo  $textos['canal']; ?></a>	
		</p>
		<!--  Navegacion -->	
		<p align="right">
			<a href="<?php echo $_SESSION['rutaraiz']; ?>/app/acceso/index.php"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>volver.gif" align="absmiddle"></a>&nbsp;&nbsp;<a href="<?php echo $_SESSION['rutaraiz']; ?>/app/acceso/index.php">Volver</a>
			&nbsp;&nbsp;&nbsp;
			<a href="#top" title="Subir"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>subir.png"></a>&nbsp;&nbsp;<a href="#top" title="Subir">Subir</a>
		</p>