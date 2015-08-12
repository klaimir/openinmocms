<?php
/*
InformesGraficosPDF.class.php, v 2.4 2013/05/13

InformesGraficosPDF - Clase para crear informes en formato PDF

Esta librería es propiedad de Ángel Luis Berasuain Ruiz, cualquier uso que pudiera darse
tendrá que estar autorizado expresamente bajo mi supervisión.

Si tienes cualquier sugerencia, duda o comentario, por favor enviámela a:

Ángel Luis Berasuain Ruiz
klaimir@hotmail.com

*/

/* load classes */

require_once("InformesGraficos.class.php");

/* load libraries */

require(PATHINCLUDE_FRAMEWORK_MODELOS."pdf/plantilla_app.php");

/**
*
* InformesGraficosPDF
*
* Clase para crear informes en formato PDF
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  InformesGraficosPDF.class.php, v 2.4 2013/05/13
* @access   public
*/

class InformesGraficosPDF extends InformesGraficos
{
    var $graph_pie; 	// Objeto para representar el gráfico pie
	var $graph_plot; 	// Objeto para representar el gráfico pie
	var $pdf; 			// Objeto para representar el informe pdf
	
	/**
	 * Constructor
	 *
	 */
	 
	function InformesGraficosPDF()
    {  
		parent::InformesGraficos();
		//borramos el directorio temp
		rm( PATHINCLUDE_FRAMEWORK_DOC.'temp/*' );
    }
	
	/**
	 * Genera un diagrama por zonas del municipio seleccionado y lo almacena en un fichero
	 *
	 * @param [id_poblacion]	Indentificador del municipio
	 * @param [filename]		ruta absoluta del fichero
	 *
	 * @return Devuelve true o false
	 */
	
	function GenerarDiagramaZonas($id_poblacion,$filename='')
	{	
		// Creamos el PDF
		$this->pdf = new PDF_App();
		$this->pdf->AddPage();
		// Imagen Pie
		$this->graph_pie = new InformesGraficosPie();
		$this->graph_pie->GenerarDiagramaZonas($id_poblacion,PATHINCLUDE_FRAMEWORK_DOC.'temp/diagrama_pie.png');
		$this->pdf->Image(PATHINCLUDE_FRAMEWORK_DOC.'temp/diagrama_pie.png',NULL,NULL,190,120);
		// Imagen Plot
		$this->graph_plot = new InformesGraficosPlot();
		$this->graph_plot->GenerarDiagramaZonas($id_poblacion,PATHINCLUDE_FRAMEWORK_DOC.'temp/diagrama_plot.png');
		$this->pdf->Image(PATHINCLUDE_FRAMEWORK_DOC.'temp/diagrama_plot.png',NULL,NULL,190,100);
		// Salida del fichero
		$this->pdf->Output($filename);
	}
	
	/**
	 * Genera un diagrama por municipios de la provincia y región seleccionada y lo almacena en un fichero
	 *
	 * @param [provincia]		Indentificador de la municipio
	 * @param [region]			Indentificador de la región
	 * @param [filename]		ruta absoluta del fichero
	 *
	 * @return Devuelve true o false
	 */
	
	function GenerarDiagramaMunicipios($provincia,$region,$filename='')
	{	
		// Creamos el PDF
		$this->pdf = new PDF_App();
		$this->pdf->AddPage();
		// Imagen Pie
		$this->graph_pie = new InformesGraficosPie();
		$this->graph_pie->GenerarDiagramaMunicipios($provincia,$region,PATHINCLUDE_FRAMEWORK_DOC.'temp/diagrama_pie.png');
		$this->pdf->Image(PATHINCLUDE_FRAMEWORK_DOC.'temp/diagrama_pie.png',NULL,NULL,190,120);
		// Imagen Plot
		$this->graph_plot = new InformesGraficosPlot();
		$this->graph_plot->GenerarDiagramaMunicipios($provincia,$region,PATHINCLUDE_FRAMEWORK_DOC.'temp/diagrama_plot.png');
		$this->pdf->Image(PATHINCLUDE_FRAMEWORK_DOC.'temp/diagrama_plot.png',NULL,NULL,190,100);
		// Salida del fichero
		$this->pdf->Output($filename);
	}
	
	/**
	 * Genera un diagrama por provincias y lo almacena en un fichero
	 *
	 * @param [filename]		ruta absoluta del fichero
	 *
	 * @return Devuelve true o false
	 */
	
	function GenerarDiagramaProvincias($filename='')
	{	
		// Creamos el PDF
		$this->pdf = new PDF_App();
		$this->pdf->AddPage();
		// Imagen Pie
		$this->graph_pie = new InformesGraficosPie();
		$this->graph_pie->GenerarDiagramaProvincias(PATHINCLUDE_FRAMEWORK_DOC.'temp/diagrama_provincias_pie.png');
		$this->pdf->Image(PATHINCLUDE_FRAMEWORK_DOC.'temp/diagrama_provincias_pie.png',NULL,NULL,190,120);
		// Imagen Plot
		$this->graph_plot = new InformesGraficosPlot();
		$this->graph_plot->GenerarDiagramaProvincias(PATHINCLUDE_FRAMEWORK_DOC.'temp/diagrama_provincias_plot.png');
		$this->pdf->Image(PATHINCLUDE_FRAMEWORK_DOC.'temp/diagrama_provincias_plot.png',45,NULL,120,100);
		// Salida del fichero
		$this->pdf->Output($filename);
	}
	
	/**
	 * Genera un diagrama por captadores y lo almacena en un fichero
	 *
	 * @param [filename]		ruta absoluta del fichero
	 *
	 * @return Devuelve true o false
	 */
	
	function GenerarDiagramaCaptadores($filename='')
	{	
		// Creamos el PDF
		$this->pdf = new PDF_App();
		$this->pdf->AddPage();
		// Imagen Pie
		$this->graph_pie = new InformesGraficosPie();
		$this->graph_pie->GenerarDiagramaCaptadores(PATHINCLUDE_FRAMEWORK_DOC.'temp/diagrama_captadores_pie.png');
		$this->pdf->Image(PATHINCLUDE_FRAMEWORK_DOC.'temp/diagrama_captadores_pie.png',NULL,NULL,190,120);
		// Imagen Plot
		$this->graph_plot = new InformesGraficosPlot();
		$this->graph_plot->GenerarDiagramaCaptadores(PATHINCLUDE_FRAMEWORK_DOC.'temp/diagrama_captadores_plot.png');
		$this->pdf->Image(PATHINCLUDE_FRAMEWORK_DOC.'temp/diagrama_captadores_plot.png',30,NULL,150,100);
		// Salida del fichero
		$this->pdf->Output($filename);
	}
	
	/**
	 * Genera un diagrama por regiones y lo almacena en un fichero
	 *
	 * @param [provincia]		identificador de la provincia
	 * @param [filename]		ruta absoluta del fichero
	 *
	 * @return Devuelve true o false
	 */
	
	function GenerarDiagramaRegiones($provincia,$filename='')
	{	
		// Creamos el PDF
		$this->pdf = new PDF_App();
		$this->pdf->AddPage();
		// Imagen Pie
		$this->graph_pie = new InformesGraficosPie();
		$this->graph_pie->GenerarDiagramaRegiones($provincia,PATHINCLUDE_FRAMEWORK_DOC.'temp/diagrama_regiones_pie.png');
		$this->pdf->Image(PATHINCLUDE_FRAMEWORK_DOC.'temp/diagrama_regiones_pie.png',NULL,NULL,190,120);
		// Imagen Plot
		$this->graph_plot = new InformesGraficosPlot();
		$this->graph_plot->GenerarDiagramaRegiones($provincia,PATHINCLUDE_FRAMEWORK_DOC.'temp/diagrama_regiones_plot.png');
		$this->pdf->Image(PATHINCLUDE_FRAMEWORK_DOC.'temp/diagrama_regiones_plot.png',NULL,NULL,190,100);
		// Salida del fichero
		$this->pdf->Output($filename);
	}
	
	/**
	 * Genera un diagrama por opciones del region seleccionado y lo almacena en un fichero
	 *
	 * @param [provincia]		Indentificador de la provincia
	 * @param [region]			Indentificador de la región
	 * @param [poblacion]		Indentificador de la población
	 * @param [zona]			Indentificador de la zona
	 * @param [filename]		ruta absoluta del fichero
	 *
	 * @return Devuelve true o false
	 */
	
	function GenerarDiagramaOpciones($provincia,$region,$poblacion,$zona,$filename='')
	{
		// Creamos el PDF
		$this->pdf = new PDF_App();
		$this->pdf->AddPage();
		// Imagen Pie
		$this->graph_pie = new InformesGraficosPie();
		$this->graph_pie->GenerarDiagramaOpciones($provincia,$region,$poblacion,$zona,PATHINCLUDE_FRAMEWORK_DOC.'temp/diagrama_opciones_pie.png');
		$this->pdf->Image(PATHINCLUDE_FRAMEWORK_DOC.'temp/diagrama_opciones_pie.png',NULL,NULL,190,120);
		// Imagen Plot
		$this->graph_plot = new InformesGraficosPlot();
		$this->graph_plot->GenerarDiagramaOpciones($provincia,$region,$poblacion,$zona,PATHINCLUDE_FRAMEWORK_DOC.'temp/diagrama_opciones_plot.png');
		$this->pdf->Image(PATHINCLUDE_FRAMEWORK_DOC.'temp/diagrama_opciones_plot.png',50,NULL,110,85);
		// Salida del fichero
		$this->pdf->Output($filename);
	}
	
	/**
	 * Genera un diagrama por tipología y lo almacena en un fichero
	 *
	  * @param [provincia]		Indentificador de la provincia
	 * @param [region]			Indentificador de la región
	 * @param [poblacion]		Indentificador de la población
	 * @param [zona]			Indentificador de la zona
	 * @param [filename]		ruta absoluta del fichero
	 *
	 * @return Devuelve true o false
	 */
	
	function GenerarDiagramaTipologia($provincia,$region,$poblacion,$zona,$filename='')
	{	
		// Creamos el PDF
		$this->pdf = new PDF_App();
		$this->pdf->AddPage();
		// Imagen Pie
		$this->graph_pie = new InformesGraficosPie();
		$this->graph_pie->GenerarDiagramaTipologia($provincia,$region,$poblacion,$zona,PATHINCLUDE_FRAMEWORK_DOC.'temp/diagrama_tipologia_pie.png');
		$this->pdf->Image(PATHINCLUDE_FRAMEWORK_DOC.'temp/diagrama_tipologia_pie.png',NULL,NULL,190,120);
		// Imagen Plot
		$this->graph_plot = new InformesGraficosPlot();
		$this->graph_plot->GenerarDiagramaTipologia($provincia,$region,$poblacion,$zona,PATHINCLUDE_FRAMEWORK_DOC.'temp/diagrama_tipologia_plot.png');
		$this->pdf->Image(PATHINCLUDE_FRAMEWORK_DOC.'temp/diagrama_tipologia_plot.png',NULL,NULL,190,100);
		// Salida del fichero
		$this->pdf->Output($filename);
	}
}
?>