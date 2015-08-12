		<a name="top"></a>
		<div class="breadcrumbs_publico"><img src="<?php echo  $_SESSION['rutaimg'];?>flecha1.png" align="absmiddle" />&nbsp;<a href="<?php echo  URL_EMPRESA; ?>"><?php echo  NOMBRE_EMPRESA; ?></a>&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="<?php echo $_SESSION['rutaraiz']; ?>/app/acceso/index.php">Acceso</a>&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="index.php">Clientes</a>&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<span class="sin_enlace">Editar cliente</span></div>
        <p align="justify" class="titulo_seccion">Clientes</p>		
		<div class="regla_horizontal_superior">
			<div style="float:left;">
				<!-- Actualizar en BD -->
				<a href="#" onclick="document.insertar_cliente.submit();return false"><img id="boton_edita" alt="Actualizar en BD" name="boton_edita" border="0" src="<?php echo  $_SESSION['rutaimg'];?>actualizar.gif" align="absmiddle" /></a>&nbsp;<a href="#" onclick="document.insertar_cliente.submit();return false">Actualizar en BD</a>
				&nbsp;&nbsp;
				<!-- Ver Informe -->
				<img src="<?php echo  $_SESSION['rutaimg'];?>pdf.gif" align="absmiddle" />&nbsp;<a href="detalle_pdf.php?id=<?php echo  $_GET['id'];?>" target="_blank">Informe</a>
				&nbsp;&nbsp;
				<!-- Fichas de visita -->
				<img src="<?php echo  $_SESSION['rutaimg'];?>pdf.gif" align="absmiddle" />&nbsp;<a href="fichas_visita/index.php?id=<?php echo  $_GET['id'];?>">Fichas visita</a>
				&nbsp;&nbsp;
				<!-- Adjuntos -->
				<a href="adjuntos/index.php?id=<?php echo  $_GET['id'];?>"><img id="boton_adjuntos" name="boton_adjuntos" border="0" src="<?php echo  $_SESSION['rutaimg'];?>adjuntos.png" align="absmiddle" ></a>&nbsp;&nbsp;&nbsp;<a href="adjuntos/index.php?id=<?php echo  $_GET['id'];?>">Adjuntos</a>
			</div>
			<div style="float:right; padding-top:4px;">
				<a class="submodal-520-350" href="ayuda.php"><img src="<?php echo  $_SESSION['rutaimg'];?>help.png" alt="Ayuda al buscador" border="0" align="absmiddle" /></a>&nbsp;<a class="submodal-520-350" href="ayuda.php">Ayuda</a>
				&nbsp;&nbsp;
				<a href="index.php"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>volver.gif" align="absmiddle"></a>&nbsp;&nbsp;<a href="index.php">Volver</a>
			</div>			
		</div>
		<br clear="all" />
		<?php
			// Control de errores
			if ($_POST)
			{
				if($_SESSION['hayerroresmodificarcliente'])
				{
		?>
					<div class="titulo_errores"><strong>Informe de errores</strong> &nbsp;| &nbsp;<?php echo  count($_SESSION['erroresmodificarcliente']); ?> error (es) encontrado(s)</div>
					<div class="detalle_errores">
					<ul class="lista_errores">
		<?php
					foreach($_SESSION['erroresmodificarcliente'] as $error)
					{
		?>		
						<li><?php echo  $error; ?></li>
		<?php
					}
		?>
					</ul>
					</div>
					<br />
		<?php
				}
				unset($_SESSION['hayerroresmodificarcliente']);
				unset($_SESSION['erroresmodificarcliente']);
			}
		?>
		<form action=""  name="insertar_cliente" id="insertar_cliente" method="post" enctype="multipart/form-data">
		<?php include('form_cliente.php'); ?>
		<input type="hidden" name="id" value="<?php echo  $_GET['id']; ?>"  />
		<input type="hidden" name="nif_anterior" value="<?php echo  $row_consulta['nif']; ?>"  />
		<input type="hidden" name="estado_anterior" value="<?php echo  $row_consulta['estado']; ?>"  />
		</form>
		<!-- Resultados de Búsqueda -->
		<a name="listado"></a>
		<p align="justify" style="padding-bottom:2px; border-bottom:1px solid #666666; color:#003366">
			<span style="float:left"><img src="<?php echo  $_SESSION['rutaimg'];?>oficina.gif" align="absmiddle" />&nbsp;Inmuebles asociados</span>
			<?php
			if($row_consulta['estado']=="activo")
			{
			?>
			<span style="float:right"><img src="<?php echo  $_SESSION['rutaimg'];?>nueva_noticia.gif" align="absmiddle" /><a href="inmuebles/index.php?id=<?php echo  $_GET['id'];?>&busqueda_inicial=1">Asignar inmueble</a></span>
			<?php
			}
			?>
			<br clear="all" />
		</p>
<?php
		if ($num_inmuebles != 0)
		{			
?>
			<table style="border:1px solid #004000" width="100%" cellpadding="1" cellspacing="1" align="center">
			<tr class="cabecera_tabla">
				<td>Tipología</td>
				<td>Municipio</td>
				<td>Zona</td>
				<td>Precio<br />compra</td>
				<td>Precio<br />alquiler</td>
				<td>Metros</td>
				<td>Ficha<br />encargo</td>
				<td>Certificación<br />Energética</td>
				<td>Contrato<br />compra-venta</td>
				<td>Contrato<br />arrendamiento</td>
				<td>Editar</td>
				<?php
				if($row_consulta['estado']=="activo")
				{
				?>
				<td>Eliminar</td>
				<?php
				}
				?>
			</tr>
<?php
			$j = 0;
			$k = 0;
			do
			{
				if($j==0)
				{
					$color='datos_tabla_impar'; $j=1;
				}
				else
				{
					$color='datos_tabla_par"'; $j=0;
				}
?>
				<tr class="<?php echo  $color; ?>">
				<td><?php echo  formatear_tipo($inmueble['tipo']);?></td>
				<td><?php echo  formatear_poblacion($inmueble['poblacion_inmueble']);?></td>
				<td><?php echo  formatear_zona($inmueble['zona']);?></td>			
				<td><?php echo  number_format($inmueble['precio_compra'], 2, ',', '.'); ?> €</td>
				<td><?php echo  number_format($inmueble['precio_alquiler'], 2, ',', '.'); ?> €</td>
				<td><?php echo  number_format($inmueble['metros'], 2, ',', '.'); ?></td>
				<td><a href="fichas_encargo/index.php?id=<?php echo  $_GET['id'];?>&inmueble=<?php echo  $inmueble['id_inmueble'];?>"><img src="<?php echo  $_SESSION['rutaimg'];?>pdf.gif" align="absmiddle" /></a></td>
				<td><a href="certificaciones_energeticas/index.php?id=<?php echo  $_GET['id'];?>&inmueble=<?php echo  $inmueble['id_inmueble'];?>"><img src="<?php echo  $_SESSION['rutaimg'];?>pdf.gif" align="absmiddle" /></a></td>
				<td><a href="contratos_compra_venta/index.php?id=<?php echo  $_GET['id'];?>&inmueble=<?php echo  $inmueble['id_inmueble'];?>"><img src="<?php echo  $_SESSION['rutaimg'];?>pdf.gif" align="absmiddle" /></a></td>
				<td><a href="contratos_arrendamiento/index.php?id=<?php echo  $_GET['id'];?>&inmueble=<?php echo  $inmueble['id_inmueble'];?>"><img src="<?php echo  $_SESSION['rutaimg'];?>pdf.gif" align="absmiddle" /></a></td>
				<td><a target="_blank" href="../inmuebles/editar.php?id=<?php echo  $inmueble['id_inmueble'];?>"><img src="<?php echo $_SESSION['rutaimg'];?>editar.gif" title="Editar" border="0" align="absmiddle"></a></td>
				<?php
				if($row_consulta['estado']=="activo")
				{
					$acceso_borrar_cliente_inmueble=ControlInmueblesClientes::ComprobarBorrarClienteInmueble($inmueble['id_inmueble'],$_GET['id']);
					if($acceso_borrar_cliente_inmueble>0)
					{
				?>
					<td><a href="inmuebles/estas_seguro.php?id=<?php echo  $_GET['id'];?>&inmueble=<?php echo  $inmueble['id_inmueble'];?>"><img src="<?php echo $_SESSION['rutaimg'];?>borrar.gif" title="Borrar" border="0" align="absmiddle"></a></td>
				<?php
					}
					else
					{
					?>
					<td>--</td>
					<?php
					}
				}
				?>
				</tr>
<?php
			} while ($inmueble = $inmuebles->FetchRow());
?>
			</table>
<?php
		}
		else
		{
?>
			<p align="justify"><img src="<?php echo $_SESSION['rutaimg'];?>info.gif" align="absmiddle">&nbsp;&nbsp;Actualmente no hay asociado ningún inmueble al cliente actual.</p>
<?php
		}
?>
		<br  />
		<div class="regla_horizontal_inferior">
			<div style="float:left;">
				<!-- Actualizar en BD -->
				<a href="#" onclick="document.insertar_cliente.submit();return false"><img id="boton_edita" alt="Actualizar en BD" name="boton_edita" border="0" src="<?php echo  $_SESSION['rutaimg'];?>actualizar.gif" align="absmiddle" /></a>&nbsp;<a href="#" onclick="document.insertar_cliente.submit();return false">Actualizar en BD</a>
				&nbsp;&nbsp;
				<!-- Ver Informe -->
				<img src="<?php echo  $_SESSION['rutaimg'];?>pdf.gif" align="absmiddle" />&nbsp;<a href="detalle_pdf.php?id=<?php echo  $_GET['id'];?>" target="_blank">Informe</a>
				&nbsp;&nbsp;
				<!-- Fichas de visita -->
				<img src="<?php echo  $_SESSION['rutaimg'];?>pdf.gif" align="absmiddle" />&nbsp;<a href="fichas_visita/index.php?id=<?php echo  $_GET['id'];?>">Fichas visita</a>
				&nbsp;&nbsp;
				<!-- Adjuntos -->
				<a href="adjuntos/index.php?id=<?php echo  $_GET['id'];?>"><img id="boton_adjuntos" name="boton_adjuntos" border="0" src="<?php echo  $_SESSION['rutaimg'];?>adjuntos.png" align="absmiddle" ></a>&nbsp;&nbsp;&nbsp;<a href="adjuntos/index.php?id=<?php echo  $_GET['id'];?>">Adjuntos</a>
			</div>
			<div style="float:right; padding-top:7px;">
				<a class="submodal-520-350" href="ayuda.php"><img src="<?php echo  $_SESSION['rutaimg'];?>help.png" alt="Ayuda al buscador" border="0" align="absmiddle" /></a>&nbsp;<a class="submodal-520-350" href="ayuda.php">Ayuda</a>
				&nbsp;&nbsp;
				<!--  Navegacion -->
				<a href="index.php"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>volver.gif" align="absmiddle"></a>&nbsp;&nbsp;<a href="index.php">Volver</a>
				&nbsp;&nbsp;&nbsp;
				<a href="#top" title="Subir"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>subir.png"></a>&nbsp;&nbsp;<a href="#top" title="Subir">Subir</a>
			</div>
		</div>
		<br clear="all" />