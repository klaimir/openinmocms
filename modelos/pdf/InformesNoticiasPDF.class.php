<?php
/*
InformesNoticiasPDF.class.php, v 2.4 2013/05/13

InformesNoticiasPDF - Clase para crear informes de noticias en formato PDF

Esta librería es propiedad de Ángel Luis Berasuain Ruiz, cualquier uso que pudiera darse
tendrá que estar autorizado expresamente bajo mi supervisión.

Si tienes cualquier sugerencia, duda o comentario, por favor enviámela a:

Ángel Luis Berasuain Ruiz
klaimir@hotmail.com

*/

/* load classes */

require_once("InformesPDF.class.php");
require_once('plantilla_app.php');

/* load libraries */

// No son necesarias librerías adicionales

/**
*
* InformesNoticiasPDF
*
* Clase para crear informes de noticias en formato PDF
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  InformesNoticiasPDF.class.php, v 2.4 2013/05/13
* @access   public
*/

class InformesNoticiasPDF extends InformesPDF
{	
	/**
	 * Constructor
	 *
	 */
	 
	function __construct($color='rojo',$pos_x=NULL,$pos_y=NULL,$tam_letra=8)
    {  
		parent::__construct($color,$pos_x,$pos_y,$tam_letra);
    }
	
	/**
	 * Genera un listado de noticias y lo almacena en un fichero
	 *
	 * @param [sql]				Sql de la consulta
	 * @param [filename]		ruta absoluta del fichero
	 *
	 * @return Devuelve true o false
	 */
	
	function ListadoGeneral($sql,$filename='')
	{	
		// Creamos el PDF
		$this->pdf = new PDF_App('L');
		$this->pdf->AddPage();
		
		// Impresión de los filtros
		$this->FiltrosAplicadosListadoGeneral();
		$this->pdf->Ln(5);
		// Título
		$this->pdf->SetFont('Arial','BU',8);
		$this->pdf->Cell(280,5,"RESULTADOS DE BÚSQUEDA",0,1,"C");
		$this->pdf->Ln(5);
		// Informe del listado en PDF
		$this->Listado($sql);
		// Salida del fichero
		return $this->pdf->Output($filename);
	}
	
	/**
	 * Imprime los filtros aplicados al listado general de noticias
	 *
	 *
	 * @return Void
	 */
	
	function FiltrosAplicadosListadoGeneral()
	{	
		// Título
		$this->pdf->SetFont('Arial','BU',$this->tam_letra);
		$this->pdf->Cell(280,5,"FILTROS APLICADOS",0,1,"C");		
		// Título
		$this->pdf->SetFont('Arial','B',$this->tam_letra);
		$this->pdf->SetX(60);
		$this->pdf->Cell(20,10,"Título:",0,0);
		$this->pdf->SetFont('Arial','',$this->tam_letra);
		$this->pdf->Cell(140,10,$_SESSION['titulo_busq_noticias'],0,0);
		// Publicar
		$this->pdf->SetFont('Arial','B',$this->tam_letra);
		$this->pdf->Cell(20,10,"Publicar:",0,0);
		$this->pdf->SetFont('Arial','',$this->tam_letra);
		if($_SESSION['publicar_busq_noticias']==1)
			$this->pdf->Image(PATHINCLUDE_FRAMEWORK_IMG."publicar.gif",NULL,$this->pdf->GetY()+3,3,3);
		else
			$this->pdf->Image(PATHINCLUDE_FRAMEWORK_IMG."nopublicar.gif",NULL,$this->pdf->GetY()+3,3,3);
		$this->pdf->Ln(5);
	}
	
	/**
	 * Imprime la cabecera listado de noticias
	 *
	 *
	 * @return Void
	 */

	function CabeceraListado()
	{
		// Obtenemos la gama de colores a usar
		$gama_colores=InformesNoticiasPDF::ObtenerGamaColores($this->color);		
		
		$this->pdf->SetFont('Arial','B',$this->tam_letra);
		$this->pdf->SetTextColor(0,0,0);	
		$this->pdf->SetFillColor($gama_colores['cabecera'][0], $gama_colores['cabecera'][1], $gama_colores['cabecera'][2]);
		$this->pdf->SetWidths(array(280));
		$this->pdf->SetAligns(array("C"));

		if(!is_null($this->pos_x))
			$this->pdf->SetX($this->pos_x);
		$this->pdf->Row(array("NOTICIAS"),true);	
		$this->pdf->SetFont('Arial','B',$this->tam_letra);
		$this->pdf->SetFillColor($gama_colores['cabecera2'][0], $gama_colores['cabecera2'][1], $gama_colores['cabecera2'][2]);
		$this->pdf->SetWidths(array(60,190,30));
		$this->pdf->SetAligns(array("C","C","C"));

		if(!is_null($this->pos_x))
			$this->pdf->SetX($this->pos_x);
		$this->pdf->Row(array("Título","Descripción","Fecha Alta"),true);					
	}
	
	/**
	 * Imprime una fila del listado de noticias
	 *
	 * @param [datos]			datos de la fila
	 * @param [contador]		número de fila para imprimir las pares e impares de forma resaltada
	 *
	 * @return void
	 */
	
	function FilaListado($datos,$contador)
	{		
		// Datos
		$array=array($datos['titulo'],$datos['descripcion'],formatea_fecha($datos['tiempo']));
		// Obtenemos la gama de colores a usar
		$gama_colores=$gama_colores=InformesNoticiasPDF::ObtenerGamaColores($this->color);;
		// Si con la columna se supera la página
		if($this->pdf->CheckPageBreak($this->pdf->CalculateHeightRow($array)))
		{
			$this->CabeceraListado();
		}
		// Columna normal
		$this->pdf->SetFont('Arial','',$this->tam_letra);
		$this->pdf->SetTextColor(0,0,0);
		if($contador%2 == 0)
			$this->pdf->SetFillColor($gama_colores['fila'][0], $gama_colores['fila'][1], $gama_colores['fila'][2]);
		else	
			$this->pdf->SetFillColor(255, 255, 255);

		$this->pdf->SetWidths(array(60,190,30));
		$this->pdf->SetAligns(array("C","C","C"));

		if(!is_null($this->pos_x))
			$this->pdf->SetX($this->pos_x);
		$this->pdf->Row($array,true);		
	}
	
	/**
	 * Genera una ficha de un noticia con el texto de confidencialidad de datos y lo almacena en un fichero
	 *
	 * @param [id_noticia]		Identificador del noticia
	 * @param [filename]		ruta absoluta del fichero
	 *
	 * @return Devuelve true o false
	 */
	
	function Ficha($id_noticia,$filename='')
	{	
		// Conexión Base de datos
		$DB = new Model();		
		// Consulta
		$consulta = $DB->Execute("SELECT * FROM noticias WHERE id_noticia=".$id_noticia, $conexion) or die($DB->ErrorMsg());
		$row_consulta = $consulta->FetchRow();
		$totalRows_consulta = $consulta->RecordCount();		
		// Creamos el PDF
		$this->pdf = new PDF_App();
		$this->pdf->AddPage();
		// Título
		$this->pdf->SetFont('Arial','BU',$this->tam_letra);
		$this->pdf->Cell(185,5,"FICHA DE LA NOTICIA",0,1,"C");
		$this->pdf->Ln(5);
		// Si existe
		if ($totalRows_consulta != 0)
		{				
			// Sección principal
			$this->CuerpoFicha($row_consulta);
		}
		else
		{			
			$this->pdf->SetFont('Arial','',$this->tam_letra);
			$this->pdf->MultiCell(160,10,"Actualmente no existe ninguna noticia con el identificador seleccionado.",0,1);
		}
		// Salida del fichero
		return $this->pdf->Output($filename);
	}

	/**
	 * Imprime la sección principal de la ficha de un noticia con todos sus datos asociados
	 *
	 * @param [datos]		datos de la ficha
	 *
	 * @return void
	 */
	 
	function CuerpoFicha($datos) 
	{
		// Título
		$this->pdf->SetFont('Arial','B',$this->tam_letra);
		$this->pdf->Cell(15,10,"Título:",0,0);
		$this->pdf->SetFont('Arial','',$this->tam_letra);
		$this->pdf->Cell(90,10,$datos['titulo'],0,0);
		// Enlace
		$this->pdf->SetFont('Arial','B',$this->tam_letra);
		$this->pdf->Cell(15,10,"Enlace:",0,0);
		$this->pdf->SetFont('Arial','',$this->tam_letra);
		$this->pdf->Cell(50,10,$datos['enlace'],0,0);
		// Publicar
		$this->pdf->SetFont('Arial','B',$this->tam_letra);
		$this->pdf->Cell(15,10,"Publicar",0,0);
		$this->pdf->SetFont('Arial','',$this->tam_letra);
		if($datos['publicar']==1)
			$this->pdf->Image(PATHINCLUDE_FRAMEWORK_IMG."publicar.gif",NULL,$this->pdf->GetY()+3,3,3);
		else
			$this->pdf->Image(PATHINCLUDE_FRAMEWORK_IMG."nopublicar.gif",NULL,$this->pdf->GetY()+3,3,3);
		$this->pdf->Ln(10);
		// Descripción
		$this->pdf->SetFont('Arial','B',$this->tam_letra);
		$this->pdf->Cell(25,7,"Descripción:",0,0);
		$this->pdf->SetFont('Arial','',$this->tam_letra);
		$this->pdf->MultiCell(155,7,$datos['descripcion'],0,1);
	}
}
?>