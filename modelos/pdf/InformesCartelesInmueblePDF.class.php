<?php
/*
InformesCartelesInmueblePDF.class.php, v 2.4 2013/05/13

InformesCartelesInmueblePDF - Clase para crear informes de los carteles de los inmuebles en formato PDF

Esta librería es propiedad de Ángel Luis Berasuain Ruiz, cualquier uso que pudiera darse
tendrá que estar autorizado expresamente bajo mi supervisión.

Si tienes cualquier sugerencia, duda o comentario, por favor enviámela a:

Ángel Luis Berasuain Ruiz
klaimir@hotmail.com

*/

/* load classes */

require_once("InformesPDF.class.php");
require_once('plantilla_app.cartel.php');

/* load libraries */

// No son necesarias librerías adicionales

/**
*
* InformesCartelesInmueblePDF
*
* Clase para crear informes de los carteles de los inmuebles en formato PDF
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  InformesCartelesInmueblePDF.class.php, v 2.4 2013/05/13
* @access   public
*/

class InformesCartelesInmueblePDF extends InformesPDF
{	
	public $tipo_cartel;
	public $disposicion_fotos;
	public $max_altura;
	public $max_anchura;
	
	/**
	 * Constructor
	 *
	 */
	 
	function __construct($color='rojo',$pos_x=NULL,$pos_y=NULL,$tam_letra=8)
    {  
		parent::__construct($color,$pos_x,$pos_y,$tam_letra);
    }
	
	/**
	 * Establece el tipo de cartel
	 *
	 * @param [tipo_cartel]		Datos de configuración
	 *
	 */
	
	function SetTipoCartel($tipo_cartel)
    {  
		$this->tipo_cartel=$tipo_cartel;
    }
	
	/**
	 * Establece la disposición de las fotografías
	 *
	 * @param [disposicion_fotos]		Datos de configuración
	 *
	 */
	
	function SetDisposicionFotos($disposicion_fotos)
    {  
		$this->disposicion_fotos=$disposicion_fotos;
    }
	
	/**
	 * Establece la anchura máxima de las fotografías
	 *
	 * @param [max_anchura]		Datos de configuración
	 *
	 */
	
	function SetMaxAnchura($max_anchura)
    {  
		$this->max_anchura=$max_anchura;
    }
	
	/**
	 * Establece la altura máxima de las fotografías
	 *
	 * @param [max_altura]		Datos de configuración
	 *
	 */
	
	function SetMaxAltura($max_altura)
    {  
		$this->max_altura=$max_altura;
    }
	
	/**
	 * Imprime una ficha del cartel y la almacena en la BD
	 *
	 * @param [id_cartel]		Identificador del cartel
	 * @param [inmueble]		Identificador del inmueble
	 *
	 * @return Devuelve true o false
	 */
	
	function Ficha($id_cartel,$inmueble)
	{
		// Conexión Base de datos
		$DB = new Model();		
		// Consulta
		$consulta = $DB->Execute("SELECT * FROM carteles_inmueble WHERE id_cartel=". $id_cartel." AND inmueble=". $inmueble) or die($DB->ErrorMsg());
		$row_consulta = $consulta->FetchRow();
		$totalRows_consulta = $consulta->RecordCount();
		// Formateo de datos
		$datos=$row_consulta;
		// Comprobaciones
		$this->ComprobarFicherosBD($id_cartel,$inmueble);
		// Aplicación de formato
		$datos['texto_opcion_vivienda']=formatear_opcion_cartel($datos['opcion_vivienda']);
		$datos['texto_poblacion']=formatear_poblacion($datos['poblacion']);
		$datos['texto_zona']=formatear_zona($datos['zona']);
		$datos['texto_metros']=number_format($datos['metros'], 2, ',', '.');
		$datos['texto_precio_compra']=number_format($datos['precio_compra'], 2, ',', '.');
		$datos['texto_precio_alquiler']=number_format($datos['precio_alquiler'], 2, ',', '.');
		$datos['texto_certificacion_energetica']=formatear_tipo_certificacion_energetica($datos['certificacion_energetica']);
		// Sección principal
		$this->CuerpoFicha($datos);
		// Salida del PDF
		return $this->pdf->Output(PATHINCLUDE_FRAMEWORK_DOC. "inmuebles/inmueble_".$inmueble."/carteles/cartel_".$id_cartel.".pdf");
	}
	
	/**
	 * Imprime una el cuerpo principal del cartel de un inmueble
	 *
	 * @param [datos]		Datos a imprimir
	 *
	 * @return void
	 */
	 
	function CuerpoFicha($datos) 
	{
		// Documento
		$this->pdf = new PDF_App_Cartel();
		$this->pdf->SetMostrarLogo(false);
		$this->pdf->SetTopMargin(5);
		$this->pdf->AddPage();
		
		$this->pdf->SetTextColor(0,0,0);
		$this->pdf->SetDrawColor(0,0,0);
		$this->pdf->SetFillColor(0,0,0);
		
		// CABECERA
		include(PATHINCLUDE_FRAMEWORK_LIBRERIAS.'phpqrcode/qrlib.php');
	 
		$tempDir = PATHINCLUDE_FRAMEWORK_DOC. "inmuebles/inmueble_".$datos['inmueble']."/carteles/"; 
		 
		$codeContents = $datos['enlace_web']; 
		 
		$fileName = 'qr_code_cartel_'.$datos['id_cartel'].'.png'; 
		 
		$pngAbsoluteFilePath = $tempDir.$fileName; 
		 
		QRcode::png($codeContents, $pngAbsoluteFilePath);
		
		$this->pdf->Image($pngAbsoluteFilePath, NULL, 5, 33,33);
		
		$this->pdf->Image(PATHINCLUDE_FRAMEWORK_IMG."logo_pdf.png", 167, 5, 31,31);
		
		// Texto de opción
		if($datos['opcion_vivienda']==1)
			$datos['texto_opcion_vivienda']="SE VENDE";
			
		if($datos['opcion_vivienda']==2)
			$datos['texto_opcion_vivienda']="SE ALQUILA";
			
		$this->pdf->SetFont('Arial','B',35);
		$this->pdf->Ln(5);
		$this->pdf->MultiCell(190,5,$datos['texto_opcion_vivienda'],0,'C',0);
		
		$this->pdf->Ln(13);
		
		// Certificación
		if(!is_null($datos['certificacion_energetica']) && $datos['certificacion_energetica']!=0)
		{
			$coor_Y=$this->pdf->GetY();
			$this->pdf->Image(PATHINCLUDE_FRAMEWORK_IMG."certificacion_energetica/IDAE.jpg",NULL,NULL,165,27);
			$this->pdf->Image(PATHINCLUDE_FRAMEWORK_IMG."certificacion_energetica/logo.jpg",180,$coor_Y,20,27);
			$this->pdf->Ln(5);
		}
		
		// Datos generales
		$this->pdf->SetFont('Arial','BU',18);
		$this->pdf->Cell(190,5,$datos['texto_zona'].", ".$datos['texto_poblacion'],0,0);
		$this->pdf->Ln(10);
		
		// Impresión del contenido según formato
		if($this->tipo_cartel==1)
		{
			// Características
			$this->ImprimirCaracteristicasPDF($datos);
			// Impresión de fotos		
			$this->ImprimirFotosPDF($datos);		
			// Observaciones
			$this->ImprimirObservacionesPDF($datos);
		}
		
		if($this->tipo_cartel==2)
		{
			// Impresión de fotos		
			$this->ImprimirFotosPDF($datos);
			// Características
			$this->ImprimirCaracteristicasPDF($datos);		
			// Observaciones
			$this->ImprimirObservacionesPDF($datos);
		}
		
		if($this->tipo_cartel==3)
		{
			// Características
			$this->ImprimirCaracteristicasPDF($datos);	
			// Observaciones
			$this->ImprimirObservacionesPDF($datos);
			// Impresión de fotos		
			$this->ImprimirFotosPDF($datos);
		}
	}
	
	/**
	 * Imprime una las características del inmueble
	 *
	 * @param [datos]		Datos a imprimir
	 *
	 * @return void
	 */
	 
	function ImprimirCaracteristicasPDF($datos)
	{	
		$this->pdf->SetFont('Arial','B',18);
		$this->pdf->SetX(55);
		if($datos['opcion_vivienda']==1)
			$this->pdf->Cell(60,10,$datos['texto_precio_compra']." €",0,0);
		if($datos['opcion_vivienda']==2)
			$this->pdf->Cell(60,10,$datos['texto_precio_alquiler']." €",0,0);
		$this->pdf->Cell(60,10,$datos['habitaciones']." habitaciones",0,1);
		$this->pdf->SetX(55);
		$this->pdf->Cell(60,10,$datos['texto_metros']." m2",0,0);
		$this->pdf->Cell(60,10,$datos['banios']." baños",0,1);
		$this->pdf->Ln(2);
	}
	
	/**
	 * Imprime una las observaciones del inmueble
	 *
	 * @param [datos]		Datos a imprimir
	 *
	 * @return void
	 */
	 
	function ImprimirObservacionesPDF($datos)
	{	
		if($datos['observaciones']!="")
		{
			$this->pdf->Ln(3);
			$this->pdf->SetFont('Arial','',12);
			$this->pdf->MultiCell(195,4,$datos['observaciones'],1,'L',0);
			$this->pdf->Ln(4);
		}
	}
	
	/**
	 * Imprime una las fotografías del inmueble
	 *
	 * @param [datos]		Datos a imprimir
	 *
	 * @return void
	 */
	 
	function ImprimirFotosPDF($datos)
	{	
		$DB = new Model();
		// Se almacenan todas las fotos seleccionadas
		$sql_fotos = "SELECT * FROM fotos_carteles_inmueble WHERE inmueble = ".$datos['inmueble']." AND cartel = ".$datos['id_cartel'];
		$fotos = $DB->Execute($sql_fotos) or die($DB->ErrorMsg());
		$foto = $fotos->FetchRow();
		$num_fotos = $fotos->RecordCount();
		// Se inicializa el array
		$array_fotos_selec=array();
		// Se comprueban las fotos seleccionadas
		if($num_fotos!=0)
		{
			do
			{
				$array_fotos_selec[]=$foto['foto'];
			} while ($foto = $fotos->FetchRow());
		}
		// Impresión de fotos
		$num_array_fotos_selec=count($array_fotos_selec);
		if($num_array_fotos_selec!=0)
		{
			$coor_Y=$this->pdf->GetY();
			$cont_fotos=1;
			foreach($array_fotos_selec as $foto_selec)
			{
				// Se consulta el nombre del fichero
				$sql_ficheros = "SELECT * FROM ficheros_inmuebles WHERE inmueble = ".$datos['inmueble']." AND id_fichero = ".$foto_selec;
				$ficheros = $DB->Execute($sql_ficheros) or die($DB->ErrorMsg());
				$fichero = $ficheros->FetchRow();
				// Ruta foto
				$ruta_foto=$_SESSION['rutadocs']."/inmuebles/inmueble_".$datos['inmueble']."/fotos/".$fichero['fichero'];
				// Se calcula redimensión de tamaño
				$dimensiones_foto=redimensionar_fotografia($ruta_foto,$this->max_altura,$this->max_anchura);
				// Impresión de la foto
				if($this->disposicion_fotos=="separadas")
				{					
					$coor_x=(210-$dimensiones_foto['anchura'])/2;
					$this->pdf->Image($ruta_foto, $coor_x, NULL, $dimensiones_foto['anchura'],$dimensiones_foto['altura']);
					$this->pdf->Ln(2);
				}
				// Impresión de la foto
				if($this->disposicion_fotos=="juntas")
				{
					// Se calcula redimensión de tamaño
					if($cont_fotos==1)
					{
						if($num_array_fotos_selec==$cont_fotos)
							$coor_x=(210-$dimensiones_foto['anchura'])/2;
						else
							$coor_x=(105-$dimensiones_foto['anchura'])/2;
					}
					else
					{
						$coor_x=103+((105-$dimensiones_foto['anchura'])/2);
					}
					$this->pdf->Image($ruta_foto, $coor_x, $coor_Y, $dimensiones_foto['anchura'],$dimensiones_foto['altura']);
					// Si es el último elemento se posiciona el puntero de escritura
					if($num_array_fotos_selec==$cont_fotos)
					{
						$this->pdf->SetY($coor_Y+$this->max_altura);
					}
					// Se pasa a la siguiente
					$cont_fotos++;
				}
			}
			$this->pdf->Ln(1);
		}
	}
	
	/**
	 * Comprueba si todas las carpetas necesarias para el almacenamiento físico de el cartel han sido creadas
	 *
	 * @param [id_cartel]		Identificador del cartel
	 * @param [inmueble]			Identificador del inmueble
	 *
	 * @return void
	 */
	 
	private function ComprobarFicherosBD($id_cartel,$inmueble)
	{	
		// Si no existen los directorios
		if(!is_dir(PATHINCLUDE_FRAMEWORK_DOC . "inmuebles/inmueble_".$inmueble))
		{
			mkdir(PATHINCLUDE_FRAMEWORK_DOC . "inmuebles/inmueble_".$inmueble);
		}
		if(!is_dir(PATHINCLUDE_FRAMEWORK_DOC . "inmuebles/inmueble_".$inmueble."/carteles/"))
		{
			mkdir(PATHINCLUDE_FRAMEWORK_DOC . "inmuebles/inmueble_".$inmueble."/carteles/");
		}
		// Borramos la el fichero fisico de la carpeta
		if(file_exists(PATHINCLUDE_FRAMEWORK_DOC. "inmuebles/inmueble_".$inmueble."/carteles/cartel_".$id_cartel.".pdf"))
		{
			unlink(PATHINCLUDE_FRAMEWORK_DOC. "inmuebles/inmueble_".$inmueble."/carteles/cartel_".$id_cartel.".pdf");
		}
	}
}
?>