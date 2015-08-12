<?php include("../../../config/config.php");?>
<?php include("modulosubscripcion.php");?>
<?php include("ControlSubscripcionNoticias.class.php");?>
<?php include("../../../general/funcionesauxiliares.php");?>
<?php require_once("../../../modelos/CanalNoticias.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php
	// Inicialización de variables de error
	$i=0; 
	unset($errores); 
	$hayerrores=false;
	// Comprueba las referencias del canal de noticias
	ControlSubscripcionNoticias::ComprobarReferencias($_GET['id'],$i,$hayerrores,$errores);	
	
	$_SESSION['hayerroresborrarnoticia'] = $hayerrores;
	$_SESSION['erroresborrarnoticia'] = $errores;
	
	// Si no hay errores
	if(!$hayerrores)
	{
		// Datos de Canal de Noticia
		$canal_noticia = new ModelCanalNoticias();
		$ultimo_id=$canal_noticia->Delete($_GET['id']);	
		// Listado
		header("Location: index.php");
	}
?>
<?php Interfaz::PlantillaGenerica("noticias","borrar"); ?>