<?php include("moduloplantillas.php");?>
<?php include("../../general/funcionesauxiliares.php");?>
<?php include("../../config/config.php");?>
<?php include("../../modelos/pdf/InformesFichasEncargoClientesPDF.class.php");?>
<?php 
	$modelo = new InformesFichasEncargoClientesPDF();
	$modelo->PlantillaFicha();
?>