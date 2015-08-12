<?php include("../../config/config.php");?>
<?php include("moduloacceso.php");?>
<?php include("../../general/funcionesauxiliares.php");?>
<?php include("ControlAcceso.class.php");?>
<?php include("../../scripts/backup/funcionesbackup.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso(); ?>
<?php ControlAcceso::ComprobarTiempoAccesoUsuarios(); ?>
<?php
	if(!backup_realizado())
		header("Location: ../../scripts/backup/index.php");
	else
		Interfaz::PlantillaLogin("acceso");
?>