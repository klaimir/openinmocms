<?php
/*
ControlCertificacionesEnergeticas.class.php, v 2.4 2013/05/13

ControlCertificacionesEnergeticas - Clase gestionar todas las validaciones y operaciones extras realizadas en la sección

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
* ControlCertificacionesEnergeticas
*
* ControlCertificacionesEnergeticas - Clase gestionar todas las validaciones y operaciones extras realizadas en la sección
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  ControlCertificacionesEnergeticas.class.php, v 2.4 2013/05/13
* @access   public
*/

class ControlCertificacionesEnergeticas extends Controlador
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
		// Arrendador
		if (!strcmp($_POST['nombre'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido el nombre del cliente";}
		if (!strcmp($_POST['apellidos'], '')) {$hayerrores = true; $errores[$i++] = "No se han introducido los apellidos del cliente";}
		if (!strcmp($_POST['provincia'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido la provincia del cliente";}	
		if (!strcmp($_POST['poblacion'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido el municipio del cliente";}
		if (!strcmp($_POST['domicilio'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido el domicilio del cliente";}
		
		if (trim($_POST['nif']) != "") 
		{
			// Validamos NIF y NIE
			$validacion_nif=valida_nif($_POST['nif']);
			// Si no es un NIF o un NIE válido indicamos el error
			if (!($validacion_nif == 1 || $validacion_nif == 3))
			{
				$hayerrores = true;
				$errores[$i++] = "El NIF del cliente introducido no es v&aacute;lido";					
			}
		}
		else
		{
			$hayerrores = true; $errores[$i++] = "No se ha introducido el NIF del cliente";
		}
		
		// Vivienda
		if (!strcmp($_POST['direccion_vivienda'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido la dirección de la vivienda";}		
				
		// Contrato
		if (!strcmp($_POST['estado'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido el estado del aviso";}	
				
		// Agente
		if (!strcmp($_POST['nombre_agente'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido el nombre del agente";}
		if (!strcmp($_POST['apellidos_agente'], '')) {$hayerrores = true; $errores[$i++] = "No se ha introducido los apellidos del agente";}
		
		if (trim($_POST['nif_agente']) != "") 
		{
			// Validamos NIF y NIE
			$validacion_nif=valida_nif($_POST['nif_agente']);
			// Si no es un NIF o un NIE válido indicamos el error
			if (!($validacion_nif == 1 || $validacion_nif == 3))
			{
				$hayerrores = true;
				$errores[$i++] = "El NIF del agente introducido no es v&aacute;lido";					
			}
		}
		else
		{
			$hayerrores = true; $errores[$i++] = "No se ha introducido el NIF del agente";
		}
		
		// Conversión de datos
		$datos=$_POST;
		
		$datos['fecha']=cambiafecha_form($_POST['fecha']);
		
		return $datos;
	}
	
	/**
	 * Comprueba que es posible realizar el aviso de certificación energética de un determinado inmueble
	 *
	 * @param [id_inmueble]		Identificador del inmueble
	 * @param [id_cliente]		Identificador del cliente
	 *
	 * @return true or false
	 */

	public static function ComprobarAccesoGenerarContrato($id_inmueble,$id_cliente)
	{		
		// Si no tiene ficha de encargo
		require_once(PATHINCLUDE_FRAMEWORK_MODELOS.'FichasEncargoCliente.class.php');
		// Datos de fichas de encargo
		$ficha_encargo = new ModelFichasEncargoCliente();
		$fichas_encargo_obtenidas=$ficha_encargo->ObtenerFichasInmuebleCliente($id_inmueble,$id_cliente);
		$num_fichas_encargo=$fichas_encargo_obtenidas->RecordCount();
		if($num_fichas_encargo==0)
			return -1;
		// Existe otra certificación energética
		require_once(PATHINCLUDE_FRAMEWORK_MODELOS.'CertificacionesEnergeticasCliente.class.php');
		$certificacion_energetica = new ModelCertificacionesEnergeticasCliente();
		$certificaciones_energetica=$certificacion_energetica->ObtenerCertificacionesInmuebleCliente($id_inmueble,$id_cliente);
		$num_certificaciones_energetica=$certificaciones_energetica->RecordCount();
		if($num_certificaciones_energetica==1)
			return -2;
			
		return 1;
	}
	
	/**
	 * Comprueba que es posible editar el aviso de certificación energética de un determinado inmueble
	 *
	 * @param [id_inmueble]		Identificador del inmueble
	 * @param [id_cliente]		Identificador del cliente
	 *
	 * @return true or false
	 */

	public static function ComprobarAccesoEditarContrato($id_inmueble,$id_cliente)
	{
		// Si no existe
		require_once(PATHINCLUDE_FRAMEWORK_MODELOS.'CertificacionesEnergeticasCliente.class.php');
		$certificacion_energetica = new ModelCertificacionesEnergeticasCliente();
		$certificacion_energetica->SetDataObject($id_inmueble,$id_cliente);
		if($certificacion_energetica->inmueble=="")
			return -1;
			
		return 1;
	}
	
	/**
	 * Comprueba que es posible borrar el aviso de certificación energética de un determinado inmueble
	 *
	 * @param [id_inmueble]		Identificador del inmueble
	 * @param [id_cliente]		Identificador del cliente
	 *
	 * @return true or false
	 */

	public static function ComprobarAccesoBorrarContrato($id_inmueble,$id_cliente)
	{
		require_once(PATHINCLUDE_FRAMEWORK_MODELOS.'CertificacionesEnergeticasCliente.class.php');
		// Datos del aviso
		$certificacion_energetica = new ModelCertificacionesEnergeticasCliente();
		$certificacion_energetica->SetDataObject($id_inmueble,$id_cliente);
		if($certificacion_energetica->estado=="Firmado")
			return -1;			
		require_once(PATHINCLUDE_FRAMEWORK_MODELOS.'Inmuebles.class.php');
		// Datos del inmueble
		$inmueble = new ModelInmuebles();
		$inmueble->SetDataObject($id_inmueble);
		if(is_null($inmueble->certificacion_energetica) && !$inmueble->bloqueado)
			return -2;
		// Si es posible
		return 1;
	}
	
	/**
	 * Comprueba que es posible cambiar el estado del aviso de certificación energética de un determinado inmueble
	 *
	 * @param [id_inmueble]		Identificador del inmueble
	 * @param [id_cliente]		Identificador del cliente
	 *
	 * @return true or false
	 */

	public static function ComprobarAccesoCambiarEstado($id_inmueble,$id_cliente)
	{
		return true;
	}
}
?>