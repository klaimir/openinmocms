<?php
/*
InformesFacturasContratosInmueblePDF.class.php, v 2.4 2013/05/13

InformesFacturasContratosInmueblePDF - Clase para crear informes de las facturas de los contratos de los inmuebles en formato PDF

Esta librería es propiedad de Ángel Luis Berasuain Ruiz, cualquier uso que pudiera darse
tendrá que estar autorizado expresamente bajo mi supervisión.

Si tienes cualquier sugerencia, duda o comentario, por favor enviámela a:

Ángel Luis Berasuain Ruiz
klaimir@hotmail.com

*/

/* load classes */

require_once("InformesPDF.class.php");
require_once('plantilla_app.php');

/* load libraries */

// No son necesarias librerías adicionales

/**
*
* InformesFacturasContratosInmueblePDF
*
* Clase para crear informes de las facturas de los contratos de los inmuebles en formato PDF
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  InformesFacturasContratosInmueblePDF.class.php, v 2.4 2013/05/13
* @access   public
*/

class InformesFacturasContratosInmueblePDF extends InformesPDF
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
	 * Imprime una plantilla de la factura de los contrato
	 *
	 * @param [tipo_factura]			Indica el tipo de factura deseada. Los valores podrán ser "compra_venta" o "arrendamiento"
	 *
	 * @return Devuelve true o false
	 */
	
	function PlantillaFicha($tipo_factura)
	{	
		// Formateo de datos
		$datos['dia_fecha_emision']="_____";
		$datos['mes_fecha_emision']="_____";
		$datos['anio_fecha_emision']="_______";
		$datos['nombre_completo']="______________________________________________________________________________";
		$datos['provincia']="_________________________";
		$datos['poblacion']="________________________________________";
		$datos['domicilio']="__________________________________________________________";
		$datos['nif']="________________";
		$datos['poblacion_vivienda']="_____________________________________";
		$datos['direccion_vivienda']="_____________________________________________________________";
		$datos['cantidad_parcial']="";
		$datos['cantidad_total']="";
		$datos['iva']="";
		$datos['cantidad_iva']="";
		$datos['num_factura']="___________________";
		$datos['tipo_factura']=$tipo_factura;
		// Sección principal
		$this->CuerpoFicha($datos);
		// Salida del PDF
		return $this->pdf->Output();
	}
	
	/**
	 * Imprime una el cuerpo principal del contrato de un inmueble
	 *
	 * @param [datos]		Datos a imprimir
	 *
	 * @return void
	 */
	 
	function CuerpoFicha($datos) 
	{
		// Documento
		$this->pdf = new PDF_App();
		$this->pdf->SetMostrarLogo(false);
		$this->pdf->SetTopMargin(5);
		$this->pdf->AddPage();
		
		$this->pdf->SetTextColor(0,0,0);
		$this->pdf->SetDrawColor(0,0,0);
		$this->pdf->SetFillColor(140,140,140);
		
		// Datos de Factura
		$this->pdf->SetFont('Arial','BU',10);
		$this->pdf->MultiCell(190,5,"DATOS DE LA FACTURA",0,'L',0);
		$this->pdf->Ln(2);
		$this->pdf->SetFont("arial", "", 8);
		$this->pdf->MultiCell(195,4,"FECHA: ".$datos['dia_fecha_emision']."/".$datos['mes_fecha_emision']."/".$datos['anio_fecha_emision'],0,'J',0);
		$this->pdf->Ln(2);
		$this->pdf->MultiCell(195,4,"Nª FACTURA: ".$datos['num_factura'],0,'J',0);
		$this->pdf->Ln(2);
		if($datos['tipo_factura']=="compra_venta")
			$this->pdf->MultiCell(195,4,"CONCEPTO: Gestión por la intermediación de la venta del inmueble ubicado en ".$datos['poblacion_vivienda'].", ".$datos['direccion_vivienda'],0,'J',0);
		if($datos['tipo_factura']=="arrendamiento")
			$this->pdf->MultiCell(195,4,"CONCEPTO: Gestión por la intermediación del arrendamiento del inmueble ubicado en ".$datos['poblacion_vivienda'].", ".$datos['direccion_vivienda'],0,'J',0);
		$this->pdf->Ln(7);
		$this->pdf->SetFont("arial", "", 8);
		$this->pdf->Cell(30,4,"IMPORTE",1,0);
		$this->pdf->Cell(15,4,"",1,0);
		$this->pdf->Cell(30,4,$datos['cantidad_parcial'],1,0);
		$this->pdf->Cell(20,4,"EUROS",1,1);
		$this->pdf->Cell(30,4,"I.V.A.",1,0);
		$this->pdf->Cell(15,4,$datos['iva'],1,0);
		$this->pdf->Cell(30,4,$datos['cantidad_iva'],1,0);
		$this->pdf->Cell(20,4,"EUROS",1,1);
		$this->pdf->Cell(30,4,"TOTAL",1,0);
		$this->pdf->Cell(15,4,"",1,0);
		$this->pdf->Cell(30,4,$datos['cantidad_total'],1,0);
		$this->pdf->Cell(20,4,"EUROS",1,1);
		$this->pdf->Ln(10);
		
		// Datos del cliente
		$this->pdf->SetFont('Arial','BU',10);
		$this->pdf->MultiCell(190,5,"DATOS DEL CLIENTE",0,'L',0);
		$this->pdf->Ln(2);
		$this->pdf->SetFont("arial", "", 8);
		$this->pdf->MultiCell(195,4,"NOMBRE: ".$datos['nombre_completo'],0,'J',0);
		$this->pdf->Ln(2);
		$this->pdf->MultiCell(195,4,"DOMICILIO: ".$datos['domicilio'].", ".$datos['poblacion'],0,'J',0);
		$this->pdf->Ln(2);
		$this->pdf->MultiCell(195,4,"NIF: ".$datos['nif'],0,'J',0);
		$this->pdf->Ln(15);
		
		// Firmas
		$this->pdf->SetFont("arial", "", 8);
		$this->pdf->Cell(70,4,"DE CONFORMIDAD",0,1);
		$this->pdf->Ln(5);
		$this->pdf->Cell(70,4,"EL AGENTE COMERCIAL",0,0);
		$this->pdf->Cell(70,4,"EL VENDEDOR",0,1);
		$this->pdf->Ln(25);
		$this->pdf->Cell(70,4,"Fdo. D. ___________________,",0,0);
		$this->pdf->Cell(70,4,"Fdo. D. ___________________,",0,0);
	}
}
?>