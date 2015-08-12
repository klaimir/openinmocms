<?php
/*
CertificacionesEnergeticasCliente.class.php, v 2.4 2013/05/13

ModelCertificacionesEnergeticasCliente - Clase gestionar todas las peticiones y operaciones relacionadas con los avisos de certificación energética de los inmuebles registrados

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
* ModelCertificacionesEnergeticasCliente
*
* Clase gestionar todas las peticiones y operaciones relacionadas con los avisos de certificación energética de los inmuebles registrados
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  CertificacionesEnergeticasCliente.class.php, v 2.4 2013/05/13
* @access   public
*/

class ModelCertificacionesEnergeticasCliente extends Model
{
	public $cliente;
	public $inmueble;
	public $agente;
	public $nombre;
	public $apellidos;
	public $nif;
	public $domicilio;
	public $provincia;
	public $poblacion;
	public $provincia_vivienda;
	public $poblacion_vivienda;
	public $direccion_vivienda;	
	public $nombre_agente;
	public $apellidos_agente;
	public $nif_agente;	
	public $observaciones;
	public $fecha;
	public $estado;	
	
	/**
	 * Constructor
	 *
	 */
	
	function ModelCertificacionesEnergeticasCliente()
    {  
		parent::Model();
		$this->cliente=NULL;
		$this->inmueble=NULL;
		$this->agente=NULL;	
		$this->nombre=NULL;
		$this->apellidos=NULL;
		$this->nif=NULL;
		$this->domicilio=NULL;
		$this->provincia=NULL;		
		$this->poblacion=NULL;
		$this->provincia_vivienda=NULL;
		$this->poblacion_vivienda=NULL;
		$this->direccion_vivienda=NULL;	
		$this->nombre_agente=NULL;
		$this->apellidos_agente=NULL;
		$this->nif_agente=NULL;
		$this->observaciones=NULL;
		$this->fecha=NULL;
		$this->estado=NULL;
    }
	
	/**
	 * Establecen los datos de los distintos atributos de la clase
	 *
	 * @param [datos]		Datos de configuración
	 *
	 */
	
	function Set($datos)
    {  
		if(isset($datos['cliente'])) $this->cliente=$datos['cliente'];
		if(isset($datos['inmueble'])) $this->inmueble=$datos['inmueble'];
		if(isset($datos['agente'])) $this->agente=$datos['agente'];
		if(isset($datos['nombre'])) $this->nombre=$datos['nombre'];
		if(isset($datos['apellidos'])) $this->apellidos=$datos['apellidos'];
		if(isset($datos['nif'])) $this->nif=$datos['nif'];
		if(isset($datos['domicilio'])) $this->domicilio=$datos['domicilio'];
		if(isset($datos['provincia'])) $this->provincia=$datos['provincia'];
		if(isset($datos['poblacion'])) $this->poblacion=$datos['poblacion'];
		if(isset($datos['provincia_vivienda'])) $this->provincia_vivienda=$datos['provincia_vivienda'];
		if(isset($datos['poblacion_vivienda'])) $this->poblacion_vivienda=$datos['poblacion_vivienda'];
		if(isset($datos['direccion_vivienda'])) $this->direccion_vivienda=$datos['direccion_vivienda'];		
		if(isset($datos['nombre_agente'])) $this->nombre_agente=$datos['nombre_agente'];
		if(isset($datos['apellidos_agente'])) $this->apellidos_agente=$datos['apellidos_agente'];
		if(isset($datos['nif_agente'])) $this->nif_agente=$datos['nif_agente'];
		if(isset($datos['observaciones'])) $this->observaciones=$datos['observaciones'];
		if(isset($datos['fecha'])) $this->fecha=$datos['fecha'];
		if(isset($datos['estado'])) $this->estado=$datos['estado'];
    }
	
	/**
	 * Establecen los datos de los distintos atributos de la clase según los valores del identificador suministrado
	 *
	 * @param [inmueble]		Identificador del inmueble
	 * @param [cliente]			Identificador del cliente
	 *
	 */
	
	function SetDataObject($inmueble,$cliente)
    {  
		$sql = "SELECT * FROM certificaciones_energeticas_cliente WHERE inmueble = ".$inmueble." AND cliente = ".$cliente;
		$rs = $this->Execute($sql);
		$rs_row = $rs->FetchRow();
		$this->Set($rs_row);
    }
	
	/**
	 * Inserta un aviso de certificación energética en la base de datos
	 *
	 * @param [datos]		Datos a insertar
	 *
	 * @return El último identificador calculado
	 */
	 
	function Insert($datos)
    {  
		$sql = "SELECT * FROM certificaciones_energeticas_cliente WHERE inmueble = -1 AND cliente = -1";
		$rs = $this->Execute($sql);
		$insertSQL = $this->GetInsertSQL($rs,$datos);
		$this->Execute($insertSQL) or die($this->ErrorMsg());
    }
	
	/**
	 * Realiza el proceso de actualización de un aviso de certificación energética
	 *
	 * @param [datos]			Array con los diferentes valores a editar
	 * @param [inmueble]		Identificador del inmueble
	 * @param [cliente]			Identificador del cliente
	 *
	 * @return Devuelve true o false
	 */
	 
	function Update($datos,$inmueble,$cliente)
    {
		$sql = "SELECT * FROM certificaciones_energeticas_cliente WHERE inmueble = ".$inmueble." AND cliente = ".$cliente;
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
	 * Elimina un aviso de certificación energética de un inmueble de la base de datos
	 *
	 * @param [inmueble]		Identificador del inmueble
	 * @param [cliente]			Identificador del cliente
	 *
	 * @return Devuelve true o false
	 */
	 
	function Delete($cliente,$inmueble)
    {  
		// Finalmente borrado
		$sql = sprintf("DELETE FROM certificaciones_energeticas_cliente WHERE inmueble=%s AND cliente=%s",
							GetSQLValueString($inmueble, "int"),
							GetSQLValueString($cliente, "int"));
		$this->Execute($sql) or die($this->ErrorMsg());
		// Borramos fichero asociado
		if(file_exists(PATHINCLUDE_FRAMEWORK_DOC. "clientes/cliente_".$cliente."/inmueble_".$inmueble."/certificacion_energetica.pdf"))
		{
			unlink(PATHINCLUDE_FRAMEWORK_DOC. "clientes/cliente_".$cliente."/inmueble_".$inmueble."/certificacion_energetica.pdf");
		}
    }
	
	/**
	 * Obtiene todos los avisos de certificación energética realizados de un determinado inmueble y cliente
	 *
	 * @param [cliente]				Indentificador del cliente
	 * @param [inmueble]			Indentificador del inmueble
	 *
	 * @return Devuelve un objeto con todas los avisos de certificación energética encontrados
	 *
	 */
	
	function ObtenerCertificacionesInmuebleCliente($inmueble,$cliente)
    {  
		$sql = "SELECT * FROM certificaciones_energeticas_cliente WHERE cliente = ".$cliente." AND inmueble = ".$inmueble;		
		$rs = $this->Execute($sql);
		return $rs;
    }
	
	/**
	 * Obtiene todos los avisos de certificación energética realizados de un determinado cliente
	 *
	 * @param [cliente]				Indentificador del cliente
	 *
	 * @return Devuelve un objeto con todas los avisos de certificación energética encontrados
	 *
	 */
	
	function ObtenerCertificacionesCliente($cliente)
    {  
		$sql = "SELECT * FROM certificaciones_energeticas_cliente WHERE cliente = ".$cliente;		
		$rs = $this->Execute($sql);
		return $rs;
    }
	
	/**
	 * Obtiene todos los avisos de certificación energética realizados de un determinado inmueble
	 *
	 * @param [inmueble]			Indentificador del inmueble
	 *
	 * @return Devuelve un objeto con todas los avisos de certificación energética encontrados
	 *
	 */
	
	function ObtenerCertificacionesInmueble($inmueble)
    {  
		$sql = "SELECT * FROM certificaciones_energeticas_cliente WHERE inmueble = ".$inmueble;		
		$rs = $this->Execute($sql);
		return $rs;
    }
	
	/**
	 * Obtiene todos los avisos de certificación energética realizados por un determinado agente
	 *
	 * @param [id_usuario]			Indentificador del usuario
	 *
	 * @return Devuelve un objeto con avisos de certificación energética encontrados
	 *
	 */
	
	function ObtenerCertificacionesAgente($id_usuario)
    {  
		$sql = "SELECT * FROM certificaciones_energeticas_cliente WHERE agente = ".$id_usuario;		
		$rs = $this->Execute($sql);
		return $rs;
    }
}
?>