<?php
/*
ControlLogin.class.php, v 2.4 2013/05/13

ControlLogin - Clase gestionar todas las validaciones y operaciones extras realizadas en la sección

Esta librería es propiedad de Ángel Luis Berasuain Ruiz, cualquier uso que pudiera darse
tendrá que estar autorizado expresamente bajo mi supervisión.

Si tienes cualquier sugerencia, duda o comentario, por favor enviámela a:

Ángel Luis Berasuain Ruiz
klaimir@hotmail.com

*/

/* load classes */

require_once(PATHINCLUDE_FRAMEWORK_APP.'Controlador.class.php');

/* load libraries */

require_once(PATHINCLUDE_FRAMEWORK_LIBRERIAS.'Translator.class.php');

/**
*
* ControlLogin
*
* ControlLogin - Clase gestionar todas las validaciones y operaciones extras realizadas en la sección
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  ControlLogin.class.php, v 2.4 2013/05/13
* @access   public
*/

class ControlLogin extends Controlador
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
	 * Valida los datos de entrada desde la interfaz de recordar una password
	 *
	 * @param [i]			Número siguiente de error
	 * @param [hayerrores]	Indica si existen errores encontrados
	 * @param [errores]		Array con los diferentes textos de errores
	 *
	 * @return void
	 */

	public static function ValidarRecordarPassword(&$i,&$hayerrores,&$errores)
	{		
		// Traductor
		$translator = Translator::getInstance();
		// Campos
		$textos['usuario']=$translator->TraducirTexto("No se ha introducido el identificador de usuario");
		$textos['usuario2']=$translator->TraducirTexto("El identificador de usuario indicado no existe en el sistema");
		$textos['correo']=$translator->TraducirTexto("El usuario introducido no posee dirección de e-mail");
		
		// Conexión Base de datos
		$DB = new Model();
		
		if (!strcmp($_POST['usuario'], '')) {$hayerrores = true; $errores[$i++] = $textos['usuario'];}
		else
		{
			// Comprobamos si el nombre de usuario ya existe en la BD
			$sql_usuarios = "SELECT * FROM usuarios WHERE nick='" . $_POST['usuario'] . "'";
			$usuarios = $DB->Execute($sql_usuarios) or die($DB->ErrorMsg());
			$num_usuarios = $usuarios->RecordCount();
			
			if($num_usuarios == 0) {$hayerrores = true; $errores[$i++] = $textos['usuario2'];}
		}
		
		// Si no hay errores
		if(!$hayerrores)
		{
			$sql_usuarios = "SELECT correo FROM usuarios WHERE nick='".$_POST['usuario']."'";
			$atribs = $DB->Execute($sql_usuarios) or die($DB->ErrorMsg());
			$atrib = $atribs->FetchRow();
			$num_atribs = $atribs->RecordCount();			
			
			if($num_atribs==0 || $atrib['correo']=="" || is_null($atrib['correo']))
			{
				$hayerrores = true; 
				$errores[$i++] = $textos['correo'];	
			}			
		}
		
		// Conversión de datos
		$datos_formateados=$_POST;
		$datos_formateados['correo']=$atrib['correo'];
		$datos_formateados['nick']=$datos_formateados['usuario'];
		return $datos_formateados;
	}
	
	/**
	 * Valida los datos de entrada desde la interfaz de login
	 *
	 * @param [i]			Número siguiente de error
	 * @param [hayerrores]	Indica si existen errores encontrados
	 * @param [errores]		Array con los diferentes textos de errores
	 *
	 * @return void
	 */

	public static function ValidarAccesoUsuario(&$i,&$hayerrores,&$error)
	{		
		// Traductor
		$translator = Translator::getInstance();
		// Campos
		$textos['usuario']=$translator->TraducirTexto("Los datos introducidos no son correctos");
		$textos['password']=$translator->TraducirTexto("Los datos introducidos no son correctos");
		$textos['login']=$translator->TraducirTexto("Los datos introducidos no son correctos");
		$textos['login2']=$translator->TraducirTexto("Su cuenta de usuario ha sido inhabilitada. Póngase en contacto con el administrador del sitio si desea acceder nuevamente al sistema.");
		$textos['login3']=$translator->TraducirTexto("El usuario introducido no existe.");
		// Comprobacion del resto de errores (texto, fecha y numericos)
		if (!strcmp($_POST['usuario'], '')) {$hayerrores = true; $error = $textos['usuario'];}
		if (!strcmp($_POST['password'], '')) {$hayerrores = true; $error = $textos['password'];}
			
		if (!isset($_SESSION)) 
		{
			session_start();
		}
		
		$loginFormAction = $_SERVER['PHP_SELF'];
			
		if (isset($_GET['accesscheck'])) 
		{
			$_SESSION['PrevUrl'] = $_GET['accesscheck'];
		}
		
		if (isset($_POST['usuario'])) 
		{
			// Encriptación de la clave con algoritmo MD5
			$loginUsername=$_POST['usuario'];		
			$password=md5($_POST['password']);
			// Rutas de acceso
			$MM_fldUserAuthorization = "";
			$MM_redirectLoginSuccess = "../acceso/index.php";
			$MM_redirectLoginFailed = "index.php";
			$MM_redirecttoReferrer = false;
			// Datos para Login
			$usuario = new ModelUsuarios();
			$usuario->nick=$loginUsername;
			$usuario->password=$password;
			// Comprobar Login
			if ($usuario->ComprobarAcceso()) 
			{
				// Realizamos el login
				$usuario->Login();
				// Inicializamos el idioma a español
				$translator->SetLangPair('es|es');
				// Dirección de acceso con éxito
				return $MM_redirectLoginSuccess;
			}
			else 
			{
				// si la cuenta está activa se ha equivocado al introducir los datos
				$sql_usuarios_acceso = "SELECT * FROM usuarios WHERE nick='".$loginUsername."'";
				// Consulta
				$usuarios_acceso = $usuario->Execute($sql_usuarios_acceso) or die($usuario->ErrorMsg());
				$usuario_acceso = $usuarios_acceso->FetchRow();
				$num_usuarios_acceso = $usuarios_acceso->RecordCount();
				if($num_usuarios_acceso!=0)
				{				
					if ($usuario_acceso['cuenta_activa']) 
					{
						$hayerrores = true;
						$error = $textos['login'];
					}
					// En caso contrario, su cuenta ha sido deshabilitada y debe de ser informado
					else
					{
						$hayerrores = true;
						$error = $textos['login2'];
					}
				}
				// En caso contrario, su cuenta ha sido deshabilitada y debe de ser informado
				else
				{
					$hayerrores = true;
					$error = $textos['login3'];
				}
			}
		}
		
		// Conversión de datos
		$datos_formateados=$_POST;
		$datos_formateados['correo']=$atrib['correo'];
		$datos_formateados['nick']=$datos_formateados['usuario'];		
	}
}
?>