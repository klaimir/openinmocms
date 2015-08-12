<?php
/*
FichasEncargoCliente.class.php, v 2.4 2013/05/13

ModelFichasEncargoCliente - Clase gestionar todas las peticiones y operaciones relacionadas con las fichas de encargo de los clientes registrados

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
* ModelFichasEncargoCliente
*
* Clase gestionar todas las peticiones y operaciones relacionadas on las fichas de encargo de los clientes registrados
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  FichasEncargoCliente.class.php, v 2.4 2013/05/13
* @access   public
*/

class ModelFichasEncargoCliente extends Model
{
    public $id_ficha_encargo;
	public $cliente;
	public $inmueble;
	public $nombre;
	public $apellidos;
	public $nif;
	public $domicilio;
	public $telefono;
	public $provincia;
	public $poblacion;
	public $observaciones;
	public $fecha;
	public $precio;
	public $metros;
	public $agente;
	public $nombre_agente;
	public $apellidos_agente;
	public $nif_agente;
	public $cuota_comunidad;
	public $forma_pago;
	public $anejos;
	public $cargas_vivienda;
	public $descripcion_vivienda;
	public $descripcion_edificio;
	public $antiguedad_edificio;
	
	/**
	 * Constructor
	 *
	 */
	
	function ModelFichasEncargoCliente()
    {  
		parent::Model();
		$this->id_ficha_encargo=NULL;
		$this->cliente=NULL;
		$this->inmueble=NULL;
		$this->agente=NULL;	
		$this->nombre=NULL;
		$this->apellidos=NULL;
		$this->nif=NULL;
		$this->domicilio=NULL;
		$this->telefono=NULL;
		$this->provincia=NULL;
		$this->poblacion=NULL;
		$this->observaciones=NULL;
		$this->fecha=NULL;
		$this->precio=NULL;
		$this->metros=NULL;
		$this->nombre_agente=NULL;
		$this->apellidos_agente=NULL;
		$this->nif_agente=NULL;
		$this->cuota_comunidad=NULL;
		$this->forma_pago=NULL;
		$this->anejos=NULL;
		$this->cargas_vivienda=NULL;
		$this->descripcion_vivienda=NULL;
		$this->descripcion_edificio=NULL;
		$this->antiguedad_edificio=NULL;
    }
	
	/**
	 * Establecen los datos de los distintos atributos de la clase
	 *
	 * @param [datos]		Datos de configuración
	 *
	 */
	
	function Set($datos)
    {  
		if(isset($datos['id_ficha_encargo'])) $this->id_ficha_encargo=$datos['id_ficha_encargo'];
		if(isset($datos['cliente'])) $this->cliente=$datos['cliente'];
		if(isset($datos['inmueble'])) $this->inmueble=$datos['inmueble'];
		if(isset($datos['agente'])) $this->agente=$datos['agente'];
		if(isset($datos['nombre'])) $this->nombre=$datos['nombre'];
		if(isset($datos['apellidos'])) $this->apellidos=$datos['apellidos'];
		if(isset($datos['nif'])) $this->nif=$datos['nif'];
		if(isset($datos['domicilio'])) $this->domicilio=$datos['domicilio'];
		if(isset($datos['telefono'])) $this->telefono=$datos['telefono'];
		if(isset($datos['provincia'])) $this->provincia=$datos['provincia'];
		if(isset($datos['poblacion'])) $this->poblacion=$datos['poblacion'];		
		if(isset($datos['observaciones'])) $this->observaciones=$datos['observaciones'];
		if(isset($datos['fecha'])) $this->fecha=$datos['fecha'];
		if(isset($datos['precio'])) $this->precio=$datos['precio'];
		if(isset($datos['metros'])) $this->metros=$datos['metros'];
		if(isset($datos['nombre_agente'])) $this->nombre_agente=$datos['nombre_agente'];
		if(isset($datos['apellidos_agente'])) $this->apellidos_agente=$datos['apellidos_agente'];
		if(isset($datos['nif_agente'])) $this->nif_agente=$datos['nif_agente'];
		if(isset($datos['cuota_comunidad'])) $this->cuota_comunidad=$datos['cuota_comunidad'];
		if(isset($datos['forma_pago'])) $this->forma_pago=$datos['forma_pago'];
		if(isset($datos['anejos'])) $this->anejos=$datos['anejos'];
		if(isset($datos['cargas_vivienda'])) $this->cargas_vivienda=$datos['cargas_vivienda'];
		if(isset($datos['descripcion_vivienda'])) $this->descripcion_vivienda=$datos['descripcion_vivienda'];		
		if(isset($datos['descripcion_edificio'])) $this->descripcion_edificio=$datos['descripcion_edificio'];
		if(isset($datos['antiguedad_edificio'])) $this->antiguedad_edificio=$datos['antiguedad_edificio'];
    }
	
	/**
	 * Establecen los datos de los distintos atributos de la clase según los valores del identificador suministrado
	 *
	 * @param [id_ficha_encargo]	Identificador de la ficha de encargo
	 * @param [cliente]				Identificador del cliente
	 * @param [inmueble]			Identificador del inmueble
	 *
	 */
	
	function SetDataObject($id_ficha_encargo,$cliente,$inmueble)
    {  
		$sql = "SELECT * FROM fichas_encargo_cliente WHERE id_ficha_encargo = ".$id_ficha_encargo." AND cliente = ".$cliente." AND inmueble = ".$inmueble;
		$rs = $this->Execute($sql);
		$rs_row = $rs->FetchRow();
		$this->Set($rs_row);
    }
	
	/**
	 * Inserta una ficha de encargo en la base de datos
	 *
	 * @param [datos]		Datos a insertar
	 *
	 * @return El último identificador calculado
	 */
	 
	function Insert($datos)
    {
		// Se obtiene el último id insertado
		$sql_atribs = "SELECT max(id_ficha_encargo) as ultimo_id FROM fichas_encargo_cliente WHERE cliente=".$datos['cliente']." AND inmueble=".$datos['inmueble'];
		$atribs = $this->Execute($sql_atribs) or die($this->ErrorMsg());
		$num_atribs = $atribs->RecordCount();
		$atrib = $atribs->FetchRow();
		// Asignación de identificador
		if(is_null($atrib['ultimo_id']))
		{
			$id_ficha_encargo=1;
		}
		else
		{
			$id_ficha_encargo = $atrib['ultimo_id']+1;
		}
		$datos['id_ficha_encargo']=$id_ficha_encargo;
		// Insertamos los valores con el identificador calculado
		$this->InsertBD($datos);
		// Devolvemos el identificador
		return $id_ficha_encargo;	
    }
	
	/**
	 * Inserta una ficha de encargo en la base de datos
	 *
	 * @param [datos]		Array con los diferentes valores a insertar
	 *
	 * @return Devuelve true o false
	 */
	 
	function InsertBD($datos)
    {  
		$sql = "SELECT * FROM fichas_encargo_cliente WHERE inmueble = -1 AND cliente = -1";
		$rs = $this->Execute($sql);
		$insertSQL = $this->GetInsertSQL($rs,$datos);
		return $this->Execute($insertSQL) or die($this->ErrorMsg());
    }
	
	/**
	 * Realiza el proceso de actualización de una ficha de encargo
	 *
	 * @param [datos]				Array con los diferentes valores a editar
	 * @param [id_ficha_encargo]	Indentificador de la ficha de encargo
	 * @param [cliente]				Indentificador del cliente
	 * @param [inmueble]			Indentificador del inmueble
	 *
	 * @return Devuelve true o false
	 */
	 
	function Update($datos,$id_ficha_encargo,$cliente,$inmueble)
    {
		$sql = "SELECT * FROM fichas_encargo_cliente WHERE id_ficha_encargo = ".$id_ficha_encargo." AND cliente = ".$cliente." AND inmueble = ".$inmueble;
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
	 * Elimina una ficha de encargo de un cliente de la base de datos
	 *
	 * @param [id_ficha_encargo]	Indentificador de la ficha de encargo
	 * @param [cliente]				Indentificador del cliente
	 * @param [inmueble]			Indentificador del inmueble
	 *
	 * @return Devuelve true o false
	 */
	 
	function Delete($id_ficha_encargo,$cliente,$inmueble)
    {  
		// Finalmente borrado
		$sql = sprintf("DELETE FROM fichas_encargo_cliente WHERE cliente=%s AND id_ficha_encargo=%s AND inmueble=%s",
							GetSQLValueString($cliente, "int"),
							GetSQLValueString($id_ficha_encargo, "int"),
							GetSQLValueString($inmueble, "int"));
		$this->Execute($sql) or die($this->ErrorMsg());
		// Borramos fichero asociado
		if(file_exists(PATHINCLUDE_FRAMEWORK_DOC. "clientes/cliente_".$cliente."/inmueble_".$inmueble."/ficha_encargo_".$id_ficha_encargo.".pdf"))
		{
			unlink(PATHINCLUDE_FRAMEWORK_DOC. "clientes/cliente_".$cliente."/inmueble_".$inmueble."/ficha_encargo_".$id_ficha_encargo.".pdf");
		}
		// Se borra su aviso de certificación energética
		require_once(PATHINCLUDE_FRAMEWORK_MODELOS.'CertificacionesEnergeticasCliente.class.php');
		$certificacion_energetica = new ModelCertificacionesEnergeticasCliente();
		$certificacion_energetica->Delete($cliente,$inmueble);
    }
	
	/**
	 * Devuelve el último identificador de las fichas de encargo realizadas de un determinado inmueble y cliente
	 *
	 * @param [cliente]				Indentificador del cliente
	 * @param [inmueble]			Indentificador del inmueble
	 *
	 * @return Devuelve el identificador de la última fichas de encargo registrada
	 *
	 */
	
	function ObtenerUltimoID($inmueble,$cliente)
    {  
		$sql = "SELECT max(id_ficha_encargo) as ultimo_id FROM fichas_encargo_cliente WHERE inmueble = ".$inmueble." AND cliente = ".$cliente;
		$rs = $this->Execute($sql);
		$rs_row = $rs->FetchRow();
		return $rs_row['ultimo_id'];
    }
	
	/**
	 * Devuelve las fichas de encargo realizadas de un determinado inmueble y cliente
	 *
	 * @param [cliente]				Indentificador del cliente
	 * @param [inmueble]			Indentificador del inmueble
	 *
	 * @return Devuelve un objeto con todas las fichas de encargo encontradas
	 *
	 */
	
	function ObtenerFichasInmuebleCliente($inmueble,$cliente)
    {  
		$sql = "SELECT * FROM fichas_encargo_cliente WHERE cliente = ".$cliente." AND inmueble = ".$inmueble;
		$rs = $this->Execute($sql);
		return $rs;
    }
	
	/**
	 * Devuelve las fichas de encargo realizadas de un determinado inmueble
	 *
	 * @param [inmueble]			Indentificador del inmueble
	 *
	 * @return Devuelve un objeto con todas las fichas de encargo encontradas
	 *
	 */
	
	function ObtenerFichasInmueble($inmueble)
    {  
		$sql = "SELECT * FROM fichas_encargo_cliente WHERE inmueble = ".$inmueble;
		$rs = $this->Execute($sql);
		return $rs;
    }
}
?>