<?php include("../general/funcionesauxiliares.php");?>
<?php include("../config/config.php");?>
<?php require_once(PATHINCLUDE_FRAMEWORK_LIBRERIAS.'Translator.class.php'); ?>
<?php
	// Par de traducción
	$translator = Translator::getInstance();
	$translator->SetLangPair($_GET['language']);
?>
	<SCRIPT LANGUAGE="JavaScript">
		setTimeout("location.href='javascript:history.go(-1)'");
	</SCRIPT>