<?php
	include("../../config/config.php");
	require(PATHINCLUDE_FRAMEWORK_MODELOS.'pdf/InformesInmueblesPDF.class.php');
	require_once(PATHINCLUDE_FRAMEWORK_MODELOS.'Model.class.php');
	include("../../general/funcionesauxiliares.php");
	$session=new Session(); $session->ComprobarRestriccionAcceso();
	// Creamos el PDF
	$informe = new InformesInmueblesPDF();
	$informe->ListadoGeneral($_SESSION['s_busq_gest_inmuebles_todos']);
?>