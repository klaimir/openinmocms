<?php include("../../config/config.php");?>
<?php include("moduloclientes.php");?>
<?php include("ControlClientes.class.php");?>
<?php include("../../general/funcionesauxiliares.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php 
	$acceso_borrar=ControlClientes::ComprobarBorrar($_GET['id']);
	if($acceso_borrar == (int)(-1))
	{
		$_SESSION['hay_errores_general']=true;
		$_SESSION['errores_general'][0]="El cliente seleccionado tiene generado un contrato de compra-venta o arrendamiento de algún inmueble";
		header("Location: ".$_SESSION['rutaraiz']."media/error_general.php");
	}
	if($acceso_borrar == (int)(-2))
	{
		$_SESSION['hay_errores_general']=true;
		$_SESSION['errores_general'][0]="El cliente seleccionado tiene inmuebles asociados que no pueden ser borrados";
		header("Location: ".$_SESSION['rutaraiz']."media/error_general.php");
	}
?>
<?php Interfaz::PlantillaGenerica("clientes","estas_seguro"); ?>