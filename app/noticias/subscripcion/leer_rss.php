<?php include("modulosubscripcion.php");?>
<?php include("../../../general/funcionesauxiliares.php");?>
<?php include("../../../librerias/simplepie.inc");?>
<?php include("../../../config/config.php");?>
<?php require_once("../../../modelos/CanalNoticias.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php Interfaz::PlantillaGenerica("noticias","leer_rss"); ?>