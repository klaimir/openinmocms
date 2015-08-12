<?php
/*
HistoricoUsuarios.class.php, v 2.4 2013/05/13

ModelHistoricoUsuarios - Clase gestionar todas las peticiones y operaciones relacionadas con los eventos históricos de los usuarios registrados

Esta librería es propiedad de Ángel Luis Berasuain Ruiz, cualquier uso que pudiera darse
tendrá que estar autorizado expresamente bajo mi supervisión.

Si tienes cualquier sugerencia, duda o comentario, por favor enviámela a:

Ángel Luis Berasuain Ruiz
klaimir@hotmail.com

*/

/* load classes */

require_once('Model.class.php');

/* load libraries */

// No son necesarias librerías auxiliares

/**
*
* ModelHistoricoUsuarios
*
* Clase gestionar todas las peticiones y operaciones relacionadas con los eventos históricos de los usuarios registrados
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  HistoricoUsuarios.class.php, v 2.4 2013/05/13
* @access   public
*/

class ModelHistoricoUsuarios extends Model
{
    public $id_historico;
	public $usuario;
	public $accion;
	public $fecha_hora;
	
	/**
	 * Constructor
	 *
	 */
	
	function ModelUsuarios()
    {  
		parent::Model();
		$this->id_historico=NULL;
		$this->usuario=NULL;
		$this->accion=NULL;
		$this->fecha_hora=NULL;
    }
	
	/**
	 * Establecen los datos de los distintos atributos de la clase
	 *
	 * @param [datos]		Datos de configuración
	 *
	 */
	
	function Set($datos)
    {  
		if(isset($datos['id_historico'])) $this->id_historico=$datos['id_historico'];
		if(isset($datos['usuario'])) $this->usuario=$datos['usuario'];
		if(isset($datos['accion'])) $this->accion=$datos['accion'];
		if(isset($datos['fecha_hora'])) $this->fecha_hora=$datos['fecha_hora'];
    }
	
	/**
	 * Inserta un evento histórico de usuario en la base de datos
	 *
	 * @param [id_historico]	Identificador interno del evento del histórico
	 * @param [usuario]			Usuario que realiza la acción
	 * @param [accion]			Cadena de caracteres que describe la acción realizada
	 * @param [fecha_hora]		Fecha y hora en la que se realiza
	 *
	 * @return Devuelve true o false
	 */
	 
	function Insert($id_historico=NULL,$usuario,$accion,$fecha_hora=NULL)
    {  
		// si el id_historico es nulo, se busca el siguiente que le corresponde 
		if(is_null($id_historico))
		{	
			// Se obtiene el último id insertado
			$sql_atribs = "SELECT max(id_historico) as ultimo_id FROM historicos_usuario WHERE usuario='".$usuario."'";
			$atribs = $this->Execute($sql_atribs) or die($this->ErrorMsg());
			$num_atribs = $atribs->RecordCount();
			$atrib = $atribs->FetchRow();
		
			if(is_null($atrib['ultimo_id']))
			{
				$id_historico=1;
			}
			else
			{
				$id_historico = $atrib['ultimo_id']+1;
			}
		}
        
        if(is_null($fecha_hora))
        {
            $fecha_hora = date("Y-m-d H:i:s");
        }
		// Se inserta los valores de los datos de comunicaciones
		$insertSQL = sprintf("INSERT INTO historicos_usuario (id_historico, usuario, accion, fecha_hora) VALUES (%s, %s, %s, %s)", 
				   GetSQLValueString($id_historico, "int"),
				   GetSQLValueString($usuario, "text"),
				   GetSQLValueString($accion, "text"),
				   GetSQLValueString($fecha_hora, "text"));
		return $this->Execute($insertSQL) or die($this->ErrorMsg());
    }
	
	/**
	 * Actualizar un evento histórico de usuario en la base de datos con los datos indicados 
	 *
	 * @param [usuario]		Usuario que realiza la acción
	 * @param [accion]		Cadena de caracteres que describe la acción realizada
	 * @param [fecha_hora]	Fecha y hora en la que se realiza
	 *
	 * @return Devuelve true o false
	 */
	 
	function Update($usuario,$accion,$fecha_hora=NULL)
    {  
		$fecha_actual=date("Y-m-d");
		// Se obtiene el último id insertado
		$sql_atribs = "SELECT max(id_historico) as ultimo_id FROM historicos_usuario WHERE usuario='".$usuario."' AND DATE_FORMAT(fecha_hora, '%Y-%m-%d') = '".$fecha_actual."' AND accion='".$accion."'";
		$atribs = $this->Execute($sql_atribs) or die($this->ErrorMsg());
		$num_atribs = $atribs->RecordCount();
		$atrib = $atribs->FetchRow();
		if(is_null($atrib['ultimo_id']))
		{
			return $this->Insert(NULL,$usuario,$accion);
		}
		else
		{
			return $this->UpdateBD($atrib['ultimo_id'],$usuario,$accion);
		}
    }
	
	/**
	 * Actualizar un evento histórico de usuario en la base de datos con los datos indicados 
	 *
	 * @param [id_historico]	Identificador interno del evento del histórico
	 * @param [usuario]			Usuario que realiza la acción
	 * @param [accion]			Cadena de caracteres que describe la acción realizada
	 * @param [fecha_hora]		Fecha y hora en la que se realiza
	 *
	 * @return Devuelve true o false
	 */

	private function UpdateBD($id_historico,$usuario,$accion,$fecha_hora=NULL)
	{
		if(is_null($fecha_hora))
			$fecha_hora="NOW()";
		else
			GetSQLValueString($fecha_hora, "text");
		// Actualización
		$updateSQL = sprintf("UPDATE historicos_usuario SET accion=%s, fecha_hora=%s WHERE usuario=%s AND id_historico=%s",				
			GetSQLValueString($accion, "text"),
			$fecha_hora,
			GetSQLValueString($usuario, "text"),
			GetSQLValueString($id_historico, "int"));   
		return $this->Execute($updateSQL) or die($this->ErrorMsg());	
	}
}
?>