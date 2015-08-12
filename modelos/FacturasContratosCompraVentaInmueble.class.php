<?php
/*
FacturasContratosCompraVentaInmueble.class.php, v 2.4 2013/05/13

ModelFacturasContratosCompraVentaInmueble - Clase gestionar todas las peticiones y operaciones relacionadas con los contratos de compra-venta de los inmuebles registrados

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
* ModelFacturasContratosCompraVentaInmueble
*
* Clase gestionar todas las peticiones y operaciones relacionadas con los contratos de compra-venta de los inmuebles registrados
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  FacturasContratosCompraVentaInmueble.class.php, v 2.4 2013/05/13
* @access   public
*/

class ModelFacturasContratosCompraVentaInmueble extends ModelFacturasContratosInmueble
{	
	public $contrato_compra_venta;
	
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
		if(isset($datos['contrato_compra_venta'])) $this->contrato_compra_venta=$datos['contrato_compra_venta'];
    }
	
	/**
	 * Establecen los datos de los distintos atributos de la clase según los valores del identificador suministrado
	 *
	 * @param [contrato_compra_venta]		Identificador
	 *
	 */
	
	function SetDataObject($contrato_compra_venta)
    {  
		$sql = "SELECT * FROM facturas_contratos_compra_venta_inmueble WHERE contrato_compra_venta = ".$contrato_compra_venta;
		$rs = $this->Execute($sql);
		$rs_row = $rs->FetchRow();
		$this->Set($rs_row);
    }
	
	/**
	 * Inserta una contrato de compra-venta en la base de datos
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
		$sql = "SELECT * FROM facturas_contratos_compra_venta_inmueble WHERE contrato_compra_venta = -1";
		$rs = $this->Execute($sql);
		$insertSQL = $this->GetInsertSQL($rs,$datos);
		return $this->Execute($insertSQL) or die($this->ErrorMsg());
    }
	
	/**
	 * Realiza el proceso de actualización de una contrato de compra-venta
	 *
	 * @param [datos]					Array con los diferentes valores a editar
	 * @param [contrato_compra_venta]	Indentificador del contrato de compra-venta
	 *
	 * @return Devuelve true o false
	 */
	 
	function Update($datos,$contrato_compra_venta)
    {
		$sql = "SELECT * FROM facturas_contratos_compra_venta_inmueble WHERE contrato_compra_venta = ".$contrato_compra_venta;
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
	 * @param [contrato_compra_venta]	Indentificador de la contrato de compra-venta
	 * @param [cliente_vendedor]		Indentificador del cliente vendedor
	 * @param [inmueble]				Indentificador del inmueble
	 *
	 * @return Devuelve true o false
	 */
	 
	function Delete($contrato_compra_venta,$cliente_vendedor,$inmueble)
    {  
		// Finalmente borrado
		$sql = sprintf("DELETE FROM facturas_contratos_compra_venta_inmueble WHERE contrato_compra_venta=%s",
							GetSQLValueString($contrato_compra_venta, "int"));
		$this->Execute($sql) or die($this->ErrorMsg());
		// Borramos fichero asociado
		if(file_exists(PATHINCLUDE_FRAMEWORK_DOC. "clientes/cliente_".$cliente_vendedor."/inmueble_".$inmueble."/factura_contrato_compra_venta_".$contrato_compra_venta.".pdf"))
		{
			unlink(PATHINCLUDE_FRAMEWORK_DOC. "clientes/cliente_".$cliente_vendedor."/inmueble_".$inmueble."/factura_contrato_compra_venta_".$contrato_compra_venta.".pdf");
		}
    }
}
?>