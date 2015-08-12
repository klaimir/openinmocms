<?php include("../../../config/config.php");?>
<?php include("../../../general/funcionesauxiliares.php");?>
<?php include("ControlInmueblesClientes.class.php");?>
<?php require_once("../../../modelos/ClientesInmueble.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php 
	$acceso_borrar_cliente_inmueble=ControlInmueblesClientes::ComprobarBorrarClienteInmueble($_GET['inmueble'],$_GET['id']);
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
	// Borramos el inmueble seleccionada
	$cliente_inmueble = new ModelClientesInmueble();
	$cliente_inmueble->Delete($_GET['id'],$_GET['inmueble']);
	// Listado
	header("Location: ../editar.php?id=" . $_GET['id']);
?>