		<a name="top"></a>
		<div class="breadcrumbs_publico"><img src="<?php echo  $_SESSION['rutaimg'];?>flecha1.png" align="absmiddle" />&nbsp;<a href="<?php echo  URL_EMPRESA; ?>"><?php echo  NOMBRE_EMPRESA; ?></a>&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="<?php echo $_SESSION['rutaraiz']; ?>/app/acceso/index.php">Acceso</a><img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<span class="sin_enlace">Clientes</span></div>
        <p align="justify" class="titulo_seccion">Clientes</p>
		<p align="justify">
        	<span><strong>1. Selecciona los criterios para la búsqueda:</strong></span>			
        	<span style="margin-left:640px; text-align:right">
				<a href="../acceso/index.php"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>volver.gif" align="absmiddle"></a>&nbsp;&nbsp;<a href="../acceso/index.php">Volver</a>
            </span>
		</p>
	<?php
		// FILTRO PARA REALIZAR BÚSQUEDAS
		// ------------------------------------------------------------------------------
		
		// Control de errores
		if ($_POST)
		{
			if($_SESSION['hayerroresbusqueda'])
			{
	?>
				<div class="titulo_errores"><strong>Informe de errores</strong> &nbsp;| &nbsp;<?php echo  count($_SESSION['erroresbusqueda']); ?> error(es) encontrado(s)</div>
				<div class="detalle_errores">
				<ul class="lista_errores">
	<?php
				foreach($_SESSION['erroresbusqueda'] as $error)
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
	  <form action="index.php" name="formulario" id="formulario" method="post" enctype="multipart/form-data">
			<div style="float:left; width:65%;">
				<!-- Nombre -->
				<span style="text-align:left">Nombre: </span>
				<input class="campo_texto" name="nombre" id="nombre" type="text" size="80" title="Nombre" value="<?php if($_POST) { echo $_POST['nombre']; } else { echo $_SESSION['nombre_busq_clientes']; } ?>" style="margin-left:83px" onchange="modificado=true" />
				<br /><br />
				<!-- Apellidos -->
				<span style="text-align:left">Apellidos: </span>
				<input class="campo_texto" name="apellidos" id="apellidos" type="text" size="80" title="apellidos" value="<?php if($_POST) { echo $_POST['apellidos']; } else { echo $_SESSION['apellidos_busq_clientes']; } ?>" style="margin-left:77px" onchange="modificado=true" />
				<br  /><br  />
				<!-- Email -->
				<span style="text-align:left">Email : </span>
				<input class="campo_texto" name="correo" id="correo" type="text" size="60" title="Email" value="<?php if($_POST) { echo $_POST['correo']; } else { echo $_SESSION['email_busq_clientes']; } ?>" onchange="modificado=true" style="margin-left:95px" />		
			</div>
			<div style="float:left; width:35%;">
				<!-- Opciones -->
				<span style="text-align:left;">Opciones: </span>
				<select id="opcion" name="opcion" class="campo_texto" style="margin-left:10px;">
					<option value="" <?php if ($_POST) { if ($_POST['opcion'] == '') echo "selected"; } else { if (!isset($_SESSION['opcion_busq_clientes'])) echo "selected"; else { if ($_SESSION['opcion_busq_clientes'] == '') echo "selected"; } } ?>>Seleccione opción...</option>
					<option value="busca_vender" <?php if ($_POST) { if ($_POST['opcion'] == 'busca_vender') echo "selected"; } else { if ($_SESSION['opcion_busq_clientes'] == 'busca_vender') echo "selected"; } ?> >Desea vender</option>
					<option value="busca_comprar" <?php if ($_POST) { if ($_POST['opcion'] == 'busca_comprar') echo "selected"; } else { if ($_SESSION['opcion_busq_clientes'] == 'busca_comprar') echo "selected"; } ?> >Busca comprar </option>
					<option value="busca_alquilar" <?php if ($_POST) { if ($_POST['opcion'] == 'busca_alquilar') echo "selected"; } else { if ($_SESSION['opcion_busq_clientes'] == 'busca_alquilar') echo "selected"; } ?> >Desea alquilar</option>
					<option value="busca_alquiler" <?php if ($_POST) { if ($_POST['opcion'] == 'busca_alquiler') echo "selected"; } else { if ($_SESSION['opcion_busq_clientes'] == 'busca_alquiler') echo "selected"; } ?> >Busca un alquiler</option>
				</select>
				<br  /><br  />
				<!-- Teléfono -->
				<span style="text-align:left">Teléfono : </span>
				<input class="campo_texto" name="telefono" id="telefono" type="text" size="35" title="Teléfono" value="<?php if($_POST) { echo $_POST['telefono']; } else { echo $_SESSION['telefono_busq_clientes']; } ?>" onchange="modificado=true" style="margin-left:10px" />
				<br  /><br  />
				<!-- Tipo -->
				<span style="text-align:left;">Tipo: </span>
				<select id="tipo" name="tipo" class="campo_texto" style="margin-left:41px;">
					<option value="" <?php if ($_POST) { if ($_POST['tipo'] == '') echo "selected"; } else { if (!isset($_SESSION['tipo_busq_clientes'])) echo "selected"; else { if ($_SESSION['tipo_busq_clientes'] == '') echo "selected"; } } ?>>Seleccione tipo...</option>
					<option value="vendedor" <?php if ($_POST) { if ($_POST['tipo'] == 'vendedor') echo "selected"; } else { if ($_SESSION['tipo_busq_clientes'] == 'vendedor') echo "selected"; } ?> >Vendedor</option>
					<option value="visitante" <?php if ($_POST) { if ($_POST['tipo'] == 'visitante') echo "selected"; } else { if ($_SESSION['tipo_busq_clientes'] == 'visitante') echo "selected"; } ?> >Visitante</option>
				</select>
				<br  /><br  />
				<!-- Agente asignado -->
				<span style="text-align:left; ">Agente asignado: </span>
				<select id="agentes_asignados" name="agentes_asignados" class="campo_texto" onchange="modificado=true" style=" margin-left:10px; ">
					<option value="" <?php if ($_POST) { if ($_POST['agentes_asignados'] == '') echo "selected"; } else { if (!isset($_SESSION['agentes_asignados_busq_clientes'])) echo "selected"; else { if ($_SESSION['agentes_asignados_busq_clientes'] == '') echo "selected"; } } ?>>Seleccione agente ...</option>
				<?php
					do
					{
				?>
						<option <?php if ($_POST) { if ($_POST['agentes_asignados'] == $agente_asignado['id_usuario']) echo "selected"; } else { if (isset($_SESSION['agentes_asignados_busq_clientes'])) if ($_SESSION['agentes_asignados_busq_clientes'] == $agente_asignado['id_usuario']) echo "selected"; } ?> value="<?php echo  $agente_asignado['id_usuario'];?>"><?php echo  $agente_asignado['apellidos'].", ".$agente_asignado['nombre'];?></option>	
				<?php
					} while ($agente_asignado = $agentes_asignados->FetchRow());
				?>
				</select>
			</div>		
			<br clear="all" /><br />
			<!-- botón Buscar -->
			<p align="center">
				<a href="#" onclick="document.formulario.submit();return false"><img id="buscar" alt="Buscar" name="buscar" border="0" src="<?php echo  $_SESSION['rutaimg'];?>busca.png" align="absmiddle" /></a>&nbsp;&nbsp;<a href="#" onclick="document.formulario.submit();return false">Buscar</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<!-- Botón resetear -->	
				<a href="<?php echo obtenerURLactual();?>" onclick="document.getElementById('formulario').reset(); document.getElementById('apellidos').value=''; document.getElementById('nombre').value=''; document.getElementById('opcion').value=''; document.getElementById('correo').value=''; document.getElementById('tipo').value=''; document.getElementById('telefono').value=''; document.getElementById('agentes_asignados').value=''; document.formulario.submit();return false" ><img src="<?php echo  $_SESSION['rutaimg'];?>no.png" alt="Limpiar filtro" border="0" align="absmiddle" /></a>&nbsp;&nbsp;			
				<a href="<?php echo obtenerURLactual();?>" onclick="document.getElementById('formulario').reset(); document.getElementById('apellidos').value=''; document.getElementById('nombre').value=''; document.getElementById('correo').value=''; document.getElementById('tipo').value=''; document.getElementById('telefono').value=''; document.getElementById('opcion').value=''; document.getElementById('agentes_asignados').value=''; document.formulario.submit();return false" >Limpiar filtro</a>
				&nbsp;&nbsp;&nbsp;&nbsp;
				<img src="<?php echo  $_SESSION['rutaimg'];?>pdf.gif" align="absmiddle" />&nbsp;&nbsp;<a href="exportar_pdf.php" target="_blank">Exportar listado a PDF</a>
			</p>
		</form>
		<!-- Resultados de Búsqueda -->					
		<div style="width:100%; padding-bottom:2px; border-bottom:1px solid #666666; color:#003366">
			<div style="width:30%; float:left; text-align:left">
				<img src="<?php echo  $_SESSION['rutaimg'];?>oficina.gif" align="absmiddle" />&nbsp;Información sobre clientes registrados
			</div>	
			<div style="width:70%; float:right; text-align:right">
				<img src="<?php echo  $_SESSION['rutaimg'];?>nueva_noticia.gif" align="absmiddle" /><a href="insertar.php">Insertar cliente</a>		
			</div>
			<br clear="all" />
		</div>
		<a name="listado"></a>
		<br clear="all" />	
	    <?php
		if ($num_clientes != 0)
		{			
		?>
			<?php
			// Datos de paginación
			echo $_SESSION['display_pages_busq_clientes'];
			echo $_SESSION['display_menu_pages_busq_clientes'];
			?>			
		<br /><br />
		<table style="border:1px solid #004000" align="center"  width="100%" cellpadding="1" cellspacing="1">
			<tr class="cabecera_tabla">
				<td>Nombre completo</td>
				<td>Provincia</td>
				<td>Municipio</td>
				<td>Dirección</td>
				<td>Teléfono</td>
				<td>Correo</td>
				<td>Editar</td>
				<td>Eliminar</td>
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
						<td>
							<?php echo  $cliente['apellidos'] . ", " . $cliente['nombre'];?>	
						</td>
						<td><?php echo  formatear_provincia($cliente['provincia']);?></td>
						<td><?php echo  formatear_poblacion($cliente['poblacion']);?></td>
						<td><?php echo  $cliente['direccion'];?></td>
						<td><?php echo  $cliente['telefono'];?></td>
						<td><?php echo  $cliente['correo'];?></td>
						<td><a href="editar.php?id=<?php echo  $cliente['id_cliente'];?>"><img src="<?php echo $_SESSION['rutaimg'];?>editar.gif" title="Editar" border="0" align="absmiddle"></a></td>
						<?php
						$acceso_borrar=ControlClientes::ComprobarBorrar($cliente['id_cliente']);
						if($acceso_borrar>0)
						{
						?>
						<td><a href="estas_seguro.php?id=<?php echo  $cliente['id_cliente'];?>"><img src="<?php echo $_SESSION['rutaimg'];?>borrar.gif" title="Borrar" border="0" align="absmiddle"></a></td>
						<?php
						}
						else
						{
						?>
						<td>--</td>
						<?php
						}
						?>
					</tr>
			<?php
				} while ($cliente = $clientes->FetchRow());
			?>
		</table>
	<?php
		}
		else
		{
	?>
    		<p align="justify"><img src="<?php echo $_SESSION['rutaimg'];?>info.gif" align="absmiddle">&nbsp;&nbsp;Actualmente no hay ningún cliente registrado en el sistema con los criterios de búsqueda seleccionados.</p>
   <?php
		}
	?>
		<!--  Navegacion -->	
		<p align="right">
			<a href="../acceso/index.php"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>volver.gif" align="absmiddle"></a>&nbsp;&nbsp;<a href="../acceso/index.php">Volver</a>
			&nbsp;&nbsp;&nbsp;
			<a href="#top" title="Subir"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>subir.png"></a>&nbsp;&nbsp;<a href="#top" title="Subir">Subir</a>
		</p>