<?php include("../../../../config/config.php");?>
<?php include("../../../../general/funcionesauxiliares.php");?>
<?php include("modulofacturas.php");?>
<?php include("ControlFacturasContratosCompraVenta.class.php");?>
<?php require_once("../../../../modelos/FacturasContratosCompraVentaInmueble.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php 
	$acceso_borrar=ControlFacturasContratosCompraVenta::ComprobarAccesoBorrar($_GET['contrato_compra_venta']);
	if($acceso_borrar == (int)(-1))
	{
		$_SESSION['hay_errores_general']=true;
		$_SESSION['errores_general'][0]="La factura no puede ser borrada porque ya ha sido firmada por el cliente";
		header("Location: ".$_SESSION['rutaraiz']."media/error_general.php");
	}
	else
	{
		// Borrar en BD
		$contrato_compra_venta = new ModelFacturasContratosCompraVentaInmueble();
		$contrato_compra_venta->Delete($_GET['contrato_compra_venta'],$_GET['cliente'],$_GET['inmueble']);
		// Editar
		header("Location: ../editar.php?id=" . $_GET['cliente']."&inmueble=" . $_GET['inmueble']."&id_contrato_compra_venta=" . $_GET['contrato_compra_venta']);
	}
?>