<?php include("../../../config/config.php");?>
<?php include("../../../general/funcionesauxiliares.php");?>
<?php include("ControlPresupuestosInmueble.class.php");?>
<?php include("modulopresupuestos.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php Interfaz::PlantillaGenerica("inmuebles","estas_seguro"); ?>
