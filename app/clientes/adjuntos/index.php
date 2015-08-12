<?php include("../../../config/config.php");?>
<?php include("../../../general/funcionesauxiliares.php");?>
<?php include("moduloadjuntos.php");?>
<?php require_once("../../../modelos/FicherosCliente.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php Interfaz::PlantillaGenerica("clientes","adjuntos"); ?>