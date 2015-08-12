<?php include("../../../../config/config.php");?>
<?php include("../../../../general/funcionesauxiliares.php");?>
<?php require_once("../../../../modelos/InmueblesFichasVisitaCliente.class.php");?>
<?php require_once("../../../../modelos/pdf/InformesFichasVisitaClientesPDF.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php
	// Borramos el inmueble seleccionada
	$cliente_inmueble = new ModelInmueblesFichasVisitaCliente();
	$cliente_inmueble->Delete($_GET['ficha_visita'],$_GET['id'],$_GET['inmueble']);
	// Generar ficha visita PDF
	$informe_ficha_visita = new InformesFichasVisitaClientesPDF();
	$informe_ficha_visita->Ficha($_GET['ficha_visita'],$_GET['id']);
	// Listado
	header("Location: ../editar.php?id=" . $_GET['id']."&id_ficha_visita=" . $_GET['ficha_visita']);
?>