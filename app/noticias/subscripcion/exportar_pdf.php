<?php
	include("../../../config/config.php");
	require(PATHINCLUDE_FRAMEWORK_MODELOS.'pdf/InformesCanalNoticiasPDF.class.php');
	require_once(PATHINCLUDE_FRAMEWORK_MODELOS.'Model.class.php');
	include("../../../general/funcionesauxiliares.php");
	$session=new Session(); $session->ComprobarRestriccionAcceso();
	// Creamos el PDF
	$informe = new InformesCanalNoticiasPDF();
	$informe->ListadoGeneral($_SESSION['sql_busq_canales_noticias_todos']);
?>