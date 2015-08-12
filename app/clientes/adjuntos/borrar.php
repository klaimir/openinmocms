<?php include("moduloadjuntos.php");?>
<?php include("../../../config/config.php");?>
<?php include("../../../general/funcionesauxiliares.php");?>
<?php require_once("../../../modelos/FicherosCliente.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php
	// Datos de fichero
	$fichero_cliente = new ModelFicherosCliente();
	$fichero_cliente->Delete($_GET['id_fichero'],$_GET['id']);			
	// Se obtiene el último id insertado
	header("Location: index.php?id=".$_GET['id']);
?>