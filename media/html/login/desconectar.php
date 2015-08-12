		<div class="breadcrumbs"><img src="<?php echo  $_SESSION['rutaimg'];?>flecha1.png" align="absmiddle" />&nbsp;<a href="<?php echo  $_SESSION['rutaraiz']; ?>index.php" ><?php echo  NOMBRE_EMPRESA; ?></a>&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<span class="sin_enlace"><?php echo  $textos['titulo_seccion']; ?></span></div>
		<p align="justify"><img align="absmiddle" src="<?php echo $_SESSION['rutaimg']; ?>redireccionando.gif">&nbsp; <?php echo  $textos['parrafo1']; ?>... </p>
		<br/><br />
		<SCRIPT LANGUAGE="JavaScript">
			setTimeout("location.href='index.php'", 2000);
		</SCRIPT>