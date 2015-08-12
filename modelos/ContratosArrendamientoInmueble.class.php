<?php
/*
ContratosArrendamientoInmueble.class.php, v 2.4 2013/05/13

ModelContratosArrendamientoInmueble - Clase gestionar todas las peticiones y operaciones relacionadas con los contratos de arrendamiento de los inmuebles registrados

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
* ModelContratosArrendamientoInmueble
*
* Clase gestionar todas las peticiones y operaciones relacionadas con los contratos de arrendamiento de los inmuebles registrados
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  ContratosArrendamientoInmueble.class.php, v 2.4 2013/05/13
* @access   public
*/

class ModelContratosArrendamientoInmueble extends Model
{
    public $id_contrato_arrendamiento;
	public $cliente_vendedor;
	public $cliente_comprador;
	public $inmueble;
	public $agente;
	public $tipo_arrendamiento;	
	public $nombre;
	public $apellidos;
	public $nif;
	public $domicilio;
	public $provincia;
	public $poblacion;
	public $estado_civil;
	public $nombre_comprador;
	public $apellidos_comprador;
	public $estado_civil_comprador;
	public $nif_comprador;
	public $domicilio_comprador;
	public $provincia_comprador;
	public $poblacion_comprador;
	public $provincia_vivienda;
	public $poblacion_vivienda;
	public $direccion_vivienda;	
	public $nombre_agente;
	public $apellidos_agente;
	public $nif_agente;	
	public $observaciones;
	public $fecha;	
	public $fecha_inicio_contrato;
	public $fecha_fin_contrato;
	public $fecha_primer_pago;
	public $ncc;
	public $cuota_total;
	public $cuota_mensual;
	public $mes_actualizacion_renta;
	public $estado;	
	
	/**
	 * Constructor
	 *
	 */
	
	function ModelContratosArrendamientoInmueble()
    {  
		parent::Model();
		$this->id_contrato_arrendamiento=NULL;
		$this->cliente_vendedor=NULL;
		$this->cliente_comprador=NULL;
		$this->inmueble=NULL;
		$this->tipo_arrendamiento=NULL;
		$this->agente=NULL;	
		$this->nombre=NULL;
		$this->apellidos=NULL;
		$this->nif=NULL;
		$this->domicilio=NULL;
		$this->provincia=NULL;		
		$this->poblacion=NULL;
		$this->estado_civil=NULL;		
		$this->nombre_comprador=NULL;
		$this->apellidos_comprador=NULL;
		$this->nif_comprador=NULL;
		$this->domicilio_comprador=NULL;
		$this->provincia_comprador=NULL;
		$this->poblacion_comprador=NULL;
		$this->estado_civil_comprador=NULL;
		$this->provincia_vivienda=NULL;
		$this->poblacion_vivienda=NULL;
		$this->direccion_vivienda=NULL;	
		$this->nombre_agente=NULL;
		$this->apellidos_agente=NULL;
		$this->nif_agente=NULL;
		$this->observaciones=NULL;
		$this->fecha=NULL;		
		$this->fecha_inicio_contrato=NULL;
		$this->fecha_fin_contrato=NULL;
		$this->fecha_primer_pago=NULL;
		$this->ncc=NULL;
		$this->cuota_total=NULL;
		$this->cuota_mensual=NULL;
		$this->mes_actualizacion_renta=NULL;
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
		if(isset($datos['id_contrato_arrendamiento'])) $this->id_contrato_arrendamiento=$datos['id_contrato_arrendamiento'];
		if(isset($datos['cliente_vendedor'])) $this->cliente_vendedor=$datos['cliente_vendedor'];
		if(isset($datos['cliente_comprador'])) $this->cliente_comprador=$datos['cliente_comprador'];
		if(isset($datos['inmueble'])) $this->inmueble=$datos['inmueble'];
		if(isset($datos['tipo_arrendamiento'])) $this->tipo_arrendamiento=$datos['tipo_arrendamiento'];
		if(isset($datos['agente'])) $this->agente=$datos['agente'];
		if(isset($datos['nombre'])) $this->nombre=$datos['nombre'];
		if(isset($datos['apellidos'])) $this->apellidos=$datos['apellidos'];
		if(isset($datos['nif'])) $this->nif=$datos['nif'];
		if(isset($datos['domicilio'])) $this->domicilio=$datos['domicilio'];
		if(isset($datos['provincia'])) $this->provincia=$datos['provincia'];
		if(isset($datos['poblacion'])) $this->poblacion=$datos['poblacion'];
		if(isset($datos['estado_civil'])) $this->estado_civil=$datos['estado_civil'];		
		if(isset($datos['agente_comprador'])) $this->agente_comprador=$datos['agente_comprador'];
		if(isset($datos['nombre_comprador'])) $this->nombre_comprador=$datos['nombre_comprador'];
		if(isset($datos['apellidos_comprador'])) $this->apellidos_comprador=$datos['apellidos_comprador'];
		if(isset($datos['nif_comprador'])) $this->nif_comprador=$datos['nif_comprador'];
		if(isset($datos['domicilio_comprador'])) $this->domicilio_comprador=$datos['domicilio_comprador'];
		if(isset($datos['provincia_comprador'])) $this->provincia_comprador=$datos['provincia_comprador'];
		if(isset($datos['poblacion_comprador'])) $this->poblacion_comprador=$datos['poblacion_comprador'];
		if(isset($datos['estado_civil_comprador'])) $this->estado_civil_comprador=$datos['estado_civil_comprador'];
		if(isset($datos['provincia_vivienda'])) $this->provincia_vivienda=$datos['provincia_vivienda'];
		if(isset($datos['poblacion_vivienda'])) $this->poblacion_vivienda=$datos['poblacion_vivienda'];
		if(isset($datos['direccion_vivienda'])) $this->direccion_vivienda=$datos['direccion_vivienda'];		
		if(isset($datos['nombre_agente'])) $this->nombre_agente=$datos['nombre_agente'];
		if(isset($datos['apellidos_agente'])) $this->apellidos_agente=$datos['apellidos_agente'];
		if(isset($datos['nif_agente'])) $this->nif_agente=$datos['nif_agente'];
		if(isset($datos['observaciones'])) $this->observaciones=$datos['observaciones'];
		if(isset($datos['fecha'])) $this->fecha=$datos['fecha'];		
		if(isset($datos['fecha_inicio_contrato'])) $this->fecha_inicio_contrato=$datos['fecha_inicio_contrato'];
		if(isset($datos['fecha_fin_contrato'])) $this->fecha_fin_contrato=$datos['fecha_fin_contrato'];
		if(isset($datos['fecha_primer_pago'])) $this->fecha_primer_pago=$datos['fecha_primer_pago'];
		if(isset($datos['ncc'])) $this->ncc=$datos['ncc'];
		if(isset($datos['cuota_total'])) $this->cuota_total=$datos['cuota_total'];
		if(isset($datos['cuota_mensual'])) $this->cuota_mensual=$datos['cuota_mensual'];
		if(isset($datos['mes_actualizacion_renta'])) $this->mes_actualizacion_renta=$datos['mes_actualizacion_renta'];
		if(isset($datos['estado'])) $this->estado=$datos['estado'];
    }
	
	/**
	 * Establecen los datos de los distintos atributos de la clase según los valores del identificador suministrado
	 *
	 * @param [id_contrato_arrendamiento]		Identificador
	 *
	 */
	
	function SetDataObject($id_contrato_arrendamiento)
    {  
		$sql = "SELECT * FROM contratos_arrendamiento_inmueble WHERE id_contrato_arrendamiento = ".$id_contrato_arrendamiento;
		$rs = $this->Execute($sql);
		$rs_row = $rs->FetchRow();
		$this->Set($rs_row);
    }
	
	/**
	 * Inserta una contrato de arrendamiento en la base de datos
	 *
	 * @param [datos]		Datos a insertar
	 *
	 * @return El último identificador calculado
	 */
	 
	function Insert($datos)
    {  
		$sql = "SELECT * FROM contratos_arrendamiento_inmueble WHERE id_contrato_arrendamiento = -1";
		$rs = $this->Execute($sql);
		$insertSQL = $this->GetInsertSQL($rs,$datos);
		$this->Execute($insertSQL) or die($this->ErrorMsg());		
		$ultimo_id=$this->Insert_ID('contratos_arrendamiento_inmueble','id_contrato_arrendamiento');
		// Devolvemos el último insertado
		return $ultimo_id;
    }
	
	/**
	 * Realiza el proceso de actualización de una contrato de arrendamiento
	 *
	 * @param [datos]						Array con los diferentes valores a editar
	 * @param [id_contrato_arrendamiento]	Indentificador de la contrato de arrendamiento
	 *
	 * @return Devuelve true o false
	 */
	 
	function Update($datos,$id_contrato_arrendamiento)
    {
		$sql = "SELECT * FROM contratos_arrendamiento_inmueble WHERE id_contrato_arrendamiento = ".$id_contrato_arrendamiento;
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
	 * Elimina una contrato de arrendamiento de un inmueble de la base de datos
	 *
	 * @param [id_contrato_arrendamiento]	Indentificador de la contrato de arrendamiento
	 *
	 * @return Devuelve true o false
	 */
	 
	function Delete($id_contrato_arrendamiento,$cliente_vendedor,$inmueble)
    {  
		// Finalmente borrado
		$sql = sprintf("DELETE FROM contratos_arrendamiento_inmueble WHERE id_contrato_arrendamiento=%s",
							GetSQLValueString($id_contrato_arrendamiento, "int"));
		$this->Execute($sql) or die($this->ErrorMsg());
		// Borramos fichero asociado
		if(file_exists(PATHINCLUDE_FRAMEWORK_DOC. "clientes/cliente_".$cliente_vendedor."/inmueble_".$inmueble."/contrato_arrendamiento_".$id_contrato_arrendamiento.".pdf"))
		{
			unlink(PATHINCLUDE_FRAMEWORK_DOC. "clientes/cliente_".$cliente_vendedor."/inmueble_".$inmueble."/contrato_arrendamiento_".$id_contrato_arrendamiento.".pdf");
		}
    }
	
	/**
	 * Devuelve el último contrato de arrendamiento realizado de un determinado inmueble
	 *
	 * @return Devuelve el identificador del último contrato de arrendamiento realizado de un determinado inmueble
	 *
	 */
	
	function ObtenerUltimoContratoInmueble()
    {  
		$sql = "SELECT max(id_contrato_arrendamiento) as ultimo_id FROM contratos_arrendamiento_inmueble WHERE inmueble = ".$this->inmueble;
		$rs = $this->Execute($sql);
		$rs_row = $rs->FetchRow();
		return $rs_row['ultimo_id'];
    }
	
	/**
	 * Obtiene todos los contratos de arrendamiento realizados de un determinado inmueble y cliente
	 *
	 * @param [cliente]				Indentificador del cliente
	 * @param [inmueble]			Indentificador del inmueble
	 *
	 * @return Devuelve un objeto con todas contratos de arrendamiento encontrados
	 *
	 */
	
	function ObtenerContratosInmuebleCliente($inmueble,$cliente)
    {  
		$sql = "SELECT * FROM contratos_arrendamiento_inmueble WHERE (cliente_comprador = ".$cliente." OR cliente_vendedor = ".$cliente.") AND inmueble = ".$inmueble;		
		$rs = $this->Execute($sql);
		return $rs;
    }
	
	/**
	 * Obtiene todos los contratos de arrendamiento realizados de un determinado cliente
	 *
	 * @param [cliente]				Indentificador del cliente
	 *
	 * @return Devuelve un objeto con todas contratos de arrendamiento encontrados
	 *
	 */
	
	function ObtenerContratosCliente($cliente)
    {  
		$sql = "SELECT * FROM contratos_arrendamiento_inmueble WHERE cliente_comprador = ".$cliente." OR cliente_vendedor = ".$cliente;		
		$rs = $this->Execute($sql);
		return $rs;
    }
	
	/**
	 * Obtiene todos los contratos de arrendamiento realizados de un determinado inmueble
	 *
	 * @param [inmueble]			Indentificador del inmueble
	 *
	 * @return Devuelve un objeto con todas contratos de arrendamiento encontrados
	 *
	 */
	
	function ObtenerContratosInmueble($inmueble)
    {  
		$sql = "SELECT * FROM contratos_arrendamiento_inmueble WHERE inmueble = ".$inmueble;		
		$rs = $this->Execute($sql);
		return $rs;
    }
	
	/**
	 * Obtiene todos los contratos de arrendamiento realizados de un determinado inmueble
	 *
	 * @param [id_usuario]			Indentificador del usuario
	 *
	 * @return Devuelve un objeto con todas contratos de arrendamiento encontrados
	 *
	 */
	
	function ObtenerContratosAgente($id_usuario)
    {  
		$sql = "SELECT * FROM contratos_arrendamiento_inmueble WHERE agente = ".$id_usuario;		
		$rs = $this->Execute($sql);
		return $rs;
    }
	
	/**
	 * Obtiene la máxima fecha de finalización de contrato de un determinado inmueble sin tener en cuenta el arrendamiento especificado
	 *
	 * @param [inmueble]						Indentificador del inmueble
	 * @param [id_contrato_arrendamiento]		Indentificador del arrendamiento
	 *
	 * @return Devuelve una fecha en formato dd/mm/YYYY o NULL en caso contrario
	 *
	 */
	
	function ObtenerUltimaFechaFinContratoInmueble($inmueble,$id_contrato_arrendamiento)
    {  
		// Se excluye el último identificador del contrato de arrendamiento si existe
		if($id_contrato_arrendamiento!="")
			$sql_id_contrato_arrendamiento=" AND id_contrato_arrendamiento < ".$id_contrato_arrendamiento;
		else
			$sql_id_contrato_arrendamiento="";
		// Se realiza la consulta
		$sql = "SELECT max(fecha_fin_contrato) as max_fecha_fin_contrato FROM contratos_arrendamiento_inmueble WHERE inmueble = ".$inmueble.$sql_id_contrato_arrendamiento;		
		$rs = $this->Execute($sql);
		$rs_row = $rs->FetchRow();
		if(!is_null($rs_row['max_fecha_fin_contrato']))
			$fecha_formateada=cambiafecha_bd($rs_row['max_fecha_fin_contrato']);
		else
			$fecha_formateada=NULL;
		// Se devuelve la fecha formateada
		return $fecha_formateada;
    }
	
	/**
	 * Obtiene todos los contratos de arrendamiento realizados de un determinado inmueble con sus facturas
	 *
	 * @param [inmueble]			Indentificador del inmueble
	 *
	 * @return Devuelve un objeto con todas contratos de arrendamiento y sus facturas encontradas
	 *
	 */
	
	function ObtenerContratosFacturasInmueble($inmueble)
    {  
		$sql="SELECT * FROM contratos_arrendamiento_inmueble LEFT JOIN facturas_contratos_arrendamiento_inmueble ON id_contrato_arrendamiento=contrato_arrendamiento WHERE inmueble=".$inmueble;
		$rs = $this->Execute($sql);
		return $rs;
    }
}
?>