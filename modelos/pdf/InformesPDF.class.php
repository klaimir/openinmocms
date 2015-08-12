<?php
/*
InformesPDF.class.php, v 2.4 2013/05/13

InformesPDF - Clase para crear informes en formato PDF

Esta librería es propiedad de Ángel Luis Berasuain Ruiz, cualquier uso que pudiera darse
tendrá que estar autorizado expresamente bajo mi supervisión.

Si tienes cualquier sugerencia, duda o comentario, por favor enviámela a:

Ángel Luis Berasuain Ruiz
klaimir@hotmail.com

*/

/* load classes */

// No son necesarias clases adicionales

/* load libraries */

require_once(PATHINCLUDE_FRAMEWORK_MODELOS."pdf/plantilla_app.php");

/**
*
* InformesPDF
*
* Clase para crear informes en formato PDF
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  InformesPDF.class.php, v 2.4 2013/05/13
* @access   public
*/

class InformesPDF
{
	var $pdf; 			// Objeto para representar el informe pdf
	var $color;
	var $pos_x;
	var $pos_y;
	var $tam_letra;
	
	/**
	 * Constructor
	 *
	 */
	 
	function __construct($color='rojo',$pos_x=NULL,$pos_y=NULL,$tam_letra=8)
    {  
		$this->pdf=NULL;
		$this->color=$color;
		$this->pos_x=$pos_x;
		$this->pos_y=$pos_y;
		$this->tam_letra=$tam_letra;
    }
	
	/**
	 * Imprime un listado de inmuebles en formato tabla
	 *
	 * @param [sql]			sql del listado
	 *
	 * @return void
	 */
	
	function Listado($sql)
	{	
		// Conexión Base de datos
		$DB = new Model();		
		// Consulta
		$consulta = $DB->Execute($sql) or die($DB->ErrorMsg());
		$row_consulta = $consulta->FetchRow();
		$totalRows_consulta = $consulta->RecordCount();
		
		if ($totalRows_consulta != 0)
		{				
			if(!is_null($this->pos_y))
				$this->pdf->SetY($this->pos_y);
			// Cabecera Tabla
			$this->CabeceraListado();
			// Filas
			$i=0;
			do
			{
				$this->FilaListado($row_consulta,$i);
				++$i;
			} while ($row_consulta = $consulta->FetchRow());	
		}
		else
		{			
			if(!is_null($this->pos_x))
				$this->pdf->SetX($this->pos_x);
			$this->pdf->SetFont('Arial','',$this->tam_letra);
			$this->pdf->MultiCell(160,10,"Actualmente no existen elementos con los criterios de búsqueda seleccionados.",0,1);
		}
	}
	
	/**
	 * Obtiene los valores en RGB de la gama de colores que se le pasa como parámetro
	 *
	 * @param [color]		gama de color
	 *
	 * @return Devuelve un vector con la gama de colores
	 */
	 
	public static function ObtenerGamaColores($color)
	{
		switch($color)
		{
			case 'azul':	
				//Gama para la cabecera principal
				$gama_colores['cabecera'][0]=29;
				$gama_colores['cabecera'][1]=88;
				$gama_colores['cabecera'][2]=136;
				//Gama para la cabecera secundaria
				$gama_colores['cabecera2'][0]=45;
				$gama_colores['cabecera2'][1]=115;
				$gama_colores['cabecera2'][2]=172;
				//Gama para las filas que llevan color
				$gama_colores['fila'][0]=220;
				$gama_colores['fila'][1]=234;
				$gama_colores['fila'][2]=245;
				//Gama para la fila de los totales
				$gama_colores['totales'][0]=200;
				$gama_colores['totales'][1]=218;
				$gama_colores['totales'][2]=232;														
				break;			   											 				 
			case 'verde':
				//Gama para la cabecera principal
				$gama_colores['cabecera'][0]=0;
				$gama_colores['cabecera'][1]=102;
				$gama_colores['cabecera'][2]=0;
				//Gama para la cabecera secundaria
				$gama_colores['cabecera2'][0]=51;
				$gama_colores['cabecera2'][1]=153;
				$gama_colores['cabecera2'][2]=51;
				//Gama para las filas que llevan color
				$gama_colores['fila'][0]=153;
				$gama_colores['fila'][1]=204;
				$gama_colores['fila'][2]=153;
				//Gama para la fila de los totales
				$gama_colores['totales'][0]=102;
				$gama_colores['totales'][1]=204;
				$gama_colores['totales'][2]=102;														
				break;				
			case 'naranja':
				//Gama para la cabecera principal
				$gama_colores['cabecera'][0]=209;
				$gama_colores['cabecera'][1]=119;
				$gama_colores['cabecera'][2]=23;
				//Gama para la cabecera secundaria
				$gama_colores['cabecera2'][0]=215;
				$gama_colores['cabecera2'][1]=143;
				$gama_colores['cabecera2'][2]=66;
				//Gama para las filas que llevan color
				$gama_colores['fila'][0]=240;
				$gama_colores['fila'][1]=214;
				$gama_colores['fila'][2]=186;
				//Gama para la fila de los totales
				$gama_colores['totales'][0]=222;
				$gama_colores['totales'][1]=178;
				$gama_colores['totales'][2]=131;														
				break;								
			case 'marron':
				//Gama para la cabecera principal
				$gama_colores['cabecera'][0]=139;
				$gama_colores['cabecera'][1]=69;
				$gama_colores['cabecera'][2]=19;
				//Gama para la cabecera secundaria
				$gama_colores['cabecera2'][0]=160;
				$gama_colores['cabecera2'][1]=82;
				$gama_colores['cabecera2'][2]=45;
				//Gama para las filas que llevan color
				$gama_colores['fila'][0]=222;
				$gama_colores['fila'][1]=184;
				$gama_colores['fila'][2]=135;
				//Gama para la fila de los totales
				$gama_colores['totales'][0]=205;
				$gama_colores['totales'][1]=133;
				$gama_colores['totales'][2]=63;														
				break;				
			case 'turquesa':
				//Gama para la cabecera principal
				$gama_colores['cabecera'][0]=0;
				$gama_colores['cabecera'][1]=128;
				$gama_colores['cabecera'][2]=128;
				//Gama para la cabecera secundaria
				$gama_colores['cabecera2'][0]=0;
				$gama_colores['cabecera2'][1]=139;
				$gama_colores['cabecera2'][2]=139;
				//Gama para las filas que llevan color
				$gama_colores['fila'][0]=175;
				$gama_colores['fila'][1]=238;
				$gama_colores['fila'][2]=238;
				//Gama para la fila de los totales
				$gama_colores['totales'][0]=32;
				$gama_colores['totales'][1]=178;
				$gama_colores['totales'][2]=170;														
				break;
			case 'verde2':
				//Gama para la cabecera principal
				$gama_colores['cabecera'][0]=47;
				$gama_colores['cabecera'][1]=79;
				$gama_colores['cabecera'][2]=79;
				//Gama para la cabecera secundaria
				$gama_colores['cabecera2'][0]=95;
				$gama_colores['cabecera2'][1]=158;
				$gama_colores['cabecera2'][2]=160;
				//Gama para las filas que llevan color
				$gama_colores['fila'][0]=224;
				$gama_colores['fila'][1]=255;
				$gama_colores['fila'][2]=255;
				//Gama para la fila de los totales
				$gama_colores['totales'][0]=175;
				$gama_colores['totales'][1]=238;
				$gama_colores['totales'][2]=238;														
				break;
			case 'lila':
				//Gama para la cabecera principal
				$gama_colores['cabecera'][0]=147;
				$gama_colores['cabecera'][1]=112;
				$gama_colores['cabecera'][2]=219;
				//Gama para la cabecera secundaria
				$gama_colores['cabecera2'][0]=106;
				$gama_colores['cabecera2'][1]=90;
				$gama_colores['cabecera2'][2]=205;
				//Gama para las filas que llevan color
				$gama_colores['fila'][0]=216;
				$gama_colores['fila'][1]=191;
				$gama_colores['fila'][2]=216;
				//Gama para la fila de los totales
				$gama_colores['totales'][0]=147;
				$gama_colores['totales'][1]=112;
				$gama_colores['totales'][2]=219;														
				break;	
			case 'rojo':
				//Gama para la cabecera principal
				$gama_colores['cabecera'][0]=187;
				$gama_colores['cabecera'][1]=70;
				$gama_colores['cabecera'][2]=70;							
				//Gama para la cabecera secundaria  
				$gama_colores['cabecera2'][0]=198;
				$gama_colores['cabecera2'][1]=99;
				$gama_colores['cabecera2'][2]=99;
				//Gama para las filas que llevan color  
				$gama_colores['fila'][0]=220;
				$gama_colores['fila'][1]=172;
				$gama_colores['fila'][2]=172;
				//Gama para la fila de los totales
				$gama_colores['totales'][0]=201;
				$gama_colores['totales'][1]=112;
				$gama_colores['totales'][2]=112;														
				break;
			case 'blanco':
				//Gama para la cabecera principal
				$gama_colores['cabecera'][0]=255;
				$gama_colores['cabecera'][1]=255;
				$gama_colores['cabecera'][2]=255;							
				//Gama para la cabecera secundaria  
				$gama_colores['cabecera2'][0]=255;
				$gama_colores['cabecera2'][1]=255;
				$gama_colores['cabecera2'][2]=255;
				//Gama para las filas que llevan color  
				$gama_colores['fila'][0]=255;
				$gama_colores['fila'][1]=255;
				$gama_colores['fila'][2]=255;
				//Gama para la fila de los totales
				$gama_colores['totales'][0]=255;
				$gama_colores['totales'][1]=255;
				$gama_colores['totales'][2]=255;														
				break;
		}
		
		return $gama_colores;
	}
}
?>