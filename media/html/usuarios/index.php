		<a name="top"></a>
		<div class="breadcrumbs_publico"><img src="<?php echo  $_SESSION['rutaimg'];?>flecha1.png" align="absmiddle" />&nbsp;<a href="<?php echo  URL_EMPRESA; ?>"><?php echo  NOMBRE_EMPRESA; ?></a>&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="<?php echo $_SESSION['rutaraiz']; ?>/app/acceso/index.php">Acceso</a><img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<span class="sin_enlace">Usuarios</span></div>
        <p align="justify" class="titulo_seccion">Usuarios</p>
		<p align="justify">
        	<span><strong>1. Selecciona los criterios para la búsqueda:</strong></span>			
        	<span style="margin-left:640px; text-align:right">
				<a href="../acceso/index.php"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>volver.gif" align="absmiddle"></a>&nbsp;&nbsp;<a href="../acceso/index.php">Volver</a>
            </span>
		</p>
	<?php
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
				<input class="campo_texto" name="nombre" id="nombre" type="text" size="80" title="Nombre" value="<?php if($_POST) { echo $_POST['nombre']; } else { echo $_SESSION['nombre_busq_usuarios']; } ?>" style="margin-left:83px" onchange="modificado=true" />
				<br /><br />
				<!-- Apellidos -->
				<span style="text-align:left">Apellidos: </span>
				<input class="campo_texto" name="apellidos" id="apellidos" type="text" size="80" title="apellidos" value="<?php if($_POST) { echo $_POST['apellidos']; } else { echo $_SESSION['apellidos_busq_usuarios']; } ?>" style="margin-left:77px" onchange="modificado=true" />
			</div>
			<div style="float:left; width:35%;">
				<!-- Email -->
				<span style="text-align:left">Email : </span>
				<input class="campo_texto" name="correo" id="correo" type="text" size="45" title="Email" value="<?php if($_POST) { echo $_POST['correo']; } else { echo $_SESSION['email_busq_usuarios']; } ?>" onchange="modificado=true" style="margin-left:10px" />
			</div>		
			<br clear="all" /><br />
			<!-- botón Buscar -->
			<p align="center">
			<a href="#" onclick="document.formulario.submit();return false"><img id="buscar" alt="Buscar" name="buscar" border="0" src="<?php echo  $_SESSION['rutaimg'];?>busca.png" align="absmiddle" /></a>&nbsp;&nbsp;<a href="#" onclick="document.formulario.submit();return false">Buscar</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<!-- Botón resetear -->	
			<a href="<?php echo obtenerURLactual();?>" onclick="document.getElementById('formulario').reset(); document.getElementById('apellidos').value=''; document.getElementById('nombre').value=''; document.getElementById('correo').value=''; document.formulario.submit();return false" ><img src="<?php echo  $_SESSION['rutaimg'];?>no.png" alt="Limpiar filtro" border="0" align="absmiddle" /></a>&nbsp;&nbsp;			
			<a href="<?php echo obtenerURLactual();?>" onclick="document.getElementById('formulario').reset(); document.getElementById('apellidos').value=''; document.getElementById('nombre').value=''; document.getElementById('correo').value=''; document.formulario.submit();return false" >Limpiar filtro</a>
			<a name="listado"></a>
			</p>
		</form>
		<!-- Resultados de Búsqueda -->					
		<div style="width:100%; padding-bottom:2px; border-bottom:1px solid #666666; color:#003366">
			<div style="width:30%; float:left; text-align:left">
				<img src="<?php echo  $_SESSION['rutaimg'];?>oficina.gif" align="absmiddle" />&nbsp;Información sobre usuarios registrados
			</div>	
			<div style="width:70%; float:right; text-align:right">
				<img src="<?php echo  $_SESSION['rutaimg'];?>nueva_noticia.gif" align="absmiddle" /><a href="insertar.php">Insertar usuario</a>		
			</div>
			<br clear="all" />
		</div>	
		<br clear="all" />	
	    <?php
		if ($num_usuarios != 0)
		{
			// Datos de paginación
			echo $_SESSION['display_pages_busq_usuarios'];
			echo $_SESSION['display_menu_pages_busq_usuarios'];
		?>			
		<br /><br />
		<table style="border:1px solid #004000" align="center"  width="60%" cellpadding="1" cellspacing="1">
			<tr class="cabecera_tabla">
				<td>Nombre completo</td>
				<td>Usuario</td>
				<td>Fecha alta</td>
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
							<a href="ver_ficha.php?usu=<?php echo  $usuario['nick'];?>"><?php echo  $usuario['apellidos'] . ", " . $usuario['nombre'];?></a>
							<?php
							if($usuario['perfil']=="administrador") 
							{
							?>
								&nbsp;&nbsp;
								<img src="<?php echo  $_SESSION['rutaimg'];?>star.png" align="absmiddle" />
							<?php
							}	
							?>	
						</td>
						<td><?php echo  $usuario['nick'];?></td>
						<td><?php echo  cambiafecha_bd($usuario['fecha_alta']);?></td>
						<td><a href="editar.php?usuario=<?php echo  $usuario['nick'];?>"><img src="<?php echo $_SESSION['rutaimg'];?>editar.gif" title="Editar" border="0" align="absmiddle"></a></td>
						<?php
						if($usuario['nick']=="admin")
						{
						?>							
							<td>--</td>
						<?php
						}
						else
						{
						?>
							<td><a href="estas_seguro.php?usuario=<?php echo  $usuario['id_usuario'];?>"><img src="<?php echo $_SESSION['rutaimg'];?>borrar.gif" title="Borrar" border="0" align="absmiddle"></a></td>
						<?php
						}
						?>
					</tr>
			<?php
				} while ($usuario = $usuarios->FetchRow());
			?>
		</table>
		<p align="center"><img src="<?php echo $_SESSION['rutaimg'];?>star.png" title="Usuario con acceso a gestión <?php echo  NOMBRE_EMPRESA; ?>" border="0" align="absmiddle">&nbsp;&nbsp;Usuario con acceso a gestión <?php echo  NOMBRE_EMPRESA; ?></p>
	<?php
		}
		else
		{
	?>
    		<p align="justify"><img src="<?php echo $_SESSION['rutaimg'];?>info.gif" align="absmiddle">&nbsp;&nbsp;Actualmente no hay ningún usuario registrado en el sistema con los criterios de búsqueda seleccionados.</p>
   <?php
		}
	?>
		<!--  Navegacion -->	
		<p align="right">
			<a href="../acceso/index.php"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>volver.gif" align="absmiddle"></a>&nbsp;&nbsp;<a href="../acceso/index.php">Volver</a>
			&nbsp;&nbsp;&nbsp;
			<a href="#top" title="Subir"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>subir.png"></a>&nbsp;&nbsp;<a href="#top" title="Subir">Subir</a>
		</p>