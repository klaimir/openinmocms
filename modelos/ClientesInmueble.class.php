<?php
/*
ClientesInmueble.class.php, v 2.4 2013/05/13

ModelClientesInmueble - Clase gestionar todas las peticiones y operaciones relacionadas con los clientes de los inmuebles registrados

Esta librer�a es propiedad de �ngel Luis Berasuain Ruiz, cualquier uso que pudiera darse
tendr� que estar autorizado expresamente bajo mi supervisi�n.

Si tienes cualquier sugerencia, duda o comentario, por favor envi�mela a:

�ngel Luis Berasuain Ruiz
klaimir@hotmail.com

*/

/* load classes */

require_once('Model.class.php');

/* load libraries */

// No son necesarias librer�as auxiliares

/**
*
* ModelClientesInmueble
*
* Clase gestionar todas las peticiones y operaciones relacionadas con los clientes de los inmuebles registrados
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  ClientesInmueble.class.php, v 2.4 2013/05/13
* @access   public
*/

class ModelClientesInmueble extends Model
{
    public $cliente;
	public $inmueble;
	
	/**
	 * Constructor
	 *
	 */
	
	function ModelClientesInmueble()
    {  
		parent::Model();
		$this->cliente=NULL;
		$this->inmueble=NULL;
    }
	
	/**
	 * Establecen los datos de los distintos atributos de la clase
	 *
	 * @param [datos]		Datos de configuraci�n
	 *
	 */
	
	function Set($datos)
    {  
		if(isset($datos['cliente'])) $this->cliente=$datos['cliente'];
		if(isset($datos['inmueble'])) $this->inmueble=$datos['inmueble'];
    }
	
	/**
	 * Inserta un cliente de inmueble en la base de datos
	 *
	 * @param [datos]		Datos a insertar
	 *
	 * @return Devuelve true o false
	 */
	 
	function Insert($datos)
    {  
		$insertSQL = sprintf("INSERT INTO clientes_inmuebles (cliente, inmueble) VALUES (%s, %s)", 
				   GetSQLValueString($datos['cliente'], "int"),
				   GetSQLValueString($datos['inmueble'], "text"));
		return $this->Execute($insertSQL) or die($this->ErrorMsg());
    }
	
	/**
	 * Elimina un clientegraf�a de un inmueble de la base de datos
	 *
	 * @param [cliente]			Indentificador del cliente
	 * @param [id_inmueble]		Indentificador del inmueble
	 *
	 * @return Devuelve true o false
	 */
	 
	function Delete($cliente,$inmueble)
    {
		// Se borra su documentaci�n fisica
		full_rmdir(PATHINCLUDE_FRAMEWORK_DOC . "clientes/cliente_".$cliente."/inmueble_".$inmueble);
		// Borramos la asociaci�n
		$sql = sprintf("DELETE FROM clientes_inmuebles WHERE inmueble=%s AND cliente=%s",
							GetSQLValueString($inmueble, "int"),
							GetSQLValueString($cliente, "int"));
		return $this->Execute($sql) or die($this->ErrorMsg());
    }
}
?>