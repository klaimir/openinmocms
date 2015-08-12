<?php include("../../../config/config.php");?>
<?php include("../../../general/funcionesauxiliares.php");?>
<?php include("modulocontratos_compra_venta.php");?>
<?php include("ControlContratosCompraVenta.class.php");?>
<?php require_once("../../../modelos/ContratosCompraVentaInmueble.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php Interfaz::PlantillaGenerica("clientes","buscador"); ?>