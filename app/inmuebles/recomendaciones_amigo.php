<?php include("moduloinmuebles.php");?>
<?php include("../../config/config.php");?>
<?php include("ControlInmuebles.class.php");?>
<?php include("../../modelos/Inmuebles.class.php");?>
<?php include("../../general/funcionesauxiliares.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php Interfaz::PlantillaGenerica("inmuebles","recomendaciones_amigo"); ?>