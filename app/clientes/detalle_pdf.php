<?php
	include("../../config/config.php");
	require(PATHINCLUDE_FRAMEWORK_MODELOS.'pdf/InformesClientesPDF.class.php');
	require_once("../../modelos/Clientes.class.php");
	include("../../general/funcionesauxiliares.php");
	$session=new Session(); $session->ComprobarRestriccionAcceso();
	// Creamos el PDF
	$informe = new InformesClientesPDF();
	$informe->Ficha($_GET['id']);
?>