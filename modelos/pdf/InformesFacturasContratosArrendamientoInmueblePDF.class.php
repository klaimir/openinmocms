<?php
/*
InformesFacturasContratosArrendamientoInmueblePDF.class.php, v 2.4 2013/05/13

InformesFacturasContratosArrendamientoInmueblePDF - Clase para crear informes de las facturas de los contratos de arrendamiento de los inmuebles en formato PDF

Esta librería es propiedad de Ángel Luis Berasuain Ruiz, cualquier uso que pudiera darse
tendrá que estar autorizado expresamente bajo mi supervisión.

Si tienes cualquier sugerencia, duda o comentario, por favor enviámela a:

Ángel Luis Berasuain Ruiz
klaimir@hotmail.com

*/

/* load classes */

require_once("InformesFacturasContratosInmueblePDF.class.php");
require_once('plantilla_app.php');

/* load libraries */

// No son necesarias librerías adicionales

/**
*
* InformesFacturasContratosArrendamientoInmueblePDF
*
* Clase para crear informes de las facturas de los contratos de arrendamiento de los inmuebles en formato PDF
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  InformesFacturasContratosArrendamientoInmueblePDF.class.php, v 2.4 2013/05/13
* @access   public
*/

class InformesFacturasContratosArrendamientoInmueblePDF extends InformesFacturasContratosInmueblePDF
{	
	/**
	 * Constructor
	 *
	 */
	 
	function __construct($color='rojo',$pos_x=NULL,$pos_y=NULL,$tam_letra=8)
    {  
		parent::__construct($color,$pos_x,$pos_y,$tam_letra);
    }
	
	/**
	 * Imprime una ficha de la factura de un contrato de arrendamiento y la almacena en la BD
	 *
	 * @param [id_contrato_arrendamiento]	Identificador del contrato de arrendamiento
	 *
	 * @return Devuelve true o false
	 */
	
	function Ficha($id_contrato_arrendamiento)
	{
		// Conexión Base de datos
		$DB = new Model();		
		// Consulta
		$consulta = $DB->Execute("SELECT * FROM facturas_contratos_arrendamiento_inmueble,contratos_arrendamiento_inmueble WHERE id_contrato_arrendamiento=contrato_arrendamiento AND id_contrato_arrendamiento=". $id_contrato_arrendamiento) or die($DB->ErrorMsg());
		$row_consulta = $consulta->FetchRow();
		$totalRows_consulta = $consulta->RecordCount();
		// Formateo de datos
		$datos=$row_consulta;
		// Comprobaciones
		$this->ComprobarContratoArrendamientoBD($id_contrato_arrendamiento,$datos['cliente_vendedor'],$datos['inmueble']);	
		$fecha_emision_separada=explode("-",$datos['fecha_emision']);
		$datos['dia_fecha_emision']=$fecha_emision_separada[2];
		$datos['mes_fecha_emision']=$fecha_emision_separada[1];
		$datos['anio_fecha_emision']=$fecha_emision_separada[0];
		$datos['nombre_completo']=$datos['nombre']." ".$datos['apellidos'];
		$datos['poblacion']=formatear_poblacion($datos['poblacion']);
		$datos['provincia']=formatear_provincia($datos['provincia']);
		$datos['poblacion_vivienda']=formatear_poblacion($datos['poblacion_vivienda']);
		$datos['iva']=number_format($datos['iva'], 2, ',', '.');
		$datos['cantidad_iva']=number_format($datos['cantidad_iva'], 2, ',', '.');
		$datos['cantidad_parcial']=number_format($datos['cantidad_parcial'], 2, ',', '.');
		$datos['cantidad_total']=number_format($datos['cantidad_total'], 2, ',', '.');
		$datos['tipo_factura']="arrendamiento";
		// Sección principal
		$this->CuerpoFicha($datos);
		// Salida del PDF
		return $this->pdf->Output(PATHINCLUDE_FRAMEWORK_DOC. "clientes/cliente_".$datos['cliente_vendedor']."/inmueble_".$datos['inmueble']."/factura_contrato_arrendamiento_".$id_contrato_arrendamiento.".pdf");
	}
	
	/**
	 * Comprueba si todas las carpetas necesarias para el almacenamiento físico de el contrato de arrendamiento han sido creadas
	 *
	 * @param [id_contrato_arrendamiento]	Identificador del contrato de arrendamiento
	 * @param [cliente]						Identificador del cliente
	 * @param [inmueble]					Identificador del inmueble
	 *
	 * @return void
	 */
	 
	private function ComprobarContratoArrendamientoBD($id_contrato_arrendamiento,$cliente,$inmueble)
	{	
		// Si no existen los directorios
		if(!is_dir(PATHINCLUDE_FRAMEWORK_DOC . "clientes/cliente_".$cliente."/"))
		{
			mkdir(PATHINCLUDE_FRAMEWORK_DOC . "clientes/cliente_".$cliente."/");
		}
		if(!is_dir(PATHINCLUDE_FRAMEWORK_DOC . "clientes/cliente_".$cliente."/inmueble_".$inmueble."/"))
		{
			mkdir(PATHINCLUDE_FRAMEWORK_DOC . "clientes/cliente_".$cliente."/inmueble_".$inmueble."/");
		}
		// Borramos la el fichero fisico de la carpeta
		if(file_exists(PATHINCLUDE_FRAMEWORK_DOC. "clientes/cliente_".$cliente."/inmueble_".$inmueble."/factura_contrato_arrendamiento_".$id_contrato_arrendamiento.".pdf"))
		{
			unlink(PATHINCLUDE_FRAMEWORK_DOC. "clientes/cliente_".$cliente."/inmueble_".$inmueble."/factura_contrato_arrendamiento_".$id_contrato_arrendamiento.".pdf");
		}
	}
}
?>