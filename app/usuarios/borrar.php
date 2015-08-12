<?php include("../../config/config.php");?>
<?php include("modulousuarios.php");?>
<?php include("ControlUsuarios.class.php");?>
<?php include("../../general/funcionesauxiliares.php");?>
<?php require_once("../../modelos/Usuarios.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php
	// Inicialización de variables de error
	$i=0; 
	unset($errores); 
	$hayerrores=false;
	// Comprueba las referencias del usuario
	ControlUsuarios::ComprobarReferencias($_GET['usuario'],$i,$hayerrores,$errores);	
	
	$_SESSION['hayerroresborrarusuario'] = $hayerrores;
	$_SESSION['erroresborrarusuario'] = $errores;
	
	// Si no hay errores
	if(!$hayerrores)
	{
		// Datos de usuario
		$usuario = new ModelUsuarios();
		$usuario->Delete($_GET['usuario']);
		// Listado
		header("Location: index.php");
	}
?>
<?php Interfaz::PlantillaGenerica("usuarios","borrar"); ?>