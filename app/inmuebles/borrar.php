<?php include("../../config/config.php");?>
<?php include("moduloinmuebles.php");?>
<?php include("ControlInmuebles.class.php");?>
<?php include("../../general/funcionesauxiliares.php");?>
<?php require_once("../../modelos/Inmuebles.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php
	// Inicialización de variables de error
	$i=0; 
	unset($errores); 
	$hayerrores=false;
	// Comprueba las referencias del usuario
	ControlInmuebles::ComprobarReferencias($_GET['id'],$i,$hayerrores,$errores);	
	
	$_SESSION['hayerroresborrarinmueble'] = $hayerrores;
	$_SESSION['erroresborrarinmueble'] = $errores;
	
	// Si no hay errores
	if(!$hayerrores)
	{
		// Borrar Inmujeble
		$inmueble = new ModelInmuebles();
		$inmueble->Delete($_GET['id']);
		// Buscador
		header("Location: index.php");
	}
?>
<?php Interfaz::PlantillaGenerica("inmuebles","borrar"); ?>