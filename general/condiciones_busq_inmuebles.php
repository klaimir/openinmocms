<?php
	if($_POST['precio_compra'] != "")
	{
		if($_POST['precio_compra'] == "menos_120")
		{
			$sql_precio_compra = " AND precio_compra < 120000 ";
		}
		else
		{
			if($_POST['precio_compra'] == "120_180")
			{
				$sql_precio_compra = " AND precio_compra >= 120000 AND precio_compra < 180000 ";
			}
			else
			{
				if($_POST['precio_compra'] == "180_240")
				{
					$sql_precio_compra = " AND precio_compra >= 180000 AND precio_compra < 240000 ";
				}
				else
				{
					$sql_precio_compra = " AND precio_compra >= 240000 ";
				}							
			}
		}
	}
	else
	{
		$sql_precio_compra="";
	}
	
	if($_POST['precio_alquiler'] != "")
	{
		if($_POST['precio_alquiler'] == "menos_400")
		{
			$sql_precio_alquiler = " AND precio_alquiler < 400 ";
		}
		else
		{
			if($_POST['precio_alquiler'] == "400_600")
			{
				$sql_precio_alquiler = " AND precio_alquiler >= 400 AND precio_alquiler < 600 ";
			}
			else
			{
				if($_POST['precio_alquiler'] == "600_800")
				{
					$sql_precio_alquiler = " AND precio_alquiler >= 600 AND precio_alquiler < 800 ";
				}
				else
				{
					$sql_precio_alquiler = " AND precio_alquiler >= 800 ";
				}							
			}
		}
	}
	else
	{
		$sql_precio_alquiler="";
	}
	
	if($_POST['antiguedad'] != "")
	{
		$sql_antiguedad = " AND antiguedad ='" . $_POST['antiguedad'] . "' ";
	}
	else
	{
		$sql_antiguedad="";
	}
					
	if($_POST['palabras'] != "")  
	{
		$sql_palabras = " AND (	observaciones LIKE '%" . $_POST['palabras'] . "%' )";			
	}
	else
	{
		$sql_palabras="";
	}
	
	if($_POST['region'] != "")
	{
		$sql_region = " AND region ='" . $_POST['region'] . "' ";
	}
	else
	{
		$sql_region="";
	}
	
	if($_POST['provincia'] != "")
	{
		$sql_provincia = " AND provincia_inmueble ='" . $_POST['provincia'] . "' ";
	}
	else
	{
		$sql_provincia="";
	}
	
	if($_POST['poblacion'] != "")
	{
		$sql_poblacion = " AND poblacion_inmueble ='" . $_POST['poblacion'] . "' ";
	}
	else
	{
		$sql_poblacion="";
	}
	
	if($_POST['zona'] != "")
	{
		$sql_zona = " AND zona ='" . $_POST['zona'] . "' ";
	}
	else
	{
		$sql_zona="";
	}
	
	if($_POST['tipos'] != "")
	{
		$sql_tipo = " AND tipo ='" . $_POST['tipos'] . "' ";
	}
	else
	{
		$sql_tipo="";
	}
	
	if($_POST['tipo_certificacion_energetica'] != "")
	{
		if($_POST['tipo_certificacion_energetica'] == "sin_definir")
		{
			$sql_tipo_certificacion_energetica = " AND (certificacion_energetica ='' OR certificacion_energetica IS NULL) ";
		}
		else
		{
			$sql_tipo_certificacion_energetica = " AND certificacion_energetica ='" . $_POST['tipo_certificacion_energetica'] . "' ";
		}
	}
	else
	{
		$sql_tipo_certificacion_energetica="";
	}
	
	if($_POST['opciones'] != "")
	{
		if($_POST['opciones'] == 1)
			$sql_opcion = " AND precio_compra > 0 ";
		else
			$sql_opcion = " AND precio_alquiler > 0 ";
	}
	else
	{
		$sql_opcion="";
	}
	
	if($_POST['captadores'] != "")
	{
		$sql_captadores = " AND captador = '".$_POST['captadores']."'";
	}
	else
	{
		$sql_captadores="";
	}
?>