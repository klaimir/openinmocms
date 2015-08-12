<?php include("../../../config/config.php");?>
<?php include("../../../general/funcionesauxiliares.php");?>
<?php include("modulopresupuestos.php");?>
<?php include("ControlPresupuestosInmueble.class.php");?>
<?php require_once("../../../modelos/PresupuestosInmueble.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php Interfaz::PlantillaGenerica("inmuebles","buscador"); ?>