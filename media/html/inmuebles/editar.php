		<a name="top"></a>
		<div class="breadcrumbs_publico"><img src="<?php echo  $_SESSION['rutaimg'];?>flecha1.png" align="absmiddle" />&nbsp;<a href="<?php echo  URL_EMPRESA; ?>"><?php echo  NOMBRE_EMPRESA; ?></a>&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="<?php echo $_SESSION['rutaraiz']; ?>/app/acceso/index.php">Acceso</a>&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="index.php">Inmuebles</a>&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<span class="sin_enlace">Editar</span></div>
		<p align="justify" class="titulo_seccion">Inmuebles</p>
		<div class="regla_horizontal_superior" style="width:100%">
			<div style="float:left; text-align:left">
				<!-- Actualizar en BD -->
				<a href="#" onclick="document.editar_inmueble.submit();return false"><img id="boton_edita" alt="Actualizar en BD" name="boton_edita" border="0" src="<?php echo  $_SESSION['rutaimg'];?>actualizar.gif" align="absmiddle" /></a>&nbsp;&nbsp;&nbsp;<a href="#" onclick="document.editar_inmueble.submit();return false">Actualizar en BD</a>
				&nbsp;&nbsp;
				<!-- Ver Informe -->
				<img src="<?php echo  $_SESSION['rutaimg'];?>pdf.gif" align="absmiddle" />&nbsp;<a href="detalle_pdf.php?id=<?php echo  $_GET['id'];?>" target="_blank">Informe</a>
				&nbsp;&nbsp;
				<!-- Presupuestos -->
				<img src="<?php echo  $_SESSION['rutaimg'];?>pdf.gif" align="absmiddle" />&nbsp;<a href="presupuestos/index.php?id=<?php echo  $_GET['id'];?>">Presupuestos</a>	
				&nbsp;&nbsp;
				<!-- Cartelería -->
				<img src="<?php echo  $_SESSION['rutaimg'];?>pdf.gif" align="absmiddle" />&nbsp;<a href="carteles/index.php?id=<?php echo  $_GET['id'];?>">Cartelería</a>		
				&nbsp;&nbsp;
				<!-- Adjuntos -->
				<a href="adjuntos/index.php?id=<?php echo  $_GET['id'];?>"><img id="boton_adjuntos" name="boton_adjuntos" border="0" src="<?php echo  $_SESSION['rutaimg'];?>adjuntos.png" align="absmiddle" ></a>&nbsp;&nbsp;<a href="adjuntos/index.php?id=<?php echo  $_GET['id'];?>">Adjuntos</a>
				&nbsp;&nbsp;
				<!-- Documentación -->
				<a href="documentacion_generada.php?id=<?php echo  $_GET['id'];?>"><img id="boton_documentacion_generada" name="boton_documentacion_generada" border="0" src="<?php echo  $_SESSION['rutaimg'];?>pdf.gif" align="absmiddle" ></a>&nbsp;&nbsp;&nbsp;<a href="documentacion_generada.php?id=<?php echo  $_GET['id'];?>">Documentación</a>
			</div>
			<div style="float:right; text-align:right; padding-top:4px">
				<a onclick="if (modificado==true) { if(confirm('Va a salir sin guardar los datos. &iquest;Desea salir de todas formas?')) return true; else return false; }" href="index.php"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>volver.gif" align="absmiddle"></a>&nbsp;&nbsp;<a onclick="if (modificado==true) { if(confirm('Va a salir sin guardar los datos. &iquest;Desea salir de todas formas?')) return true; else return false; }" href="index.php">Volver</a>
			</div>			
		</div>
		<br clear="all" />
		<?php
			// Control de errores
			if ($_POST)
			{
				if($_SESSION['hayerroreseditarinmueble'])
				{
		?>
					<div class="titulo_errores"><strong>Informe de errores</strong> &nbsp;| &nbsp;<?php echo  count($_SESSION['erroreseditarinmueble']); ?> error(es) encontrado(s)</div>
					<div class="detalle_errores">
					<ul class="lista_errores">
		<?php
					foreach($_SESSION['erroreseditarinmueble'] as $error)
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
			}
		?>               
		<form action="" name="editar_inmueble" id="editar_inmueble" method="post" enctype="multipart/form-data">
		<?php include('form_inmueble.php'); ?>
		<input type="hidden" name="id" value="<?php echo  $_GET['id']; ?>"  />
		<input type="hidden" name="estado_anterior" value="<?php echo  $row_consulta['estado']; ?>"  />
		</form>
		<div style="float:left; width:50%; text-align:left">
			<!-- Clientes asociados -->
			<a name="listado"></a>
			<p align="justify" style="padding-bottom:2px; border-bottom:1px solid #666666; color:#003366">
				<span style="float:left"><img src="<?php echo  $_SESSION['rutaimg'];?>oficina.gif" align="absmiddle" />&nbsp;Clientes asociados</span>
				<span style="float:right">
				<?php
				if($row_consulta['estado']=="activo")
				{
				?>
				<img src="<?php echo  $_SESSION['rutaimg'];?>asignar.png" align="absmiddle" />
				&nbsp;&nbsp;<a href="clientes/insertar.php?id=<?php echo  $_GET['id'];?>">Asignar cliente</a>
				<?php
				}
				?>
				</span>
				<br clear="all" />
			</p>
			<?php
			if ($num_clientes == 0)
			{
			?>
				<br  /><img src="<?php echo $_SESSION['rutaimg'];?>info.gif" align="absmiddle">&nbsp;&nbsp;El inmueble no contiene clientes asociados.
			<?php
			}
			else
			{
			?>
				<ul style="float:left">
				<?php
				do
				{
			?>
					<li>
						<a target="_blank" href="../clientes/editar.php?id=<?php echo  $cliente['cliente'];?>"><?php echo  formatear_cliente($cliente['cliente']); ?></a>
						<?php
						if($row_consulta['estado']=="activo")
						{
							$acceso_borrar_cliente_inmueble=ControlClientesInmuebles::ComprobarBorrarClienteInmueble($_GET['id'],$cliente['cliente']);
							if($acceso_borrar_cliente_inmueble>0)
							{
						?>
							&nbsp;&nbsp;<a href="clientes/estas_seguro.php?id=<?php echo  $_GET['id'];?>&cliente=<?php echo  $cliente['cliente'];?>"><img src="<?php echo  $_SESSION['rutaimg'];?>borrar.gif" align="absmiddle" /></a>
						<?php
							}
						}
						?>
					</li>
			<?php
				} while ($cliente = $clientes->FetchRow());
			?>		
				</ul>
			<?php
			}
			?>
		</div>
		<div style="float:left; margin-left:10px; width:48%; text-align:left">
			<!-- Enlaces publicidad -->
			<a name="listado"></a>
			<p align="justify" style="padding-bottom:2px; border-bottom:1px solid #666666; color:#003366">
				<span style="float:left"><img src="<?php echo  $_SESSION['rutaimg'];?>oficina.gif" align="absmiddle" />&nbsp;Enlaces publicidad</span>
				<span style="float:right">
				<?php
				if($row_consulta['estado']=="activo")
				{
				?>
				<img src="<?php echo  $_SESSION['rutaimg'];?>nueva_noticia.gif" align="absmiddle" />
				&nbsp;&nbsp;<a href="enlaces/insertar.php?id=<?php echo  $_GET['id'];?>">Insertar enlace</a>
				<?php
				}
				?>
				</span>
				<br clear="all" />
			</p>
			<?php
			if ($num_enlaces == 0)
			{
			?>
				<br  /><img src="<?php echo $_SESSION['rutaimg'];?>info.gif" align="absmiddle">&nbsp;&nbsp;El inmueble no contiene enlaces de publicidad asociados.
			<?php
			}
			else
			{
			?>
				<ul style="float:left">
				<?php
				do
				{
			?>
					<li>
						<a target="_blank" href="<?php echo  $enlace['url'];?>"><?php echo  $enlace['texto_enlace']; ?></a>
						<?php
						if($row_consulta['estado']=="activo")
						{
						?>
						&nbsp;&nbsp;<a href="enlaces/editar.php?id=<?php echo  $_GET['id'];?>&id_enlace=<?php echo  $enlace['id_enlace'];?>"><img src="<?php echo  $_SESSION['rutaimg'];?>editar.gif" align="absmiddle" /></a>
						&nbsp;&nbsp;<a href="enlaces/estas_seguro.php?id=<?php echo  $_GET['id'];?>&id_enlace=<?php echo  $enlace['id_enlace'];?>"><img src="<?php echo  $_SESSION['rutaimg'];?>borrar.gif" align="absmiddle" /></a>
						<?php
						}
						?>
					</li>
			<?php
				} while ($enlace = $enlaces->FetchRow());
			?>		
				</ul>
			<?php
			}
			?>
		</div>
		<br clear="all" />
		<?php
		if($row_consulta['direccion']!="")
		{
		?>
			<!-- Google maps -->
			<p align="justify" style="padding-bottom:2px; border-bottom:1px solid #666666; color:#003366">
				<span style="float:left"><img src="<?php echo  $_SESSION['rutaimg'];?>oficina.gif" align="absmiddle" />&nbsp;Dirección en Google Maps</span>
				<?php /*<span style="float:right"><img src="<?php echo  $_SESSION['rutaimg'];?>pic.gif" align="absmiddle" />&nbsp;<a href="<?php echo  $_SESSION['rutaraiz'];?>librerias/GoogleMaps/streetview.php" target="_blank">Ver dirección en Street View</a></span>*/ ?>
				<br clear="all" />
			</p>
			<?php echo $gm->GmapsKey(); ?>
			<?php echo $gm->MapHolder(); ?>
			<?php echo $gm->InitJs(); ?>
			<?php echo $gm->UnloadMap(); ?>
			<?php
			/*
			echo '
			<br />
			<img src="'.$ruta.'" />
			';
			*/
			?>
			<?php
			/*
			<?php $map3->printHeaderJS() ?>
			<?php $map3->printMapJS() ?>
			<?php $map3->printMap() ?>
			*/
			?>
			<br  />
		<?php
		}
		?>
		<!-- Fotografías asociadas -->
		<a name="listado"></a>
		<p align="justify" style="padding-bottom:2px; border-bottom:1px solid #666666; color:#003366">
			<span style="float:left">
				<img src="<?php echo  $_SESSION['rutaimg'];?>oficina.gif" align="absmiddle" />&nbsp;Fotografías asociadas
				&nbsp;&nbsp;
				<img width="18px;" height="18px;" src="<?php echo  $_SESSION['rutaimg'];?>ok.jpg" align="absmiddle" />
				(<a href="recomendaciones_amigo.php?id=<?php echo  $_GET['id'];?>"><?php echo  $num_recomendaciones; ?>)</a>
			</span>
			<?php
			if($row_consulta['estado']=="activo")
			{
			?>
			<span style="float:right"><img src="<?php echo  $_SESSION['rutaimg'];?>nueva_noticia.gif" align="absmiddle" /><a href="fotos/insertar.php?id=<?php echo  $_GET['id'];?>">Insertar fotografía</a></span>
			<?php
			}
			?>
			<br clear="all" />
		</p>
<?php
		if ($num_todos != 0)
		{			
?>
			<?php
			// Datos de paginación
			echo $display_pages_fotos;
			?>
			<br /><br />
<?php
			do
			{
				$ruta_foto=$_SESSION['rutadocs']."/inmuebles/inmueble_".$_GET['id']."/fotos/".$todo['fichero'];
				// Se calcula redimensión de tamaño
				$dimensiones_foto=redimensionar_fotografia($ruta_foto,500,500);
?>
				<p align="center"><img src="<?php echo  $ruta_foto;?>" width="<?php echo  $dimensiones_foto['anchura'];?>px" height="<?php echo  $dimensiones_foto['altura'];?>px" align="center" ></p>
				<?php
				if($row_consulta['estado']=="activo")
				{
				?>
				<p align="center"><a href="fotos/estas_seguro.php?id=<?php echo  $_GET['id'];?>&fichero=<?php echo  $todo['id_fichero'];?>"><img src="<?php echo $_SESSION['rutaimg'];?>borrar.gif" title="Borrar" border="0" align="absmiddle">&nbsp;&nbsp;Borrar fotografía</a></p>
				<?php
				}
				?>
<?php
			} while ($todo = $todos->FetchRow());
?>
<?php
		}
		else
		{
?>
			<p align="justify"><img src="<?php echo $_SESSION['rutaimg'];?>info.gif" align="absmiddle">&nbsp;&nbsp;Actualmente no hay registrada ninguna fotografía asociada al inmueble.</p>
<?php
		}
?>
	<br  />
	<div style="float:left; width:50%">
		<!-- Planos asociados -->
		<a name="listado"></a>
		<p align="justify" style="padding-bottom:2px; border-bottom:1px solid #666666; color:#003366">
			<span style="float:left"><img src="<?php echo  $_SESSION['rutaimg'];?>oficina.gif" align="absmiddle" />&nbsp;Planos asociados</span>
			<?php
			if($row_consulta['estado']=="activo")
			{
			?>
			<span style="float:right"><img src="<?php echo  $_SESSION['rutaimg'];?>nueva_noticia.gif" align="absmiddle" /><a href="planos/insertar.php?id=<?php echo  $_GET['id'];?>">Insertar plano</a></span>
			<?php
			}
			?>
			<br clear="all" />
		</p>
<?php
		if ($num_planos != 0)
		{			
?>
			<?php
			// Datos de paginación
			echo $display_pages_planos;
			?>
			<br /><br />
<?php
			do
			{
?>
				<p align="center"><img width="500px;" height="340px;" src="<?php echo  $_SESSION['rutadocs']."/inmuebles/inmueble_".$_GET['id']."/planos/".$plano['fichero'];?>" align="center" ></p>
				<?php
				if($row_consulta['estado']=="activo")
				{
				?>
				<p align="center"><a href="planos/estas_seguro.php?id=<?php echo  $_GET['id'];?>&fichero=<?php echo  $plano['id_fichero'];?>"><img src="<?php echo $_SESSION['rutaimg'];?>borrar.gif" title="Borrar" border="0" align="absmiddle">&nbsp;&nbsp;Borrar plano</a></p>
				<?php
				}
				?>
<?php
			} while ($plano = $planos->FetchRow());
?>
<?php
		}
		else
		{
?>
			<p align="justify"><img src="<?php echo $_SESSION['rutaimg'];?>info.gif" align="absmiddle">&nbsp;&nbsp;Actualmente no hay registrado ningún plano asociado al inmueble.</p>
<?php
		}
?>
	</div>
	<div style="float:left; margin-left:10px; width:48%">
		<!-- Listado de videos -->
		<a name="listado"></a>
		<p align="justify" style="padding-bottom:2px; border-bottom:1px solid #666666; color:#003366">
			<span style="float:left"><img src="<?php echo  $_SESSION['rutaimg'];?>oficina.gif" align="absmiddle" />&nbsp;Videos asociados</span>
			<?php
			if($row_consulta['estado']=="activo")
			{
			?>
			<span style="float:right"><img src="<?php echo  $_SESSION['rutaimg'];?>nueva_noticia.gif" align="absmiddle" /><a href="videos/insertar.php?id=<?php echo  $_GET['id'];?>">Insertar video</a></span>
			<?php
			}
			?>
			<br clear="all" />
		</p>
<?php
		if ($num_videos != 0)
		{			
?>
			<?php
			// Datos de paginación
			echo $display_pages_videos;
			?>
			<br /><br  />
<?php
			do
			{
?>
				<?php
				if($navegador['name']=="msie")
				{
				?>
					<a href="<?php echo  $_SESSION['rutadocs']."/inmuebles/inmueble_".$_GET['id']."/videos/".$video['fichero'];?>"><img style="margin-top:40px;" width="300px;" height="300px;" src="<?php echo $_SESSION['rutaimg'];?>video.jpg" align="absmiddle"></a>
				<?php
				}
				else
				{
				?>
					<video width="470" height="350" controls>
						<source src="<?php echo  $_SESSION['rutadocs']."/inmuebles/inmueble_".$_GET['id']."/videos/".$video['fichero'];?>" type="video/mp4">
						<source src="<?php echo  $_SESSION['rutadocs']."/inmuebles/inmueble_".$_GET['id']."/videos/".$video['fichero'];?>" type="video/avi">
						<object data="<?php echo  $_SESSION['rutadocs']."/inmuebles/inmueble_".$_GET['id']."/videos/".$video['fichero'];?>" width="470" height="350">
						<embed src="<?php echo  $_SESSION['rutadocs']."/inmuebles/inmueble_".$_GET['id']."/videos/".$video['fichero'];?>" width="470" height="350">
						</object> 
					</video>
				<?php
				}
				?>
				<?php
				if($row_consulta['estado']=="activo")
				{
				?>
				<p align="center"><a href="videos/estas_seguro.php?id=<?php echo  $_GET['id'];?>&fichero=<?php echo  $video['id_fichero'];?>"><img src="<?php echo $_SESSION['rutaimg'];?>borrar.gif" title="Borrar" border="0" align="absmiddle">&nbsp;&nbsp;Borrar video</a></p>
				<?php
				}
				?>
<?php
			} while ($video = $videos->FetchRow());
?>
<?php
		}
		else
		{
?>
			<p align="justify"><img src="<?php echo $_SESSION['rutaimg'];?>info.gif" align="absmiddle">&nbsp;&nbsp;Actualmente no hay registrado ningún video asociado al inmueble.</p>
<?php
		}
?>
	</div>
	<br clear="all" /><br  />
		<div class="regla_horizontal_inferior" style="width:100%">
			<div style="float:left; text-align:left">
				<!-- Actualizar en BD -->
				<a href="#" onclick="document.editar_inmueble.submit();return false"><img id="boton_edita" alt="Actualizar en BD" name="boton_edita" border="0" src="<?php echo  $_SESSION['rutaimg'];?>actualizar.gif" align="absmiddle" /></a>&nbsp;&nbsp;&nbsp;<a href="#" onclick="document.editar_inmueble.submit();return false">Actualizar en BD</a>
				&nbsp;&nbsp;
				<!-- Ver Informe -->
				<img src="<?php echo  $_SESSION['rutaimg'];?>pdf.gif" align="absmiddle" />&nbsp;<a href="detalle_pdf.php?id=<?php echo  $_GET['id'];?>" target="_blank">Informe</a>
				&nbsp;&nbsp;
				<!-- Presupuestos -->
				<img src="<?php echo  $_SESSION['rutaimg'];?>pdf.gif" align="absmiddle" />&nbsp;<a href="presupuestos/index.php?id=<?php echo  $_GET['id'];?>">Presupuestos</a>	
				&nbsp;&nbsp;
				<!-- Cartelería -->
				<img src="<?php echo  $_SESSION['rutaimg'];?>pdf.gif" align="absmiddle" />&nbsp;<a href="carteles/index.php?id=<?php echo  $_GET['id'];?>">Cartelería</a>		
				&nbsp;&nbsp;
				<!-- Adjuntos -->
				<a href="adjuntos/index.php?id=<?php echo  $_GET['id'];?>"><img id="boton_adjuntos" name="boton_adjuntos" border="0" src="<?php echo  $_SESSION['rutaimg'];?>adjuntos.png" align="absmiddle" ></a>&nbsp;&nbsp;<a href="adjuntos/index.php?id=<?php echo  $_GET['id'];?>">Adjuntos</a>
				&nbsp;&nbsp;
				<!-- Documentación -->
				<a href="documentacion_generada.php?id=<?php echo  $_GET['id'];?>"><img id="boton_documentacion_generada" name="boton_documentacion_generada" border="0" src="<?php echo  $_SESSION['rutaimg'];?>pdf.gif" align="absmiddle" ></a>&nbsp;&nbsp;&nbsp;<a href="documentacion_generada.php?id=<?php echo  $_GET['id'];?>">Documentación</a>
			</div>
			<div style="float:right; text-align:right; padding-top:4px">
				<a onclick="if (modificado==true) { if(confirm('Va a salir sin guardar los datos. &iquest;Desea salir de todas formas?')) return true; else return false; }" href="index.php"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>volver.gif" align="absmiddle"></a>&nbsp;&nbsp;<a onclick="if (modificado==true) { if(confirm('Va a salir sin guardar los datos. &iquest;Desea salir de todas formas?')) return true; else return false; }" href="index.php">Volver</a>
			</div>			
		</div>