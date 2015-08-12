<?php include("../../../general/funcionesauxiliares.php");?>
<?php include("../../../config/config.php");?>
<?php require_once("../../../modelos/Noticias.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php
	// Conversión
	$datos['publicar']=GetSQLValueString($_GET['publicar'], "int");
	// Datos de Noticia
	$noticia = new ModelNoticias();
	$noticia->Update($datos,$_GET['id']);
	// Crear RSS
	header("Location: crear_rss.php");
?>