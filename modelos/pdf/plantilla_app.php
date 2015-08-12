<?php
require_once('basic_table.php');

class PDF_App extends PDF_Basic_Table
{
	// Se a�ade el t�tulo del informe a cada uno de ellos si est� definido previamente
	var $name_pdf=NULL;
	// Se a�ade variable para determinar si se muestra el logo
	var $mostrar_logo=true;
	
	// Se a�ade el t�tulo del informe a cada uno de ellos si est� definido previamente 
	function SetName($value)
	{
		$this->name_pdf=$value;
	}
	
	// Se informaci�n para mostrar logo
	function SetMostrarLogo($value)
	{
		$this->mostrar_logo=$value;
	}	
	
	// Se a�ade el logo a la cabecera y se calcula el total de p�ginas
	function Header()
	{
		// Debe ejecutarse antes de poder usar la variable {nb} en el footer
		$this->AliasNbPages();
		// Si se muestra el logo
		if($this->mostrar_logo)
		{
			// Si la p�gina est� en apaisada hay que realizar un desplazamiento
			if($this->CurOrientation=="L")
				$this->SetX(60);
			// Cabecera
			$this->Image(PATHINCLUDE_FRAMEWORK_IMG."cabecera_pdf.jpg", NULL, 5, 185,30);
		}
		if($this->PageNo()==1)
		{
			// Si se muestra el logo
			if($this->mostrar_logo)
			{
				// Logo
				$this->Ln(30);
				$this->SetFont('Arial','B',12);
				// Si la p�gina est� en apaisada hay que realizar un desplazamiento
				if($this->CurOrientation=="L")
					$this->SetX(60);
				$this->Cell(100,10,NOMBRE_EMPRESA,0,0);
				// Fecha de generaci�n
				$this->SetFont('Arial','',8);
				$fecha_actual=date("d/m/Y");
				$this->Cell(85,10,"Generado con fecha: ".$fecha_actual,0,0,'R');
			}
			// Se a�ade el t�tulo del informe a cada uno de ellos si est� definido previamente
			if(!is_null($this->name_pdf))
			{	
				$this->Ln(18);
				$this->SetFont('Arial','B',14);
				// Si la p�gina est� en apaisada hay que realizar un desplazamiento
				if($this->CurOrientation=="L")
					$this->SetX(60);
				$this->Cell(185,10,$this->name_pdf,0,1,'C');
				$this->Ln(5);
			}
			else
			{
				$this->Ln(10);
			}			
		}
		else
		{
			if(!is_null($this->name_pdf))
			{			
				$this->Ln(20);
				$this->SetFont('Arial','B',14);
				// Si la p�gina est� en apaisada hay que realizar un desplazamiento
				if($this->CurOrientation=="L")
					$this->SetX(60);
				$this->Cell(185,10,$this->name_pdf,0,1,'C');
				$this->Ln(5);
			}	
			else
			{
				$this->Ln(30);
			}
		}
	}
	
	// Se a�ade la numeraci�n al pi� de p�gina
	function Footer()
	{
		//Posici�n: a 1,5 cm del final
		$this->SetY(-10);
		//Arial italic 8
		$this->SetFont('Arial','I',8);
		//N�mero de p�gina
		$this->Cell(0,10,'P�gina '.$this->PageNo().'/{nb}',0,0,'C');
	}
}
?>