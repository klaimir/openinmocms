<?php include("../../../config/config.php");?>
<?php include("../../../general/funcionesauxiliares.php");?>
<?php include("modulofichas_encargo.php");?>
<?php include("ControlFichasEncargoClientes.class.php");?>
<?php require_once("../../../modelos/FichasEncargoCliente.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php Interfaz::PlantillaGenerica("clientes","buscador"); ?>