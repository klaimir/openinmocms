<?php
/*
Session.class.php, v 2.4 2013/05/13

Session - Clase gestionar todas las peticiones y operaciones relacionadas con los sesiones registradas

Esta librería es propiedad de Ángel Luis Berasuain Ruiz, cualquier uso que pudiera darse
tendrá que estar autorizado expresamente bajo mi supervisión.

Si tienes cualquier sugerencia, duda o comentario, por favor enviámela a:

Ángel Luis Berasuain Ruiz
klaimir@hotmail.com

*/

/* load classes */

// No son necesarias clases auxiliares

/* load libraries */

require_once(PATHINCLUDE_FRAMEWORK_LIBRERIAS.'StaticSession.class.php');

/**
*
* Session
*
* Clase gestionar todas las peticiones y operaciones relacionadas con las sesiones registradas
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  Session.class.php, v 2.4 2013/05/13
* @access   public
*/

class Session
{
	var $static_sesion;
	
	/**
	 * Constructor
	 *
	 */
	
	function __construct()
    {
		// Comienza o restaura la sesión
		$this->static_sesion = &StaticSession::start();
		// check if we done that 
		if ($this->static_sesion->initialised == FALSE) 
			$this->static_sesion->initialize();
    }
	
	/**
	 * Establece los datos de sesión
	 *
	 * @param [datos]		datos de sesión a través del objeto Usuario
	 *
	 * @return void
	 */
	 
	function EstablecerDatosSesion($usuario)
    {  
		$this->static_sesion->set('id_usuario', $usuario->id_usuario); 
		$this->static_sesion->set('usu', $usuario->nick); 
		$this->static_sesion->set('nom', $usuario->nombre); 
		$this->static_sesion->set('apell', $usuario->apellidos); 
		$this->static_sesion->set('perfil', $usuario->perfil);
    }
	
	/**
	 * Elimina los datos de sesión actuales
	 *
	 *
	 * @return void
	 */
	 
	function DestruirSesion()
    {  
		$this->static_sesion->drop();  
    }
	
	/**
	 * Comprueba si la sesión de usuario ha sido iniciada
	 *
	 *
	 * @return true or false
	 */

	public function SesionIniciada()
	{
		if(!isset($_SESSION['tiempo_ultimo_evento']))
		{
			$_SESSION['tiempo_ultimo_evento']=time();
			$diferencia_tiempo_ultimo_evento=0;			
		}
		else
		{
			// Se calcula el tiempo de sesión
			$diferencia_tiempo_ultimo_evento=time()-$_SESSION['tiempo_ultimo_evento'];
		}
		// Si se sobrepasa el tiempo por defecto
		if(TIEMPO_ACCESO_SESION<$diferencia_tiempo_ultimo_evento)
		{
		?>
			<SCRIPT LANGUAGE="JavaScript">
				setTimeout("location.href='<?php echo  $_SESSION['rutaraiz'];?>app/login/desconectar.php'", 1);
			</SCRIPT>
		<?php
		}
		else
		{
			$_SESSION['tiempo_ultimo_evento']=time();
		}
		
		if ($this->static_sesion->get('perfil')=="administrador")
			return true;
		else
			return false;		
	}
	
	/**
	 * Comprueba si es posible acceder a las zonas privadas del sistema
	 *
	 *
	 * @return void
	 */

	public function ComprobarRestriccionAcceso()
	{
		$MM_restrictGoTo = $_SESSION['rutaraiz']."app/login/noacceso.php";
		
		$sesion_iniciada=$this->SesionIniciada();

		if(!$sesion_iniciada)
		{
		?>
			<SCRIPT language="javascript">
				setTimeout("location.href='<?php echo  $MM_restrictGoTo;?>'", 0);
			</SCRIPT>			
		<?php
			exit;
		}
		
	}
	
	/**
	 * Comprueba si un determinado usuario tiene permiso de acceso acorde los valores indicados
	 *
	 *
	 * @return true or false
	 */
	 
	public static function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) 
	{ 
		// For security, start by assuming the visitor is NOT authorized. 
		$isValid = False; 
		
		// When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
		// Therefore, we know that a user is NOT logged in if that Session variable is blank. 
		if (!empty($UserName)) 
		{ 
			// Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
			// Parse the strings into arrays. 
			$arrUsers = Explode(",", $strUsers); 
			$arrGroups = Explode(",", $strGroups); 
			if (in_array($UserName, $arrUsers)) 
			{ 
				$isValid = true; 
			} 
		// Or, you may restrict access to only certain users based on their username. 
			if (in_array($UserGroup, $arrGroups)) 
			{ 
				$isValid = true; 
			} 
			if (($strUsers == "") && true) 
			{ 
				$isValid = true; 
			} 
		} 

		return $isValid;
	}
}
?>