<?php include("../../../config/config.php");?>
<?php include("../../../general/funcionesauxiliares.php");?>
<?php include("modulofichas_encargo.php");?>
<?php include("ControlFichasEncargoClientes.class.php");?>
<?php require_once("../../../modelos/FichasEncargoCliente.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php 
	$acceso_borrar=ControlFichasEncargoClientes::ComprobarAccesoBorrar($_GET['id_ficha_encargo'],$_GET['inmueble'],$_GET['cliente']);
	if($acceso_borrar == (int)(-1))
	{
		$_SESSION['hay_errores_general']=true;
		$_SESSION['errores_general'][0]="El cliente seleccionado tiene documentación generada para el inmueble actual";
		header("Location: ".$_SESSION['rutaraiz']."media/error_general.php");
	}
?>
<?php
	// Borrar en BD
	$ficha_encargo = new ModelFichasEncargoCliente();
	$ficha_encargo->Delete($_GET['id_ficha_encargo'],$_GET['cliente'],$_GET['inmueble']);
	// Buscador
	header("Location: index.php?id=" . $_GET['cliente']."&inmueble=" . $_GET['inmueble']);
?>