<?php
/*
InformesFichasEncargoClientesPDF.class.php, v 2.4 2013/05/13

InformesFichasEncargoClientesPDF - Clase para crear informes de fichas de encargo de clientes en formato PDF

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
* InformesFichasEncargoClientesPDF
*
* Clase para crear informes fichas de encargo de clientes en formato PDF
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  InformesFichasEncargoClientesPDF.class.php, v 2.4 2013/05/13
* @access   public
*/

class InformesFichasEncargoClientesPDF extends InformesPDF
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
	 * Imprime una plantilla de ficha de encargo de un cliente
	 *
	 *
	 * @return Devuelve true o false
	 */
	
	function PlantillaFicha()
	{	
		// Formateo de datos
		$datos['descripcion_vivienda']="\n\n\n\n\n";
		$datos['descripcion_edificio']="\n\n\n";
		$datos['antiguedad_edificio']="\n\n\n";
		// Sección principal
		$this->CuerpoFicha($datos);
		// Salida del PDF
		return $this->pdf->Output();
	}
	
	/**
	 * Imprime una ficha de encargo de un cliente y la almacena en la BD
	 *
	 * @param [id_ficha_encargo]	Identificador de la ficha de encargo
	 * @param [cliente]				identificador del cliente
	 * @param [inmueble]			identificador del inmueble
	 *
	 * @return Devuelve true o false
	 */
	
	function Ficha($id_ficha_encargo,$cliente,$inmueble)
	{	
		// Comprobaciones de ficha de encargo
		$this->ComprobarFichaEncargoBD($id_ficha_encargo,$cliente,$inmueble);
		// Conexión Base de datos
		$DB = new Model();		
		// Consulta
		$consulta = $DB->Execute("SELECT * FROM fichas_encargo_cliente WHERE id_ficha_encargo=". $id_ficha_encargo." AND cliente=". $cliente." AND inmueble=". $inmueble) or die($DB->ErrorMsg());
		$row_consulta = $consulta->FetchRow();
		$totalRows_consulta = $consulta->RecordCount();
		// Formateo de datos
		$datos=$row_consulta;
		$datos['poblacion']=formatear_poblacion($datos['poblacion']);
		$datos['provincia']=formatear_provincia($datos['provincia']);
		$datos['precio']=number_format($datos['precio'], 2, ',', '.');
		$datos['cuota_comunidad']=number_format($datos['cuota_comunidad'], 2, ',', '.');
		$datos['metros']=number_format($datos['metros'], 2, ',', '.');
		// Sección principal
		$this->CuerpoFicha($datos);
		// Salida del PDF
		return $this->pdf->Output(PATHINCLUDE_FRAMEWORK_DOC. "clientes/cliente_".$cliente."/inmueble_".$inmueble."/ficha_encargo_".$id_ficha_encargo.".pdf");
	}
	
	/**
	 * Imprime una el cuerpo principal de la ficha de encargo de un cliente
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
		
		// Primer Título
		$this->pdf->SetFont('Arial','BU',13);
		$this->pdf->MultiCell(190,5,"FICHA INFORMATIVA EN SEGUNDAS O ULTERIORES TRANSMISIONES DE VIVIENDA",0,1);
		$this->pdf->Ln(5);
		
		// Segundo Título
		$this->pdf->SetFont('Arial','B',13);
		$this->pdf->Cell(70,5,"DATOS DEL PROPIETARIO",0,0,"L");
		$this->pdf->Cell(120,5,"FECHA DE ENTREGA: Agencia           -       -    ",0,1,"R");
		$this->pdf->Ln(3);
		
		// Contenido del Primer recuadro
		$this->pdf->SetTextColor(0,0,0);
		$this->pdf->SetDrawColor(0,0,0);
		$this->pdf->SetFillColor(140,140,140);
		$this->pdf->SetFont("arial", "", 7);
		
		$this->pdf->Cell(23,8,"NIF/CIF",1,0,'C',1);
		$this->pdf->CellFitScale(25,8," " . $datos['nif'],"TB",0);
		$this->pdf->Cell(33,8,"NOMBRE Y APELLIDOS",1,0,'C',1);
		$this->pdf->CellFitScale(112,8," " . $datos['nombre']." ".$datos['apellidos'],"TBR",1);

		$this->pdf->Cell(23,8,"DOMICILIO",1,0,'C',1);
		$this->pdf->CellFitScale(170,8," " . $datos['domicilio'],"TBR",1);
	
		$this->pdf->Cell(23,8,"MUNICIPIO",1,0,'C',1);
		$this->pdf->CellFitScale(65,8," " . $datos['poblacion'],"TB",0);
		$this->pdf->Cell(23,8,"PROVINCIA",1,0,'C',1);
		$this->pdf->CellFitScale(35,8," " . $datos['provincia'],"TBR",0);
		$this->pdf->Cell(22,8,"TELÉFONO",1,0,'C',1);
		$this->pdf->CellFitScale(25,8," " . $datos['telefono'],"TBR",1);
		$this->pdf->Ln(5);
	
		// Texto legal
		$this->pdf->SetFont('Arial','BU',10);
		$this->pdf->MultiCell(190,5,"La venta SIN EXCLUSIVA del inmueble de su propiedad, cuyas características son las siguientes:",0,1);
		$this->pdf->Ln(5);
		
		// Tercer Título
		$this->pdf->SetFont('Arial','BU',13);
		$this->pdf->MultiCell(190,5,"DATOS DE LA VIVIENDA",0,1);
		$this->pdf->Ln(5);
	
		// Contenido del Segundo recuadro
		$this->pdf->SetFont("arial", "", 7);
		$this->pdf->Cell(28,8,"PRECIO",1,0,'C',1);
		$this->pdf->CellFitScale(70,8," " . $datos['precio'],"TB",0);
		$this->pdf->Cell(27,8,"FORMA DE PAGO",1,0,'C',1);
		$this->pdf->CellFitScale(70,8," " . $datos['forma_pago'],"TBR",1);
		
		$this->pdf->Cell(28,8,"CUOTA COMUNIDAD",1,0,'C',1);
		$this->pdf->CellFitScale(70,8," " . $datos['cuota_comunidad'],"TB",0);
		$this->pdf->Cell(27,8,"ANEJOS",1,0,'C',1);
		$this->pdf->CellFitScale(70,8," " . $datos['anejos'],"TBR",1);
		
		$this->pdf->Cell(28,8,"METROS ÚTILES",1,0,'C',1);
		$this->pdf->CellFitScale(70,8," " . $datos['metros'],"TB",0);
		$this->pdf->Cell(27,8,"CARGAS VIVIENDA",1,0,'C',1);
		$this->pdf->CellFitScale(70,8," " . $datos['cargas_vivienda'],"TBR",1);
		
		$this->pdf->Cell(195,8,"DESCRIPCIÓN DE LA VIVIENDA",1,1,'C',1);
		$this->pdf->MultiCell(195,4,$datos['descripcion_vivienda'],1,1);
		$this->pdf->Cell(98,8,"DESCRIPCIÓN DEL EDIFICIO",1,0,'C',1);
		$this->pdf->Cell(97,8,"ANTIGÜEDAD DEL EDIFICIO",1,1,'C',1);
		// Datos
		$this->pdf->SetFillColor(255,255,255);
		$array=array($datos['descripcion_edificio'],$datos['antiguedad_edificio']);		
		$this->pdf->SetWidths(array(98,97));
		$this->pdf->SetAligns(array("L","L"));
		$this->pdf->Row($array,true);
		$this->pdf->Ln(5);
		
		// Texto final
		$this->pdf->SetFont("arial", "BU", 7);
		$this->pdf->Cell(195,4,"Nota informativa con referencia a los gastos e impuestos.",0,1);
		$this->pdf->SetFont("arial", "B", 7);
		$this->pdf->MultiCell(195,4,"El 8% de concepto de impuestos de Transmisiones Patrimoniales. Este impuesto será del 3,5% en el caso que los compradores sean menores de 35 años y la vivienda adquieren sea por precio inferios a 130.000,- euros. También se aplicara el tipo reducido a las transmisiones de Viviendas de protección Oficial.",0,1);
		$this->pdf->Ln(3);
		$this->pdf->SetFont("arial", "BU", 7);
		$this->pdf->Cell(195,4,"Otros Impuestos:",0,1);
		$this->pdf->SetFont("arial", "B", 7);
		$this->pdf->MultiCell(195,4,"Importe correspondiente a la primera copia de escritura de compraventa según baremo de Colegio Oficial de Notarios. Importe correspondiente a la inscripción en el Registro de la Propiedad de las Escrituras de compraventa.",0,1);
		$this->pdf->Ln(3);
		$this->pdf->SetFont("arial", "BU", 7);
		$this->pdf->Cell(195,4,"Gastos de la intermediación de la compraventa.",0,1);
		$this->pdf->SetFont("arial", "B", 7);
		$this->pdf->MultiCell(195,4,"2% más i.V.A, sobre el precio de la vivienda, correspondiente a satisfacer a la Agencia.",0,1);
		$this->pdf->Ln(3);
		$this->pdf->SetFont("arial", "BU", 7);
		$this->pdf->Cell(195,4,"NOTA:",0,1);
		$this->pdf->SetFont("arial", "B", 7);
		$this->pdf->MultiCell(195,4,"A los clientes interesados en la compra del inmueble descrito se le entregara la Nota Simple informativa  y certificado de encontrarse al corriente del Impuesto de Bienes de Inmueble 3 días antes de firmar el documento de compraventa.",0,1);
		$this->pdf->Ln(5);
		
		$this->pdf->SetFont("arial", "", 7);
		$this->pdf->MultiCell(195,4,"De acuerdo con lo establecido por la Ley Orgánica 15/1999, de 13 de diciembre, de Protección de Datos de Carácter Personal (LOPD), le informamos que los datos aportados serán incorporados a un fichero del que es titular GLORIA CHAMORRO ROMERO con la finalidad de realizar la gestión. administrativa, contable y fiscal, así como enviarle comunicaciones comerciales sobre nuestros productos y servicios. Asimismo, declaro haber sido informado de la posibilidad de ejercer los derechos de acceso, rectificación, cancelación y oposición de mis datos en el domicilio fiscal de GLORIA CHAMORRO ROMERO sito en AVDA. ANA DE VIYA Nº3 – 11009 CÁDIZ.",0,1);
		$this->pdf->Ln(5);
		
		// Firmas
		$this->pdf->SetFont("arial", "B", 7);
		$this->pdf->Cell(195,4,"En Cádiz a ________ de _______________________________ de 20_____.",0,1);
		$this->pdf->Ln(5);
		$this->pdf->Cell(70,4,"El Agente Comercial,",0,0);
		$this->pdf->Cell(70,4,"El Vendedor,",0,1);
		$this->pdf->Ln(25);
		$this->pdf->Cell(70,4,"DNI: ___________________,",0,0);
		$this->pdf->Cell(70,4,"DNI: ___________________,",0,0);
	}
	
	/**
	 * Comprueba si todas las carpetas necesarias para el almacenamiento físico de la ficha de encargo han sido creadas
	 *
	 * @param [id_ficha_encargo]		Identificador de la ficha de encargo
	 * @param [cliente]					Identificador del cliente
	 * @param [inmueble]				Identificador del inmueble
	 *
	 * @return void
	 */
	 
	private function ComprobarFichaEncargoBD($id_ficha_encargo,$cliente,$inmueble)
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
		if(file_exists(PATHINCLUDE_FRAMEWORK_DOC. "clientes/cliente_".$cliente."/inmueble_".$inmueble."/ficha_encargo_".$id_ficha_encargo.".pdf"))
		{
			unlink(PATHINCLUDE_FRAMEWORK_DOC. "clientes/cliente_".$cliente."/inmueble_".$inmueble."/ficha_encargo_".$id_ficha_encargo.".pdf");
		}
	}
}
?>