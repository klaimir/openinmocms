<?php include("../../general/funcionesauxiliares.php");?>
<?php include("../../config/config.php");?>
<?php include("funcionesbackup.php");?>
<?php include("modulobackup.php");?>
<?php Interfaz::PlantillaLogin("backup"); ?>
<?php realizar_backup(); ?>