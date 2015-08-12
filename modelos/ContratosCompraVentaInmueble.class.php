<?php
/*
ContratosCompraVentaInmueble.class.php, v 2.4 2013/05/13

ModelContratosCompraVentaInmueble - Clase gestionar todas las peticiones y operaciones relacionadas con los contratos de compra-venta de los inmuebles registrados

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
* ModelContratosCompraVentaInmueble
*
* Clase gestionar todas las peticiones y operaciones relacionadas con los contratos de compra-venta de los inmuebles registrados
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  ContratosCompraVentaInmueble.class.php, v 2.4 2013/05/13
* @access   public
*/

class ModelContratosCompraVentaInmueble extends Model
{
    public $id_contrato_compra_venta;
	public $cliente_vendedor;
	public $cliente_comprador;
	public $inmueble;
	public $agente;
	public $nombre;
	public $apellidos;
	public $nif;
	public $domicilio;
	public $provincia;
	public $poblacion;
	public $nombre_comprador;
	public $apellidos_comprador;
	public $nif_comprador;
	public $domicilio_comprador;
	public $provincia_comprador;
	public $poblacion_comprador;
	public $precio;
	public $metros;	
	public $direccion_vivienda;
	public $consta_de;
	public $amueblado;
	public $registro_numero;
	public $registro_boletin;
	public $registro_finca;
	public $registro_libro;
	public $registro_tomo;
	public $registro_folio;
	public $cantidad_efectiva;
	public $cantidad_escritura;
	public $nombre_agente;
	public $apellidos_agente;
	public $nif_agente;	
	public $observaciones;
	public $fecha;
	public $dias_clausula_suspensiva;
	public $fecha_documento_publico;
	public $estado;	
	public $poblacion_vivienda;	
	
	/**
	 * Constructor
	 *
	 */
	
	function ModelContratosCompraVentaInmueble()
    {  
		parent::Model();
		$this->id_contrato_compra_venta=NULL;
		$this->cliente_vendedor=NULL;
		$this->cliente_comprador=NULL;
		$this->inmueble=NULL;
		$this->agente=NULL;	
		$this->nombre=NULL;
		$this->apellidos=NULL;
		$this->nif=NULL;
		$this->domicilio=NULL;
		$this->provincia=NULL;		
		$this->poblacion=NULL;		
		$this->nombre_comprador=NULL;
		$this->apellidos_comprador=NULL;
		$this->nif_comprador=NULL;
		$this->domicilio_comprador=NULL;
		$this->provincia_comprador=NULL;
		$this->poblacion_comprador=NULL;
		$this->precio=NULL;
		$this->metros=NULL;	
		$this->direccion_vivienda=NULL;
		$this->consta_de=NULL;
		$this->amueblado=NULL;
		$this->registro_numero=NULL;
		$this->registro_boletin=NULL;
		$this->registro_finca=NULL;
		$this->registro_libro=NULL;
		$this->registro_tomo=NULL;
		$this->registro_folio=NULL;
		$this->cantidad_efectiva=NULL;
		$this->cantidad_escritura=NULL;		
		$this->nombre_agente=NULL;
		$this->apellidos_agente=NULL;
		$this->nif_agente=NULL;
		$this->observaciones=NULL;
		$this->fecha=NULL;
		$this->dias_clausula_suspensiva=NULL;
		$this->fecha_documento_publico=NULL;
		$this->estado=NULL;
		$this->poblacion_vivienda=NULL;
    }
	
	/**
	 * Establecen los datos de los distintos atributos de la clase
	 *
	 * @param [datos]		Datos de configuración
	 *
	 */
	
	function Set($datos)
    {
		if(isset($datos['id_contrato_compra_venta'])) $this->id_contrato_compra_venta=$datos['id_contrato_compra_venta'];
		if(isset($datos['cliente_vendedor'])) $this->cliente_vendedor=$datos['cliente_vendedor'];
		if(isset($datos['cliente_comprador'])) $this->cliente_comprador=$datos['cliente_comprador'];
		if(isset($datos['inmueble'])) $this->inmueble=$datos['inmueble'];
		if(isset($datos['agente'])) $this->agente=$datos['agente'];
		if(isset($datos['nombre'])) $this->nombre=$datos['nombre'];
		if(isset($datos['apellidos'])) $this->apellidos=$datos['apellidos'];
		if(isset($datos['nif'])) $this->nif=$datos['nif'];
		if(isset($datos['domicilio'])) $this->domicilio=$datos['domicilio'];
		if(isset($datos['provincia'])) $this->provincia=$datos['provincia'];
		if(isset($datos['poblacion'])) $this->poblacion=$datos['poblacion'];		
		if(isset($datos['agente_comprador'])) $this->agente_comprador=$datos['agente_comprador'];
		if(isset($datos['nombre_comprador'])) $this->nombre_comprador=$datos['nombre_comprador'];
		if(isset($datos['apellidos_comprador'])) $this->apellidos_comprador=$datos['apellidos_comprador'];
		if(isset($datos['nif_comprador'])) $this->nif_comprador=$datos['nif_comprador'];
		if(isset($datos['domicilio_comprador'])) $this->domicilio_comprador=$datos['domicilio_comprador'];
		if(isset($datos['provincia_comprador'])) $this->provincia_comprador=$datos['provincia_comprador'];
		if(isset($datos['poblacion_comprador'])) $this->poblacion_comprador=$datos['poblacion_comprador'];
		if(isset($datos['precio'])) $this->precio=$datos['precio'];
		if(isset($datos['metros'])) $this->metros=$datos['metros'];
		if(isset($datos['direccion_vivienda'])) $this->direccion_vivienda=$datos['direccion_vivienda'];
		if(isset($datos['consta_de'])) $this->consta_de=$datos['consta_de'];
		if(isset($datos['amueblado'])) $this->amueblado=$datos['amueblado'];
		if(isset($datos['registro_numero'])) $this->registro_numero=$datos['registro_numero'];
		if(isset($datos['registro_boletin'])) $this->registro_boletin=$datos['registro_boletin'];
		if(isset($datos['registro_finca'])) $this->registro_finca=$datos['registro_finca'];
		if(isset($datos['registro_libro'])) $this->registro_libro=$datos['registro_libro'];
		if(isset($datos['registro_tomo'])) $this->registro_tomo=$datos['registro_tomo'];
		if(isset($datos['registro_folio'])) $this->registro_folio=$datos['registro_folio'];
		if(isset($datos['cantidad_efectiva'])) $this->cantidad_efectiva=$datos['cantidad_efectiva'];
		if(isset($datos['cantidad_escritura'])) $this->cantidad_escritura=$datos['cantidad_escritura'];
		if(isset($datos['nombre_agente'])) $this->nombre_agente=$datos['nombre_agente'];
		if(isset($datos['apellidos_agente'])) $this->apellidos_agente=$datos['apellidos_agente'];
		if(isset($datos['nif_agente'])) $this->nif_agente=$datos['nif_agente'];
		if(isset($datos['observaciones'])) $this->observaciones=$datos['observaciones'];
		if(isset($datos['fecha'])) $this->fecha=$datos['fecha'];
		if(isset($datos['dias_clausula_suspensiva'])) $this->dias_clausula_suspensiva=$datos['dias_clausula_suspensiva'];
		if(isset($datos['fecha_documento_publico'])) $this->fecha_documento_publico=$datos['fecha_documento_publico'];
		if(isset($datos['estado'])) $this->estado=$datos['estado'];
		if(isset($datos['poblacion_vivienda'])) $this->poblacion_vivienda=$datos['poblacion_vivienda'];
    }
	
	/**
	 * Establecen los datos de los distintos atributos de la clase según los valores del identificador suministrado
	 *
	 * @param [id_contrato_compra_venta]		Identificador
	 *
	 */
	
	function SetDataObject($id_contrato_compra_venta)
    {  
		$sql = "SELECT * FROM contratos_compra_venta_inmueble WHERE id_contrato_compra_venta = ".$id_contrato_compra_venta;
		$rs = $this->Execute($sql);
		$rs_row = $rs->FetchRow();
		$this->Set($rs_row);
    }
	
	/**
	 * Inserta una contrato de compra-venta en la base de datos
	 *
	 * @param [datos]		Datos a insertar
	 *
	 * @return El último identificador calculado
	 */
	 
	function Insert($datos)
    {  
		$sql = "SELECT * FROM contratos_compra_venta_inmueble WHERE id_contrato_compra_venta = -1";
		$rs = $this->Execute($sql);
		$insertSQL = $this->GetInsertSQL($rs,$datos);
		$this->Execute($insertSQL) or die($this->ErrorMsg());		
		$ultimo_id=$this->Insert_ID('contratos_compra_venta_inmueble','id_contrato_compra_venta');
		// Devolvemos el último insertado
		return $ultimo_id;
    }
	
	/**
	 * Realiza el proceso de actualización de una contrato de compra-venta
	 *
	 * @param [datos]				Array con los diferentes valores a editar
	 * @param [id_contrato_compra_venta]	Indentificador de la contrato de compra-venta
	 *
	 * @return Devuelve true o false
	 */
	 
	function Update($datos,$id_contrato_compra_venta)
    {
		$sql = "SELECT * FROM contratos_compra_venta_inmueble WHERE id_contrato_compra_venta = ".$id_contrato_compra_venta;
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
	 * Elimina una contrato de compra-venta de un inmueble de la base de datos
	 *
	 * @param [id_contrato_compra_venta]	Indentificador de la contrato de compra-venta
	 *
	 * @return Devuelve true o false
	 */
	 
	function Delete($id_contrato_compra_venta,$cliente_vendedor,$inmueble)
    {  
		// Finalmente borrado
		$sql = sprintf("DELETE FROM contratos_compra_venta_inmueble WHERE id_contrato_compra_venta=%s",
							GetSQLValueString($id_contrato_compra_venta, "int"));
		$this->Execute($sql) or die($this->ErrorMsg());
		// Borramos fichero asociado
		if(file_exists(PATHINCLUDE_FRAMEWORK_DOC. "clientes/cliente_".$cliente_vendedor."/inmueble_".$inmueble."/contrato_compra_venta_".$id_contrato_compra_venta.".pdf"))
		{
			unlink(PATHINCLUDE_FRAMEWORK_DOC. "clientes/cliente_".$cliente_vendedor."/inmueble_".$inmueble."/contrato_compra_venta_".$id_contrato_compra_venta.".pdf");
		}
    }
	
	/**
	 * Devuelve el último contrato de compra-venta realizado de un determinado inmueble
	 *
	 * @return Devuelve el identificador del último contrato de compra-venta realizado de un determinado inmueble
	 *
	 */
	
	function ObtenerUltimoContratoInmueble()
    {  
		$sql = "SELECT max(id_contrato_compra_venta) as ultimo_id FROM contratos_compra_venta_inmueble WHERE inmueble = ".$this->inmueble;
		$rs = $this->Execute($sql);
		$rs_row = $rs->FetchRow();
		return $rs_row['ultimo_id'];
    }
	
	/**
	 * Obtiene todos los contratos de compra-venta realizados de un determinado inmueble y cliente
	 *
	 * @param [cliente]				Indentificador del cliente
	 * @param [inmueble]			Indentificador del inmueble
	 *
	 * @return Devuelve un objeto con todas contratos de compra-venta encontrados
	 *
	 */
	
	function ObtenerContratosInmuebleCliente($inmueble,$cliente)
    {  
		$sql = "SELECT * FROM contratos_compra_venta_inmueble WHERE (cliente_comprador = ".$cliente." OR cliente_vendedor = ".$cliente.") AND inmueble = ".$inmueble;		
		$rs = $this->Execute($sql);
		return $rs;
    }
	
	/**
	 * Obtiene todos los contratos de compra-venta realizados de un determinado cliente
	 *
	 * @param [cliente]				Indentificador del cliente
	 *
	 * @return Devuelve un objeto con todas contratos de compra-venta encontrados
	 *
	 */
	
	function ObtenerContratosCliente($cliente)
    {  
		$sql = "SELECT * FROM contratos_compra_venta_inmueble WHERE cliente_comprador = ".$cliente." OR cliente_vendedor = ".$cliente;		
		$rs = $this->Execute($sql);
		return $rs;
    }
	
	/**
	 * Obtiene todos los contratos de compra-venta realizados de un determinado inmueble
	 *
	 * @param [inmueble]			Indentificador del inmueble
	 *
	 * @return Devuelve un objeto con todas contratos de compra-venta encontrados
	 *
	 */
	
	function ObtenerContratosInmueble($inmueble)
    {  
		$sql = "SELECT * FROM contratos_compra_venta_inmueble WHERE inmueble = ".$inmueble;		
		$rs = $this->Execute($sql);
		return $rs;
    }
	
	/**
	 * Obtiene todos los contratos de compra-venta realizados de un determinado inmueble con sus facturas
	 *
	 * @param [inmueble]			Indentificador del inmueble
	 *
	 * @return Devuelve un objeto con todas contratos de compra-venta y sus facturas encontradas
	 *
	 */
	
	function ObtenerContratosFacturasInmueble($inmueble)
    {  
		$sql="SELECT * FROM contratos_compra_venta_inmueble LEFT JOIN facturas_contratos_compra_venta_inmueble ON id_contrato_compra_venta=contrato_compra_venta WHERE inmueble=".$inmueble;
		$rs = $this->Execute($sql);
		return $rs;
    }
}
?>