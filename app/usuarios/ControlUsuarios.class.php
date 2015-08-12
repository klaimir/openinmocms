<?php
/*
ControlUsuarios.class.php, v 2.4 2013/05/13

ControlUsuarios - Clase gestionar todas las validaciones y operaciones extras realizadas en la secci�n

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
* ControlUsuarios
*
* ControlUsuarios - Clase gestionar todas las validaciones y operaciones extras realizadas en la secci�n
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  ControlUsuarios.class.php, v 2.4 2013/05/13
* @access   public
*/

class ControlUsuarios extends Controlador
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
	 * Comprueba que es posible borrar un usuario
	 *
	 * @param [id_usuario]		Identificador del usuario
	 *
	 * @return true or false
	 */

	public static function ComprobarBorrar($id_usuario)
	{		
		// Array de errores
		$array_errores=NULL;
		// Consulta de identificador de usuario
		require_once(PATHINCLUDE_FRAMEWORK_MODELOS.'Usuarios.class.php');
		$usuario = new ModelUsuarios();
		$datos_usuario=$usuario->ObtenerDatosUsuario("id_usuario",$id_usuario);
		// Comprobaci�n de si existe usuario
		if($datos_usuario=="")
			$array_errores[]=0; 
		else
			$id_usuario=$datos_usuario['id_usuario'];
		// Comprobaci�n de agentes en certificaciones energ�ticas
		$num_certificaciones_energeticas_agente=ControlUsuarios::ObtenerNumCertificacionesEnergeticasAgente($id_usuario);
		if ($num_certificaciones_energeticas_agente>0) { $array_errores[]=-1; }
		// Comprobaci�n de agentes en contratos de arrendamiento
		$num_contratos_arrendamiento_agente=ControlUsuarios::ObtenerNumContratosArrendamientoAgente($id_usuario);
		if ($num_contratos_arrendamiento_agente>0) { $array_errores[]=-2; }
		// Si todo fue bien
		return $array_errores;
	}
	
	/**
	 * Comprueba las referencias para realizar determinadas acciones
	 *
	 * @param [id]			Identificador a comprobar
	 * @param [i]			N�mero siguiente de error
	 * @param [hayerrores]	Indica si existen errores encontrados
	 * @param [errores]		Array con los diferentes textos de errores
	 *
	 * @return void
	 */
	 
	public static function ComprobarReferencias($id,&$i,&$hayerrores,&$errores)
	{		
		// Se invoca la comprobaci�n de borrar de usuarios
		$array_errores=ControlUsuarios::ComprobarBorrar($id);
		// Usuario no existe
		if(in_array(0,$array_errores)){ $hayerrores = true; $errores[$i++] = "El usuario seleccionado no existe"; }
		// Certificaci�n energ�tica
		if(in_array(-1,$array_errores)){ $hayerrores = true; $errores[$i++] = "El usuario seleccionado ha creado alg�n aviso de certificaci�n energ�tica"; }
		// Contratos de arrendamiento
		if(in_array(-2,$array_errores)){ $hayerrores = true; $errores[$i++] = "El usuario seleccionado ha creado alg�n contrato de arrendamiento de alg�n inmueble"; }
	}
	
	/**
	 * Obtiene el n�mero de avisos de certificaciones energ�ticas generados por el usuario indicado
	 *
	 * @param [id_usuario]		Identificador del usuario
	 *
	 * @return n�mero de avisos de certificaciones energ�ticas generados
	 */

	public static function ObtenerNumCertificacionesEnergeticasAgente($id_usuario)
	{		
		require_once(PATHINCLUDE_FRAMEWORK_MODELOS.'CertificacionesEnergeticasCliente.class.php');
		$certificacion_energetica = new ModelCertificacionesEnergeticasCliente();
		$certificaciones_energeticas_agente=$certificacion_energetica->ObtenerCertificacionesAgente($id_usuario);
		return $certificaciones_energeticas_agente->RecordCount();
	}
	
	/**
	 * Obtiene el n�mero de contratos de arrendamiento generados por el usuario indicado
	 *
	 * @param [id_usuario]		Identificador del usuario
	 *
	 * @return n�mero de contratos de arrendamiento generados
	 */

	public static function ObtenerNumContratosArrendamientoAgente($id_usuario)
	{		
		require_once(PATHINCLUDE_FRAMEWORK_MODELOS.'ContratosArrendamientoInmueble.class.php');
		$contrato_arrendamiento = new ModelContratosArrendamientoInmueble();
		$contratos_arrendamiento_agente=$contrato_arrendamiento->ObtenerContratosAgente($id_usuario);
		return $contratos_arrendamiento_agente->RecordCount();
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
		if(isset($_GET['usuario']))
			return ControlUsuarios::validar_usuario_editar($i,$hayerrores,$errores);
		else
			return ControlUsuarios::validar_usuario_insertar($i,$hayerrores,$errores);
	}
	
	/**
	 * Valida los datos de entrada desde la interfaz para la inserci�n
	 *
	 * @param [i]			N�mero siguiente de error
	 * @param [hayerrores]	Indica si existen errores encontrados
	 * @param [errores]		Array con los diferentes textos de errores
	 *
	 * @return array de datos validados y formateados
	 */
	
	public static function validar_usuario_insertar(&$i,&$hayerrores,&$errores)
	{
		// Conexi�n Base de datos
		$DB = new Model();
		
		// Comprobacion del resto de errores (texto, fecha y numericos)
		if (!strcmp($_POST['nombre'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido el nombre del usuario";}		
		if (!strcmp($_POST['apellidos'], '')) {$hayerrores = true; $errores[$i++] = "No se han introducido los apellidos del usuario";}
		if (!strcmp($_POST['usuario'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido el usuario para la cuenta";}
		else
		{
			// Comprobamos si el nombre de usuario ya existe en la BD
			$sql_usuarios = "SELECT * FROM usuarios WHERE nick='" . $_POST['usuario'] . "'";
			$usuarios = $DB->Execute($sql_usuarios) or die($DB->ErrorMsg());
			$num_usuarios = $usuarios->RecordCount();
			
			if($num_usuarios != 0) {$hayerrores = true; $errores[$i++] = "El nombre de usuario indicado ya existe en el sistema";}
		}
		if (trim($_POST['nif']) != "") 
		{
			// Validamos NIF y NIE
			$validacion_nif=valida_nif($_POST['nif']);
			// Si no es un NIF o un NIE v�lido indicamos el error
			if (!($validacion_nif == 1 || $validacion_nif == 3))
			{
				$hayerrores = true;
				$errores[$i++] = "El NIF del usuario introducido no es v&aacute;lido";					
			}
			else
			{
				// Comprobamos si el nif de usuario ya existe en la BD
				$sql_usuarios = "SELECT * FROM usuarios WHERE nif='" . $_POST['nif'] . "'";
				$usuarios = $DB->Execute($sql_usuarios) or die($DB->ErrorMsg());
				$num_usuarios = $usuarios->RecordCount();
				
				if($num_usuarios != 0) {$hayerrores = true; $errores[$i++] = "El NIF de usuario indicado ya existe en el sistema";}
			}
		}
		else
		{
			$hayerrores = true; $errores[$i++] = "No se ha introducido el NIF del usuario";
		}
		if (!strcmp($_POST['password'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido la constrase�a para la cuenta";}
		if (!strcmp($_POST['confirma'], '')) {$hayerrores = true; $errores[$i++] = "No se ha confirmado la constrase�a para la cuenta";}
		if ($_POST['password'] != $_POST['confirma']) {$hayerrores = true; $errores[$i++] = "El password y su confirmacion no coinciden";}
		
		if (!strcmp($_POST['correo'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido la direcci�n de correo electr�nico";}
		if(strcmp($_POST['correo'], ''))
		{
			if(validarCorreo($_POST['correo'])==0)
			{
				$hayerrores = true; 
				$errores[$i++] = "La direcci�n de correo electr�nico no tiene un formato v�lido";	
			}
		}
		
		// Conversi�n de datos
		$datos_formateados=$_POST;
		$datos_formateados['nick']=$_POST['usuario'];
		$datos_formateados['password']=md5($_POST['password']);
		$datos_formateados['fecha_alta']=date("Y-m-d");
		$datos_formateados['perfil']="administrador";
		return $datos_formateados;
	}
	
	/**
	 * Valida los datos de entrada desde la interfaz para la edici�n
	 *
	 * @param [i]			N�mero siguiente de error
	 * @param [hayerrores]	Indica si existen errores encontrados
	 * @param [errores]		Array con los diferentes textos de errores
	 *
	 * @return array de datos validados y formateados
	 */
	 
	public static function validar_usuario_editar(&$i,&$hayerrores,&$errores)
	{
		// Conexi�n Base de datos
		$DB = new Model();

		// Comprobacion del resto de errores (texto, fecha y numericos)
		if($_POST['cuenta_activa']) $cuenta_activa=1; else $cuenta_activa=0;		
		if (!strcmp($_POST['nombre'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido el nombre del usuario";}		
		if (!strcmp($_POST['apellidos'], '')) {$hayerrores = true; $errores[$i++] = "No se han introducido los apellidos del usuario";}
		if ($_POST['password'] != $_POST['confirma']) {$hayerrores = true; $errores[$i++] = "El password y su confirmacion no coinciden";}				
		if (!strcmp($_POST['correo'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido la direcci�n de correo electr�nico";}
		if(strcmp($_POST['correo'], ''))
		{
			if(validarCorreo($_POST['correo'])==0)
			{
				$hayerrores = true; 
				$errores[$i++] = "La direcci�n de correo electr�nico no tiene un formato v�lido";	
			}
		}
		
		// Comprueba el usuario
		if (trim($_POST['usuario']) == "") {$hayerrores = true; $errores[$i++] = "No se ha introducido el identificador del usuario";}
		else
		{
			if($_POST['usuario']!=$_GET['usuario'])
			{
				// Comprobamos si el identificador de usuario ya existe en la BD
				$sql_usuarios = "SELECT * FROM usuarios WHERE nick='" . $_POST['usuario'] . "'";
				$usuarios = $DB->Execute($sql_usuarios) or die($DB->ErrorMsg());
				$num_usuarios = $usuarios->RecordCount();
				
				if($num_usuarios != 0) {$hayerrores = true; $errores[$i++] = "El identificador de usuario indicado ya existe en el sistema";}
			}
		}
		
		if (trim($_POST['nif']) != "") 
		{
			// Validamos NIF y NIE
			$validacion_nif=valida_nif($_POST['nif']);
			// Si no es un NIF o un NIE v�lido indicamos el error
			if (!($validacion_nif == 1 || $validacion_nif == 3))
			{
				$hayerrores = true;
				$errores[$i++] = "El NIF del usuario introducido no es v&aacute;lido";					
			}
			else
			{
				if($_POST['nif']!=$_POST['nif_anterior'])
				{
					// Comprobamos si el nif de usuario ya existe en la BD
					$sql_usuarios = "SELECT * FROM usuarios WHERE nif='" . $_POST['nif'] . "'";
					$usuarios = $DB->Execute($sql_usuarios) or die($DB->ErrorMsg());
					$num_usuarios = $usuarios->RecordCount();
					
					if($num_usuarios != 0) {$hayerrores = true; $errores[$i++] = "El NIF de usuario indicado ya existe en el sistema";}
				}
			}
		}
		else
		{
			$hayerrores = true; $errores[$i++] = "No se ha introducido el NIF del usuario";
		}
		
		// Conversi�n de datos
		$datos_formateados=$_POST;
		if($_POST['cuenta_activa'])	$datos_formateados['cuenta_activa']=1; else $datos_formateados['cuenta_activa']=0;
		$datos_formateados['nick']=$datos_formateados['usuario'];
		// si las claves est�n vac�as no se cambia la clave, en caso contrario s�
		if($datos_formateados['password'] != "" && $datos_formateados['confirma'] != "")
			$datos_formateados['password']=md5($datos_formateados['password']);	
		return $datos_formateados;
	}
}
?>