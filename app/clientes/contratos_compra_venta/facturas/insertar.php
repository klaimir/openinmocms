<?php include("../../../../config/config.php");?>
<?php include("modulofacturas.php");?>
<?php include("ControlFacturasContratosCompraVenta.class.php");?>
<?php include("../../../../general/funcionesauxiliares.php");?>
<?php require_once("../../../../modelos/FacturasContratosCompraVentaInmueble.class.php");?>
<?php require_once("../../../../modelos/pdf/InformesFacturasContratosCompraVentaInmueblePDF.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php 
	$acceso_generar=ControlFacturasContratosCompraVenta::ComprobarAccesoGenerar($_GET['contrato_compra_venta']);
	if($acceso_generar == (int)(-1))
	{
		$_SESSION['hay_errores_general']=true;
		$_SESSION['errores_general'][0]="No ha sido generado previamente el contrato de compra-venta";
		header("Location: ".$_SESSION['rutaraiz']."media/error_general.php");
	}
	if($acceso_generar == (int)(-2))
	{
		$_SESSION['hay_errores_general']=true;
		$_SESSION['errores_general'][0]="El contrato de compra-venta no ha sido firmado";
		header("Location: ".$_SESSION['rutaraiz']."media/error_general.php");
	}
	if($acceso_generar == (int)(-3))
	{
		$_SESSION['hay_errores_general']=true;
		$_SESSION['errores_general'][0]="La factura del contrato de compra-venta ya ha sido generada";
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
		
		$datos=ControlFacturasContratosCompraVenta::Validar($i,$hayerrores,$errores);
		
		$_SESSION['hayerroresinsertarfacturacontratocompraventa'] = $hayerrores;
		$_SESSION['erroresinsertarfacturacontratocompraventa'] = $errores;
	
		// Si no hay errores
		if(!$hayerrores)
		{
			// Datos de asignación
			$contrato_compra_venta = new ModelFacturasContratosCompraVentaInmueble();
			$contrato_compra_venta->Insert($datos);
			// Generar ficha PDF
			$informe_contrato_compra_venta = new InformesFacturasContratosCompraVentaInmueblePDF();
			$informe_contrato_compra_venta->Ficha($datos['contrato_compra_venta']);
			// Buscador
			header("Location: ../editar.php?id=" . $_GET['id']."&inmueble=" . $_GET['inmueble']."&id_contrato_compra_venta=" . $_GET['contrato_compra_venta']);
		}
	}
?>
<?php Interfaz::PlantillaGenerica("clientes","insertar"); ?>