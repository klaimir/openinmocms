<?php include("../../../config/config.php");?>
<?php include("../../../general/funcionesauxiliares.php");?>
<?php include("ControlCartelesInmueble.class.php");?>
<?php include("modulocarteles.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php Interfaz::PlantillaGenerica("inmuebles","estas_seguro"); ?>
