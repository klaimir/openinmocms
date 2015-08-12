<?php
/*
EnlacesInmueble.class.php, v 2.4 2013/05/13

ModelEnlacesInmueble - Clase gestionar todas las peticiones y operaciones relacionadas con los enlaces de los inmuebles registrados

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
* ModelEnlacesInmueble
*
* Clase gestionar todas las peticiones y operaciones relacionadas con los enlaces de los inmuebles registrados
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  EnlacesInmueble.class.php, v 2.4 2013/05/13
* @access   public
*/

class ModelEnlacesInmueble extends Model
{
    public $id_enlace;
	public $inmueble;
	public $url;
	public $texto_enlace;
	
	/**
	 * Constructor
	 *
	 */
	
	function ModelEnlacesInmueble()
    {  
		parent::Model();
		$this->id_enlace=NULL;
		$this->inmueble=NULL;
		$this->url=NULL;
		$this->texto_enlace=NULL;
    }
	
	/**
	 * Establecen los datos de los distintos atributos de la clase
	 *
	 * @param [datos]		Datos de configuración
	 *
	 */
	
	function Set($datos)
    {  
		if(isset($datos['id_enlace'])) $this->id_enlace=$datos['id_enlace'];
		if(isset($datos['inmueble'])) $this->inmueble=$datos['inmueble'];
		if(isset($datos['url'])) $this->url=$datos['url'];
		if(isset($datos['texto_enlace'])) $this->texto_enlace=$datos['texto_enlace'];
    }
	
	/**
	 * Inserta un enlace de inmueble en la base de datos
	 *
	 * @param [datos]		Datos a insertar
	 *
	 * @return Devuelve true o false
	 */
	 
	function Insert($datos)
    {  
		// si el id_enlace es nulo, se busca el siguiente que le corresponde 
		if(is_null($datos['id_enlace']))
		{	
			// Se obtiene el último id insertado
			$sql_atribs = "SELECT max(id_enlace) as ultimo_id FROM enlaces_inmueble WHERE inmueble='".$datos['inmueble']."'";
			$atribs = $this->Execute($sql_atribs) or die($this->ErrorMsg());
			$num_atribs = $atribs->RecordCount();
			$atrib = $atribs->FetchRow();
		
			if(is_null($atrib['ultimo_id']))
			{
				$id_enlace=1;
			}
			else
			{
				$id_enlace = $atrib['ultimo_id']+1;
			}
		}
		// Se inserta los valores de los datos
		$insertSQL = sprintf("INSERT INTO enlaces_inmueble (id_enlace, inmueble, url, texto_enlace) VALUES (%s, %s, %s, %s)", 
				   GetSQLValueString($id_enlace, "int"),
				   GetSQLValueString($datos['inmueble'], "text"),
				   GetSQLValueString($datos['url'], "text"),
				   GetSQLValueString($datos['texto_enlace'], "text"));
		return $this->Execute($insertSQL) or die($this->ErrorMsg());
    }
	
	/**
	 * Realiza el proceso de actualización de un enlace de un inmueble
	 *
	 * @param [datos]			Array con los diferentes valores a editar
	 * @param [id_enlace]		Indentificador del enlace
	 * @param [inmueble]		Indentificador del inmueble
	 *
	 * @return Devuelve true o false
	 */
	 
	function Update($datos,$id_enlace,$inmueble)
    {
		// Actualización
		$sql = "SELECT * FROM enlaces_inmueble WHERE id_enlace = '".$id_enlace."' AND inmueble = '".$inmueble."'";
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
	 * Elimina un enlace de un inmueble de la base de datos
	 *
	 * @param [id_enlace]		Indentificador del enlace
	 * @param [inmueble]		Indentificador del inmueble
	 *
	 * @return Devuelve true o false
	 */
	 
	function Delete($id_enlace,$inmueble)
    {
		$sql = sprintf("DELETE FROM enlaces_inmueble WHERE inmueble=%s AND id_enlace=%s",
							GetSQLValueString($inmueble, "int"),
							GetSQLValueString($id_enlace, "int"));
		$this->Execute($sql) or die($this->ErrorMsg());
    }
}
?>