<?php
/*
InformesClientesPDF.class.php, v 2.4 2013/05/13

InformesClientesPDF - Clase para crear informes de clientes en formato PDF

Esta librería es propiedad de Ángel Luis Berasuain Ruiz, cualquier uso que pudiera darse
tendrá que estar autorizado expresamente bajo mi supervisión.

Si tienes cualquier sugerencia, duda o comentario, por favor enviámela a:

Ángel Luis Berasuain Ruiz
klaimir@hotmail.com

*/

/* load classes */

require_once("InformesPDF.class.php");
require_once('plantilla_app.confidencialidad.php');

/* load libraries */

// No son necesarias librerías adicionales

/**
*
* InformesClientesPDF
*
* Clase para crear informes de clientes en formato PDF
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  InformesClientesPDF.class.php, v 2.4 2013/05/13
* @access   public
*/

class InformesClientesPDF extends InformesPDF
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
	 * Genera un listado de clientes y lo almacena en un fichero
	 *
	 * @param [sql]				Sql de la consulta
	 * @param [filename]		ruta absoluta del fichero
	 *
	 * @return Devuelve true o false
	 */
	
	function ListadoGeneral($sql,$filename='')
	{	
		// Creamos el PDF
		$this->pdf = new PDF_App();
		$this->pdf->AddPage();
		
		// Impresión de los filtros
		$this->FiltrosAplicadosListadoGeneral();
		$this->pdf->Ln(5);
		// Título
		$this->pdf->SetFont('Arial','BU',8);
		$this->pdf->Cell(185,5,"RESULTADOS DE BÚSQUEDA",0,1,"C");
		$this->pdf->Ln(5);
		// Informe del listado en PDF
		$this->Listado($sql);
		// Salida del fichero
		return $this->pdf->Output($filename);
	}
	
	/**
	 * Imprime los filtros aplicados al listado general de clientes
	 *
	 *
	 * @return Void
	 */
	
	function FiltrosAplicadosListadoGeneral()
	{	
		// Título
		$this->pdf->SetFont('Arial','BU',$this->tam_letra);
		$this->pdf->Cell(185,5,"FILTROS APLICADOS",0,1,"C");		
		// Nombre
		$this->pdf->SetFont('Arial','B',$this->tam_letra);
		$this->pdf->Cell(20,10,"Nombre:",0,0);
		$this->pdf->SetFont('Arial','',$this->tam_letra);
		$this->pdf->Cell(35,10,$_SESSION['nombre_busq_clientes'],0,0);
		// Apellidos
		$this->pdf->SetFont('Arial','B',$this->tam_letra);
		$this->pdf->Cell(20,10,"Apellidos:",0,0);
		$this->pdf->SetFont('Arial','',$this->tam_letra);
		$this->pdf->Cell(50,10,$_SESSION['apellidos_busq_clientes'],0,0);
		// E-mail
		$this->pdf->SetFont('Arial','B',$this->tam_letra);
		$this->pdf->Cell(15,10,"E-mail:",0,0);
		$this->pdf->SetFont('Arial','',$this->tam_letra);
		$this->pdf->Cell(55,10,$_SESSION['email_busq_clientes'],0,1);
		// Opciones
		$this->pdf->SetFont('Arial','B',$this->tam_letra);
		$this->pdf->Cell(20,10,"Opciones:",0,0);
		$this->pdf->SetFont('Arial','',$this->tam_letra);
		$this->pdf->Cell(30,10,formatear_opciones_cliente($_SESSION['opciones_busq_clientes']),0,0);
		// Teléfono
		$this->pdf->SetFont('Arial','B',$this->tam_letra);
		$this->pdf->Cell(15,10,"Teléfono:",0,0);
		$this->pdf->SetFont('Arial','',$this->tam_letra);
		$this->pdf->Cell(25,10,$_SESSION['telefono_busq_clientes'],0,0);
		// Agente asignado
		$this->pdf->SetFont('Arial','B',$this->tam_letra);
		$this->pdf->Cell(15,10,"Agente:",0,0);
		$this->pdf->SetFont('Arial','',$this->tam_letra);
		$this->pdf->Cell(50,10,formatear_usuario($_SESSION['agentes_asignados_busq_clientes']),0,0);
		// Tipo
		$this->pdf->SetFont('Arial','B',$this->tam_letra);
		$this->pdf->Cell(15,10,"Tipo:",0,0);
		$this->pdf->SetFont('Arial','',$this->tam_letra);
		$this->pdf->Cell(50,10,formatear_tipo_cliente($_SESSION['tipo_busq_clientes']),0,1);
	}
	
	/**
	 * Imprime la cabecera listado de clientes
	 *
	 *
	 * @return Void
	 */

	function CabeceraListado()
	{
		// Obtenemos la gama de colores a usar
		$gama_colores=InformesClientesPDF::ObtenerGamaColores($this->color);		
		
		$this->pdf->SetFont('Arial','B',$this->tam_letra);
		$this->pdf->SetTextColor(0,0,0);	
		$this->pdf->SetFillColor($gama_colores['cabecera'][0], $gama_colores['cabecera'][1], $gama_colores['cabecera'][2]);
		$this->pdf->SetWidths(array(190));
		$this->pdf->SetAligns(array("C"));

		if(!is_null($this->pos_x))
			$this->pdf->SetX($this->pos_x);
		$this->pdf->Row(array("CLIENTES"),true);	
		$this->pdf->SetFont('Arial','B',$this->tam_letra);
		$this->pdf->SetFillColor($gama_colores['cabecera2'][0], $gama_colores['cabecera2'][1], $gama_colores['cabecera2'][2]);
		$this->pdf->SetWidths(array(40,25,30,40,20,35));
		$this->pdf->SetAligns(array("C","C","C","C","C","C"));

		if(!is_null($this->pos_x))
			$this->pdf->SetX($this->pos_x);
		$this->pdf->Row(array("Nombre completo","Provincia","Municipio","Dirección","Teléfono","Correo"),true);					
	}
	
	/**
	 * Imprime una fila del listado de clientes
	 *
	 * @param [datos]			datos de la fila
	 * @param [contador]		número de fila para imprimir las pares e impares de forma resaltada
	 *
	 * @return void
	 */
	
	function FilaListado($datos,$contador)
	{		
		// Datos
		$array=array($datos['apellidos'] . ", " . $datos['nombre'],formatear_provincia($datos['provincia']),formatear_poblacion($datos['poblacion']),$datos['direccion'],$datos['telefono'],$datos['correo']);
		// Obtenemos la gama de colores a usar
		$gama_colores=InformesClientesPDF::ObtenerGamaColores($this->color);
		// Si con la columna se supera la página
		if($this->pdf->CheckPageBreak($this->pdf->CalculateHeightRow($array)))
		{
			CabeceraListado();
		}
		// Columna normal
		$this->pdf->SetFont('Arial','',$this->tam_letra);
		$this->pdf->SetTextColor(0,0,0);
		if($contador%2 == 0)
			$this->pdf->SetFillColor($gama_colores['fila'][0], $gama_colores['fila'][1], $gama_colores['fila'][2]);
		else	
			$this->pdf->SetFillColor(255, 255, 255);

		$this->pdf->SetWidths(array(40,25,30,40,20,35));
		$this->pdf->SetAligns(array("C","C","C","C","C","C"));

		if(!is_null($this->pos_x))
			$this->pdf->SetX($this->pos_x);
		$this->pdf->Row($array,true);		
	}
	
	/**
	 * Genera una ficha de un cliente con el texto de confidencialidad de datos y lo almacena en un fichero
	 *
	 * @param [id_cliente]		Identificador del cliente
	 * @param [filename]		ruta absoluta del fichero
	 *
	 * @return Devuelve true o false
	 */
	
	function Ficha($id_cliente,$filename='')
	{	
		// Creamos el PDF
		$this->pdf = new PDF_App_Confidencialidad();
		$this->pdf->AddPage();
		// Ficha completa del cliente
		$this->FichaCompleta($id_cliente);
		// Salida del fichero
		return $this->pdf->Output($filename);
	}
	
	/**
	 * Imprime ficha completa de un cliente con todos sus datos asociados
	 *
	 * @param [id_cliente]		Identificador del cliente
	 *
	 * @return void
	 */

	function FichaCompleta($id_cliente)
	{	
		// Título
		$this->pdf->SetFont('Arial','BU',$this->tam_letra);
		$this->pdf->Cell(185,5,"FICHA DEL CLIENTE",0,1,"C");
		$this->pdf->Ln(5);		
		
		// Conexión Base de datos
		$DB = new Model();		
		// Consulta
		$consulta = $DB->Execute("SELECT * FROM clientes WHERE id_cliente=".$id_cliente) or die($DB->ErrorMsg());
		$row_consulta = $consulta->FetchRow();
		$totalRows_consulta = $consulta->RecordCount();
		
		if ($totalRows_consulta != 0)
		{				
			// Sección principal
			$this->CuerpoFicha($row_consulta);
			$this->pdf->Ln(5);
			// Inmuebkes
			$this->pdf->SetFont('Arial','BU',$this->tam_letra);
			$this->pdf->Cell(90,5,"INMUEBLES",0,1);	
			// Listado de inmuebles
			$this->ListadoInmueblesAsociados($id_cliente);
		}
		else
		{			
			$this->pdf->SetFont('Arial','',$this->tam_letra);
			$this->pdf->MultiCell(160,10,"Actualmente no existe ningún cliente con el identificador seleccionado.",0,1);
		}
	}

	/**
	 * Imprime la sección principal de la ficha de un cliente con todos sus datos asociados
	 *
	 * @param [datos]		datos de la ficha
	 *
	 * @return void
	 */
	 
	function CuerpoFicha($datos) 
	{
		// Nombre
		$this->pdf->SetFont('Arial','B',$this->tam_letra);
		$this->pdf->Cell(20,10,"Nombre:",0,0);
		$this->pdf->SetFont('Arial','',$this->tam_letra);
		$this->pdf->Cell(30,10,$datos['nombre'],0,0);
		// Apellidos
		$this->pdf->SetFont('Arial','B',$this->tam_letra);
		$this->pdf->Cell(20,10,"Apellidos:",0,0);
		$this->pdf->SetFont('Arial','',$this->tam_letra);
		$this->pdf->Cell(45,10,$datos['apellidos'],0,0);
		// Dirección
		$this->pdf->SetFont('Arial','B',$this->tam_letra);
		$this->pdf->Cell(20,10,"Dirección:",0,0);
		$this->pdf->SetFont('Arial','',$this->tam_letra);
		$this->pdf->Cell(50,10,$datos['direccion'],0,1);
		// E-mail
		$this->pdf->SetFont('Arial','B',$this->tam_letra);
		$this->pdf->Cell(20,10,"E-mail:",0,0);
		$this->pdf->SetFont('Arial','',$this->tam_letra);
		$this->pdf->Cell(50,10,$datos['correo'],0,0);
		// Teléfono
		$this->pdf->SetFont('Arial','B',$this->tam_letra);
		$this->pdf->Cell(15,10,"Teléfono:",0,0);
		$this->pdf->SetFont('Arial','',$this->tam_letra);
		$this->pdf->Cell(30,10,$datos['telefono'],0,0);
		// NIF
		$this->pdf->SetFont('Arial','B',$this->tam_letra);
		$this->pdf->Cell(15,10,"NIF:",0,0);
		$this->pdf->SetFont('Arial','',$this->tam_letra);
		$this->pdf->Cell(15,10,$datos['nif'],0,1);
		// Provincia
		$this->pdf->SetFont('Arial','B',$this->tam_letra);
		$this->pdf->Cell(20,10,"Provincia:",0,0);
		$this->pdf->SetFont('Arial','',$this->tam_letra);
		$this->pdf->Cell(35,10,formatear_provincia($datos['provincia']),0,0);
		// Municipio
		$this->pdf->SetFont('Arial','B',$this->tam_letra);
		$this->pdf->Cell(20,10,"Municipio:",0,0);
		$this->pdf->SetFont('Arial','',$this->tam_letra);
		$this->pdf->Cell(50,10,formatear_poblacion($datos['poblacion']),0,0);
		// Agente asignado
		$this->pdf->SetFont('Arial','B',$this->tam_letra);
		$this->pdf->Cell(15,10,"Agente:",0,0);
		$this->pdf->SetFont('Arial','',$this->tam_letra);
		$this->pdf->Cell(50,10,formatear_usuario($datos['agente_asignado']),0,1);
		// Observaciones
		$this->pdf->SetFont('Arial','B',$this->tam_letra);
		$this->pdf->Cell(30,10,"Observaciones:",0,0);
		$this->pdf->SetFont('Arial','',$this->tam_letra);
		$this->pdf->MultiCell(155,10,$datos['observaciones'],0,1);
		// OPCIONES
		$this->pdf->SetFont('Arial','BU',$this->tam_letra);
		$this->pdf->Cell(185,5,"OPCIONES",0,1,"C");
		$this->pdf->Ln(5);
		// Desea vender
		$this->pdf->SetFont('Arial','B',$this->tam_letra);
		$this->pdf->Cell(30,10,"Desea vender:",0,0);
		$this->pdf->SetFont('Arial','',$this->tam_letra);
		if($datos['busca_vender']==1)
			$this->pdf->Image(PATHINCLUDE_FRAMEWORK_IMG."publicar.gif",NULL,$this->pdf->GetY()+3,3,3);
		else
			$this->pdf->Image(PATHINCLUDE_FRAMEWORK_IMG."nopublicar.gif",NULL,$this->pdf->GetY()+3,3,3);
		$this->pdf->Cell(10,10,"",0,0);
		// Busca comprar
		$this->pdf->SetFont('Arial','B',$this->tam_letra);
		$this->pdf->Cell(30,10,"Busca comprar:",0,0);
		$this->pdf->SetFont('Arial','',$this->tam_letra);
		if($datos['busca_comprar']==1)
			$this->pdf->Image(PATHINCLUDE_FRAMEWORK_IMG."publicar.gif",NULL,$this->pdf->GetY()+3,3,3);
		else
			$this->pdf->Image(PATHINCLUDE_FRAMEWORK_IMG."nopublicar.gif",NULL,$this->pdf->GetY()+3,3,3);
		$this->pdf->Cell(10,10,"",0,0);
		// Busca comprar
		$this->pdf->SetFont('Arial','B',$this->tam_letra);
		$this->pdf->Cell(30,10,"Desea alquilar:",0,0);
		$this->pdf->SetFont('Arial','',$this->tam_letra);
		if($datos['busca_alquilar']==1)
			$this->pdf->Image(PATHINCLUDE_FRAMEWORK_IMG."publicar.gif",NULL,$this->pdf->GetY()+3,3,3);
		else
			$this->pdf->Image(PATHINCLUDE_FRAMEWORK_IMG."nopublicar.gif",NULL,$this->pdf->GetY()+3,3,3);
		$this->pdf->Cell(10,10,"",0,0);
		// Busca comprar
		$this->pdf->SetFont('Arial','B',$this->tam_letra);
		$this->pdf->Cell(30,10,"Busca un alquiler:",0,0);
		$this->pdf->SetFont('Arial','',$this->tam_letra);
		if($datos['busca_alquiler']==1)
			$this->pdf->Image(PATHINCLUDE_FRAMEWORK_IMG."publicar.gif",NULL,$this->pdf->GetY()+3,3,3);
		else
			$this->pdf->Image(PATHINCLUDE_FRAMEWORK_IMG."nopublicar.gif",NULL,$this->pdf->GetY()+3,3,3);
		$this->pdf->Ln(10);
	}
	
	/**
	 * Imprime la cabacera del listado de inmuebles asociados a un cliente
	 *
	 *
	 * @return void
	 */
	
	function CabeceraListadoInmueblesAsociados()
	{
		// Obtenemos la gama de colores a usar
		$gama_colores=InformesClientesPDF::ObtenerGamaColores($this->color);		
		
		$this->pdf->SetFont('Arial','B',$this->tam_letra);
		$this->pdf->SetTextColor(0,0,0);	
		$this->pdf->SetFillColor($gama_colores['cabecera'][0], $gama_colores['cabecera'][1], $gama_colores['cabecera'][2]);
		$this->pdf->SetWidths(array(190));
		$this->pdf->SetAligns(array("C"));

		if(!is_null($this->pos_x))
			$this->pdf->SetX($this->pos_x);
		$this->pdf->Row(array("INMUEBLES ASOCIADOS"),true);	
		$this->pdf->SetFont('Arial','B',$this->tam_letra);
		$this->pdf->SetFillColor($gama_colores['cabecera2'][0], $gama_colores['cabecera2'][1], $gama_colores['cabecera2'][2]);
		$this->pdf->SetWidths(array(10,30,35,35,60,20));
		$this->pdf->SetAligns(array("C","C","C","C","C","C"));

		if(!is_null($this->pos_x))
			$this->pdf->SetX($this->pos_x);
		$this->pdf->Row(array("Id.","Tipología","Municipio","Zona","Dirección","Metros"),true);					
	}
	
	/**
	 * Imprime una fila del listado de inmuebles asociados a un cliente
	 *
	 * @param [datos]			datos de la fila
	 * @param [contador]		número de fila para imprimir las pares e impares de forma resaltada
	 *
	 * @return void
	 */

	function FilaListadoInmueblesAsociados($datos,$contador)
	{		
		// Datos
		$array=array($datos['id_inmueble'],formatear_tipo($datos['tipo']),formatear_poblacion($datos['poblacion_inmueble']),formatear_zona($datos['zona']),$datos['direccion'],number_format($datos['metros'], 2, ',', '.'));
		// Obtenemos la gama de colores a usar
		$gama_colores=InformesClientesPDF::ObtenerGamaColores($this->color);
		// Si con la columna se supera la página
		if($this->pdf->CheckPageBreak($this->pdf->CalculateHeightRow($array)))
		{
			$this->CabeceraListadoInmueblesAsociados();
		}
		// Columna normal
		$this->pdf->SetFont('Arial','',$this->tam_letra);
		$this->pdf->SetTextColor(0,0,0);
		if($contador%2 == 0)
			$this->pdf->SetFillColor($gama_colores['fila'][0], $gama_colores['fila'][1], $gama_colores['fila'][2]);
		else	
			$this->pdf->SetFillColor(255, 255, 255);

		$this->pdf->SetWidths(array(10,30,35,35,60,20));
		$this->pdf->SetAligns(array("C","C","C","C","C","C"));

		if(!is_null($this->pos_x))
			$this->pdf->SetX($this->pos_x);
		$this->pdf->Row($array,true);		
	}
	
	/**
	 * Imprime el listado de inmuebles asociados a un cliente en formato tabla
	 *
	 * @param [id_cliente]		identificador del cliente
	 *
	 * @return void
	 */

	function ListadoInmueblesAsociados($id_cliente)
	{	
		// Conexión Base de datos
		$DB = new Model();		
		// Consulta
		$consulta = $DB->Execute("SELECT inmuebles.* FROM inmuebles, clientes_inmuebles WHERE inmueble=id_inmueble AND cliente=".$id_cliente) or die($DB->ErrorMsg());
		$row_consulta = $consulta->FetchRow();
		$totalRows_consulta = $consulta->RecordCount();
		
		if ($totalRows_consulta != 0)
		{				
			if(!is_null($this->pos_y))
				$this->pdf->SetY($this->pos_y);
			// Cabecera Tabla
			$this->CabeceraListadoInmueblesAsociados();
			// Filas
			$i=0;
			do
			{
				$this->FilaListadoInmueblesAsociados($row_consulta,$i);
				++$i;
			} while ($row_consulta = $consulta->FetchRow());	
		}
		else
		{			
			if(!is_null($this->pos_x))
				$this->pdf->SetX($this->pos_x);
			$this->pdf->SetFont('Arial','',$this->tam_letra);
			$this->pdf->MultiCell(160,10,"Actualmente no existen inmuebles asociados al cliente actual.",0,1);
		}
	}
}
?>