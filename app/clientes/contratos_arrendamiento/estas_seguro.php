<?php include("../../../config/config.php");?>
<?php include("../../../general/funcionesauxiliares.php");?>
<?php include("ControlContratosArrendamiento.class.php");?>
<?php include("modulocontratos_arrendamiento.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php
	$acceso_borrar=ControlContratosArrendamiento::ComprobarAccesoBorrarContrato($_GET['id_contrato_arrendamiento']);
	if($acceso_borrar == (int)(-1))
	{
		$_SESSION['hay_errores_general']=true;
		$_SESSION['errores_general'][0]="El contrato de arrendamiento ya ha sido firmado";
		header("Location: ".$_SESSION['rutaraiz']."media/error_general.php");
	}
	if($acceso_borrar == (int)(-2))
	{
		$_SESSION['hay_errores_general']=true;
		$_SESSION['errores_general'][0]="El contrato de arrendamiento tiene una factura asociada";
		header("Location: ".$_SESSION['rutaraiz']."media/error_general.php");
	}
?>
<?php Interfaz::PlantillaGenerica("clientes","estas_seguro"); ?>
