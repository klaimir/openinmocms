<?php
/*
FacturasContratosInmueble.class.php, v 2.4 2013/05/13

ModelFacturasContratosInmueble - Clase gestionar todas las peticiones y operaciones relacionadas con los contratos de los inmuebles registrados

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
* ModelFacturasContratosInmueble
*
* Clase gestionar todas las peticiones y operaciones relacionadas con los contratos de los inmuebles registrados
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  FacturasContratosInmueble.class.php, v 2.4 2013/05/13
* @access   public
*/

class ModelFacturasContratosInmueble extends Model
{
	public $num_factura;
	public $estado;
	public $iva;
	public $cantidad_iva;
	public $cantidad_parcial;
	public $cantidad_total;
	public $observaciones;
	public $fecha_emision;	
	
	/**
	 * Constructor
	 *
	 */
	
	function ModelFacturasContratosInmueble()
    {  
		parent::Model();
		$this->num_factura=NULL;
		$this->estado=NULL;
		$this->iva=NULL;
		$this->cantidad_iva=NULL;
		$this->cantidad_parcial=NULL;	
		$this->cantidad_total=NULL;
		$this->observaciones=NULL;
		$this->fecha_emision=NULL;
    }
	
	/**
	 * Establecen los datos de los distintos atributos de la clase
	 *
	 * @param [datos]		Datos de configuración
	 *
	 */
	
	function Set($datos)
    {  
		if(isset($datos['num_factura'])) $this->num_factura=$datos['num_factura'];
		if(isset($datos['estado'])) $this->estado=$datos['estado'];
		if(isset($datos['iva'])) $this->iva=$datos['iva'];
		if(isset($datos['cantidad_iva'])) $this->cantidad_iva=$datos['cantidad_iva'];
		if(isset($datos['cantidad_parcial'])) $this->cantidad_parcial=$datos['cantidad_parcial'];
		if(isset($datos['cantidad_total'])) $this->cantidad_total=$datos['cantidad_total'];
		if(isset($datos['observaciones'])) $this->observaciones=$datos['observaciones'];
		if(isset($datos['fecha_emision'])) $this->fecha_emision=$datos['fecha_emision'];
    }
			
	/**
	 * Calcula el siguiente número de orden de una factura
	 *
	 * @param [fecha_emision]		Fecha de emisión en formato YYYY-mm-dd
	 *
	 * @return Devuelve el número de factura del año de la fecha
	 */
	 
	function ObtenerProximoNumFactura($fecha_emision) 
	{
		// Separamos el año de la fecha para buscar
		$fecha_emision_descomp=explode("-",$fecha_emision);
		$sql_fecha = " AND DATE_FORMAT(fecha_emision, '%Y')='" . $fecha_emision_descomp[0] . "'";
		// Se genera un número de factura secuencia en función del año de emisión
		$sql = "SELECT max(num_factura) as max_num_factura FROM facturas_contratos_compra_venta_inmueble WHERE 1 ".$sql_fecha;
		$compra_venta = $this->Execute($sql);
		$compra_venta_row = $compra_venta->FetchRow();
		
		$sql = "SELECT max(num_factura) as max_num_factura FROM facturas_contratos_arrendamiento_inmueble WHERE 1 ".$sql_fecha;
		$arrendamiento = $this->Execute($sql);
		$arrendamiento_row = $arrendamiento->FetchRow();
		// Se obtiene el máximo número de factura compartido
		$max_num_factura=$this->ObtenerMaximoNumFactura($compra_venta_row['fecha_emision'],$arrendamiento_row['fecha_emision']);
		$max_num_factura_formateado=ObtenerNumSecuencialFormateado($max_num_factura);
		return $max_num_factura_formateado."/".$fecha_emision_descomp[0];
    }
	
	/**
	 * Calcula el siguiente número de orden de una factura
	 *
	 * @param [fecha_emision_compra_venta]		Fecha de emisión de contrato de compra-venta en formato YYYY-mm-dd
	 * @param [fecha_emision_arrendamiento]		Fecha de emisión de contrato de arrendamiento en formato YYYY-mm-dd
	 *
	 * @return Devuelve el máximo número de factura
	 */
	 
	function ObtenerMaximoNumFactura($fecha_emision_compra_venta,$fecha_emision_arrendamiento) 
	{	
		// Se obtiene el número de fecha de emisión	compra-venta	
		if(is_null($fecha_emision_compra_venta))
		{
			$max_num_compra_venta=1;
		}
		else
		{
			$max_num_compra_venta_descomp=explode("/",$fecha_emision_compra_venta);
			$max_num_compra_venta=(int)$max_num_compra_venta_descomp[0];
		}
		// Se obtiene el número de fecha de emisión de arrendamiento
		if(is_null($fecha_emision_arrendamiento))
		{
			$max_num_arrendamiento=1;
		}
		else
		{
			$max_num_arrendamiento_descomp=explode("/",$fecha_emision_arrendamiento);
			$max_num_arrendamiento=(int)$max_num_arrendamiento_descomp[0];
		}
		// Se devuelve el máximo
		if($max_num_compra_venta>$max_num_arrendamiento)
			return $max_num_compra_venta;
		else
			return $max_num_arrendamiento;
    }
}
?>