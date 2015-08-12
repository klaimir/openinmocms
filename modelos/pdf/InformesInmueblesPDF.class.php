<?php
/*
InformesInmueblesPDF.class.php, v 2.4 2013/05/13

InformesInmueblesPDF - Clase para crear informes de inmuebles en formato PDF

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
* InformesInmueblesPDF
*
* Clase para crear informes de inmuebles en formato PDF
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  InformesInmueblesPDF.class.php, v 2.4 2013/05/13
* @access   public
*/

class InformesInmueblesPDF extends InformesPDF
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
	 * Genera un listado de inmuebles y lo almacena en un fichero
	 *
	 * @param [sql]				Sql de la consulta
	 * @param [filename]		ruta absoluta del fichero
	 *
	 * @return Devuelve true o false
	 */
	
	function ListadoGeneral($sql,$filename='')
	{	
		// Creamos el PDF
		$this->pdf = new PDF_App('L');
		$this->pdf->AddPage();
		
		// Impresión de los filtros
		$this->FiltrosAplicadosListadoGeneral();
		$this->pdf->Ln(5);
		// Título
		$this->pdf->SetFont('Arial','BU',8);
		$this->pdf->Cell(280,5,"RESULTADOS DE BÚSQUEDA",0,1,"C");
		$this->pdf->Ln(5);
		// Informe del listado en PDF
		$this->Listado($sql);
		// Salida del fichero
		return $this->pdf->Output($filename);
	}
	
	/**
	 * Imprime los filtros aplicados al listado general de inmuebles
	 *
	 *
	 * @return Void
	 */
	
	function FiltrosAplicadosListadoGeneral()
	{	
		// Título
		$this->pdf->SetFont('Arial','BU',$this->tam_letra);
		$this->pdf->Cell(280,5,"FILTROS APLICADOS",0,1,"C");		
		// Tipología
		$this->pdf->SetFont('Arial','B',$this->tam_letra);
		$this->pdf->Cell(20,10,"Tipología:",0,0);
		$this->pdf->SetFont('Arial','',$this->tam_letra);
		$this->pdf->Cell(25,10,formatear_tipo($_SESSION['tipos_busq_gest_inmuebles'],"busqueda"),0,0);
		// Provincia
		$this->pdf->SetFont('Arial','B',$this->tam_letra);
		$this->pdf->Cell(20,10,"Provincia:",0,0);
		$this->pdf->SetFont('Arial','',$this->tam_letra);
		$this->pdf->Cell(30,10,formatear_provincia($_SESSION['provincia_busq_gest_inmuebles'],"busqueda"),0,0);
		// Región
		$this->pdf->SetFont('Arial','B',$this->tam_letra);
		$this->pdf->Cell(20,10,"Región:",0,0);
		$this->pdf->SetFont('Arial','',$this->tam_letra);
		$this->pdf->Cell(40,10,formatear_region($_SESSION['region_busq_gest_inmuebles'],"busqueda"),0,0);
		// Municipio
		$this->pdf->SetFont('Arial','B',$this->tam_letra);
		$this->pdf->Cell(20,10,"Municipio:",0,0);
		$this->pdf->SetFont('Arial','',$this->tam_letra);
		$this->pdf->Cell(40,10,formatear_poblacion($_SESSION['poblacion_busq_gest_inmuebles'],"busqueda"),0,0);
		// Zona
		$this->pdf->SetFont('Arial','B',$this->tam_letra);
		$this->pdf->Cell(15,10,"Zona:",0,0);
		$this->pdf->SetFont('Arial','',$this->tam_letra);
		$this->pdf->Cell(70,10,formatear_zona($_SESSION['zona_busq_gest_inmuebles'],"busqueda"),0,1);
		// Certificación
		$this->pdf->SetFont('Arial','B',$this->tam_letra);
		$this->pdf->Cell(20,10,"Certificación:",0,0);
		$this->pdf->SetFont('Arial','',$this->tam_letra);
		$this->pdf->Cell(20,10,formatear_tipo_certificacion_energetica($_SESSION['tipo_certificacion_energetica_busq_gest_inmuebles'],"busqueda"),0,0);
		// Opciones
		$this->pdf->SetFont('Arial','B',$this->tam_letra);
		$this->pdf->Cell(20,10,"Opciones:",0,0);
		$this->pdf->SetFont('Arial','',$this->tam_letra);
		$this->pdf->Cell(20,10,formatear_opcion($_SESSION['opciones_busq_gest_inmuebles'],"busqueda"),0,0);
		// Antigüedad
		$this->pdf->SetFont('Arial','B',$this->tam_letra);
		$this->pdf->Cell(20,10,"Antigüedad:",0,0);
		$this->pdf->SetFont('Arial','',$this->tam_letra);
		$this->pdf->Cell(25,10,formatear_antiguedad_inmueble($_SESSION['antiguedad_busq_gest_inmuebles'],"busqueda"),0,0);
		// Dirección
		$this->pdf->SetFont('Arial','B',$this->tam_letra);
		$this->pdf->Cell(20,10,"Dirección:",0,0);
		$this->pdf->SetFont('Arial','',$this->tam_letra);
		$this->pdf->Cell(55,10,$_SESSION['direccion_busq_gest_inmuebles'],0,1);
		// Captador
		$this->pdf->SetFont('Arial','B',$this->tam_letra);
		$this->pdf->Cell(20,10,"Captador:",0,0);
		$this->pdf->SetFont('Arial','',$this->tam_letra);
		$this->pdf->Cell(50,10,formatear_usuario($_SESSION['captadores_busq_gest_inmuebles']),0,0);
		// Palabra(s)
		$this->pdf->SetFont('Arial','B',$this->tam_letra);
		$this->pdf->Cell(20,10,"Palabra(s):",0,0);
		$this->pdf->SetFont('Arial','',$this->tam_letra);
		$this->pdf->Cell(80,10,$_SESSION['palabras_busq_gest_inmuebles'],0,1);
	}
	
	/**
	 * Imprime la cabecera listado de inmuebles
	 *
	 *
	 * @return Void
	 */

	function CabeceraListado()
	{
		// Obtenemos la gama de colores a usar
		$gama_colores=InformesInmueblesPDF::ObtenerGamaColores($this->color);		
		
		$this->pdf->SetFont('Arial','B',$this->tam_letra);
		$this->pdf->SetTextColor(0,0,0);	
		$this->pdf->SetFillColor($gama_colores['cabecera'][0], $gama_colores['cabecera'][1], $gama_colores['cabecera'][2]);
		$this->pdf->SetWidths(array(280));
		$this->pdf->SetAligns(array("C"));

		if(!is_null($this->pos_x))
			$this->pdf->SetX($this->pos_x);
		$this->pdf->Row(array("INMUEBLES"),true);	
		$this->pdf->SetFont('Arial','B',$this->tam_letra);
		$this->pdf->SetFillColor($gama_colores['cabecera2'][0], $gama_colores['cabecera2'][1], $gama_colores['cabecera2'][2]);
		$this->pdf->SetWidths(array(15,12,30,40,40,60,20,20,20,10,13));
		$this->pdf->SetAligns(array("C","C","C","C","C","C","C","C","C","C","C"));

		if(!is_null($this->pos_x))
			$this->pdf->SetX($this->pos_x);
		$this->pdf->Row(array("Id.","Certif.","Tipología","Municipio","Zona","Dirección","Precio Compra","Precio Alquiler","Metros","Hab.","Baños"),true);					
	}
	
	/**
	 * Imprime una fila del listado de inmuebles
	 *
	 * @param [datos]			datos de la fila
	 * @param [contador]		número de fila para imprimir las pares e impares de forma resaltada
	 *
	 * @return void
	 */
	
	function FilaListado($datos,$contador)
	{		
		// Datos
		$array=array($datos['id_inmueble'],formatear_tipo_certificacion_energetica($datos['certificacion_energetica']),formatear_tipo($datos['tipo']),formatear_poblacion($datos['poblacion_inmueble']),formatear_zona($datos['zona']),$datos['direccion'],number_format($datos['precio_compra'], 2, ',', '.')." €",number_format($datos['precio_alquiler'], 2, ',', '.')." €",number_format($datos['metros'], 2, ',', '.'),$datos['habitaciones'],$datos['banios']);
		// Obtenemos la gama de colores a usar
		$gama_colores=$gama_colores=InformesInmueblesPDF::ObtenerGamaColores($this->color);;
		// Si con la columna se supera la página
		if($this->pdf->CheckPageBreak($this->pdf->CalculateHeightRow($array)))
		{
			$this->CabeceraListado();
		}
		// Columna normal
		$this->pdf->SetFont('Arial','',$this->tam_letra);
		$this->pdf->SetTextColor(0,0,0);
		if($contador%2 == 0)
			$this->pdf->SetFillColor($gama_colores['fila'][0], $gama_colores['fila'][1], $gama_colores['fila'][2]);
		else	
			$this->pdf->SetFillColor(255, 255, 255);

		$this->pdf->SetWidths(array(15,12,30,40,40,60,20,20,20,10,13));
		$this->pdf->SetAligns(array("C","C","C","C","C","C","C","C","C","C","C"));

		if(!is_null($this->pos_x))
			$this->pdf->SetX($this->pos_x);
		$this->pdf->Row($array,true);		
	}
	
	/**
	 * Genera una ficha de un inmueble con el texto de confidencialidad de datos y lo almacena en un fichero
	 *
	 * @param [id_inmueble]		Identificador del inmueble
	 * @param [filename]		ruta absoluta del fichero
	 *
	 * @return Devuelve true o false
	 */
	
	function Ficha($id_inmueble,$filename='')
	{	
		// Conexión Base de datos
		$DB = new Model();		
		// Consulta
		$consulta = $DB->Execute("SELECT * FROM inmuebles WHERE id_inmueble=".$id_inmueble, $conexion) or die($DB->ErrorMsg());
		$row_consulta = $consulta->FetchRow();
		$totalRows_consulta = $consulta->RecordCount();		
		// Creamos el PDF
		$this->pdf = new PDF_App();
		$this->pdf->AddPage();
		// Título
		if(!is_null($row_consulta['certificacion_energetica']) && $row_consulta['certificacion_energetica']!=0)
		{
			$coor_Y=$this->pdf->GetY();
			$this->pdf->Image(PATHINCLUDE_FRAMEWORK_IMG."certificacion_energetica/IDAE.jpg",NULL,NULL,165,30);
			$this->pdf->Image(PATHINCLUDE_FRAMEWORK_IMG."certificacion_energetica/logo.jpg",180,$coor_Y,20,30);
			$this->pdf->Ln(5);		
			$this->pdf->SetFont('Arial','BU',$this->tam_letra+4);
			$this->pdf->Cell(185,5,"FICHA DEL INMUEBLE (".formatear_tipo_certificacion_energetica($row_consulta['certificacion_energetica']).")",0,1,"C");
		}
		else
		{		
			$this->pdf->SetFont('Arial','BU',$this->tam_letra+4);
			$this->pdf->Cell(185,5,"FICHA DEL INMUEBLE",0,1,"C");
		}		
		// Si existe
		if ($totalRows_consulta != 0)
		{				
			// Sección principal
			$this->CuerpoFicha($row_consulta);
			$this->pdf->Ln(5);
			// Almacenamos la coordenada del cliente
			$Y_clientes=$this->pdf->GetY();
			// Clientes
			$this->pdf->SetFont('Arial','BU',$this->tam_letra);
			$this->pdf->Cell(90,5,"CLIENTES",0,1);	
			// Listado de clientes
			$this->ListadoClientesAsociados($id_inmueble);
			$this->pdf->Ln(5);
			// Fotografías
			$this->pdf->SetFont('Arial','BU',$this->tam_letra);
			$this->pdf->Cell(90,5,"FOTOGRAFÍAS",0,1);
			// Listado de fotografías
			$this->ListadoFotosAsociadas($id_inmueble);
		}
		else
		{			
			$this->pdf->SetFont('Arial','',$this->tam_letra);
			$this->pdf->MultiCell(160,10,"Actualmente no existe ningún inmueble con el identificador seleccionado.",0,1);
		}
		// Salida del fichero
		return $this->pdf->Output($filename);
	}

	/**
	 * Imprime la sección principal de la ficha de un inmueble con todos sus datos asociados
	 *
	 * @param [datos]		datos de la ficha
	 *
	 * @return void
	 */
	 
	function CuerpoFicha($datos) 
	{
		// Tipología
		$this->pdf->SetFont('Arial','B',$this->tam_letra);
		$this->pdf->Cell(20,10,"Tipología:",0,0);
		$this->pdf->SetFont('Arial','',$this->tam_letra);
		$this->pdf->Cell(30,10,formatear_tipo($datos['tipo']),0,0);
		// Precio Compra
		$this->pdf->SetFont('Arial','B',$this->tam_letra);
		$this->pdf->Cell(25,10,"Precio Compra:",0,0);
		$this->pdf->SetFont('Arial','',$this->tam_letra);
		$this->pdf->Cell(25,10,number_format($datos['precio_compra'], 2, ',', '.')." €",0,0);
		// Precio Alquiler
		$this->pdf->SetFont('Arial','B',$this->tam_letra);
		$this->pdf->Cell(25,10,"Precio Alquiler:",0,0);
		$this->pdf->SetFont('Arial','',$this->tam_letra);
		$this->pdf->Cell(25,10,number_format($datos['precio_alquiler'], 2, ',', '.')." €",0,0);
		// Metros
		$this->pdf->SetFont('Arial','B',$this->tam_letra);
		$this->pdf->Cell(15,10,"Metros:",0,0);
		$this->pdf->SetFont('Arial','',$this->tam_letra);
		$this->pdf->Cell(20,10,number_format($datos['metros'], 2, ',', '.'). " (".number_format($datos['metros_utiles'], 2, ',', '.').")",0,1);
		// Dirección
		$this->pdf->SetFont('Arial','B',$this->tam_letra);
		$this->pdf->Cell(20,10,"Dirección:",0,0);
		$this->pdf->SetFont('Arial','',$this->tam_letra);
		$this->pdf->Cell(60,10,$datos['direccion'],0,0);
		// Región
		$this->pdf->SetFont('Arial','B',$this->tam_letra);
		$this->pdf->Cell(20,10,"Región:",0,0);
		$this->pdf->SetFont('Arial','',$this->tam_letra);
		$this->pdf->Cell(35,10,formatear_region($datos['region']),0,0);
		// Zona
		$this->pdf->SetFont('Arial','B',$this->tam_letra);
		$this->pdf->Cell(15,10,"Zona:",0,0);
		$this->pdf->SetFont('Arial','',$this->tam_letra);
		$this->pdf->Cell(50,10,formatear_zona($datos['zona']),0,1);
		// Provincia
		$this->pdf->SetFont('Arial','B',$this->tam_letra);
		$this->pdf->Cell(20,10,"Provincia:",0,0);
		$this->pdf->SetFont('Arial','',$this->tam_letra);
		$this->pdf->Cell(35,10,formatear_provincia($datos['provincia_inmueble']),0,0);
		// Municipio
		$this->pdf->SetFont('Arial','B',$this->tam_letra);
		$this->pdf->Cell(20,10,"Municipio:",0,0);
		$this->pdf->SetFont('Arial','',$this->tam_letra);
		$this->pdf->Cell(45,10,formatear_poblacion($datos['poblacion_inmueble']),0,0);
		// Antigüedad
		$this->pdf->SetFont('Arial','B',$this->tam_letra);
		$this->pdf->Cell(20,10,"Antigüedad:",0,0);
		$this->pdf->SetFont('Arial','',$this->tam_letra);
		$this->pdf->Cell(35,10,formatear_antiguedad_inmueble($datos['antiguedad']),0,1);
		// Certificación
		$this->pdf->SetFont('Arial','B',$this->tam_letra);
		$this->pdf->Cell(22,10,"Certificación:",0,0);
		$this->pdf->SetFont('Arial','',$this->tam_letra);
		$this->pdf->Cell(15,10,formatear_tipo_certificacion_energetica($datos['certificacion_energetica']),0,0);
		// Habitaciones
		$this->pdf->SetFont('Arial','B',$this->tam_letra);
		$this->pdf->Cell(22,10,"Habitaciones:",0,0);
		$this->pdf->SetFont('Arial','',$this->tam_letra);
		$this->pdf->Cell(15,10,$datos['habitaciones'],0,0);
		// Habitaciones
		$this->pdf->SetFont('Arial','B',$this->tam_letra);
		$this->pdf->Cell(15,10,"Baños:",0,0);
		$this->pdf->SetFont('Arial','',$this->tam_letra);
		$this->pdf->Cell(15,10,$datos['banios'],0,0);
		// Captador
		$this->pdf->SetFont('Arial','B',$this->tam_letra);
		$this->pdf->Cell(20,10,"Captador:",0,0);
		$this->pdf->SetFont('Arial','',$this->tam_letra);
		$this->pdf->Cell(15,10,formatear_usuario($datos['captador']),0,1);
		// Observaciones
		$this->pdf->SetFont('Arial','B',$this->tam_letra);
		$this->pdf->Cell(30,10,"Observaciones:",0,0);
		$this->pdf->SetFont('Arial','',$this->tam_letra);
		$this->pdf->MultiCell(155,10,$datos['observaciones'],0,1);
	}
	
	/**
	 * Imprime la cabacera del listado de clientes asociados a un inmueble
	 *
	 *
	 * @return void
	 */
	
	function CabeceraListadoClientesAsociados()
	{
		// Obtenemos la gama de colores a usar
		$gama_colores=InformesInmueblesPDF::ObtenerGamaColores($this->color);		
		
		$this->pdf->SetFont('Arial','B',$this->tam_letra);
		$this->pdf->SetTextColor(0,0,0);	
		$this->pdf->SetFillColor($gama_colores['cabecera'][0], $gama_colores['cabecera'][1], $gama_colores['cabecera'][2]);
		$this->pdf->SetWidths(array(80));
		$this->pdf->SetAligns(array("C"));

		if(!is_null($this->pos_x))
			$this->pdf->SetX($this->pos_x);
		$this->pdf->Row(array("CLIENTES"),true);	
		$this->pdf->SetFont('Arial','B',$this->tam_letra);
		$this->pdf->SetFillColor($gama_colores['cabecera2'][0], $gama_colores['cabecera2'][1], $gama_colores['cabecera2'][2]);
		$this->pdf->SetWidths(array(80));
		$this->pdf->SetAligns(array("C"));

		if(!is_null($this->pos_x))
			$this->pdf->SetX($this->pos_x);
		$this->pdf->Row(array("Nombre Completo"),true);				
	}
	
	/**
	 * Imprime una fila del listado de clientes asociados a un inmueble
	 *
	 * @param [datos]			datos de la fila
	 * @param [contador]		número de fila para imprimir las pares e impares de forma resaltada
	 *
	 * @return void
	 */

	function FilaListadoClientesAsociados($datos,$contador)
	{		
		// Datos
		$array=array($datos['apellidos'].", ".$datos['nombre']);
		// Obtenemos la gama de colores a usar
		$gama_colores=InformesInmueblesPDF::ObtenerGamaColores($this->color);
		// Si con la columna se supera la página
		if($this->pdf->CheckPageBreak($this->pdf->CalculateHeightRow($array)))
		{
			$this->CabeceraListadoClientesAsociados();
		}
		// Columna normal
		$this->pdf->SetFont('Arial','',$this->tam_letra);
		$this->pdf->SetTextColor(0,0,0);
		if($contador%2 == 0)
			$this->pdf->SetFillColor($gama_colores['fila'][0], $gama_colores['fila'][1], $gama_colores['fila'][2]);
		else	
			$this->pdf->SetFillColor(255, 255, 255);

		$this->pdf->SetWidths(array(80));
		$this->pdf->SetAligns(array("C"));

		if(!is_null($this->pos_x))
			$this->pdf->SetX($this->pos_x);
		$this->pdf->Row($array,true);
	}
	
	/**
	 * Imprime el listado de clientes asociados a un inmueble en formato tabla
	 *
	 * @param [id_inmueble]		identificador del inmueble
	 *
	 * @return void
	 */

	function ListadoClientesAsociados($id_inmueble)
	{	
		// Conexión Base de datos
		$DB = new Model();		
		// Consulta
		$consulta = $DB->Execute("SELECT clientes.* FROM clientes, clientes_inmuebles WHERE cliente=id_cliente AND inmueble=".$id_inmueble) or die($DB->ErrorMsg());
		$row_consulta = $consulta->FetchRow();
		$totalRows_consulta = $consulta->RecordCount();
		
		if ($totalRows_consulta != 0)
		{				
			if(!is_null($this->pos_y))
				$this->pdf->SetY($this->pos_y);
			// Cabecera Tabla
			$this->CabeceraListadoClientesAsociados();
			// Filas
			$i=0;
			do
			{
				$this->FilaListadoClientesAsociados($row_consulta,$i);
				++$i;
			} while ($row_consulta = $consulta->FetchRow());	
		}
		else
		{			
			if(!is_null($this->pos_x))
				$this->pdf->SetX($this->pos_x);
			$this->pdf->SetFont('Arial','',$this->tam_letra);
			$this->pdf->MultiCell(160,10,"Actualmente no existen clientes asociados al inmueble actual.",0,1);
		}
	}
	
	/**
	 * Imprime el listado de fotografías asociadas a un inmueble
	 *
	 * @param [id_inmueble]		identificador del inmueble
	 *
	 * @return void
	 */

	function ListadoFotosAsociadas($id_inmueble)
	{	
		// Conexión Base de datos
		$DB = new Model();		
		// Consulta
		$consulta = $DB->Execute("SELECT * FROM ficheros_inmuebles WHERE inmueble=".$id_inmueble." AND tipo_fichero=2") or die($DB->ErrorMsg());
		$row_consulta = $consulta->FetchRow();
		$totalRows_consulta = $consulta->RecordCount();
		
		if ($totalRows_consulta != 0)
		{				
			$this->pdf->SetFont('Arial','',$this->tam_letra);
			$this->pdf->MultiCell(160,10,"Podrá visualizar las fotografías en las páginas siguientes.",0,1);
			$i=0;
			do
			{
				$ruta_foto=$_SESSION['rutadocs']."/inmuebles/inmueble_".$id_inmueble."/fotos/".$row_consulta['fichero'];
				// Se calcula redimensión de tamaño
				$dimensiones_foto=redimensionar_fotografia($ruta_foto,230,280);
				if($dimensiones_foto['anchura']>$dimensiones_foto['altura'])
					$this->pdf->AddPage("L");
				else
					$this->pdf->AddPage();
				$this->pdf->Image($ruta_foto, 10, 40, $dimensiones_foto['anchura'],$dimensiones_foto['altura']);
			} while ($row_consulta = $consulta->FetchRow());	
		}
		else
		{			
			$this->pdf->SetFont('Arial','',$this->tam_letra);
			$this->pdf->MultiCell(160,10,"Actualmente no existen fotografías asociadas al inmueble actual.",0,1);
		}
	}
}
?>