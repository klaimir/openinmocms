		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
			<title><?php echo  NOMBRE_EMPRESA; ?>. Buscador de inmuebles</title>
			<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
			<script type="text/javascript" src="<?php echo  $_SESSION['rutajs']; ?>funciones.js" ></script>
			<script type="text/javascript" src="<?php echo  $_SESSION['rutajs']; ?>dhtmlgoodies_calendar.js" ></script>
			<link rel="stylesheet" type="text/css" href="<?php echo  $_SESSION['rutacss']; ?>estilos.css">
			<link rel="stylesheet" type="text/css" href="<?php echo  $_SESSION['rutacss']; ?>dhtmlgoodies_calendar.css">
			<link rel="stylesheet" type="text/css" href="<?php echo  $_SESSION['rutacss']; ?>css3splitmenu.css" />
			<!-- Librerias javascript Submodal -->
			<script language="javascript" src="<?php echo  $_SESSION['rutajs']; ?>common.js"></script>
			<script language="javascript" src="<?php echo  $_SESSION['rutajs']; ?>subModal.js"></script>
			<!-- CSS Submodal -->
			<link rel="stylesheet" type="text/css" href="<?php echo  $_SESSION['rutacss']; ?>estilos_submodal.css">
		</head>
		<body>
			<!-- phpmyvisites -->
			<a href="http://www.phpmyvisites.net/" title="phpMyVisites : estadísticas y medida de audiencia de sitios en Internet (licencia GPL)" 
			onclick="window.open(this.href);return(false);"><script type="text/javascript">
			<!--
			var a_vars = Array();
			var pagename='';
			
			var phpmyvisitesSite = 1;
			var phpmyvisitesURL = "<?php echo  $_SESSION['rutaraiz']; ?>modulos/phpmv2/phpmyvisites.php";
			//-->
			</script>
			<script language="javascript" src="<?php echo  $_SESSION['rutaraiz']; ?>modulos/phpmv2/phpmyvisites.js" type="text/javascript"></script>
			<object><noscript><p>phpMyVisites : estadísticas y medida de audiencia de sitios en Internet (licencia GPL)
			<img src="<?php echo  $_SESSION['rutaraiz']; ?>modulos/phpmv2/phpmyvisites.php" alt="Statistics" style="border:0" />
			</p></noscript></object></a>
			<!-- /phpmyvisites --> 
			<div id="contenedor">
				<?php Interfaz::Cabecera(); ?>
				<div id="interfaz">
					<?php $interfaz();  ?>
				</div>			
				<br clear="all">
				<?php Interfaz::Pie(); ?>
			</div>	
		</body>
		</html>