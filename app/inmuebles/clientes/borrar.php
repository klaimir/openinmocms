<?php include("moduloclientes.php");?>
<?php include("../../../config/config.php");?>
<?php include("../../../general/funcionesauxiliares.php");?>
<?php require_once("../../../modelos/ClientesInmueble.class.php");?>
<?php include("ControlClientesInmuebles.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php 
	$acceso_borrar_cliente_inmueble=ControlClientesInmuebles::ComprobarBorrarClienteInmueble($_GET['id'],$_GET['cliente']);
	if($acceso_borrar_cliente_inmueble == (int)(-1))
	{
		$_SESSION['hay_errores_general']=true;
		$_SESSION['errores_general'][0]="El inmueble seleccionado tiene generado un contrato de compra-venta o arrendamiento";
		header("Location: ".$_SESSION['rutaraiz']."media/error_general.php");
	}
	if($acceso_borrar_cliente_inmueble == (int)(-2))
	{
		$_SESSION['hay_errores_general']=true;
		$_SESSION['errores_general'][0]="El usuario actual no puede gestionar la población del inmueble seleccionado";
		header("Location: ".$_SESSION['rutaraiz']."media/error_general.php");
	}
?>
<?php
	// Datos de cliente
	$cliente_inmueble = new ModelClientesInmueble();
	$cliente_inmueble->Delete($_GET['cliente'],$_GET['id']);
	// Volvemos a editar para añadir cualquier dato
	header("Location: ../editar.php?id=" . $_GET['id']);
?>