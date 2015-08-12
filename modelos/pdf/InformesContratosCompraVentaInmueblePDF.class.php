<?php
/*
InformesContratosCompraVentaInmueblePDF.class.php, v 2.4 2013/05/13

InformesContratosCompraVentaInmueblePDF - Clase para crear informes de los contratos de compra-venta de los inmuebles en formato PDF

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

require_once(PATHINCLUDE_FRAMEWORK_LIBRERIAS.'NumerosLetras.class.php');

/**
*
* InformesContratosCompraVentaInmueblePDF
*
* Clase para crear informes de los contratos de compra-venta de los inmuebles en formato PDF
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  InformesContratosCompraVentaInmueblePDF.class.php, v 2.4 2013/05/13
* @access   public
*/

class InformesContratosCompraVentaInmueblePDF extends InformesPDF
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
	 * Imprime una plantilla de contrato de compra-venta
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
		$datos['nombre_completo']="______________________________________________________________________________";
		$datos['poblacion']="________________________________________";
		$datos['domicilio']="__________________________________________________________";
		$datos['nombre_completo_comprador']="____________________________________________________________________________";
		$datos['poblacion_comprador']="________________________________________";
		$datos['domicilio_comprador']="__________________________________________________________";
		$datos['direccion_vivienda']="___________________________________________________________________";
		$datos['precio_texto']="__________________________________________________________________";
		$datos['precio']="________________";
		$datos['metros']="_________";
		$datos['consta_de']="______________________________________________________________";
		$datos['amueblado']="___________________________________________________________________";
		$datos['cantidad_efectiva_texto']="__________________________________________________________________";
		$datos['cantidad_efectiva']="________________";
		$datos['cantidad_escritura_texto']="__________________________________________________________________";
		$datos['cantidad_escritura']="________________";
		$datos['registro_numero']="_____";
		$datos['registro_boletin']="_____";
		$datos['registro_finca']="_____";
		$datos['registro_libro']="_____";
		$datos['registro_tomo']="_____";
		$datos['registro_folio']="_____";
		$datos['registro_numero']="_____";
		$datos['dias_clausula_suspensiva']="_____";
		$datos['dia_fecha_doc_publico']="_______";
		$datos['mes_fecha_doc_publico']="________________";
		$datos['anio_fecha_doc_publico']="_______";
		// Sección principal
		$this->CuerpoFicha($datos);
		// Salida del PDF
		return $this->pdf->Output();
	}
	
	/**
	 * Imprime una ficha de contrato de compra-venta y la almacena en la BD
	 *
	 * @param [id_contrato_compra_venta]	Identificador del contrato de compra-venta
	 *
	 * @return Devuelve true o false
	 */
	
	function Ficha($id_contrato_compra_venta)
	{
		// Conexión Base de datos
		$DB = new Model();		
		// Consulta
		$consulta = $DB->Execute("SELECT * FROM contratos_compra_venta_inmueble WHERE id_contrato_compra_venta=". $id_contrato_compra_venta) or die($DB->ErrorMsg());
		$row_consulta = $consulta->FetchRow();
		$totalRows_consulta = $consulta->RecordCount();
		// Comprobaciones
		$this->ComprobarContratoCompraVentaBD($id_contrato_compra_venta,$datos['cliente_vendedor'],$datos['inmueble']);	
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
		$enletras=new EnLetras();
		$datos['precio_texto']=strtoupper($enletras->ValorEnLetras($datos['precio'],"euros"));
		$datos['precio']=number_format($datos['precio'], 2, ',', '.');
		$datos['metros']=number_format($datos['metros']*10, 2, ',', '.');
		$datos['cantidad_efectiva_texto']=strtoupper($enletras->ValorEnLetras($datos['cantidad_efectiva'],"euros"));
		$datos['cantidad_efectiva']=number_format($datos['cantidad_efectiva'], 2, ',', '.');
		$datos['cantidad_escritura_texto']=strtoupper($enletras->ValorEnLetras($datos['cantidad_escritura'],"euros"));
		$datos['cantidad_escritura']=number_format($datos['cantidad_escritura'], 2, ',', '.');
		$fecha_separada=explode("-",$datos['fecha_documento_publico']);
		$datos['dia_fecha_doc_publico']=$fecha_separada[2];
		$datos['mes_fecha_doc_publico']=obtener_mes((int)$fecha_separada[1]);
		$datos['anio_fecha_doc_publico']=$fecha_separada[0];
		// Sección principal
		$this->CuerpoFicha($datos);
		// Salida del PDF
		return $this->pdf->Output(PATHINCLUDE_FRAMEWORK_DOC. "clientes/cliente_".$datos['cliente_vendedor']."/inmueble_".$datos['inmueble']."/contrato_compra_venta_".$id_contrato_compra_venta.".pdf");
	}
	
	/**
	 * Imprime una el cuerpo principal del contrato de compra-venta de un inmueble
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
		$this->pdf->MultiCell(190,5,"CONTRATO PRIVADO DE COMPRA-VENTA",0,'C',0);
		$this->pdf->Ln(5);
		
		$this->pdf->SetFont("arial", "", 8);
		$this->pdf->Cell(190,7,"En Cádiz a ".$datos['dia_fecha']." de ".$datos['mes_fecha']." de ".$datos['anio_fecha'].".",0,1);
		$this->pdf->Ln(5);
		
		// Segundo Título
		$this->pdf->SetFont('Arial','BU',13);
		$this->pdf->MultiCell(190,5,"REUNIDOS",0,'C',0);
		$this->pdf->Ln(5);
		$this->pdf->SetFont("arial", "", 8);
		$this->pdf->MultiCell(195,4,"De una parte D. ".$datos['nombre_completo'].", mayor de edad, con D.N.I. nº ".$datos['nif']." mayor  de edad, con domicilio en ".$datos['domicilio'].", ".$datos['poblacion'].".",0,'J',0);
		$this->pdf->Ln(5);
		$this->pdf->SetFont("arial", "", 8);
		$this->pdf->MultiCell(195,4,"Y de otra D. ".$datos['nombre_completo_comprador'].", mayor  de edad, con D.N.I. nº ".$datos['nif_comprador'].", con domicilio en ".$datos['domicilio_comprador'].", ".$datos['poblacion_comprador'].", actuando como parte compradora.",0,'J',0);
		$this->pdf->Ln(5);		
		$this->pdf->SetFont("arial", "", 8);
		$this->pdf->MultiCell(195,4,"Ambas partes, actuando en la representación que intervienen y reconociéndose mutua y legal capacidad para obligarse cuanto en derecho proceda, dicen:",0,'J',0);
		$this->pdf->Ln(5);
		// Tercer Título
		$this->pdf->SetFont('Arial','BU',13);
		$this->pdf->MultiCell(190,5,"EXPONEN",0,'C',0);
		$this->pdf->Ln(5);
		
		$this->pdf->SetFont("arial", "", 8);
		$this->pdf->MultiCell(195,4,"Que D. ".$datos['nombre_completo'].", es dueño en pleno dominio de la siguiente finca.",0,'J',0);
		$this->pdf->Ln(5);
		
		$this->pdf->SetFont("arial", "", 8);
		$this->pdf->MultiCell(195,4,"Vivienda Sita. en ".$datos['direccion_vivienda'].", ocupa una superficie de ".$datos['metros']." decímetros cuadrados , consta de ".$datos['consta_de'].". Se quedará amueblado ".$datos['amueblado'].".",0,'J',0);
		$this->pdf->Ln(5);
		
		$this->pdf->SetFont("arial", "", 8);
		$this->pdf->MultiCell(195,4,"Inscrita en el registro de la propiedad nº ".$datos['registro_numero']." de ".$datos['registro_boletin'].", finca ".$datos['registro_finca'].", Libro ".$datos['registro_libro'].", Tomo ".$datos['registro_tomo'].", Folio ".$datos['registro_folio'].".",0,'J',0);
		$this->pdf->Ln(5);
		
		$this->pdf->SetFont("arial", "", 8);
		$this->pdf->MultiCell(195,4,"Por otra parte los vendedores manifiestan  que la citada finca se transmiten libre de toda carga y gravamen, e igualmente libre de ocupantes o arrendatarios y recibos de contribución, comunidad, luz y agua al corriente de pago.",0,'J',0);
		$this->pdf->Ln(5);
		
		$this->pdf->SetFont("arial", "", 8);
		$this->pdf->MultiCell(195,4,"Que tiene convenida la compraventa de la finca anteriormente descrita, declarando la parte compradora conocer dicho inmueble, y aceptarlo en su estado actual, lo que se lleva a cabo mediante el presente contrato, con arreglo a las siguientes:",0,'J',0);
		$this->pdf->Ln(5);
		
		// Cuarto Título
		$this->pdf->SetFont('Arial','BU',13);
		$this->pdf->MultiCell(190,5,"ESTIPULACIONES",0,'C',0);
		$this->pdf->Ln(5);
		
		$this->pdf->SetFont("arial", "", 8);
		$this->pdf->MultiCell(195,4,"Primera:  D. ".$datos['nombre_completo']." vende y D. ".$datos['nombre_completo_comprador']." compra y adquiere la finca descrita en la parte expositiva de este contrato, con todos los derechos.",0,'J',0);
		$this->pdf->Ln(5);
		$this->pdf->SetFont("arial", "", 8);
		$this->pdf->MultiCell(195,4,"Segundo: PRECIO Y CONDICIONES: el precio convenido por ambas partes es de ".$datos['precio_texto']." EUROS (".$datos['precio'].",-€), que el comprador se compromete a hacer efectivo de la siguiente forma:",0,'J',0);
		$this->pdf->MultiCell(195,4,"a)	".$datos['cantidad_efectiva_texto']." (".$datos['cantidad_efectiva'].".-€ ) EUROS , en este acto mediante efectivo.",0,'J',0);
		$this->pdf->MultiCell(195,4,"b)	La cantidad de ".$datos['cantidad_escritura_texto']." (".$datos['cantidad_escritura'].".-€ ) EUROS , al otorgamiento de Escritura Pública.",0,'J',0);
		$this->pdf->Ln(5);
		$this->pdf->SetFont("arial", "", 8);
		$this->pdf->MultiCell(195,4,"Tercera: OTORGAMIENTO DE ESCRITURA PUBLICA: La escritura notarial de compra-venta a favor del comprador o de la persona o entidad que el mismo designe se otorgará contra el pago del precio total estipulado. En dicho acto se entregarán las llaves por parte del vendedor. Se conviene establecer la presente cláusula suspensiva de la compraventa durante el plazo de ".$datos['dias_clausula_suspensiva']." DIAS a partir de la fecha del presente contrato, (fecha máxima de elevar este documento a público ".$datos['dia_fecha_doc_publico']." de ".$datos['mes_fecha_doc_publico']." de".$datos['anio_fecha_doc_publico']."), considerándose durante este periodo formalizada opción de compra y obligándose el vendedor a mantenerla y respetarla en las condiciones pactadas.",0,'J',0);
		$this->pdf->Ln(5);
		$this->pdf->SetFont("arial", "", 8);
		$this->pdf->MultiCell(195,4,"Cuarta: Pactan ambas parte conceder a la parte compradora veinte días naturales a partir de la firma de este documento para poder gestionar el crédito hipotecario, En el caso que la financiación  fuera  no viable deberá notificarla por escrito a la parte vendedora en el plazo de los veinte días,  se  le devolverá íntegramente la señal y parte de pago  que se entrega en este acto que se  justificara con certificado expedido por la entidad bancaria.",0,'J',0);
		$this->pdf->Ln(5);
		$this->pdf->SetFont("arial", "", 8);
		$this->pdf->MultiCell(195,4,"Quinta: PENALIZACION: Si la parte compradora incumpliese las obligaciones derivadas del presente contrato en cualquiera de los vencimientos estipulados, la parte vendedora podrá resolver de pleno derecho el presente contrato de compraventa, con pérdida por parte del comprador del 100 por 100 de las cantidades abonadas, que quedarán en beneficio de la parte vendedora como indemnización de daños y perjuicios y pena por el incumplimiento contractual, volviendo la finca objeto de este contrato a la vendedora en el mismo estado jurídico en que ahora se encuentra, sin más trámite que los previstos en el art. 1.504 del Código Civil, y sin perjuicio de las obligaciones fiscales que tal resolución origine con cargo al comprador.",0,'J',0);
		$this->pdf->Ln(5);
		$this->pdf->SetFont("arial", "", 8);
		$this->pdf->MultiCell(195,4,"Si el incumplimiento es imputable a la parte vendedora, el comprador podrá optar, según el art. 1.124 del Código Civil, entre el cumplimiento o la resolución del contrato. En el primer supuesto, todos los gastos y costas del procedimiento serán de cuenta de la parte vendedora; y en el segundo tendrá lugar, la resolución del contrato, quedando obligado el vendedor a devolver el duplo de la cantidad entregada en concepto de arras.",0,'J',0);
		$this->pdf->Ln(5);
		$this->pdf->SetFont("arial", "", 8);
		$this->pdf->MultiCell(195,4,"Sexta: GASTOS: Todos cuantos gastos e impuestos se produzcan con motivo de esta transmisión, y los que origine la escritura pública de compraventa, tales como Notario, Impuestos, Registro, etc., serán de según Ley.",0,'J',0);
		$this->pdf->Ln(5);		
		$this->pdf->SetFont("arial", "", 8);
		$this->pdf->MultiCell(195,4,"La gestión e intermediación de la presente compra-venta se ha realizado bajo la supervisión profesional de las agencia Inmobiliaria Gesticádiz (Gloria Chamorro Romero) con D.N.I.: 31260553-B, con domicilio en Avda. Ana de Viya, nº3 (Bajo), en Cádiz. Ambas partes abonará el 2% de gestión más I.V.A,  por  la  intervención  en esta operación.",0,'J',0);
		$this->pdf->Ln(5);		
		$this->pdf->SetFont("arial", "", 8);
		$this->pdf->MultiCell(195,4,"Séptima: OTORGAMIENTO: Así lo dicen y otorgan las partes, comprometiéndose al más estricto cumplimiento del presente contrato de compraventa sobre las cláusulas precedentes, declarando que este documento tiene fuerza de obligar y firmando en prueba de conformidad con todo lo que antecede, en el lugar y fecha al comienzo expresados, por triplicado y a un solo efecto, ",0,'J',0);
		$this->pdf->Ln(5);		
		// Firmas
		$this->pdf->SetFont("arial", "", 8);
		$this->pdf->Cell(70,4,"DE CONFORMIDAD",0,1);
		$this->pdf->Ln(5);
		$this->pdf->Cell(70,4,"EL COMPRADOR",0,0);
		$this->pdf->Cell(70,4,"EL VENDEDOR",0,1);
		$this->pdf->Ln(25);
		$this->pdf->Cell(70,4,"Fdo. D. ___________________,",0,0);
		$this->pdf->Cell(70,4,"Fdo. D. ___________________,",0,0);
	}
	
	/**
	 * Comprueba si todas las carpetas necesarias para el almacenamiento físico de el contrato de compra-venta han sido creadas
	 *
	 * @param [id_contrato_compra_venta]	Identificador del contrato de compra-venta
	 * @param [cliente]						Identificador del cliente
	 * @param [inmueble]					Identificador del inmueble
	 *
	 * @return void
	 */
	 
	private function ComprobarContratoCompraVentaBD($id_contrato_compra_venta,$cliente,$inmueble)
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
		if(file_exists(PATHINCLUDE_FRAMEWORK_DOC. "clientes/cliente_".$cliente."/inmueble_".$inmueble."/contrato_compra_venta_".$id_contrato_compra_venta.".pdf"))
		{
			unlink(PATHINCLUDE_FRAMEWORK_DOC. "clientes/cliente_".$cliente."/inmueble_".$inmueble."/contrato_compra_venta_".$id_contrato_compra_venta.".pdf");
		}
	}
}
?>