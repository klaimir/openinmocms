<?php include("../../config/config.php");?>
<?php include("modulologin.php");?>
<?php
	// Destruir sesi�n
	$sesion = new Session();
	$sesion->DestruirSesion();
?>
<?php Interfaz::PlantillaLogin("desconectar"); ?>