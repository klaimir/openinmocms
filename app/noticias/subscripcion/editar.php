<?php include("../../../config/config.php");?>
<?php include("modulosubscripcion.php");?>
<?php include("ControlSubscripcionNoticias.class.php");?>
<?php include("../../../general/funcionesauxiliares.php");?>
<?php require_once("../../../modelos/CanalNoticias.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php
	if ($_POST) 
	{
		// Inicialización de variables de error
		$i=0; 
		unset($errores); 
		$hayerrores=false;

		// Validamos los datos generales del canal de noticias
		$datos=ControlSubscripcionNoticias::Validar($i,$hayerrores,$errores);

		$_SESSION['hayerroresmodificarnoticia'] = $hayerrores;
		$_SESSION['erroresmodificarnoticia'] = $errores;
		
		// Si no hay errores
		if(!$hayerrores)
		{
			// Datos de Canal de Noticia
			$canal_noticia = new ModelCanalNoticias();
			$canal_noticia->Update($datos,$datos['id']);
			// Listado
			header("Location: index.php");
		}
	}
?>
<?php Interfaz::PlantillaGenerica("noticias","editar"); ?>