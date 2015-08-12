<?php
/*
Clientes.class.php, v 2.4 2013/05/13

ModelClientes - Clase gestionar todas las peticiones y operaciones relacionadas con los clientes registradas

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
* ModelClientes
*
* Clase gestionar todas las peticiones y operaciones relacionadas con las clientes registradas
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  Clientes.class.php, v 2.4 2013/05/13
* @access   public
*/

class ModelClientes extends Model
{
    public $id_cliente;
	public $nombre;
	public $apellidos;
	public $direccion;
	public $provincia;
	public $poblacion;
	public $telefono;
	public $observaciones;
	public $nif;
	public $fecha_alta;
	public $correo;
	public $busca_vender;
	public $busca_comprar;
	public $busca_alquilar;
	public $busca_alquiler;
	public $estado;
	public $agente_asignado;
	
	/**
	 * Constructor
	 *
	 */
	
	function ModelClientes()
    {  
		parent::Model();
		$this->id_cliente=NULL;
		$this->nombre=NULL;
		$this->apellidos=NULL;
		$this->direccion=NULL;
		$this->provincia=NULL;
		$this->poblacion=NULL;
		$this->telefono=NULL;
		$this->observaciones=NULL;
		$this->nif=NULL;
		$this->fecha_alta=NULL;
		$this->correo=NULL;
		$this->busca_vender=NULL;
		$this->busca_comprar=NULL;
		$this->busca_alquilar=NULL;
		$this->busca_alquiler=NULL;
		$this->estado=NULL;
		$this->agente_asignado=NULL;
    }
	
	/**
	 * Establecen los datos de los distintos atributos de la clase
	 *
	 * @param [datos]		Datos de configuración
	 *
	 */
	
	function Set($datos)
    {  
		if(isset($datos['id_cliente'])) $this->id_cliente=$datos['id_cliente'];
		if(isset($datos['nombre'])) $this->nombre=$datos['nombre'];
		if(isset($datos['apellidos'])) $this->apellidos=$datos['apellidos'];
		if(isset($datos['direccion'])) $this->direccion=$datos['direccion'];
		if(isset($datos['provincia'])) $this->provincia=$datos['provincia'];
		if(isset($datos['poblacion'])) $this->poblacion=$datos['poblacion'];
		if(isset($datos['telefono'])) $this->telefono=$datos['telefono'];
		if(isset($datos['observaciones'])) $this->observaciones=$datos['observaciones'];
		if(isset($datos['nif'])) $this->nif=$datos['nif'];
		if(isset($datos['fecha_alta'])) $this->fecha_alta=$datos['fecha_alta'];
		if(isset($datos['correo'])) $this->correo=$datos['correo'];
		if(isset($datos['busca_vender'])) $this->busca_vender=$datos['busca_vender'];
		if(isset($datos['busca_comprar'])) $this->busca_comprar=$datos['busca_comprar'];		
		if(isset($datos['busca_alquilar'])) $this->busca_alquilar=$datos['busca_alquilar'];
		if(isset($datos['busca_alquiler'])) $this->busca_alquiler=$datos['busca_alquiler'];
		if(isset($datos['estado'])) $this->estado=$datos['estado'];
		if(isset($datos['agente_asignado'])) $this->agente_asignado=$datos['agente_asignado'];
    }
	
	/**
	 * Establecen los datos de los distintos atributos de la clase según los valores del identificador suministrado
	 *
	 * @param [id_cliente]		Identificador
	 *
	 */
	
	function SetDataObject($id_cliente)
    {  
		$sql = "SELECT * FROM clientes WHERE id_cliente = ".$id_cliente;
		$rs = $this->Execute($sql);
		$rs_row = $rs->FetchRow();
		$this->Set($rs_row);
    }
	
	/**
	 * Inserta un cliente en la base de datos
	 *
	 * @param [datos]		Array con los diferentes valores a insertar
	 *
	 * @return Devuelve el último identificador insertado o false en caso contrario
	 */
	 
	function Insert($datos)
    {  
		$sql = "SELECT * FROM clientes WHERE id_cliente = -1";
		$rs = $this->Execute($sql);
		$insertSQL = $this->GetInsertSQL($rs,$datos);
		$this->Execute($insertSQL) or die($this->ErrorMsg());		
		$ultimo_id=$this->Insert_ID('clientes','id_cliente');
		// Devolvemos el último insertado
		return $ultimo_id;
    }
	
	/**
	 * Realiza el proceso de actualización de un cliente
	 *
	 * @param [datos]			Array con los diferentes valores a editar
	 * @param [id_cliente]		Identificador del cliente
	 *
	 * @return Devuelve true o false
	 */
	 
	function Update($datos,$id_cliente)
    {
		$sql = "SELECT * FROM clientes WHERE id_cliente = '".$id_cliente."'";
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
	 * Elimina un cliente de la base de datos
	 *
	 * @param [id_cliente]		Indentificador del cliente
	 *
	 * @return Devuelve true o false
	 */
	 
	function Delete($id_cliente)
    {
		// Se borran manualmente todos los inmuebles asociados
		require_once(PATHINCLUDE_FRAMEWORK_MODELOS.'Inmuebles.class.php');
		$inmuebles_asociados=$this->ObtenerInmueblesAsociados($id_cliente);
		// Si existen
		foreach($inmuebles_asociados as $id_inmueble)
		{
			$inmueble = new ModelInmuebles();
			$inmueble->Delete($id_inmueble);
		}
		// Finalmente borra el cliente de la tabla clientes
		$sql = "DELETE FROM clientes WHERE id_cliente='".$id_cliente."'";
		$this->Execute($sql) or die($this->ErrorMsg());
		// Borrado de archivos asociados
		full_rmdir(PATHINCLUDE_FRAMEWORK_DOC . "clientes/cliente_".$id_cliente);
    }
	
	/**
	 * Determina si un cliente tiene sólo un inmueble activo
	 *
	 * @param [id_cliente]		Identificador del cliente
	 *
	 * @return true or false
	 */
	 
	function UnicoInmuebleSinCerrar($id_cliente)
    {  
		$sql = "SELECT inmuebles.* FROM clientes_inmuebles,inmuebles WHERE id_inmueble = inmueble AND estado='activo' AND cliente=".$id_cliente;
		$inmuebles = $this->Execute($sql);
		$num_inmuebles = $inmuebles->RecordCount();
		if($num_inmuebles==1)
			return true;
		else
			return false;
    }
	
	/**
	 * Devuelve los inmuebles asociados al cliente indicado
	 *
	 * @param [id_cliente]		Identificador del cliente
	 *
	 * @return Vector con los inmuebles asociados
	 */
	
	function ObtenerInmueblesAsociados($id_cliente)
    {  
		$inmuebles_asociados=array();
		$sql="SELECT inmueble FROM clientes_inmuebles WHERE cliente=".$id_cliente;
		$rs = $this->Execute($sql);
		$num_rs=$rs->RecordCount();
		if($num_rs>0)
		{
			foreach($rs as $inmueble_asociado)
			{
				$inmuebles_asociados[]=$inmueble_asociado['inmueble'];
			}
		}
		return $inmuebles_asociados;
    }
}
?>