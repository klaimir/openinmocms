<?php
/*
InformesCertificacionesEnergeticasClientePDF.class.php, v 2.4 2013/05/13

InformesCertificacionesEnergeticasClientePDF - Clase para crear informes de las certificaciones energ�ticas de los inmuebles en formato PDF

Esta librer�a es propiedad de �ngel Luis Berasuain Ruiz, cualquier uso que pudiera darse
tendr� que estar autorizado expresamente bajo mi supervisi�n.

Si tienes cualquier sugerencia, duda o comentario, por favor envi�mela a:

�ngel Luis Berasuain Ruiz
klaimir@hotmail.com

*/

/* load classes */

require_once("InformesPDF.class.php");
require_once('plantilla_app.php');

/* load libraries */

// No son necesarias librer�as adicionales

/**
*
* InformesCertificacionesEnergeticasClientePDF
*
* Clase para crear informes de las certificaciones energ�ticas de los inmuebles en formato PDF
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  InformesCertificacionesEnergeticasClientePDF.class.php, v 2.4 2013/05/13
* @access   public
*/

class InformesCertificacionesEnergeticasClientePDF extends InformesPDF
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
	 * Imprime una plantilla
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
		$datos['poblacion_vivienda']="_____________________________________";
		$datos['direccion_vivienda']="__________________________________________________________";
		// Secci�n principal
		$this->CuerpoFicha($datos);
		// Salida del PDF
		return $this->pdf->Output();
	}
	
	/**
	 * Imprime una ficha y la almacena en la BD
	 *
	 * @param [cliente]				Indentificador del cliente
	 * @param [inmueble]			Indentificador del inmueble
	 *
	 * @return Devuelve true o false
	 */
	
	function Ficha($inmueble,$cliente)
	{
		// Conexi�n Base de datos
		$DB = new Model();		
		// Consulta
		$consulta = $DB->Execute("SELECT * FROM certificaciones_energeticas_cliente WHERE inmueble = ".$inmueble." AND cliente = ".$cliente) or die($DB->ErrorMsg());
		$row_consulta = $consulta->FetchRow();
		$totalRows_consulta = $consulta->RecordCount();
		// Comprobaciones
		$this->ComprobarFicherosBD($cliente,$inmueble);	
		// Formateo de datos
		$datos=$row_consulta;
		$fecha_separada=explode("-",$datos['fecha']);
		$datos['dia_fecha']=$fecha_separada[2];
		$datos['mes_fecha']=obtener_mes((int)$fecha_separada[1]);
		$datos['anio_fecha']=$fecha_separada[0];
		$datos['nombre_completo']=$datos['nombre']." ".$datos['apellidos'];
		$datos['poblacion_vivienda']=formatear_poblacion($datos['poblacion_vivienda']);
		// Secci�n principal
		$this->CuerpoFicha($datos);
		// Salida del PDF
		return $this->pdf->Output(PATHINCLUDE_FRAMEWORK_DOC. "clientes/cliente_".$datos['cliente']."/inmueble_".$datos['inmueble']."/certificacion_energetica.pdf");
	}
	
	/**
	 * Imprime una el cuerpo principal de la ficha
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
		
		// T�tulo
		$this->pdf->SetFont('Arial','BU',12);
		$this->pdf->MultiCell(190,5,"DOCUMENTO DE INFORMACI�N SOBRE EL REAL DECRETO 235/2013, DE 5 DE ABRIL, POR EL QUE SE APRUEBA EL PROCEDIMIENTO B�SICO PARA LA CERTIFICACI�N DE LA EFICIENCIA ENERG�TICA DE LOS EDIFICIOS.",0,'C',0);
		$this->pdf->Ln(5);
		
		$this->pdf->SetFont("arial", "", 8);
		$this->pdf->MultiCell(195,4,"El pasado 13 de abril se ha publicado en el BOE el Real Decreto 235/2013, de 5 de abril, por el que se aprueba el procedimiento b�sico para la Certificaci�n de la Eficiencia Energ�tica de los edificios.",0,'J',0);
		$this->pdf->Ln(5);
		$this->pdf->MultiCell(195,4,"Todo inmueble que se construya, venda o alquile (edificios o unidades de �stos), en   toda oferta, promoci�n y publicidad dirigida a la venta o arrendamiento, deber� aparecer la etiqueta energ�tica a partir del 1 de junio de 2013.",0,'J',0);
		$this->pdf->Ln(5);
		$this->pdf->MultiCell(195,4,"La Certificaci�n de la Eficiencia Energ�tica o una copia de �sta se deber� mostrar al comprador o nuevo arrendatario potencial y se entregar� al comprador o nuevo arrendatario, en los t�rminos que se establecen en el Procedimiento b�sico. Adem�s, este real decreto contribuye a informar de las emisiones de CO2 en el sector residencial.",0,'J',0);
		$this->pdf->Ln(5);
		
		$this->pdf->SetFont('Arial','BU',9);
		$this->pdf->MultiCell(190,5,"A RESALTAR DEL DECRETO.",0,'L',0);
		$this->pdf->Ln(5);
		
		$this->pdf->MultiCell(190,5,"Art�culo 2. �mbito de aplicaci�n.",0,'L',0);
		$this->pdf->Ln(5);		
		$this->pdf->SetFont("arial", "", 8);
		$this->pdf->MultiCell(195,5,"Este Procedimiento b�sico ser� de aplicaci�n a:
	   a) Edificios de nueva construcci�n.
	   b) Edificios o partes de edificios existentes que se vendan o alquilen a un nuevo arrendatario, siempre que no dispongan de un certificado en vigor.
	 c) Edificios o partes de edificios en los que una autoridad p�blica ocupe una superficie �til total superior a 250 m2 y que sean frecuentados habitualmente por el p�blico.",0,'J',0);
		$this->pdf->Ln(5);
		$this->pdf->MultiCell(195,5,"Exclusiones. 
	   a) Edificios y monumentos protegidos oficialmente.
	   b) Lugares de culto y para actividades religiosas.
	   c) Construcciones provisionales (hasta dos a�os).
	  d) Edificios industriales, de la defensa y agr�colas o partes de los mismos, en la parte destinada a talleres, procesos industriales, de la defensa y agr�colas no residenciales.
	   e) Los de una superficie �til total inferior a 50 m2.
	   f) Los que se compren para reformas importantes o demolici�n.
	  g) Edificios para viviendas existentes (o partes de ellos), con uso inferior a cuatro meses al a�o, o si tienen un consumo previsto de energ�a inferior al 25% del normal anual, seg�n declaraci�n responsable de su propietario.
",0,'J',0);
		$this->pdf->Ln(5);
		$this->pdf->SetFont('Arial','BU',9);
		$this->pdf->MultiCell(190,5,"Art�culo 5. Certificaci�n de la eficiencia energ�tica de un edificio.",0,'L',0);
		$this->pdf->Ln(5);		
		$this->pdf->SetFont("arial", "", 8);
		$this->pdf->MultiCell(195,5,"El responsable de encargarlo y de conservarlo es el promotor o propietario del edificio o de parte del mismo, ya sea de nueva construcci�n o existente, en los casos que venga obligado por este real decreto. Debe presentarlo al �rgano competente de la Comunidad Aut�noma, para su registro. Las autoridades lo pueden pedir al propietario o al Presidente de la Comunidad y debe de incorporarse al Libro del edificio.",0,'J',0);
		$this->pdf->Ln(5);
		$this->pdf->SetFont('Arial','BU',9);
		$this->pdf->MultiCell(190,5,"Art�culo 12. Etiqueta de Eficiencia Energ�tica.",0,'L',0);
		$this->pdf->Ln(5);		
		$this->pdf->SetFont("arial", "", 8);
		$this->pdf->MultiCell(195,5,"La etiqueta se incluir� en toda oferta, promoci�n y publicidad dirigida a la venta o arrendamiento del edificio o unidad del edificio. Deber� figurar siempre en la etiqueta, de forma clara e inequ�voca, si se refiere al certificado de eficiencia energ�tica del proyecto o al del edificio terminado.",0,'J',0);
		$this->pdf->Ln(5);
		$this->pdf->SetFont('Arial','BU',9);
		$this->pdf->MultiCell(190,5,"Art�culo 18. Infracciones y sanciones",0,'L',0);
		$this->pdf->Ln(5);		
		$this->pdf->SetFont("arial", "", 8);
		$this->pdf->MultiCell(195,5,"El incumplimiento de los preceptos contenidos en este procedimiento b�sico, se considerar� en todo caso como infracci�n en materia de certificaci�n de la eficiencia energ�tica de los edificios y se sancionar� de acuerdo con lo dispuesto en las normas de rango legal que resulten de aplicaci�n.",0,'J',0);
		$this->pdf->Ln(5);
		$this->pdf->MultiCell(195,5,"Ser� complementaria a las ya conocidas de infracci�n de los derechos de consumidores y usuarios.",0,'J',0);
		$this->pdf->Ln(5);
		$this->pdf->MultiCell(195,4,"Yo, D/D�a. ".$datos['nombre_completo'].", como propietario/a del inmueble sito en ".$datos['direccion_vivienda'].", ".$datos['poblacion_vivienda']." suscribo que he sido informado de dicho decreto, que conozco mi obligaci�n de contratar la realizaci�n del Certificado de Eficiencia energ�tica y asumo mi responsabilidad de que Gestic�diz publicite dicho inmueble sin este documento.".".",0,'J',0);
		$this->pdf->Ln(5);
		$this->pdf->Cell(190,7,"En C�diz a ".$datos['dia_fecha']." de ".$datos['mes_fecha']." de ".$datos['anio_fecha'].".",0,1);
	}
	
	/**
	 * Comprueba si todas las carpetas necesarias para el almacenamiento f�sico han sido creadas
	 *
	 * @param [cliente]						Identificador del cliente
	 * @param [inmueble]					Identificador del inmueble
	 *
	 * @return void
	 */
	 
	private function ComprobarFicherosBD($cliente,$inmueble)
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
		if(file_exists(PATHINCLUDE_FRAMEWORK_DOC. "clientes/cliente_".$cliente."/inmueble_".$inmueble."/certificacion_energetica.pdf"))
		{
			unlink(PATHINCLUDE_FRAMEWORK_DOC. "clientes/cliente_".$cliente."/inmueble_".$inmueble."/certificacion_energetica.pdf");
		}
	}
}
?>