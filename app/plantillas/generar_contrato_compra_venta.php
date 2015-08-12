<?php include("moduloplantillas.php");?>
<?php include("../../general/funcionesauxiliares.php");?>
<?php include("../../config/config.php");?>
<?php include("../../modelos/pdf/InformesContratosCompraVentaInmueblePDF.class.php");?>
<?php 
	$modelo = new InformesContratosCompraVentaInmueblePDF();
	$modelo->PlantillaFicha();
?>