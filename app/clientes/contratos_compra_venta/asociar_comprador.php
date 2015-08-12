<?php include("../../../config/config.php");?>
<?php include("modulocontratos_compra_venta.php");?>
<?php include("ControlContratosCompraVenta.class.php");?>
<?php include("../../../general/funcionesauxiliares.php");?>
<?php require_once("../../../modelos/ContratosCompraVentaInmueble.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php 
	$acceso_generar_contrato=ControlContratosCompraVenta::ComprobarAccesoGenerarContrato($_GET['inmueble'],$_GET['id']);
	if($acceso_generar_contrato == (int)(-1))
	{
		$_SESSION['hay_errores_general']=true;
		$_SESSION['errores_general'][0]="El inmueble seleccionado no está en venta";
		header("Location: ".$_SESSION['rutaraiz']."media/error_general.php");
	}
	if($acceso_generar_contrato == (int)(-2))
	{
		$_SESSION['hay_errores_general']=true;
		$_SESSION['errores_general'][0]="El inmueble seleccionado no tiene ficha de encargo";
		header("Location: ".$_SESSION['rutaraiz']."media/error_general.php");
	}
?>
<?php
	if($_POST)
	{
		// Inicialización de variables de error
		$i=0; 
		unset($errores); 
		$hayerrores=false;
		
		$datos=ControlContratosCompraVenta::ValidarAsociarComprador($i,$hayerrores,$errores);
		
		$_SESSION['hayerroresasociarcomprador'] = $hayerrores;
		$_SESSION['erroresasociarcomprador'] = $errores;
	
		// Si no hay errores
		if(!$hayerrores)
		{
			// Buscador
			header("Location: insertar.php?id=" . $_GET['id']."&inmueble=" . $_GET['inmueble']."&cliente_comprador=".$datos['cliente_comprador']);
		}
	}
?>
<?php Interfaz::PlantillaGenerica("clientes","asociar_comprador"); ?>