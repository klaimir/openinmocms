<?php include("moduloplantillas.php");?>
<?php include("../../general/funcionesauxiliares.php");?>
<?php include("../../config/config.php");?>
<?php include("../../modelos/pdf/InformesFichasVisitaClientesPDF.class.php");?>
<?php 
	$modelo = new InformesFichasVisitaClientesPDF();
	$modelo->PlantillaFicha();
?>