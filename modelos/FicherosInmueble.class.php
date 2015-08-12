<?php
/*
FicherosInmueble.class.php, v 2.4 2013/05/13

ModelFicherosInmueble - Clase gestionar todas las peticiones y operaciones relacionadas con los ficheros de los inmuebles registrados

Esta librería es propiedad de Ángel Luis Berasuain Ruiz, cualquier uso que pudiera darse
tendrá que estar autorizado expresamente bajo mi supervisión.

Si tienes cualquier sugerencia, duda o comentario, por favor enviámela a:

Ángel Luis Berasuain Ruiz
klaimir@hotmail.com

*/

/* load classes */

require_once('Model.class.php');

/* load libraries */

// No son necesarias librerías auxiliares

/**
*
* ModelFicherosInmueble
*
* Clase gestionar todas las peticiones y operaciones relacionadas con los ficheros de los inmuebles registrados
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  FicherosInmueble.class.php, v 2.4 2013/05/13
* @access   public
*/

class ModelFicherosInmueble extends Model
{
    public $id_fichero;
	public $inmueble;
	public $fichero;
	public $texto_fichero;
	public $tipo_fichero;
	
	/**
	 * Constructor
	 *
	 */
	
	function ModelFicherosInmueble()
    {  
		parent::Model();
		$this->id_fichero=NULL;
		$this->inmueble=NULL;
		$this->fichero=NULL;
		$this->texto_fichero=NULL;
		$this->tipo_fichero=NULL;
    }
	
	/**
	 * Establecen los datos de los distintos atributos de la clase
	 *
	 * @param [datos]		Datos de configuración
	 *
	 */
	
	function Set($datos)
    {  
		if(isset($datos['id_fichero'])) $this->id_fichero=$datos['id_fichero'];
		if(isset($datos['inmueble'])) $this->inmueble=$datos['inmueble'];
		if(isset($datos['fichero'])) $this->fichero=$datos['fichero'];
		if(isset($datos['texto_fichero'])) $this->texto_fichero=$datos['texto_fichero'];
		if(isset($datos['tipo_fichero'])) $this->tipo_fichero=$datos['tipo_fichero'];
    }
	
	/**
	 * Inserta un fichero de inmueble en la base de datos
	 *
	 * @param [datos]		Datos a insertar
	 *
	 * @return Devuelve true o false
	 */
	 
	function Insert($datos)
    {  
		// si el id_fichero es nulo, se busca el siguiente que le corresponde 
		if(is_null($datos['id_fichero']))
		{	
			// Se obtiene el último id insertado
			$sql_atribs = "SELECT max(id_fichero) as ultimo_id FROM ficheros_inmuebles WHERE inmueble='".$datos['inmueble']."'";
			$atribs = $this->Execute($sql_atribs) or die($this->ErrorMsg());
			$num_atribs = $atribs->RecordCount();
			$atrib = $atribs->FetchRow();
		
			if(is_null($atrib['ultimo_id']))
			{
				$id_fichero=1;
			}
			else
			{
				$id_fichero = $atrib['ultimo_id']+1;
			}
		}
		// Se inserta los valores de los datos
		$insertSQL = sprintf("INSERT INTO ficheros_inmuebles (id_fichero, inmueble, fichero, texto_fichero, tipo_fichero) VALUES (%s, %s, %s, %s, %s)", 
				   GetSQLValueString($id_fichero, "int"),
				   GetSQLValueString($datos['inmueble'], "text"),
				   GetSQLValueString($datos['fichero'], "text"),
				   GetSQLValueString($datos['texto_fichero'], "text"),
				   GetSQLValueString($datos['tipo_fichero'], "text"));
		return $this->Execute($insertSQL) or die($this->ErrorMsg());
    }
	
	/**
	 * Elimina un fichero de un inmueble de la base de datos
	 *
	 * @param [id_fichero]		Indentificador del fichero
	 * @param [inmueble]		Indentificador del inmueble
	 *
	 * @return Devuelve true o false
	 */
	 
	function Delete($id_fichero,$inmueble)
    {  
		// Consulta para obtener el nombre de la fichero
		$sql_atribs="SELECT * FROM ficheros_inmuebles WHERE inmueble=".$inmueble." AND id_fichero=".$id_fichero;
		$atribs = $this->Execute($sql_atribs) or die($this->ErrorMsg());
		$num_atribs = $atribs->RecordCount();
		$atrib = $atribs->FetchRow();
		// Finalmente borra la ficherografía
		$sql = sprintf("DELETE FROM ficheros_inmuebles WHERE inmueble=%s AND id_fichero=%s",
							GetSQLValueString($inmueble, "int"),
							GetSQLValueString($id_fichero, "int"));
		$this->Execute($sql) or die($this->ErrorMsg());
		// Según el tipo de fichero se borrará de una determinada carpeta
		switch($atrib['tipo_fichero'])
		{
			case '1': $nombre_carpeta="adjuntos"; break;
			case '2': $nombre_carpeta="fotos"; break;
			case '3': $nombre_carpeta="planos"; break;
			case '4': $nombre_carpeta="videos"; break;
			case '5': $nombre_carpeta="cert_energetica"; break;
		}
		// Borramos la ficheros asociadas
		$path_fichero=PATHINCLUDE_FRAMEWORK_DOC . "inmuebles/inmueble_".$inmueble."/".$nombre_carpeta."/".$atrib['fichero'];
		unlink($path_fichero);
    }
}
?>