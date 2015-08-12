<?php
/*
FichasVisitaCliente.class.php, v 2.4 2013/05/13

ModelFichasVisitaCliente - Clase gestionar todas las peticiones y operaciones relacionadas con las fichas de visita de los clientes registrados

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
* ModelFichasVisitaCliente
*
* Clase gestionar todas las peticiones y operaciones relacionadas on las fichas de visita de los clientes registrados
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  FichasVisitaCliente.class.php, v 2.4 2013/05/13
* @access   public
*/

class ModelFichasVisitaCliente extends Model
{
    public $id_ficha_visita;
	public $cliente;
	public $nombre;
	public $apellidos;
	public $nif;
	public $domicilio;
	public $provincia;
	public $poblacion;
	public $observaciones;
	public $fecha;
	public $agente;
	
	/**
	 * Constructor
	 *
	 */
	
	function ModelFichasVisitaCliente()
    {  
		parent::Model();
		$this->id_ficha_visita=NULL;
		$this->cliente=NULL;
		$this->nombre=NULL;
		$this->apellidos=NULL;
		$this->nif=NULL;
		$this->domicilio=NULL;
		$this->provincia=NULL;
		$this->poblacion=NULL;
		$this->observaciones=NULL;
		$this->fecha=NULL;
		$this->agente=NULL;
    }
	
	/**
	 * Establecen los datos de los distintos atributos de la clase
	 *
	 * @param [datos]		Datos de configuración
	 *
	 */
	
	function Set($datos)
    {  
		if(isset($datos['id_ficha_visita'])) $this->id_ficha_visita=$datos['id_ficha_visita'];
		if(isset($datos['cliente'])) $this->cliente=$datos['cliente'];
		if(isset($datos['nombre'])) $this->nombre=$datos['nombre'];
		if(isset($datos['apellidos'])) $this->apellidos=$datos['apellidos'];
		if(isset($datos['nif'])) $this->nif=$datos['nif'];
		if(isset($datos['domicilio'])) $this->domicilio=$datos['domicilio'];
		if(isset($datos['provincia'])) $this->provincia=$datos['provincia'];
		if(isset($datos['poblacion'])) $this->poblacion=$datos['poblacion'];		
		if(isset($datos['observaciones'])) $this->observaciones=$datos['observaciones'];
		if(isset($datos['fecha'])) $this->fecha=$datos['fecha'];
		if(isset($datos['agente'])) $this->agente=$datos['agente'];
    }
	
	/**
	 * Establecen los datos de los distintos atributos de la clase según los valores del identificador suministrado
	 *
	 * @param [cliente]		Identificador
	 *
	 */
	
	function SetDataObject($id_ficha_visita,$cliente)
    {  
		$sql = "SELECT * FROM fichas_visita_cliente WHERE id_ficha_visita = ".$id_ficha_visita." AND cliente = ".$cliente;
		$rs = $this->Execute($sql);
		$rs_row = $rs->FetchRow();
		$this->Set($rs_row);
    }
	
	/**
	 * Inserta una ficha de visita en la base de datos
	 *
	 * @param [datos]		Datos a insertar
	 *
	 * @return El último identificador calculado
	 */
	 
	function Insert($datos)
    {
		// Se obtiene el último id insertado
		$sql_atribs = "SELECT max(id_ficha_visita) as ultimo_id FROM fichas_visita_cliente WHERE cliente=".$datos['cliente'];
		$atribs = $this->Execute($sql_atribs) or die($this->ErrorMsg());
		$num_atribs = $atribs->RecordCount();
		$atrib = $atribs->FetchRow();
		// Asignación de identificador
		if(is_null($atrib['ultimo_id']))
		{
			$id_ficha_visita=1;
		}
		else
		{
			$id_ficha_visita = $atrib['ultimo_id']+1;
		}
		$datos['id_ficha_visita']=$id_ficha_visita;
		// Insertamos los valores con el identificador calculado
		$this->InsertBD($datos);
		// Devolvemos el identificador
		return $id_ficha_visita;	
    }
	
	/**
	 * Inserta una ficha de visita en la base de datos
	 *
	 * @param [datos]		Array con los diferentes valores a insertar
	 *
	 * @return Devuelve true o false
	 */
	 
	function InsertBD($datos)
    {  
		$sql = "SELECT * FROM fichas_visita_cliente WHERE cliente = -1";
		$rs = $this->Execute($sql);
		$insertSQL = $this->GetInsertSQL($rs,$datos);
		return $this->Execute($insertSQL) or die($this->ErrorMsg());
    }
	
	/**
	 * Realiza el proceso de actualización de una ficha de visita
	 *
	 * @param [datos]				Array con los diferentes valores a editar
	 * @param [id_ficha_visita]		Indentificador de la ficha de visita
	 * @param [cliente]				Indentificador del cliente
	 *
	 * @return Devuelve true o false
	 */
	 
	function Update($datos,$id_ficha_visita,$cliente)
    {
		$sql = "SELECT * FROM fichas_visita_cliente WHERE id_ficha_visita = ".$id_ficha_visita." AND cliente = ".$cliente;
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
	 * Elimina una ficha de visita de un cliente de la base de datos
	 *
	 * @param [id_ficha_visita]		Indentificador de la ficha de visita
	 * @param [cliente]				Indentificador del cliente
	 *
	 * @return Devuelve true o false
	 */
	 
	function Delete($id_ficha_visita,$cliente)
    {  
		// Finalmente borrado
		$sql = sprintf("DELETE FROM fichas_visita_cliente WHERE cliente=%s AND id_ficha_visita=%s",
							GetSQLValueString($cliente, "int"),
							GetSQLValueString($id_ficha_visita, "int"));
		$this->Execute($sql) or die($this->ErrorMsg());
		// Borramos fichero asociado
		if(file_exists(PATHINCLUDE_FRAMEWORK_DOC. "clientes/cliente_".$cliente."/fichas_visita/ficha_visita_".$id_ficha_visita.".pdf"))
		{
			unlink(PATHINCLUDE_FRAMEWORK_DOC. "clientes/cliente_".$cliente."/fichas_visita/ficha_visita_".$id_ficha_visita.".pdf");
		}
    }
	
	/**
	 * Devuelve las fichas de visita realizadas de un determinado inmueble
	 *
	 * @param [inmueble]			Indentificador del inmueble
	 *
	 * @return Devuelve un objeto con todas las fichas de visita encontradas
	 *
	 */
	
	function ObtenerFichasVisitaInmueble($inmueble)
    {  
		$sql="SELECT * FROM fichas_visita_cliente,inmuebles_fichas_visita_cliente WHERE inmuebles_fichas_visita_cliente.cliente=fichas_visita_cliente.cliente AND inmuebles_fichas_visita_cliente.ficha_visita=fichas_visita_cliente.id_ficha_visita AND inmueble=".$inmueble;
		$rs = $this->Execute($sql);
		return $rs;
    }
}
?>