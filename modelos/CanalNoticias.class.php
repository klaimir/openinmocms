<?php
/*
CanalNoticias.class.php, v 2.4 2013/05/13

ModelCanalNoticias - Clase gestionar todas las peticiones y operaciones relacionadas con los canales de noticias registradas

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
* ModelCanalNoticias
*
* Clase gestionar todas las peticiones y operaciones relacionadas con las canales de noticias registradas
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  CanalNoticias.class.php, v 2.4 2013/05/13
* @access   public
*/

class ModelCanalNoticias extends Model
{
    public $id_canal_noticia;
	public $titulo;
	public $descripcion;
	public $enlace;
	public $tiempo;
	
	/**
	 * Constructor
	 *
	 */
	
	function ModelCanalNoticias()
    {  
		parent::Model();
		$this->id_canal_noticia=NULL;
		$this->titulo=NULL;
		$this->descripcion=NULL;
		$this->enlace=NULL;
		$this->tiempo=NULL;
    }
	
	/**
	 * Establecen los datos de los distintos atributos de la clase
	 *
	 * @param [datos]		Datos de configuración
	 *
	 */
	
	function Set($datos)
    {  
		if(isset($datos['id_canal_noticia'])) $this->id_canal_noticia=$datos['id_canal_noticia'];
		if(isset($datos['titulo'])) $this->titulo=$datos['titulo'];
		if(isset($datos['descripcion'])) $this->descripcion=$datos['descripcion'];
		if(isset($datos['enlace'])) $this->enlace=$datos['enlace'];
		if(isset($datos['tiempo'])) $this->tiempo=$datos['tiempo'];
    }
	
	/**
	 * Inserta un canal de noticia en la base de datos
	 *
	 * @param [datos]		Array con los diferentes valores a insertar
	 *
	 * @return Devuelve el último identificador insertado o false en caso contrario
	 */
	 
	function Insert($datos)
    {  
		$sql = "SELECT * FROM canales_noticias WHERE id_canal_noticia = -1";
		$rs = $this->Execute($sql);
		$insertSQL = $this->GetInsertSQL($rs,$datos);
		$this->Execute($insertSQL) or die($this->ErrorMsg());
		return $this->Insert_ID('canales_noticias','id_canal_noticia');
    }
	
	/**
	 * Realiza el proceso de actualización de un canal de noticia
	 *
	 * @param [datos]			Array con los diferentes valores a editar
	 * @param [id_canal_noticia]		Identificador de la noticia
	 *
	 * @return Devuelve true o false
	 */
	 
	function Update($datos,$id_canal_noticia)
    {
		$sql = "SELECT * FROM canales_noticias WHERE id_canal_noticia = '".$id_canal_noticia."'";
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
	 * Elimina un canal de noticia de la base de datos
	 *
	 * @param [id_canal_noticia]	Indentificador del canal de noticias
	 *
	 * @return Devuelve true o false
	 */
	 
	function Delete($id_canal_noticia)
    {  
		$sql = "DELETE FROM canales_noticias WHERE id_canal_noticia='".$id_canal_noticia."'";
		return $this->Execute($sql) or die($this->ErrorMsg());
    }
}
?>