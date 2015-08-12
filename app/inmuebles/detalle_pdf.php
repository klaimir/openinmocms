<?php
	include("../../config/config.php");
	require(PATHINCLUDE_FRAMEWORK_MODELOS.'pdf/InformesInmueblesPDF.class.php');
	require_once("../../modelos/Inmuebles.class.php");
	include("../../general/funcionesauxiliares.php");
	$session=new Session(); $session->ComprobarRestriccionAcceso();
	// Creamos el PDF
	$informe = new InformesInmueblesPDF();
	$informe->Ficha($_GET['id']);	
?>