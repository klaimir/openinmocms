<?php
/*
InformesGraficosPlot.class.php, v 2.4 2013/05/13

InformesGraficosPlot - Clase para crear informes en formato Plot

Esta librería es propiedad de Ángel Luis Berasuain Ruiz, cualquier uso que pudiera darse
tendrá que estar autorizado expresamente bajo mi supervisión.

Si tienes cualquier sugerencia, duda o comentario, por favor enviámela a:

Ángel Luis Berasuain Ruiz
klaimir@hotmail.com

*/

/* load classes */

require_once("InformesGraficos.class.php");

/* load libraries */

require_once(PATHINCLUDE_FRAMEWORK."librerias/jpgraph/src/jpgraph.php");
require_once(PATHINCLUDE_FRAMEWORK."librerias/jpgraph/src/jpgraph_bar.php");

/**
*
* InformesGraficosPlot
*
* Clase para crear informes en formato Plot
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  InformesGraficosPlot.class.php, v 2.4 2013/05/13
* @access   public
*/

class InformesGraficosPlot extends InformesGraficos
{
    var $graph; // Objeto para representar el gráfico
	
	/**
	 * Constructor
	 *
	 */
	 
	function InformesGraficosPlot()
    {  
		parent::InformesGraficos();
    }
	
	/**
	 * Genera un diagrama por zonas del poblacion seleccionado y lo almacena en un fichero
	 *
	 * @param [id_poblacion]	Indentificador del poblacion
	 * @param [filename]		ruta absoluta del fichero
	 *
	 * @return Devuelve true o false
	 */
	
	function GenerarDiagramaZonas($id_poblacion,$filename='')
	{	
		// Conexión Base de datos
		$DB = new Model();			
		// Obtencion de zonas
		$sql_poblaciones = "SELECT * FROM zonas_poblaciones WHERE poblacion=".$id_poblacion;
		$poblaciones = $DB->Execute($sql_poblaciones) or die($DB->ErrorMsg());
		$poblacion = $poblaciones->FetchRow();
		$num_poblaciones = $poblaciones->RecordCount();			
		// Datos
		$data = array();
		// Leyenda
		$legends = array();
		// Se calcula el número de inmmuebles por zonas
		do
		{
			// Obtencion de inmuebles
			$sql_inmuebles = "SELECT * FROM inmuebles WHERE zona=".$poblacion['id_zona']." AND poblacion_inmueble=".$id_poblacion;
			$inmuebles = $DB->Execute($sql_inmuebles) or die($DB->ErrorMsg());
			$inmueble = $inmuebles->FetchRow();
			$num_inmuebles = $inmuebles->RecordCount();
			$dataY[]=$num_inmuebles;
			$dataX[]=$poblacion['id_zona'];
			$legends[]=$poblacion['id_zona'].": ".$poblacion['nombre_zona'].' ('.$num_inmuebles.')';
		} while ($poblacion = $poblaciones->FetchRow());
		
		// Datos del gráfico
		$this->graph = new Graph(700,480);
		$this->graph->SetShadow();
		$this->graph->SetScale("int");
		
		$this->graph->title->Set("INFORME ZONAS: ".formatear_poblacion($id_poblacion));
		$this->graph->title->SetFont(FF_FONT2,FS_BOLD,14);
		$this->graph->title->SetMargin(40);
		
		// Diagrama de barras
		$b1 = new BarPlot($dataY,$dataX);
		$b1->SetAbsWidth(10);
		$b1->SetAlign("center");
		$b1->SetShadow();
		$this->graph->Add($b1);
		
		// Leyenda
		$i=0;
		foreach($legends as $legend)
		{
			$txt = new Text($legend);
			$txt->SetFont(FF_FONT2,FS_BOLD,7);
			$txt->SetParagraphAlign('center'); 
			$txt->SetPos(590,100+($i*20),'center','bottom');
			$txt->SetBox('white','black');
			$this->graph->AddText($txt);
			$i++;
		}

		return $this->graph->Stroke($filename);
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
		// SQL provincia
		if($provincia!="")
		{
			$titulo_informe.=formatear_provincia($provincia);
			$sql_provincia=" AND provincia=".$provincia;
		}
		// SQL region
		if($region!="")
		{
			$titulo_informe.=", ".formatear_region($region);
			$sql_region=" AND region=".$region;
		}	
		// Conexión Base de datos
		$DB = new Model();			
		// Obtencion de zonas
		$sql_poblaciones = "SELECT * FROM poblaciones WHERE 1 ".$sql_region.$sql_provincia;
		$poblaciones = $DB->Execute($sql_poblaciones) or die($DB->ErrorMsg());
		$poblacion = $poblaciones->FetchRow();
		$num_poblaciones = $poblaciones->RecordCount();	
		// Datos
		$data = array();
		// Leyenda
		$legends = array();
		// Se calcula el número de inmmuebles por zonas
		do
		{
			// Obtencion de inmuebles
			$sql_inmuebles = "SELECT * FROM inmuebles WHERE poblacion_inmueble=".$poblacion['id_poblacion'];
			$inmuebles = $DB->Execute($sql_inmuebles) or die($DB->ErrorMsg());
			$inmueble = $inmuebles->FetchRow();
			$num_inmuebles = $inmuebles->RecordCount();
			if($num_inmuebles!=0)
			{
				$dataY[]=$num_inmuebles;
				$dataX[]=$poblacion['id_poblacion'];
				$legends[]=$poblacion['id_poblacion'].": ".$poblacion['poblacion'].' ('.$num_inmuebles.')';
			}
		} while ($poblacion = $poblaciones->FetchRow());
		
		// Datos del gráfico
		$this->graph = new Graph(700,480);
		$this->graph->SetShadow();
		$this->graph->SetScale("int");
		
		$this->graph->title->Set("INFORME MUNICIPIOS: ".$titulo_informe);
		$this->graph->title->SetFont(FF_FONT2,FS_BOLD,14);
		$this->graph->title->SetMargin(40);
		
		// Diagrama de barras
		$b1 = new BarPlot($dataY,$dataX);
		$b1->SetAbsWidth(10);
		$b1->SetAlign("center");
		$b1->SetShadow();
		$this->graph->Add($b1);
		
		// Leyenda
		$i=0;
		foreach($legends as $legend)
		{
			$txt = new Text($legend);
			$txt->SetFont(FF_FONT2,FS_BOLD,7);
			$txt->SetParagraphAlign('center'); 
			$txt->SetPos(540,100+($i*20),'center','bottom');
			$txt->SetBox('white','black');
			$this->graph->AddText($txt);
			$i++;
		}

		return $this->graph->Stroke($filename);
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
		// Conexión Base de datos
		$DB = new Model();			
		// Obtencion de provincias
		$sql_provincias = "SELECT * FROM provincias WHERE 1";
		$provincias = $DB->Execute($sql_provincias) or die($DB->ErrorMsg());
		$provincia = $provincias->FetchRow();
		$num_provincias = $provincias->RecordCount();			
		// Datos
		$data = array();
		// Leyenda
		$legends = array();
		// Se calcula el número de inmmuebles por zonas
		$cont_provincias=1;
		do
		{
			// Obtencion de zonas de provincias
			$sql_inmuebles = "SELECT * FROM inmuebles WHERE provincia_inmueble=".$provincia['id_provincia'];
			$inmuebles = $DB->Execute($sql_inmuebles) or die($DB->ErrorMsg());
			$inmueble = $inmuebles->FetchRow();
			$num_inmuebles = $inmuebles->RecordCount();
			
			if($num_inmuebles!=0)
			{
				$dataY[]=$num_inmuebles;
				$dataX[]=$cont_provincias;
				$legends[]=$cont_provincias.": ".$provincia['provincia'].' ('.$num_inmuebles.')';
				$cont_provincias++;
			}
		} while ($provincia = $provincias->FetchRow());
		
		// Datos del gráfico
		$this->graph = new Graph(550,480);
		$this->graph->SetShadow();
		$this->graph->SetScale("int");
		
		$this->graph->title->Set("INFORME DE PROVINCIAS");
		$this->graph->title->SetFont(FF_FONT2,FS_BOLD,14);
		$this->graph->title->SetMargin(40);
		
		// Diagrama de barras
		$b1 = new BarPlot($dataY,$dataX);
		$b1->SetAbsWidth(10);
		$b1->SetAlign("center");
		$b1->SetShadow();
		$this->graph->Add($b1);
		
		// Leyenda
		$i=0;
		foreach($legends as $legend)
		{
			$txt = new Text($legend);
			$txt->SetFont(FF_FONT2,FS_BOLD,7);
			$txt->SetParagraphAlign('center'); 
			$txt->SetPos(470,100+($i*20),'center','bottom');
			$txt->SetBox('white','black');
			$this->graph->AddText($txt);
			$i++;
		}
		return $this->graph->Stroke($filename);
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
		// Conexión Base de datos
		$DB = new Model();			
		// Obtencion de captadores
		$sql_captadores = "SELECT * FROM usuarios WHERE 1";
		$captadores = $DB->Execute($sql_captadores) or die($DB->ErrorMsg());
		$captador = $captadores->FetchRow();
		$num_captadores = $captadores->RecordCount();			
		// Datos
		$data = array();
		// Leyenda
		$legends = array();
		// Se calcula el número de inmmuebles por zonas
		$cont_captadores=1;
		do
		{
			// Obtencion de zonas de captadores
			$sql_inmuebles = "SELECT * FROM inmuebles WHERE captador=".$captador['id_usuario'];
			$inmuebles = $DB->Execute($sql_inmuebles) or die($DB->ErrorMsg());
			$inmueble = $inmuebles->FetchRow();
			$num_inmuebles = $inmuebles->RecordCount();
			
			if($num_inmuebles!=0)
			{
				$dataY[]=$num_inmuebles;
				$dataX[]=$cont_captadores;
				$legends[]=$cont_captadores.": ".$captador['apellidos'].", ".$captador['nombre'].' ('.$num_inmuebles.')';
				$cont_captadores++;
			}
		} while ($captador = $captadores->FetchRow());
		
		// Datos del gráfico
		$this->graph = new Graph(700,480);
		$this->graph->SetShadow();
		$this->graph->SetScale("int");
		
		$this->graph->title->Set("INFORME POR CAPTADORES");
		$this->graph->title->SetFont(FF_FONT2,FS_BOLD,14);
		$this->graph->title->SetMargin(40);
		
		// Diagrama de barras
		$b1 = new BarPlot($dataY,$dataX);
		$b1->SetAbsWidth(10);
		$b1->SetAlign("center");
		$b1->SetShadow();
		$this->graph->Add($b1);
		
		// Leyenda
		$i=0;
		foreach($legends as $legend)
		{
			$txt = new Text($legend);
			$txt->SetFont(FF_FONT2,FS_BOLD,7);
			$txt->SetParagraphAlign('center'); 
			$txt->SetPos(520,100+($i*20),'center','bottom');
			$txt->SetBox('white','black');
			$this->graph->AddText($txt);
			$i++;
		}
		return $this->graph->Stroke($filename);
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
		// Conexión Base de datos
		$DB = new Model();			
		// Obtencion de zonas de regiones
		$sql_regiones = "SELECT * FROM regiones WHERE provincia_id=".$provincia;
		$regiones = $DB->Execute($sql_regiones) or die($DB->ErrorMsg());
		$region = $regiones->FetchRow();
		$num_regiones = $regiones->RecordCount();			
		// Datos
		$data = array();
		// Leyenda
		$legends = array();
		// Se calcula el número de inmmuebles por zonas
		do
		{
			// Obtencion de zonas de regiones
			$sql_inmuebles = "SELECT * FROM inmuebles WHERE region=".$region['id_region']." AND provincia_inmueble=".$provincia;
			$inmuebles = $DB->Execute($sql_inmuebles) or die($DB->ErrorMsg());
			$inmueble = $inmuebles->FetchRow();
			$num_inmuebles = $inmuebles->RecordCount();
			$dataY[]=$num_inmuebles;
			$dataX[]=$region['id_region'];
			$legends[]=$region['id_region'].": ".$region['nombre_region'].' ('.$num_inmuebles.')';
		} while ($region = $regiones->FetchRow());
		
		// Datos del gráfico
		$this->graph = new Graph(700,480);
		$this->graph->SetShadow();
		$this->graph->SetScale("int");
		
		$this->graph->title->Set("INFORME DE REGIONES");
		$this->graph->title->SetFont(FF_FONT2,FS_BOLD,14);
		$this->graph->title->SetMargin(40);
		
		// Diagrama de barras
		$b1 = new BarPlot($dataY,$dataX);
		$b1->SetAbsWidth(10);
		$b1->SetAlign("center");
		$b1->SetShadow();
		$this->graph->Add($b1);
		
		// Leyenda
		$i=0;
		foreach($legends as $legend)
		{
			$txt = new Text($legend);
			$txt->SetFont(FF_FONT2,FS_BOLD,7);
			$txt->SetParagraphAlign('center'); 
			$txt->SetPos(620,100+($i*20),'center','bottom');
			$txt->SetBox('white','black');
			$this->graph->AddText($txt);
			$i++;
		}

		return $this->graph->Stroke($filename);
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
		// Conexión Base de datos
		$DB = new Model();			
		// Obtencion de opciones
		$sql_opciones = "SELECT * FROM opciones WHERE 1";
		$opciones = $DB->Execute($sql_opciones) or die($DB->ErrorMsg());
		$opcion = $opciones->FetchRow();
		$num_opciones = $opciones->RecordCount();
		// Datos
		$data = array();
		// Leyenda
		$legends = array();
		// SQL provincia
		if($provincia!="")
		{
			$titulo_informe.=formatear_provincia($provincia);
			$sql_provincia=" AND provincia_inmueble=".$provincia;
		}
		// SQL region
		if($region!="")
		{
			$titulo_informe.=", ".formatear_region($region);
			$sql_region=" AND region=".$region;
		}
		// SQL poblacion
		if($poblacion!="")
		{
			$titulo_informe.=", ".formatear_poblacion($poblacion);
			$sql_poblacion=" AND poblacion_inmueble=".$poblacion;
		}
		// SQL zona
		if($zona!="")
		{
			$titulo_informe.=", ".formatear_zona($zona);
			$sql_zona=" AND zona=".$zona;
		}
		// Se calcula el número de inmmuebles por opciones
		do
		{
			// Obtencion de inmuebles por opción
			if($opcion['id_opcion']==1)
				$sql_inmuebles = "SELECT * FROM inmuebles WHERE precio_compra >0".$sql_provincia.$sql_region.$sql_poblacion.$sql_zona;
			else
				$sql_inmuebles = "SELECT * FROM inmuebles WHERE precio_alquiler >0".$sql_provincia.$sql_region.$sql_poblacion.$sql_zona;
			$inmuebles = $DB->Execute($sql_inmuebles) or die($DB->ErrorMsg());
			$inmueble = $inmuebles->FetchRow();
			$num_inmuebles = $inmuebles->RecordCount();
			$dataY[]=$num_inmuebles;
			$dataX[]=$opcion['id_opcion'];
			$legends[]=$opcion['id_opcion'].": ".$opcion['nombre_opcion'].' ('.$num_inmuebles.')';
		} while ($opcion = $opciones->FetchRow());
		
		// Datos del gráfico
		$this->graph = new Graph(250,200);
		$this->graph->SetShadow();
		$this->graph->SetScale("int");
		
		$this->graph->title->Set("INFORME OPCIONES");
		$this->graph->title->SetFont(FF_FONT2,FS_BOLD,10);
		$this->graph->title->SetMargin(10);
		if(isset($titulo_informe))
			$this->graph->subtitle->Set($titulo_informe);
		
		// Diagrama de barras
		$b1 = new BarPlot($dataY,$dataX);
		$b1->SetAbsWidth(10);
		$b1->SetAlign("center");
		$b1->SetShadow();
		$this->graph->Add($b1);
		
		// Leyenda
		$i=0;
		foreach($legends as $legend)
		{
			$txt = new Text($legend);
			$txt->SetFont(FF_FONT2,FS_BOLD,7);
			$txt->SetParagraphAlign('center'); 
			$txt->SetPos(150,100+($i*20),'center','bottom');
			$txt->SetBox('white','black');
			$this->graph->AddText($txt);
			$i++;
		}

		$this->graph->Stroke($filename);
	}
	
	/**
	 * Genera un diagrama por tipología y lo almacena en un fichero
	 *
	 * @param [filename]		ruta absoluta del fichero
	 *
	 * @return Devuelve true o false
	 */
	
	function GenerarDiagramaTipologia($provincia,$region,$poblacion,$zona,$filename='')
	{	
		// Conexión Base de datos
		$DB = new Model();			
		// Obtencion de tipologia
		$sql_tipos = "SELECT * FROM tipos_inmueble WHERE 1";
		$tipos = $DB->Execute($sql_tipos) or die($DB->ErrorMsg());
		$tipo = $tipos->FetchRow();
		$num_tipos = $tipos->RecordCount();
		// Datos
		$data = array();
		// Leyenda
		$legends = array();
		// SQL provincia
		if($provincia!="")
		{
			$titulo_informe.=formatear_provincia($provincia);
			$sql_provincia=" AND provincia_inmueble=".$provincia;
		}
		// SQL region
		if($region!="")
		{
			$titulo_informe.=", ".formatear_region($region);
			$sql_region=" AND region=".$region;
		}
		// SQL poblacion
		if($poblacion!="")
		{
			$titulo_informe.=", ".formatear_poblacion($poblacion);
			$sql_poblacion=" AND poblacion_inmueble=".$poblacion;
		}
		// SQL zona
		if($zona!="")
		{
			$titulo_informe.=", ".formatear_zona($zona);
			$sql_zona=" AND zona=".$zona;
		}
		// Se calcula el número de inmmuebles por zonas
		do
		{
			// Obtencion de inmuebles
			$sql_inmuebles = "SELECT * FROM inmuebles WHERE tipo=".$tipo['id_tipo'].$sql_provincia.$sql_region.$sql_poblacion.$sql_zona;
			$inmuebles = $DB->Execute($sql_inmuebles) or die($DB->ErrorMsg());
			$inmueble = $inmuebles->FetchRow();
			$num_inmuebles = $inmuebles->RecordCount();
			$dataY[]=$num_inmuebles;
			$dataX[]=$tipo['id_tipo'];
			$legends[]=$tipo['id_tipo'].": ".$tipo['nombre_tipo'].' ('.$num_inmuebles.')';
		} while ($tipo = $tipos->FetchRow());
		
		// Datos del gráfico
		$this->graph = new Graph(700,480);
		$this->graph->SetShadow();
		$this->graph->SetScale("int");
		
		$this->graph->title->Set("INFORME POR TIPOLOGÍA");
		$this->graph->title->SetFont(FF_FONT2,FS_BOLD,14);
		$this->graph->title->SetMargin(40);
		if(isset($titulo_informe))
			$this->graph->subtitle->Set($titulo_informe);
		
		// Diagrama de barras
		$b1 = new BarPlot($dataY,$dataX);
		$b1->SetAbsWidth(10);
		$b1->SetAlign("center");
		$b1->SetShadow();
		$this->graph->Add($b1);
		
		// Leyenda
		$i=0;
		foreach($legends as $legend)
		{
			$txt = new Text($legend);
			$txt->SetFont(FF_FONT2,FS_BOLD,7);
			$txt->SetParagraphAlign('center'); 
			$txt->SetPos(580,100+($i*20),'center','bottom');
			$txt->SetBox('white','black');
			$this->graph->AddText($txt);
			$i++;
		}

		$this->graph->Stroke($filename);
	}
}
?>