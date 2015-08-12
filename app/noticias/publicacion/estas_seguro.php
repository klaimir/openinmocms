<?php include("modulopublicacion.php");?>
<?php include("../../../general/funcionesauxiliares.php");?>
<?php include("../../../config/config.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php Interfaz::PlantillaGenerica("noticias","estas_seguro"); ?>