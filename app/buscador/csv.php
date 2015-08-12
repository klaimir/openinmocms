<?php include("../../config/config.php");?>
<?php include("modulobuscador.php");?>
<?php include("../../general/funcionesauxiliares.php");?>
<?php require_once("../../modelos/Model.class.php");?>
<?php
// Conexión Base de datos
$DB = new Model();
$todos_comprar = $DB->Execute($_SESSION['s_busq_inmuebles_comprar']) or die($DB->ErrorMsg());
$todo_comprar = $todos_comprar->FetchRow();
$num_todos_comprar = $todos_comprar->RecordCount();	

if($num_todos_comprar!=0)
{
    do
    {
        $datos=array();
        $datos['tipo']=formatear_tipo($todo_comprar['tipo']);
		$datos['provincia_inmueble']=formatear_provincia($todo_comprar['provincia_inmueble']);
		$datos['region']=formatear_region($todo_comprar['region']);
		$datos['poblacion_inmueble']=formatear_poblacion($todo_comprar['poblacion_inmueble']);
		$datos['zona']=formatear_zona($todo_comprar['zona']);		
		$datos['precio_compra']=number_format($todo_comprar['precio_compra'], 2, ',', '.');
		$datos['metros']=number_format($todo_comprar['metros'], 2, ',', '.');
		$datos['habitaciones']=$todo_comprar['habitaciones'];
		$datos['banios']=$todo_comprar['banios'];
        $array[]=$datos;
    } while ($todo_comprar = $todos_comprar->FetchRow());
}

array_to_csv($array,"comprar.csv");
?>