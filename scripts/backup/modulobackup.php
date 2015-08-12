<?php
	function backup()
	{	
?>
		<div class="breadcrumbs">
		<img src="<?php echo  $_SESSION['rutaimg'];?>flecha1.png" align="absmiddle" />&nbsp;<a href="<?php echo  $_SESSION['rutaraiz']; ?>index.php" ><?php echo  NOMBRE_EMPRESA; ?></a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<span class="sin_enlace">Backup</span>
		</div>
		<p align="justify">
		<img align="absmiddle" src="<?php echo $_SESSION['rutaimg']; ?>redireccionando.gif">&nbsp;Realizando Backup de <?php echo  NOMBRE_EMPRESA; ?>. Por favor espere ...
		</p>
<?php
	}
?>