<?php
require_once('plantilla_app.php');

class PDF_App_Confidencialidad extends PDF_App
{		
	// Se a�ade el texto de confidencialidad de datos
	function Footer()
	{
		parent::Footer();
		//Posici�n: a 1,5 cm del final
		$this->SetY(-28);
		//Arial italic 8
		$this->SetFont('Arial','I',6);
		//N�mero de p�gina
		$this->MultiCell(190,5,'De acuerdo con lo establecido por la Ley Org�nica 15/1999, de 13 de diciembre, de Protecci�n de Datos de Car�cter Personal (LOPD), le informamos que los datos aportados ser�n incorporados a un fichero del que es titular GLORIA CHAMORRO ROMERO con la finalidad de realizar la gesti�n administrativa, contable y fiscal, as� como enviarle comunicaciones comerciales sobre nuestros productos y servicios. Asimismo, declaro haber sido informado de la posibilidad de ejercer los derechos de acceso, rectificaci�n, cancelaci�n y oposici�n de mis datos en el domicilio fiscal de GLORIA CHAMORRO ROMERO sito en AVDA. ANA DE VIYA N�3 � 11009 C�DIZ.',0,1);
	}
}
?>