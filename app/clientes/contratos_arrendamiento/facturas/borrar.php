<?php include("../../../../config/config.php");?>
<?php include("../../../../general/funcionesauxiliares.php");?>
<?php include("modulofacturas.php");?>
<?php include("ControlFacturasContratosArrendamiento.class.php");?>
<?php require_once("../../../../modelos/FacturasContratosArrendamientoInmueble.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php 
	$acceso_borrar=ControlFacturasContratosArrendamiento::ComprobarAccesoBorrar($_GET['contrato_arrendamiento']);
	if($acceso_borrar == (int)(-1))
	{
		$_SESSION['hay_errores_general']=true;
		$_SESSION['errores_general'][0]="La factura no puede ser borrada porque ya ha sido firmada por el cliente";
		header("Location: ".$_SESSION['rutaraiz']."media/error_general.php");
	}
	else
	{
		// Borrar en BD
		$contrato_arrendamiento = new ModelFacturasContratosArrendamientoInmueble();
		$contrato_arrendamiento->Delete($_GET['contrato_arrendamiento'],$_GET['cliente'],$_GET['inmueble']);
		// Editar
		header("Location: ../editar.php?id=" . $_GET['cliente']."&inmueble=" . $_GET['inmueble']."&id_contrato_arrendamiento=" . $_GET['contrato_arrendamiento']);
	}
?>