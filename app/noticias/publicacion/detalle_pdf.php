<?php
	include("../../../config/config.php");
	require(PATHINCLUDE_FRAMEWORK_MODELOS.'pdf/InformesNoticiasPDF.class.php');
	require_once(PATHINCLUDE_FRAMEWORK_MODELOS.'Model.class.php');
	include("../../../general/funcionesauxiliares.php");
	$session=new Session(); $session->ComprobarRestriccionAcceso();
	// Creamos el PDF
	$informe = new InformesNoticiasPDF();
	$informe->Ficha($_GET['id']);
?>