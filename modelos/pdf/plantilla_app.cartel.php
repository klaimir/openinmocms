<?php
require_once('plantilla_app.php');

class PDF_App_Cartel extends PDF_App
{		
	// Se a�ade el texto de confidencialidad de datos
	function Footer()
	{
		//Posici�n: a 1,5 cm del final
		$this->SetY(-10);
		//Arial italic 8
		$this->SetFont('Arial','I',8);
		//N�mero de p�gina
		$this->MultiCell(190,5,'Gesticadiz ( Servicios Integrales Inmobiliarios ), 956 262425, Ana de Viya n� 3 local bajo, 11008, C�diz',0,1);
	}
}
?>