<?php include("../../../config/config.php");?>
<?php include("modulopublicacion.php");?>
<?php include("ControlPublicacionNoticias.class.php");?>
<?php include("../../../general/funcionesauxiliares.php");?>
<?php require_once("../../../modelos/Noticias.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php
	// Inicialización de variables de error
	$i=0; 
	unset($errores); 
	$hayerrores=false;
	// Comprueba las referencias del noticia
	ControlPublicacionNoticias::ComprobarReferencias($_GET['id'],$i,$hayerrores,$errores);	
	
	$_SESSION['hayerroresborrarnoticia'] = $hayerrores;
	$_SESSION['erroresborrarnoticia'] = $errores;
	
	// Si no hay errores
	if(!$hayerrores)
	{
		// Datos de Noticia
		$noticia = new ModelNoticias();
		$noticia->Delete($_GET['id']);
		// Crear RSS
		header("Location: crear_rss.php");
	}
?>
<?php Interfaz::PlantillaGenerica("noticias","borrar"); ?>