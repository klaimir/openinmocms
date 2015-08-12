<?php include("../../../config/config.php");?>
<?php include("../../../general/funcionesauxiliares.php");?>
<?php include("modulocontratos_compra_venta.php");?>
<?php include("ControlContratosCompraVenta.class.php");?>
<?php require_once("../../../modelos/ContratosCompraVentaInmueble.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php
	$acceso_borrar=ControlContratosCompraVenta::ComprobarAccesoBorrarContrato($_GET['id_contrato_compra_venta']);
	if($acceso_borrar == (int)(-1))
	{
		$_SESSION['hay_errores_general']=true;
		$_SESSION['errores_general'][0]="El contrato de compra-venta ya ha sido firmado";
		header("Location: ".$_SESSION['rutaraiz']."media/error_general.php");
	}
	if($acceso_borrar == (int)(-2))
	{
		$_SESSION['hay_errores_general']=true;
		$_SESSION['errores_general'][0]="El contrato de compra-venta tiene una factura asociada";
		header("Location: ".$_SESSION['rutaraiz']."media/error_general.php");
	}
	if($acceso_borrar == (int)(1))
	{
		// Borrar en BD
		$contrato_compra_venta = new ModelContratosCompraVentaInmueble();
		$contrato_compra_venta->Delete($_GET['id_contrato_compra_venta'],$_GET['cliente'],$_GET['inmueble']);
		// Buscador
		header("Location: index.php?id=" . $_GET['cliente']."&inmueble=" . $_GET['inmueble']);
	}
?>