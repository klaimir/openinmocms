<?php
	if(isset($_GET['enlace']))
	{
		switch($_GET['enlace'])
		{
			case 'insertar_contrato_compra_venta': header("Location: ".$_SESSION['rutaraiz']."app/clientes/contratos_compra_venta/insertar.php?cliente_comprador=".$_SESSION['id_cliente_comprador_contrato_compra_venta']."&id=".$_SESSION['id_cliente_vendedor_contrato_compra_venta']."&inmueble=".$_SESSION['id_inmueble_contrato_compra_venta']); break;
			case 'insertar_contrato_arrendamiento': header("Location: ".$_SESSION['rutaraiz']."app/clientes/contratos_arrendamiento/insertar.php?cliente_comprador=".$_SESSION['id_cliente_comprador_contrato_arrendamiento']."&id=".$_SESSION['id_cliente_vendedor_contrato_arrendamiento']."&inmueble=".$_SESSION['id_inmueble_contrato_arrendamiento']."&tipo_arrendamiento=".$_SESSION['id_tipo_arrendamiento_contrato_arrendamiento']); break;			
			case 'insertar_ficha_encargo': header("Location: ".$_SESSION['rutaraiz']."app/clientes/fichas_encargo/insertar.php?id=".$_SESSION['id_cliente_ficha_encargo']."&inmueble=".$_SESSION['id_inmueble_ficha_encargo']); break;
			case 'insertar_ficha_visita': header("Location: ".$_SESSION['rutaraiz']."app/clientes/certificaciones_energeticas/insertar.php?id=".$_SESSION['id_cliente_ficha_visita']); break;
			case 'insertar_certificacion_energetica': header("Location: ".$_SESSION['rutaraiz']."app/clientes/certificaciones_energeticas/insertar.php?id=".$_SESSION['id_cliente_certificacion_energetica']."&inmueble=".$_SESSION['id_inmueble_certificacion_energetica']); break;
			case 'editar_contrato_compra_venta': header("Location: ".$_SESSION['rutaraiz']."app/clientes/contratos_compra_venta/editar.php?id_contrato_compra_venta=".$_SESSION['id_contrato_compra_venta']."&id=".$_SESSION['id_cliente_vendedor_contrato_compra_venta']."&inmueble=".$_SESSION['id_inmueble_contrato_compra_venta']); break;
			case 'editar_contrato_arrendamiento': header("Location: ".$_SESSION['rutaraiz']."app/clientes/contratos_arrendamiento/editar.php?id_contrato_arrendamiento=".$_SESSION['id_contrato_arrendamiento']."&id=".$_SESSION['id_cliente_vendedor_contrato_arrendamiento']."&inmueble=".$_SESSION['id_inmueble_contrato_arrendamiento']); break;
			case 'editar_ficha_encargo': header("Location: ".$_SESSION['rutaraiz']."app/clientes/fichas_encargo/editar.php?id=".$_SESSION['id_cliente_ficha_encargo']."&inmueble=".$_SESSION['id_inmueble_ficha_encargo']."&id_ficha_encargo=".$_SESSION['id_ficha_encargo']); break;
			case 'editar_ficha_visita': header("Location: ".$_SESSION['rutaraiz']."app/clientes/fichas_visita/editar.php?id=".$_SESSION['id_cliente_ficha_visita']."&id_ficha_visita=".$_SESSION['id_ficha_visita']); break;
			case 'insertar_ficha_visita': header("Location: ".$_SESSION['rutaraiz']."app/clientes/certificaciones_energeticas/insertar.php?id=".$_SESSION['id_cliente_ficha_visita']); break;
			case 'editar_certificacion_energetica': header("Location: ".$_SESSION['rutaraiz']."app/clientes/certificaciones_energeticas/editar.php?id=".$_SESSION['id_cliente_certificacion_energetica']."&inmueble=".$_SESSION['id_inmueble_certificacion_energetica']); break;
			default: header("Location: index.php");
		}
	}
	else
		// Listado
		header("Location: index.php");
?>