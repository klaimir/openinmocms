<?php
/*
InformesContratosArrendamientoInmuebleTemporadaPDF.class.php, v 2.4 2013/05/13

InformesContratosArrendamientoInmuebleTemporadaPDF - Clase para crear informes de los contratos de arrendamiento de los inmuebles en formato PDF

Esta librería es propiedad de Ángel Luis Berasuain Ruiz, cualquier uso que pudiera darse
tendrá que estar autorizado expresamente bajo mi supervisión.

Si tienes cualquier sugerencia, duda o comentario, por favor enviámela a:

Ángel Luis Berasuain Ruiz
klaimir@hotmail.com

*/

/* load classes */

require_once("InformesContratosArrendamientoInmueblePDF.class.php");
require_once('plantilla_app.php');

/* load libraries */

require_once(PATHINCLUDE_FRAMEWORK_LIBRERIAS.'NumerosLetras.class.php');

/**
*
* InformesContratosArrendamientoInmuebleTemporadaPDF
*
* Clase para crear informes de los contratos de arrendamiento de los inmuebles en formato PDF
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  InformesContratosArrendamientoInmuebleTemporadaPDF.class.php, v 2.4 2013/05/13
* @access   public
*/

class InformesContratosArrendamientoInmuebleTemporadaPDF extends InformesContratosArrendamientoInmueblePDF
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
	 * Imprime una plantilla de contrato de arrendamiento
	 *
	 *
	 * @return Devuelve true o false
	 */
	
	function PlantillaFicha()
	{	
		// Formateo de datos
		$datos['dia_fecha']="_____";
		$datos['mes_fecha']="________________";
		$datos['anio_fecha']="_______";
		$datos['nombre_completo']="_____________________________________________________";
		$datos['nif']="____________________";
		$datos['poblacion']="____________________________";
		$datos['domicilio']="_________________________________________________";
		$datos['estado_civil']="_______________________";
		$datos['nombre_completo_comprador']="________________________________________________________";
		$datos['nif_comprador']="____________________";
		$datos['poblacion_comprador']="_____________________________";
		$datos['domicilio_comprador']="______________________________________________________";
		$datos['estado_civil_comprador']="_________________";	
		$datos['direccion_vivienda']="___________________________________________________________________";		
		$datos['provincia_comprador']="______________________________";
		$datos['poblacion_vivienda']="________________________________";	
		$datos['cuota_mensual_texto']="__________________________________________________";
		$datos['cuota_mensual']="_______________";		
		$datos['dia_fecha_inicio_contrato']="_______";
		$datos['mes_fecha_inicio_contrato']="________________";
		$datos['anio_fecha_inicio_contrato']="_______";		
		$datos['dia_fecha_fin_contrato']="_______";
		$datos['mes_fecha_fin_contrato']="________________";
		$datos['anio_fecha_fin_contrato']="_______";		
		$datos['dia_fecha_primer_pago']="_______";
		$datos['mes_fecha_primer_pago']="________________";
		$datos['anio_fecha_primer_pago']="_______";
	// Sección principal
		$this->CuerpoFicha($datos);
		// Salida del PDF
		return $this->pdf->Output();
	}
	
	/**
	 * Imprime una ficha de contrato de arrendamiento y la almacena en la BD
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
		$consulta = $DB->Execute("SELECT * FROM contratos_arrendamiento_inmueble WHERE id_contrato_arrendamiento=". $id_contrato_arrendamiento) or die($DB->ErrorMsg());
		$row_consulta = $consulta->FetchRow();
		$totalRows_consulta = $consulta->RecordCount();
		// Comprobaciones
		$this->ComprobarContratoArrendamientoBD($id_contrato_arrendamiento,$datos['cliente_vendedor'],$datos['inmueble']);	
		// Formateo de datos
		$datos=$row_consulta;
		$fecha_separada=explode("-",$datos['fecha']);
		$datos['dia_fecha']=$fecha_separada[2];
		$datos['mes_fecha']=obtener_mes((int)$fecha_separada[1]);
		$datos['anio_fecha']=$fecha_separada[0];
		$datos['nombre_completo']=$datos['nombre']." ".$datos['apellidos'];
		$datos['poblacion']=formatear_poblacion($datos['poblacion']);
		$datos['provincia']=formatear_provincia($datos['provincia']);		
		$datos['nombre_completo_comprador']=$datos['nombre_comprador']." ".$datos['apellidos_comprador'];
		$datos['poblacion_comprador']=formatear_poblacion($datos['poblacion_comprador']);
		$datos['provincia_comprador']=formatear_provincia($datos['provincia_comprador']);
		$datos['poblacion_vivienda']=formatear_poblacion($datos['poblacion_vivienda']);
		$enletras=new EnLetras();
		$datos['cuota_mensual_texto']=strtoupper($enletras->ValorEnLetras($datos['cuota_mensual'],"euros"));
		$datos['cuota_mensual']=number_format($datos['cuota_mensual'], 2, ',', '.');
		$fecha_separada=explode("-",$datos['fecha_inicio_contrato']);
		$datos['dia_fecha_inicio_contrato']=$fecha_separada[2];
		$datos['mes_fecha_inicio_contrato']=obtener_mes((int)$fecha_separada[1]);
		$datos['anio_fecha_inicio_contrato']=$fecha_separada[0];		
		$fecha_separada=explode("-",$datos['fecha_fin_contrato']);
		$datos['dia_fecha_fin_contrato']=$fecha_separada[2];
		$datos['mes_fecha_fin_contrato']=obtener_mes((int)$fecha_separada[1]);
		$datos['anio_fecha_fin_contrato']=$fecha_separada[0];
		$fecha_separada=explode("-",$datos['fecha_primer_pago']);
		$datos['dia_fecha_primer_pago']=$fecha_separada[2];
		$datos['mes_fecha_primer_pago']=obtener_mes((int)$fecha_separada[1]);
		$datos['anio_fecha_primer_pago']=$fecha_separada[0];
		// Sección principal
		$this->CuerpoFicha($datos);
		// Salida del PDF
		return $this->pdf->Output(PATHINCLUDE_FRAMEWORK_DOC. "clientes/cliente_".$datos['cliente_vendedor']."/inmueble_".$datos['inmueble']."/contrato_arrendamiento_".$id_contrato_arrendamiento.".pdf");
	}
	
	/**
	 * Imprime una el cuerpo principal del contrato de arrendamiento de un inmueble
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
		
		// Primer Título
		$this->pdf->SetFont('Arial','BU',13);
		$this->pdf->MultiCell(190,5,"CONTRATO DE ARRENDAMIENTO DE VIVIENDA POR TEMPORADA",0,'C',0);
		$this->pdf->Ln(5);		
		$this->pdf->SetFont("arial", "", 8);
		$this->pdf->Cell(190,7,"En Cádiz a ".$datos['dia_fecha']." de ".$datos['mes_fecha']." de ".$datos['anio_fecha'].".",0,1);
		$this->pdf->Ln(5);
		
		// Segundo Título
		$this->pdf->SetFont('Arial','BU',13);
		$this->pdf->MultiCell(190,5,"REUNIDOS",0,'C',0);
		$this->pdf->Ln(5);
		$this->pdf->SetFont("arial", "", 8);
		$this->pdf->MultiCell(195,4,"De una parte como ARRENDADOR:",0,'L',0);
		$this->pdf->Ln(5);
		$this->pdf->MultiCell(195,4,"D. ".$datos['nombre_completo'].", mayor de edad, con D.N.I. nº ".$datos['nif']." , estado civil ".$datos['estado_civil'].", con domicilio en ".$datos['domicilio'].", ".$datos['poblacion'].".",0,'J',0);
		$this->pdf->Ln(5);
		$this->pdf->MultiCell(195,4,"Y de otra parte, como ARRENDATARIO:",0,'L',0);
		$this->pdf->Ln(5);
		$this->pdf->SetFont("arial", "", 8);
		$this->pdf->MultiCell(195,4,"D. ".$datos['nombre_completo_comprador'].", mayor  de edad, con D.N.I. nº ".$datos['nif_comprador'].", estado civil ".$datos['estado_civil_comprador'].", con domicilio en ".$datos['domicilio_comprador'].", ".$datos['poblacion_comprador'].".",0,'J',0);
		$this->pdf->Ln(5);		
		$this->pdf->MultiCell(195,4,"Ambas partes, actuando en la representación que intervienen y reconociéndose mutua y legal capacidad para obligarse cuanto en derecho proceda, dicen:",0,'J',0);
		$this->pdf->Ln(5);
		$this->pdf->MultiCell(195,4,"Libre y espontáneamente manifiestan:",0,'J',0);
		$this->pdf->Ln(5);
		$this->pdf->MultiCell(195,4,"I. Que D. ".$datos['nombre_completo'].", es propietario en pleno dominio de la siguiente finca.",0,'J',0);
		$this->pdf->Ln(5);		
		$this->pdf->SetFont("arial", "B", 8);
		$this->pdf->MultiCell(195,4,"Vivienda Sita. en ".$datos['poblacion_vivienda'].", ".$datos['direccion_vivienda'].".",0,'J',0);
		$this->pdf->Ln(5);		
		$this->pdf->SetFont("arial", "", 8);
		$this->pdf->MultiCell(195,4,"Que han convenido el arrendamiento del inmueble descrito en el antecedente expositivo anterior .",0,'J',0);
		$this->pdf->Ln(5);
		$this->pdf->MultiCell(195,4,"II. Manifiesta el ARRENDATARIO que dicho arrendamiento es por temporada, comenzando el ".$datos['dia_fecha_inicio_contrato']." del presente mes de ".$datos['mes_fecha_inicio_contrato']." y finalizando el ".$datos['dia_fecha_fin_contrato']." del mes de ".$datos['mes_fecha_fin_contrato']." del año ".$datos['anio_fecha_fin_contrato'].".",0,'J',0);
		$this->pdf->Ln(5);
		$this->pdf->MultiCell(195,4,"III. Se formaliza este contrato respecto al pago de ".$datos['cuota_mensual_texto']." EUROS (".$datos['cuota_mensual'].",-€), de  la mensualidad del presenta mes y el pago del siguiente mes se realizará el próximo día ".$datos['dia_fecha_primer_pago'].".",0,'J',0);
		$this->pdf->Ln(5);
		$this->pdf->MultiCell(195,4,"Y en prueba de aceptación y conformidad firman el presente  contrato por triplicado  en el lugar y fecha arriba indicado.",0,'J',0);
		$this->pdf->Ln(5);
		// Firmas
		$this->pdf->Cell(70,4,"EL ARRENDATARIO",0,0);
		$this->pdf->Cell(70,4,"EL ARRENDADOR",0,1);
		$this->pdf->Ln(25);
		$this->pdf->Cell(70,4,"Fdo. D. ___________________,",0,0);
		$this->pdf->Cell(70,4,"Fdo. D. ___________________,",0,0);
	}
}
?>