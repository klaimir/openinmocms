<?php
/*
InmueblesFichasVisitaCliente.class.php, v 2.4 2013/05/13

ModelInmueblesFichasVisitaCliente - Clase gestionar todas las peticiones y operaciones relacionadas con los inmuebles de las fichas de visita registradas

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
* ModelInmueblesFichasVisitaCliente
*
* Clase gestionar todas las peticiones y operaciones relacionadas con los inmuebles de las fichas de visita registradas
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  InmueblesFichasVisitaCliente.class.php, v 2.4 2013/05/13
* @access   public
*/

class ModelInmueblesFichasVisitaCliente extends Model
{
    public $ficha_visita;
	public $cliente;
	public $inmueble;
	public $hora;
	
	/**
	 * Constructor
	 *
	 */
	
	function ModelInmueblesFichasVisitaCliente()
    {  
		parent::Model();
		$this->ficha_visita=NULL;
		$this->cliente=NULL;
		$this->inmueble=NULL;
		$this->hora=NULL;
    }
	
	/**
	 * Establecen los datos de los distintos atributos de la clase
	 *
	 * @param [datos]		Datos de configuración
	 *
	 */
	
	function Set($datos)
    {  
		if(isset($datos['ficha_visita'])) $this->ficha_visita=$datos['ficha_visita'];
		if(isset($datos['cliente'])) $this->cliente=$datos['cliente'];
		if(isset($datos['inmueble'])) $this->inmueble=$datos['inmueble'];
		if(isset($datos['hora'])) $this->hora=$datos['hora'];
    }
	
	/**
	 * Inserta un inmueble en una ficha de cliente la base de datos
	 *
	 * @param [datos]		Datos a insertar
	 *
	 * @return Devuelve true o false
	 */
	 
	function Insert($datos)
    {  
		$sql = "SELECT * FROM inmuebles_fichas_visita_cliente WHERE cliente = -1 AND ficha_visita = -1";
		$rs = $this->Execute($sql);
		$insertSQL = $this->GetInsertSQL($rs,$datos);
		return $this->Execute($insertSQL) or die($this->ErrorMsg());
    }
	
	/**
	 * Realiza el proceso de actualización de la hora de un inmueble asociado a una ficha de visita
	 *
	 * @param [hora]				hora en formato HH:MM
	 * @param [id_ficha_visita]		Indentificador de la ficha de visita
	 * @param [cliente]				Indentificador del cliente
	 * @param [inmueble]			Indentificador del inmueble
	 *
	 * @return Devuelve true o false
	 */
	 
	function CambiarHora($hora,$id_ficha_visita,$cliente,$inmueble)
    {
		$datos['hora']=$hora;
		return $this->Update($datos,$id_ficha_visita,$cliente,$inmueble);
    }
	
	/**
	 * Realiza el proceso de actualización de un inmueble asociado a una ficha de visita
	 *
	 * @param [datos]				Array con los diferentes valores a editar
	 * @param [id_ficha_visita]		Indentificador de la ficha de visita
	 * @param [cliente]				Indentificador del cliente
	 * @param [inmueble]			Indentificador del inmueble
	 *
	 * @return Devuelve true o false
	 */
	 
	function Update($datos,$id_ficha_visita,$cliente,$inmueble)
    {
		$sql = "SELECT * FROM inmuebles_fichas_visita_cliente WHERE ficha_visita = ".$id_ficha_visita." AND cliente = ".$cliente." AND inmueble = ".$inmueble;
		$rs = $this->Execute($sql);
		$rs_row = $rs->FetchRow();
		// Si hay diferencia, actualiza
		if(array_diff($rs_row,$datos))
		{
			$UpdateSQL = $this->GetUpdateSQL($rs,$datos);
			return $this->Execute($UpdateSQL) or die($this->ErrorMsg());
		}
		else
			return true;
    }
	
	/**
	 * Elimina un clientegrafía de un inmueble de la base de datos
	 *
	 * @param [ficha_visita]	Indentificador de la ficha de visita
	 * @param [cliente]			Indentificador del cliente
	 * @param [id_inmueble]		Indentificador del inmueble
	 *
	 * @return Devuelve true o false
	 */
	 
	function Delete($ficha_visita,$cliente,$inmueble)
    {
		// Finalmente borra todos las fichas
		$sql = sprintf("DELETE FROM inmuebles_fichas_visita_cliente WHERE ficha_visita=%s AND inmueble=%s AND cliente=%s",
			GetSQLValueString($ficha_visita, "text"),
			GetSQLValueString($inmueble, "text"),
			GetSQLValueString($cliente, "text"));
		return $this->Execute($sql) or die($this->ErrorMsg());
    }
}
?>