		<a name="top"></a>
		<div class="breadcrumbs_publico"><img src="<?php echo  $_SESSION['rutaimg'];?>flecha1.png" align="absmiddle" />&nbsp;<a href="<?php echo  URL_EMPRESA; ?>"><?php echo  NOMBRE_EMPRESA; ?></a>&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="<?php echo $_SESSION['rutaraiz']; ?>/app/acceso/index.php">Acceso</a>&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="index.php">Usuarios</a>&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<span class="sin_enlace">Editar usuario</span></div>
        <p align="justify" class="titulo_seccion">Usuarios</p>		
		<?php
			// Control de errores
			if ($_POST)
			{
				if($_SESSION['hayerroresmodificarusuario'])
				{
		?>
					<div class="titulo_errores"><strong>Informe de errores</strong> &nbsp;| &nbsp;<?php echo  count($_SESSION['erroresmodificarusuario']); ?> error (es) encontrado(s)</div>
					<div class="detalle_errores">
					<ul class="lista_errores">
		<?php
					foreach($_SESSION['erroresmodificarusuario'] as $error)
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
				unset($_SESSION['hayerroresmodificarusuario']);
				unset($_SESSION['erroresmodificarusuario']);
			}
		?>
		<form action=""  name="insertar_usuario" id="insertar_usuario" method="post" enctype="multipart/form-data">
		<div class="regla_horizontal_superior">
			<div style="float:left;">
			<!-- Actualizar en BD -->
			<a href="#" onclick="document.insertar_usuario.submit();return false"><img id="boton_edita" alt="Actualizar en BD" name="boton_edita" border="0" src="<?php echo  $_SESSION['rutaimg'];?>actualizar.gif" align="absmiddle" /></a>&nbsp;&nbsp;&nbsp;<a href="#" onclick="document.insertar_usuario.submit();return false">Actualizar en BD</a>
			&nbsp;&nbsp;<a class="submodal-520-350" href="ayuda.php"><img src="<?php echo  $_SESSION['rutaimg'];?>help.png" alt="Ayuda al buscador" border="0" align="absmiddle" /></a>&nbsp;<a class="submodal-520-350" href="ayuda.php">Ayuda</a>
			</div>
			<div style="float:right; padding-top:4px;">
			<a href="index.php"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>volver.gif" align="absmiddle"></a>&nbsp;&nbsp;<a href="index.php">Volver</a>
			</div>			
		</div>
		<br clear="all" />
		<!-- CUENTA DE USUARIO-->
		<p align="justify" class="titulo_seccion_datos">Cuenta de usuario</p>
		<!-- Usuario -->	
		<span style="text-align:left;">Usuario: </span>
		<input style="margin-left:30px; text-align:center" class="campo_texto" name="usuario" id="usuario" type="text" size="20" title="Usuario" value="<?php if($_POST['usuario']) echo $_POST['usuario']; else echo $row_consulta['nick']; ?>" >
		&nbsp;&nbsp;&nbsp;&nbsp;		
		<!-- Contrasena -->	
		<span style="text-align:left;">Contraseņa: </span>&nbsp;&nbsp;
		<input class="campo_texto" name="password" id="password" style="text-align:center" type="password" size="20" title="Contraseņa" value="<?php if($_POST['password']) echo $_POST['password']; ?>" >
		&nbsp;&nbsp;&nbsp;&nbsp;
		<!-- Confirmar constrasena -->	
		<span style="text-align:left; margin-left:12px">Confirmar contraseņa: </span>&nbsp;&nbsp;
		<input class="campo_texto" name="confirma" id="confirma" style="text-align:center" type="password" size="20" title="Confirmar contraseņa" value="<?php if($_POST['confirma']) echo $_POST['confirma']; ?>" >
		&nbsp;&nbsp;&nbsp;&nbsp;
		<!-- Cuenta activa -->
		<input name="cuenta_activa" value="1" id="cuenta_activa" type="checkbox" style="margin-left:12px" <?php if ($_POST['cuenta_activa']) echo "checked"; else {if($row_consulta['cuenta_activa'] == 1) echo "checked";} ?>>&nbsp;&nbsp;Cuenta activa
		<!-- DATOS DE USUARIO-->
		<p align="justify" class="titulo_seccion_datos">Datos de usuario</p>
		<!-- Nombre -->	
		<span style="text-align:left;">Nombre: </span>
		<input style="margin-left:12px; text-align:center" class="campo_texto" name="nombre" id="nombre" type="text" size="20" title="Nombre" value="<?php if($_POST['nombre']) echo $_POST['nombre']; else echo $row_consulta['nombre']; ?>" >
		&nbsp;&nbsp;&nbsp;
		<!-- Apellidos -->	
		<span style="text-align:left; margin-left:12px">Apellidos: </span>&nbsp;&nbsp;
		<input class="campo_texto" name="apellidos" id="apellidos" style="text-align:center" type="text" size="30" title="Apellidos" value="<?php if($_POST['apellidos']) echo $_POST['apellidos'];  else echo $row_consulta['apellidos']; ?>" >
		<!-- Correo -->
		<span style="text-align:left; margin-left:10px">E-mail:  </span>&nbsp;&nbsp;
		<input style="margin-left:12px; text-align:center" class="campo_texto" name="correo" id="correo" size="50" title="E-mail" value="<?php if($_POST['correo']) echo $_POST['correo']; else echo $row_consulta['correo']; ?>" >
		<!-- NIF -->	
		<span style="text-align:left; margin-left:10px">NIF: </span>&nbsp;&nbsp;
		<input class="campo_texto" name="nif" id="nif" style="text-align:center" type="text" size="15" title="NIF" value="<?php if($_POST['nif']) echo $_POST['nif'];  else echo $row_consulta['nif']; ?>" >
		<!-- NIF anterior -->
		<input type="hidden" name="nif_anterior" value="<?php echo $row_consulta['nif']; ?>"  />
		</form>
		<br /><br />
		<div class="regla_horizontal_inferior">
			<div style="float:left;">
			<!-- Actualizar en BD -->
			<a href="#" onclick="document.insertar_usuario.submit();return false"><img id="boton_edita" alt="Actualizar en BD" name="boton_edita" border="0" src="<?php echo  $_SESSION['rutaimg'];?>actualizar.gif" align="absmiddle" /></a>&nbsp;&nbsp;&nbsp;<a href="#" onclick="document.insertar_usuario.submit();return false">Actualizar en BD</a>
			&nbsp;&nbsp;<a class="submodal-520-350" href="ayuda.php"><img src="<?php echo  $_SESSION['rutaimg'];?>help.png" alt="Ayuda al buscador" border="0" align="absmiddle" /></a>&nbsp;<a class="submodal-520-350" href="ayuda.php">Ayuda</a>
			</div>
			<div style="float:right; padding-top:7px;">
			<!--  Navegacion -->
			<a href="index.php"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>volver.gif" align="absmiddle"></a>&nbsp;&nbsp;<a href="index.php">Volver</a>
			&nbsp;&nbsp;&nbsp;
			<a href="#top" title="Subir"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>subir.png"></a>&nbsp;&nbsp;<a href="#top" title="Subir">Subir</a>
			</div>
		</div>
		<br clear="all" />