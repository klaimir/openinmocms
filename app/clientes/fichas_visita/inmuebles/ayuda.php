<?php include("../../../../config/config.php");?>
<?php include("../../../../general/funcionesauxiliares.php");?>
<?php require_once(PATHINCLUDE_FRAMEWORK_LIBRERIAS.'Translator.class.php'); ?>
<?php
	// Par de traducción
	$translator = Translator::getInstance();
	// Otros
	$textos['observaciones']=$translator->TraducirTexto("La búsqueda por palabras se aplicará al campo Observaciones de un determinado inmueble.");
	$textos['ayuda']=$translator->TraducirTexto("Ayuda");
?>
<?php include(PATHINCLUDE_FRAMEWORK.'general/ayuda.php'); ?>