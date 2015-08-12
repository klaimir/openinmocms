<?php include("moduloplantillas.php");?>
<?php include("../../general/funcionesauxiliares.php");?>
<?php include("../../config/config.php");?>
<?php include("../../modelos/pdf/InformesCertificacionesEnergeticasClientePDF.class.php");?>
<?php 
	$modelo = new InformesCertificacionesEnergeticasClientePDF();
	$modelo->PlantillaFicha();
?>