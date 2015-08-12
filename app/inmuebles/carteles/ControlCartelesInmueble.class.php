<?php
/*
ControlCarteles.class.php, v 2.4 2013/05/13

ControlCarteles - Clase gestionar todas las validaciones y operaciones extras realizadas en la secci�n

Esta librer�a es propiedad de �ngel Luis Berasuain Ruiz, cualquier uso que pudiera darse
tendr� que estar autorizado expresamente bajo mi supervisi�n.

Si tienes cualquier sugerencia, duda o comentario, por favor envi�mela a:

�ngel Luis Berasuain Ruiz
klaimir@hotmail.com

*/

/* load classes */

require_once(PATHINCLUDE_FRAMEWORK_APP.'Controlador.class.php');

/* load libraries */

// No son necesarias librer�as auxiliares

/**
*
* ControlCarteles
*
* ControlCarteles - Clase gestionar todas las validaciones y operaciones extras realizadas en la secci�n
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  ControlCarteles.class.php, v 2.4 2013/05/13
* @access   public
*/

class ControlCarteles extends Controlador
{	
	/**
	 * Constructor
	 *
	 */
	
	function __construct()
    {  
		parent::__construct();
    }
	
	/**
	 * Valida los datos de entrada desde la interfaz
	 *
	 * @param [i]			N�mero siguiente de error
	 * @param [hayerrores]	Indica si existen errores encontrados
	 * @param [errores]		Array con los diferentes textos de errores
	 *
	 * @return void
	 */

	public static function Validar(&$i,&$hayerrores,&$errores)
	{
		// Cartel
		if (!strcmp($_POST['tipo_cartel'], '')) {$hayerrores = true; $errores[$i++] = "No se ha seleccionado el tipo de cartel";}
		if (!strcmp($_POST['disposicion_fotos'], '')) {$hayerrores = true; $errores[$i++] = "No se ha seleccionado las disposici�n de las fotograf�as";}
		if (!strcmp($_POST['opcion_vivienda'], '')) {$hayerrores = true; $errores[$i++] = "No se ha seleccionado la opci�n del cartel";}
		// Comprobacion del m�ximo tama�o de anchura
		if (trim($_POST['max_anchura']) == "") 
		{
			$hayerrores = true; $errores[$i++] = "No se han introducido los mm para la anchura m�xima de las fotograf�as";
		}
		else
		{
			$max_anchura_numero_formateado=formatear_numero($_POST['max_anchura']);
			if(!is_numeric($max_anchura_numero_formateado))
			{
				$hayerrores = true; $errores[$i++] = "El formato introducido para la anchura m�xima de las fotograf�as no es correcto";
			}
			else
			{
				if($max_anchura_numero_formateado<=0)
				{
					$hayerrores = true; $errores[$i++] = "Debe introducir un valor positivo para la anchura m�xima de las fotograf�as";
				}
				else
				{
					if($max_anchura_numero_formateado>190)
					{
						$hayerrores = true; $errores[$i++] = "El valor m�ximo para la anchura m�xima de las fotograf�as es de 190 mm";
					}
				}
			}
		}
		// Comprobacion del m�ximo tama�o de altura
		if (trim($_POST['max_altura']) == "") 
		{
			$hayerrores = true; $errores[$i++] = "No se han introducido los mm para la altura m�xima de las fotograf�as";
		}
		else
		{
			$max_altura_numero_formateado=formatear_numero($_POST['max_altura']);
			if(!is_numeric($max_altura_numero_formateado))
			{
				$hayerrores = true; $errores[$i++] = "El formato introducido para la altura m�xima de las fotograf�as no es correcto";
			}
			else
			{
				if($max_altura_numero_formateado<=0)
				{
					$hayerrores = true; $errores[$i++] = "Debe introducir un valor positivo para la altura m�xima de las fotograf�as";
				}
				else
				{
					if($max_altura_numero_formateado>150)
					{
						$hayerrores = true; $errores[$i++] = "El valor m�ximo para la altura m�xima de las fotograf�as es de 150 mm";
					}
				}
			}
		}
		// Vivienda
		if (!strcmp($_POST['direccion'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido la direcci�n de la vivienda";}
		
		// Conversi�n de datos
		$datos=$_POST;
		
		$datos['precio_compra']=formatear_numero($_POST['precio_compra']);
		$datos['precio_alquiler']=formatear_numero($_POST['precio_alquiler']);
		
		if ($datos['opcion_vivienda']==1 && $datos['precio_compra']==0)
		{
			$hayerrores = true; $errores[$i++] = "El inmueble seleccionado no dispone de precio de compra";
		}
		
		if ($datos['opcion_vivienda']==2 && $datos['precio_alquiler']==0)
		{
			$hayerrores = true; $errores[$i++] = "El inmueble seleccionado no dispone de precio de alquiler";
		}
		
		// Conexi�n Base de datos
		$DB = new Model();
		// Se almacenan todas las fotos seleccionadas
		$sql_fotos = "SELECT * FROM ficheros_inmuebles WHERE inmueble = ".$datos['inmueble']." AND tipo_fichero=2";
		$fotos = $DB->Execute($sql_fotos) or die($DB->ErrorMsg());
		$foto = $fotos->FetchRow();
		$num_fotos = $fotos->RecordCount();
		// Se inicializa el array
		$array_fotos_selec=array();
		// Se comprueban las fotos seleccionadas
		if($num_fotos!=0)
		{
			$cont_fotos=0;			
			do
			{
				$nombre_check="foto_".$foto['id_fichero'];
				if($datos[$nombre_check])
				{
					$array_fotos_selec[$cont_fotos]=$foto['id_fichero'];
					$cont_fotos++;
				}
			} while ($foto = $fotos->FetchRow());
		}
		// S�lo se admiten dos fotograf�as
		if($cont_fotos>=3)
		{
			$hayerrores = true; $errores[$i++] = "S�lo puede seleccionar dos fotograf�as como m�ximo";
		}
		// Se almacena el resultado
		$datos['fotos_selec']=$array_fotos_selec;		
		$datos['fecha']=cambiafecha_form($_POST['fecha']);
		$datos['metros']=formatear_numero($_POST['metros']);
		$datos['precio_compra']=formatear_numero($_POST['precio_compra']);
		$datos['precio_alquiler']=formatear_numero($_POST['precio_alquiler']);
		$datos['max_anchura']=formatear_numero($_POST['max_anchura']);
		$datos['max_altura']=formatear_numero($_POST['max_altura']);
		// Se calcula el enlace para el c�digo qr
		$datos['enlace_web']=$_SESSION['rutaraiz']."app/buscador/ver_datos_adicionales.php?id=".$datos['inmueble'];
		
		return $datos;
	}
		
	/**
	 * Comprueba que es posible realizar el cartel de un determinado inmueble
	 *
	 * @param [id_inmueble]			Identificador del inmueble
	 *
	 * @return true or false
	 */

	public static function ComprobarAccesoGenerar($id_inmueble)
	{		
		require_once(PATHINCLUDE_FRAMEWORK_MODELOS.'Inmuebles.class.php');
		// Datos inmueble
		$inmueble = new ModelInmuebles();
		$inmueble->SetDataObject($id_inmueble);
		// Si no est� en venta
		if($inmueble->estado=="cerrado")
			return -1;
		
		return 1;
	}
	
	/**
	 * Comprueba que es posible editar el cartel de un determinado inmueble
	 *
	 * @param [id_cartel]		Identificador del cartel
	 * @param [inmueble]			Identificador del inmueble
	 *
	 * @return true or false
	 */

	public static function ComprobarAccesoEditar($id_cartel,$inmueble)
	{
		// Si no se puede generar
		return ControlCarteles::ComprobarAccesoGenerar($inmueble);
	}
	
	/**
	 * Comprueba que es posible borrar el cartel de un determinado inmueble
	 *
	 * @param [id_cartel]		Identificador del cartel
	 * @param [inmueble]			Identificador del inmueble
	 *
	 * @return true or false
	 */

	public static function ComprobarAccesoBorrar($id_cartel,$inmueble)
	{
		return 1;
	}
}
?>