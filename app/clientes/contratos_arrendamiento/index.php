<?php include("../../../config/config.php");?>
<?php include("../../../general/funcionesauxiliares.php");?>
<?php include("modulocontratos_arrendamiento.php");?>
<?php include("ControlContratosArrendamiento.class.php");?>
<?php require_once("../../../modelos/ContratosArrendamientoInmueble.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php Interfaz::PlantillaGenerica("clientes","buscador"); ?>