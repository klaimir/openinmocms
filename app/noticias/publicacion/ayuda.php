<?php include("../../../config/config.php");?>
<?php include("../../../general/funcionesauxiliares.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo  NOMBRE_EMPRESA; ?> - Ayuda</title>
	<link rel="stylesheet" type="text/css" href="<?php echo  $_SESSION['rutacss']; ?>estilos.css">
</head>
<body>
	<br />
	<p align="left" style="margin-left:10px; margin-right:10px"><img src="<?php echo  $_SESSION['rutaimg'];?>bullet_enlaces.gif" align="absmiddle" />&nbsp;&nbsp;El campo "T&iacute;tulo" debe contener una peque&ntilde;a descripci&oacute;n de la noticia.</p>
	<p align="left" style="margin-left:10px; margin-right:10px"><img src="<?php echo  $_SESSION['rutaimg'];?>bullet_enlaces.gif" align="absmiddle" />&nbsp;&nbsp;El campo "Enlace" debe contener el prefijo "http://" antes de cualquier url que se desee introducir.</p>
</body>
</html>