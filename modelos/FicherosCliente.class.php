<?php
/*
FicherosCliente.class.php, v 2.4 2013/05/13

ModelFicherosCliente - Clase gestionar todas las peticiones y operaciones relacionadas con los ficheros de los clientes registrados

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
* ModelFicherosCliente
*
* Clase gestionar todas las peticiones y operaciones relacionadas con los ficheros de los clientes registrados
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  FicherosCliente.class.php, v 2.4 2013/05/13
* @access   public
*/

class ModelFicherosCliente extends Model
{
    public $id_fichero;
	public $cliente;
	public $fichero;
	public $texto_fichero;
	
	/**
	 * Constructor
	 *
	 */
	
	function ModelFicherosCliente()
    {  
		parent::Model();
		$this->id_fichero=NULL;
		$this->cliente=NULL;
		$this->fichero=NULL;
		$this->texto_fichero=NULL;
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
		if(isset($datos['cliente'])) $this->cliente=$datos['cliente'];
		if(isset($datos['fichero'])) $this->fichero=$datos['fichero'];
		if(isset($datos['texto_fichero'])) $this->texto_fichero=$datos['texto_fichero'];
    }
	
	/**
	 * Inserta un fichero de cliente en la base de datos
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
			$sql_atribs = "SELECT max(id_fichero) as ultimo_id FROM ficheros_cliente WHERE cliente='".$datos['cliente']."'";
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
		$insertSQL = sprintf("INSERT INTO ficheros_cliente (id_fichero, cliente, fichero, texto_fichero) VALUES (%s, %s, %s, %s)", 
				   GetSQLValueString($id_fichero, "int"),
				   GetSQLValueString($datos['cliente'], "text"),
				   GetSQLValueString($datos['fichero'], "text"),
				   GetSQLValueString($datos['texto_fichero'], "text"));
		return $this->Execute($insertSQL) or die($this->ErrorMsg());
    }
	
	/**
	 * Elimina un fichero de un cliente de la base de datos
	 *
	 * @param [id_fichero]			Indentificador de la ficherografía
	 * @param [cliente]		Indentificador del cliente
	 *
	 * @return Devuelve true o false
	 */
	 
	function Delete($id_fichero,$cliente)
    {  
		// Consulta para obtener el nombre de la fichero
		$sql_atribs="SELECT * FROM ficheros_cliente WHERE cliente=".$cliente." AND id_fichero=".$id_fichero;
		$atribs = $this->Execute($sql_atribs) or die($this->ErrorMsg());
		$num_atribs = $atribs->RecordCount();
		$atrib = $atribs->FetchRow();
		// Finalmente borra la ficherografía
		$sql = sprintf("DELETE FROM ficheros_cliente WHERE cliente=%s AND id_fichero=%s",
							GetSQLValueString($cliente, "int"),
							GetSQLValueString($id_fichero, "int"));
		$this->Execute($sql) or die($this->ErrorMsg());
		// Borramos la ficheros asociadas
		$path_fichero=PATHINCLUDE_FRAMEWORK_DOC . "clientes/cliente_".$cliente."/adjuntos/".$atrib['fichero'];
		unlink($path_fichero);
    }
}
?>