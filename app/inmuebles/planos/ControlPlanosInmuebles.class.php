<?php
/*
ControlPlanosInmuebles.class.php, v 2.4 2013/05/13

ControlPlanosInmuebles - Clase gestionar todas las validaciones y operaciones extras realizadas en la secci�n

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
* ControlPlanosInmuebles
*
* ControlPlanosInmuebles - Clase gestionar todas las validaciones y operaciones extras realizadas en la secci�n
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  ControlPlanosInmuebles.class.php, v 2.4 2013/05/13
* @access   public
*/

class ControlPlanosInmuebles extends Controlador
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
		// Conexi�n Base de datos
		$DB = new Model();
		
		// Comprobacion de la planograf�a asignada
		if (trim($_FILES['fichero']['name']) == "") 
		{
			$hayerrores = true; $errores[$i++] = "No se ha seleccionado ning�n plano para ser asignado";
		}
		else
		{
			$nombre_fichero=str_replace(" ","_",$_FILES['fichero']['name']);
			// Comprobamos si el nombre de usuario ya existe en la BD
			$sql_planos = "SELECT * FROM ficheros_inmuebles WHERE fichero='" . $nombre_fichero . "' AND inmueble='" . $_GET['id'] . "' AND tipo_fichero=3";			
			$planos = $DB->Execute($sql_planos) or die($DB->ErrorMsg());
			$num_planos = $planos->RecordCount();
			
			if($num_planos != 0) {$hayerrores = true; $errores[$i++] = "El plano seleccionado ya est� asignado al inmueble actual";}
		}
		
		if(!$hayerrores)
		{
		 	$tamano_archivo = $_FILES['fichero']['size']; 
			if ($tamano_archivo > MB * MAXTAM_FICHADJUNT) 
			{ 
				$hayerrores  = true;
				$errores[$i++] = "El tama�o m�ximo para el plano es de ". MAXTAM_FICHADJUNT ." Mb";
			}
		}

		// Si no existe el directorio, se crea
		if(!is_dir(PATHINCLUDE_FRAMEWORK_DOC . "inmuebles/inmueble_".$_GET['id']."/planos/"))
		{
			mkdir(PATHINCLUDE_FRAMEWORK_DOC . "inmuebles/inmueble_".$_GET['id']."/planos/");
		}
		
		// Hay que comprobar que el texto del fichero tambi�n se ha introducido,
		// ya que en caso contrario, mover� el fichero con datos incorrectos
		if(!$hayerrores)
		{
			if ($_FILES['fichero']['tmp_name'] != '' && !move_uploaded_file($_FILES['fichero']['tmp_name'], PATHINCLUDE_FRAMEWORK_DOC . "inmuebles/inmueble_".$_GET['id']."/planos/". $nombre_fichero))
			{
				$errores[$i] = "No se ha podido subir el fichero al servidor"; $i++; $hayerrores = true;
			}
		}
		
		// Conversi�n de datos
		$datos=$_POST;
		$datos['fichero']=$nombre_fichero;
		$datos['inmueble']=$_GET['id'];
		$datos['tipo_fichero']=3;
		return $datos;
	}
}
?>