<?php include("../../../../config/config.php");?>
<?php include("../../../../general/funcionesauxiliares.php");?>
<?php include("moduloinmuebles.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php Interfaz::PlantillaGenerica("clientes","estas_seguro"); ?>
