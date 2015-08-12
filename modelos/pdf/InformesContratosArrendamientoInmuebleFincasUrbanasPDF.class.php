<?php
/*
InformesContratosArrendamientoInmuebleFincasUrbanasPDF.class.php, v 2.4 2013/05/13

InformesContratosArrendamientoInmuebleFincasUrbanasPDF - Clase para crear informes de los contratos de arrendamiento de los inmuebles en formato PDF

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
* InformesContratosArrendamientoInmuebleFincasUrbanasPDF
*
* Clase para crear informes de los contratos de arrendamiento de los inmuebles en formato PDF
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  InformesContratosArrendamientoInmuebleFincasUrbanasPDF.class.php, v 2.4 2013/05/13
* @access   public
*/

class InformesContratosArrendamientoInmuebleFincasUrbanasPDF extends InformesContratosArrendamientoInmueblePDF
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
		$datos['provincia_comprador']="______________________________";
		$datos['poblacion_comprador']="_____________________________";
		$datos['domicilio_comprador']="______________________________________________________";
		$datos['estado_civil_comprador']="_________________";
		$datos['provincia_vivienda']="____________________";
		$datos['direccion_vivienda']="___________________________________________________________________";		
		$datos['poblacion_vivienda']="________________________________";
		$datos['cuota_total_texto']="__________________________________________________";
		$datos['cuota_total']="_______________";	
		$datos['cuota_mensual_texto']="__________________________________________________";
		$datos['cuota_mensual']="_______________";	
		$datos['ncc']="_______________________________________";	
		$datos['dia_fecha_inicio_contrato']="_______";
		$datos['mes_fecha_inicio_contrato']="________________";
		$datos['anio_fecha_inicio_contrato']="_______";		
		$datos['dia_fecha_fin_contrato']="_______";
		$datos['mes_fecha_fin_contrato']="________________";
		$datos['anio_fecha_fin_contrato']="_______";
		$datos['mes_actualizacion_renta']="__________________";
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
		$datos['provincia_vivienda']=formatear_provincia($datos['provincia_vivienda']);
		$enletras=new EnLetras();
		$datos['cuota_total_texto']=strtoupper($enletras->ValorEnLetras($datos['cuota_total'],"euros"));
		$datos['cuota_total']=number_format($datos['cuota_total'], 2, ',', '.');
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
		$datos['mes_actualizacion_renta']=obtener_mes((int)$datos['mes_actualizacion_renta']);
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
		$this->pdf->MultiCell(190,5,"CONTRATO DE ARRENDAMIENTO DE FINCAS URBANAS",0,'C',0);
		$this->pdf->Ln(5);		
		$this->pdf->SetFont("arial", "", 8);
		$this->pdf->Cell(190,7,"En Cádiz a ".$datos['dia_fecha']." de ".$datos['mes_fecha']." de ".$datos['anio_fecha'].".",0,1);
		$this->pdf->Ln(5);
		// Vivienda
		$this->pdf->SetFont('Arial','B',13);
		$this->pdf->MultiCell(190,5,"IDENTIFICACIÓN DE LA FINCA OBJETO DEL CONTRATO.",0,'C',0);
		$this->pdf->Ln(5);
		$this->pdf->SetFont("arial", "", 8);
		$this->pdf->MultiCell(195,4,"Vía pública: ".$datos['direccion_vivienda'].".",0,'J',0);
		$this->pdf->Ln(5);	
		$this->pdf->MultiCell(195,4,"Localidad: ".$datos['poblacion_vivienda']."         Provincia: ".$datos['provincia_vivienda'].".",0,'J',0);		
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
		$this->pdf->MultiCell(195,4,"Ambas partes reconocen su mutua capacidad legal para obligarse en derecho en virtud del presente contrato que se regirá por las siguientes:",0,'J',0);
		$this->pdf->Ln(5);
		$this->pdf->SetFont('Arial','BU',13);
		$this->pdf->MultiCell(190,5,"ESTIPULACIONES",0,'C',0);
		$this->pdf->Ln(5);
		$this->pdf->SetFont('Arial','B',13);
		$this->pdf->MultiCell(190,5,"1.- OBJETO DEL CONTRATO.",0,'L',0);
		$this->pdf->Ln(5);
		$this->pdf->SetFont("arial", "", 8);
		$this->pdf->MultiCell(195,4,"Es objeto de este contrato, el arrendamiento de la vivienda que se identifica así:",0,'L',0);
		$this->pdf->Ln(5);	
		$this->pdf->MultiCell(195,4,"Vía pública: ".$datos['direccion_vivienda'],0,'L',0);
		$this->pdf->Ln(5);
		$this->pdf->SetFont('Arial','B',13);
		$this->pdf->MultiCell(190,5,"2.- CAUSA Y NATURALEZA DEL CONTRATO.",0,'L',0);
		$this->pdf->Ln(5);
		$this->pdf->SetFont("arial", "", 8);
		$this->pdf->MultiCell(195,4,"Se hace constar por el arrendatario que carece de una vivienda para cubrir tal necesidad primordial. Por ello, es su intención fijar su domicilio habitual en la vivienda objeto de este contrato.",0,'J',0);
		$this->pdf->Ln(5);	
		$this->pdf->MultiCell(195,4,"Por lo expuesto sobre la naturaleza del contrato, al ser de vivienda será la prevista en el Titulo II de la vigente Ley de Arrendamientos Urbanos, que establece las normas que rigen el contrato de arrendamiento de vivienda.",0,'J',0);
		$this->pdf->Ln(5);
		$this->pdf->SetFont('Arial','B',13);
		$this->pdf->MultiCell(190,5,"3.- DURACIÓN DEL CONTRATO.",0,'L',0);
		$this->pdf->Ln(5);
		$this->pdf->SetFont("arial", "", 8);
		$this->pdf->MultiCell(195,4,"Las partes contratantes, conforme a lo dispuesto en el art.9 del Real Decreto Ley 29/1994 de 24 de Noviembre, pactan libremente que este contrato tendrá una duración de un año, por lo que comenzará el ".$datos['dia_fecha_inicio_contrato']." del mes de ".$datos['mes_fecha_inicio_contrato']." y finalizando el ".$datos['dia_fecha_fin_contrato']." del mes de ".$datos['mes_fecha_fin_contrato']." del año ".$datos['anio_fecha_fin_contrato'].". De todas formas, ambas partes conocen la obligación por parte del arrendador de prorrogar su vigencia hasta un mínimo de cinco años desde esta fecha.",0,'J',0);
		$this->pdf->Ln(5);
		$this->pdf->SetFont('Arial','B',13);
		$this->pdf->MultiCell(190,5,"4.- PRECIO DEL ARRENDAMIENTO.",0,'L',0);
		$this->pdf->Ln(5);
		$this->pdf->SetFont("arial", "", 8);
		$this->pdf->MultiCell(195,4,"Se estipula la cantidad total de este contrato de ".$datos['cuota_total_texto']." (".$datos['cuota_total'].",-€), pagaderas por meses anticipados, a razón de ".$datos['cuota_mensual_texto']." (".$datos['cuota_mensual'].",-€) cada uno, comunidad incluida,  abonándose dentro de los primeros siete días de cada mes.",0,'J',0);
		$this->pdf->Ln(5);
		$this->pdf->MultiCell(195,4,"El pago del precio del arrendamiento se realizará de la siguiente forma: Mediante transferencia bancaria en el nº de c/c de la parte arrendadora: ".$datos['ncc'],0,'J',0);
		$this->pdf->Ln(5);		
		$this->pdf->SetFont('Arial','B',13);
		$this->pdf->MultiCell(190,5,"5.- ACTUALIZACIÓN DE LA RENTA.",0,'L',0);
		$this->pdf->Ln(5);
		$this->pdf->SetFont("arial", "", 8);
		$this->pdf->MultiCell(195,4,"De acuerdo con el artículo 18 de la vigente L.A.U., las partes convienen y aceptan que la renta pactada sea actualizada, disminuyéndose o incrementándose, en la misma proporción que el Indice General de Precios al Consumo (Conjunto Nacional). De esta forma, cada año de vigencia de este contrato, se revisará la renta por el citado I.P.C.",0,'J',0);
		$this->pdf->Ln(5);
		$this->pdf->MultiCell(195,4,"La actualización se practicará aplicando a la renta exigible la variación porcentual correspondiente a los doce meses inmediatamente anteriores a la fecha de cada actualización, tomando como base al índice correspondiente al mes de ".$datos['mes_actualizacion_renta'].".",0,'J',0);
		$this->pdf->Ln(5);
		$this->pdf->MultiCell(195,4,"A los efectos de notificación y constancia del arrendador, en el recibo anterior al que proceda la revisión de renta o bien por carta, a elección de este, comunicará el porcentaje y cuantía del aumento, haciendo referencia al último Boletín Oficial del Instituto Nacional de Estadística en que se haya publicado, en el día de la fecha en que procediera el aumento, o con certificado de este Organismo, debiendo el arrendatario darse por notificado en un duplicado del recibo de la renta, que será firmado a tal fin.",0,'J',0);
		$this->pdf->Ln(5);		
		$this->pdf->SetFont('Arial','B',13);
		$this->pdf->MultiCell(190,5,"6.- USO DE LA VIVIENDA ARRENDADA.",0,'L',0);
		$this->pdf->Ln(5);
		$this->pdf->SetFont("arial", "", 8);
		$this->pdf->MultiCell(195,4,"La vivienda objeto de este contrato la destinará el arrendatario a su residencia habitual y permanente, entendiéndose por esta la que constituye su domicilio, sin que pueda darle un uso distinto al expresado, o que la habite más de una familia, dando a sus dependencias el destino normal para el que fueron arrendadas, y quedándole expresamente prohibido ejercer en dicha vivienda cualquier actividad de comercio, industria o profesión colegiada, a excepción de mediar autorización expresa y escrita del arrendador, debiendo hacerse constar en este contrato a los efectos precedentes.",0,'J',0);
		$this->pdf->Ln(5);
		$this->pdf->SetFont('Arial','B',13);
		$this->pdf->MultiCell(190,5,"7.- USOS DE BUENA VECINDAD Y DE POLICIA URBANA.",0,'L',0);
		$this->pdf->Ln(5);
		$this->pdf->SetFont("arial", "", 8);
		$this->pdf->MultiCell(195,4,"Queda  obligado el arrendatario a observar los usos de buena vecindad y de policía urbana, debiendo abstenerse de causar molestias a los vecinos,  así como poner en funcionamiento los aparatos productores de música o ruido, en horas que alteren el descanso de la vecindad.",0,'J',0);
		$this->pdf->Ln(5);
		$this->pdf->MultiCell(195,4,"El arrendatario queda igualmente obligado a respetar las normas establecidas por la comunidad de propietarios del edificio en sus estatutos o en reglamentos del régimen interior, así como, en su llevar a cabo la labor de mantenimiento de las zonas comunes de la casa.",0,'J',0);
		$this->pdf->Ln(5);
		$this->pdf->SetFont('Arial','B',13);
		$this->pdf->MultiCell(190,5,"8.- PROHIBICIONES.",0,'L',0);
		$this->pdf->Ln(5);
		$this->pdf->SetFont("arial", "", 8);
		$this->pdf->MultiCell(195,4,"El arrendatario no podrá realizar en la vivienda obras que modifiquen su configuración o que puedan debilitar su seguridad, o afecten a elementos comunes.",0,'J',0);
		$this->pdf->Ln(5);
		$this->pdf->MultiCell(195,4,"La vivienda no podrá ser cedida o subarrendada sin el consentimiento escrito y expreso del arrendador.",0,'J',0);
		$this->pdf->Ln(5);
		$this->pdf->SetFont('Arial','B',13);
		$this->pdf->MultiCell(190,5,"9.- CONSERVACIÓN DE LA VIVIENDA.",0,'L',0);
		$this->pdf->Ln(5);
		$this->pdf->SetFont("arial", "", 8);
		$this->pdf->MultiCell(195,4,"El arrendador queda obligado a mantener la vivienda y sus instalaciones o servicios en estado de habitabilidad, para servir al uso convenido, por lo que tales gastos serán de su exclusiva cuenta.",0,'J',0);
		$this->pdf->Ln(5);
		$this->pdf->MultiCell(195,4,"Las reparaciones que sean necesarias por el uso ordinario y que tengan la consideración de “pequeñas reparaciones”, serán de la exclusiva cuenta del arrendatario.",0,'J',0);
		$this->pdf->Ln(5);
		$this->pdf->MultiCell(195,4,"Las pequeñas reparaciones serán de cuenta de los propietarios el primer año de la vigencia de este contrato, el resto de la vigencia será por cuenta del arrendatario.",0,'J',0);
		$this->pdf->Ln(5);
		$this->pdf->MultiCell(195,4,'Igualmente las reparaciones que sean consecuencia de un daño doloso o de mal uso de la casa arrendada, serán de la exclusiva cuenta del arrendatario. En todo caso transcurridos cinco años de vigencia del contrato,  la conservación serán de cuenta del arrendatario. ',0,'J',0);
		$this->pdf->Ln(5);
		$this->pdf->MultiCell(195,4,'El arrendatario se obliga a permitir la entrada a los trabajadores cuando deban realizar obras de conservación en la vivienda. ',0,'J',0);
		$this->pdf->Ln(5);
		$this->pdf->MultiCell(195,4,'El arrendatario deberá comunicar al arrendador, por el medio más rápido, la necesidad de obras de conservación, y permitirá el acceso de este a la vivienda, o de las personas que designe. Las obras solamente podrán realizarse por el arrendatario, en los casos de urgencia y para evitar daños mayores o perjuicios a terceros, pero siempre dando inmediata cuenta al arrendador. ',0,'J',0);
		$this->pdf->Ln(5);
		$this->pdf->SetFont('Arial','B',13);
		$this->pdf->MultiCell(190,5,"10.- SERVICIOS Y SUMINISTROS.",0,'L',0);
		$this->pdf->Ln(5);
		$this->pdf->SetFont("arial", "", 8);
		$this->pdf->MultiCell(195,4,"A los efectos prevenidos en el artículo 20.2 de la Ley de Arrendamientos Urbanos el arrendatario se obliga al abono de los gastos de suministros,  excepto comunidad.",0,'J',0);
		$this->pdf->Ln(5);		
		$this->pdf->SetFont('Arial','B',13);
		$this->pdf->MultiCell(190,5,"11.- FIANZA.",0,'L',0);
		$this->pdf->Ln(5);
		$this->pdf->SetFont("arial", "", 8);
		$this->pdf->MultiCell(195,4,"En virtud de lo dispuesto en el artículo 36.1 y Disposición Adicional Tercera de la vigente L.A.U, el arrendatario hace entrega, en este acto, de una mensualidad de renta, para cumplir con la preceptiva fianza.",0,'J',0);
		$this->pdf->Ln(5);
		$this->pdf->MultiCell(195,4,"La cantidad de una mensualidad ".$datos['cuota_mensual_texto']." (".$datos['cuota_mensual'].",-€), será depositada en el organismo encargado de la tramitación de “Papel de Fianzas”, en virtud de las disposiciones legales vigentes en esta Comunidad Autónoma.",0,'J',0);
		$this->pdf->Ln(5);		
		$this->pdf->SetFont('Arial','B',13);
		$this->pdf->MultiCell(190,5,"12.- LEGISLACIÓN  APLICABLE.",0,'L',0);
		$this->pdf->Ln(5);
		$this->pdf->SetFont("arial", "", 8);
		$this->pdf->MultiCell(195,4,"En todo lo no previsto en este contrato, será de aplicación cuanto sobre el arrendamiento de inmuebles destinados a viviendas, se establece en la Ley de Arrendamientos Urbanos de 24 de Noviembre de 1.994 y en su defecto en el Código Civil.",0,'J',0);
		$this->pdf->Ln(5);
		$this->pdf->SetFont('Arial','B',13);
		$this->pdf->MultiCell(190,5,"13.- JURISDICCIÓN. ",0,'L',0);
		$this->pdf->Ln(5);
		$this->pdf->SetFont("arial", "", 8);
		$this->pdf->MultiCell(195,4,"Para todas las cuestiones que puedan suscitarse en relación a este contrato, las partes con renuncia expresa al fuero que pudiera corresponderles, se someten única y exclusivamente a los Juzgados y Tribunales de la ciudad de Cádiz.",0,'J',0);
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