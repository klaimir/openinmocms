<?php include("../../../config/config.php");?>
<?php include("modulofichas_visita.php");?>
<?php include("ControlFichasVisitaClientes.class.php");?>
<?php include("../../../general/funcionesauxiliares.php");?>
<?php require_once("../../../modelos/FichasVisitaCliente.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php
	if($_POST)
	{
		// Inicialización de variables de error
		$i=0; 
		unset($errores); 
		$hayerrores=false;
		
		$datos=ControlFichasVisitaClientes::Validar($i,$hayerrores,$errores);
		
		$_SESSION['hayerroresinsertarfichavisita'] = $hayerrores;
		$_SESSION['erroresinsertarfichavisita'] = $errores;
	
		// Si no hay errores
		if(!$hayerrores)
		{
			// Datos de asignación
			$ficha_visita = new ModelFichasVisitaCliente();
			$ultimo_id=$ficha_visita->Insert($datos);
			// Buscador
			header("Location: editar.php?id=" . $_GET['id']."&id_ficha_visita=" . $ultimo_id);
		}
	}
?>
<?php Interfaz::PlantillaGenerica("clientes","insertar"); ?>