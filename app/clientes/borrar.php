<?php include("../../config/config.php");?>
<?php include("moduloclientes.php");?>
<?php include("ControlClientes.class.php");?>
<?php include("../../general/funcionesauxiliares.php");?>
<?php require_once("../../modelos/Clientes.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php
	// Inicialización de variables de error
	$i=0; 
	unset($errores); 
	$hayerrores=false;
	// Comprueba las referencias del cliente
	ControlClientes::ComprobarReferencias($_GET['id'],$i,$hayerrores,$errores);	
	
	$_SESSION['hayerroresborrarcliente'] = $hayerrores;
	$_SESSION['erroresborrarcliente'] = $errores;
	
	// Si no hay errores
	if(!$hayerrores)
	{
		// Datos de cliente
		$cliente = new ModelClientes();
		$cliente->Delete($_GET['id']);
		// Listado
		header("Location: index.php");
	}
?>
<?php Interfaz::PlantillaGenerica("clientes","borrar"); ?>