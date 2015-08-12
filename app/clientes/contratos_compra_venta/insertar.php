<?php include("../../../config/config.php");?>
<?php include("modulocontratos_compra_venta.php");?>
<?php include("ControlContratosCompraVenta.class.php");?>
<?php include("../../../general/funcionesauxiliares.php");?>
<?php require_once("../../../modelos/ContratosCompraVentaInmueble.class.php");?>
<?php require_once("../../../modelos/pdf/InformesContratosCompraVentaInmueblePDF.class.php");?>
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
		
		$datos=ControlContratosCompraVenta::Validar($i,$hayerrores,$errores);
		
		$_SESSION['hayerroresinsertarcontratocompraventa'] = $hayerrores;
		$_SESSION['erroresinsertarcontratocompraventa'] = $errores;
	
		// Si no hay errores
		if(!$hayerrores)
		{
			// Datos de asignación
			$contrato_compra_venta = new ModelContratosCompraVentaInmueble();
			$ultimo_id=$contrato_compra_venta->Insert($datos);
			// Generar ficha PDF
			$informe_contrato_compra_venta = new InformesContratosCompraVentaInmueblePDF();
			$informe_contrato_compra_venta->Ficha($ultimo_id);
			// Buscador
			header("Location: index.php?id=" . $_GET['id']."&inmueble=" . $_GET['inmueble']);
		}
	}
?>
<?php Interfaz::PlantillaGenerica("clientes","insertar"); ?>