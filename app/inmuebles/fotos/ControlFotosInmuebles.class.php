<?php
/*
ControlFotosInmuebles.class.php, v 2.4 2013/05/13

ControlFotosInmuebles - Clase gestionar todas las validaciones y operaciones extras realizadas en la sección

Esta librería es propiedad de Ángel Luis Berasuain Ruiz, cualquier uso que pudiera darse
tendrá que estar autorizado expresamente bajo mi supervisión.

Si tienes cualquier sugerencia, duda o comentario, por favor enviámela a:

Ángel Luis Berasuain Ruiz
klaimir@hotmail.com

*/

/* load classes */

require_once(PATHINCLUDE_FRAMEWORK_APP.'Controlador.class.php');

/* load libraries */

// No son necesarias librerías auxiliares

/**
*
* ControlFotosInmuebles
*
* ControlFotosInmuebles - Clase gestionar todas las validaciones y operaciones extras realizadas en la sección
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  ControlFotosInmuebles.class.php, v 2.4 2013/05/13
* @access   public
*/

class ControlFotosInmuebles extends Controlador
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
	 * @param [i]			Número siguiente de error
	 * @param [hayerrores]	Indica si existen errores encontrados
	 * @param [errores]		Array con los diferentes textos de errores
	 *
	 * @return void
	 */

	public static function Validar(&$i,&$hayerrores,&$errores)
	{		
		// Conexión Base de datos
		$DB = new Model();
		
		// Comprobacion de la fotografía asignada
		if (trim($_FILES['fichero']['name']) == "") 
		{
			$hayerrores = true; $errores[$i++] = "No se ha seleccionado ninguna fotografía para ser asignada";
		}
		else
		{
			$nombre_fichero=str_replace(" ","_",$_FILES['fichero']['name']);
			// Comprobamos si el nombre de usuario ya existe en la BD
			$sql_fotos = "SELECT * FROM ficheros_inmuebles WHERE fichero='" . $nombre_fichero . "' AND inmueble='" . $_GET['id'] . "' AND tipo_fichero=2";			
			$fotos = $DB->Execute($sql_fotos) or die($DB->ErrorMsg());
			$num_fotos = $fotos->RecordCount();
			
			if($num_fotos != 0) {$hayerrores = true; $errores[$i++] = "La fotografía seleccionada ya está asignada al inmueble actual";}
		}
		
		if(!$hayerrores)
		{
		 	$tamano_archivo = $_FILES['fichero']['size']; 
			if ($tamano_archivo > MB * MAXTAM_FICHADJUNT) 
			{ 
				$hayerrores  = true;
				$errores[$i++] = "El tamaño máximo para la fotografía es de ". MAXTAM_FICHADJUNT ." Mb";
			}
		}
		
		// Hay que comprobar que el texto del fichero también se ha introducido,
		// ya que en caso contrario, moverá el fichero con datos incorrectos
		if(!$hayerrores)
		{
			if ($_FILES['fichero']['tmp_name'] != '' && !move_uploaded_file($_FILES['fichero']['tmp_name'], PATHINCLUDE_FRAMEWORK_DOC . "inmuebles/inmueble_".$_GET['id']."/fotos/". $nombre_fichero))
			{
				$errores[$i] = "No se ha podido subir el fichero al servidor"; $i++; $hayerrores = true;
			}
		}
		
		// Conversión de datos
		$datos=$_POST;
		$datos['fichero']=$nombre_fichero;
		$datos['inmueble']=$_GET['id'];
		$datos['tipo_fichero']=2;
		return $datos;
	}
}
?>