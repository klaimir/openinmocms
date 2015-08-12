<?php
/*
FacturasContratosArrendamientoInmueble.class.php, v 2.4 2013/05/13

ModelFacturasContratosArrendamientoInmueble - Clase gestionar todas las peticiones y operaciones relacionadas con los contratos de arrendamiento de los inmuebles registrados

Esta librería es propiedad de Ángel Luis Berasuain Ruiz, cualquier uso que pudiera darse
tendrá que estar autorizado expresamente bajo mi supervisión.

Si tienes cualquier sugerencia, duda o comentario, por favor enviámela a:

Ángel Luis Berasuain Ruiz
klaimir@hotmail.com

*/

/* load classes */

require_once('FacturasContratosInmueble.class.php');

/* load libraries */

// No son necesarias librerías auxiliares

/**
*
* ModelFacturasContratosArrendamientoInmueble
*
* Clase gestionar todas las peticiones y operaciones relacionadas con los contratos de arrendamiento de los inmuebles registrados
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  FacturasContratosArrendamientoInmueble.class.php, v 2.4 2013/05/13
* @access   public
*/

class ModelFacturasContratosArrendamientoInmueble extends ModelFacturasContratosInmueble
{	
	public $contrato_arrendamiento;
	
	/**
	 * Constructor
	 *
	 */
	 
	function __construct($color='rojo',$pos_x=NULL,$pos_y=NULL,$tam_letra=8)
    {  
		parent::ModelFacturasContratosInmueble();
    }
	
	/**
	 * Establecen los datos de los distintos atributos de la clase
	 *
	 * @param [datos]		Datos de configuración
	 *
	 */
	
	function Set($datos)
    {  
		parent::Set($datos);
		if(isset($datos['contrato_arrendamiento'])) $this->contrato_arrendamiento=$datos['contrato_arrendamiento'];
    }
	
	/**
	 * Establecen los datos de los distintos atributos de la clase según los valores del identificador suministrado
	 *
	 * @param [contrato_arrendamiento]		Identificador
	 *
	 */
	
	function SetDataObject($contrato_arrendamiento)
    {  
		$sql = "SELECT * FROM facturas_contratos_arrendamiento_inmueble WHERE contrato_arrendamiento = ".$contrato_arrendamiento;
		$rs = $this->Execute($sql);
		$rs_row = $rs->FetchRow();
		$this->Set($rs_row);
    }
	
	/**
	 * Inserta una contrato de arrendamiento en la base de datos
	 *
	 * @param [datos]		Datos a insertar
	 *
	 * @return true or false
	 */
	 
	function Insert($datos)
    {  
		// Se calcula el próximo número de factura
		$datos['num_factura']=$this->ObtenerProximoNumFactura($datos['fecha_emision']);
		// Se inserta con los demás datos
		$sql = "SELECT * FROM facturas_contratos_arrendamiento_inmueble WHERE contrato_arrendamiento = -1";
		$rs = $this->Execute($sql);
		$insertSQL = $this->GetInsertSQL($rs,$datos);
		return $this->Execute($insertSQL) or die($this->ErrorMsg());
    }
	
	/**
	 * Realiza el proceso de actualización de una contrato de arrendamiento
	 *
	 * @param [datos]					Array con los diferentes valores a editar
	 * @param [contrato_arrendamiento]	Indentificador del contrato de arrendamiento
	 *
	 * @return Devuelve true o false
	 */
	 
	function Update($datos,$contrato_arrendamiento)
    {
		$sql = "SELECT * FROM facturas_contratos_arrendamiento_inmueble WHERE contrato_arrendamiento = ".$contrato_arrendamiento;
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
	 * @param [contrato_arrendamiento]	Indentificador de la contrato de arrendamiento
	 * @param [cliente_vendedor]		Indentificador del cliente vendedor
	 * @param [inmueble]				Indentificador del inmueble
	 *
	 * @return Devuelve true o false
	 */
	 
	function Delete($contrato_arrendamiento,$cliente_vendedor,$inmueble)
    {  
		// Finalmente borrado
		$sql = sprintf("DELETE FROM facturas_contratos_arrendamiento_inmueble WHERE contrato_arrendamiento=%s",
							GetSQLValueString($contrato_arrendamiento, "int"));
		$this->Execute($sql) or die($this->ErrorMsg());
		// Borramos fichero asociado
		if(file_exists(PATHINCLUDE_FRAMEWORK_DOC. "clientes/cliente_".$cliente_vendedor."/inmueble_".$inmueble."/factura_contrato_arrendamiento_".$contrato_arrendamiento.".pdf"))
		{
			unlink(PATHINCLUDE_FRAMEWORK_DOC. "clientes/cliente_".$cliente_vendedor."/inmueble_".$inmueble."/factura_contrato_arrendamiento_".$contrato_arrendamiento.".pdf");
		}
    }
}
?>