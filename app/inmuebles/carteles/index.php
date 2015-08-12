<?php include("../../../config/config.php");?>
<?php include("../../../general/funcionesauxiliares.php");?>
<?php include("modulocarteles.php");?>
<?php include("ControlCartelesInmueble.class.php");?>
<?php require_once("../../../modelos/CartelesInmueble.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php Interfaz::PlantillaGenerica("inmuebles","buscador"); ?>