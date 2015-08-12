<?php include("modulousuarios.php");?>
<?php include("../../general/funcionesauxiliares.php");?>
<?php include("../../config/config.php");?>
<?php require_once("../../modelos/Model.class.php");?>
<?php require_once("../../modelos/Usuarios.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php Interfaz::PlantillaGenerica("usuarios","ver_ficha"); ?>