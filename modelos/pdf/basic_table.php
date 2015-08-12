<?php
require('cell_fit.php');

class PDF_Basic_Table extends FPDF_CellFit
{
	var $widths;
	var $aligns;
	
	function SetWidths($w)
	{
		//Set the array of column widths
		$this->widths=$w;
	}
	
	function SetAligns($a)
	{
		//Set the array of column alignments
		$this->aligns=$a;
	}
	
	// Calculate the height of the row
	function CalculateHeightRow($data)
	{
		//Calculate the height of the row
		$nb=0;
		for($i=0;$i<count($data);$i++)
			$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
		return $h=5*$nb;
	}
	
	// Método para imprimir una fila
	function Row($data,$fill=false,$border=0,$typeCell="MultiCell")
	{
		$this->CheckPageBreak($this->CalculateHeightRow($data));
		$h=$this->CalculateHeightRow($data);		
		//Draw the cells of the row
		$this->Print_Row($data,$h,$fill,$border,$typeCell);
		//Go to the next line
		$this->Ln($h);
	}
	
	// Método para imprimir una fila con una altura determinada
	function Print_Row($data,$h,$fill,$border,$typeCell)
	{
		//Draw the cells of the row
		for($i=0;$i<count($data);$i++)
		{						
			$w=$this->widths[$i];
			$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
			//Save the current position
			$x=$this->GetX();
			$y=$this->GetY();
			//Draw the border
			$this->SetLineWidth(0.3);
			$this->SetDrawColor(0, 0, 0);
			$this->Rect($x,$y,$w,$h,"FD");
			//Print the text
			if($typeCell=="MultiCell")
				$this->MultiCell($w,5,$data[$i],0,$a,false);
			else
				$this->Cell($w,$h,$data[$i],$border,0,$a,$fill);
				
			//Put the position to the right of the cell
			$this->SetXY($x+$w,$y);
		}
	}
	
	// Verifica si hay que hacer un salto de página, y en caso positivo lo realiza
	function CheckPageBreak($h)
	{
		//If the height h would cause an overflow, add a new page immediately
		if($this->GetY()+$h>$this->PageBreakTrigger)
		{
			$this->AddPage($this->CurOrientation);
			return true;
		}
	}
	
	function NbLines($w,$txt)
	{
		//Computes the number of lines a MultiCell of width w will take
		$cw=&$this->CurrentFont['cw'];
		if($w==0)
			$w=$this->w-$this->rMargin-$this->x;
		$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
		$s=str_replace("\r",'',$txt);
		$nb=strlen($s);
		if($nb>0 and $s[$nb-1]=="\n")
			$nb--;
		$sep=-1;
		$i=0;
		$j=0;
		$l=0;
		$nl=1;
		while($i<$nb)
		{
			$c=$s[$i];
			if($c=="\n")
			{
				$i++;
				$sep=-1;
				$j=$i;
				$l=0;
				$nl++;
				continue;
			}
			if($c==' ')
				$sep=$i;
			$l+=$cw[$c];
			if($l>$wmax)
			{
				if($sep==-1)
				{
					if($i==$j)
						$i++;
				}
				else
					$i=$sep+1;
				$sep=-1;
				$j=$i;
				$l=0;
				$nl++;
			}
			else
				$i++;
		}
		return $nl;
	}
}
?>