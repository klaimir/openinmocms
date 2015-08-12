<?php
/*
InformesPresupuestosInmueblePDF.class.php, v 2.4 2013/05/13

InformesPresupuestosInmueblePDF - Clase para crear informes de los presupuestos de los inmuebles en formato PDF

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
* InformesPresupuestosInmueblePDF
*
* Clase para crear informes de los presupuestos de los inmuebles en formato PDF
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  InformesPresupuestosInmueblePDF.class.php, v 2.4 2013/05/13
* @access   public
*/

class InformesPresupuestosInmueblePDF extends InformesPDF
{	
	public $tipo_presupuesto;
	
	/**
	 * Constructor
	 *
	 */
	 
	function __construct($color='rojo',$pos_x=NULL,$pos_y=NULL,$tam_letra=8)
    {  
		parent::__construct($color,$pos_x,$pos_y,$tam_letra);
    }
	
	/**
	 * Establece el tipo de presupuesto
	 *
	 * @param [datos]		Datos de configuración
	 *
	 */
	
	function SetTipoPresupuesto($tipo_presupuesto)
    {  
		$this->tipo_presupuesto=$tipo_presupuesto;
    }
	
	/**
	 * Imprime una plantilla del presupuesto
	 *
	 *
	 * @return Devuelve true o false
	 */
	
	function PlantillaFicha()
	{	
		// Formateo de datos
		$datos['dia']="____";
		$datos['mes']="____";
		$datos['anio']="____";
		$datos['texto_tipo_presupuesto']="_______________________";
		$datos['provincia_vivienda']="_______________________";
		$datos['poblacion_vivienda']="________________________________________";
		// Datos solicitados
		$datos['importe_solicitado']="________________";
		$datos['precio_vivienda']="________________";
		$datos['iajd']="_________";
		$datos['comunidad_autonoma']="__________________________________";
		// Gastos de hipoteca
		$datos['comision_apertura_hipoteca']="________________";
		$datos['tasacion_hipoteca']="________________";
		$datos['iajd_hipoteca']="_________";
		$datos['notaria_hipoteca']="________________";
		$datos['gestoria_hipoteca']="________________";
		$datos['registro_hipoteca']="________________";
		$datos['iva_hipoteca']="________________";
		$datos['seguro_hipoteca']="________________";
		// totales
		$datos['total_gastos_hipoteca']="________________";
		// Gastos de compra
		$datos['iva_nueva_vivienda']="________________";
		$datos['iajd_nueva_vivienda']="________________";
		$datos['itp']="________________";
		$datos['notaria']="________________";
		$datos['gestoria']="________________";
		$datos['registro']="________________";
		$datos['iva_gastos_comunes']="________________";
		// totales
		$datos['total_gastos_compra']="________________";
		$datos['total_gastos']="__________________";
		// Sección principal
		$this->CuerpoFicha($datos);
		// Salida del PDF
		return $this->pdf->Output();
	}
	
	/**
	 * Imprime una ficha del presupuesto y la almacena en la BD
	 *
	 * @param [id_presupuesto]	Identificador del presupuesto
	 * @param [inmueble]			Identificador del inmueble
	 *
	 * @return Devuelve true o false
	 */
	
	function Ficha($id_presupuesto,$inmueble)
	{
		// Conexión Base de datos
		$DB = new Model();		
		// Consulta
		$consulta = $DB->Execute("SELECT * FROM presupuestos_inmueble WHERE id_presupuesto=". $id_presupuesto." AND inmueble=". $inmueble) or die($DB->ErrorMsg());
		$row_consulta = $consulta->FetchRow();
		$totalRows_consulta = $consulta->RecordCount();
		// Formateo de datos
		$datos=$row_consulta;
		// Comprobaciones
		$this->ComprobarFicherosBD($id_presupuesto,$inmueble);	
		$fecha_separada=explode("-",$datos['fecha']);
		$datos['dia']=$fecha_separada[2];
		$datos['mes']=$fecha_separada[1];
		$datos['anio']=$fecha_separada[0];
		$datos['texto_tipo_presupuesto']=formatear_tipo_presupuesto($this->tipo_presupuesto);
		$datos['provincia_vivienda']=formatear_provincia($datos['provincia_vivienda']);
		$datos['poblacion_vivienda']=formatear_poblacion($datos['poblacion_vivienda']);
		// Datos solicitados
		$datos['importe_solicitado']=number_format($datos['importe_solicitado'], 2, ',', '.');
		$datos['precio_vivienda']=number_format($datos['precio_vivienda'], 2, ',', '.');
		$datos['iajd']=number_format($datos['iajd'], 2, ',', '.');	
		$datos['comunidad_autonoma']=formatear_comunidad_autonoma($datos['comunidad_autonoma']);
		// Gastos de hipoteca
		$datos['comision_apertura_hipoteca']=number_format($datos['comision_apertura_hipoteca'], 2, ',', '.');
		$datos['tasacion_hipoteca']=number_format($datos['tasacion_hipoteca'], 2, ',', '.');
		$datos['iajd_hipoteca']=number_format($datos['iajd_hipoteca'], 2, ',', '.');
		$datos['notaria_hipoteca']=number_format($datos['notaria_hipoteca'], 2, ',', '.');
		$datos['gestoria_hipoteca']=number_format($datos['gestoria_hipoteca'], 2, ',', '.');
		$datos['registro_hipoteca']=number_format($datos['registro_hipoteca'], 2, ',', '.');
		$datos['iva_hipoteca']=number_format($datos['iva_hipoteca'], 2, ',', '.');
		$datos['seguro_hipoteca']=number_format($datos['seguro_hipoteca'], 2, ',', '.');
		// totales
		$datos['total_gastos_hipoteca']=number_format($datos['total_gastos_hipoteca'], 2, ',', '.');
		// Gastos de compra
		$datos['iva_nueva_vivienda']=number_format($datos['iva_nueva_vivienda'], 2, ',', '.');
		$datos['iajd_nueva_vivienda']=number_format($datos['iajd_nueva_vivienda'], 2, ',', '.');
		$datos['itp']=number_format($datos['itp'], 2, ',', '.');
		$datos['notaria']=number_format($datos['notaria'], 2, ',', '.');
		$datos['gestoria']=number_format($datos['gestoria'], 2, ',', '.');
		$datos['registro']=number_format($datos['registro'], 2, ',', '.');
		$datos['iva_gastos_comunes']=number_format($datos['iva_gastos_comunes'], 2, ',', '.');
		// totales
		$datos['total_gastos_compra']=number_format($datos['total_gastos_compra'], 2, ',', '.');
		// Total general
		$datos['total_gastos']=number_format($datos['total_gastos'], 2, ',', '.');
		// Sección principal
		$this->CuerpoFicha($datos);
		// Salida del PDF
		return $this->pdf->Output(PATHINCLUDE_FRAMEWORK_DOC. "inmuebles/inmueble_".$datos['inmueble']."/presupuestos/presupuesto_".$id_presupuesto.".pdf");
	}
	
	/**
	 * Imprime una el cuerpo principal del presupuesto de un inmueble
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
		
		// Datos generales
		$this->pdf->SetFont('Arial','BU',10);
		$this->pdf->MultiCell(190,5,"DATOS GENERALES",0,'L',0);
		$this->pdf->Ln(2);
		$this->pdf->SetFont("arial", "", 8);
		$this->pdf->MultiCell(195,4,"Fecha: ".$datos['dia']."/".$datos['mes']."/".$datos['anio'],0,'L',0);
		$this->pdf->Ln(5);
		$this->pdf->MultiCell(195,4,"Tipo presupuesto: ".$datos['texto_tipo_presupuesto'],0,'L',0);
		$this->pdf->Ln(5);
		$this->pdf->MultiCell(195,4,"Provincia: ".$datos['provincia_vivienda'],0,'L',0);
		$this->pdf->Ln(5);
		$this->pdf->MultiCell(195,4,"Municipio: ".$datos['poblacion_vivienda'],0,'L',0);
		$this->pdf->Ln(7);
		// Datos solicitados
		$this->pdf->SetFont('Arial','BU',10);
		$this->pdf->MultiCell(190,5,"DATOS SOLICITADOS",0,'L',0);
		$this->pdf->Ln(2);
		$this->pdf->SetFont("arial", "", 8);
		$this->pdf->MultiCell(195,4,"Importe solicitado: ".$datos['importe_solicitado'],0,'L',0);
		$this->pdf->Ln(5);
		$this->pdf->MultiCell(195,4,"Precio inmueble: ".$datos['precio_vivienda'],0,'L',0);
		$this->pdf->Ln(5);
		$this->pdf->MultiCell(195,4,"Impuesto A.J.D.: ".$datos['iajd'],0,'L',0);
		$this->pdf->Ln(5);
		$this->pdf->MultiCell(195,4,"Comunidad autónoma: ".$datos['comunidad_autonoma'],0,'L',0);
		$this->pdf->Ln(7);
		// Gastos de hipoteca
		$this->pdf->SetFont('Arial','BU',10);
		$this->pdf->MultiCell(190,5,"GASTOS DE HIPOTECA",0,'L',0);
		$this->pdf->Ln(2);
		$this->pdf->SetFont("arial", "", 8);
		$this->pdf->MultiCell(195,4,"Comisión de apertura: ".$datos['comision_apertura_hipoteca'],0,'L',0);
		$this->pdf->Ln(5);
		$this->pdf->MultiCell(195,4,"Tasación: ".$datos['tasacion_hipoteca'],0,'L',0);
		$this->pdf->Ln(5);		
		$this->pdf->MultiCell(195,4,"Impuesto A.J.D.: ".$datos['iajd_hipoteca'],0,'L',0);
		$this->pdf->Ln(5);
		$this->pdf->MultiCell(195,4,"Notaría: ".$datos['notaria_hipoteca'],0,'L',0);
		$this->pdf->Ln(5);
		$this->pdf->MultiCell(195,4,"Gestoría: ".$datos['gestoria_hipoteca'],0,'L',0);
		$this->pdf->Ln(5);
		$this->pdf->MultiCell(195,4,"Resgistro: ".$datos['registro_hipoteca'],0,'L',0);
		$this->pdf->Ln(5);
		$this->pdf->MultiCell(195,4,"I.V.A. (Notaría+Gestoría+Registro): ".$datos['iva_hipoteca'],0,'L',0);
		$this->pdf->Ln(5);
		$this->pdf->MultiCell(195,4,"Seguro: ".$datos['seguro_hipoteca'],0,'L',0);
		$this->pdf->Ln(5);
		$this->pdf->MultiCell(195,4,"Total gastos hipoteca: ".$datos['total_gastos_hipoteca'],0,'L',0);
		$this->pdf->Ln(7);
		// Gastos de compra-venta
		$this->pdf->SetFont('Arial','BU',10);
		$this->pdf->MultiCell(190,5,"GASTOS DE COMPRA-VENTA",0,'L',0);
		$this->pdf->Ln(2);
		$this->pdf->SetFont("arial", "", 8);
		// Dependiendo del tipo de presupuesto (nuevo inmueble)
		if($this->tipo_presupuesto=="nuevo_inmueble")
		{
			$this->pdf->MultiCell(195,4,"I.V.A. nuevo inmueble: ".$datos['iva_nueva_vivienda'],0,'L',0);
			$this->pdf->Ln(5);
			$this->pdf->MultiCell(195,4,"Impuesto A.J.D.: ".$datos['iajd_nueva_vivienda'],0,'L',0);
			$this->pdf->Ln(5);
		}
		// Dependiendo del tipo de presupuesto (inmueble usado)
		if($this->tipo_presupuesto=="inmueble_usado")
		{
			$this->pdf->MultiCell(195,4,"Impu. Trans. Patrimoniales: ".$datos['itp'],0,'L',0);
			$this->pdf->Ln(5);
		}
		$this->pdf->MultiCell(195,4,"Notaría: ".$datos['notaria'],0,'L',0);
		$this->pdf->Ln(5);
		$this->pdf->MultiCell(195,4,"Gestoría: ".$datos['gestoria'],0,'L',0);
		$this->pdf->Ln(5);
		$this->pdf->MultiCell(195,4,"Resgistro: ".$datos['registro'],0,'L',0);
		$this->pdf->Ln(5);
		$this->pdf->MultiCell(195,4,"I.V.A. (Notaría+Gestoría+Registro): ".$datos['iva_gastos_comunes'],0,'L',0);
		$this->pdf->Ln(5);
		$this->pdf->MultiCell(195,4,"Total gastos compra: ".$datos['total_gastos_compra'],0,'L',0);
		$this->pdf->Ln(7);
		// Total de gastos
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->MultiCell(190,5,"TOTAL DE GASTOS: ".$datos['total_gastos'],0,'L',0);
	}
	
	/**
	 * Comprueba si todas las carpetas necesarias para el almacenamiento físico de el presupuesto han sido creadas
	 *
	 * @param [id_presupuesto]		Identificador del presupuesto
	 * @param [inmueble]			Identificador del inmueble
	 *
	 * @return void
	 */
	 
	private function ComprobarFicherosBD($id_presupuesto,$inmueble)
	{	
		// Si no existen los directorios
		if(!is_dir(PATHINCLUDE_FRAMEWORK_DOC . "inmuebles/inmueble_".$inmueble))
		{
			mkdir(PATHINCLUDE_FRAMEWORK_DOC . "inmuebles/inmueble_".$inmueble);
		}
		if(!is_dir(PATHINCLUDE_FRAMEWORK_DOC . "inmuebles/inmueble_".$inmueble."/presupuestos/"))
		{
			mkdir(PATHINCLUDE_FRAMEWORK_DOC . "inmuebles/inmueble_".$inmueble."/presupuestos/");
		}
		// Borramos la el fichero fisico de la carpeta
		if(file_exists(PATHINCLUDE_FRAMEWORK_DOC. "inmuebles/inmueble_".$inmueble."/presupuestos/presupuesto_".$id_presupuesto.".pdf"))
		{
			unlink(PATHINCLUDE_FRAMEWORK_DOC. "inmuebles/inmueble_".$inmueble."/presupuestos/presupuesto_".$id_presupuesto.".pdf");
		}
	}
}
?>