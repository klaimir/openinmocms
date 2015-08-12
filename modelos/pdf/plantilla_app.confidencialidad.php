<?php
require_once('plantilla_app.php');

class PDF_App_Confidencialidad extends PDF_App
{		
	// Se añade el texto de confidencialidad de datos
	function Footer()
	{
		parent::Footer();
		//Posición: a 1,5 cm del final
		$this->SetY(-28);
		//Arial italic 8
		$this->SetFont('Arial','I',6);
		//Número de página
		$this->MultiCell(190,5,'De acuerdo con lo establecido por la Ley Orgánica 15/1999, de 13 de diciembre, de Protección de Datos de Carácter Personal (LOPD), le informamos que los datos aportados serán incorporados a un fichero del que es titular GLORIA CHAMORRO ROMERO con la finalidad de realizar la gestión administrativa, contable y fiscal, así como enviarle comunicaciones comerciales sobre nuestros productos y servicios. Asimismo, declaro haber sido informado de la posibilidad de ejercer los derechos de acceso, rectificación, cancelación y oposición de mis datos en el domicilio fiscal de GLORIA CHAMORRO ROMERO sito en AVDA. ANA DE VIYA Nº3 – 11009 CÁDIZ.',0,1);
	}
}
?>