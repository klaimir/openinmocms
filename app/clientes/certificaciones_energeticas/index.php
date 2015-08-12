<?php include("../../../config/config.php");?>
<?php include("../../../general/funcionesauxiliares.php");?>
<?php include("modulocertificaciones_energeticas.php");?>
<?php include("ControlCertificacionesEnergeticas.class.php");?>
<?php require_once("../../../modelos/CertificacionesEnergeticasCliente.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php Interfaz::PlantillaGenerica("clientes","buscador"); ?>