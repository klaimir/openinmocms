<?php include("../../../config/config.php");?>
<?php include("../../../general/funcionesauxiliares.php");?>
<?php include("modulofichas_visita.php");?>
<?php require_once("../../../modelos/FichasVisitaCliente.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php
	// Borrar en BD
	$ficha_visita = new ModelFichasVisitaCliente();
	$ficha_visita->Delete($_GET['id_ficha_visita'],$_GET['cliente']);
	// Buscador
	header("Location: index.php?id=" . $_GET['cliente']);
?>