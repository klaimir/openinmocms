<?php include("moduloadjuntos.php");?>
<?php include("../../../config/config.php");?>
<?php include("../../../general/funcionesauxiliares.php");?>
<?php require_once("../../../modelos/FicherosInmueble.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php Interfaz::PlantillaGenerica("inmuebles","adjuntos"); ?>