<?php
/*
InformesCanalNoticiasPDF.class.php, v 2.4 2013/05/13

InformesCanalNoticiasPDF - Clase para crear informes de canales de noticias en formato PDF

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
* InformesCanalNoticiasPDF
*
* Clase para crear informes de canales de noticias en formato PDF
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  InformesCanalNoticiasPDF.class.php, v 2.4 2013/05/13
* @access   public
*/

class InformesCanalNoticiasPDF extends InformesPDF
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
	 * Genera un listado de canales de noticias y lo almacena en un fichero
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
	 * Imprime los filtros aplicados al listado general de canales de noticias
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
		$this->pdf->Cell(140,10,$_SESSION['titulo_busq_canales_noticias'],0,0);
	}
	
	/**
	 * Imprime la cabecera listado de canales de noticias
	 *
	 *
	 * @return Void
	 */

	function CabeceraListado()
	{
		// Obtenemos la gama de colores a usar
		$gama_colores=InformesCanalNoticiasPDF::ObtenerGamaColores($this->color);		
		
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
		$this->pdf->SetWidths(array(90,160,30));
		$this->pdf->SetAligns(array("C","C","C"));

		if(!is_null($this->pos_x))
			$this->pdf->SetX($this->pos_x);
		$this->pdf->Row(array("Título","Descripción","Fecha Alta"),true);						
	}
	
	/**
	 * Imprime una fila del listado de canales de noticias
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
		$gama_colores=$gama_colores=InformesCanalNoticiasPDF::ObtenerGamaColores($this->color);;
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

		$this->pdf->SetWidths(array(90,160,30));
		$this->pdf->SetAligns(array("C","C","C"));

		if(!is_null($this->pos_x))
			$this->pdf->SetX($this->pos_x);
		$this->pdf->Row($array,true);		
	}
	
	/**
	 * Genera una ficha de un canal de noticia con el texto de confidencialidad de datos y lo almacena en un fichero
	 *
	 * @param [id_canal_noticia]	Identificador del canales de noticia
	 * @param [filename]			ruta absoluta del fichero
	 *
	 * @return Devuelve true o false
	 */
	
	function Ficha($id_canal_noticia,$filename='')
	{	
		// Conexión Base de datos
		$DB = new Model();		
		// Consulta
		$consulta = $DB->Execute("SELECT * FROM canales_noticias WHERE id_canal_noticia=".$id_canal_noticia, $conexion) or die($DB->ErrorMsg());
		$row_consulta = $consulta->FetchRow();
		$totalRows_consulta = $consulta->RecordCount();		
		// Creamos el PDF
		$this->pdf = new PDF_App();
		$this->pdf->AddPage();
		// Título
		$this->pdf->SetFont('Arial','BU',$this->tam_letra);
		$this->pdf->Cell(185,5,"FICHA DE CANAL DE NOTICIAS",0,1,"C");
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
			$this->pdf->MultiCell(160,10,"Actualmente no existe ningún canal de noticia con el identificador seleccionado.",0,1);
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
		$this->pdf->Cell(80,10,$datos['titulo'],0,0);
		// Enlace
		$this->pdf->SetFont('Arial','B',$this->tam_letra);
		$this->pdf->Cell(15,10,"Enlace:",0,0);
		$this->pdf->SetFont('Arial','',$this->tam_letra);
		$this->pdf->Cell(70,10,$datos['enlace'],0,1);
		// Descripción
		$this->pdf->SetFont('Arial','B',$this->tam_letra);
		$this->pdf->Cell(25,7,"Descripción:",0,0);
		$this->pdf->SetFont('Arial','',$this->tam_letra);
		$this->pdf->MultiCell(155,7,$datos['descripcion'],0,1);
	}
}
?>