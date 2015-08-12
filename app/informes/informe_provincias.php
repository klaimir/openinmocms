<?php include("moduloinformes.php");?>
<?php include("../../config/config.php");?>
<?php include("../../general/funcionesauxiliares.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php Interfaz::PlantillaGenerica("informes","informe_provincias"); ?>