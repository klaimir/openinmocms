<?php include("../../../../config/config.php");?>
<?php include("../../../../general/funcionesauxiliares.php");?>
<?php include("modulofacturas.php");?>
<?php include("ControlFacturasContratosArrendamiento.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php 
	$acceso_borrar=ControlFacturasContratosArrendamiento::ComprobarAccesoBorrar($_GET['contrato_arrendamiento']);
	if($acceso_borrar == (int)(-1))
	{
		$_SESSION['hay_errores_general']=true;
		$_SESSION['errores_general'][0]="La factura no puede ser borrada porque ya ha sido firmada por el cliente";
		header("Location: ".$_SESSION['rutaraiz']."media/error_general.php");
	}
?>
<?php Interfaz::PlantillaGenerica("clientes","estas_seguro"); ?>
