<?php
/*
Noticias.class.php, v 2.4 2013/05/13

ModelNoticias - Clase gestionar todas las peticiones y operaciones relacionadas con los noticias registradas

Esta librería es propiedad de Ángel Luis Berasuain Ruiz, cualquier uso que pudiera darse
tendrá que estar autorizado expresamente bajo mi supervisión.

Si tienes cualquier sugerencia, duda o comentario, por favor enviámela a:

Ángel Luis Berasuain Ruiz
klaimir@hotmail.com

*/

/* load classes */

require_once('Model.class.php');

/* load libraries */

require_once(PATHINCLUDE_FRAMEWORK_LIBRERIAS.'Translator.class.php');

/**
*
* ModelNoticias
*
* Clase gestionar todas las peticiones y operaciones relacionadas con las noticias registradas
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  Noticias.class.php, v 2.4 2013/05/13
* @access   public
*/

class ModelNoticias extends Model
{
    public $id_noticia;
	public $titulo;
	public $descripcion;
	public $enlace;
	public $tiempo;
	public $publicar;
	
	/**
	 * Constructor
	 *
	 */
	
	function ModelNoticias()
    {  
		parent::Model();
		$this->id_noticia=NULL;
		$this->titulo=NULL;
		$this->descripcion=NULL;
		$this->enlace=NULL;
		$this->tiempo=NULL;
		$this->publicar=NULL;
    }
	
	/**
	 * Establecen los datos de los distintos atributos de la clase
	 *
	 * @param [datos]		Datos de configuración
	 *
	 */
	
	function Set($datos)
    {  
		if(isset($datos['id_noticia'])) $this->id_noticia=$datos['id_noticia'];
		if(isset($datos['titulo'])) $this->titulo=$datos['titulo'];
		if(isset($datos['descripcion'])) $this->descripcion=$datos['descripcion'];
		if(isset($datos['enlace'])) $this->enlace=$datos['enlace'];
		if(isset($datos['tiempo'])) $this->tiempo=$datos['tiempo'];
		if(isset($datos['publicar'])) $this->publicar=$datos['publicar'];
    }
	
	/**
	 * Inserta un noticia en la base de datos
	 *
	 * @param [datos]		Array con los diferentes valores a insertar
	 *
	 * @return Devuelve el último identificador insertado o false en caso contrario
	 */
	 
	function Insert($datos)
    {  
		$sql = "SELECT * FROM noticias WHERE id_noticia = -1";
		$rs = $this->Execute($sql);
		$insertSQL = $this->GetInsertSQL($rs,$datos);
		$this->Execute($insertSQL) or die($this->ErrorMsg());
		return $this->Insert_ID('noticias','id_noticia');
    }
	
	/**
	 * Realiza el proceso de actualización de un noticia
	 *
	 * @param [datos]			Array con los diferentes valores a editar
	 * @param [id_noticia]		Identificador de la noticia
	 *
	 * @return Devuelve true o false
	 */
	 
	function Update($datos,$id_noticia)
    {
		$sql = "SELECT * FROM noticias WHERE id_noticia = '".$id_noticia."'";
		$rs = $this->Execute($sql);
		$rs_row = $rs->FetchRow();
		// Si hay diferencia, actualiza
		if(array_diff($rs_row,$datos))
		{
			$UpdateSQL = $this->GetUpdateSQL($rs,$datos);
			return $this->Execute($UpdateSQL) or die($this->ErrorMsg());
		}
		else
			return true;
    }
	
	/**
	 * Elimina un noticia de la base de datos
	 *
	 * @param [id_noticia]	Indentificador de la noticias
	 *
	 * @return Devuelve true o false
	 */
	 
	function Delete($id_noticia)
    {  
		$sql = "DELETE FROM noticias WHERE id_noticia='".$id_noticia."'";
		return $this->Execute($sql) or die($this->ErrorMsg());
    }
	
	/**
	 * Crea el fichero RSS en la ruta especificada
	 *
	 *
	 * @return Devuelve true o false
	 */
	function GenerarFicherosRSS()
	{
		// Conexión Base de datos
		$DB = new Model();
		// Se leen todas las noticias publicadas
		$sql_consulta="SELECT * FROM noticias WHERE publicar=1 ORDER BY tiempo";
		$noticias = $DB->Execute($sql_consulta) or die($DB->ErrorMsg());
		// Convertimos en vector las noticias
		$vector_noticias=ObtenerVectorResultados($noticias);
		// Vector de idiomas
		$idiomas=array("en","de","fr","es");
		//Se genera un fichero por cada idioma
		foreach($idiomas as $idioma)
		{		
			ModelNoticias::GenerarFicheroRSSIdioma($vector_noticias,PATHINCLUDE_FRAMEWORK_DOC."rss_".$idioma.".xml","es|".$idioma);
		}
		// Si todo fue bien
		return true;
	}
	
	/**
	 * Crea el fichero RSS en la ruta especificada
	 *
	 * @param [noticias]	Vector de noticias a publicar
	 * @param [ruta]		ruta absoluta donde se alojará el fichero rss
	 * @param [langpair]	Cadena que representa el par de traducción
	 *
	 * @return Devuelve true o false
	 */
	function GenerarFicheroRSSIdioma($noticias,$ruta,$lanpair)
	{
		// Par de traducción
		$translator = Translator::getInstance();
		$translator->SetLangPair($lanpair);
		//comienzo a escribir el código del RSS
		$texto_rss .=  '<?xml version="1.0" encoding="ISO-8859-1"?>';
		$texto_rss .=  '<?xml-stylesheet type="text/css" href="'.$_SESSION['rutacss'].'rss.css" ?>';
		//Cabeceras del RSS
		$texto_rss .=  '<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd">';
		//Datos generales del Canal. Edítalos conforme a tus necesidades
		$texto_rss .=  "<channel>\n";
		$texto_rss .=  "<title>".$translator->TraducirTexto(TITLE_RSS_FRAMEWORK)."</title>";
		$texto_rss .=  "<link>".LINK_RSS_FRAMEWORK."</link>";
		$texto_rss .=  "<description>".$translator->TraducirTexto(DESCRIPTION_RSS_FRAMEWORK)."</description>";
		$texto_rss .=  "<language>es-es</language>";
		$texto_rss .=  "<copyright>".COPYRIGHT_RSS_FRAMEWORK."</copyright>\n";
		// para cada registro encontrado en la base de datos tengo que crear la entrada RSS en un item
		if(count($noticias)!=0)
		{
			foreach($noticias as $noticia)
			{
			   //elimino caracteres extraños en campos susceptibles de tenerlos
			   $titulo=clrAll($translator->TraducirTexto($noticia["titulo"]));         
			   $desc=clrAll($translator->TraducirTexto($noticia["descripcion"]));
				// Datos de cada iteem
			   $texto_rss .=  "<item>\n";
			   $texto_rss .=  "<title>$titulo</title>\n";
			   $texto_rss .=  "<description>$desc</description>\n";
			   $texto_rss .=  "<link>" . $noticia["enlace"] . "</link>\n";
			   $texto_rss .=  "<pubDate>". formatea_fecha($noticia['tiempo'])."</pubDate>\n";
			   $texto_rss .=  "</item>\n";
			}
		}
		//cierro las etiquetas del XML
		$texto_rss .=  "</channel>";
		$texto_rss .=  "</rss>";
		// Escribir en el fichero
		$file = fopen($ruta, "w");
		fwrite($file, $texto_rss);
		fclose($file);
		return true;
	}
}
?>