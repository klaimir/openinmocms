<?php
/*
InformesFichasVisitaClientesPDF.class.php, v 2.4 2013/05/13

InformesFichasVisitaClientesPDF - Clase para crear informes de fichas de visita de clientes en formato PDF

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
* InformesFichasVisitaClientesPDF
*
* Clase para crear informes fichas de visita de clientes en formato PDF
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  InformesFichasVisitaClientesPDF.class.php, v 2.4 2013/05/13
* @access   public
*/

class InformesFichasVisitaClientesPDF extends InformesPDF
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
		// Datos para la fecha
		$datos['nombre']="________________________";
		$datos['apellidos']="___________________________________";
		$datos['nif']="___________";
		$datos['dia_fecha']="____";
		$datos['mes_fecha']="________________";
		$datos['anio_fecha']="______";
		$datos['nombre_completo_agente']="________________________________________";
		$datos['nombre_completo_cliente']="________________________________________________";
		// Array inmuebles
		for($i=0;$i<=4;$i++)
		{
			$listado_inmuebles[$i]['hora']="";
			$listado_inmuebles[$i]['poblacion_inmueble']="";
			$listado_inmuebles[$i]['direccion']="";
		}
		$datos['listado_inmuebles']=$listado_inmuebles;
		// Sección principal
		$this->CuerpoFicha($datos);
		// Salida del PDF
		return $this->pdf->Output();
	}
	
	/**
	 * Imprime una ficha de visita de un cliente y la almacena en la BD
	 *
	 * @param [id_ficha_visita]		Identificador de la ficha de visita
	 * @param [cliente]				identificador del cliente
	 *
	 * @return Devuelve true o false
	 */
	
	function Ficha($id_ficha_visita,$cliente)
	{	
		// Comprobaciones de ficha de visita
		$this->ComprobarFichaVisitaBD($id_ficha_visita,$cliente);
		// Conexión Base de datos
		$DB = new Model();		
		// Consulta ficha
		$consulta = $DB->Execute("SELECT * FROM fichas_visita_cliente WHERE id_ficha_visita=". $id_ficha_visita." AND cliente=". $cliente) or die($DB->ErrorMsg());
		$row_consulta = $consulta->FetchRow();
		// Consulta inmuebles
		$inmuebles = $DB->Execute("SELECT inmuebles.*,inmuebles_fichas_visita_cliente.hora FROM inmuebles, inmuebles_fichas_visita_cliente WHERE inmueble=id_inmueble AND ficha_visita=".$id_ficha_visita." AND cliente=".$cliente." ORDER BY hora") or die($DB->ErrorMsg());
		// Conversión de datos
		$i=0;
		while($inmueble = $inmuebles->FetchRow())
		{
			$listado_inmuebles[$i]['hora']=$inmueble['hora'];
			$listado_inmuebles[$i]['poblacion_inmueble']=formatear_poblacion($inmueble['poblacion_inmueble']);
			$listado_inmuebles[$i]['direccion']=$inmueble['direccion'];
			$i++;
		}
		// Formateo de datos
		$datos=$row_consulta;
		// Datos para la fecha
		$fecha_separada=explode("-",$datos['fecha']);
		$datos['dia_fecha']=$fecha_separada[2];
		$datos['mes_fecha']=obtener_mes((int)$fecha_separada[1]);
		$datos['anio_fecha']=$fecha_separada[0];
		$datos['nombre_completo_agente']=formatear_usuario($datos['agente'],"id_usuario");
		$datos['nombre_completo_cliente']=formatear_cliente($datos['cliente']);
		$datos['listado_inmuebles']=$listado_inmuebles;
		// Sección principal
		$this->CuerpoFicha($datos);
		// Salida del PDF
		return $this->pdf->Output(PATHINCLUDE_FRAMEWORK_DOC. "clientes/cliente_".$cliente."/fichas_visita/ficha_visita_".$id_ficha_visita.".pdf");
	}
	
	/**
	 * Imprime una el cuerpo principal de la ficha de visita de un cliente
	 *
	 * @param [datos]		Datos a imprimir
	 *
	 * @return void
	 */
	 
	function CuerpoFicha($datos) 
	{		
		// Documento
		$this->pdf = new PDF_App_Confidencialidad();
		$this->pdf->SetMostrarLogo(false);
		$this->pdf->SetTopMargin(5);
		$this->pdf->AddPage();
		
		// Primer Título
		$this->pdf->SetFont('Arial','B',13);
		$this->pdf->Cell(190,5,"GC",0,1,"L");
		$this->pdf->Ln(5);
		
		// Segundo Título
		$this->pdf->SetFont('Arial','BU',13);
		$this->pdf->Cell(190,5,NOMBRE_EMPRESA." SERVICIOS INMOBILIARIOS (GLORIA CHAMORRO ROMERO)",0,1,"R");
		$this->pdf->Ln(5);
		
		// Primer párrafo
		$this->pdf->SetFont("arial", "", 8);
		$this->pdf->MultiCell(190,4,"D./Dña ".$datos['nombre']." ".$datos['apellidos']." mayor de edad, con DNI N º ".$datos['nif'].", ha recibido en el día de la fecha información sobre los siguientes inmuebles cuya venta le ha sido ofertada, los cuales, ha visitado acompañado por personal de esta agencia ".$datos['nombre_completo_agente'].".",0,1);
		$this->pdf->Ln(10);
		// Inmuebles Asociados
		$this->color='blanco';
		$this->pos_x=45;
		$this->ListadoInmueblesAsociados($datos['listado_inmuebles']);
		// Segundo párrafo
		$this->pdf->Ln(10);
		$this->pdf->SetFont("arial", "", 8);
		$this->pdf->MultiCell(190,5,"La visita e información recibida no supone compromiso alguno con la Agencia ni con la propiedad de los inmuebles citados, pero D./Dña. ".$datos['nombre_completo_cliente']." se compromete, por la presente, a no realizar ninguna gestión encaminada a la compra o arrendamiento de alguno de ellos sin la intervención de Gloria Chamorro Romero (Gesticádiz) o sus agentes, ya que de lo contrario deberá abonar a ésta el 2% sobre el precio de venta.",0,1);
		$this->pdf->Ln(5);
		
		// Firmas
		$this->pdf->SetFont("arial", "", 8);
		$this->pdf->SetX(90);
		$this->pdf->Cell(100,7,"En Cádiz a ".$datos['dia_fecha']." de ".$datos['mes_fecha']." de ".$datos['anio_fecha'].".",0,1);
		$this->pdf->Ln(10);
		$this->pdf->SetX(20);
		$this->pdf->Cell(70,7,"Conforme:",0,0);
		$this->pdf->Cell(100,7,"La Agencia Gesticádiz: Gloria Chamorro Romero DNI 31.260.553-B,",0,1);
		$this->pdf->SetX(20);
		$this->pdf->Cell(70,7,"El cliente,",0,0);
		$this->pdf->Cell(100,7,"Avenida Ana de Viya, 3. 11009 Cádiz ",0,1);
		$this->pdf->SetX(90);
		$this->pdf->Cell(100,7,"Teléfono y Fax 956 262 425",0,1);
	}
	
	/**
	 * Imprime la cabacera del listado de inmuebles asociados a una ficha de visita
	 *
	 *
	 * @return void
	 */
	
	function CabeceraListadoInmueblesAsociados()
	{
		// Obtenemos la gama de colores a usar
		$gama_colores=InformesFichasVisitaClientesPDF::ObtenerGamaColores($this->color);		
	
		$this->pdf->SetFont('Arial','B',$this->tam_letra);
		$this->pdf->SetFillColor($gama_colores['cabecera2'][0], $gama_colores['cabecera2'][1], $gama_colores['cabecera2'][2]);
		$this->pdf->SetWidths(array(15,30,65));
		$this->pdf->SetAligns(array("C","C","C"));

		if(!is_null($this->pos_x))
			$this->pdf->SetX($this->pos_x);
		$this->pdf->Row(array("HORA","MUNICIPIO","DIRECCIÓN"),true);					
	}
	
	/**
	 * Imprime una fila del listado de inmuebles asociados a una ficha de visita
	 *
	 * @param [datos]			datos de la fila
	 * @param [contador]		número de fila para imprimir las pares e impares de forma resaltada
	 *
	 * @return void
	 */

	function FilaListadoInmueblesAsociados($datos,$contador)
	{		
		// Datos
		$array=array($datos['hora'],$datos['poblacion_inmueble'],$datos['direccion']);
		// Obtenemos la gama de colores a usar
		$gama_colores=InformesFichasVisitaClientesPDF::ObtenerGamaColores($this->color);
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

		$this->pdf->SetWidths(array(15,30,65));
		$this->pdf->SetAligns(array("L","L","L"));

		if(!is_null($this->pos_x))
			$this->pdf->SetX($this->pos_x);
		$this->pdf->Row($array,true);		
	}
	
	/**
	 * Imprime el listado de inmuebles asociados a una ficha de visita
	 *
	 * @param [listado_inmuebles]		Array con el listado de inmuebles a visitar
	 *
	 * @return void
	 */

	function ListadoInmueblesAsociados($listado_inmuebles)
	{	
		if (count($listado_inmuebles) != 0)
		{				
			if(!is_null($this->pos_y))
				$this->pdf->SetY($this->pos_y);
			// Cabecera Tabla
			$this->CabeceraListadoInmueblesAsociados();
			// Filas
			$i=0;
			foreach($listado_inmuebles as $inmueble)
			{
				$this->FilaListadoInmueblesAsociados($inmueble,$i);
				++$i;
			}
		}
		else
		{			
			if(!is_null($this->pos_x))
				$this->pdf->SetX($this->pos_x);
			$this->pdf->SetFont('Arial','',$this->tam_letra);
			$this->pdf->MultiCell(160,10,"Actualmente no existen inmuebles asociados al cliente actual.",0,1);
		}
	}
	
	/**
	 * Comprueba si todas las carpetas necesarias para el almacenamiento físico de la ficha de visita han sido creadas
	 *
	 * @param [id_ficha_visita]			Identificador de la ficha de encargo
	 * @param [cliente]					Identificador del cliente
	 *
	 * @return void
	 */
	 
	private function ComprobarFichaVisitaBD($id_ficha_visita,$cliente)
	{	
		// Si no existen los directorios
		if(!is_dir(PATHINCLUDE_FRAMEWORK_DOC . "clientes/cliente_".$cliente."/"))
		{
			mkdir(PATHINCLUDE_FRAMEWORK_DOC . "clientes/cliente_".$cliente."/");
		}
		if(!is_dir(PATHINCLUDE_FRAMEWORK_DOC . "clientes/cliente_".$cliente."/fichas_visita/"))
		{
			mkdir(PATHINCLUDE_FRAMEWORK_DOC . "clientes/cliente_".$cliente."/fichas_visita/");
		}
		// Borramos la el fichero fisico de la carpeta
		if(file_exists(PATHINCLUDE_FRAMEWORK_DOC. "clientes/cliente_".$cliente."/fichas_visita/ficha_visita_".$id_ficha_visita.".pdf"))
		{
			unlink(PATHINCLUDE_FRAMEWORK_DOC. "clientes/cliente_".$cliente."/fichas_visita/ficha_visita_".$id_ficha_visita.".pdf");
		}
	}
}
?>